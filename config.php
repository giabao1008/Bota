<?php 

$host   = 'localhost';
$dbname = 'bota';
$user   = 'root';
$password = 'mysql';
try {
    $conn = new PDO("mysql:host=$host; dbname=$dbname;charset=utf8", $user, $password);
} catch(PDOException $e){
    echo $e->getMessage();die;
}

// Dump and die for test :D
function dd($x){
    var_dump($x);
    die;
}

function checkLogin(){
    session_start();
    $email = $_SESSION['email'];
    return isset($email);
}

function canHandle(){
    session_start();
    $role = $_SESSION['role'];
    return checkLogin() && $role != 1;
}

function isAdmin(){
    session_start();
    $role = $_SESSION['role'];
    return $role == 3;
}
?>