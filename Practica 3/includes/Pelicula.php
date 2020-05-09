<?php
namespace es\ucm\fdi\aw;

class Pelicula{
	
	public function imprimePelicula($id){
		$app = AplicacionPeliculas::getSingleton();
		$conn = $app->conexionBd();
		$sql = "SELECT * FROM pelicula WHERE id = '$id'";
		$result = $conn->query($sql)
			   or die ($conn->error. " en la línea ".(__LINE__-1));

		if($result->num_rows > 0){
			$fila = $result->fetch_assoc();
			echo "<h2>".$fila["nombre"]."<h2>";
			echo '<img class = "img_peli" src="'.$fila["imagen"].'">';
			echo "<p> Año: ".$fila["anyo"]."<p>";
			echo "<p> Duración: ".$fila["duracion"]." min <p>";
			echo "<p> Director: ".$fila["director"]."<p>";
			echo "<p> Reparto: ".$fila["reparto"]."<p>";
			echo "<p> Productora: ".$fila["productora"]."<p>";
			echo "<p> Genero: ".$fila["genero"]."<p>";
			echo "<p> Sinopsis: ".$fila["sinopsis"]."<p>";
			
		}
	}
	
	public static function buscaPelicula($titulo)
    {
        $app = AplicacionPeliculas::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM pelicula U WHERE U.nombre = '%s'", $conn->real_escape_string($titulo));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $Pelicula = new Pelicula($fila['nombre'], $fila['anyo'], $fila['duracion'], $fila['director'], $fila['origen'], $fila['calificacion'], $fila['reparto'], $fila['productora'], $fila['genero'], $fila['sinopsis'], $fila['imagen']);
                $Pelicula->id = $fila['id'];
                $result = $Pelicula;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    
    public static function crea($titulo, $anyo, $duracion,$director, $origen, $calificacion, $reparto,  $productora, $genero, $sinopsis, $imagen)
    {
        $Pelicula = self::buscaPelicula($titulo);
        if ($Pelicula) {
            return false;
        }
        $Pelicula = new Pelicula($titulo, $anyo, $duracion,$director, $origen, $calificacion, $reparto,  $productora, $genero, $sinopsis, $imagen);
        return self::inserta($Pelicula);
    }
    
    private static function inserta($Pelicula)
    {
        $app = AplicacionPeliculas::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO pelicula(nombre, anyo, duracion, director, origen, calificacion, reparto, productora, genero, sinopsis, imagen) VALUES('%s', '%s', '%s', '%s','%s', '%s', '%s', '%s','%s', '%s', '%s')"
            , $conn->real_escape_string($Pelicula->titulo)
            , $conn->real_escape_string($Pelicula->anyo)
            , $conn->real_escape_string($Pelicula->duracion)
            , $conn->real_escape_string($Pelicula->director)
			, $conn->real_escape_string($Pelicula->origen)
            , $conn->real_escape_string($Pelicula->calificacion)
            , $conn->real_escape_string($Pelicula->reparto)
            , $conn->real_escape_string($Pelicula->productora)
			, $conn->real_escape_string($Pelicula->genero)
            , $conn->real_escape_string($Pelicula->sinopsis)
			, $conn->real_escape_string($Pelicula->imagen));        
        if ( $conn->query($query) ) {
            $Pelicula->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $Pelicula;
    }
    
  
	private $id;
	private $titulo;
	private $anyo;
	private $duracion;
	private $reparto;
	private $director;
	private $productora;
	private $sinopsis;
	private $genero;
	private $calificacion;
	private $origen;
	private $imagen;

    private function __construct($titulo, $anyo, $duracion,$director, $origen, $calificacion, $reparto,  $productora, $genero, $sinopsis, $imagen)
    {
        $this->titulo= $titulo;
        $this->anyo = $anyo;
        $this->duracion = $duracion;
        $this->reparto = $reparto;
		$this->director= $director;
        $this->productora = $productora;
        $this->sinopsis = $sinopsis;
        $this->genero = $genero;
		$this->calificacion = $calificacion;
        $this->origen = $origen;
		$this->imagen = $imagen;
    }
	public function id()
    {
        return $this->id;
    }
	public function imagen()
    {
        return $this->imagen;
    }
    public function titulo()
    {
        return $this->titulo;
    }
	public function anyo()
    {
        return $this->anyo;
    }
	public function duracion()
    {
        return $this->duracion;
    }
	public function reparto()
    {
        return $this->reparto;
    }
	public function director()
    {
        return $this->director;
    }
	public function productora()
    {
        return $this->productora;
    }
	public function sinopsis()
    {
        return $this->sinopsis;
    }
	public function genero()
    {
        return $this->genero;
    }
	public function calificacion()
    {
        return $this->calificacion;
    }
	public function origen()
    {
        return $this->origen;
    }
	
	 public static function imprimeListaPeliculas()
    {
        $app = AplicacionPeliculas::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT * FROM pelicula";
        $result = $conn->query($sql);
        if ($result) {
            if ( $result->num_rows > 0) {
                $html = '
                    <html>
                        <head>
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
							<link rel="stylesheet" type="text/css" href="css/catalogo.css" />                            <meta charset="utf-8">
                            
                        </head>
						
						<div class = "contenedor">
                        <body>
                            <?php
                                include("includes/common/cabecera.php");
                            ?>
                        <div class="contenido" class="main">
							<div id="myBtnContainer">
							 <button class="btn active" onclick="filterSelection(\'all\')"> Todos</button>
							  <button class="btn" onclick="filterSelection(\'Accion\')"> Accion</button>
							  <button class="btn" onclick="filterSelection(\'Adultas\')"> Adultas</button>
							  <button class="btn" onclick="filterSelection(\'Aventuras\')"> Aveturas</button>
							  <button class="btn" onclick="filterSelection(\'Belica\')"> Bélica</button>
							  <button class="btn" onclick="filterSelection(\'Ciencia Ficcion\')"> Ciencia Ficcion</button>
							  <button class="btn" onclick="filterSelection(\'Comedia\')"> Comedia</button>
							  <button class="btn" onclick="filterSelection(\'Drama\')"> Drama</button>
							  <button class="btn" onclick="filterSelection(\'Infantiles\')"> Infantiles</button>
							  <button class="btn" onclick="filterSelection(\'Musical\')"> Musical</button>
							  <button class="btn" onclick="filterSelection(\'Musical\')"> Oeste</button>
							  <button class="btn" onclick="filterSelection(\'Romance\')"> Romance</button>
							  <button class="btn" onclick="filterSelection(\'Terror\')"> Terror</button>
							  <button class="btn" onclick="filterSelection(\'Thiller\')"> Thiller</button>
		  
							</div>
							
							';

                while($fila = $result->fetch_assoc()){
                   $html .= '
				   <div class="column '.$fila["genero"].'">
								<div class="content">
									<div class = "card-peli">
										<img src="'.$fila["imagen"].'"style="width:100%">
										<div class = "container-card">
											<h4> <a href="Mostrarpelicula.php?id='.$fila["id"].'">"'.$fila["nombre"].'"</a> </h4>
											<h5> '.$fila["director"].'</h5>
										</div>
									</div>
								</div>
							</div>';
                                 
                                
                }
                $html.= '
                    </div>
                    </body>
                    <?php	
                        include("includes/common/pie.php");
                    ?>
					</div>
					<script type="text/javascript" src="js/catalogo.js"></script>
                    </html>';

            }
            $result->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        echo $html;
    }
	
public static function ultimasPeliculas(){
	$app = AplicacionPeliculas::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT id, nombre, genero, imagen FROM pelicula WHERE id >= (SELECT MAX(id) FROM pelicula) - 2";
        $result = $conn->query($sql);
        if ($result) {
            if ( $result->num_rows > 0) {
                $html = '
                    <html>
                        <head>
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
							<link rel="stylesheet" type="text/css" href="css/index.css" /> 
							<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
							<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
							<meta charset="utf-8">
                            
                        </head>
						
						
                        <body>
						<div class = "contenedor">
                            <?php
                                include("includes/common/cabecera.php");
                            ?>
							<h3 class="main"> Añadido recientemente: </h3>
							
						
							<div class="row">
							
							';

                while($fila = $result->fetch_assoc()){
                   $html .= '
							<div id="novedades" class="main">

						<div class="column">
							<div class = "card-peli" >
							
									<img src="'.$fila["imagen"].'"style="width:100%">
									<div class = "container-card">
										<h4> <a href="Mostrarpelicula.php?id='.$fila["id"].'">"'.$fila["nombre"].'"</a> </h4>
										
									</div>
								
								
							</div>
							</div>
							</div>
						';         
                                
                }
                $html.= '			
                    
                    
					</div>
					</body>
					<?php	
                        include("includes/common/pie.php");
                    ?>
                    </html>';

            }
            $result->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        echo $html;
	}
	
public static function buscarPeliculas(){
		$app = AplicacionPeliculas::getSingleton();
		$busqueda = $_POST['search'];
        $conn = $app->conexionBd();
        $sql = "SELECT id, nombre, imagen, director, genero FROM pelicula WHERE nombre LIKE '%$busqueda%'";
        $result = $conn->query($sql);
        if ($result) {
            if ( $result->num_rows > 0) {
                $html = '
                    <html>
                        <head>
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
							<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
							<link rel="stylesheet" type="text/css" href="css/buscar.css" />
							<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
							<meta charset="utf-8">
                            
                        </head>
						
						
                        <body>
						<div id = "contenedor">
                            <?php
                                include("includes/common/cabecera.php");
                            ?>
							<div id="contenido">
							
							
						
							
							
							';

                while($fila = $result->fetch_assoc()){
                   $html .= '
							   <div class="column '.$fila["genero"].'">
									<div class="content">
										<div class = "card-peli">
											<img src="'.$fila["imagen"].'"style="width:100%">
											<div class = "container-card">
												<h5> <a href="Mostrarpelicula.php?id='.$fila["id"].'">"'.$fila["nombre"].'"</a> </h5>
												<h6> '.$fila["director"].'</h6>
											</div>
										</div>
									</div>
								</div>';         
                                
                }
                $html.= '	
							</div>
							<?php	
								include("includes/common/pie.php");
							?>
						</div>
					</body>
					
                    </html>';

            }
			else{
				$html = '<h3>No se han encontrado resultados para la búsqueda: "'.$busqueda.'"</h3>';
				while($result->num_rows === 0){
						$busqueda = substr($busqueda, 0, -1);
						
						$sql = "SELECT id, nombre, imagen, director,genero FROM pelicula WHERE nombre LIKE '%$busqueda%'";
						$result = $conn->query($sql)
							   or die ($conn->error. " en la línea ".(LINE-1));
					}
					$html.='<h3>Resultados relacionados: </h3>';
					while($fila = $result->fetch_assoc()){
						$html.='<div class="column '.$fila["genero"].'">
									<div class="content">
										<div class = "card-peli">
											<img src="'.$fila["imagen"].'"style="width:100%">
											<div class = "container-card">
												<h5> <a href="Mostrarpelicula.php?id='.$fila["id"].'">"'.$fila["nombre"].'"</a> </h5>
												<h6> '.$fila["director"].'</h6>
											</div>
										</div>
									</div>
								</div>';
					}
			}
            $result->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
	echo $html;
}
}
