<?php 
    class Pedido {
        private $db;
		
		public function __construct(){
			$this->db = Conexion::conectar();
		}

		public function registrar($cod_cliente, $nombre, $celular, $direccion, $referencia, $propina, $costo_envio, $cantidad_productos, $puntos, $monto_total)
		{
			if($cod_cliente > 0){
				$sql = "UPDATE cliente SET puntos = $puntos WHERE codigo = $cod_cliente;";
				$resultado = mysqli_query($this->db, $sql);
				$sql = "INSERT INTO pedido (codigo_cliente, nombre, celular, direccion, referencia, propina, costo_envio, cantidad_productos, monto_total) VALUES ($cod_cliente, '$nombre', '$celular', '$direccion', '$referencia', $propina, $costo_envio, $cantidad_productos, $monto_total);";
			}else{
				$sql = "INSERT INTO pedido (nombre, celular, direccion, referencia, propina, costo_envio, cantidad_productos, monto_total) VALUES ('$nombre', '$celular', '$direccion', '$referencia', $propina, $costo_envio, $cantidad_productos, $monto_total);";
			}
			$resultado = mysqli_query($this->db, $sql);
			$id = mysqli_insert_id($this->db);
			if($resultado && $id > 0){
				$respuesta = array(
					'respuesta' => 'exito',
					'id_pedido' => $id
				);
			}else{
				$respuesta = array(
					'respuesta' => 'error',
					'id_pedido' => 0
				);
			}
			return $respuesta;
		}

		public function get_pedidos()
		{
			$arreglo = array();
			$sql = "SELECT C.dni, P.nombre, P.celular, P.direccion, P.propina, P.costo_envio, P.cantidad_productos, P.monto_total FROM pedido P INNER JOIN cliente C ON P.codigo_cliente = C.codigo";
			$resultado = mysqli_query($this->db, $sql);
			while($row = $resultado->fetch_assoc())
			{
				$arreglo[] = $row;
			}
			$sql = "SELECT nombre, celular, direccion, propina, costo_envio, cantidad_productos, monto_total FROM pedido WHERE codigo_cliente IS NULL";
			$resultado = mysqli_query($this->db, $sql);
			while($row = $resultado->fetch_assoc())
			{
				$arreglo[] = $row;
			}
			return $arreglo;
		}

		public function get_cantidad_pedidos()
		{
			$sql = "SELECT COUNT(codigo) AS cantidad_pedidos FROM pedido";
			$resultado = mysqli_query($this->db, $sql);
			$row = $resultado->fetch_assoc();
			return $row;
		}

		public function get_productos_totales()
		{
			$sql = "SELECT SUM(cantidad_productos) AS total_productos FROM pedido";
			$resultado = mysqli_query($this->db, $sql);
			$row = $resultado->fetch_assoc();
			return $row;
		}

		public function get_propinas_totales()
		{
			$sql = "SELECT SUM(propina) AS total_propina FROM pedido";
			$resultado = mysqli_query($this->db, $sql);
			$row = $resultado->fetch_assoc();
			return $row;
		}

		public function get_envio_totales()
		{
			$sql = "SELECT SUM(costo_envio) AS total_envio FROM pedido";
			$resultado = mysqli_query($this->db, $sql);
			$row = $resultado->fetch_assoc();
			return $row;
		}

		public function get_ventas_totales()
		{
			$sql = "SELECT SUM(monto_total) AS total FROM pedido";
			$resultado = mysqli_query($this->db, $sql);
			$row = $resultado->fetch_assoc();
			return $row;
		}
    }
?>