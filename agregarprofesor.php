<?php

include("conexion.php");

$cedulaProfesor = $_POST['cedulaProfesor'];
$nombreProfesor = $_POST['nombreProfesor'];

$consulta = mysqli_query($conexion,"SELECT * FROM profesor WHERE ci=$cedulaProfesor");

if (mysqli_num_rows($consulta) > 0) {
	echo "Existe un profesor con esta cédula ya registrado";
}else{
	$consulta = mysqli_query($conexion,"INSERT INTO profesor(ci,nombre) VALUES ($cedulaProfesor,'$nombreProfesor')");

		if ($consulta) {
			echo "Se ha registrado el profesor correctamente";
		}else{
			echo "Ha ocurrido un error";
		}
}

?>