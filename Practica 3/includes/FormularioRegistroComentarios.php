<?php
namespace es\ucm\fdi\aw;

class FormularioRegistroComentarios extends Form
{
	private $num = 0;
	
    public function __construct($_id) {
		$head = "MostrarPelicula.php?id=".$_id;
		$opcionesPorDefecto = array( 'action' => $head );
        parent::__construct('formRegistroComentarios', $opcionesPorDefecto);
		$this->num = $_id;
    }
    
    protected function generaCamposFormulario($datos)
    {
       $titulo = '';
	   $usuario = '';
	   $comentario = '';
	   
        if ($datos) {
            $titulo = isset($datos['titulo']) ? $datos['titulo'] : $titulo;
            $usuario = isset($datos['usuario']) ? $datos['usuario'] : $usuario;
			$comentario = isset($datos['comentario']) ? $datos['comentario'] : $comentario;
           
        }
    
        $html = file_get_contents("includes/ViewRegistroComentarios.php");
        return $html;
    }
   

    protected function procesaFormulario($datos)
    {
		$titulo = isset($datos['titulo']) ? $datos['titulo'] : null;
		$usuario = isset($datos['usuario']) ? $datos['usuario'] : null;
		$comentario = isset($datos['comentario']) ? $datos['comentario'] : null;
        if($this->num != 0){
			$Comentarios = Comentarios::crea($titulo, $usuario, $comentario, $this->num);
			if(!$Comentarios) echo 'No se ha podido crear el comentario';
			return "MostrarPelicula.php?id=".$this->num;
		}
		else{
			return 'catalogo.php';
		}
        
    }
}