<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bota PHP Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php 
  // Thay đổi nếu domain dạng : localhost/abcdef
   $domain =  $_SERVER['SERVER_NAME'];
   // truy xuất user role từ session
   session_start();
   $email = $_SESSION['email'];
   $role = $_SESSION['role'];
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="//<?= $domain ?>">BOTA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="//<?= $domain ?>">Products</a>
      </li>
      <?php if(isset($role) && $role == 3) : ?>
      <li class="nav-item">
        <a class="nav-link" href="//<?= $domain ?>/user">User</a>
      </li>
      <?php endif; ?>

      
    </ul>
   
    <ul class="navbar-nav">
    <?php if(isset($email)) :  ?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Xin chào <?= $email ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="//<?= $domain ?>/user/handleLogout.php">Logout</a>
        </div>
      </li>
    <?php  else: ?>
      <li class="nav-item">
        <a class="nav-link" href="//<?= $domain ?>/login.php">Login</a>
      </li>
    <?php endif; ?>
    </ul>
   
  </div>
</nav>