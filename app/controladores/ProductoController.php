<?php 
  if(isset($_POST['accion'])){
    include("../../config/conexion.php");
    include("../modelos/Producto.php");
    $accion = $_POST['accion'];
    $model = new Producto();
    if($accion == 'registrar'){
      $codigo_tipo = $_POST['tipo-producto'];
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $precio = $_POST['precio'];
      $result = $model->registrar($codigo_tipo, $nombre, $descripcion, $precio);
      if($result){
        header("Location:../../admin/productos.php");
      }else{
        header("Location:../../admin/producto.php");
      }
    }
    if($accion == 'actualizar'){
      $codigo = $_POST['codigo'];
      $codigo_tipo = $_POST['tipo-producto'];
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $precio = $_POST['precio'];
      $result = $model->actualizar($codigo, $codigo_tipo, $nombre, $descripcion, $precio);
      if($result){
        header("Location:../../admin/productos.php");
      }else{
        header("Location:../../admin/producto.php?id=$codigo");
      }
    }
    
	}
  if(isset($_GET['id'])){
    include("../../config/conexion.php");
    include("../modelos/Producto.php");
    $codigo = $_GET['id'];
    $model = new Producto();
    $result = $model->eliminar($codigo);
    if($result){
      header("Location:../../admin/productos.php");
    }
    else{
      die("Fallo al eliminar el producto");
    }
  }
?>