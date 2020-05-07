<?php
namespace es\ucm\fdi\aw;

class FormularioRegistroPelicula extends Form
{
    public function __construct() {
        parent::__construct('formRegistroPelicula');
    }
    
    protected function generaCamposFormulario($datos)
    {
       $titulo = '';
	   $anyo = '';
	   $duracion = '';
	   $reparto = '';
	   $director = '';
	   $productora = '';
	   $sinopsis = '';
	   $genero = '';
	   $calificacion='';
	   $origen='';
	
	   
        if ($datos) {
            $titulo = isset($datos['titulo']) ? $datos['titulo'] : $titulo;
            $anyo = isset($datos['anyo']) ? $datos['anyo'] : $anyo;
            $duracion = isset($datos['duracion']) ? $datos['duracion'] : $duracion;
            $reparto = isset($datos['reparto']) ? $datos['reparto'] : $reparto;
			$director = isset($datos['director']) ? $datos['director'] : $director;
            $productora = isset($datos['productora']) ? $datos['productora'] : $productora;
            $sinopsis = isset($datos['sinopsis']) ? $datos['sinopsis'] : $sinopsis;
            $genero = isset($datos['genero']) ? $datos['genero'] : $genero;
			$calificacion = isset($datos['calificacion']) ? $datos['calificacion'] : $calificacion;
            $origen = isset($datos['origen']) ? $datos['origen'] : $origen;
			
        }
    
        $html = file_get_contents("includes/ViewRegistroPelicula.php");
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
		$titulo = isset($datos['titulo']) ? $datos['titulo'] : null;
		$anyo = isset($datos['anyo']) ? $datos['anyo'] : null;
		$duracion = isset($datos['duracion']) ? $datos['duracion'] : null;
		$reparto = isset($datos['reparto']) ? $datos['reparto'] : null;
		$director = isset($datos['director']) ? $datos['director'] : null;
		$productora = isset($datos['productora']) ? $datos['productora'] : null;
		$sinopsis = isset($datos['sinopsis']) ? $datos['sinopsis'] : null;
		$genero = isset($datos['genero']) ? $datos['genero'] : null;
        $calificacion = isset($datos['calificacion']) ? $datos['calificacion'] : null;
		$origen = isset($datos['origen']) ? $datos['origen'] : null;
		/*
        $imagen = isset($datos['imagen']) ? $datos['imagen'] : null;
		
		if (isset($_POST['subir'])) {
				   //Recogemos el archivo enviado por el formulario
				   $imagen = $_FILES['imagen']['name'];
				   //Si el archivo contiene algo y es diferente de vacio
				   if (isset($imagen) && $imagen != "") {
					  //Obtenemos algunos datos necesarios sobre el archivo
					  $tipo = $_FILES['imagen']['type'];
					  $tamano = $_FILES['imagen']['size'];
					  $temp = $_FILES['imagen']['tmp_name'];
					  //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
					 if (!( strpos($tipo, "jpg")  && ($tamano < 2000000))) {
						echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
						- Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
					 }
					 else {
						//Si la imagen es correcta en tamaño y tipo
						//Se intenta subir al servidor
						if (move_uploaded_file($temp, 'img/'.$imagen)) {
							//Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
							chmod('images/'.$archivo, 0777);
							//Mostramos el mensaje de que se ha subido co éxito
							echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
							//Mostramos la imagen subida
							echo '<p><img src="images/'.$archivo.'"></p>';
						}
						else {
						   //Si no se ha podido subir la imagen, mostramos un mensaje de error
						   echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
						}
					  }
				   }
				}
		else return 'catalogo.php';*/
		
		$Pelicula = Pelicula::crea($titulo, $anyo, $duracion,$director, $origen, $calificacion, $reparto,  $productora, $genero, $sinopsis,'img/default.jpg' );
        if(!$Pelicula) echo 'No se ha podido crear la pelicula';
        return 'index.php';
    }
}