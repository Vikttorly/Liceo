<?php

include("conexion.php");

$anio = $_POST['anio'];

$consulta = mysqli_query($conexion,"SELECT * FROM anio WHERE anio=$anio");

if (mysqli_num_rows($consulta) > 0) {
	echo "Este año ya existe";
}else{
	echo "Exte año no existe";
}

?>