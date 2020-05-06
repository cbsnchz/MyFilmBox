<?php
namespace es\ucm\fdi\aw;

class clasePelicula
{


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
                $clasePelicula = new clasePelicula($fila['nombre'], $fila['anyo'], $fila['duracion'], $fila['director'], $fila['origen'], $fila['calificacion'], $fila['reparto'], $fila['imagen'], $fila['productora'], $fila['genero'], $fila['sinopsis']);
                $clasePelicula->id = $fila['id'];
                $result = $clasePelicula;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    
    public static function crea($titulo, $anyo, $duracion,$director, $origen, $calificacion, $reparto,  $productora, $genero, $sinopsis)
    {
        $clasePelicula = self::buscaPelicula($titulo);
        if ($clasePelicula) {
            return false;
        }
        $clasePelicula = new clasePelicula($titulo, $anyo, $duracion,$director, $origen, $calificacion, $reparto,  $productora, $genero, $sinopsis);
        return self::inserta($clasePelicula);
    }
    
    private static function inserta($clasePelicula)
    {
        $app = AplicacionPeliculas::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO pelicula(nombre, anyo, duracion, director, origen, calificacion, reparto, productora, genero, sinopsis) VALUES('%s', '%s', '%s', '%s','%s', '%s', '%s', '%s','%s', '%s')"
            , $conn->real_escape_string($clasePelicula->titulo)
            , $conn->real_escape_string($clasePelicula->anyo)
            , $conn->real_escape_string($clasePelicula->duracion)
            , $conn->real_escape_string($clasePelicula->director)
			, $conn->real_escape_string($clasePelicula->origen)
            , $conn->real_escape_string($clasePelicula->calificacion)
            , $conn->real_escape_string($clasePelicula->reparto)
            , $conn->real_escape_string($clasePelicula->productora)
			, $conn->real_escape_string($clasePelicula->genero)
            , $conn->real_escape_string($clasePelicula->sinopsis));        
        if ( $conn->query($query) ) {
            $clasePelicula->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $clasePelicula;
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

    private function __construct($titulo, $anyo, $duracion,$director, $origen, $calificacion, $reparto,  $productora, $genero, $sinopsis)
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
    }
	public function id()
    {
        return $this->id;
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
