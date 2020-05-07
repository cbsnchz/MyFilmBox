<?php
namespace es\ucm\fdi\aw;

class FormularioRegistroComentarios extends Form
{
	private $id;
	
    public function __construct($_id) {
        parent::__construct('formRegistroComentarios');
		$this->id = $_id;
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
		
        
		$Comentarios = Comentarios::crea($titulo, $usuario, $comentario, $this->id);
        if(!$Comentarios) echo 'No se ha podido crear el comentario';
        return 'index.php';
    }
}