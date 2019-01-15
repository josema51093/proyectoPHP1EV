<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>comprobaciones by jason</title>
</head>
<body>
	<form method="POST" action="index.php">
		Para entrar en el sistema escriba su nombre de usuario y contraseña:
		<br>
		usuario:
		<input type="text" name="usuario">
		<br>
		contraseña:
		<input type="password" name="pass">
		<button>entrar</button>
	</form>
	<?php
		
		if (isset($_POST["usuario"]) && isset($_POST["pass"])) {
			$usuario    = $_POST["usuario"];
			$contraseña = $_POST["pass"];
		}

		if (!empty($usuario) && !empty($contraseña)) {
			header("Location: reservas.php");
		}

		/*$usuario    = $_POST["usuario"];
		$contraseña = $_POST["contraseña"];

		$consulta = "SELECT COUNT(*) FROM $dbTabla WHERE campo1='$usuario' AND campo2='$contraseña'";
		$result = sqlite_exec($db, $consulta);
		if (!$result) {
			print "<p>Error en la consulta.</p>\n";
		}elseif ($result[0][0] > 0) {
			print "<p>Nombre de usuario y contraseña correctos.</p>\n";
			header("Location: reservas.php");
		}*/

		//$consulta = "SELECT COUNT(*) FROM $dbTabla WHERE campo1=''algo' AND campo2='algo'";

		/*
			EJEMPLO DE CREACION DE UNA CLASE PARA COMPROBAR LA SUBIDA DE ARCHIVOS AL SERVIDOR.
		*/

		/*
		class actualizar {
			var $maxsize = 0;
			var $message = “”;
			var $newfile = “”;
			var $newpath = “”;

			var $filesize = 0;
			var $filetype = “”;
			var $filename = “”;
			var $filetemp;
			var $fileexte;

			var $allowed;
			var $blocked;
			var $isimage;
			var $isupload;

			//Funcion que actualiza las extensiones.
			function Upload() {
				$this->allowed = array(“image/bmp”,”image/gif”,”image/jpeg”,”image/pjpeg”,”image/png”,”image/x-png”);
				$this->blocked = array(“php”,”phtml”,”php3″,”php4″,”js”,”shtml”,”pl”,”py”);
				$this->message = “”;
				$this->isupload = false;
			}
			function setFile($field) {
				$this->filesize = $_FILES[$field][‘size’];
				$this->filename = $_FILES[$field][‘name’];
				$this->filetemp = $_FILES[$field][‘tmp_name’];
				$this->filetype = mime_content_type($this->filetemp);
				$this->fileexte = substr($this->filename, strrpos($this->filename, ‘.’)+1);

				$this->newfile = substr(md5(uniqid(rand())),0,8).”.”.$this->fileexte;
			}
			function setPath($value) {
				$this->newpath = $value;
			}
			function setMaxSize($value) {
				$this->maxsize = $value;
			}
			function isImage($value) {
				$this->isimage = $value;
			}
			function save() {
				if (is_uploaded_file($this->filetemp)) {
					// verificar que el archivo es valido
					if ($this->filename == “”) {
						$this->message = “No file upload”;
						$this->isupload = false;
						return false;
					}
				}
			}
			// verificar la longitud maxima
			if ($this->maxsize != 0) {
				if ($this->filesize > $this->maxsize*1024) {
					$this->message = “Large File Size”;
					$this->isupload = false;
					return false;
				}
			}
		}*/


		/*
			EJEMPLO DE HASH
		 */

		$timeTarget = 0.05; // 50 milisegundos 

		$coste = 8;
		do {
		    $coste++;
		    $inicio = microtime(true);
		    password_hash("test", PASSWORD_BCRYPT, ["cost" => $coste]);
		    $fin = microtime(true);
		} while (($fin - $inicio) < $timeTarget);

		echo "<h1>EJEMPLO DE HASH</h1>";
		echo "Coste apropiado encontrado: " . $coste . "\n";



		//EJEMPLOS DE COMO PREVENIR UNA INYECCION DE SQL.
		/*
		//con PDO
		$stmt = $pdo->prepare('SELECT * FROM enfermos WHERE doctor = :nombre');
	    $stmt->execute(array('nombre' => $nombre));
	    foreach ($stmt as $row) {
	        // Hacer algo con $row
	    }*/
		
		/*
		//Con SQL
		$stmt = $dbConnection->prepare('SELECT * FROM ejecutivo WHERE jefe = ?');
	    $stmt->bind_param('s', $jefe);

	    $stmt->execute();

	    $result = $stmt->get_result();
	    while ($row = $result->fetch_assoc()){
	        // Hacer algo con $row
	    }*/

	?>
</body>
</html>