
<!DOCTYPE html>
<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
    require_once __DIR__.'/includes/config.php';
    $form = new es\ucm\fdi\aw\FormularioRegistro(); 
    $form->gestiona();

?>