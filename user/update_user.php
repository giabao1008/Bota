<?php
// 1. Connect to Database
require_once "../config.php";

// 2. Collect Data from FORM
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$role = $_POST['role'];

$sql1 = "SELECT * FROM bota_user WHERE id = :id";
$stmt1 = $conn->prepare($sql1);
$stmt1->bindValue(":id", $id);
$stmt1->execute();

$user = $stmt1->fetch();

if(!$user){
    echo "User không tồn tại"; die;
}
if(!empty($_POST['password'])){
    $sql = "UPDATE bota_user set name =:name, email =:email, role=:role, password=:password WHERE id=:id";
    
} else {
    $sql = "UPDATE bota_user set name =:name, email =:email, role=:role WHERE id=:id";
}
$stmt =  $conn->prepare($sql);

$stmt->bindValue(":name", $name);
$stmt->bindValue(":email", $email);
$stmt->bindValue(":role", $role);
$stmt->bindValue(":id", $id);
if(!empty($_POST['password'])){
    $stmt->bindValue(":password", password_hash($_POST['password'], PASSWORD_DEFAULT));
}
$check = $stmt->execute();
if($check ){
    header("location: index.php");
} else {
    echo "Update that bai: <br>"; 
    dd($stmt->errorInfo());
   
}