<!DOCTYPE html>
<html>
<head>
	<title>Transacciones</title>
</head>
<body>

<?php 

		include_once("../modelo/Objeto_blog.php");
		include_once("../modelo/Manejo_objetos.php");


try {
		$conexion=new PDO("mysql:host=localhost; dbname=bbddblog","root","");
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		

		//$conexion=mysqli_connect("localhost", "root", "", "bbddblog");

		if (!$conexion) {
			echo "La conexion ha fallado" . mysqli_erro();


			exit();
		}

		if($_FILES["imagen"]["error"]){

			switch ($_FILES["imagen"]["error"]) {
				case 1://error en caso de que se exceda de tamaño
					echo "El tamaño del archivo excede lo permitido por el servidor";
					break;

				case 2:
					echo "El tamaño del archivo excede los dos megas";
					break;

				case 3://corrupcion de archivo
					echo "El envio de archivos se interrumpio";

					break;
				case 4://no hay fichero
					echo "No se ha ebnviado archivo alguno";
					break;

			}

		}else{
			echo "Entrada realizada correctamente <br>";

			if ((isset($_FILES["imagen"]["name"]) && ($_FILES["imagen"]["error"] == UPLOAD_ERR_OK))) {
				
				$destino_de_ruta="../imagenes/";
				move_uploaded_file($_FILES["imagen"]["tmp_name"],$destino_de_ruta . $_FILES["imagen"]["name"]);
				echo "El archivo " . $_FILES["imagen"]["name"] . " se ha copiado en el directorio de imagenes <br>";
			}
			else{
				echo "No se ha copiado el archivo <br>";
			}
		}
		$Manejo_objetos=new Manejo_Objetos($conexion);

		$blog=new Objeto_blog();
		$blog->setTitulo(htmlentities(addslashes($_POST["campo_titulo"]),ENT_QUOTES));
		$blog->setFecha(Date("Y-m-d H:i:s"));
		$blog->setComentarios(htmlentities(addslashes($_POST["area_comentarios"]),ENT_QUOTES));
		$blog->setImagen($_FILES["imagen"]["name"]);

		$Manejo_objetos->insertaContenido($blog);

		echo "<br> Entrada de blog agregada con exito <br/>";

		}	
		catch (Exception $e) {
			die("Error: " . $e->getMessage());
}



?>
<br>
<a href="../vista/Formulario.php">Volver a la pagina de inserccion</a>
</body>
</html>