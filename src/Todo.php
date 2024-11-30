<?php
require "DB.php";

class Todo
{
    public PDO $pdo;

    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->conn;
    }

    /**
     * @throws DateMalformedStringException
     */
    public function store(string $title, string $dueDate): void
    {
        $dueDate = new DateTime($dueDate);
        $dueDate = $dueDate->format('Y-m-d H:i:s');
        $query = "INSERT INTO todos(title, status, due_date, created_at, updated_at) 
                VALUES (:title, 'pending', :due_date, NOW(), NOW())
        ";
        $this->pdo->prepare($query)->execute(params: array(":due_date" => $dueDate, ":title" => $title));
    }

    public function get(): array
    {
        $query = "SELECT * FROM todos";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll();
    }

    public function complete(int $id): bool
    {
        $query = "UPDATE todos SET status='completed', updated_at = NOW() where id=:id";
        return $this->pdo->prepare($query)->execute(params: array(":id" => $id));
    }

    public function inProgress(int $id): bool
    {
        $query = "UPDATE todos SET status='in_progress', updated_at = NOW() where id=:id";
        return $this->pdo->prepare($query)->execute(params: array(":id" => $id));
    }

    public function pending(int $id): bool
    {
        $query = "UPDATE todos SET status='pending', updated_at = NOW() where id=:id";
        return $this->pdo->prepare($query)->execute(params: array(":id" => $id));
    }
}