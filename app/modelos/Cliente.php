<?php
	class Cliente {
		private $db;
		
		public function __construct(){
			$this->db = Conexion::conectar();
		}

		public function registrar($dni, $nombre, $celular)
		{
			$sql = "INSERT INTO cliente (dni, nombre, celular, puntos) VALUES ('$dni', '$nombre', '$celular', 0);";
			$resultado = mysqli_query($this->db, $sql);
			$id = mysqli_insert_id($this->db);
			if($resultado  && $id > 0){
				$item = array(
					'respuesta' => 'exito',
					'id_cliente' => $id
				);
			}else{
				$item = array(
					'respuesta' => 'error'
				);
			}
			return $item;
		}

		public function get_clientes()
		{
			$arreglo = array();
			$sql = "SELECT * FROM cliente;";
			$resultado = mysqli_query($this->db, $sql);
			while($row = $resultado->fetch_assoc())
			{
				$arreglo[] = $row;
			}
			return $arreglo;
		}

        public function buscar_cliente($dni)
		{
			$sql = "SELECT * FROM cliente WHERE dni = $dni;";
			$resultado = mysqli_query($this->db, $sql);
			if($row = $resultado->fetch_assoc())
			{
				$item = $row;
				$item['respuesta'] = "encontrado";
			}else{
				$item = array(
					'respuesta' => 'error'
				);
			}
			return $item;
		}

		public function get_cantidad_clientes()
		{
			$sql = "SELECT COUNT(codigo) AS cantidad_clientes FROM cliente";
			$resultado = mysqli_query($this->db, $sql);
			$row = $resultado->fetch_assoc();
			return $row;
		}
	} 
?>