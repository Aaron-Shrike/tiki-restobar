<?php 
    class TipoUsuario {
        private $db;
		
		public function __construct(){
			$this->db = Conexion::conectar();
		}

		public function get_tipos_usuario()
		{
			$arreglo = array();
			$sql = "SELECT * FROM tipo_usuario";
			$resultado = mysqli_query($this->db, $sql);
			while($row = $resultado->fetch_assoc())
			{
				$arreglo[] = $row;
			}
			return $arreglo;
		}
    }
?>