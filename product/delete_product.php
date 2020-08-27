<?php
// 1. Connect to Database
require_once "../config.php";

// 2. Collect Data from FORM
$id = $_GET['id'];

$sql1 = "SELECT * FROM bota_product WHERE id = :id";
$stmt1 = $conn->prepare($sql1);
$stmt1->bindValue(":id", $id);
$stmt1->execute();

$product = $stmt1->fetch();

if(!$product){
    echo "San pham khong ton tai"; die;
}

// Delete image
unlink($product['img']);


$sql = "DELETE from bota_product WHERE id=:id";

$stmt =  $conn->prepare($sql);
$stmt->bindValue(":id", $product['id']);

$check = $stmt->execute();
if($check ){
    header("location: ../index.php");
} else {
    echo "Delete that bai: <br>"; 
    dd($stmt->errorInfo());
   
}