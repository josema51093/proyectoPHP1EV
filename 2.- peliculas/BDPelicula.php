<?php
	spl_autoload_register( function( $NombreClase ) {
	    include_once($NombreClase . '.php');
	} );
	require 'vendor/autoload.php';
	Class BDPelicula{
		//Metodos de bases de datos
		

		//Listar todas las peliculas
		public static function mostrar(){
			$bd=Db::conectar();
			//Tras conectar con la base de datos, seleccionamos la coleccion (tabla) a manipular
			$coleccion = $bd->Pelicula;
			//Se guarda en una variable todos los datos de la coleccion
			$busqueda = $coleccion->find();
			//Se crea una variable $listaPeliculas, que sera un array con todas las peliculas obtenidas
			$listaPeliculas = array();

			//Con un bucle foreach, se va sacando cada elemento de la coleccion y se crea un objeto
			foreach ($busqueda as $pelicula) {
				$unaPelicula = new Pelicula($pelicula["_id"], $pelicula["Titulo"], $pelicula["Genero"], $pelicula["Director"], $pelicula["Year"], $pelicula["Sinopsis"], $pelicula["Cartel"], $pelicula["Criticas"]);
			//Añadimos el objeto $unaPelicula a la lista de peliculas, para tener un array con todas las peliculas en objetos
			$listaPeliculas[] = $unaPelicula;
			}
			//Nos desconectamos de la base de datos
			$bd = null;
			//Por ultimo, devolvemos todas las peliculas
			return $listaPeliculas;
		}

		//Mostrar pelicula por id
		//Recibe como parametro un id
		public static function mostrarPorId($unId){
			//Se conecta con la base de datos
			$db=Db::conectar();

			//Seleccionamos la coleccion Pelicula
			$coleccion = $db->Pelicula;

			//Guardamos en la variable $busqueda el resultado devuelto de la busqueda (USAR findOne PARA QUE DEVUELVE UN SOLO VALOR, CON FIND DABA ERROR)
			$busqueda = $coleccion->findOne( ["_id" => new \MongoDB\BSON\ObjectId($unId)] );

			//Creamos el objeto Pelicula con los datos obtenidos de la bd
			$unaPelicula = new Pelicula($busqueda["_id"], $busqueda["Titulo"], $busqueda["Genero"], $busqueda["Director"], $busqueda["Year"], $busqueda["Sinopsis"], $busqueda["Cartel"]);

			//Desconexion de la base de datos
			$db = null;

			//Se devuelve el objeto creado
			return $unaPelicula;
		}

		//Eliminar una pelicula
		public static function eliminar($idPelicula){
			//Conectamos con la base de datos peliculas
			$db=Db::conectar();

			//Se guarda en una variable la coleccion a manipular
			$coleccion = $db->Pelicula;

			//Buscamos en la coleccion si hay alguna coincidencia
			$coleccion->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($idPelicula)]);
			//Se cierra la conexion con la bd
			$dbh = null;
		}

		//Metodo para insertar una pelicula que recibe un objeto pelicula
		public static function insertar($unaPelicula){
			//Conectamos con la base de datos
			$db=Db::conectar();

			//Se guarda la coleccion a manipular en una variable
			$coleccion = $db->Pelicula;

			//Se guarda en una variable un array que contenga el objeto entero
			$insercion = array(
				"Titulo" => $unaPelicula->getTitulo(),
				"Genero" => $unaPelicula->getGenero(),
				"Director" => $unaPelicula->getDirector(),
				"Year" => $unaPelicula->getYear(),
				"Sinopsis" => $unaPelicula->getSinopsis(),
				"Cartel" => $unaPelicula->getCartel()
			);

			//Insertamos el anterior documento en la coleccion
			$coleccion->insertOne($insercion);
			
			//Se cierra la conexion con la bd
			$dbh = null;
			return true;
	}

	//Modificar una pelicula pasandole un objeto pelicula con los valores a modificar
	public static function modificar($unaPelicula){
			//Conectamos con la base de datos
			$db=Db::conectar();

			//Obtenemos la coleccion a tratar
			$coleccion = $db->Pelicula;

			//Se crea el documento a actualizar
			$documento = array(
				"Titulo" => $unaPelicula->getTitulo(),
				"Genero" => $unaPelicula->getGenero(),
				"Director" => $unaPelicula->getDirector(),
				"Year" => $unaPelicula->getYear(),
				"Sinopsis" => $unaPelicula->getSinopsis(),
				"Cartel" => $unaPelicula->getCartel()
			);

			//INVESTIGAR COMO HACERLO CON SAVE
			//$coleccion->save($documento);
			
			//Se crea un filtro donde guardar el id a buscar
			$filtro = ['_id' => new MongoDB\BSON\ObjectId($unaPelicula->getId())];

			//Se ejecuta updateOne a la coleccion seleccionada pasandole el filtro anterior y el documento a sustituir
			$coleccion->updateOne($filtro, ['$set' => $documento]);
			
			/******************PRUEBAS PARA COMPROBAR IDS***************/
			/*echo "ID de la pelicula pasada: ".$unaPelicula->getId();
			$result = $coleccion->findOne(['_id' => new \MongoDB\BSON\ObjectId($unaPelicula->getId())]);
			$unaPel = new Pelicula($result["_id"], $result["Titulo"], $result["Genero"], $result["Director"], $result["Year"], $result["Sinopsis"], $result["Cartel"]);

			echo "<br>ID de la pelicula pasada: ".$unaPel->getId();*/
			
			//Se cierra la conexion con la bd
			$db = null;
		}

		//Mostrar las criticas de una pelicula por ID
		/*public static function mostrarCriticas($unId){
			$dbh=Db::conectar();

			try{
				// Prepare
				$stmt = $dbh->prepare("SELECT * FROM critica WHERE id_pelicula=:id");
				$stmt->bindValue(":id", $unId);
				// Excecute
				$stmt->execute();
				$criticas = $stmt->fetchAll(PDO::FETCH_OBJ);

				$misCriticas = array();

				foreach ($criticas as $critica) {
					$myCritica = new Critica(0, $critica->id_pelicula, $critica->autor, $critica->texto, $critica->nota);
					//Añadimos el objeto $peliculaObj a la lista de peliculas, para tener un array con todas las peliculas en objetos
					$misCriticas[] = $myCritica;
				}
				
			} catch(PDOException $e){
				echo $e->getMessage();
			}
			$dbh = null;
			return $misCriticas;
		}*/
}
?>