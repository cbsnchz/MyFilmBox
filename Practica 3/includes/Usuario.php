<?php
namespace es\ucm\fdi\aw;

class Usuario
{

    private function getButton($rol){
        $html ='';
        switch($rol){

            case "user":
                $html.= '<input type="submit" value="Hacer admin" class="button_users">';
                $html.= '<input type="submit" value="Hacer critico" class="button_users">';
                break;
            
            case "admin":
                $html.= '<input type="submit" value="Hacer user" class="button_users">';
                $html.= '<input type="submit" value="Hacer critico" class="button_users">';
                break;

            case "critico":
                $html.= '<input type="submit" value="Hacer admin" class="button_users">';
                $html.= '<input type="submit" value="Hacer user" class="button_users">';
                break;
        }
        return $html;
    }

    public static function imprimelistaUsuarios()
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT * FROM Usuarios U";
        $result = $conn->query($sql);
        if ($result) {
            if ( $result->num_rows > 0) {
                $html = '
                    <html>
                        <head>
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
                            <link rel="stylesheet" type="text/css" href="css/usersControlcss.css" />
                            <meta charset="utf-8">
                            <title>Producto</title>
                        </head>
        
                        <body>
                            <?php
                                include("includes/common/cabecera.php");
                            ?>
                        <div class="usersControl_panel">';

                while($fila = $result->fetch_assoc()){
                   $html .= '<div class="card_user">
                                
                               
                                <img src="img/img_avatar.png" alt="Avatar" style="width:100%">
                                <div class="container_user">
                                    <h4><b>'.$fila["nombreUsuario"].'</b></h4>
                                    <p>'.$fila["nombre"].'</p>
                                    <p>'.$fila["rol"].'</p>
                                ';
                                $html .= self::getButton($fila["rol"]); 
                                $html .=
                                '
                                </div>
                            </div>';
                }
                $html.= '
                    </div>
                    </body>
                    <?php	
                        include("includes/common/pie.php");
                    ?>
                    </html>';

            }
            $result->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        echo $html;
    }

    public static function login($nombreUsuario, $password)
    {
        $user = self::buscaUsuario($nombreUsuario);
        if ($user && $user->compruebaPassword($password)) {
            return $user;
        }
        return false;
    }

    public static function buscaUsuario($nombreUsuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM Usuarios U WHERE U.nombreUsuario = '%s'", $conn->real_escape_string($nombreUsuario));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $user = new Usuario($fila['nombreUsuario'], $fila['nombre'], $fila['password'], $fila['rol']);
                $user->id = $fila['id'];
                $result = $user;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    
    public static function crea($nombreUsuario, $nombre, $password, $rol)
    {
        $user = self::buscaUsuario($nombreUsuario);
        if ($user) {
            return false;
        }
        $user = new Usuario($nombreUsuario, $nombre, self::hashPassword($password), $rol);
        return self::guarda($user);
    }
    
    private static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
    
    public static function guarda($usuario)
    {
        if ($usuario->id !== null) {
            return self::actualiza($usuario);
        }
        return self::inserta($usuario);
    }
    
    private static function inserta($usuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO Usuarios(nombreUsuario, nombre, password, rol) VALUES('%s', '%s', '%s', '%s')"
            , $conn->real_escape_string($usuario->nombreUsuario)
            , $conn->real_escape_string($usuario->nombre)
            , $conn->real_escape_string($usuario->password)
            , $conn->real_escape_string($usuario->rol));
        if ( $conn->query($query) ) {
            $usuario->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $usuario;
    }
    
    private static function actualiza($usuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("UPDATE Usuarios U SET nombreUsuario = '%s', nombre='%s', password='%s', rol='%s' WHERE U.id=%i"
            , $conn->real_escape_string($usuario->nombreUsuario)
            , $conn->real_escape_string($usuario->nombre)
            , $conn->real_escape_string($usuario->password)
            , $conn->real_escape_string($usuario->rol)
            , $usuario->id);
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows != 1) {
                echo "No se ha podido actualizar el usuario: " . $usuario->id;
                exit();
            }
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        
        return $usuario;
    }
    
    private $id;

    private $nombreUsuario;

    private $nombre;

    private $password;

    private $rol;

    private function __construct($nombreUsuario, $nombre, $password, $rol)
    {
        $this->nombreUsuario= $nombreUsuario;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->rol = $rol;
    }

    public function id()
    {
        return $this->id;
    }

    public function rol()
    {
        return $this->rol;
    }

    public function nombreUsuario() //nick - correo
    {
        return $this->nombreUsuario;
    }

    public function compruebaPassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function cambiaPassword($nuevoPassword)
    {
        $this->password = self::hashPassword($nuevoPassword);
    }
    public function nombre(){
        return $this->nombre;
    }
}
