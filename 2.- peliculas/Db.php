<?php
	require 'vendor/autoload.php';

	class  Db{
		private static $conexion=NULL;
		private function __construct (){}
 
		public static function conectar(){

			//Se crea una conexion nueva con Mongo, usando para ello new
			$conexion = new MongoDB\Client;

			//Seleccionamos la base de datos a la que conectarnos
			self::$conexion = $conexion->peliculas;
			
			return self::$conexion;
		}		
	} 
?>