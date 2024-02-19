<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Website Gallery Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
        
    </div>
      
      <a href="album.php" class="btn btn-outline-success bg-success m-1">Album</a>
      <a href="foto.php" class="btn btn-outline-success bg-Warning m-1">Foto</a>
      <a href="logout.php" class="btn btn-outline-success m-1">Logout</a>


    </div>
  </div>
</nav>
    <h1>Halaman Home</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    
 
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
   
</body>
</html