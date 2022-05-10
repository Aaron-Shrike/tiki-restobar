<?php 
    class Contacto {
        private $db;
		
		public function __construct(){
			$this->db = Conexion::conectar();
		}

		public function get_contactos()
		{
			$arreglo = array();
			$sql = "SELECT * FROM contacto;";
			$resultado = mysqli_query($this->db, $sql);
			while($row = $resultado->fetch_assoc())
			{
				$arreglo[] = $row;
			}
			return $arreglo;
		}

		public function get_cantidad_contactos()
		{
			$sql = "SELECT COUNT(codigo) AS cantidad_contactos FROM contacto";
			$resultado = mysqli_query($this->db, $sql);
			$row = $resultado->fetch_assoc();
			return $row;
		}
    }
?>