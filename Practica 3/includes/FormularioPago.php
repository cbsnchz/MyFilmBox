<?php

namespace es\ucm\fdi\aw;
class FormularioPago extends Form
{
    public function __construct() {
        parent::__construct('formPago');
    }
    
    protected function generaCamposFormulario($datos)
    {
        $nombreTitular = '';
        if ($datos) {
            $nombreTitular = isset($datos['nombreTitular']) ? $datos['nombreTitular'] : $nombreTitular;
        }

        $html = file_get_contents("includes/ViewPago.php");
        return $html;
    }

     

    protected function procesaFormulario($datos)
    {
        $result = array();
        
        $nombreTitular = isset($datos['nombreTitular']) ? $datos['nombreTitular'] : null;
                
        if ( empty($nombreUsuario) ) {
            $_SESSION["emptyTitular"] = true; 
        }
        else{
            $_SESSION["emptyTitular"] = false; 
        }
        
        $app = isset($datos['app']) ? $datos['app'] : null;
        if ( empty($app) ) {
            $_SESSION["emptyApp"] = true; 
        }
        else{
            $_SESSION["emptyApp"] = false; 
        }
		
        $cvv = isset($datos['cvv']) ? $datos['cvv'] : null;
        if ( empty($cvv) ) {
            $_SESSION["emptyCvv"] = true; 
        }
        else{
            $_SESSION["emptyCvv"] = false; 
        }
        return $result;
    }
}