<?php

include("conexion.php");

$letraSeccion = $_POST['letraSeccion'];
$anioSeccion = $_POST['anioSeccion'];

$consulta = mysqli_query($conexion,"SELECT * FROM seccion WHERE letra='$letraSeccion' AND anio=$anioSeccion");

if (mysqli_num_rows($consulta) > 0) {
	echo 'LA SECCIÓN <b>'.$anioSeccion.''.$letraSeccion.'</b> YA EXISTE';	
}else{
	$consulta = mysqli_query($conexion,"INSERT INTO seccion(letra,anio) VALUES ('$letraSeccion',$anioSeccion)");

		if ($consulta) {
			echo 'SE HA CREADO LA SECCIÓN <b>'.$anioSeccion.''.$letraSeccion.'</b> CORRECTAMENTE';
		}else{
			echo "HA OCURRIDO UN ERROR AL CREAR LA SECCIÓN";
		}
}

?>