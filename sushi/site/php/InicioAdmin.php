<!DOCTYPE html>
<html lang="en">
     <head>
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

  ?>
     <title>Admin</title>
     <meta charset="utf-8">
     <link rel="icon" href="/sushi/site/images/favicon.ico">
     <link rel="shortcut icon" href="/sushi/site/images/favicon.ico" />
     <link rel="stylesheet" href="/sushi/site/css/style.css">
     <link rel="stylesheet" href="/sushi/site/css/form.css">
     <script src="/sushi/site/js/jquery.js"></script>
     <script src="/sushi/site/js/jquery-migrate-1.1.1.js"></script>
     <script src="/sushi/site/js/jquery.equalheights.js"></script>
     <script src="/sushi/site/js/jquery.ui.totop.js"></script>
     <script src="/sushi/site/js/jquery.easing.1.3.js"></script>
     <script>
        $(document).ready(function(){

          $().UItoTop({ easingType: 'easeOutQuart' });
        }) 
     </script>
     <!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
         </a>

    <![endif]-->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <link rel="stylesheet" media="screen" href="css/ie.css">
    <![endif]-->
    <!--[if lt IE 10]>
      <script src="js/html5shiv.js"></script>
      <link rel="stylesheet" media="screen" href="css/ie1.css">
    <![endif]-->
    
     </head>
     <body  class="">

<!--==============================header=================================-->
 <header> 
  <div class="container_12">
   <div class="grid_12"> 
    <div class="socials">
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"> </a>
      <a href="#" class="last"></a>
    </div>
    <div id ="logo_nombre"><a href="/sushi/site/index.html">Mojarras el Buki</a></div>
    <div class="menu_block">


    <nav id="bt-menu" class="bt-menu">
        <a href="#" class="bt-menu-trigger"><span>Menu</span></a>
        <ul>
          <li class="bt-icon "><a href="/sushi/site/index.html">Salir</a></li>
         <li class="bt-icon"><a href="/sushi/site/index.html">Salir</a></li>
         <li class="bt-icon"><a href="/sushi/site/index.html">Salir</a></li>
         <li class="bt-icon"><a href="/sushi/site/index.html">Salir</a></li>
         <li class="bt-icon"><a href="/sushi/site/index.html">Salir</a></li>
         <li class="bt-icon"><a href="/sushi/site/index.html">Salir</a></li>
        </ul>
      </nav>
    
 <div class="clear"></div>
</div>
<div class="clear"></div>
          </div>
      </div>
</header>

<!--==============================Content=================================-->

<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - December 02, 2013!</div>
  <div class="container_12">
    <div class="grid_12">  
      <h3 >Usuarios</h3>
        <h2><b></b></h2>
          
        <div class="datagrid"><table>
<thead><tr><th>Id</th><th>Nombre</th><th>Apellidos</th><th>Estado</th><th>Correo</th></tr></thead>

<tbody>
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
</tbody>
</table></div>
       
    </div>  
    <div class="grid_12">  
      <h3 >Ventas</h3>
        <h2><b></b></h2>
          
        <div class="datagrid"><table>
<thead><tr><th>Id Venta</th><th>Id Usuario</th><th>Id Pescado</th><th>Cantidad</th><th>Total</th><th>Fecha</th></tr></thead>

<tbody>
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
</tbody>
</table></div>
       
    </div>  
    <div class="grid_12">  
      <h3 >Abastecer</h3>
        <h2><b></b></h2>
          <form id="form" action="/sushi/site/php/ProductosIn.php" method="post">
                              
        <!--<div class="success_wrapper">
        <div class="success-message">Hecho</div>
        </div>-->
        <label class="mojarra">
        <label>Id: 1 MOJARRA TILAPIA: <?php echo $var1['Cantidad'];?> kg</label>
        <input type="text" data-constraints="@Required @JustLetters" name="mojarra"/>
        <span class="empty-message">*Campo necesario.</span>
        <span class="error-message">*Nombre inválido.</span>
        </label>

        <label class="Apellido1">
        <label>Id: 2 BAGRE CARAOTERO: <?php echo $var2['Cantidad'];?> kg</label>
        <input type="text"  data-constraints="@Required @JustLetters" name="bagre"/>
        <span class="empty-message">*Campo necesario.</span>
        <span class="error-message">*nombre inválido.</span>
        </label>
            
        <label class="Apellido2">
        <label>Id: 3 HUACHINANGO: <?php echo $var3['Cantidad'];?> kg</label>
        <input type="text"  data-constraints="@Required @JustLetters" name="huachinango"/>
        <span class="empty-message">*Campo necesario.</span>
        <span class="error-message">*Nombre inválido.</span>
        </label>
        <br>

        <label class="Usuario">
        <label>Id: 4 TRUCHA: <?php echo $var4['Cantidad'];?> kg</label>
        <input type="text"  data-constraints="@Required @JustLetters" name="trucha"/>
        <span class="empty-message">*Campo necesario.</span>
        <span class="error-message">*Nombre inválido.</span>
        </label>
        
        
        <input type="submit" value="Abastecer" ></input> 

        
      </form>
 
       
    </div>  
    
  </div>
</div>

<!--==============================footer=================================-->

<footer>    
  <div class="container_12">
    <div class="grid_6 prefix_3">
      <a href="/sushi/site/index.html" class="f_logo"><div id ="logo_nombre">Mojarras el Buki</div></a>
      <div class="copy">
      &copy; 2013 | <a href="#">Privacy Policy</a> <br> Website   designed by <a href="http://www.templatemonster.com/" rel="nofollow">TemplateMonster.com</a>
      </div>
    </div>
  </div>
</footer>
       <script>
      $(document).ready(function(){ 
         $(".bt-menu-trigger").toggle( 
          function(){
            $('.bt-menu').addClass('bt-menu-open'); 
          }, 
          function(){
            $('.bt-menu').removeClass('bt-menu-open'); 
          } 
        ); 
      }) 
    </script>
</html>