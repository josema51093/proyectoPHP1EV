<?php
    spl_autoload_register( function($NombreClase) {
        include_once($NombreClase . '.php');
    } );
    include "includes/cabecera.php";
?>

<?php
    if (isset($_GET['id'])) {
        $unaReserva = CrudReserva::mostrarPorId($_GET['id']);

    }
?>
<div class="container">
    <header class="cabecera">
    	<h1>Actualizar Reserva</h1>
    </header>
    <section>

    		<form action="manager.php" method="post" enctype="multipart/form-data">
    		 	
    		 	<div class="form-group">
                    <label for="exampleInputNombre">Nombre</label>
                    <input type="text" id="exampleInputNombre" name="nombre" maxlength="100" class="form-control" required value="<?php echo $unaReserva->getNombre(); ?>">        
                </div>
    			<div class="form-group">
                    <label for="exampleInputApellidos">Apellidos</label>
                    <input type="text" id="exampleInputApellidos" name="apellidos" class="form-control" required value="<?php echo $unaReserva->getApellidos(); ?>">         
                </div>
    			<div class="form-group">
                    <label for="exampleInputHora">Hora</label>
                    <input type="text" id="exampleInputHora" name="hora" class="form-control" required value="<?php echo $unaReserva->getHora(); ?>">         
                </div>
                <div class="form-group">
                    <label for="exampleInputFecha">Fecha</label>
                    <input type="date" id="exampleInputFecha" name="fecha" class="form-control" required value="<?php echo $unaReserva->getFecha(); ?>">         
                </div>
       			<div class="form-group">
                    <label for="exampleInputComensales">Comensales</label>
                    <input type="number" id="exampleInputComensales" name="comensales"
                    class="form-control" required value="<?php echo $unaReserva->getComensales(); ?>">      
                </div>
        		<label></label>
                <input type="hidden" name="id" value="<?php echo $unaReserva->getId(); ?>">
        		<input type="submit" name="actualizar" value="Actualizar">
    			</section>

    		</form>


    </section>
</div>

<?php
    include "includes/pie.php";
?>