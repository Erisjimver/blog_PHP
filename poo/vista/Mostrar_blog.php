<!DOCTYPE html>
<html>
<head>
	<title>Mostrar blog</title>
</head>
<body>


<?php 

	//include("../modelo/Manejo_objetos.php");
	include_once("../modelo/Manejo_objetos.php");
try {
	
		$conexion=new PDO("mysql:host=localhost; dbname=bbddblog","root","");
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$Manejo_objetos=new Manejo_objetos($conexion);

		$tabla_blog=$Manejo_objetos->getContenidoPorFecha();

		if(empty($tabla_blog)){
			echo "No hay entradas de blog aun";
		}
		else{

			foreach ($tabla_blog as $valor) {
				echo "<h3>" . $valor->getTitulo() . "</h3>";
				echo "<h4>" . $valor->getFecha() . "</h4>";
				echo "<div style='width:400px'>" . $valor->getComentarios() . "</div> <br>";
				if($valor->getImagen()!=""){
					echo "<img src='../imagenes/" . $valor->getImagen() . "' width='200px' />";
				}
				echo "<hr/>";
			
			}


		}

} catch (Exception $e) {
	die("Error: " . $e->getMessage());
}



?>
<br>
<a href="Formulario.php">Volver a la pagina de inserccion</a>

</body>
</html>