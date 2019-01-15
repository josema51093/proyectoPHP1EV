<?php
include "includes/cabecera.php";
?>
    <div class="container">
        <header class="cabecera">
        	<h1>Insertar película</h1>
        </header>
        <section>

<?php
	if(!$_POST){
	 	//Si no has mandado nada pintas el formulario
?>
        <form action="manager.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputTitulo">Titulo</label>
            <input type="text" name="titulo" maxlength="100" class="form-control" id="exampleInputTitulo"  placeholder="Introduzca un titulo válido" required="required">
          </div>
          <div class="form-group">
            <label for="exampleInputGenero">Genero</label>
            <input type="text" name="genero" class="form-control" id="exampleInputGenero" placeholder="Introduzca un genero" required="required">
          </div>
          <div class="form-group">
            <label for="exampleInputDirector">Director</label>
            <input type="text" name="director" class="form-control" id="exampleInputDirector" placeholder="Introduzca un director" required="required">
          </div>
          <div class="form-group">
            <label for="exampleInputYear">Año</label>
            <input type="number" name="year" class="form-control" id="exampleInputYear" placeholder="Introduzca un año" required="required">
          </div>
          <div class="form-group">
            <label for="exampleInputSinopsis">Sinopsis</label>
            <textarea id="exampleInputSinopsis" name="sinopsis" cols="60" rows="5" required="required">
                
            </textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputCartel">Cartel</label>
            <input type="file" id="exampleInputCartel" name="cartel">
          </div>
          <button type="submit" class="btn btn-primary" name="insertar">Insertar</button>
        </form>
    </div>

		<!-- <form action="manager.php" method="post" enctype="multipart/form-data">
		 	
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

		</form> -->


</section>

<?php

}

include "includes/pie.php";
?>