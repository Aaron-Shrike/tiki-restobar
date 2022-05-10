<?php
	class Conexion {
		public static function conectar(){
			$conexion = mysqli_connect("localhost", "root", "", "db_tiki");
			return $conexion;
		}
	}
?>