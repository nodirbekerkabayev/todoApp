<?php

namespace App;

use PDO;
use PDOException;

class DB
{
    public string $host;
    public string $user;
    public string $pass;
    public string $dbname;
    public PDO $conn;

    public function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->user = $_ENV['DB_USER'];
        $this->pass = $_ENV['DB_PASS'];
        $this->dbname = $_ENV['DB_NAME'];

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->user,
                $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Ma'lumotlar bazasiga ulanishda xato: " . $e->getMessage());
        }
    }
}
