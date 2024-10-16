<?php

require_once __DIR__ . '/../models/Task.php';

class TaskController {
    private $taskModel;

    public function __construct($db) {
        $this->taskModel = new Task($db);
    }

    public function index() {
        $tasks = $this->taskModel->getAllTasks();
        require __DIR__ . '/../views/tasks/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            if ($this->taskModel->addTask($title, $description)) {
                header('Location: index.php');
                exit;
            }
        }
        require __DIR__ . '/../views/tasks/create.php';
    }

    public function delete($id) {
        if ($this->taskModel->deleteTask($id)) {
            header('Location: index.php');
            exit;
        }
    }

    public function toggleStatus($id, $status) {
        if ($this->taskModel->updateTaskStatus($id, $status)) {
            header('Location: index.php');
            exit;
        }
    }
}