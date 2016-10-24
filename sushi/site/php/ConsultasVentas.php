<?php
	require_once 'Conexion.php';

	Class ConsultasVentas extends Conexion{

		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			parent::__destruct();
		}

		public function Registrar($venta, $usuario, $pescado, $cantidad, $total, $fecha){
			$query = "INSERT INTO ventas (Venta,Usuario,Pescado, Cantidad,Total,Fecha)VALUES ('$venta','$usuario','$pescado','$cantidad', '$total','$fecha')";
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
			$query = "SELECT Venta,Usuario,Pescado, Cantidad,Total,Fecha FROM ventas WHERE Usuario = '$usuario'";
			$result = $this->Base->query($query); 
			//$var = $result->fetch_assoc();
        	return $result;
		}
		
		public function VerTodo(){
			$query = "SELECT Venta,Usuario,Pescado, Cantidad,Total,Fecha FROM ventas";
			$result = $this->Base->query($query);
         	//$var = $result->fetch_assoc();
        return $result;
		}
	}
?>