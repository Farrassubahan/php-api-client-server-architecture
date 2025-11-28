<?php
require_once "../controllers/UsersController.php";

$controller = new UsersController();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;

    case 'store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->store($_POST);
            header("Location: web.php?action=index");
            exit;
        }
        break;

    case 'edit':
        $controller->edit($_GET['id']);
        break;

    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->update($_POST, $_GET['id']);
            header("Location: web.php?action=index");
            exit;
        }
        break;

    case 'delete':
        $controller->destroy($_GET['id']);
        header("Location: web.php?action=index");
        exit;

    default:
        echo "404 - Page not found";
}
