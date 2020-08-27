<?php
// 1. Connect to Database
require_once "../config.php";

// 2. Collect Data from FORM
$id = $_GET['id'];

$sql1 = "SELECT * FROM bota_user WHERE id = :id";
$stmt1 = $conn->prepare($sql1);
$stmt1->bindValue(":id", $id);
$stmt1->execute();

$user = $stmt1->fetch();

if(!$user){
    echo "User khong ton tai"; die;
}


$sql = "DELETE from bota_user WHERE id=:id";

$stmt =  $conn->prepare($sql);
$stmt->bindValue(":id", $user['id']);

$check = $stmt->execute();
if($check ){
    header("location: index.php");
} else {
    echo "Delete that bai: <br>"; 
    dd($stmt->errorInfo());
   
}