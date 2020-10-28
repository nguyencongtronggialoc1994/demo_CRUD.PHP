<?php
include 'DBConnect.php';
$db = new  DBConnect();
$conn = $db->connect();
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query="DELETE FROM users WHERE id = $id";
    $stmt=$conn->prepare($query);
    $stmt->execute();
    header('location:index.php');
}

