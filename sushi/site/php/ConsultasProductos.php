<?php
	require_once 'Conexion.php';

	Class ConsultasProductos extends Conexion{

		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			parent::__destruct();
		}

		//public function Registrar($usuario, $pass,$nombre, $apellido1, $apellido2,$estado, $correo){
		//	$query = "INSERT INTO usuarios (Usuario,Pass,Nombre, ApellidoP, ApellidoM,Estado, Correo)VALUES ('$usuario','$pass','$nombre','$apellido1', '$apellido2','$estado','$correo')";
		//	$this->Base->query($query);
		//}

		//public function Eliminar($nombre){
		//	$query = "DELETE FROM usuarios WHERE Nombre = $nombre";
		//	$this->Base->query($query);
		//}

		public function Modificar2($cantidad, $pescado){
			$query = "SELECT Cantidad FROM productos WHERE NombrePescado = '$pescado'";
			$result = $this->Base->query($query); 
			$var =$result->fetch_assoc();
			$Total=$var['Cantidad']-$cantidad;
			$query = "UPDATE productos SET Cantidad = '$Total' WHERE NombrePescado = '$pescado'";
			$this->Base->query($query);
		}

		public function Modificar($cantidad, $pescado){
			$query = "SELECT Cantidad FROM productos WHERE NombrePescado = '$pescado'";
			$result = $this->Base->query($query); 
			$var =$result->fetch_assoc();
			$Total=$var['Cantidad']+$cantidad;
			$query = "UPDATE productos SET Cantidad = '$Total' WHERE NombrePescado = '$pescado'";
			$this->Base->query($query);
		}

		public function Consulta($pescado){
			$query = "SELECT Cantidad FROM productos WHERE NombrePescado = '$pescado'";
			$result = $this->Base->query($query); 
			$var =$result->fetch_assoc();
        	return $var;
		}

		public function VerTodo(){
			$query = 'SELECT * FROM productos';
			$result = $this->Base->query($query);
         
        return $result;
		}
	}
?>