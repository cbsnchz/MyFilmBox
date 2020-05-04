
<?php
require_once __DIR__.'/includes/config.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Pago</title>
	</head>

	<body>
		<div id="contenedor">

			<?php
				require("includes/common/cabecera.php");
			?>

			<div id="contenido">
				<?php 
					$form = new es\ucm\fdi\aw\FormularioPago(); $form->gestiona();
				?>
			</div>

			<?php
				require("includes/common/pie.php");
			?>


		</div>
	</body>
</html>