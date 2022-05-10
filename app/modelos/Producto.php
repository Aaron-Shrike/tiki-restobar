<?php 
    class Producto {
        private $db;
		
		public function __construct(){
			$this->db = Conexion::conectar();
		}

		public function registrar($codigo_tipo, $nombre, $descripcion, $precio)
		{
			$sql = "INSERT INTO producto (codigo_tipo, nombre, descripcion, precio) VALUES ($codigo_tipo, '$nombre', '$descripcion', $precio);";
			$resultado = mysqli_query($this->db, $sql);
			return $resultado;
		}

		public function actualizar($codigo, $codigo_tipo, $nombre, $descripcion, $precio)
		{
			$sql = "UPDATE producto  SET codigo_tipo = $codigo_tipo, nombre = '$nombre', descripcion = '$descripcion', precio = $precio WHERE codigo = $codigo;";
			$resultado = mysqli_query($this->db, $sql);
			return $resultado;
		}

		public function eliminar($codigo)
		{
			$sql = "DELETE FROM producto WHERE codigo = $codigo;";
			$resultado = mysqli_query($this->db, $sql);
			return $resultado;
		}
		
		public function get_producto($id)
		{
			$sql = "SELECT * FROM producto WHERE codigo = $id;";
			$resultado = mysqli_query($this->db, $sql);
			if($row = $resultado->fetch_assoc())
			{
				$item = $row;
			}
			return $item;
		}

		public function get_productos()
		{
			$arreglo = array();
			$sql = "SELECT P.codigo, P.nombre, P.descripcion, P.precio, T.descripcion AS nombre_tipo FROM producto P INNER JOIN tipo_producto T ON T.codigo = P.codigo_tipo ORDER BY P.codigo;";
			$resultado = mysqli_query($this->db, $sql);
			while($row = $resultado->fetch_assoc())
			{
				$arreglo[] = $row;
			}
			return $arreglo;
		}
    }
?>