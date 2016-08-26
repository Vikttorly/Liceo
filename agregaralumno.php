<?php

include("conexion.php");

$cedulaAlumno = $_POST['cedulaAlumno'];
$nombreAlumno = $_POST['nombreAlumno'];
$edadAlumno = $_POST['edadAlumno'];

$consulta = mysqli_query($conexion,"SELECT * FROM alumno WHERE ci=$cedulaAlumno");

if (mysqli_num_rows($consulta) > 0) {
	echo 'EL ALUMNO <b>'.$nombreAlumno.'</b> CON CÉDULA <b>'.$cedulaAlumno.'</b> YA ESTÁ REGISTRADO';
}else{
	$consulta = mysqli_query($conexion,"INSERT INTO alumno(ci,nombre,edad) VALUES ($cedulaAlumno,'$nombreAlumno',$edadAlumno)");
		if ($consulta) {
			echo 'EL ALUMNO <b>'.$nombreAlumno.'</b> CON CÉDULA <b>'.$cedulaAlumno.'</b> SE HA AGREGADO EXITOSAMENTE';
		}else{
			echo 'HA OCURRIDO UN ERROR';
		}
}

?>