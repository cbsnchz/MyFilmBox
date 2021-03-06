
<?php 
    require_once __DIR__.'/includes/config.php';

    if(!isset($_SESSION['esAdmin']) || !$_SESSION['esAdmin'] ){
        echo "No tienes permisos para acceder a esta página";
        exit;
	}


    
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Administración de productos</title>
	</head>

	<body>
		<div class="contenedor">

			<?php require("includes/common/cabecera.php");?>

			<div id="contenido">
				<?php 
					if (isset($_REQUEST["page"]))
						$page = $_REQUEST["page"];
					else
						$page=0;

					if (isset($_REQUEST["numregs"]))
						$numregs = $_REQUEST["numregs"];
					else
						$numregs=24;

					if (isset($_REQUEST["sort"]))
						$sort = $_REQUEST["sort"];
					else
						$sort="nombre";

					es\ucm\fdi\aw\Producto::imprimeTablaProductos($page,$numregs, $sort);
				?>
			</div>

			<?php require("includes/common/pie.php");?>
		</div>
	</body>
</html>
