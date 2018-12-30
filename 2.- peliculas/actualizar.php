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
<div class="container">
    <header class="cabecera">
    	<h1>Actualizar película</h1>
    </header>
    <section>

    		<form action="manager.php" method="post" enctype="multipart/form-data">
    		 	
    		 	<div class="form-group">
                    <label for="exampleInputTitulo">Titulo</label>
                    <input type="text" id="exampleInputTitulo" name="titulo" maxlength="100" class="form-control" required value="<?php echo $unaPelicula->getTitulo(); ?>">        
                </div>
    			<div class="form-group">
                    <label for="exampleInputGenero">Genero</label>
                    <input type="text" id="exampleInputGenero" name="genero" class="form-control" required value="<?php echo $unaPelicula->getGenero(); ?>">         
                </div>
    			<div class="form-group">
                    <label for="exampleInputDirector">Director</label>
                    <input type="text" id="exampleInputDirector" name="director" class="form-control" required value="<?php echo $unaPelicula->getDirector(); ?>">         
                </div>
       			<div class="form-group">
                    <label for="exampleInputYear">Año</label>
                    <input type="number" id="exampleInputYear" name="year"
                    class="form-control" required value="<?php echo $unaPelicula->getYear(); ?>">      
                </div>
                <div class="form-group">
                    <label for="exampleInputSinopsis">Sinopsis</label>
                    <textarea name="sinopsis" id="exampleInputSinopsis" cols="60" rows="5" ><?php echo $unaPelicula->getSinopsis(); ?></textarea>
                </div>
       			<div class="form-group">
                    <label for="exampleInputCartel">Cartel</label>
                    <input type="file" id="exampleInputCartel" name="cartel" value="<?php echo $unaPelicula->getCartel(); ?>">      
                </div>  		
    			<section>
        			<label></label>
                    <input type="hidden" name="id" value="<?php echo $unaPelicula->getId(); ?>">
        			<input type="submit" class="btn-primary" name="actualizar" value="Actualizar">
    			</section>

    		</form>


    </section>
</div>

<?php
    include "includes/pie.php";
?>