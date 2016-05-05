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
			require "CreateBooks.php";

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

				else if ($_POST["submit"] == "Create"){
					$sql2 = 'SELECT COUNT(DNI) FROM `autor` WHERE DNI = "' . $_POST["DNIautor"] . '" AND Nombre = "' . $_POST["Nautor"] .'"';
					$sql1 = 'INSERT INTO `autor`(`Nombre`, `DNI`) VALUES ($_POST["Nautor"],$_POST["DNIautor"])';
					$sql3 = 'SELECT COUNT(DNI) FROM `autoria` WHERE `DNI`="' . $_POST["DNIautor"] . '" AND `Identificador`=' .$_POST["NLibro"] ;
					$sql4 = 'INSERT INTO `autoria`(`DNI`, `Identificador`) VALUES ('. $_POST["DNIautor"] .','. $_POST["NLibro"] .')';

					$response = mysql_num_rows(mysql_query($sql2,$conn));
					$response2 = mysql_num_rows(mysql_query($sql3,$conn));

					if(!$response){
						$response = mysql_query($sql1,$conn);
					}

					if(!$response2){
						$response2 = mysql_query($sql4,$conn);
					}


					if($response && $response2){
						$sql = 'INSERT INTO libro(`Identificador`, `nPaginas`, `Titulo`, `NumeroSeccion`) VALUES ( '.$_POST["NLibro"].','.$_POST["Nhojas"].',"'.$_POST[NomLibro].'",'.$_POST["NSeccion"].')';
						echo $sql;
						$response = mysql_query($sql,$conn);
					}

					else{
						echo "ERROR: PRELIMINARES";
					}
				}

				header("Location:index.php");
			}
	
		?>
		
		

	<!--	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
	</body>
</html>


