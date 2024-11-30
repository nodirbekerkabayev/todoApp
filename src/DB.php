<?php

class DB
{
    public string $host = "localhost";
    public string $dbname = "todo";
    public PDO $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", 'root', 'root');
    }
}