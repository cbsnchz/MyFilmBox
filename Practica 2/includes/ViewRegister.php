<?php

namespace es\ucm\fdi\aw;
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 



class ViewRegister
{

    public static function getViewRegister()
    {
        $html = '<html>
                    <head>
                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
                        <link rel="stylesheet" type="text/css" href="css/registrocss.css" />
                        <title>Sing up</title>
                     </head>
        
                    <div class="formulario">
                        <h1> Registrarse </h1>
                        <div class ="contenedor">';
                    

                    if(isset($_SESSION["lengthNameValid"]) and !$_SESSION["lengthNameValid"]){
                        $html.= 
                        '<div class ="input-contenedor-err">
                            <i class="fas fa-user-alt icon-err"></i>
                            <input type="text" name="nombre" placeholder="Nombre completo">
                            <p class="text_err">El nombre debe tener más de 5 caracteres</p>
                        </div>';
                    }    
                    else{
                        $html.= 
                        '<div class ="input-contenedor">
                            <i class="fas fa-user-alt icon"></i>
                            <input type="text" name="nombre" placeholder="Nombre completo">
                        </div>';

                    }

                    //Mail no váildo o usuario ya existe
                    if ((isset($_SESSION["mailValid"]) and !$_SESSION["mailValid"]) or (isset($_SESSION['userExist']) and ($_SESSION['userExist']))){	
                        $html.= 
                            '<div class ="input-contenedor-err">
                                <i class="fas fa-at icon-err"></i>
                                <input type="text" name="nombreUsuario" placeholder="Introduzca e-mail">';

                        if(!$_SESSION["mailValid"])
                            $html.='<p class="text_err">Campo de correo electrónico erróneo</p>
                                    </div>';
                        else if ($_SESSION["userExist"]){
                            $html.='<p class="text_err">El usuario ya existe</p>
                                    </div>';
                        }

                    }
                    else{
                       
                        $html.= 
                        '<div class ="input-contenedor">
                            <i class="fas fa-at icon"></i>
                            <input type="text" name="nombreUsuario" placeholder="Introduzca e-mail">
                        </div>';
          
                    }


                    ///////////////////////////////////////////////////////////////////////////////
                    if (isset($_SESSION["lengthPswdValid"]) and !$_SESSION["lengthPswdValid"] ){	

                        $html.=
                        '<div class ="input-contenedor-err">
                            <i class="fas fa-key icon-err"></i>
                            <input type="password" name="password" placeholder="Contraseña">
                            <p class="text_err">La contraseña debe tener más de 5 caracteres.</p>
                        </div>';

                    }
                    else{
                       
                        $html.=
                        '<div class ="input-contenedor">
                            <i class="fas fa-key icon"></i>
                            <input type="password" name="password" placeholder="Contraseña">
                        </div>';
          
                    }
                    
                    if(isset($_SESSION["pswdMatch"]) and !$_SESSION["pswdMatch"] ){
                       
                        $html.=
                        '<div class ="input-contenedor-err">
                            <i class="fas fa-key icon-err"></i>
                            <input type="password" name="password2" placeholder="Repite contraseña">
                            <p class="text_err">Las contraseñas no coinciden.</p>
                        </div>';
          
                    }

                    else{
                       
                        $html.=
                        '<div class ="input-contenedor">
                            <i class="fas fa-key icon"></i>
                            <input type="password" name="password2" placeholder="Repite contraseña">
                        </div>';
          
                    }
                
                      $html.='<input type="submit" value="Sing Up" class="button">';
          
                      $html.='<p> ¿Ya tienes una cuenta? <a class="link" href="login.php"> Log In</a></p>  </div></html>';

                      return $html;
    }
}
    
    ?>