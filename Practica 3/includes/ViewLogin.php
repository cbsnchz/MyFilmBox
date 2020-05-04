<html>
    <head>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" type="text/css" href="css/registrocss.css" />
        <meta charset="utf-8">


        <title>Log In</title>
    </head>
    
    <body>
        <div class="container">    
		<div class="panel">
            <h1> Iniciar sesión </h1>
            
            <div class ="contenedor">
				<div class ="input-contenedor">	
					<i class="fas fa-user-alt icon"></i>
                    <input type="text" name="userName" id="userName_login" placeholder="Introduzca e-mail">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Mensaje de error </small>
                </div>
                      
                <div class ="input-contenedor">
					<i class="fas fa-key icon"></i>
                    <input type="password" name="password" id="password_login" placeholder="********">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Mensaje de error </small>
                </div>

                
                <input type="submit" onclick="return validaLogin()" value="Log In" class="button">
                <p> ¿No tienes una cuenta? <a class="link" href="registro.php"> Regístrate</a></p> 
            </div>      
        
        </div>
        </div>  
	</body>
    
    <script src="js/validaLogin.js"> </script>
    
   
</html>



