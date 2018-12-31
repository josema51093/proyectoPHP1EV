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
		<h1 class="text-primary">Videoclub El Jaroso Yonki</h1>
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
						<th scope="col">Actualizar</th>
						<th scope="col">Borrar</th>
						<th scope="col">Críticas</th>
					 </tr>
				</thead>
				<tbody>
					<?php
					$cont = 0;
						//Recorremos el array con objetos Pelicula y lo vamos pintando 
						foreach ($listaPeliculas as $pelicula) {?>
								<tr>
									<td class="align-middle"><?php echo $pelicula->getTitulo() ?></td>
									<td class="align-middle"><?php echo $pelicula->getGenero()?> </td>
									<td class="align-middle"><?php echo $pelicula->getDirector() ?></td>
									<td class="align-middle"><?php echo $pelicula->getYear() ?> </td>
									<td class="align-middle"><?php echo $pelicula->getSinopsis() ?></td>
									<td><img src="<?php echo $pelicula->getCartel() ?>"></td>
									<!-- <td><a href='manager.php?accion=criticas&id=<?php echo $pelicula->getId() ?>'>Ver criticas</a></td> -->
									<td class="align-middle"><a href='manager.php?accion=actualizar&id=<?php echo $pelicula->getId() ?>'><button class="btn btn-primary"><i class="fa fa-repeat"></i></button></a></td>
									<td class="align-middle"><a href='manager.php?accion=eliminar&id=<?php echo $pelicula->getId() ?>'><button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
									<td class="align-middle">
										<!-- <a href="#"><button class="btn-success"><i class="fa fa-eye"></i></button></a> -->
										  <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample<?php echo $cont; ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $cont; ?>" onclick="mostrar(<?php echo $cont; ?>)">
										    <i class="fa fa-eye"></i>
										  </button>
									</td>
									<tr>
										<td colspan="9">
											<div class="collapse" id="collapseExample<?php echo $cont; ?>">
											  <h2 class="text-center">Criticas: </h2>
											  <?php foreach ($pelicula->getCriticas() as $key => $value) {?>
											  <div class="card card-body">
											    <h5 class="text-center">Diario: 
											    	<p><?php echo $value["Autor"]?></p>
											    </h5>
											    <h5 class="text-center">Crítica: 
											    	<p><?php echo $value["Critica"]?></p>
											    </h5>
											    <h5 class="text-center">Puntuación: 
													<p><?php echo $value["Nota"]?></p>
											    </h5>
											  </div>

											  <?php }?>
											</div>
										</td>
									</tr>
								</tr>
					<?php $cont++;}?>
				</tbody>
			</table>
		</div>
	</div>
	
</div>



<?php



include 'includes/pie.php';
?>