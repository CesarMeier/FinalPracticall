<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
   
</head>
<body>


  <?php
    include('header.php');
    include('portafolio.php');
    include('info.php');
    include('footer.php');
  ?>
  
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="js/barra.js"></script>

</body>

</html>