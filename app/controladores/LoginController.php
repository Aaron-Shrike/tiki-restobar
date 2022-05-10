<?php 
    if(isset($_POST['accion'])){
        include("../../config/conexion.php");
        include("../modelos/Login.php");
        $accion = $_POST['accion'];
        $login = new Login();
        
        if($accion == 'iniciar_sesion'){
            $usuario = $_POST['usuario'];
            $contrasenia = $_POST['contrasenia'];
            $result = $login->iniciar_sesion($usuario, $contrasenia);
            if($result){
                header('Location:../../admin/panel-de-control.php');
            }else{
                header('Location:../../admin/iniciar-sesion.php');
            }
        }
    }
?>