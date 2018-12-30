<?php
	spl_autoload_register( function($NombreClase) {
		include_once($NombreClase . '.php');
	} );
include 'includes/cabecera.php';

//$bdpelicula = new BDPelicula();
$listaPeliculas = BDPelicula::mostrar();

?>

<div class="container">
	<div class="row">
		<div class="table table-responsive table-hover">
			<table class="text-center">
				<thead>
					<tr>
						<th scope="col">Titulo</th>
						<th scope="col">Genero</th>
						<th scope="col">Director</th>
						<th scope="col">Year</th>
						<th scope="col">Sinopsis</th>
						<th scope="col">Cartel</th>
						<th scope="col">Críticas</th>
						<th scope="col">Actualizar</th>
						<th scope="col">Borrar</th>
					 </tr>
				</thead>
				<tbody>
					<?php
						//Recorremos el array con objetos Pelicula y lo vamos pintando 
						foreach ($listaPeliculas as $pelicula) {?>
								<tr>
									<td class="align-middle"><?php echo $pelicula->getTitulo() ?></td>
									<td class="align-middle"><?php echo $pelicula->getGenero()?> </td>
									<td class="align-middle"><?php echo $pelicula->getDirector() ?></td>
									<td class="align-middle"><?php echo $pelicula->getYear() ?> </td>
									<td class="align-middle"><?php echo $pelicula->getSinopsis() ?></td>
									<td><img src="<?php echo $pelicula->getCartel() ?>"></td>
									<td class="align-middle">
										<a href="#"><button class="btn-success"><i class="fa fa-eye"></i></button></a>
									</td>
									<!-- <td><a href='manager.php?accion=criticas&id=<?php echo $pelicula->getId() ?>'>Ver criticas</a></td> -->
									<td class="align-middle"><a href='manager.php?accion=actualizar&id=<?php echo $pelicula->getId() ?>'><button class="btn-primary"><i class="fa fa-repeat"></i></button></a></td>
									<td class="align-middle"><a href='manager.php?accion=eliminar&id=<?php echo $pelicula->getId() ?>'><button class="btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
								</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
	
</div>



<?php



include 'includes/pie.php';
?>