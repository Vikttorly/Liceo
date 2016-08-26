<?php

include("conexion.php");

$nombreMateria = $_POST['nombreMateria'];
$anioMateria = $_POST['anioMateria'];

$consulta = mysqli_query($conexion,"INSERT INTO materia (nombre,anio) VALUES ('$nombreMateria',$anioMateria)");

	if ($conexion) {
		echo 'SE HA CREADO LA MATERIA <b>'.$nombreMateria.'</b> CORRECTAMENTE';
	}else{
		echo 'HA OCURRIDO UN ERROR AL CREAR LA MATERIA';
	}

?>