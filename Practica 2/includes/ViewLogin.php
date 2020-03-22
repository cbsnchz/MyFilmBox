<?php

namespace es\ucm\fdi\aw;
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 



class ViewLogin
{

    public static function getViewLogin()
    {
        $html = '<html>
                    <head>
                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
                        <link rel="stylesheet" type="text/css" href="css/logincss.css" />
                        <meta charset="utf-8">
                        <title>Portada</title>
                    </head>
    
                    <div class="panel">
                    <h1> Iniciar sesión </h1>
                    <div class ="contenedor">';
                    
                    if (!isset($_SESSION["emptyUser"]) or !$_SESSION["emptyUser"] ){	
                        $html.= 
                          '<div class ="input-contenedor">
                              <i class="fas fa-user-alt icon"></i>
                              <input type="text" name="userName" placeholder="Introduzca e-mail">
                          </div>';
                      }
                    else{
                        $html.= 
                          '<div class ="input-contenedor-err">
                              <i class="fas fa-user-alt icon-err"></i>
                              <input type="text" name="userName" placeholder="Campo obligatorio: Introduzca e-mail">
                          </div>';
          
                    }
          
                    if (!isset($_SESSION["emptyPassword"]) or !$_SESSION["emptyPassword"] ){	
                         $html.= '<div class ="input-contenedor">
                                     <i class="fas fa-key icon"></i>
                                     <input type="password" name="password" placeholder="********">
                                 </div>';
                    }
                    else {
                        $html.= '<div class ="input-contenedor-err">
                                    <i class="fas fa-key icon-err"></i>
                                    <input class="pswdReq" type="password" name="password" placeholder="Campo obligatorio: Introduzca contraseña">
                                </div>';
                      }

                      $html.='<input type="submit" value="Log In" class="button">';
          
                      $html.='<p> ¿No tienes una cuenta? <a class="link" href="registro.php"> Regístrate</a></p>   </div></html>';

                      return $html;
    }
}
    
    ?>