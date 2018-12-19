<?php
	Class BDPelicula{
		//Metodos de bases de datos
		

		//Listar todas las peliculas
		public static function mostrar(){
			$dbh=Db::conectar();
			$listaPeliculas = array();

			try{
				// Prepare
				$stmt = $dbh->prepare("SELECT * FROM pelicula");
				// Excecute
				$stmt->execute();
				$peliculas = $stmt->fetchAll(PDO::FETCH_OBJ);
				foreach ($peliculas as $pelicula) {
					$peliculaObj = new Pelicula($pelicula->id, $pelicula->titulo, $pelicula->genero, $pelicula->director, $pelicula->year, $pelicula->sinopsis, $pelicula->cartel);
					//Añadimos el objeto $peliculaObj a la lista de peliculas, para tener un array con todas las peliculas en objetos
					$listaPeliculas[] = $peliculaObj;
				}

			} catch(PDOException $e){
				echo $e->getMessage();
			}
			$dbh = null;
			return $listaPeliculas;
		}

		//Mostrar pelicula por id
		//Recibe como parametro un id
		public static function mostrarPorId($unId){
			$dbh=Db::conectar();

			try{
				// Prepare
				$stmt = $dbh->prepare("SELECT * FROM pelicula WHERE id=:id");
				$stmt->bindValue(":id", $unId);
				// Excecute
				$stmt->execute();
				$pelicula = $stmt->fetch(PDO::FETCH_OBJ);
				$miPelicula = new Pelicula($pelicula->id, $pelicula->titulo, $pelicula->genero, $pelicula->director, $pelicula->year, $pelicula->sinopsis, $pelicula->cartel);
				
			} catch(PDOException $e){
				echo $e->getMessage();
			}
			$dbh = null;
			return $miPelicula;
		}

		//Eliminar una pelicula
		public static function eliminar($idPelicula){
			$dbh=Db::conectar();

			try{
				// Prepare
				$stmt = $dbh->prepare("DELETE FROM pelicula WHERE id=:id");
				$stmt->bindValue(':id', $idPelicula);
				// Excecute
				$stmt->execute();
			} catch(PDOException $e){
				echo $e->getMessage();
			}
				$dbh = null;
		}

		//Metodo para insertar una pelicula que recibe un objeto pelicula
		public static function insertar($unaPelicula){
			$dbh=Db::conectar();
			try{
			// Prepare
			// SI METEMOS DIRECTAMENTE LOS VALORES SIN VARIABLES, SE PONE BINDVALUE EN VEZ DE BINDPARAM
			$stmt = $dbh->prepare("INSERT INTO pelicula (titulo, genero, director, year, sinopsis, cartel) VALUES (:titulo, :genero, :director, :year, :sinopsis, :cartel)");
			// Bind
			$stmt->bindValue(':titulo', $unaPelicula->getTitulo());
			$stmt->bindValue(':genero', $unaPelicula->getGenero());
			$stmt->bindValue(':director', $unaPelicula->getDirector());
			$stmt->bindValue(':year', $unaPelicula->getYear());
			$stmt->bindValue(':sinopsis', $unaPelicula->getSinopsis());
			$stmt->bindValue(':cartel', $unaPelicula->getCartel());
			// Excecute
			$stmt->execute();

		} catch(PDOException $e){
			echo $e->getMessage();
		}
		$dbh = null;
	}

	//Modificar una pelicula pasandole un objeto pelicula con los valores a modificar
	public static function modificar($unaPelicula){
			$dbh=Db::conectar();
			try{
				// Prepare
				$stmt = $dbh->prepare("UPDATE pelicula SET titulo=:titulo, genero=:genero, director=:director, year=:year, sinopsis=:sinopsis, cartel=:cartel WHERE id=:id");
				
				$stmt->bindValue(':id', $unaPelicula->getId());
				$stmt->bindValue(':titulo', $unaPelicula->getTitulo());
				$stmt->bindValue(':genero', $unaPelicula->getGenero());
				$stmt->bindValue(':director', $unaPelicula->getDirector());
				$stmt->bindValue(':year', $unaPelicula->getYear());
				$stmt->bindValue(':sinopsis', $unaPelicula->getSinopsis());
				$stmt->bindValue(':cartel', $unaPelicula->getCartel());
				// Excecute
				$stmt->execute();
			} catch(PDOException $e){
				echo $e->getMessage();
			}
				$dbh = null;
		}

		//Mostrar las criticas de una pelicula por ID
		public static function mostrarCriticas($unId){
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
		}
}
?>