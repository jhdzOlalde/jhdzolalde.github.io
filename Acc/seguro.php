<?php

// Se inicializa la sesión

session_start();



/* Se comprueba si el usuario ha iniciado sesión, si no, se redirecciona

 a la página de inicio de sesión (login.php)*/

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

    header("location: login.php");

    exit;

}
$aseguradora =1;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACC</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,700&display=swap" rel="stylesheet">

    <link rel="preload" href="css/normalize.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preload" href="css/seguro.css">
    <link rel="stylesheet" href="css/seguro.css">
</head>
<body>
<header>
<section class="navegador">
	<h1 class = "nombre">
		numero de cliente: <?php echo htmlspecialchars($_SESSION["id"]); ?>
	</h1>
	<img src="img/logo3.png" class= "acc" alt="">
	<h1 class= "cliente">
		Bienvenido <?php echo htmlspecialchars($_SESSION["username"]); ?>
	</h1>
</section>

</header>
<section class="seg">
    <img  class="aseguradora" src="img/aseguradora.jpg" alt="">
</section>
    <h2>Poliza de seguro </h2>
    <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-100.8310049771717%2C20.552033072775714%2C-100.82462131971626%2C20.5558253854388&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/#map=18/20.55393/-100.82781">Ver mapa más grande</a></small>
        
</body>
</html>