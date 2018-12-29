<?php
	spl_autoload_register( function($NombreClase) {
		include_once($NombreClase . '.php');
	} );
include 'includes/cabecera.php';

//$bdpelicula = new BDPelicula();
$listaPeliculas = BDPelicula::mostrar();

?>

<table>
 <tr>
	 <th>Titulo</th>
	 <th>Genero</th>
	 <th>Director</th>
	 <th>Year</th>
	 <th>Sinopsis</th>
	 <th>Cartel</th>
	 <!-- <th>Criticas</th> -->
	 <th>Actualizar</th>
	 <th>Borrar</th>
 </tr>

<?php
	//Recorremos el array con objetos Pelicula y lo vamos pintando 
	foreach ($listaPeliculas as $pelicula) {?>
			<tr>
				<td><?php echo $pelicula->getTitulo() ?></td>
				<td><?php echo $pelicula->getGenero()?> </td>
				<td><?php echo $pelicula->getDirector() ?></td>
				<td><?php echo $pelicula->getYear() ?> </td>
				<td><?php echo $pelicula->getSinopsis() ?></td>
				<td><img src="<?php echo $pelicula->getCartel() ?>"></td>
				<!-- <td><a href='manager.php?accion=criticas&id=<?php echo $pelicula->getId() ?>'>Ver criticas</a></td> -->
				<td><a href='manager.php?accion=actualizar&id=<?php echo $pelicula->getId() ?>'>Actualizar</a></td>
				<td><a href='manager.php?accion=eliminar&id=<?php echo $pelicula->getId() ?>'>Eliminar</a></td>
			</tr>
<?php }?>

</table>

<?php



include 'includes/pie.php';
?>