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
//////////////////// fecha ----------------------
		public function getFecha(){
			return $this->fecha;
		}
		public function setFecha($fecha){
			$this->fecha=$fecha;
		}
//////////////////// fecha ----------------------
		public function getTitulo(){
			return $this->titulo;
		}
		public function setTitulo($titulo){
			$this->titulo=$titulo;
		}
//////////////////// comentarios ----------------------
		public function getComentarios(){
			return $this->comentarios;
		}
		public function setComentarios($comentarios){
			$this->comentarios=$comentarios;
		}
//////////////////// imagen ----------------------
		public function getImagen(){
			return $this->imagen;
		}
		public function setImagen($imagen){
			$this->imagen=$imagen;
		}






	}



?>