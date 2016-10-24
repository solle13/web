<!DOCTYPE html>
<html lang="en">
     <head>
     <?php 
      require 'ConsultasProductos.php';
      $usuarios3= new ConsultasProductos();
      $result3 = $usuarios3->VerTodo();
      ?>
     <title>Blog</title>
     <meta charset="utf-8">
     <link rel="icon" href="/sushi/site/images/favicon.ico">
     <link rel="shortcut icon" href="/sushi/site/images/favicon.ico" />
     <link rel="stylesheet" href="/sushi/site/css/style.css">
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
          <li class="bt-icon "><a href="/sushi/site/index.html">Home</a></li>
         <li class="bt-icon"><a href="/sushi/site/index-1.html">Info</a></li>
         <li class="bt-icon"><a href="/sushi/site/index-2.html">Menu</a></li>
         <li class="bt-icon"><a href="/sushi/site/index-4.html">Tienda</a></li>
         <li class="bt-icon"><a href="/sushi/site/index-5.html">Contacto</a></li>
         <li class="current bt-icon"><a href="/sushi/site/php/index-3.php">Almacen</a></li>
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
      <h3 >Almacen</h3>
        <h2><b></b></h2>
          
          <div class="datagrid"><table>
<thead><tr><th>Id Pescado</th><th>Pescado</th><th>Precio</th><th>Cantidad</th></tr></thead>

<tbody>
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
</tbody>
</table></div>
       
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