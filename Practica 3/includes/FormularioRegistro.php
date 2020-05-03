<?php
namespace es\ucm\fdi\aw;

class FormularioRegistro extends Form
{
    public function __construct() {
        parent::__construct('formRegistro');
    }
    
    protected function generaCamposFormulario($datos)
    {
        $nombreUsuario = '';
        $nombre = '';
        if ($datos) {
            $nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : $nombreUsuario;
            $nombre = isset($datos['nombre']) ? $datos['nombre'] : $nombre;
        }
    
        $html = file_get_contents("includes/ViewRegister.php");
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
        $result = array();
        
        $nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : null;
        
        //correo electronico
        if ( empty($nombreUsuario) || mb_strlen($nombreUsuario) < 5 || !(filter_var($nombreUsuario, FILTER_VALIDATE_EMAIL)) ) {
            $_SESSION["mailValid"] = false; 
        }
        else{
            $_SESSION["mailValid"] = true; 
        }

        $nombre = isset($datos['nombre']) ? $datos['nombre'] : null;
        if ( empty($nombre) || mb_strlen($nombre) < 5 ) {
            $_SESSION["lengthNameValid"] = false;
        }
        else{
            $_SESSION["lengthNameValid"] = true;
        }
        
        $password = isset($datos['password']) ? $datos['password'] : null;
        if ( empty($password) || mb_strlen($password) < 5 ) {
            $_SESSION["lengthPswdValid"] = false;
        }
        else{
            $_SESSION["lengthPswdValid"] = true;
        }
        
        $password2 = isset($datos['password2']) ? $datos['password2'] : null;
        if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
            $_SESSION["pswdMatch"] = false;
        }

        else{
            $_SESSION["pswdMatch"] = true;
        }
        
        if (count($result) === 0) {
            $user = Usuario::crea($nombreUsuario, $nombre, $password, 'user');
            if ( ! $user ) {
                $_SESSION['userExist'] = true;
            } else {
                $_SESSION['userExist'] = false;
                $_SESSION['login'] = true;
                $_SESSION['nombre'] = $nombreUsuario;
                $result = 'index.php';
            }
        }
        echo console.log("Prueba");
        return $result;
    }
}