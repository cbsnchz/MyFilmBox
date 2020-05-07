<html>
    <head> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" type="text/css" href="css/registrocss.css" />
        <title>Sing up</title>
    </head>

    <body>
        <div class="container">
        <div class ="panel">
        <div class="tittleForm"><p> Únete a nuestra comunidad </p></div>

            <div class ="contenedor">
                    
                <div class ="input-contenedor">
                    <i class="fas fa-user-alt icon"></i>
                    <input type="text" id="name_reg" name="nombre" placeholder="Nombre completo">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small> text-here </small>
                </div>
                                            
                            
                <div class ="input-contenedor">
                    <i class="fas fa-at icon"></i>
                    <input type="text" id="username_reg" name="nombreUsuario" placeholder="Introduzca e-mail">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small> text-here </small>
                </div>
            
                <div class ="input-contenedor">
                    <i class="fas fa-key icon"></i>
                    <input type="password" id="password1_reg" name="password" placeholder="Contraseña">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small> text-here </small>
                </div>

                <div class ="input-contenedor">
                    <i class="fas fa-key icon"></i>
                    <input type="password" id="password2_reg" name="password2" placeholder="Repite contraseña">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small> text-here </small>
                </div>
               <!-- <button class="button"> Registrarse </button>-->
                <input type="submit" onclick="return validaRegister()" value="Sing Up" class="button">
                <div class="alternative">
                    <p> ¿Ya tienes una cuenta? <a class="link" href="login.php"> Log In</a></p>  
                </div>
            </div>
            

        </div>
        </div>
    </body>
    <script src="js/validaRegister.js"> </script>
       
</html>
