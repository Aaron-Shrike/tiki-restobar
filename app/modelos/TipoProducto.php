<?php 
    class TipoProducto {
        private $db;
		
		public function __construct(){
			$this->db = Conexion::conectar();
		}

		public function registrar($descripcion)
		{
			$sql = "INSERT INTO tipo_producto (descripcion) VALUES ('$descripcion');";
			$resultado = mysqli_query($this->db, $sql);
			return $resultado;
		}

		public function actualizar($codigo, $descripcion)
		{
			$sql = "UPDATE tipo_producto  SET descripcion = '$descripcion' WHERE codigo = $codigo;";
			$resultado = mysqli_query($this->db, $sql);
			return $resultado;
		}

		public function eliminar($codigo)
		{
			$sql = "DELETE FROM tipo_producto WHERE codigo = $codigo;";
			$resultado = mysqli_query($this->db, $sql);
			return $resultado;
		}
		
		public function get_tipo_producto($id)
		{
			$sql = "SELECT * FROM tipo_producto WHERE codigo = $id;";
			$resultado = mysqli_query($this->db, $sql);
			if($row = $resultado->fetch_assoc())
			{
				$plan = $row;
			}
			return $plan;
		}

		public function get_tipos_producto()
		{
			$array = array();
			$sql = "SELECT * FROM tipo_producto";
			$resultado = mysqli_query($this->db, $sql);
			while($row = $resultado->fetch_assoc())
			{
				$array[] = $row;
			}
			return $array;
		}
    }
?>