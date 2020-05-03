<html>
    <head> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" type="text/css" href="css/logincss.css" />
        <title>Sing up</title>
    </head>

    <body>
        <div class="container">
        <div class ="panel">
            <h1> Registrarse </h1>

            <div class ="contenedor">
                    
                <div class ="input-contenedor">
                    <i class="fas fa-user-alt icon"></i>
                    <input type="text" id="name_reg" name="nombre" placeholder="Nombre completo">
                    
                    <small> text-here </small>
                </div>
                                            
                            
                <div class ="input-contenedor">
                    <i class="fas fa-at icon"></i>
                    <input type="text" id="username_reg" name="nombreUsuario" placeholder="Introduzca e-mail">
                    
                    <small> text-here </small>
                </div>
            
                <div class ="input-contenedor">
                    <i class="fas fa-key icon"></i>
                    <input type="password" id="password1_reg" name="password" placeholder="Contraseña">
                    
                    <small> text-here </small>
                </div>

                <div class ="input-contenedor">
                    <i class="fas fa-key icon"></i>
                    <input type="password" id="password2_reg" name="password2" placeholder="Repite contraseña">
                    
                    <small> text-here </small>
                </div>
                    
                <input type="submit" onclick="return validaRegister()" value="Sing Up" class="button">
                <p> ¿Ya tienes una cuenta? <a class="link" href="login.php"> Log In</a></p>  
            </div>
            

        </div>
        </div>
    </body>
    <script src="js/validaRegister.js"> </script>    
</html>
