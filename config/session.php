<?php 
    function usuario_en_sesion(){
        if(!isset($_SESSION['nombre'])){
            header('Location:iniciar-sesion.php');
            exit();
        }
    }

    session_start();
    usuario_en_sesion();
?>