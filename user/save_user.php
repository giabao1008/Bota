<?php
// 1. Connect to Database
require_once "../config.php";

// 2. Collect Data from FORM
$name = $_POST['name'];
$email = $_POST['email'];
$role = $_POST['role'];
$password = $_POST['password'];
// Check email exit

$sqlCheck = "SELECT * from bota_user WHERE email='$email'";
$stmtCheck = $conn->prepare($sqlCheck);
$stmtCheck->execute();
$user = $stmtCheck->fetch();
if($user) {
    echo ('Email đã tồn tại');
    return false;
}


// Write and prepare sql
$sql = "INSERT INTO bota_user (name, email, role,  password) VALUES(:name, :email, :role, :password)";

$stmt = $conn->prepare($sql);
// Bind value

$stmt->bindValue(":name", $name);
$stmt->bindValue(":email", $email);
$stmt->bindValue(":role", $role);
$stmt->bindValue(":password", password_hash($password, PASSWORD_DEFAULT));
//Execute

$check =  $stmt->execute();
// Redirect to login page
if($check)  header("location: index.php");

else dd($stmt->errorInfo());
?>