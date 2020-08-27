<?php
// 1. Connect to Database
require_once "../config.php";

//get curren user id 
session_start();
$userID = $_SESSION['id'];
// 2. Collect Data from FORM
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$file = $_FILES['image'];
// Write and prepare sql
$sql = "INSERT INTO bota_product (title, description, price, img, user_id) VALUES(:title, :description, :price, :img, :user_id)";

$stmt = $conn->prepare($sql);
// Bind value
$stmt->bindValue(":title", $title);
$stmt->bindValue(":description", $description);
$stmt->bindValue(":price", $price);
if($file['size'] > 0){
    $fileName = '../uploads/'.time().'-'.$file['name'];
    $stmt->bindValue(":img", $fileName);
    move_uploaded_file($file['tmp_name'], $fileName);
} else {
    $stmt->bindValue(":img", 'noimage.png');
}
$stmt->bindValue(":user_id", $userID);
//Execute
$check =  $stmt->execute();

// Redirect to list page
if($check) header("location: ../index.php"); 
else dd($stmt->errorInfo());


?>