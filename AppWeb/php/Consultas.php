<?php
	require_once 'Conexion.php';

	Class Consultas extends Conexion{

		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			parent::__destruct();
		}

		public function Registrar($usuario, $pass,$nombre, $apellido1, $apellido2,$estado, $correo){
			$query = "INSERT INTO usuarios (Usuario,Pass,Nombre, ApellidoP, ApellidoM,Estado, Correo)VALUES ('$usuario','$pass','$nombre','$apellido1', '$apellido2','$estado','$correo')";
			$this->Base->query($query);
		}

		//public function Eliminar($nombre){
		//	$query = "DELETE FROM usuarios WHERE Nombre = $nombre";
		//	$this->Base->query($query);
		//}

		//public function Modificar($usuario, $nombre, $apellido1, $apellido2, $estado, $correo){
			//$query = "UPDATE usuarios SET Usuario = '$usuario', Nombre = '$nombre', ApellidoP = '$apellido1', ApellidoM = '$apellido2', Estado = '$estado', Correo = '$correo' WHERE Usuario = '$usuario'";
			//$this->Base->query($query);
		//}
		public function Consulta($usuario){
			$query = "SELECT IdUsuario, Usuario, Nombre, ApellidoP, ApellidoM, Estado, Correo FROM usuarios WHERE Usuario = '$usuario'";
			$result = $this->Base->query($query); 
			$var = $result->fetch_assoc();
        	return $var;
		}
		public function ConsultaPass($usuario, $pass){
			$query = "SELECT IdUsuario, Usuario, Nombre, ApellidoP, ApellidoM, Estado, Correo FROM usuarios WHERE Usuario = '$usuario' And Pass = '$pass'";
			$result = $this->Base->query($query); 
			$var = $result->fetch_assoc();
        	return $var;
		}

		public function VerTodo(){
			$query = "SELECT IdUsuario, Nombre, ApellidoP, ApellidoM, Estado, Correo FROM usuarios";
			$result = $this->Base->query($query);
         	//$var = $result->fetch_assoc();
        return $result;
		}
	}
?>