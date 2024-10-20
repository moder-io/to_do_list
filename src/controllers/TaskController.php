<?php

require_once __DIR__ . '/../models/Task.php';

class TaskController {
    private $taskModel;

    public function __construct(PDO $db) {
        $this->taskModel = new Task($db);
    }

    public function index() {
        $tasks = $this->taskModel->getAllTasks();
        require __DIR__ . '/../views/tasks/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $this->sanitizeInput($_POST['title'] ?? '');
            $description = $this->sanitizeInput($_POST['description'] ?? '');
            
            if (!empty($title) && $this->taskModel->addTask($title, $description)) {
                header('Location: index.php');
                exit;
            }
        }
        require __DIR__ . '/../views/tasks/create.php';
    }

    public function delete($id) {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id && $this->taskModel->deleteTask($id)) {
            header('Location: index.php');
            exit;
        }
        throw new InvalidArgumentException("Invalid ID for deletion");
    }

    public function toggleStatus($id, $status) {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        $status = filter_var($status, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        
        if ($id !== false && $status !== null && $this->taskModel->updateTaskStatus($id, $status)) {
            header('Location: index.php');
            exit;
        }
        throw new InvalidArgumentException("Invalid ID or status for toggle");
    }

    private function sanitizeInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        return $input;
    }
}