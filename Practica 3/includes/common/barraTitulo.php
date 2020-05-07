<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/barraTitulo.css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<div id="titlebar">
    <div id="tittle"> My FilmBox </div>

    <div  class="container-3">
        <form action="buscar.php" method="post">
            <span class="icon"><i class="fa fa-search"></i></span>
            <input type="search" id="search" placeholder="Buscar..." name="search">
            
        </form>
    </div>

    <?php
        if(!isset($_SESSION["login"])){
			$html = '<div id="access">
                       <p> <a class="l+r" href="login.php"> Login </a> <a class="l+r" href="registro.php"> Registrarse </a></p>
                    </div>';
			echo $html; 
        }
        else{
            $html = '<div id="user">
                        <div id="dropdown">
                            <button onclick="myFunction()" class="dropbtn"><i class="far fa-user-circle"></i></button>
                            <div id="myDropdown" class="dropdown-content">';
                                

            if (isset($_SESSION["esAdmin"]) and $_SESSION["esAdmin"]){
                $html .=  '<a href="usersControl.php">Administrar usuarios</a>';
                $html .=  '<a href="añadirPelicula.php">Añadir pelicula</a>';
                $html .=  '<a href="logout.php">Añadir producto</a>';              

            }
            
            
            
            
            $html.='    <a href="logout.php">Logout</a>
                            </div>    
                        </div>
                    </div>';
            echo $html;         
        }
	?>	
     
<script src="js/perfil.js"></script>		
</div>
</html>
