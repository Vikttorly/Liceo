<?php

include("conexion.php");

$anio = $_POST['anio'];
$periodo = 1;

$consulta = mysqli_query($conexion,"SELECT * FROM anio WHERE anio=$anio");

if (mysqli_num_rows($consulta) > 0) {
	echo "Este año ya existe";
}else{

	$insertar = mysqli_query($conexion,"INSERT INTO anio(anio,periodo) VALUES ($anio,$periodo)");

		if ($insertar) {
			echo "Se ha guardado el año";
		}else{
			echo "Hubo un error";
		}

}

?>