<!doctype html>

<html lang="es">
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
$_SESSION['message'] = '';
$mysqli = new mysqli('localhost', 'erikjames', 'BeOnTime!', 'accounts');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // two passwords are equal to each other.
  if ($_POST['clave'] == $_POST['confirmarclave']) {


      $usuario = $mysqli->real_escape_string($_POST['usuario']);
      $email = $mysqli->real_escape_string($_POST['email']);
      $clave = md5($_POST['clave']); // md5 hash password security
      $avatar_path = $mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);

      // make sure file type is image
      if (preg_match("!image!",$_FILES['avatar']['type'])) {

        //copy image to images/ folder
        if (copy($_FILES['avatar']['tmp_name'], $avatar_path)) {

          $_SESSION['usuario'] = $usuario;
          $_SESSION['avatar'] = $avatar_path;

          $sql = "INSERT INTO users (usuario, email, clave, avatar)"
                  . "VALUES ('$usuario', '$email', '$clave', '$avatar_path')";

                  // if the query is successful, redirect to welcome.php page, done!
                  if ($mysqli->query($sql) === true) {
                    $_SESSION['message'] = "Registro exitoso!  $usuario agregado al base de datos!";
                    header("location: welcome.php");
            } else {
              $_SESSION['message'] = "Usuario no pudo ser agregado al base de datos.";
            }
        } else {
          $_SESSION['message'] = "El archivo no se subió!";
        }
      } else {
        $_SESSION['message'] = "Solo puede subir GIF, JPG, o imagenes PNG!";
      }
  } else {
    $_SESSION['message'] = "Los dos contraseñas no coinciden!";
  }
}

?>
  <div class="body-content">
    <div class="module">
      <h1>Crea Una Cuenta</h1>
      <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="alert alert-error"><?php $_SESSION['message'] ?></div>
        <input type="text" placeholder="Usuario" name="usuario" required />
        <input type="email" placeholder="Email" name="email" required />
        <input type="password" placeholder="Contraseña" name="clave" autocomplete="new-password" required />
        <input type="password" placeholder="Confirma Contraseña" name="confirmarclave" autocomplete="confirmarclave" required />
        <div class="avatar"><label>Eliges tu avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>
        <input type="submit" value="Regístrate" name="register" class="btn btn-block btn-primary" />
      </form>
    </div>
  </div>
  <footer class="footer">
    <div class="container">
      <span class="text-muted">&copy; 2018 Cervantes - Robles All Rights Reserved.</span>
    </div>
    <br><br><br>

  </footer>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
