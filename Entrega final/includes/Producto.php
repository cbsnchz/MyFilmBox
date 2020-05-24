<?php
namespace es\ucm\fdi\aw;

class Producto{
	
	public function imprimeProducto($id){
		$app = AplicacionProductos::getSingleton();
		$conn = $app->conexionBd();
		$sql = "SELECT * FROM producto WHERE Id = '$id'";
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
	
	public static function buscaProducto($nombre)
    {
        $app = AplicacionProductos::getSingleton();
        $conn = $app->conexionBd();
       
        $query = sprintf("SELECT * FROM producto U WHERE U.nombre = '%s'", $conn->real_escape_string($nombre));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $Producto = new Producto($fila['nombre'], $fila['precio'], $fila['descripcion'], $fila['categoria'], $fila['imagen']);
                $Producto->Id = $fila['Id'];
                $result = $Producto;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    
    public static function crea($nombre, $precio, $descripcion, $categoria, $imagen)
    {
        $Producto = self::buscaProducto($nombre);
        if ($Producto) {
            return false;
        }
        $Producto = new Producto($nombre, $precio, $descripcion, $categoria, $imagen);
        return self::inserta($Producto);
    }
    
    private static function inserta($Producto)
    {
        $app = AplicacionProductos::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO producto(nombre, precio, descripcion, categoria, imagen) VALUES('%s', '%s', '%s', '%s','%s')"
            , $conn->real_escape_string($Producto->nombre)
            , $conn->real_escape_string($Producto->precio)
            , $conn->real_escape_string($Producto->descripcion)
            , $conn->real_escape_string($Producto->categoria)
			, $conn->real_escape_string($Producto->imagen));        
        if ( $conn->query($query) ) {
            $Producto->Id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $Producto;
    }
    
  
	private $Id;
	private $nombre;
	private $precio;
	private $descripcion;
	private $categoria;
	private $imagen;

    private function __construct($nombre, $precio, $descripcion, $categoria, $imagen)
    {
        $this->nombre= $nombre;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
		$this->imagen = $imagen;
    }
	public function Id()
    {
        return $this->Id;
    }
	public function imagen()
    {
        return $this->imagen;
    }
    public function nombre()
    {
        return $this->nombre;
    }
	public function precio()
    {
        return $this->precio;
    }
	public function descripcion()
    {
        return $this->descripcion;
    }
	public function categoria()
    {
        return $this->categoria;
    }
	
	 public static function imprimeListaProductos()
    {
        $app = AplicacionProductos::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT Id, nombre, imagen, categoria FROM producto";
        $result = $conn->query($sql);
        if ($result) {
            if ( $result->num_rows > 0) {
                $html = '
                    <html>
                        <head>
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
							<link rel="stylesheet" type="text/css" href="css/tienda.css" />                            <meta charset="utf-8">
                            
                        </head>
						
						<div class = "contenedor">
                        <body>
                            <?php
                                include("includes/common/cabecera.php");
                            ?>
                        <div class="contenido" class="main">
							<div class="myBtnContainer">
							  <button  class="btn" onclick="filterSelection(\'all\')"> Todos</button>
							  <button  class="btn"onclick="filterSelection(\'pelicula\')"> Peliculas</button>
							  <button  class="btn"onclick="filterSelection(\'serie\')"> Serie</button>
							  <button  class="btn" onclick="filterSelection(\'accesorio\')"> Accesorios</button>
							  <button  class="btn" onclick="filterSelection(\'merchandicing\')"> Merchandising</button> 
							  
							</div>
							
							';

                while($fila = $result->fetch_assoc()){
                   $html .= '
				   <div class="column '.$fila["categoria"].'">
								<div class="content">
									<div class = "card-peli">
										<img src="'.$fila["imagen"].'"style="width:100%">
										<div class = "container-card">
											<h4> <a href="viewProducto.php?id='.$fila["Id"].'">'.$fila["nombre"].'</a> </h4>
	
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
	public static function ultimosProductos(){
	$app = AplicacionProductos::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT Id, nombre, imagen FROM producto WHERE id >= (SELECT MAX(id) FROM producto) - 4";
        $result = $conn->query($sql);
        if ($result) {
            if ( $result->num_rows > 0) {
                $html = '
                    
							<h3> Últimos productos: </h3>
							
						
							<div class="row">
							
							';

                while($fila = $result->fetch_assoc()){
                   $html .= '
							

						<div class="column">
							<div class = "card-peli" >
							
									<img src="'.$fila["imagen"].'"style="width:100%">
									<div class = "container-card">
										<h4> <a href="viewProducto.php?id='.$fila["Id"].'">'.$fila["nombre"].'</a> </h4>
										
									</div>
								
								
							
							</div>
							</div>
						';         
                                
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

