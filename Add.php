<?php

require 'DB.php';

class Add {
    public $pdo;

    public function __construct() {
        $db = new DB();
        $this->pdo = $db->conn;
    }

    public function store() {
        $title = $_POST['title'];
        $status = $_POST['status'];
        $due_date = date("Y-m-d H:i:s");

        $sql = "INSERT INTO todos (title, status, due_date) VALUES (:title, :status, :due_date)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':due_date', $due_date);

        $stmt->execute();

        header("Location: index.php");
        exit;
    }
}