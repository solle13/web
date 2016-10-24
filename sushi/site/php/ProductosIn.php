<?php  
require 'ConsultasProductos.php';
	if(isset($_POST['mojarra']) && isset($_POST['bagre']) && isset($_POST['huachinango']) && isset($_POST['trucha'])){ // Registrar
			$mojarra = $_POST['mojarra'];
			$bagre = $_POST['bagre'];
			$huach = $_POST['huachinango'];
			$trucha = $_POST['trucha'];
			$pescado1="MOJARRA TILAPIA";
			$pescado2="BAGRE CARAOTERO";
			$pescado3="HUACHINANGO";
			$pescado4="TRUCHA";
			$Consultas = new ConsultasProductos();
			$Consultas->Modificar($mojarra,$pescado1);
			$Consultas->Modificar($bagre,$pescado2);
			$Consultas->Modificar($huach,$pescado3);
			$Consultas->Modificar($trucha,$pescado4);
			echo '<script language="javascript">alert("La operacion ha sido un exito");</script>';
			header( "refresh:1; url=/sushi/site/php/InicioAdmin.php" );
			
	}
	else{
		echo '<script language="javascript">alert("Debes llenar todos los campos");</script>';
		header( "refresh:0.1; url=/sushi/site/php/InicioAdmin.php" );
	}
?>