<!DOCTYPE html>
<?php 
    if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

    if(!isset($_SESSION['esAdmin']) || !$_SESSION['esAdmin'] ){
        echo "No tienes permisos para acceder a esta página";
        exit;
    }
    require_once __DIR__.'/includes/config.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Resgistro</title>
	</head>

	<body>
		<div class="contenedor">

			<?php require("includes/common/cabecera.php");?>

			<div id="contenido">
				<?php 
					es\ucm\fdi\aw\Usuario::imprimelistaUsuarios();
				?>
			</div>

			<?php require("includes/common/pie.php");?>
		</div>
	</body>
</html>