<!DOCTYPE html>
<html>
		<head>
		<title>Page Title</title>
		<!--	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"> -->
		</head>
		<body>
		<section style="height: 50%">
			<?php
			 	require 'SelectBooks.php';
			?>
		</section>

		<!--<label for="select-choice-0" class="select">Acción Seleccionada:</label>
		<select id="Selectable" onchange="changeForm()">
		  <option value="ADD">Añadir Nuevo Libro</option>
		  <option value="UPDATE">Modificar Libro</option>
		  <option value="DELETE">Eliminar Libro</option>
		</select> -->

		<?php
			require "Conecction.php";
			require "DeleteBooks.php";
			require "UpdateBooks.php";

			if( $_POST ){
				echo var_dump($_POST);
				if($_POST["submit"] == "Borrar"){
					$id = $_POST["NLibro"];
					$sql = "DELETE FROM libro WHERE Identificador = ". $id;
					$response = mysql_query($sql,$conn);
				}

				else if($_POST["submit"] == "Update"){
					$id = $_POST["NLibro"];
					$nhojas =  $_POST["Nhojas"];
					$sql = "UPDATE libro SET nPaginas=". $nhojas ." WHERE Identificador =".$id;
					$response = mysql_query($sql,$conn);
				}

				header("Location:index.php");
			}
	
		?>
		
		

	<!--	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
	</body>
</html>


