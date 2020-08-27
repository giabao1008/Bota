<?php
// 1. Connect to Database
require_once "../config.php";

// 2. Collect Data from FORM
$email = $_POST['email'];
$password = $_POST['password'];
// Check email exit

$sqlCheck = "SELECT * from bota_user WHERE email='$email'";
$stmtCheck = $conn->prepare($sqlCheck);
$stmtCheck->execute();
$user = $stmtCheck->fetch();
if(!$user) {
    echo ('Email không tồn tại');
    return false;
}else if(!password_verify($password, $user['password']) ) {
    echo ('Sai mật khẩu, vui lòng thử lại');
    return false;
}

// Redirect to login page
session_start();
$_SESSION['email'] = $user['email'];
$_SESSION['id'] = $user['id'];
$_SESSION['role'] = $user['role'];
header("location: ../index.php");

?>