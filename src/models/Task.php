<?php

class Task {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAllTasks() {
        return $this->db->query("SELECT * FROM tasks ORDER BY created_at DESC")->fetchAll();
    }

    public function addTask($title, $description) {
        $stmt = $this->db->prepare("INSERT INTO tasks (title, description) VALUES (:title, :description)");
        return $stmt->execute(['title' => $title, 'description' => $description]);
    }

    public function deleteTask($id) {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function updateTaskStatus($id, $status) {
        $stmt = $this->db->prepare("UPDATE tasks SET completed = :status WHERE id = :id");
        return $stmt->execute(['status' => $status, 'id' => $id]);
    }
}