<?php

namespace App;

class User
{
    public \PDO $pdo;
    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->conn;
    }
    public function register(string $fullName, string $email, string $password): void
    {
        $sql = "INSERT INTO users (fullname, email, password) VALUES (:fullname, :email, :password)";
        $stmt = $this->pdo->prepare($sql)->execute([
            ":fullName" => $fullName,
            ":email" => $email,
            ":password" => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }
}