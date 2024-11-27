<?php
require "DB.php";

class Todo {
    public $pdo;
    public function __construct () {
        $db = new DB();
        $this->pdo = $db->conn;
    }
    public function store (string $title, string $dueDate) {
        $dueDate  = new DateTime($dueDate);
        $dueDate = $dueDate->format('Y-m-d H:i:s');
        $query = "INSERT INTO todos(title, status, due_date, created_at, updated_at) 
                VALUES (:title, 'pending', :due_date, NOW(), NOW())
        ";
        $this->pdo->prepare($query)->execute(params: array(":due_date" => $dueDate, ":title" => $title));
    }
    public function get () {
        $query = "SELECT * FROM todos";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll();
    }
    public function complete(int $id): bool{
        $query = "UPDATE todos SET status='completed' where id=:id";
        return $this->pdo->prepare($query)->execute(params: array(":id" => $id));
    }
    public function inProgress(int $id): bool{
        $query = "UPDATE todos SET status='in_progress' where id=:id";
        return $this->pdo->prepare($query)->execute(params: array(":id" => $id));
    }
}