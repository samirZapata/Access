<?php
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['tipo_usuario'] == "admin") {
        header('Location: admin/datos.php');
    }
    else if ($_SESSION['user']['tipo_usuario'] == "user") {
        header("Location: logica/user/inicio.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=BIZ+UDPMincho&display=swap" rel="stylesheet" />
</head>
<body>
<div class="container">
    <div class="wrapper">
      <div class="title"><span>Login</span></div>
      <form action="" id="formlg">
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="text" name="userlg" placeholder="Usuario" required />
        </div>

        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" name="passlg" placeholder="Contraseña" required />
        </div>

        <div class="pass"><a href="#">¿Olvidaste la contraseña no?</a></div>
        <div class="row btn">
          <input type="submit" class="btnlg" value="Ingresar">
        </div>
        <div class="registro">¿No tienes usuario? <a href="#">Registrarme</a></div>
      </form>
    </div>
  </div>
  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/main.js"></script>
</body>
</html>