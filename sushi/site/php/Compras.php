<?php
require '../fpdf/fpdf.php';
require 'ConsultasProductos.php';
require 'ConsultasVentas.php';
require 'Consultas.php';
if(isset($_POST['mojarra']) && isset($_POST['bagre'])&&isset($_POST['huachinango']) && isset($_POST['trucha'])&& isset($_POST['tarjeta'])){
	$tam=strlen($_POST['tarjeta']);
	if($tam==16){
		$pescado1="MOJARRA TILAPIA";
		$pescado2="BAGRE CARAOTERO";
		$pescado3="HUACHINANGO";
		$pescado4="TRUCHA";
		$Consultas = new ConsultasProductos();
		$var1=$Consultas->Consulta($pescado1);
		$var2=$Consultas->Consulta($pescado2);
		$var3=$Consultas->Consulta($pescado3);
		$var4=$Consultas->Consulta($pescado4);
		$mojarra=$_POST['mojarra'];
		$bagre=$_POST['bagre'];
		$huach=$_POST['huachinango'];
		$trucha=$_POST['trucha'];
		$tarjeta=$_POST['tarjeta'];

		if($var1['Cantidad']>=$mojarra && $var2['Cantidad']>=$bagre && $var3['Cantidad']>=$huach && $var4['Cantidad']>=$trucha){

			$ConsultaUser= new Consultas();
			session_start();
			$usuario=$_SESSION['usuario'];
			$user=$ConsultaUser->Consulta($usuario);
			$ventas=new ConsultasVentas();
			$NuevoProductos= new ConsultasProductos();
			$fecha=date('Y-m-d');
			$NoVenta="".$fecha."-".$usuario;
			$totalMoj=$mojarra*45;
			$producto=1;
			$ventas->Registrar($NoVenta,$user['IdUsuario'],$producto,$mojarra,$totalMoj,$fecha);
			$NuevoProductos->Modificar2($mojarra,$pescado1);

			$totalBag=$bagre*50;
			$producto=2;
			$ventas->Registrar($NoVenta,$user['IdUsuario'],$producto,$bagre,$totalBag,$fecha);
			$NuevoProductos->Modificar2($bagre,$pescado2);

			$totalHua=$huach*125;
			$producto=3;
			$ventas->Registrar($NoVenta,$user['IdUsuario'],$producto,$huach,$totalHua,$fecha);
			$NuevoProductos->Modificar2($huach,$pescado3);

			$totalTru=$trucha*110;
			$producto=4;
			$ventas->Registrar($NoVenta,$user['IdUsuario'],$producto,$trucha,$totalTru,$fecha);
			$NuevoProductos->Modificar2($trucha,$pescado4);

			$Total=200+$totalMoj+$totalBag+$totalHua+$totalTru;
			

			$pdf = new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial', '', 18);
			$pdf->Image('../images/mojarras.jpg' , 70 ,17, 60 , 15,'JPG');
			$pdf->Cell(60, 10, '', 0);
			$pdf->Cell(70, 30, '', 0);
			$pdf->Ln(20);
			$pdf->SetFont('Arial', '', 8);
			$pdf->Cell(80, 10, '', 0);
			$pdf->Cell(60, 10, 'Fecha: '.$fecha.'', 0);
			$pdf->Ln(30);
			$pdf->SetFont('Arial', '', 12);
			$pdf->Cell(20, 8, '', 0);
			$pdf->Cell(70, 8, 'Tarjeta: '.$_POST['tarjeta'].'', 0);
			$pdf->Ln(6);
			$pdf->SetFont('Arial', '', 12);
			$pdf->Cell(20, 8, '', 0);
			$pdf->Cell(70, 8, 'No. Venta: '.$NoVenta.'', 0);
			$pdf->Ln(6);
			$pdf->SetFont('Arial', '', 12);
			$pdf->Cell(20, 8, '', 0);
			$pdf->Cell(70, 8, 'Nombre: '.$user['Nombre'].'', 0);
			$pdf->Ln(6);
			$pdf->SetFont('Arial', '', 12);
			$pdf->Cell(20, 8, '', 0);
			$pdf->Cell(70, 8, 'Apellidos: '.$user['ApellidoP'].' '.$user['ApellidoM'].'', 0);
			$pdf->Ln(6);
			$pdf->SetFont('Arial', '', 12);
			$pdf->Cell(20, 8, '', 0);
			$pdf->Cell(70, 8, 'Estado: '.$user['Estado'].'', 0);
			$pdf->Ln(6);
			$pdf->SetFont('Arial', '', 12);
			$pdf->Cell(20, 8, '', 0);
			$pdf->Cell(70, 8, 'Correo: '.$user['Correo'].'', 0);
			$pdf->Ln(20);
			$pdf->SetFont('Arial', 'B', 14);
			$pdf->Cell(80, 8, '', 0);
			$pdf->Cell(100, 8, 'PRODUCTOS', 0);
			$pdf->Ln(10);
			$pdf->SetFont('Arial', '', 12);
			$pdf->Cell(30, 10, '', 0);
			$pdf->Cell(50, 10, 'Producto', 1);
			$pdf->Cell(30, 10, 'Cantidad', 1);
			$pdf->Cell(30, 10, 'Precio', 1);
			$pdf->Cell(30, 10, 'Total', 1);
			$pdf->Ln(15);
			$pdf->SetFont('Arial', '', 8);
			$pdf->Cell(30, 10, '', 0);
			$pdf->Cell(50, 10, 'MOJARRA TILAPIA', 1);
			$pdf->Cell(30, 10, ''.$mojarra.'', 1);
			$pdf->Cell(30, 10, '$45.00', 1);
			$pdf->Cell(30, 10, '$'.$totalMoj.'', 1);
			$pdf->Ln(10);
			$pdf->SetFont('Arial', '', 8);
			$pdf->Cell(30, 10, '', 0);
			$pdf->Cell(50, 10, 'BAGRE CARAOTERO', 1);
			$pdf->Cell(30, 10, ''.$bagre.'', 1);
			$pdf->Cell(30, 10, '$50.00', 1);
			$pdf->Cell(30, 10, '$'.$totalBag.'', 1);
			$pdf->Ln(10);
			$pdf->SetFont('Arial', '', 8);
			$pdf->Cell(30, 10, '', 0);
			$pdf->Cell(50, 10, 'HUACHINANGO', 1);
			$pdf->Cell(30, 10, ''.$huach.'', 1);
			$pdf->Cell(30, 10, '$125.00', 1);
			$pdf->Cell(30, 10, '$'.$totalHua.'', 1);
			$pdf->Ln(10);
			$pdf->SetFont('Arial', '', 8);
			$pdf->Cell(30, 10, '', 0);
			$pdf->Cell(50, 10, 'TRUCHA', 1);
			$pdf->Cell(30, 10, ''.$trucha.'', 1);
			$pdf->Cell(30, 10, '$100.00', 1);
			$pdf->Cell(30, 10, '$'.$totalTru.'', 1);
			$pdf->Ln(10);

			$pdf->SetFont('Arial', '', 8);
			$pdf->Cell(30, 10, '', 0);
			$pdf->Cell(50, 10, 'Gastos de envio', 1);
			$pdf->Cell(30, 10, '1', 1);
			$pdf->Cell(30, 10, '$200', 1);
			$pdf->Cell(30, 10, '$200', 1);
			$pdf->Ln(10);
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell(30, 10, '', 0);
			$pdf->Cell(50, 10, '', 0);
			$pdf->Cell(30, 10, '', 0);
			$pdf->Cell(30, 10, '', 0);
			$pdf->Cell(30, 10, 'Total: $'.$Total.'', 1);
			$pdf->Ln(70);

			$pdf->SetFont('Arial', '', 7);
			$pdf->Cell(50, 10, 'Sábados y domingos de 9:00 a 16:00 horas, en el km 1.5 de la carretera Xaloxtoc-Ahuehueyo, atras del Parque Industrial de Cuautla, municipio de Ayala, Estado de Morelos.', 0);
			$pdf->Ln(8);
			$pdf->SetFont('Arial', '', 7);
			$pdf->Cell(50, 10, 'Puede contactarnos a través del correo electrónico bukimojarrasventas@prodigy.net.mx, así como los teléfonos 044-777-742-5841 y 044-777-955-41-21.', 0);
			$pdf->Ln(8);

			$pdf->Output();
			header( "refresh:1; url=/sushi/site/php/inicioUsuario.php" );
		}
		else{
			echo '<script language="javascript">alert("Lo sentimos, no tenemos suficientes productos");</script>';
			header( "refresh:1; url=/sushi/site/php/inicioUsuario.php" );
		}

		
	}
	else{
		echo '<script language="javascript">alert("El numero de tarjeta debe tener 16 digitos");</script>';
		header( "refresh:1; url=/sushi/site/php/inicioUsuario.php" );
	}

}else{
	echo '<script language="javascript">alert("Debes llenar todos los campos");</script>';
	header( "refresh:1; url=/sushi/site/php/inicioUsuario.php" );
}
?>