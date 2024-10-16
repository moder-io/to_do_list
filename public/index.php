<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/controllers/TaskController.php';

$dbConfig = require __DIR__ . '/../config/database.php';
$dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset={$dbConfig['charset']}";

try {
    $db = new PDO($dsn, $dbConfig['username'], $dbConfig['password']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

$controller = new TaskController($db);

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'delete':
        $controller->delete($_GET['id'] ?? null);
        break;
    case 'toggle':
        $controller->toggleStatus($_GET['id'] ?? null, $_GET['status'] ?? null);
        break;
    default:
        $controller->index();
        break;
}