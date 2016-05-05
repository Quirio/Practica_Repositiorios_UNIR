<!DOCTYPE html>
<html>
		<head>
			<title>Page Title</title>
			<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		</head>
		<body>
		<section style="height: 50%">
			<?php require 'SelectBooks.php' ?>
		</section>

		<label for="select-choice-0" class="select">Acción Seleccionada:</label>
		<select name="select-choice-0" id="select-choice-0">
		  <option value="ADD">Añadir Nuevo Libro</option>
		  <option value="UPDATE">Modificar Libro</option>
		  <option value="DELETE">Eliminar Libro</option>
		</select>

		<script src="js/formLogic.js"></script>
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	</body>
</html>


