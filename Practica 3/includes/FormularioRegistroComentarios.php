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
	   $texto = '';
	   
        if ($datos) {
            $titulo = isset($datos['titulo']) ? $datos['titulo'] : $titulo;
            $usuario = isset($datos['usuario']) ? $datos['usuario'] : $usuario;
			$texto = isset($datos['texto']) ? $datos['texto'] : $texto;
           
        }
    
        $html = file_get_contents("includes/ViewRegistroComentarios.php");
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
		$titulo = isset($datos['titulo']) ? $datos['titulo'] : null;
		$usuario = isset($datos['usuario']) ? $datos['usuario'] : null;
		$texto = isset($datos['texto']) ? $datos['texto'] : null;
		
        
		$Comentarios = Comentarios::crea($titulo, $usuario, $texto, $this->id);
        if(!$Comentarios) echo 'No se ha podido crear el comentario';
        return 'index.php';
    }
}