<?php
	spl_autoload_register( function( $NombreClase ) {
	    include_once($NombreClase . '.php');
	} );

	class CrudReserva {
 
		// método para mostrar todas las reservas
		public static function mostrar($unaFecha){
			$bd=Db::conectar();

			//Dentro de la base de datos seleccionamos una colección (tabla)
			$coleccion = $bd->Reservas;
			//Buscamos todas las reservas
			$cursor = $coleccion->find(['Fecha' => $unaFecha]);
 			$listaReservas=[];

		    foreach ($cursor as $documento) {
		    	$miReserva = new Reserva($documento["_id"],$documento["Apellidos"],$documento["Nombre"],$documento["Fecha"],$documento["Hora"],$documento["Comensales"]);
				$listaReservas[]=$miReserva;
		    }

			$bd=null;
			return $listaReservas;
		}

		//Mostrar reserva por id
		//Recibe como parametro un id
		public static function mostrarPorId($unId){
			//Se conecta con la base de datos
			$db=Db::conectar();

			//Seleccionamos la coleccion Reservas
			$coleccion = $db->Reservas;

			//Guardamos en la variable $busqueda el resultado devuelto de la busqueda (USAR findOne PARA QUE DEVUELVE UN SOLO VALOR, CON FIND DABA ERROR)
			$busqueda = $coleccion->findOne( ["_id" => new \MongoDB\BSON\ObjectId($unId)] );

			//Creamos el objeto Reserva con los datos obtenidos de la bd
			$unaReserva = new Reserva($busqueda["_id"], $busqueda["Apellidos"], $busqueda["Nombre"], $busqueda["Fecha"], $busqueda["Hora"], $busqueda["Comensales"]);

			//Desconexion de la base de datos
			$db = null;

			//Se devuelve el objeto creado
			return $unaReserva;
		}

		public static function mostrarPorApellidoFecha($unaFecha, $unosApellidos){
			//Se conecta con la base de datos
			$db=Db::conectar();

			//Seleccionamos la coleccion Reservas
			$coleccion = $db->Reservas;

			//Se buscan las reservas que coincidan
			$busqueda = $coleccion->find(['Fecha' => $unaFecha],['Apellidos' => $unosApellidos]);

			$reservasApeFecha = [];

			foreach ($busqueda as $documento) {
				$miReserva = new Reserva($documento["_id"],$documento["Apellidos"],$documento["Nombre"],$documento["Fecha"],$documento["Hora"],$documento["Comensales"]);
				$reservasApeFecha[]=$miReserva;
			}

			$bd=null;
			return $reservasApeFecha;
		}


		// método para mostrar todas las reservas
		public static function esPosible($unaReserva){
			$suma=0;

			$date = new DateTime($unaReserva->getFecha());
			$fecha = $date->format('d/m/Y');

			$reservas = CrudReserva::mostrar($fecha);
			foreach ($reservas as $reserva) {
				if ($unaReserva->getHora() == $reserva->getHora()) {
					$suma+=$reserva->getComensales();
				}
			}

			if ( ($suma + $unaReserva->getComensales()) > Reserva::$maxcomensales)
				return false;
			else
				return true;
		}


		//Eliminar una película
		public static function eliminar($idReserva) {
			$bd=Db::conectar();
			//Dentro de la base de datos seleccionamos una colección (tabla)
			$coleccion = $bd->Reservas;
			//Buscamos todas las reservas
			$coleccion->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($idReserva)]);


			$dbh=null;
		}

		//Método para insertar una reserva que recibe un objeto Pelicula
		public static function insertar($unaReserva) {
			
			if (CrudReserva::esPosible($unaReserva)) {

				$bd=Db::conectar();
				//Dentro de la base de datos seleccionamos una colección (tabla)
				$coleccion = $bd->Reservas;

				$date = new DateTime($unaReserva->getFecha());
				$fecha = $date->format('d/m/Y');

				$documento = array( 
				  "Nombre" => $unaReserva->getNombre(), 
				  "Apellidos" => $unaReserva->getApellidos(), 
				  "Email" => "yalohare@gmail.com",
				  "Tel" => 649589665,
				  "Fecha" => $fecha, 
				  "Hora" => $unaReserva->getHora(), 
				  "Comensales" => $unaReserva->getComensales() 
				);
	 
	   			$coleccion->insertOne($documento);

				$dbh=null;
				return true;

			} else {
				return false;
			}

		}

		//Modificar una reserva pasandole un objeto reserva como parametro
		public static function modificar($unaReserva){
			//Conectamos con la base de datos
			$db=Db::conectar();

			//Obtenemos la coleccion a tratar
			$coleccion = $db->Reservas;

			//Se pasa la fecha al formato adecuado
			$date = new DateTime($unaReserva->getFecha());
			$fecha = $date->format('d/m/Y');

			//Se crea el documento a actualizar con los parametros pasados
			$documento = array(
				"Apellidos" => $unaReserva->getApellidos(),
				"Nombre" => $unaReserva->getNombre(),
				"Fecha" => $fecha,
				"Hora" => $unaReserva->getHora(),
				"Comensales" => $unaReserva->getComensales()
			);

			//Se crea un filtro donde guardar el id a buscar
			$filtro = ['_id' => new MongoDB\BSON\ObjectId($unaReserva->getId())];

			//Se ejecuta updateOne a la coleccion seleccionada pasandole el filtro anterior y el documento a sustituir
			$coleccion->updateOne($filtro, ['$set' => $documento]);

			//Se cierra la conexion con la bd
			$db = null;
		}
}