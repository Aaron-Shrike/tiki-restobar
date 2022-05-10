<?php 
  if(isset($_POST['accion'])){
    include("../../config/conexion.php");
    include("../modelos/Pedido.php");
    include("../modelos/DetallePedido.php");
    $accion = $_POST['accion'];
    $pedido = new Pedido();
    $detalle_pedido = new DetallePedido();
    
    if($accion == 'registrar'){
      $cod_cliente = $_POST['codigo-cliente'];
      $nombre = $_POST['nombre'];
      $celular = $_POST['celular'];
      $direccion = $_POST['direccion'];
      $referencia = $_POST['referencia'];
      $propina = ($_POST['propina'] != "") ? $_POST['propina'] : 0;
      $costo_envio = $_POST['costo-envio'];
      $cantidad_productos = $_POST['cantidad-productos'];
      $puntos = $_POST['puntos'];
      $monto_total = $_POST['monto-total'];
      $productos = $_POST['productos'];
      $result = $pedido->registrar($cod_cliente, $nombre, $celular, $direccion, $referencia, $propina, $costo_envio, $cantidad_productos, $puntos, $monto_total);
      if($result['respuesta'] == 'exito' && $result['id_pedido'] > 0){
        foreach($productos as $value){
          $cantidad = (int) $value['cantidad'];
          if($cantidad > 0){
            $cod_pedido = $result['id_pedido'];
            $cod_producto = $value['codigo'];
            $precio = $value['precio'];
            $result1 = $detalle_pedido->registrar($cod_pedido, $cod_producto, $cantidad, $precio);
          }
        }
        die(json_encode($result));
      }
    }
	}
?>