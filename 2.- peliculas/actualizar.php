<?php
    spl_autoload_register( function($NombreClase) {
        include_once($NombreClase . '.php');
    } );
    include "includes/cabecera.php";
?>

<?php
    if (isset($_GET['id'])) {
        $unaPelicula = BDPelicula::mostrarPorId($_GET['id']);

    }
?>

<header class="cabecera">
	<h1>Actualizar pelicula</h1>
</header>
<section>

		<form action="manager.php" method="post" enctype="multipart/form-data">
		 	
		 	<section>
    			<label>Titulo:</label>
    			<input type="text" name="titulo" maxlength="100" required value="<?php echo $unaPelicula->getTitulo(); ?>">
			</section>
			<section>
    			<label>Género:</label>
    			<input type="text" name="genero" required value="<?php echo $unaPelicula->getGenero(); ?>">
			</section>
			<section>
    			<label>Director:</label>
    			<input type="text" name="director" required value="<?php echo $unaPelicula->getDirector(); ?>">
    		</section>
   			<section>
    			<label>Año:</label>
    			<input type="number" name="year" required value="<?php echo $unaPelicula->getYear(); ?>">
    		</section>
            <section>
                <label>Sinopsis:</label>
                <textarea name="sinopsis" cols="40" rows="5" ><?php echo $unaPelicula->getSinopsis(); ?></textarea>
            </section>
   			<section>
    			<label>Cartel:</label>
    			<input type="file" name="cartel" value="<?php echo $unaPelicula->getCartel(); ?>">
    		</section>    		
			<section>
    			<label></label>
                <input type="hidden" name="id" value="<?php echo $unaPelicula->getId(); ?>">
    			<input type="submit" name="actualizar" value="Enviar">
			</section>

		</form>


</section>

<?php
    include "includes/pie.php";
?>