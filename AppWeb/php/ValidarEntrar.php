<?php  
require 'Consultas.php';
	if(isset($_POST['Usuario']) && isset($_POST['Pass'])){ // Registrar
			$usuario = $_POST['Usuario'];
			$pass = $_POST['Pass'];
			if($usuario=="Admin" && $pass==12345){
				echo '<script language="javascript">alert("Bienvenido");</script>';
					header( "refresh:1; url=/AppWeb/php/InicioAdmin.php" );
			}else{
				$Consultas = new Consultas();
				$checknumero = $Consultas->ConsultaPass($usuario,$pass);
				if($checknumero){
					session_start();
					$_SESSION['usuario']=$usuario;
					echo '<script language="javascript">alert("Bienvenido");</script>';
					header( "refresh:1; url=/AppWeb/php/InicioUsuario.php" );
					}
				else{
					echo '<script language="javascript">alert("Usuario o contraseña incorrecta");</script>';
					header( "refresh:1; url=/AppWeb/html/Tienda.html" );
					}
			}
		}
	else{
		echo '<script language="javascript">alert("Debes llenar todos los campos");</script>';
		header( "refresh:1; url=/AppWeb/html/Tienda.html" );
			}
	
?>