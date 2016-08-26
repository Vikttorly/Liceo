<?php

include("conexion.php");
session_start();

if ($_SESSION['usuario']) {

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tablero de administracion</title>
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">
	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse" style="border-radius: 0px;">
  <div class="container-fluid">

    <div class="navbar-header">
      <a class="navbar-brand" href="#"> Tablero</a>
    </div>

    <ul class="nav navbar-nav">

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Año
        <span class="caret"></span></a>
        <ul class="dropdown-menu">

			<li><a href="#" id="ClickCrearAño">Crear Año</a></li>
			<li><a href="#" id="ClickAdministrarAño">Administrar Año</a></li>

        </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="">Materias
        <span class="caret"></span></a>
        <ul class="dropdown-menu">

        	<li><a href="#" id="ClickCrearMateria">Crear Materia</a></li>
        	<li><a href="#" id="ClickAdministrarMateria">Administrar Materia</a></li>

        </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="">Sección
        <span class="caret"></span></a>
        <ul class="dropdown-menu">

        	<li><a href="#" id="ClickCrearSeccion">Crear Sección</a></li>
        	<li><a href="#" id="ClickAdministrarSeccion">Administrar Sección</a></li>

        </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="">Profesor
        <span class="caret"></span></a>
        <ul class="dropdown-menu">

        	<li><a href="#" id="ClickCrearProfesor">Añadir Profesor</a></li>
        	<li><a href="#" id="ClickAdministrarProfesor">Administrar Profesores</a></li>

        </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="">Alumno
        <span class="caret"></span></a>
        <ul class="dropdown-menu">

        	<li><a href="#" id="ClickInscribirAlumno">Inscribir Alumno</a></li>
        	<li><a href="#" id="ClickAdministrarAlumno">Administrar Alumnos</a></li>

        </ul>
      </li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="javascript:cerrarSesion()"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesion</a></li>
    </ul>
  </div>
</nav>

<div class="container">

	<!--SECCIÓN PARA CREAR AÑO-->

	<div id="CrearAño" align="center" style="margin-top:10%;">

	<div id="respuestaCrearAño"></div>

	<div id="FormCrearAño">
		<h2>CREAR AÑO</h2><br>
		<form class="form-inline" autocomplete="off">
  			<div class="form-group">
    			<input type="email" class="form-control" id="InputCrearAño" placeholder="Año" maxlength="1" onkeypress="return soloNumeros(event);">
  			</div>
  			<button class="btn btn-default" id="BotonCrearAño">Crear</button>
		</form>

		<script>
			 $("#BotonCrearAño").click(function() {
			 	var anio = $('#InputCrearAño').val();

			 		if (anio.length < 1) {
			 			$("#InputCrearAño").css("border-color", "#d23737");

			 		}else{
			 			var url = "crearanio.php";
			 			$.ajax({
                    	type: "POST",
                    	url: url,
                    	data:{
                    		anio
                    	}, 
                    	success: function(data)
                    	{
                        	$("#respuestaCrearAño").html(data); 
                        	$('#FormCrearAño').hide();
                    	}
                    	});
			 		}

				return false;
            });  
		</script>

	</div>

	</div>

	<!--FIN SECCIÓN PARA CREAR AÑO-->

	<!--SECCIÓN PARA ADMINISTRAR AÑO-->

	<div id="AdministrarAño">
		Administrar Año
	</div>

	<!--FIN SECCIÓN PARA ADMINISTRAR AÑO-->

	<!--SECCIÓN PARA CREAR MATERIA-->

	<div id="CrearMateria" align="center" style="margin-top:10%;">
		
		<div id="respuestaCrearMateria"></div>
		<div id="FormCrearMateria">
		<h2>CREAR MATERIA</h2><br>
		<form class="form-inline">
			<div class="form-group">
    			<select class="form-control" id="anioMateria">
    			<option value="0">SELECCIONAR AÑO</option>
    				<?php

    					$consulta = mysqli_query($conexion,"SELECT * FROM anio");

    					while ($resultado = mysqli_fetch_assoc($consulta)) {
    						echo '<option value="'.$resultado['anio'].'">'.$resultado['anio'].'º Año</option>';
    					}

    				?>
    			</select>
  			</div>
			
  			<div class="form-group">
    			<input type="text" class="form-control" id="nombreMateria" placeholder="NOMBRE MATERIA" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" size="30">
  			</div>
  			
  			<button class="btn btn-default" id="BotonCrearMateria">Agregar</button>
		</form>
		</div>

		<script>

			$('select#anioMateria').on('change',function(){
    				var anioMateria = $(this).val();
    				
    			$("#BotonCrearMateria").click(function() {
			 	var nombreMateria = $('#nombreMateria').val();
			 	var c1 = false;
			 	var c2 = false;

			 		if (nombreMateria.length < 5) {
			 			$("#nombreMateria").css("border-color", "#d23737");
			 			var c1 = false;

			 		}else{
			 			$("#nombreMateria").css("border-color", "#92c54f");
			 			var c1 = true;
			 		}

			 		if (anioMateria == 0) {
			 			$("#anioMateria").css("border-color", "#d23737");
			 			var c2 = false;
			 		}else{
			 			$("#anioMateria").css("border-color", "#92c54f");
			 			var c2 = true;
			 		}

			 		if ((c1 == true) && (c2 == true)) {
			 			var url = "crearmateria.php";
			 			$.ajax({
                    	type: "POST",
                    	url: url,
                    	data:{
                    		nombreMateria,
                    		anioMateria
                    	}, 
                    	success: function(data)
                    	{
                        	$("#respuestaCrearMateria").html(data); 
                        	$('#FormCrearMateria').hide();
                    	}
                    	});
			 		}

				return false;
            });  
		});
		</script>

	</div>

	<!--FIN SECCIÓN PARA CREAR MATERIA-->

	<!--SECCIÓN PARA ADMINISTRAR MATERIA-->

	<div id="AdministrarMateria">
		Administrar Materia
	</div>

	<!--FIN SECCIÓN PARA ADMINISTRAR MATERIA-->

	<!--SECCIÓN PARA CREAR SECCIÓN-->

	<div id="CrearSección" align="center" style="margin-top:10%;">
		<div id="respuestaCrearSeccion"></div>
		<div id="FormCrearSeccion">
		<h2>CREAR SECCIÓN</h2><br>
		<form class="form-inline">
			<div class="form-group">
    			<select class="form-control" id="anioSeccion">
    			<option value="0">SELECCIONAR AÑO</option>
    				<?php

    					$consulta = mysqli_query($conexion,"SELECT * FROM anio");

    					while ($resultado = mysqli_fetch_assoc($consulta)) {
    						echo '<option value="'.$resultado['anio'].'">'.$resultado['anio'].'º Año</option>';
    					}

    				?>
    			</select>
  			</div>
			
  			<div class="form-group">
    			<input type="text" class="form-control" id="letraSeccion" placeholder="LETRA" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" size="3" onkeypress="return soloLetras(event);" maxlength="1">
  			</div>
  			
  			<button class="btn btn-default" id="BotonCrearSeccion">Crear</button>
		</form>
		</div>

		<script>

			$('select#anioSeccion').on('change',function(){
    				var anioSeccion = $(this).val();
    				
    			$("#BotonCrearSeccion").click(function() {
			 	var letraSeccion = $('#letraSeccion').val();
			 	var c1 = false;
			 	var c2 = false;

			 		if (letraSeccion.length < 1) {
			 			$("#letraSeccion").css("border-color", "#d23737");
			 			var c1 = false;

			 		}else{
			 			$("#letraSeccion").css("border-color", "#92c54f");
			 			var c1 = true;
			 		}

			 		if (anioSeccion == 0) {
			 			$("#anioSeccion").css("border-color", "#d23737");
			 			var c2 = false;
			 		}else{
			 			$("#anioSeccion").css("border-color", "#92c54f");
			 			var c2 = true;
			 		}

			 		if ((c1 == true) && (c2 == true)) {
			 			var url = "crearseccion.php";
			 			$.ajax({
                    	type: "POST",
                    	url: url,
                    	data:{
                    		letraSeccion,
                    		anioSeccion
                    	}, 
                    	success: function(data)
                    	{
                        	$("#respuestaCrearSeccion").html(data); 
                        	$('#FormCrearSeccion').hide();
                    	}
                    	});
			 		}

				return false;
            });  
		});
		</script>

	</div>

	<!--FIN SECCIÓN PARA CREAR SECCIÓN-->

	<!--SECCIÓN PARA ADMINISTRAR SECCIÓN-->

	<div id="AdministrarSección" >
		<form class="form-inline" autocomplete="off">
  			<div class="form-group">
    			<select class="form-control" id="anioAdministrarSeccion">
    			<option value="0">SELECCIONAR AÑO</option>
    				<?php

    					$consulta = mysqli_query($conexion,"SELECT * FROM anio");

    					while ($resultado = mysqli_fetch_assoc($consulta)) {
    						echo '<option value="'.$resultado['anio'].'">'.$resultado['anio'].'º Año</option>';
    					}

    				?>
    			</select>
  			</div>

  			<div id="seleccionarSeccion" class="form-group"></div>

  			<script>
  				$('select#anioAdministrarSeccion').on('change',function(){
  					var anioAdministrarSeccion = $(this).val();
  					if (anioAdministrarSeccion == 0) {
  							$('#seleccionarSeccion').hide();
  					}else{
  					$('#seleccionarSeccion').show();
  					var url = "modulos.php";
			 		$.ajax({
                    type: "POST",
                    url: url,
                    data:{
                    	anioAdministrarSeccion
                    }, 
                    success: function(data)
                    {
                        $("#seleccionarSeccion").html(data); 
                    }
                    });
  					}
  				});
  			</script>
		</form>
	</div>

	<!--FIN SECCIÓN PARA ADMINISTRAR SECCIÓN-->

	<!--SECCIÓN PARA CREAR PROFESOR-->

	<div id="CrearProfesor" align="center" style="margin-top:10%;">

		<div id="respuestaCrearProfesor"></div>
		<div id="FormAgregarProfesor">
			<h2>AÑADIR PROFESOR</h2><br>
			<form class="form-inline" autocomplete="off">
  				<div class="form-group">
    				<input type="text" class="form-control" id="cedulaProfesor" placeholder="CEDULA" size="8" maxlength="8" onkeypress="return soloNumeros(event);">
  				</div>
  				<div class="form-group">
    				<input type="text" class="form-control" id="nombreProfesor" placeholder="Nombre y Apellido" size="30" onkeypress="return soloLetras(event);"  
    				style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
  				</div>
  				<button class="btn btn-default" id="BotonAgregarProfesor">Agregar</button>
			</form>

			<script>
			 $("#BotonAgregarProfesor").click(function() {
			 	var cedulaProfesor = $('#cedulaProfesor').val();
			 	var nombreProfesor = $('#nombreProfesor').val();
			 	var c1 = false;
			 	var c2 = false;

			 		if (cedulaProfesor.length < 7) {
			 			$("#cedulaProfesor").css("border-color", "#d23737");
			 			var c1 = false;
			 		}else{
			 			$("#cedulaProfesor").css("border-color", "#92c54f");
			 			var c1 = true;
			 		}

			 		if (nombreProfesor.length < 8) {
			 			$("#nombreProfesor").css("border-color", "#d23737");
			 			var c2 = false;
			 		}else{
			 			$("#nombreProfesor").css("border-color", "#92c54f");
			 			var c2 = true;
			 		}

			 		if ((c1 == true) && (c2 == true)) {

			 			var url = "agregarprofesor.php";
			 			$.ajax({
                    	type: "POST",
                    	url: url,
                    	data:{
                    		cedulaProfesor,
                    		nombreProfesor
                    	}, 
                    	success: function(data)
                    	{
                        	$("#respuestaCrearProfesor").html(data); 
                        	$('#FormAgregarProfesor').hide();
                    	}
                    	});

			 		}

				return false;
            });  
		</script>

		</div>	

	</div>

	<!--FIN SECCIÓN PARA CREAR PROFESOR-->

	<!--SECCIÓN PARA ADMINISTRAR PROFESOR-->

	<div id="AdministrarProfesor">
		Administrar Profesor
	</div>

	<!--FIN SECCIÓN PARA ADMINISTRAR PROFESOR-->

	<!--SECCIÓN PARA CREAR ALUMNO-->

	<div id="CrearAlumno" align="center" style="margin-top:10%;">
	<div id="respuestaCrearAlumno"></div>
		<div id="FormAgregarAlumno">
		<h2>INSCRIBIR ALUMNO</h2><br>
			<form class="form-inline" autocomplete="off">
  				<div class="form-group">
    				<input type="text" class="form-control" id="cedulaAlumno" placeholder="CEDULA" size="8" maxlength="8" onkeypress="return soloNumeros(event);">
  				</div>
  				<div class="form-group">
    				<input type="text" class="form-control" id="nombreAlumno" placeholder="Nombre y Apellido" size="30" onkeypress="return soloLetras(event);"  
    				style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
  				</div>
  				<div class="form-group">
    				<input type="text" class="form-control" id="edadAlumno" placeholder="EDAD" size="2" onkeypress="return soloNumeros(event);"  
    				style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="2">
  				</div>
  				<button class="btn btn-default" id="BotonAgregarAlumno">Agregar</button>
			</form>
		</div>

			<script>
			 $("#BotonAgregarAlumno").click(function() {
			 	var cedulaAlumno = $('#cedulaAlumno').val();
			 	var nombreAlumno = $('#nombreAlumno').val();
			 	var edadAlumno = $('#edadAlumno').val();
			 	var c1 = false;
			 	var c2 = false;
			 	var c3 = false;

			 		if (cedulaAlumno.length < 7) {
			 			$("#cedulaAlumno").css("border-color", "#d23737");
			 			var c1 = false;
			 		}else{
			 			$("#cedulaAlumno").css("border-color", "#92c54f");
			 			var c1 = true;
			 		}

			 		if (nombreAlumno.length < 8) {
			 			$("#nombreAlumno").css("border-color", "#d23737");
			 			var c2 = false;
			 		}else{
			 			$("#nombreAlumno").css("border-color", "#92c54f");
			 			var c2 = true;
			 		}

			 		if (edadAlumno.length < 2) {
			 			$("#edadAlumno").css("border-color", "#d23737");
			 			var c3 = false;
			 		}else{
			 			$("#edadAlumno").css("border-color", "#92c54f");
			 			var c3 = true;
			 		}

			 		if ((c1 == true) && (c2 == true) && (c3 == true)) {

			 			var url = "agregaralumno.php";
			 			$.ajax({
                    	type: "POST",
                    	url: url,
                    	data:{
                    		cedulaAlumno,
                    		nombreAlumno,
                    		edadAlumno
                    	}, 
                    	success: function(data)
                    	{
                        	$("#respuestaCrearAlumno").html(data); 
                        	$('#FormAgregarAlumno').hide();
                    	}
                    	});

			 		}

				return false;
            });  
		</script>
	</div>

	<!--FIN SECCIÓN PARA CREAR ALUMNO-->

	<!--SECCIÓN PARA ADMINISTRAR ALUMNO-->

	<div id="AdministrarAlumno">
		Administrar Alumno
	</div>

	<!--FIN SECCIÓN PARA ADMINISTRAR ALUMNO-->

</div>

 		<script>
            function soloNumeros(e){

            var keynum = window.event ? window.event.keyCode : e.which;
            if ((keynum == 8) || (keynum == 46))
            return true;
         
            return /\d/.test(String.fromCharCode(keynum));

        }
        </script>

        <script>
            function soloLetras(e){
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = "8-37-39-46";

            tecla_especial = false
            for(var i in especiales){
                    if(key == especiales[i]){
                        tecla_especial = true;
                        break;
                    }
                }

                if(letras.indexOf(tecla)==-1 && !tecla_especial){
                    return false;
                }
            }
        </script>

<script>
		$(document).ready(function(){
			$('#CrearAño').hide();
			$('#AdministrarAño').hide();
			$('#CrearMateria').hide();
			$('#AdministrarMateria').hide();
			$('#CrearSección').hide();
			$('#AdministrarSección').hide();
			$('#CrearProfesor').hide();
			$('#AdministrarProfesor').hide();
			$('#CrearAlumno').hide();
			$('#AdministrarAlumno').hide();
		$("#ClickCrearAño").click(function(){
			$('#CrearAño').show();
			$('#AdministrarAño').hide();
			$('#CrearMateria').hide();
			$('#AdministrarMateria').hide();
			$('#CrearSección').hide();
			$('#AdministrarSección').hide();
			$('#CrearProfesor').hide();
			$('#AdministrarProfesor').hide();
			$('#CrearAlumno').hide();
			$('#AdministrarAlumno').hide();
		 });
		$("#ClickAdministrarAño").click(function(){
			$('#CrearAño').hide();
			$('#AdministrarAño').show();
			$('#CrearMateria').hide();
			$('#AdministrarMateria').hide();
			$('#CrearSección').hide();
			$('#AdministrarSección').hide();
			$('#CrearProfesor').hide();
			$('#AdministrarProfesor').hide();
			$('#CrearAlumno').hide();
			$('#AdministrarAlumno').hide();
		 });
		$("#ClickCrearMateria").click(function(){
			$('#CrearAño').hide();
			$('#AdministrarAño').hide();
			$('#CrearMateria').show();
			$('#AdministrarMateria').hide();
			$('#CrearSección').hide();
			$('#AdministrarSección').hide();
			$('#CrearProfesor').hide();
			$('#AdministrarProfesor').hide();
			$('#CrearAlumno').hide();
			$('#AdministrarAlumno').hide();
		 });
		$("#ClickAdministrarMateria").click(function(){
			$('#CrearAño').hide();
			$('#AdministrarAño').hide();
			$('#CrearMateria').hide();
			$('#AdministrarMateria').show();
			$('#CrearSección').hide();
			$('#AdministrarSección').hide();
			$('#CrearProfesor').hide();
			$('#AdministrarProfesor').hide();
			$('#CrearAlumno').hide();
			$('#AdministrarAlumno').hide();
		 });
		$("#ClickCrearSeccion").click(function(){
			$('#CrearAño').hide();
			$('#AdministrarAño').hide();
			$('#CrearMateria').hide();
			$('#AdministrarMateria').hide();
			$('#CrearSección').show();
			$('#AdministrarSección').hide();
			$('#CrearProfesor').hide();
			$('#AdministrarProfesor').hide();
			$('#CrearAlumno').hide();
			$('#AdministrarAlumno').hide();
		 });
		$("#ClickAdministrarSeccion").click(function(){
			$('#CrearAño').hide();
			$('#AdministrarAño').hide();
			$('#CrearMateria').hide();
			$('#AdministrarMateria').hide();
			$('#CrearSección').hide();
			$('#AdministrarSección').show();
			$('#CrearProfesor').hide();
			$('#AdministrarProfesor').hide();
			$('#CrearAlumno').hide();
			$('#AdministrarAlumno').hide();
		 });
		$("#ClickCrearProfesor").click(function(){
			$('#CrearAño').hide();
			$('#AdministrarAño').hide();
			$('#CrearMateria').hide();
			$('#AdministrarMateria').hide();
			$('#CrearSección').hide();
			$('#AdministrarSección').hide();
			$('#CrearProfesor').show();
			$('#AdministrarProfesor').hide();
			$('#CrearAlumno').hide();
			$('#AdministrarAlumno').hide();
		 });
		$("#ClickAdministrarProfesor").click(function(){
			$('#CrearAño').hide();
			$('#AdministrarAño').hide();
			$('#CrearMateria').hide();
			$('#AdministrarMateria').hide();
			$('#CrearSección').hide();
			$('#AdministrarSección').hide();
			$('#CrearProfesor').hide();
			$('#AdministrarProfesor').show();
			$('#CrearAlumno').hide();
			$('#AdministrarAlumno').hide();
		 });
		$("#ClickInscribirAlumno").click(function(){
			$('#CrearAño').hide();
			$('#AdministrarAño').hide();
			$('#CrearMateria').hide();
			$('#AdministrarMateria').hide();
			$('#CrearSección').hide();
			$('#AdministrarSección').hide();
			$('#CrearProfesor').hide();
			$('#AdministrarProfesor').hide();
			$('#CrearAlumno').show();
			$('#AdministrarAlumno').hide();
		 });
		$("#ClickAdministrarAlumno").click(function(){
			$('#CrearAño').hide();
			$('#AdministrarAño').hide();
			$('#CrearMateria').hide();
			$('#AdministrarMateria').hide();
			$('#CrearSección').hide();
			$('#AdministrarSección').hide();
			$('#CrearProfesor').hide();
			$('#AdministrarProfesor').hide();
			$('#CrearAlumno').hide();
			$('#AdministrarAlumno').show();
		 });
	});
</script>

</body>
</html>

<?php

}else{
	header("Status: 301 Moved Permanently", false, 301);
	header("Location: /liceo");
}

?>