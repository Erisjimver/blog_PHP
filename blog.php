<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
</head>
<body>


	<?php 

	//echo "Inicia la wea";

		$conexion=mysqli_connect("localhost", "root", "", "bbddblog");

		if (!$conexion) {
			echo "La conexion ha fallado" . mysqli_erro();


			exit();
		}
		//$consulta="select titulo,fecha,comentario,imagen from cotenido order by fecha desc";
		$consulta="select * from cotenido order by fecha desc";

echo "K paso aqui";
		if($resultado=mysqli_query($conexion, $consulta)){
echo "Aki";
			while ($registro=mysqli_fetch_assoc($resultado)) {
				echo "<h3>" . $registro["titulo"] . "</h3>";
				echo "<h4>" . $registro["fecha"] . "</h4>";
				echo "<div style=width:'400px'>" . $registro["comentario"] . "</div> <br>";
				if($registro["imagen"]!=[""]){
					echo "<img src='imagenes/" . $registro['imagen'] . "' width:'300px' />";
				}
				echo "<hr/>";

			}
			echo "K paso aki de nuevo";
		}
//echo "Termina la wea";

	?>

</body>
</html>