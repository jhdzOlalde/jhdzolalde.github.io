<?php

// Se inicializa la sesión

session_start();



/* Se comprueba si el usuario ha iniciado sesión, si no, se redirecciona

 a la página de inicio de sesión (login.php)*/

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

    header("location: login.php");

    exit;

}
?>





<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acc</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,700&display=swap" rel="stylesheet">

    <link rel="preload" href="css/normalize.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preload" href="css/cfdi.css">
    <link rel="stylesheet" href="css/cfdi.css">
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

<h2 class="titulo">Datos del contrato y CFDI</h2>

<h2 class="leyenda">Da click en el numero de renta para ver especificaciones </h1>

<section class="juntos">
    <section class="datos">
        <h3>Fecha de inicio 20/05/2020</h3>
        <h3>Fecha de fin 20/04/2023</h3>
        <h3>Ampliacion de contrato 6565</h3>
    </section>
    <section class="datos">
        <h3>Periodo del contrato 35/48</h3>
        <h3>Tipo de contrato GENERAL </h3>
        <h3>Promotor: GERARDO BOLAÑOS PÉREZ </h3>
    </section>
</section>
<h2>información</h2>

<div class="margen">

    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Renta</th>
                    <th>Total</th>
                    <th>Saldo</th>
                    <th>Status</th>
                </tr> 
            </thead>
                
                <?php
                	include("function.php");
                ?>
                <?php
	$sql = "select * from cfdi";
	$result = db_query($sql);
	while($row = mysqli_fetch_object($result)){
	?>
	<tr>
		 <td><?php echo $row->fecha;?></td>
         <td><a href="factura.php"><?php echo $row->RENTA;?></a></td>
         <td><?php echo $row->TOTAL;?></td>
		 <td><?php echo $row->SALDO;?></td>
         <td><?php echo $row->ESTATUS;?></td>
        </tr>
	<?php } ?>

            
    </div>
</section>
</table>
</body>
</html>