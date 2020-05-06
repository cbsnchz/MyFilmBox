<html>
    <head> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" type="text/css" href="css/registrocss.css" />
        <title>Sing up</title>
    </head>

    <body>
        <div class="container">
        <div class ="panel">
            <h1> Registra una película </h1>

            <div class ="contenedor">
                    
                <div class ="input-contenedor">
                    
                    <input type="text" id="titulo_pelicula" name="titulo" placeholder="Titulo de la película: ">
                    <small> text-here </small>
                </div>
                                            
                            
                <div class ="input-contenedor">
                    
                    <input type="text" id="anyo_pelicula" name="anyo" placeholder="Año: ">
                    <small> text-here </small>
                </div>
            
                <div class ="input-contenedor">
                    
                    <input type="text" id="duracion_pelicula" name="duracion" placeholder="Duracion en mins.:">                   
                    <small> text-here </small>
                </div>

                <div class ="input-contenedor">
                   
                    <input type="text" id="director_pelicula" name="director" placeholder="Director:">
                    
                    <small> text-here </small>
                </div>
				 <div class ="input-contenedor">
                    
                    <input type="text" id="reparto_pelicula" name="reparto" placeholder="Reparto de actores: ">                   
                    <small> text-here </small>
                </div>

                <div class ="input-contenedor">
                   
                    <input type="text" id="productora_pelicula" name="productora" placeholder="Productora(s): ">
                    
                    <small> text-here </small>
                </div>
				 <div class ="input-contenedor">
                   
                    <input type="text" id="origen_pelicula" name="origen" placeholder="Pais de origen: ">
                    
                    <small> text-here </small>
                </div>
				 <div class ="input-contenedor">                 
                    
					<select name="genero" id="genero_pelicula" placeholder="Genero: ">
					  <option value="Accion">Accion</option>
					  <option value="Ciencia Ficcion">Ciencia Ficcion</option>
					  <option value="Drama">Drama</option>
					  <option value="Terror">Terror</option>
					  <option value="Thriller">Thriller</option>
					  <option value="Romance">Romance</option>
					  <option value="Aventuras">Aventuras</option>
					  <option value="Musical">Musical</option>
					  <option value="Belica">Belica</option>
					  <option value="Comedia">Comedia</option>
					  <option value="Oeste">Oeste</option>
					  <option value="Infantiles">Infantiles</option>
					</select>
					<small> text-here </small>
                </div>
				<div class ="input-contenedor">                 
                    
					<select name="calificacion" id="calificacion_pelicula" placeholder="Calificacion: ">
					  <option value="Todas las edades">Todas las edades</option>
					  <option value="+7">+7</option>
					  <option value="+12">+12</option>
					  <option value="+16">+16</option>
					  <option value="+18">+18</option>
					</select>
					<small> text-here </small>
                </div>

                <div class ="input-contenedor">
                   
                    <input type="text" id="sinopsis_pelicula" name="sinopsis" placeholder="Sinopsis: ">
                    
                    <small> text-here </small>
                </div>
				
               <!-- <button class="button"> Registrarse </button>-->
                <input type="submit" onclick="return validaRegistroPelicula()" value="Registrar la pelicula" class="button">
               
            </div>
            

        </div>
        </div>
    </body>
    <script src="js/validaRegistroPelicula.js"> </script>
       
</html>
