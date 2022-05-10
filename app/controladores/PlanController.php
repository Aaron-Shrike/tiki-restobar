<?php 
  if(isset($_POST['accion'])){
    include("../../config/conexion.php");
    include("../modelos/Plan.php");
    $accion = $_POST['accion'];
    $plan = new Plan();
    if($accion == 'registrar'){
      $nombre = $_POST['nombre'];
      $result = $plan->registrar($nombre);
      if($result){
        header("Location:../../admin/planes.php");
      }else{
        header("Location:../../admin/plan.php");
      }
    }
    if($accion == 'actualizar'){
      $codigo = $_POST['codigo'];
      $nombre = $_POST['nombre'];
      $result = $plan->actualizar($codigo, $nombre);
      if($result){
        header("Location:../../admin/planes.php");
      }else{
        header("Location:../../admin/plan.php?id=$codigo");
      }
    }
    
	}
  if(isset($_GET['id'])){
    include("../../config/conexion.php");
    include("../modelos/Plan.php");
    $codigo = $_GET['id'];
    $plan = new Plan();
    $result = $plan->eliminar($codigo);
    if($result){
      header("Location:../../admin/planes.php");
    }
    else{
      die("Fallo al eliminar el plan");
    }
  }
?>