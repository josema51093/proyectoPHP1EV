<?php
	spl_autoload_register( function( $NombreClase ) {
	    include_once($NombreClase . '.php');
	} );	

	include "includes/cabecera.php";

	//Sacamos la fecha del día o la que diga el formulario
	if (!isset($_POST['fecha'])) {
		$date = new DateTime();
		//echo $date->format('d/m/Y');
		$fecha = $date->format('d/m/Y');
	} else {
		$date = new DateTime($_POST['fecha']);
		//echo $date->format('d/m/Y');
		$fecha = $date->format('d/m/Y');
	}
 	$listaReservas = CrudReserva::mostrar($fecha);

 	//Sacamos las reservas que coincidan con apellidos y fecha indicados
 	if (!isset($_POST['enviarFechApe'])) {
	} else {
		$date = new DateTime($_POST['fechaApellidos']);
		$fecha = $date->format('d/m/Y');
	}

	if (!isset($_POST['apellidos']) || !isset($_POST['fechaApellidos'])) {
	} else {
 	$reservasApeFecha = CrudReserva::mostrarPorApellidoFecha($fecha, $_POST['apellidos']);
	}
?>

<header class="cabecera">
	<h1>RESERVAS</h1><h3>Día:&nbsp;<?php echo $fecha;?></h3><h3>&nbsp;</h3>
</header>

<section>
	<h3>Busqueda por fecha</h3>
	<form action="reservas.php" method="post">
		<input type="date" name="fecha" value="<?php echo $fecha;?>">
		<input type="submit" value="Cambiar Fecha" name="soloFecha">
	</form>
	<form action="reservas.php" method="post">
		<h3>Busqueda por apellidos y fecha</h3>
		<label>Apellidos:</label>
		<input type="text" name="apellidos"><br>
		<label>Fecha: </label>
		<input type="date" name="fechaApellidos">
		<input type="submit" value="Buscar" name="enviarFechApe">
	</form>
	</form>
</section>

<section>



<table>
 <tr>
	 <th>Apellidos</th>
	 <th>Nombre</th>
	 <th>Hora</th>
	 <th>Comensales</th>
	 <th>Editar</th>
	 <th>Cancelar</th>
 </tr>

<?php
	if (!empty($reservasApeFecha)) {
		foreach ($reservasApeFecha as $reserva) {?>
			<tr>
				<td><?php echo $reserva->getApellidos() ?></td>
				<td><?php echo $reserva->getNombre() ?></td>
				<td><?php echo $reserva->getHora() ?></td>
				<td><?php echo $reserva->getComensales() ?></td>
				<td><a href="manager.php?id=<?php echo $reserva->getId()?>&accion=a">Edit</a> </td>
				<td><a href="manager.php?id=<?php echo $reserva->getId()?>&accion=e">x</a>   </td>
			</tr>
		<?php }
	} else { 

		foreach ($listaReservas as $reserva) {?>
			<tr>
				<td><?php echo $reserva->getApellidos() ?></td>
				<td><?php echo $reserva->getNombre() ?></td>
				<td><?php echo $reserva->getHora() ?></td>
				<td><?php echo $reserva->getComensales() ?></td>
				<td><a href="manager.php?id=<?php echo $reserva->getId()?>&accion=a">Edit</a> </td>
				<td><a href="manager.php?id=<?php echo $reserva->getId()?>&accion=e">x</a>   </td>
			</tr>
<?php }}?>

</table>


</section>

<?php
include "includes/pie.php";

?>
