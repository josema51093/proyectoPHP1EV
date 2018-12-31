<?php
	Class Pelicula {
		private $id;
		private $titulo;
		private $genero;
		private $director;
		private $year;
		private $sinopsis;
		private $cartel;
		private $criticas;

		function __construct($unId, $unTitulo, $unGenero, $unDirector, $unYear, $unaSinopsis, $unCartel, $unasCriticas=null){
			$this->id = $unId;
			$this->titulo = $unTitulo;
			$this->genero = $unGenero;
			$this->director = $unDirector;
			$this->year = $unYear;
			$this->sinopsis = $unaSinopsis;
			$this->cartel = $unCartel;
			$this->criticas = $unasCriticas;
		}
		//public function __construct(){}
		
		public function getCriticas(){
			return $this->criticas;
		}

		public function SetCriticas($unasCriticas){
			$this->criticas = $unasCriticas;
		}

		public function getId(){
			return $this->id;
		}

		public function setId($unId){
			$this->id = $unId;
		}

		public function getTitulo(){
			return $this->titulo;
		}

		public function setTitulo($unTitulo){
			$this->titulo = $unTitulo;
		}

		public function getGenero(){
			return $this->genero;
		}

		public function setGenero($unGenero){
			$this->genero = $unGenero;
		}

		public function getDirector(){
			return $this->director;
		}

		public function setDirector($unDirector){
			$this->director = $unDirector;
		}

		public function getYear(){
			return $this->year;
		}

		public function setYear($unYear){
			$this->year = $unYear;
		}

		public function getSinopsis(){
			return $this->sinopsis;
		}

		public function setSinopsis($unaSinopsis){
			$this->sinopsis = $unaSinopsis;
		}

		public function getCartel(){
			return $this->cartel;
		}

		public function setCartel($unCartel){
			$this->cartel = $unCartel;
		}

	}
?>