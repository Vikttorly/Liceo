<?php

include("conexion.php");

$anioSeccion = $_POST['anioSeccion'];
$letraSeccion = $_POST['letraSeccion'];

$consulta = mysqli_query($conexion,"SELECT * FROM alumno WHERE anio=$anioSeccion AND seccion='$letraSeccion'");

if (mysqli_num_rows($consulta) > 0) {


	while ($resultado = mysqli_fetch_assoc($consulta)) {
		$ci = $resultado['ci'];
		$nombre = $resultado['nombre'];
		$edad = $resultado['edad'];
		echo $nombre.' '.$ci.' '.$edad;
	}

}else{
	echo "No hay alumnos inscritos en esta seccion";
}

?>