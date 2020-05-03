<?php

namespace es\ucm\fdi\aw;
class FormularioLogin extends Form
{
    public function __construct() {
        parent::__construct('formLogin');
    }
    
    protected function generaCamposFormulario($datos)
    {
        $nombreUsuario = '';
        if ($datos) {
            $nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : $nombreUsuario;
        }

        $html = file_get_contents("includes/ViewLogin.php");
        return $html;
    }

     

    protected function procesaFormulario($datos)
    {
        $result = array();
        
        $nombreUsuario = isset($datos['userName']) ? $datos['userName'] : null;
                
        if ( empty($nombreUsuario) ) {
            $_SESSION["emptyUser"] = true; 
        }
        else{
            $_SESSION["emptyUser"] = false; 
        }
        
        $password = isset($datos['password']) ? $datos['password'] : null;
        if ( empty($password) ) {
            $_SESSION["emptyPassword"] = true; 
        }
        else{
            $_SESSION["emptyPassword"] = false; 
        }
        
        if (count($result) === 0) {
            $usuario = Usuario::login($nombreUsuario, $password);
            if ( ! $usuario ) {
                $_SESSION['novalidUP'] = true; 
            } else {
                $_SESSION['novalidUP'] = false; 
                $_SESSION['login'] = true;
                $_SESSION['nombre'] = $usuario->nombre();
                $_SESSION['esAdmin'] = strcmp($usuario->rol(), 'admin') == 0 ? true : false;
                $result = 'index.php';
            }
        }
        return $result;
    }
}