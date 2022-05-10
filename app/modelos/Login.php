<?php 
    class Login {
        private $db;
		
		public function __construct(){
			$this->db = Conexion::conectar();
		}

		public function iniciar_sesion($usuario, $contrasenia)
		{
			$sql = "SELECT codigo_cliente FROM usuario WHERE nombre = '$usuario'";
            $resultado = mysqli_query($this->db, $sql);
            $row = $resultado->fetch_assoc();
            if($row['codigo_cliente'] != null){
                $sql = "SELECT U.codigo, U.nombre, U.contrasenia, T.descripcion AS tipo_usuario, C.nombre AS nombre_cliente FROM usuario U INNER JOIN tipo_usuario T ON U.codigo_tipo = T.codigo INNER JOIN cliente C ON U.codigo_cliente = C.codigo WHERE U.nombre = '$usuario'";
            }else{
                $sql = "SELECT U.codigo, U.nombre, U.contrasenia, T.descripcion AS tipo_usuario FROM usuario U INNER JOIN tipo_usuario T ON U.codigo_tipo = T.codigo WHERE U.nombre = '$usuario'";
            }
            $resultado = mysqli_query($this->db, $sql);
            $row = $resultado->fetch_assoc();
            if($row['contrasenia'] == $contrasenia){
                session_start();
                $_SESSION['codigo'] = $row['codigo'];
                $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
                $_SESSION['nombre_cliente'] = $row['nombre_cliente'] || "none";
                $_SESSION['nombre'] = $row['nombre'];
                return true;
            }
            return false;
        }
    }
?>