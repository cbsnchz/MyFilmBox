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
}
