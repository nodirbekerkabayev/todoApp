<?php
namespace App;

use App;
class Todo
{
    public $pdo;

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

    public function destroy(int $id): bool
    {
        $query = "DELETE FROM todos WHERE id=:id";
        return $this->pdo->prepare($query)->execute([
            ":id" => $id
        ]);
    }

    public function getTodo(int $id)
    {
        $query = "SELECT * FROM todos WHERE id=:id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ":id" => $id
        ]);
        return $stmt->fetch();
    }

    public function update(int $id, string $title, string $status, string $due_date): bool
    {
        $due_date = new \DateTime($due_date);
        $due_date = $due_date->format('Y-m-d H:i:s');
        $query = "UPDATE todos SET title=:title, status=:status, due_date=:due_date, updated_at = NOW() where id=:id";
        return $this->pdo->prepare($query)->execute([
            ":id" => $id,
            ":title" => $title,
            ":status" => $status,
            ":due_date" => $due_date
        ]);
    }
    public function search(string $title)
    {
        $query = "SELECT * FROM todos WHERE title=:title";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ":title" => $title
        ]);
        return $stmt->fetchAll();
    }
}