<?php 
  if(isset($_POST['accion'])){
    include("../../config/conexion.php");
    include("../modelos/Reserva.php");
    $accion = $_POST['accion'];
    $reserva = new Reserva();
    
    if($accion == 'registrar'){
      $cod_cliente = $_POST['codigo-cliente'];
      $num_comensales = $_POST['numero-comensales'];
      $fecha = $_POST['fecha'];
      $hora = $_POST['hora'];
      $result = $reserva->registrar($cod_cliente, $num_comensales, $fecha, $hora);
      if($result){
        die(json_encode($result));
      }
    }
	}
?>