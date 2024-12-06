<?php

namespace App;

class DB
{
    public string $host;
    public string $user;
    public string $pass;
    public string $dbname;
    public \PDO $conn;

    public function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->user = $_ENV['DB_USER'];
        $this->pass = $_ENV['DB_PASS'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->conn = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
    }
}