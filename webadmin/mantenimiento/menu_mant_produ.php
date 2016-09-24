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
background-color: #ee2f2c; /* Color de fondo */
border: solid 1px #fff; /* Borde de las pestañas */
border-top: none;
padding: 8px;
position: relative;
}
#menuvertical ul li:hover {
position: relative;
color: #fff; /* Color del texto al pasar el mouse */
}
#menuvertical ul li a:hover, #menuvertical ul li:hover a.nivel1 {
background-color:#629218; /* Color de fondo al pasar el mouse */
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
background-color: #629218; /* Color de fondo al pasar el mouse subpestañas */
color: #fff; /* Color del texto al pasar el mouse subpestañas */
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
        <ul> <!--Inicio Ul Menu Principal-->
<?php
 include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
 mysql_query("SET NAMES 'utf8'");
 
 $consulta="select * from  categoria where borrado=0 order by orden asc";
 $datos=mysql_query($consulta,$conexion);
 $nMenuPrincipal=1;
 while( ($rsCategoria=mysql_fetch_array($datos)) ) { 
    // Inicio contar cuantos registros hay con esa categoria
    $consuproducate="select * from  productos where borrado=0 and idcategoria=" . $rsCategoria['idcategoria'];
	$rsproducate=mysql_query($consuproducate,$conexion);
	$num_producate=mysql_num_rows($rsproducate);	
	// Fin contar cuantos registros hay con esa categoria
 ?>  	    
          <li class="nivel1"> <!--Inicio de Menu Principal -->          
			<a href="<?php $ROOT_PATH?>/webadmin/mantenimiento/contenedor_man_produ_admi.php?idcategoria=<?php echo $rsCategoria['idcategoria'];?>" class="nivel1">
			<?php echo $rsCategoria['descripcion'] . "&nbsp;&nbsp;". "(". $num_producate .")" ?>        
            </a>
        
        <!----------------------------- Inicio Submenu  -------------->
         <ul>  <!--Inicio Ul Submenu -->        
		<?php
         	$subconsulta="select * from  subcategoria where borrado=0 and  idcategoria='" . $rsCategoria['idcategoria'] ."'  order by orden";
		    $subdatos=mysql_query($subconsulta,$conexion);										
			while( ($rsSubCategoria=mysql_fetch_array($subdatos)) ) {			
			// Inicio contar cuantos registros hay con esa subcategoria
				$consuprodusubcate="SELECT * from  productos where borrado=0 and idcategoria=".$rsSubCategoria['idcategoria'] ." and  idsudcategoria=" . $rsSubCategoria['idsubcategoria'] ;
				$rsprodusubcate=mysql_query($consuprodusubcate,$conexion);
				$num_produsubcate = mysql_num_rows($rsprodusubcate); // Total de registros							
		    // Fin contar cuantos registros hay con esa subcategoria			   
        ?>      
            <li>
            <a href="<?php $ROOT_PATH?>/webadmin/mantenimiento/contenedor_man_produ_admi.php?idcategoria=<?php echo $rsSubCategoria['idcategoria'];?>&idsudcategoria=<?php echo $rsSubCategoria['idsubcategoria'] ?>&descrprodu=<?php echo $rsSubCategoria['descripSubcategoria'] ?>"><?php echo $rsSubCategoria['descripSubcategoria'] . "&nbsp;&nbsp;".  "(". $num_produsubcate .")" ?>
            </a>
            </li>         
           <?php } // fin while Submenu ?>
        </ul> <!--Fin Ul Submenu -->
         <!----------------------------- Fin Submenu  -------------->
              
          </li>   <!-- Fin de Menu Principal -->
          
  <?php } // fin while Principal ?> 
          
      </ul> <!--Fin Ul Menu Principal-->
  </div>

</body>
</html>