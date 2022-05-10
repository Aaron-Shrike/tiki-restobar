<?php 
    class Mensaje {
        private $db;
		
		public function __construct(){
			$this->db = Conexion::conectar();
		}

		public function get_mensajes()
		{
			$arreglo = array();
			$sql = "SELECT C.nombre, M.asunto, M.mensaje FROM mensaje M INNER JOIN contacto C ON M.codigo_contacto = C.codigo;";
			$resultado = mysqli_query($this->db, $sql);
			while($row = $resultado->fetch_assoc())
			{
				$arreglo[] = $row;
			}
			return $arreglo;
		}

		public function get_cantidad_mensajes()
		{
			$sql = "SELECT COUNT(codigo) AS cantidad_mensajes FROM mensaje";
			$resultado = mysqli_query($this->db, $sql);
			$row = $resultado->fetch_assoc();
			return $row;
		}
    }
?>