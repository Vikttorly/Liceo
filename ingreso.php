<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">
	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>Inicio</title>
</head>
<body>

	<header>
		<div class="container">
			<a href="/liceo" style="text-decoration: none; color: #fff;"><h1><i class="fa fa-credit-card" aria-hidden="true"></i> liceo</a></h1>
		</div>
	</header>	

<?php

error_reporting(0);
include("conexion.php");

$usuario = $_POST['usuario_ingreso'];
$clave = $_POST['clave_ingreso'];

//Comprobando si se envió el formulario

if (isset($_POST['enviar_ingreso'])) {

	//Comprobando si el usuario o clave ingresado es correcto

	$sql = "SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$clave'";
	$consulta = mysqli_query($conexion,$sql);
	$datos = mysqli_fetch_assoc($consulta);

	if ($usuario == $datos['usuario'] and $clave == $datos['clave']) {

		//En caso del usuario y clave sea correcto

		session_start();

		$_SESSION['usuario'] = $usuario;

		echo '

		<div class="container">
  			<div class="">
  				<div align="center" style="margin-top: 16%;">
    				<h1 class="text-sm-center text-success"> <i class="fa fa-spinner fa-spin"></i></i> Iniciando Sesión</h1>
    			</div>
  			</div>
		</div>>

		';

		header("Status: 301 Moved Permanently", false, 301);
		header("Location: tablero.php");

	}else{

		//De ser incorrecto el usuario y/o clave

		echo '

		<div class="container">
  			<div class="">
  				<div align="center" style="margin-top: 16%;">
    				<h1 class="text-sm-center text-danger"><i class="fa fa-times fa-2x"></i> Usuario y/o clave inválidos </h1>
    				 <div align="center">
    					<a href="/liceo" style="text-decoration:none;"><div class="boton-estandar">INTENTAR DE NUEVO</div></a>
    				</div>
    			</div>
  			</div>
		</div>>

		';

	}

}else{

	/*En caso de que no se halla ingresado por el formulario sino que se halla entrado al documento ingreso.php directamente desde el navegador, se muestra en siguiente error: */	

echo '

		<div class="container">
  			<div class="">
  				<div align="center" style="margin-top: 16%;">
    				<h1 class="text-sm-center text-danger"> <i class="fa fa-chain-broken fa-2x"></i> Error de página</h1>
    				<meta http-equiv="Refresh" content="3;url=/liceo">
    			</div>
  			</div>
		</div>>

	';

}

?>

<footer>
	<div class="container-fluid">
		<h3>Nombre liceo</h3>
	</div>
</footer>

</body>
</html>