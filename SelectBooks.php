<html>
	<title> Biblioteca </title>
	<body>
		<table style="width:100%">
		<tr>
			<th>id</th>
		    <th>Libro</th>
		    <th>Numero Páginas</th> 
		    <th>Sección</th>
		    <th>Autores</th>
	  	</tr>
		<?php
			require 'Conecction.php';

			$sql = 'SELECT Identificador,Titulo,nPaginas,NumeroSeccion FROM libro';
			
			$response = mysql_query($sql,$conn);

			if($response){
				while($fila = mysql_fetch_assoc($response)){
					$sql1 = 'SELECT DISTINCT Nombre FROM autor A INNER JOIN autoria AU ON A.DNI = AU.DNI WHERE  Identificador IN '.
					'(SELECT Identificador FROM libro WHERE Titulo = \''.$fila['Titulo'].'\')';

					//echo $sql1;
					$response1 = mysql_query($sql1,$conn);
					$li = '<tr><td>'. $fila['Identificador'] .'</td><td>'. $fila['Titulo'] .'</td><td>'. $fila['nPaginas'] .'</td><td>' . $fila['NumeroSeccion'] . '</td>' ;

					$li .= '<td>';
					while($autores = mysql_fetch_assoc($response1)){
						
						$li .= $autores['Nombre'] . "  " ;
					}

					echo $li .= '</td></tr>';
				}
			}

			mysql_close($conn);
		?>
		</table>
	</body>
</html>