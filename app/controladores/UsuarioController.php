<?php 
  if(isset($_POST['accion'])){
    include("../../config/conexion.php");
    include("../modelos/Usuario.php");
    $accion = $_POST['accion'];
    $usuario = new Usuario();
    if($accion == 'registrar'){
      $codigo_tipo = $_POST['tipo-usuario'];
      $nombre = $_POST['nombre'];
      $contrasenia = $_POST['contrasenia'];
      $result = $usuario->registrar($codigo_tipo, $nombre, $contrasenia);
      if($result){
        header("Location:../../admin/usuarios.php");
      }else{
        header("Location:../../admin/usuario.php");
      }
    }
    if($accion == 'actualizar'){
      $codigo = $_POST['codigo'];
      $codigo_tipo = $_POST['tipo-usuario'];
      $nombre = $_POST['nombre'];
      $contrasenia = $_POST['contrasenia'];
      $result = $usuario->actualizar($codigo, $codigo_tipo, $nombre, $contrasenia);
      if($result){
        header("Location:../../admin/usuarios.php");
      }else{
        header("Location:../../admin/usuario.php?id=$codigo");
      }
    }
    
	}
  if(isset($_GET['id'])){
    include("../../config/conexion.php");
    include("../modelos/Usuario.php");
    $codigo = $_GET['id'];
    $usuario = new Usuario();
    $result = $usuario->eliminar($codigo);
    if($result){
      header("Location:../../admin/usuarios.php");
    }
    else{
      die("Fallo al eliminar el usuario");
    }
  }
?>