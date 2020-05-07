

<html>
    <head> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" type="text/css" href="css/peliculacss.css" />
        <title>Comentarios</title>
    </head>

    <body>
        <div class="container">
        <div class ="panel">
            <h1> Añade un nuevo comentario </h1>

            <div class ="contenedor">
                    
                <div class ="input-contenedor">
                    
                    <input type="text" id="usuario_com" name="usuario" placeholder="Usuario">
                    <small> text-here </small>
                </div>
                                            
                            
                <div class ="input-contenedor">
                    
                    <input type="text" id="titulo_com" name="titulo" placeholder="Titulo ">
                    <small> text-here </small>
                </div>
            
                <div class ="input-contenedor">
                    
                    <input type="text" id="comentario_com" name="comentario" placeholder="Comentario">                   
                    <small> text-here </small>
                </div>

               
                <input type="submit" onclick="return validaComentario()" value="Registrar comentario" class="button" name="subir">
               
            </div>
            

        </div>
        </div>
    </body>
    <script src="js/validaComentario.js"> </script>
       
</html>
