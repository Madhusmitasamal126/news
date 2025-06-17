<?php
include 'config.php';
?>
<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location:$hostname/admin/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
    <style>
      a{
        text-decoration:none;
      }
    </style> 
     
</head>
<body class="container mt-4">
     <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">News</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <img src="img/logo.jpg" alt="" width="90px">
         </div>
         <!-- <h3 class="text-success">Hello Madhu</h3> -->
         <a href="logout.php">Hello <?php  echo strtoupper($_SESSION['username'])?>,Logout</a>
    <!-- <button class="btn btn-outline-success" type="logout">Logout</button> -->
  </div>
</nav>
<nav class="navbar navbar-expand-lg bg-body-tertiary mt-2 p-2">
  <div class="container">
    <a class="navbar-brand p-2" href="post.php">POST</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="category.php">CATEGORY</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="users.php">USERS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="setting.php">SETTING</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
        