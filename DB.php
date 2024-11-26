<?php

class DB{
    public $host = "localhost";
    public $dbname = "todo";
    public $conn;
    public function __construct(){
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", 'root', 'root');
    }
}