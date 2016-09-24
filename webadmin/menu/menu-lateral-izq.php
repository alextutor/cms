<?Php 
$Title = "";
$Description = "";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/header.php');
?>
<style type="text/css">
/* Menú vertical con subpestañas
----------------------------------------------- */
.titulo {
	text-align:center;	
}


#menuvertical {
	font-family : Verdana, Helvetica, sans-serif; 
	font-size : 12px; 
	width: 200px;
	margin: 0;
	text-align: left;
	padding: 6px 0px 20px 40px;
}

#menuvertical ul {
  margin: 0;
  padding: 0;
  list-style-type:	square;
  color:#FFFFFF;
}

#menuvertical li {
  display: inline: /* :KLUDGE: Removes large gaps in IE/Win */
}

#menuvertical a {
  display: block;
  padding:0;
  width: 180px;
  height: 20px;
  line-height: 20px;
  color: #FFAF02;
  text-decoration: none;
  text-indent:0;
}

#menuvertical a:hover, #menu2 .selected a {
  color: #ffffff;
  text-decoration:underline;
}

#menuvertical .first a {
  height: 20px;
  line-height: 20px;
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
<div class="titulo"><img src="imagen/tit-productos.gif" width="180" height="43" alt="productos"></div> 	 
 <div id="menuvertical"> 	
    <ul> <!--Inicio Ul Menu Principal-->
<?php
	$_SESSION['directorio'] ="/webadmin/galeria-productos/";
	

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
          <!--
			<a href="index.php?aside=total&idsec1=/webadmin/galeria-productos/galeria&CateId=<?php echo trim($rsCategoria['idcategoria']);?>&descrprodu=<?php echo $rsCategoria['titulo'] ?>" class="nivel1">              
             -->
      <?php 
			$_SESSION['descrprodu'] =$rsCategoria['titulo'];			
            //echo '<a href="articulo/'.$seccion.'/'.$id_articulo.'/'.$titulo.'" title="'.$row["titulo"].'"></a>';
			//echo '<a href="/total/' . trim($rsCategoria["idcategoria"]) . "/galeria" .'/" class="nivel1">';             			
			echo '<a href="' . "galeria" .'/'. urls_amigables(trim($rsCategoria["titulo"])) .'-'. trim($rsCategoria["idcategoria"]) .'">';     				
			//1parametro=idsec1 2parametro=aside  3parametro=idproducto  
			
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