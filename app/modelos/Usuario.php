<?php 
    class Usuario {
        private $db;
		
		public function __construct(){
			$this->db = Conexion::conectar();
		}

		public function registrar($codigo_tipo, $nombre, $contrasenia)
		{
			$sql = "INSERT INTO usuario (codigo_tipo, nombre, contrasenia) VALUES ($codigo_tipo, '$nombre', '$contrasenia');";
			$resultado = mysqli_query($this->db, $sql);
			return $resultado;
		}

		public function actualizar($codigo, $codigo_tipo, $nombre, $contrasenia)
		{
			$sql = "UPDATE usuario  SET codigo_tipo = $codigo_tipo, nombre = '$nombre', contrasenia = '$contrasenia' WHERE codigo = $codigo;";
			$resultado = mysqli_query($this->db, $sql);
			return $resultado;
		}

		public function eliminar($codigo)
		{
			$sql = "DELETE FROM usuario WHERE codigo = $codigo;";
			$resultado = mysqli_query($this->db, $sql);
			return $resultado;
		}

		public function get_usuario($id)
		{
			$sql = "SELECT * FROM usuario WHERE codigo = $id;";
			$resultado = mysqli_query($this->db, $sql);
			if($row = $resultado->fetch_assoc())
			{
				$item = $row;
			}
			return $item;
		}

		public function get_usuarios()
		{
			$arreglo = array();
			$sql = "SELECT U.codigo, U.nombre, T.descripcion FROM usuario U INNER JOIN tipo_usuario T ON U.codigo_tipo = T.codigo";
			$resultado = mysqli_query($this->db, $sql);
			while($row = $resultado->fetch_assoc())
			{
				$arreglo[] = $row;
			}
			return $arreglo;
		}

		public function get_cantidad_usuarios()
		{
			$sql = "SELECT COUNT(codigo) AS cantidad_usuarios FROM usuario";
			$resultado = mysqli_query($this->db, $sql);
			$row = $resultado->fetch_assoc();
			return $row;
		}
    }
?>