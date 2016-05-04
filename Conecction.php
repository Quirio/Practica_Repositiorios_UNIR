<?php
	$servername = "localhost";
	$username = "User1";
	$password = "123";

	if (!$conn = mysql_connect($servername,$username,$password)) {
	     echo 'No pudo conectarse a mysql';
    	 exit;
	}

	if (!mysql_select_db('biblioteca', $conn)) {
	    echo 'No pudo seleccionar la base de datos';
	    exit;
	}
?>