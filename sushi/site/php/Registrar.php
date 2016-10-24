<?php  
require 'Consultas.php';
	if(isset($_POST['Nombre']) && isset($_POST['Apellido1']) && isset($_POST['Apellido2']) && isset($_POST['Usuario']) && isset($_POST['Pass'])&& isset($_POST['Pass2'])&& isset($_POST['Estado'])&& isset($_POST['Correo'])){ // Registrar
			$nombre = $_POST['Nombre'];
			$apellido1 = $_POST['Apellido1'];
			$apellido2 = $_POST['Apellido2'];
			$usuario = $_POST['Usuario'];
			$pass = $_POST['Pass'];
			$pass2 = $_POST['Pass2'];
			$estado = $_POST['Estado'];
			$correo = $_POST['Correo'];
			if($pass==$pass2){
				$Consultas = new Consultas();
				$checknumero = $Consultas->Consulta($usuario);
				if($checknumero){
					echo '<script language="javascript">alert("El nombre de usuario ya existe");</script>';
					header( "refresh:1; url=/sushi/site/index-4.html" );
					}
				else{
					$Consultas->Registrar($usuario, $pass,$nombre, $apellido1, $apellido2,  $estado, $correo);
					
					echo '<script language="javascript">alert("El registro se ha hecho, ingresa con tu nombre y pass.");</script>';
					header( "refresh:1; url=/sushi/site/index-4.html" );
				}
			}
			else{
				echo '<script language="javascript">alert("Las contraseña no son las mismas");</script>';
				header( "refresh:1; url=/sushi/site/index-4.html" );
			}
	}
	else{
		echo '<script language="javascript">alert("Debes llenar todos los campos");</script>';
		header( "refresh:0.1; url=/sushi/site/index-4.html" );
	}
?>