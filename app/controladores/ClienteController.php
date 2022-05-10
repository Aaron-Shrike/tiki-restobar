<?php 
  if(isset($_POST['accion'])){
    include("../../config/conexion.php");
    include("../modelos/Cliente.php");
    $accion = $_POST['accion'];
    $obj = new Cliente();
    
    if($accion == 'registrar'){
      $dni = $_POST['dni'];
      $nombre = $_POST['nombre-cliente'];
      $celular = $_POST['celular-cliente'];
      $result = $obj->registrar($dni, $nombre, $celular);
      if($result){
        die(json_encode($result));
      }
    }
    if($accion == 'buscar-cliente'){
      $dni = $_POST['buscar-dni'];
      $result = $obj->buscar_cliente($dni);
      if($result){
        die(json_encode($result));
      }
    }
	}
?>