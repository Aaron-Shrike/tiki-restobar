<?php
	class Carta {
		private $db;
		
		public function __construct(){
			$this->db = Conexion::conectar();
		}

		public function registrar($codigo_tipo, $codigo_plan, $nombre, $descripcion, $precio, $descripcion_imagen, $url_imagen)
		{
			$sql = "INSERT INTO carta (codigo_tipo, codigo_plan, nombre, descripcion, precio, descripcion_imagen, url_imagen) VALUES ($codigo_tipo, $codigo_plan, '$nombre', '$descripcion', $precio, '$descripcion_imagen', '$url_imagen');";
			$resultado = mysqli_query($this->db, $sql);
			return $resultado;
		}

		public function actualizar($codigo, $codigo_tipo, $codigo_plan, $nombre, $descripcion, $precio, $descripcion_imagen, $url_imagen)
		{
			$sql = "UPDATE carta  SET codigo_tipo = $codigo_tipo, codigo_plan = $codigo_plan, nombre = '$nombre', descripcion = '$descripcion', precio = $precio, descripcion_imagen = '$descripcion_imagen', url_imagen = '$url_imagen' WHERE codigo = $codigo;";
			$resultado = mysqli_query($this->db, $sql);
			return $resultado;
		}

		public function eliminar($codigo)
		{
			$sql = "DELETE FROM carta WHERE codigo = $codigo;";
			$resultado = mysqli_query($this->db, $sql);
			return $resultado;
		}
		
		public function get_carta($id)
		{
			$sql = "SELECT * FROM carta WHERE codigo = $id;";
			$resultado = mysqli_query($this->db, $sql);
			if($row = $resultado->fetch_assoc())
			{
				$item = $row;
			}
			return $item;
		}

		public function get_cartas()
		{
			$arreglo = array();
			$sql = "SELECT C.codigo, C.nombre, C.precio, C.descripcion_imagen, C.url_imagen, T.descripcion AS nombre_tipo, P.nombre AS nombre_plan FROM carta C INNER JOIN tipo_producto T ON T.codigo = C.codigo_tipo INNER JOIN plan P ON P.codigo = C.codigo_plan ORDER BY C.codigo;";
			$resultado = mysqli_query($this->db, $sql);
			while($row = $resultado->fetch_assoc())
			{
				$arreglo[] = $row;
			}
			return $arreglo;
		}
		
		public function get_platillos_tarde()
		{
			$platillos = array();
			$sql = "SELECT * FROM carta WHERE codigo_tipo = 1 AND codigo_plan = 1 LIMIT 6;";
			$resultado = mysqli_query($this->db, $sql);
			while($row = $resultado->fetch_assoc())
			{
				$platillos[] = $row;
			}
			return $platillos;
		}

		public function get_platillos_noche()
		{
			$platillos = array();
			$sql = "SELECT * FROM carta C WHERE codigo_tipo = 1 AND codigo_plan = 2 ORDER BY C.codigo DESC LIMIT 6;";
			$resultado = mysqli_query($this->db, $sql);
			while($row = $resultado->fetch_assoc())
			{
				$platillos[] = $row;
			}
			return $platillos;
		}

		public function get_bebidas_tarde()
		{
			$bebidas = array();
			$sql = "SELECT * FROM carta WHERE codigo_tipo = 2 AND codigo_plan = 3 LIMIT 6;";
			$resultado = mysqli_query($this->db, $sql);
			while($row = $resultado->fetch_assoc())
			{
				$bebidas[] = $row;
			}
			return $bebidas;
		}

		public function get_bebidas_noche()
		{
			$bebidas = array();
			$sql = "SELECT * FROM carta C WHERE codigo_tipo = 2 AND codigo_plan = 4 ORDER BY C.codigo DESC LIMIT 6;";
			$resultado = mysqli_query($this->db, $sql);
			while($row = $resultado->fetch_assoc())
			{
				$bebidas[] = $row;
			}
			return $bebidas;
		}
	} 
?>