<?php 

$host   = 'localhost';
$dbname = 'bota';
$user   = 'root';
$password = '';
try {
    $conn = new PDO("mysql:host=$host; dbname=$dbname;", $user, $password);
} catch(PDOException $e){
    echo $e->getMessage();die;
}

// Dump and die for test :D
function dd($x){
    var_dump($x);
    die;
}
?>