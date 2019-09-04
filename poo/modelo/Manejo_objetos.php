<?php 

include_once("Objeto_blog.php");

class Manejo_objetos{
	

		private $conexion;

		public function __construct($conexion){

			$this->setConexion($conexion);

		}

		public function setConexion(PDO $conexion){

			$this->conexion=$conexion;

		}

		public function getContenidoPorFecha(){

			$matriz=array();

			$contador=0;

			$resultado=$this->conexion->query("select * from contenido order by fecha desc");

			while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {
				
				$blog=new Objeto_Blog();

				$blog->setID($registro["id"]);
				$blog->setTitulo($registro["titulo"]);
				$blog->setFecha($registro["fecha"]);
				$blog->setComentarios($registro["comentario"]);
				$blog->setImagen($registro["imagen"]);

				$matriz[$contador]=$blog;
				$contador++;
			}

			return $matriz;

		}

		public function insertaCOntenido(Objeto_blog $blog){

			//$sql="insert into contenido (titulo,fecha,comentario,imagen) values ('$blog->getTitulo','$blog->getFecha','$blog->getComentarios','$blog->getImagen')";
			$sql="insert into contenido (titulo,fecha,comentario,imagen) values ('" . $blog->getTitulo() . "','" . $blog->getFecha() . "','" . $blog->getComentarios() . "','" . $blog->getImagen() . "')";
			$this->conexion->exec($sql);
		}
		
	
}



?>