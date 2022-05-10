<?php 
  if(isset($_POST['accion'])){
    include("../../config/conexion.php");
    include("../modelos/TipoProducto.php");
    $accion = $_POST['accion'];
    $tipo = new TipoProducto();
    if($accion == 'registrar'){
      $descripcion = $_POST['descripcion'];
      $result = $tipo->registrar($descripcion);
      if($result){
        header("Location:../../admin/tipos-de-producto.php");
      }else{
        header("Location:../../admin/tipo-de-producto.php");
      }
    }
    if($accion == 'actualizar'){
      $codigo = $_POST['codigo'];
      $descripcion = $_POST['descripcion'];
      $result = $tipo->actualizar($codigo, $descripcion);
      if($result){
        header("Location:../../admin/tipos-de-producto.php");
      }else{
        header("Location:../../admin/tipo-de-producto.php?id=$codigo");
      }
    }
    
	}
  if(isset($_GET['id'])){
    include("../../config/conexion.php");
    include("../modelos/TipoProducto.php");
    $codigo = $_GET['id'];
    $tipo = new TipoProducto();
    $result = $tipo->eliminar($codigo);
    if($result){
      header("Location:../../admin/tipos-de-producto.php");
    }
    else{
      die("Fallo al eliminar el tipo de producto");
    }
  }
?>