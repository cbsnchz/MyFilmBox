<?php
namespace es\ucm\fdi\aw;
setlocale(LC_TIME,"es_ES");

class Comentarios{
	
	private $titulo;
	private $usuario;
	private $texto;
	private $fecha;

	public function __construct($_titulo, $_usuario, $_fecha, $_texto){
		$this->titulo = $_titulo;
		$this->usuario = $_usuario;
		$this->fecha = $_fecha;
		$this->texto = $_texto;
	}
	
	public function imprimeComentarios($id){
		$app = AplicacionPeliculas::getSingleton();
		$conn = $app->conexionBd();
		$sql = "SELECT * FROM comentarios WHERE id_pelicula = '$id'";
		$result = $conn->query($sql)
			   or die ($conn->error. " en la línea ".(__LINE__-1));
		$comentarios = array();
		if($result->num_rows > 0){
			$i = 0;
			while($fila = $result->fetch_assoc()){
				$comentarios[$i] = new Comentarios($fila["titulo"],$fila["usuario"],$fila["Fecha"],$fila["texto"]);
				$i = $i+1;
			}
		}
		return $comentarios;	
	}
	
	public static function crea($titulo, $usuario, $texto, $id)
    {
        $Comentarios = new Comentarios($titulo, $usuario, null, $texto);
        return self::inserta($Comentarios, $id);
    }
	
	 private static function inserta($Comentarios, $id_pelicula)
    {
        $app = AplicacionPeliculas::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO comentarios(usuario, titulo, texto, id_pelicula) VALUES('%s', '%s', '%s','%s')"
            , $conn->real_escape_string($Comentarios->titulo)
            , $conn->real_escape_string($Comentarios->anyo)
            , $conn->real_escape_string($Comentarios->texto)
			, $conn->real_escape_string($id_pelicula));        
        if ( $conn->query($query) ) {
            $Comentario->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $Comentarios;
    }
	
	public function getTitulo(){
		return $this->titulo;
	}
	
	public function getUsuario(){
		return $this->usuario;
	}
	
	public function getFecha(){
		return $this->fecha;
	}
	
	public function getTexto(){
		return $this->texto;
	}
	
	
	
	
}