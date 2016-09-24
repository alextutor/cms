<?Php 
$Title = "";
$Description = "";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/header.php');
?>
<style type="text/css">
/* Menú vertical con subpestañas
----------------------------------------------- */
#menuvertical {
text-align: left;
font-family : Verdana, Helvetica, sans-serif; 
font-size : 12px; 
width:100%;
}
#menuvertical .titulo {
	text-align:center;	
}

#menuvertical ul { list-style-type: none; padding:0;}
#menuvertical ul li.nivel1 {
width: 200px; /* Ancho de las pestañas */
}
#menuvertical ul li.primera {
border-top: solid 1px #FFF; /* Borde superior de la primera pestaña */
}
#menuvertical ul li {padding:0;}
#menuvertical ul li a {
	display: block;
	text-decoration: none;
	color: #fff; /* Color del texto */
	font-weight:bold;
	background-color: <?php echo $colo_fdo_menu_late_iz?>;  /* Color de fondo del menu */
	border: solid 1px #fff; /* Borde de las pestañas */
	border-top: none;
	padding: 8px;
	position: relative;
}
#menuvertical ul li:hover {
position: relative;
color: #000000; /* Color del texto al pasar el mouse */
}
#menuvertical ul li a:hover, #menuvertical ul li:hover a.nivel1 {
background-color: <?php echo $colo_fdohover_menu_late_iz?>; /* Color de fondo al pasar el mouse */
color: #000;
position: relative;
}
#menuvertical ul li a.nivel1 {
display: block!important;
display: none;
position: relative;
}
#menuvertical ul li ul {
display: none;
}
#menuvertical ul li a:hover ul, #menuvertical ul li:hover ul {
display: block;
position: absolute;
left: 200px;
top:-1px!important;
top:-31px;
}
#menuvertical ul li ul li a {
width: 160px;
background-color: #ee2f2c; /* Color de fondo subpestañas */
color: #fff; /* Color del texto subpestañas */
}
#menuvertical ul li ul li a:hover {
position: relative;
background-color: #c8c6c6; /* Color de fondo al pasar el mouse subpestañas */
color: #000; /* Color del texto al pasar el mouse subpestañas */
/*font-weight: bold;*/
}
.handcursor {cursor:hand;
cursor:pointer;
}
.handcursor1 {cursor:hand;
cursor:pointer;
}
</style>
</head>
<body>
 <div id="menuvertical">
 	<div class="titulo"><img src="imagen/tit-productos.gif" width="180" height="43" alt="productos"></div> 	 
    <ul> <!--Inicio Ul Menu Principal-->
<?php
 include($_SERVER['DOCUMENT_ROOT']. '/config.php');	         	

 mysql_query("SET NAMES 'utf8'");
 $consulta="select * from  categoria where estado=1 order by orden asc";
 $datos=mysql_query($consulta,$conexion);
 $nMenuPrincipal=1;
 while( ($rsCategoria=mysql_fetch_array($datos)) ) { 
    // Inicio contar cuantos registros hay con esa categoria
    $consuproducate="select * from  subcategoria where estado=1 and idcategoria=" . $rsCategoria['idcategoria'];
	$rsproducate=mysql_query($consuproducate,$conexion);
	$num_producate=mysql_num_rows($rsproducate);	
	// Fin contar cuantos registros hay con esa categoria
 ?>  	    
          <li class="nivel1"> <!--Inicio de Menu Principal -->          
			<a href="index.php?aside=total&idsec1=/webadmin/galeria-productos/galeria&CateId=<?php echo trim($rsCategoria['idcategoria']);?>&descrprodu=<?php echo $rsCategoria['titulo'] ?>" class="nivel1">              
			<?php 
			//alex quite contador 
			echo $rsCategoria['titulo'] . "&nbsp;&nbsp;". "(". $num_producate .")";
			//echo $rsCategoria['titulo'] 
			 ?>        
            </a>             
          </li>   <!-- Fin de Menu Principal -->
          
  <?php } // fin while Principal ?> 
          
      </ul> <!--Fin Ul Menu Principal-->
  </div>

</body>
</html>