<?php

include("conexion.php");

$anioSeccion = $_POST['anioAdministrarSeccion'];

echo '<input type="hidden" value="'.$anioSeccion.'" id="anioSeccion">';

$consulta = mysqli_query($conexion,"SELECT * FROM seccion WHERE anio=$anioSeccion");

if (mysqli_num_rows($consulta) > 0) {
		?>
			<select class="form-control" id="letraAdministrarSeccion">
    		<option value="0">SECCION</option>
		<?php

	while ($resultado = mysqli_fetch_assoc($consulta)) {

		$letraSeccion = $resultado['letra'];

		?>

			<option value="<?php echo $letraSeccion; ?>"> <?php echo $letraSeccion; ?></option>

		<?php
	}

		?>
			</select>
  			</div>
  			<input type="hidden" id="letraSeccion">
  			<button class="btn btn-default" id="buscarSeccion">Buscar</button>
		<?php

}

?>

<div id="resultadoSeccion" style="margin-top:2%; margin-left: -12%; position:fixed;"></div>

  <script>
  	$(document).ready(function(){
  		$('select#letraAdministrarSeccion').on('change',function(){
    	var letraAdministrarSeccion = $(this).val();
    	$('#letraSeccion').val(letraAdministrarSeccion);
  		});
  	});
  </script>

  <script>
  	$("#buscarSeccion").click(function() {
  		var anioSeccion = $("input#anioSeccion").val();
  		var letraSeccion = $("input#letraSeccion").val();
  			var url = "administrarseccion.php";
				$.ajax({
                type: "POST",
                url: url,
                data:{
                 letraSeccion,
                 anioSeccion
                }, 
                success: function(data)
                {
                    $("#resultadoSeccion").html(data); 
                }
                });
  		});
  </script>