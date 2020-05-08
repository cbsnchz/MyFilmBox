<!DOCTYPE html>
<html>
    <head> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" type="text/css" href="css/peliculacss.css" />
        <title>Comentarios</title>
    </head>

    <body>
        <div class="container">
        <div class ="panel">

            <div class ="textarea">
                <p class="msg"> Añade un nuevo comentario: <br/>   
                <div class ="input-contenedor">
                    
                    <input type="varchar" id="usuario_com" name="usuario" placeholder="Usuario"> </br>
                </div>
                                            
                            
                <div class ="input-contenedor">
                    
                    <input type="varchar" id="titulo_com" name="titulo" placeholder="Titulo"> </br>
                </div>
            
                <div class ="input-contenedor">
                    <textarea id="comentario_com" name="comentario" placeholder="Escriba aqui su comentario" autofocus ></textarea></p>
				
                </div>

               
                <input type="submit" onclick="return validaComentario()" value="Publicar" class="button" name="subir">
               
            </div>
            

        </div>
		</div>
	</body>
<script src="js/validaComentario.js"> </script>
</html>
