<?php
global $conn;
require 'DB.php';

$title = $_POST['title'];
$status = $_POST['status'];
$due_date = $_POST("Y-m-d H:i:s");

$sql = "INSERT INTO tasks (title, status, due_date) VALUES (:title, :status, due_date)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':due_date', $due_date);
$stmt->execute();
header("Location:index.php");