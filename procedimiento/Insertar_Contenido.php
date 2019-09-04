<!DOCTYPE html>
<html>
<head>
	<title>Insertar contenido</title>
</head>
<body>



<?php 

		$conexion=mysqli_connect("localhost", "root", "", "bbddblog");

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
				
				$destino_de_ruta="imagenes/";
				move_uploaded_file($_FILES["imagen"]["tmp_name"],$destino_de_ruta . $_FILES["imagen"]["name"]);
				echo "El archivo " . $_FILES["imagen"]["name"] . " se ha copiado en el directorio de imagenes <br>";
			}
			else{
				echo "No se ha copiado el archivo <br>";
			}
		}

		$eltitulo=$_POST["campo_titulo"];
		$lafecha=date("Y-m-d H:i:s");
		$elcomentario=$_POST["area_comentarios"];
		$laimagen=$_FILES["imagen"]["name"];

		$consulta="insert into contenido (titulo,fecha,comentario,imagen) values ('$eltitulo','$lafecha','$elcomentario','$laimagen')";
		$resultado=mysqli_query($conexion,$consulta);
		 
		 if(mysqli_affected_rows($conexion)){
		  echo 'Se ha logrado agregar el registro <br>';
		 }else{
		  echo 'No se ha logrado agregar el registro a peticion <br>';
		 }


		 mysqli_close($conexion);
				



?>
</body>
</html>