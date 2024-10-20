<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/controllers/TaskController.php';

// Configuración de errores para desarrollo
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbConfig = require __DIR__ . '/../config/database.php';
$dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset={$dbConfig['charset']}";

try {
    $db = new PDO($dsn, $dbConfig['username'], $dbConfig['password'], $dbConfig['options']);
} catch (PDOException $e) {
    error_log("Error de conexión a la base de datos: " . $e->getMessage());
    die("Lo sentimos, ha ocurrido un error al conectar con la base de datos. Por favor, inténtelo más tarde.");
}

$controller = new TaskController($db);

// Validación y sanitización de la entrada
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? 'index';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$status = filter_input(INPUT_GET, 'status', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

try {
    switch ($action) {
        case 'create':
            $controller->create();
            break;
        case 'delete':
            if ($id === false) {
                throw new InvalidArgumentException("ID inválido para eliminar");
            }
            $controller->delete($id);
            break;
        case 'toggle':
            if ($id === false || $status === null) {
                throw new InvalidArgumentException("ID o estado inválido para cambiar");
            }
            $controller->toggleStatus($id, $status);
            break;
        case 'index':
            $controller->index();
            break;
        default:
            throw new InvalidArgumentException("Acción no reconocida");
    }
} catch (InvalidArgumentException $e) {
    // Manejar errores de validación
    header("HTTP/1.0 400 Bad Request");
    echo "Error: " . $e->getMessage();
} catch (Exception $e) {
    // Manejar otros errores
    error_log("Error en la aplicación: " . $e->getMessage());
    header("HTTP/1.0 500 Internal Server Error");
    echo "Lo sentimos, ha ocurrido un error. Por favor, inténtelo de nuevo más tarde.";
}