<html>
    <head>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" type="text/css" href="css/logincss.css" />
        <meta charset="utf-8">


        <title>Pago</title>
    </head>
    
    <body>
        <div class="container">    
		<div class="panel">
            <h1> Finalizar pago </h1>
            
            <div class ="contenedor">
				<div class ="input-contenedor">	
					<i class="fas fa-user-alt icon"></i>
                    <input type="text" name="nombreTitular" id="nombreTitular_pago" placeholder="Introduzca Titular de la tarjeta">
                    <small>Mensaje de error </small>
                </div>
				
				<div class ="input-contenedor">	
					<i class="fas fa-user-alt icon"></i>
                    <input type="text" name="app" id="app_pago" placeholder="Introduzca aplicación de pago">
                    <small>Mensaje de error </small>
                </div>
                      
                <div class ="input-contenedor">
					<i class="fas fa-key icon"></i>
                    <input type="text" name="cvv" id="cvv_pago" placeholder="Introduzca cvv de la tarjeta">
                    <small>Mensaje de error </small>
                </div>

                <input type="submit" onclick="return validaPago()" value="Pago" class="button">
                

            </div>      
        
        </div>
        </div>  
	</body>
    
    <script src="js/validaLogin.js"> </script>
    
   
</html>



