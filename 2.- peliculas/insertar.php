<?php
include "includes/cabecera.php";
?>

<header class="cabecera">
	<h1>Insertar canción</h1>
</header>
<section>

<?php
	if(!$_POST){
	 	//Si no has mandado nada pintas el formulario
?>

		<form action="manager.php" method="post" enctype="multipart/form-data">
		 	
		 	<section>
    			<label>Titulo:</label>
    			<input type="text" name="titulo" maxlength="100" required>
			</section>
			<section>
    			<label>Género:</label>
    			<input type="text" name="genero" required>
			</section>
			<section>
    			<label>Director:</label>
    			<input type="text" name="director" required>
    		</section>
   			<section>
    			<label>Año:</label>
    			<input type="number" name="year" required>
    		</section>
            <section>
                <label>Sinopsis:</label>
                <textarea name="sinopsis" cols="40" rows="5">
                    
                </textarea>
            </section>
   			<section>
    			<label>Cartel:</label>
    			<input type="file" name="cartel">
    		</section>    		
			<section>
    			<label></label>
    			<input type="submit" name="insertar" value="Enviar">
			</section>

		</form>


</section>

<?php

}

include "includes/pie.php";
?>