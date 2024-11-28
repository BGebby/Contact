<?php
session_start();
define('BASE_PATH', __DIR__);
require_once BASE_PATH . '/api/controllers/ContactController.php';


$controller = new ContactController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'delete':
        $controller->delete();
        break;
    case 'search':
        $controller->search();
        break;
    default:
        $controller->index();
        break;
}