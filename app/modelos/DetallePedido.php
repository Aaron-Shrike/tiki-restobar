<?php 
    class DetallePedido {
        private $db;
		
		public function __construct(){
			$this->db = Conexion::conectar();
		}

		public function registrar($cod_pedido, $cod_producto, $cantidad, $precio)
		{
            $sql = "INSERT INTO detalle_pedido (codigo_pedido, codigo_producto, cantidad, precio) VALUES ($cod_pedido, $cod_producto, $cantidad, $precio);";
			$resultado = mysqli_query($this->db, $sql);
			if($resultado){
				$respuesta = array(
					'respuesta' => 'exito'
				);
			}else{
				$respuesta = array(
					'respuesta' => 'error'
				);
			}
			return $respuesta;
		}
    }
?>