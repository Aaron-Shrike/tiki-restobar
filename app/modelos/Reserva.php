<?php 
    class Reserva {
        private $db;
		
		public function __construct(){
			$this->db = Conexion::conectar();
		}

		public function registrar($cod_cliente, $num_comensales, $fecha, $hora)
		{
            $sql = "INSERT INTO reserva (codigo_cliente, numero_comensales, fecha, hora) VALUES ($cod_cliente, $num_comensales, '$fecha', '$hora');";
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

		public function get_reservas()
		{
			$arreglo = array();
			$sql = "SELECT c.nombre, c.dni, r.numero_comensales, r.fecha, r.hora FROM reserva r INNER JOIN cliente c ON r.codigo_cliente = c.codigo";
			$resultado = mysqli_query($this->db, $sql);
			while($row = $resultado->fetch_assoc())
			{
				$arreglo[] = $row;
			}
			return $arreglo;
		}

		public function get_cantidad_reservas()
		{
			$sql = "SELECT COUNT(codigo) AS cantidad_reservas FROM reserva";
			$resultado = mysqli_query($this->db, $sql);
			$row = $resultado->fetch_assoc();
			return $row;
		}
    }
?>