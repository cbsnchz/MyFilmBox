<?php
namespace es\ucm\fdi\aw;

class Comentarios{
	
	public function imprimeComentarios($id){
		$app = AplicacionPeliculas::getSingleton();
		$conn = $app->conexionBd();
		$sql = "SELECT * FROM comentarios WHERE id_pelicula = '$id'";
		$result = $conn->query($sql)
			   or die ($conn->error. " en la línea ".(__LINE__-1));
		if($result->num_rows > 0){
			while($fila = $result->fetch_assoc()){
				echo "<h3>".$fila["titulo"]." por: ".$fila["usuario"]." fecha: ".$fila["Fecha"]."<h3>";
				echo "<p>".$fila["texto"]."<p>";
			}
		}
			
	}
	
}