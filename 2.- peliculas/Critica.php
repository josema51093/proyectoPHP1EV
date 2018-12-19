<?php
	Class Critica {
		private $id;
		private $id_pelicula;
		private $autor;
		private $texto;
		private $nota;

		function __construct($unId, $unIdPelicula, $unAutor, $unTexto, $unaNota){
			$this->id = $unId;
			$this->id_pelicula = $unIdPelicula;
			$this->autor = $unAutor;
			$this->texto = $unTexto;
			$this->nota = $unaNota;
		}
		//public function __construct(){}

		public function getId(){
			return $this->id;
		}

		public function setId($unId){
			$this->id = $unId;
		}

		public function getIdPelicula(){
			return $this->id_pelicula;
		}

		public function setIdPelicula($unIdPelicula){
			$this->id_pelicula = $unIdPelicula;
		}

		public function getAutor(){
			return $this->autor;
		}

		public function setAutor($unAutor){
			$this->autor = $unAutor;
		}

		public function getTexto(){
			return $this->texto;
		}

		public function setTexto($unTexto){
			$this->texto = $unTexto;
		}

		public function getNota(){
			return $this->nota;
		}

		public function setNota($unaNota){
			$this->nota = $unaNota;
		}
	}
?>