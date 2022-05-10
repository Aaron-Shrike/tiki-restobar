<?php 
  if(isset($_POST['accion'])){
    include("../../config/conexion.php");
    include("../modelos/Carta.php");
    $accion = $_POST['accion'];
    $model = new Carta();
    if($accion == 'registrar'){
      $codigo_tipo = $_POST['tipo-producto'];
      $codigo_plan = $_POST['plan'];
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $precio = $_POST['precio'];
      $descripcion_imagen = $_POST['descripcion-imagen'];
      $url_imagen = $_POST['url-imagen'];
      $result = $model->registrar($codigo_tipo, $codigo_plan, $nombre, $descripcion, $precio, $descripcion_imagen, $url_imagen);
      if($result){
        header("Location:../../admin/cartas.php");
      }else{
        header("Location:../../admin/carta.php");
      }
    }
    if($accion == 'actualizar'){
      $codigo = $_POST['codigo'];
      $codigo_tipo = $_POST['tipo-producto'];
      $codigo_plan = $_POST['plan'];
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $precio = $_POST['precio'];
      $descripcion_imagen = $_POST['descripcion-imagen'];
      $url_imagen = $_POST['url-imagen'];
      $result = $model->actualizar($codigo, $codigo_tipo, $codigo_plan, $nombre, $descripcion, $precio, $descripcion_imagen, $url_imagen);
      if($result){
        header("Location:../../admin/cartas.php");
      }else{
        header("Location:../../admin/carta.php?id=$codigo");
      }
    }
    
	}
  if(isset($_GET['id'])){
    include("../../config/conexion.php");
    include("../modelos/Carta.php");
    $codigo = $_GET['id'];
    $model = new Carta();
    $result = $model->eliminar($codigo);
    if($result){
      header("Location:../../admin/cartas.php");
    }
    else{
      die("Fallo al eliminar el carta");
    }
  }
?>