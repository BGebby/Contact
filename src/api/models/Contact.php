<?php
require_once BASE_PATH . '/api/settings/database.php';

class Contact
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($data)
    {
        try {
            $sql = "INSERT INTO contacts (first_name, last_name, email, phone) VALUES (:first_name, :last_name, :email, :phone)";
            $stmt = $this->db->prepare($sql);

            return $stmt->execute([
                ':first_name' => $data['name'],
                ':last_name' => $data['lastname'],
                ':email' => $data['email'],
                ':phone' => $data['phone']
            ]);
        } catch (Exception $e) {
            $response = array(
                'error' => true,
                'message' => $e->getMessage(),
                'info' => 'create contact'
            );
            return $response;
        }
    }


    public function getAll()
    {
        try {
            $sql = "SELECT * FROM contacts ORDER BY created_at DESC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            $response = array(
                'error' => true,
                'message' => $e->getMessage(),
                'info' => 'all contacts'
            );
            return $response;
        }
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT * FROM contacts WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            $response = array(
                'error' => true,
                'message' => $e->getMessage(),
                'info' => 'one contact'
            );
            return $response;
        }
    }

    public function update($id, $data)
    {
        try {
            $sql = "UPDATE contacts SET 
                first_name = :first_name,
                last_name = :last_name,
                email = :email,
                phone = :phone,
                updated_at = CURRENT_TIMESTAMP
                WHERE id = :id";

            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                ':id' => $id,
                ':first_name' => $data['name'],
                ':last_name' => $data['lastname'],
                ':email' => $data['email'],
                ':phone' => $data['phone']
            ]);
        } catch (Exception $e) {
            $response = array(
                'error' => true,
                'message' => $e->getMessage(),
                'info' => 'update contacts'
            );
            return $response;
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM contacts WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([':id' => $id]);
        } catch (Exception $e) {
            $response = array(
                'error' => true,
                'message' => $e->getMessage(),
                'info' => 'delete contact'
            );
            return $response;
        }
    }

    public function search($query)
    {
       
        try {
            $sql = "SELECT * FROM contacts 
                WHERE first_name LIKE :query 
                OR last_name LIKE :query 
                OR email LIKE :query 
                OR phone LIKE :query";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([':query' => $query]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            $response = array(
                'error' => true,
                'message' => $e->getMessage(),
                'info' => 'search contact'
            );
            return $response;
        }
    }
}
