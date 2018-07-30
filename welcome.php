<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="icon" href="img/clock.ico">
  <title>User Form</title>
  <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/nav.css" type="text/css">
  <link rel="stylesheet" href="css/form.css" type="text/css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html"><img src="img/clock.svg" class="clock" style="margin-right: 5px; margin-top: -15px; width: 100px;"></img><span class="bigFont">O</span>n Time Attendance</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"><i class="fa fa-home" style="margin-right: 5px;"></i>Home <span class="sr-only"></span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="dashboard.html"><i class="fa fa-tachometer" aria-hidden="true" style="margin-right: 5px;"></i>Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-in" aria-hidden="true" style="margin-right: 5px;"></i>Log-In</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="form.php"><i class="fa fa-user-plus" aria-hidden="true" style="margin-right: 5px;"></i>Register</a>
            <a class="dropdown-item" href="#"><i class="fa fa-sign-in" aria-hidden="true" style="margin-right: 5px;"></i>Sign-In</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="fa fa-server" aria-hidden="true" style="margin-right: 5px;"></i>Products</a>
          </div>
        </li>
        </ul>
      </div>
  </nav>
<?php
session_start();
?>
<div class="body content">
  <div class="welcome">
    <div class="alert alert-success"><?php $_SESSION['message'] ?></div>
    <span class="user"><img src='<?php $_SESSION['avatar'] ?>'</span><br>
    Bienvenidos! <span class="user"><?php $_SESSION['usuario'] ?></span>

    <?php

    $mysqli = new mysqli('localhost', 'erikjames', 'BeOnTime!', 'accounts');
    $sql = 'SELECT usuario, avatar FROM users';
    $result = $mysqli->query($sql); // $result = mysqli_result object

    ?>

<div id="registered">
  <span>Todos los usuarios registrados</span>
  <?php
    while( $row = $result->fetch_assoc() ) {
      echo "<div class='userlist'><span>$row[usuario]</span><br>";
      echo "<img src='$row[avatar]'></div>";
      }
      echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
  ?>
</div>
</div>
<footer class="footer">
  <div class="container">
    <span class="text-muted">&copy; 2018 Erik Robles All Rights Reserved.</span>
  </div>
  <br><br>
</footer>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
