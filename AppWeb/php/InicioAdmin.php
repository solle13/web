
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">	
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link REL=StyleSheet HREF="/AppWeb/css/estilos.css" TYPE="text/css">
	<title>Administrador-Mojarras "El Buki"</title>	
	<?php  

	require 'ConsultasProductos.php';
	require 'Consultas.php';
	require 'ConsultasVentas.php';
	$pescado1="MOJARRA TILAPIA";
	$pescado2="BAGRE CARAOTERO";
	$pescado3="HUACHINANGO";
	$pescado4="TRUCHA";
	$Consultas = new ConsultasProductos();
	$var1=$Consultas->Consulta($pescado1);
	$var2=$Consultas->Consulta($pescado2);
	$var3=$Consultas->Consulta($pescado3);
	$var4=$Consultas->Consulta($pescado4);
	$usuarios= new Consultas();
	$result = $usuarios->VerTodo();

	$usuarios2= new ConsultasVentas();
	$result2 = $usuarios2->VerTodo();

	$usuarios3= new ConsultasProductos();
	$result3 = $usuarios3->VerTodo();
	?>
</head>
<body>
	<header>	
			<div class="container">
				<h1><span><img src="/AppWeb/img/pez.png" height="75px" width="200px"></span><b>  MOJARRAS "EL BUKI"</h1>
			</div>	
	
		</header>

		<div class="container">
				<br>
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-tooggle="collapsed" data-target="#nav1">
								<span class="sr-only">Men&uacute;</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

							<a href="#" class="navbar-brand"><span class="
glyphicon glyphicon-home"></span> Mojarras El Buki</a>
						</div>

						<div class="collapse navbar-collapse" id="nav1">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="#"><span class="
glyphicon glyphicon-info-sign"></span> Sobre nosotros</a></li>
								<li><a href="#"><span class="
glyphicon glyphicon-list-alt"></span> Productos</a></li>
								<li class="active"><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Tienda en l&iacute;nea</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Contacto y sugerencias</a></li>
								<li><a href="/AppWeb/html/Tienda.html"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
							</ul>
						</div>
					</div>
				</nav>
			</div>


		<div class="container">
			<section class="main row">
				<div class="col-xs-12">
					<h2><b>Administrador</b></h2>
				</div>		
			</section>
		</div>
		<br>
		<br>
		<div class="container">
			<section class="row">
				<div class="col-xs-12, col-sm-6">
					<h2><b>Usuarios</b></h2>
					<table class="table table-striped">
						<th>Id</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Estado</th>
						<th>Correo</th>
						<?php
						while($fila = $result->fetch_assoc()){
							echo "<tr>";
							echo "<td> ".$fila['IdUsuario']."</td>";
							echo "<td> ".$fila['Nombre']."</td>";
							echo "<td> ".$fila['ApellidoP']." ".$fila['ApellidoM']."</td>";
							echo "<td> ".$fila['Estado']."</td>";
							echo "<td> ".$fila['Correo']."</td>";
							echo "</tr>";
						}
						?>
					</table>
				</div>
				<div class="col-xs-12, col-sm-6">
					<h2><b>Ventas</b></h2>
					<table class="table table-striped">
						<th>Id Venta</th>
						<th>Id Usuario</th>
						<th>Id Pescado</th>
						<th>Cantidad</th>
						<th>Total</th>
						<th>Fecha</th>
						<?php
						while($fila2 = $result2->fetch_assoc()){
							echo "<tr>";
							echo "<td> ".$fila2['Venta']."</td>";
							echo "<td> ".$fila2['Usuario']."</td>";
							echo "<td> ".$fila2['Pescado']."</td>";
							echo "<td> ".$fila2['Cantidad']."</td>";
							echo "<td> ".$fila2['Total']."</td>";
							echo "<td> ".$fila2['Fecha']."</td>";
							echo "</tr>";
						}
						?>
					</table>
				</div>	
				
			</section>
		</div>

		<div class="container">
			<section class="row">
				<div class="col-xs-12, col-sm-4">

					<h2><b>Abastecer</b></h2>
					<form action="/AppWeb/php/ProductosIn.php" method="post">
					<div class="form-group">
						<label>Id: 1 MOJARRA TILAPIA: <?php echo $var1['Cantidad'];?> kg</label>
						<input class="form-control" type="text" name="mojarra"  maxlength="10"></input>
						<label>Id: 2 BAGRE CARAOTERO: <?php echo $var2['Cantidad'];?> kg</label>
						<input class="form-control" type="text" name="bagre" maxlength="10"></input>
						<label>Id: 3 HUACHINANGO: <?php echo $var3['Cantidad'];?> kg</label>
						<input class="form-control" type="text" name="huachinango"  maxlength="10"></input>
						<label>Id: 4 TRUCHA: <?php echo $var4['Cantidad'];?> kg</label>
						<input class="form-control" type="text" name="trucha" maxlength="10"></input>
						
					</div>
					<input type="submit" value="Abastecer" class="btn btn-block btn-primary" />
					</form>
				</div>
				<div class="col-xs-12, col-sm-8">
					<h2><b>Almacen</b></h2>
					<table class="table table-striped">
						<th>Id Pescado</th>
						<th>Pescado</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<?php
						while($fila3 = $result3->fetch_assoc()){
							echo "<tr>";
							echo "<td> ".$fila3['IdPescado']."</td>";
							echo "<td> ".$fila3['NombrePescado']."</td>";
							echo "<td> ".$fila3['Precio']."</td>";
							echo "<td> ".$fila3['Cantidad']."</td>";
							echo "</tr>";
						}
						?>
					</table>
				</div>
			</section>
		</div>

		<footer>
			<div class="container">
					<div class="col-xs-12, col-sm-6">
						<label for="firma1"><h5> Esperamos su visita todos los s&aacute;bados y domingos de 9:00 a 16:00 horas, en el kil&oacute;metro 1.5 de la carretera Xaloxtoc-Ahuehueyo, atras del Parque Industrial de Cuautla, municipio de Ayala, en el estado de Morelos.</span></h5></label>
					</div>
					<div class="col-xs-12, col-sm-6">
						<label for="firma2"><h5><span class="glyphicon glyphicon-phone-alt"></span> Puede contactarnos a trav&eacute;s del correo electr&oacute;nico bukimojarrasventas@prodigy.net.mx, as&iacute; como los tel&eacute;fonos 044-777-742-5841 y 044-777-955-41-21.</h5></label>
					</div>
			</div>
		</footer>

		<script src="/js/jquery-1.12.1.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
</body>

</html>


