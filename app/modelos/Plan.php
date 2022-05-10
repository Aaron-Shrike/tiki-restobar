<?php 
    class Plan {
        private $db;
		
		public function __construct(){
			$this->db = Conexion::conectar();
		}

		public function registrar($nombre)
		{
			$sql = "INSERT INTO plan (nombre) VALUES ('$nombre');";
			$resultado = mysqli_query($this->db, $sql);
			return $resultado;
		}

		public function actualizar($codigo, $nombre)
		{
			$sql = "UPDATE plan  SET nombre = '$nombre' WHERE codigo = $codigo;";
			$resultado = mysqli_query($this->db, $sql);
			return $resultado;
		}

		public function eliminar($codigo)
		{
			$sql = "DELETE FROM plan WHERE codigo = $codigo;";
			$resultado = mysqli_query($this->db, $sql);
			return $resultado;
		}
		
		public function get_plan($id)
		{
			$sql = "SELECT * FROM plan WHERE codigo = $id;";
			$resultado = mysqli_query($this->db, $sql);
			if($row = $resultado->fetch_assoc())
			{
				$plan = $row;
			}
			return $plan;
		}

		public function get_planes()
		{
			$planes = array();
			$sql = "SELECT * FROM plan";
			$resultado = mysqli_query($this->db, $sql);
			while($row = $resultado->fetch_assoc())
			{
				$planes[] = $row;
			}
			return $planes;
		}
    }
?>