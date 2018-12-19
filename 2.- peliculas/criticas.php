<?php
	spl_autoload_register( function($NombreClase) {
		include_once($NombreClase . '.php');
	} );
include 'includes/cabecera.php';

//$bdpelicula = new BDPelicula();
if (isset($_GET['id'])) {
	$unaPelicula = BDPelicula::mostrarPorId($_GET['id']);
	$listaCriticas = BDPelicula::mostrarCriticas($_GET['id']);	
}


?>

<h1>Listado de Criticas para <?php echo $unaPelicula->getTitulo(); ?></h1>

<table>
 <tr>
	 <th>Autor</th>
	 <th>Texo</th>
	 <th>Nota</th>
	 <th>Borrar</th>
 </tr>

<?php
	//Recorremos el array con objetos Pelicula y lo vamos pintando 
	foreach ($listaCriticas as $critica) {?>
			<tr>
				<td><?php echo $critica->getAutor(); ?></td>
				<td><?php echo $critica->getTexto(); ?> </td>
				<td><?php echo $critica->getNota(); ?></td>
				<td><a href='manager.php?accion=eliminar&id=<?php echo $critica->getId() ?>'>Eliminar</a></td>
			</tr>
<?php }?>

</table>

<?php



include 'includes/pie.php';
?>