<?php
// 1. Connect to Database
require_once "../config.php";

// 2. Collect Data from FORM
$id = $_POST['id'];
$title = $_POST['title'];
$price = $_POST['price'];
$image = $_FILES['image'];
$description = $_POST['description'];

$sql1 = "SELECT * FROM bota_product WHERE id = :id";
$stmt1 = $conn->prepare($sql1);
$stmt1->bindValue(":id", $id);
$stmt1->execute();

$product = $stmt1->fetch();

if(!$product){
    echo "San pham khong ton tai"; die;
}
if($image['size'] > 0){
    $sql = "UPDATE bota_product set title =:title, price =:price, img=:img, description=:description, user_id=:user_id WHERE id=:id";
    
} else {
    $sql = "UPDATE bota_product set title =:title, price =:price, description=:description, user_id=:user_id WHERE id=:id";
}
$stmt =  $conn->prepare($sql);

$stmt->bindValue(":title", $title);
$stmt->bindValue(":price", $price);
if($image['size'] > 0){    
    $fileName = '../uploads/'.time().'-'.$image['name'];
    $stmt->bindValue(":img", $fileName);
    move_uploaded_file($image['tmp_name'], $fileName);

    $stmt->bindValue(":img", $fileName);
}
$stmt->bindValue(":description", $description);
$stmt->bindValue(":user_id", 1);
$stmt->bindValue(":id", $product['id']);

$check = $stmt->execute();
if($check ){
    header("location: ../index.php");
} else {
    echo "Update that bai: <br>"; 
    dd($stmt->errorInfo());
   
}