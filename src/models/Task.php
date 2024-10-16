<?php

class Task {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllTasks() {
        $stmt = $this->db->query("SELECT * FROM tasks ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTask($title, $description) {
        $stmt = $this->db->prepare("INSERT INTO tasks (title, description) VALUES (?, ?)");
        return $stmt->execute([$title, $description]);
    }

    public function deleteTask($id) {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function updateTaskStatus($id, $status) {
        $stmt = $this->db->prepare("UPDATE tasks SET completed = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }
}