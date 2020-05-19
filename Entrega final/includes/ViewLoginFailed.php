<html>
    <head>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" type="text/css" href="css/registrocss.css" />
        <meta charset="utf-8">
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	    <script type="text/javascript" src="js/validaRegistro2.js"></script>
        <title>Log In</title>
    </head>
    
    <body>
        <div class="container">    
		<div class="panel">
        <div class="tittleForm"><p> Iniciar sesión con tu cuenta FilmBox </p></div>
            
            <div class ="contenedor">
				<div class ="input-contenedor-err">	
					<i class="fas fa-user-alt icon"></i>
                    <input type="text" name="userName" id="userName_login" placeholder="Introduzca e-mail">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Inicio de sesión fallido </small>
                </div>
                      
                <div class ="input-contenedor-err">
					<i class="fas fa-key icon"></i>
                    <input type="password" name="password" id="password_login" placeholder="********">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Inicio de sesión fallido</small>
                </div>
              
                <input type="submit" onclick="return validaLogin()" value="Log In" class="button">
            
                <p> ¿No tienes una cuenta? <a class="link" href="registro.php"> Regístrate</a></p> 
            </div>      
        
        </div>
        </div>  
	</body>
    
    <script src="js/validaLogin.js"> </script>
    
   
</html>



