<html>
    <head>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" type="text/css" href="css/logincss.css" />
        <meta charset="utf-8">


        <title>Pago</title>
    </head>
    
    <body>
			<script language="JavaScript" type="text/javascript">
		alert("Esta página web es un proyecto universitario, por favor, no introduzca datos reales");
		</script>
                    
        <div class="container">    
		<div class="panel">
            <h1> Finalizar pago </h1>
            
            <div class ="contenedor">
				<div class ="input-contenedor">	
					<i class="fas fa-user-alt icon"></i>
                    <input type="text" name="nombreTitular" id="nombreTitular_pago" placeholder="Introduzca titular de la tarjeta">
                    
                </div>
				
				<div class ="input-contenedor">	
					<i class="fas fa-angle-double-right icon"></i>
                    <input type="text" name="numero" id="numero_pago" placeholder="Introduzca el número de tarjeta">
                    
                </div>
				
				<div class ="input-contenedor">	
					<i class="far fa-address-card icon"></i>
                    <input type="text" name="app" id="app_pago" placeholder="Introduzca aplicación de pago">
                    
                </div>
                      
                <div class ="input-contenedor">
					<i class="fas fa-key icon"></i>
                    <input type="text" name="cvv" id="cvv_pago" placeholder="Introduzca cvv de la tarjeta">
                    
                </div>

               <button  class="button" onclick=""> <a href="catalogo.php">Terminar compra</a></button>
                

            </div>      
        
        </div>
        </div>  
	</body>
    
    <script src="js/validaLogin.js"> </script>
    
   
</html>



