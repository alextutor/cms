<!--
http://www.comocreartuweb.com/consultas/showthread.php/29186-Necesito-un-Script-de-imagen-cambiante-saludos
http://www.3dcsstext.com/  
-->
<?Php 
$Title = "repuestos originales y alternativos de motores Cummins, Caterpillar, Detroit Diesel";
$Description = "repuestos para varias marcas de vehículos,repuestos originales y alternativos de motores Cummins, Caterpillar, Detroit Diesel ";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
?> 
<?Php 
	//include_once "config.php";
?> 
<style type="text/css">
 .cont_produ_cambiantes{
	/*border: 2px solid #ee2f2c;	
	-moz-border-radius: 11px;
	-webkit-border-radius: 11px;
	border-radius: 11px;*/
	margin:0 auto;
	position: relative;
	z-index:1200;	
	behavior: url(ie-css3.htc);
	/*behavior: url(PIE.htc);	*/
 }  
 .text_decora_line_through{
 text-decoration: line-through;
  }  
  
  /*Apply this class to some text to unlock the secrets of the third dimension!*/
.Three-Dee{
font-family: Garamond, serif;
line-height: 1em;
color: #ffffff;
font-weight:bold;
font-size: 30px;
}
.rectangulo{
    border: 2px solid #3e74e1;	
	-moz-border-radius: 11px;
	-webkit-border-radius: 11px;
	border-radius: 11px;
	background:#3e74e1;
	text-align:center;
	width:200px;
	margin:0 auto;
}
A:hover { text-decoration:none; color:#ffffff; } --> 

</style>
<?php
  	date_default_timezone_set("America/Lima");
	$fecha_actual = date("d/m/Y"); 
	
	
	$cofertahosting="select nomproducto,precio_venta_dolares_1_anos,precio_oferta_venta_dolares_1_anos,DATE_FORMAT(fecha_fin_promo, '%d/%m/%Y') AS fecha_fin_promo,id_producto  from productos where oferta='si' and mostrar='si' and borrado='0'  and fecha_fin_promo >= now() ORDER BY RAND() LIMIT 3" ;
	
	
	$codpage="12172806";
	$codsecc="121728060006000000000000";
		$sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido and s.ccodpage=".$codpage." and s.ccodseccion = ".$codsecc." AND c.cestcontenido='1' and c.ccodcategoria='1' order by c.ccodcontenido desc ";
	$datoss = db_query($sql_query);
	$numero_rows = db_num_rows($query);
    
if ($numero_rows == 0) {
	?>
     <div class="rectangulo color-white">NO hay ofertas de Dominios</div>
<?php     
}else {
    
   $contador=1;	  
   while( ($fila=mysql_fetch_array($datoss)) ) {
	  switch ($contador)
			{
			case "1":
			   //$foto1=$fila['rutaimagen'];
			   //$foto1="timthumb.php?src=" .$fila['rutaimagen'] . "&h=200&w=140&zc=0" ;				 
			   $nombproductos1=$fila['nomproducto'];
			   $preciosoles1=number_format($fila['precio_venta_dolares_1_anos']*$rowpreciomoneda['precio'],2);
   			   $preciosolesoferta1=number_format($fila['precio_oferta_venta_dolares_1_anos']*$rowpreciomoneda['precio'],2);			   
			   $idproductos1=$fila['id_producto'];	
			   $fecha_fin_promo1=$fila['fecha_fin_promo'];		   
			break;			
			case "2":
			   //$foto1=$fila['rutaimagen'];
			   //$foto1="timthumb.php?src=" .$fila['rutaimagen'] . "&h=200&w=140&zc=0" ;				 
			   $nombproductos2=$fila['nomproducto'];
			   $preciosoles2=number_format($fila['precio_venta_dolares_1_anos']*$rowpreciomoneda['precio'],2);
   			   $preciosolesoferta2=number_format($fila['precio_oferta_venta_dolares_1_anos']*$rowpreciomoneda['precio'],2);			   
			   $idproductos2=$fila['id_producto'];			   
   			   $fecha_fin_promo2=$fila['fecha_fin_promo'];		   
			break;					
	  }//Fin switch 		   
	  $contador++; 
   }//Fin While 
?>
<body>
<div class="cont_produ_cambiantes">
    <div class="rectangulo">
    	<a href='http://www.sisdatahost.com/hosting-economico.php?pagina=whois/registro-dominios/promo-dominios&aside=hosting-total'>
	    <div class="Three-Dee" id="nomproducto"> </div>
        </a>
    </div>
    <div class="tex_centrar color-red size_14 bold tex_Merienda_One margin_bottom_10 margin_top_10 text_decora_line_through">
    	<div id="preciosoles"></div>
    </div>
  <div class="tex_centrar color-red size_14 bold tex_Merienda_One margin_bottom_10 margin_top_10">
    	<div id="preciosolesoferta"></div>
    </div>
    <div class="tex_centrar size_11 tex_Merienda_One">
    	<div id="fecha_fin_promo"></div>
    </div>
    <div class="tex_centrar size_13 tex_Merienda_One">
   	<a href="/hosting-economico.php?pagina=whois/registro-dominios/promo-dominios&aside=hosting-total">Ver todas las ofertas </a></div>
      
</div><!--fin  cont_produ_cambiante-->

<!--NOTA IMPORTANTE este oferta cambiante no necesita ningun plugin ni jquery ni nada es puro javascript -->
<script type="text/javascript" charset="utf-8">

	nombproductos1= "<?=$nombproductos1?>";
	preciosoles1= "<?=$preciosoles1?>";
	preciosolesoferta1= "<?=$preciosolesoferta1?>";
	fecha_fin_promo1= "<?=$fecha_fin_promo1?>";
	
	nombproductos2= "<?=$nombproductos2?>";
	preciosoles2= "<?=$preciosoles2?>";
	preciosolesoferta2= "<?=$preciosolesoferta2?>";	
	fecha_fin_promo2= "<?=$fecha_fin_promo2?>";
		
	var cont = 0; 
	var arr = [ 
	[nombproductos1,preciosoles1,preciosolesoferta1,fecha_fin_promo1],
	[nombproductos2,preciosoles2,preciosolesoferta2,fecha_fin_promo2]
	] 
	function cambia() { 
		
		var nomproducto = document.getElementById("nomproducto"); 
		cont = cont % arr.length; 
		nomproducto.innerHTML  ="<font style='text-align:'center';color='#ffffff''>" + arr[cont][0] + "</font>"; 
		
		
		var preciosoles = document.getElementById("preciosoles"); 
		cont = cont % arr.length; 
		preciosoles.innerHTML  = "<font style='text-align:'center';><span class='color-verde_mar bold'>Antes </span>S/."+ arr[cont][1] + "<span class='color-black'> Soles</span></font>"; 
		
		var preciosolesoferta = document.getElementById("preciosolesoferta"); 
		cont = cont % arr.length; 
		preciosolesoferta.innerHTML  = "<font style='text-align:'center';><span class='color-verde_mar bold'>Oferta  </span>S/."+ arr[cont][2] + " <span class='color-black'> Soles </span></font>";
		
		var fecha_fin_promo = document.getElementById("fecha_fin_promo"); 
		cont = cont % arr.length; 
		fecha_fin_promo.innerHTML  = "Hasta el "+ arr[cont][3] ;
		
		cont++; 
	} 
	function inicio() { 
		cambia(); 
		setInterval(cambia, 3000); 
		} 
		window.onload=inicio; 
</script> 

<?php  }  //fin si	?>

<!-- FIN BODY-->
 <?php  include_once ($INC_DIR . '/footer.php');  ?> 
