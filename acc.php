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
    <link rel="preload" href="css/clientes.css">
    <link rel="stylesheet" href="css/clientes.css">
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
<section class="contenedor">

	
	<h2 class="titulo">Contratos vigentes en ACC</h2>
	<section class="instrucciones">
		<h5>
			El circulo verde en el area del status del seguro indicara su validez, en caso de estar en rojo indicara que la unidad esta desprotegida por falta de pago o  por falta de renovación.
		</h5>
	</section>
	<section class="fondo">
		
		<div class="pantalla">
			
			<section class="datos">
				<img src="img/car.png" alt="" class="autos">
				<h3>Contrato: 6565</h3>
				<h3>Unidad: GRAND I10 4 PUERTAS GLS MANUAL 4CIL GASOLINA</h3>
				<h3>Placa: VBG027A</h3>
				<h3>Serie: MALA84BC5KM357839</h3>

		</section>
		<section class="seguro">
			<h3 class="seguro">Estatus del seguro <h4 class="circulo"></h4></h3>
		</section>
		<section class="seguro">	
			<h3 class="seguro">Tenencia <h4 class="red"></h4></h3>
		</section>
		<section class="seguro">
			<h3 class="seguro">verificacion <h4 class="circulo"></h4></h3>
		</section>
		<section class="seguro">
			<h3 class="seguro">mantenimiento <h4 class="circulo"></h4></h3>			
		</section>
		<section class="operaciones">



				<a href="">Seguro</a>
				<a href="cfdi.php" NAME="cfdi"> rentas/CFDI</a>
		</section>
	</div>
	<div class="pantalla">
		
		<section class="datos">
			<img src="img/car.png" alt="" class="autos">
			<h3>Contrato: 6565</h3>
			<h3>Unidad: GRAND I10 4 PUERTAS GLS MANUAL 4CIL GASOLINA</h3>
			<h3>Placa: VBG027A</h3>
			<h3>Serie: MALA84BC5KM357839</h3>
		</section>
		<section class="seguro">
			<h3 class="seguro">Estatus del seguro <h4 class="red"></h4></h3>			
		</section>
		
		<section class="operaciones">
			<a href="">Seguro</a>
			<a href="cfdi.php"> rentas/CFDI</a>
		</section>
	</div>
	<div class="pantalla">
		
		<section class="datos">
			<img src="img/car.png" alt="" class="autos">
			<h3>Contrato: 6565</h3>
			<h3>Unidad: GRAND I10 4 PUERTAS GLS MANUAL 4CIL GASOLINA</h3>
			<h3>Placa: VBG027A</h3>
			<h3>Serie: MALA84BC5KM357839</h3>
		</section>
		<section class="seguro">
			<h3 class="seguro">Estatus del seguro <h4 class="circulo"></h4></h3>			
		</section>
		
		<section class="operaciones">
			<a href="">Seguro</a>
			<a href="cfdi.php"> rentas/CFDI</a>
		</section>
	</div>
	<div class="pantalla">
		
		<section class="datos">
			<img src="img/car.png" alt="" class="autos">
			<h3>Contrato: 6565</h3>
			<h3>Unidad: GRAND I10 4 PUERTAS GLS MANUAL 4CIL GASOLINA</h3>
			<h3>Placa: VBG027A</h3>
			<h3>Serie: MALA84BC5KM357839</h3>
		</section>
		<section class="seguro">
			<h3 class="seguro">Estatus del seguro <h4 class="circulo"></h4></h3>			
		</section>
		
		<section class="operaciones">
			<a href="">Seguro</a>
			<a href="cfdi.php"> rentas/CFDI</a>
		</section>
	</div>
	<div class="pantalla">
		
		<section class="datos">
			<img src="img/car.png" alt="" class="autos">
			<h3>Contrato: 6565</h3>
			<h3>Unidad: GRAND I10 4 PUERTAS GLS MANUAL 4CIL GASOLINA</h3>
			<h3>Placa: VBG027A</h3>
			<h3>Serie: MALA84BC5KM357839</h3>
		</section>
		<section class="seguro">
			<h3 class="seguro">Estatus del seguro <h4 class="red"></h4></h3>			
		</section>
		
		<section class="operaciones">
			<a href="">Seguro</a>
			<a href="cfdi.php"> rentas/CFDI</a>
		</section>
	</div>
	<div class="pantalla">
		
		<section class="datos">
			<img src="img/car.png" alt="" class="autos">
			<h3>Contrato: 6565</h3>
			<h3>Unidad: GRAND I10 4 PUERTAS GLS MANUAL 4CIL GASOLINA</h3>
			<h3>Placa: VBG027A</h3>
			<h3>Serie: MALA84BC5KM357839</h3>
		</section>
		<section class="seguro">
			<h3 class="seguro">Estatus del seguro <h4 class="circulo"></h4></h3>			
		</section>
		
		<section class="operaciones">
			<a href="">Seguro</a>
			<a href="cfdi.php"> rentas/CFDI</a>
		</section>
	</div>
	
	</section>
</body>
</html>