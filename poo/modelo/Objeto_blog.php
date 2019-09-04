<?php 

	/**
	 * 
	 */
	class Objeto_blog{
		
		private $id, $titulo, $fecha, $comentarios, $imagen;

//-----------Modificadores de acceso GET SET---------------//
//////////////////// id ----------------------
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id=$id;
		}
//////////////////// id ----------------------
		public function getFecha(){
			return $this->fecha;
		}
		public function setFecha($fecha){
			$this->fecha=$fecha;
		}
//////////////////// id ----------------------
		public function getComentarios(){
			return $this->comentarios;
		}
		public function setComentarios($comentarios){
			$this->comentarios=$comentarios;
		}
//////////////////// id ----------------------
		public function getImagen(){
			return $this->imagen;
		}
		public function setImagen($imagen){
			$this->imagen=$imagen;
		}






	}



?>