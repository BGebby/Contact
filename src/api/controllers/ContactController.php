<?php

require_once BASE_PATH . '/api/models/Contact.php';


class ContactController
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new Contact();
    }

    public function index()
    {
        $contacts = $this->contactModel->getAll();
        if ($contacts) {
            include 'views/contacts/index.php';
        } else {
            // Muestra un mensaje si no hay contactos
            echo "No contacts found.";
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name'])) {

                $dat = array(
                    'name' => $_POST['name'],
                    'lastname' => $_POST['lastname'],
                    'phone' => $_POST['phone'],
                    'email' => $_POST['email']
                );

                $response = $this->contactModel->create($dat);

                if ($response) {
                    $_SESSION['showAlertCreate'] = true;
                    header("Location: index.php?action=index");
                    exit;
                } else {
                    echo "Error creating contact.";
                }
            } else {
                echo "Invalid request";
            }
        } else {
            include 'views/contacts/create.php';
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['id'])) {
                $contact = $this->contactModel->getById($_GET['id']);
                if ($contact) {
                    include 'views/contacts/edit.php';
                } else {
                    echo "Contact not found.";
                }
            } else {
                echo "Invalid request.";
            }
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $dat = array(
                    'name' => $_POST['name'],
                    'lastname' => $_POST['lastname'],
                    'phone' => $_POST['phone'],
                    'email' => $_POST['email']
                );
                $response = $this->contactModel->update($id, $dat);
                if ($response) {
                    $_SESSION['showAlertUpdate'] = true;
                    header("Location: index.php?action=index");
                    exit;
                } else {
                    echo "Error updating contact.";
                }
            }
        } else {
            echo "Invalid request method.";
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['id'])) {
               
                if ($this->contactModel->delete($_GET['id'])) {
                    header("Location: index.php?action=index");
                } else {
                    echo "Error deleting contactModel.";
                }
            }
        } else {
            echo "Invalid request method.";
        }
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
         
            if (isset($_GET['keyword'])) {
        
                $contacts = $this->contactModel->search($_GET['keyword']);
                  
                    
                if ($contacts) {
                    include 'views/contacts/index.php';
                } else {
                    // Muestra un mensaje si no hay contactos
                    header("Location: index.php?action=index");
                }
            }
        } else {
            echo "Invalid request method.";
        }
    }
}
