<?php
session_start();
if (isset($_SESSION['session'])) {
    header("Location: ../../index.php"); //Solo entras si no estas logueado
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/login-style.css">
</head>
<body>
  <h1 class="echo"><?php 
    echo isset($_SESSION['session']) ? $_SESSION['session'] : "No se inició sesión";
  ?></h1>
    <img src="https://png.pngtree.com/background/20230610/original/pngtree-an-empty-gym-with-some-machines-picture-image_3105884.jpg" class="fondo-imagen"> 
<form action="../../controladores/usuarios.controlador.php" method="POST"> 
  <input type="hidden" name="action" value="login">

  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="email" name="email-usuario" id="form2Example1" class="form-control form-input-background" />
    <label class="form-label" for="form2Example1">Email</label>
  </div>

  <!-- Password input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="password" name="password-usuario" id="form2Example2" class="form-control form-input-background" />
    <label class="form-label" for="form2Example2">Contraseña</label>
  </div>
  

  <!-- 2 column grid layout for inline styling -->
  
  <div class="text-center">
  <input class="login-button"type="submit" value="logearse">
    
  </div>
  
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>