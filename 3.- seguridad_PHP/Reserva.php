<?php
	class Reserva {
		/**
		 * Atributos de la clase Reserva
		 */
		private $id;
		private $apellidos;
		private $nombre;
		private $fecha;
		private $hora;
		private $ncomensales;
		public static $maxcomensales = 30;
 
 		/**
 		 * Constructor de la clase Reserva
 		 * @param [object] $unId
 		 * @param [String] $apellidos
 		 * @param [String] $nombre
 		 * @param [date] $fecha
 		 * @param [number] $hora
 		 * @param [number] $comensales
 		 */
		public function __construct($unId,$apellidos,$nombre,$fecha,$hora,$comensales) {
			$this->id = $unId;
			$this->apellidos = $apellidos;
			$this->nombre = $nombre;
			$this->fecha = $fecha;
			$this->hora = $hora;
			$this->ncomensales = $comensales;
		}
 
 		/**
 		 * Metodo que devuelve los apellidos
 		 * @return apellidos
 		 */
		public function getApellidos(){
		return $this->apellidos;
		}
 
 		/**
 		 * Metood que establece los apellidos pasados como parametro
 		 * @param [String] $apellidos
 		 */
		public function setApellidos($apellidos){
			$this->apellidos = $apellidos;
		}
 
 		/**
 		 * Metodo que devuelve el nombre
 		 * @return nombre
 		 */
		public function getNombre(){
			return $this->nombre;
		}
 
 		/**
 		 * Metood que establece el nombre pasado como parametro
 		 * @param [String] $nombre
 		 */
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
 	
 		/**
 		 * Metodo que devuelve la fecha
 		 * @return fecha
 		 */
		public function getFecha(){
			return $this->fecha;
		}
 
 		/**
 		 * Metood que establece la fecha pasada como parametro
 		 * @param [date] $fecha
 		 */
		public function setFecha($fecha){
			$this->fecha = $fecha;
		}

		/**
 		 * Metodo que devuelve la hora
 		 * @return hora
 		 */
		public function getHora(){
			return $this->hora;
		}
 
 		/**
 		 * Metood que establece la hora pasada como parametro
 		 * @param [number] $hora
 		 */
		public function setHora($hora){
			$this->hora = $hora;
		}

		/**
 		 * Metodo que devuelve los comensales
 		 * @return comensales
 		 */
		public function getComensales(){
		return $this->ncomensales;
		}
 
 		/**
 		 * Metood que establece los comensales pasados como parametro
 		 * @param [number] $comensales
 		 */
		public function setComensales($ncomensales){
			$this->ncomensales = $ncomensales;
		}

		/**
 		 * Metodo que devuelve el id
 		 * @return id
 		 */
		public function getId(){
			return $this->id;
		}
 
 		/**
 		 * Metood que establece el id pasado como parametro
 		 * @param [object] $apellidos
 		 */
		public function setId($id){
			$this->id = $id;
		}
	}
?>