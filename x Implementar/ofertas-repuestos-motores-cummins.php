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
 }  
 .text_decora_line_through{
 text-decoration: line-through;
  }    

.rectangulo{
	-moz-border-radius: 11px;
	-webkit-border-radius: 11px;
	border-radius: 11px;
	text-align:center;
	width:200px;
	margin:0 auto;
}
.nomproducto{
	font-family: Garamond, serif;
	line-height: 1em;
	color: #000 ;
	font-weight:bold;
	font-size: 14px;
	
}	
.verofertas{
	font-size:14px;
	color:#2a9c7b;
	font-weight:bold;
	margin-top:5px;
}
A:hover { text-decoration:none; color:#ff0000; } --> 

</style>
<?php
  	//date_default_timezone_set("America/Lima");
	//$fecha_actual = date("d/m/Y"); 	
		$sql_oferta = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido and s.ccodpage=12172806 and s.ccodseccion =121728060006000000000000 AND c.cestcontenido='1' and c.ccodcategoria='1' and cimgcontenido<>''  ORDER BY RAND() LIMIT 3 ";
	$rsoferta = mysql_query($sql_oferta);
	$totaloferta = db_num_rows($rsoferta);
if ($totaloferta == 0) {
	?>
     <div class="rectangulo color-white">NO hay ofertas de Dominios</div>
<?php     
}else {
    
   $contador=1;	  
   while( ($fila=mysql_fetch_array($rsoferta)) ) {
	  switch ($contador)
			{
			case "1":
			   //$foto1=$fila['rutaimagen'];
			   //$foto1="timthumb.php?src=" .$fila['rutaimagen'] . "&h=200&w=140&zc=0" ;				 
			   $nombproductos1=$fila['cnomcontenido'];
			   $cimagen1=$fila['cimgcontenido'];
			   $camicontenido1=$fila['camicontenido'];	
			break;			
			case "2":
			   //$foto1=$fila['rutaimagen'];
			   //$foto1="timthumb.php?src=" .$fila['rutaimagen'] . "&h=200&w=140&zc=0" ;				 
			   $nombproductos2=$fila['cnomcontenido'];
			   $cimagen2=$fila['cimgcontenido'];
			   $camicontenido2=$fila['camicontenido'];			   
			break;					
			case "3":
			   //$foto1=$fila['rutaimagen'];
			   //$foto1="timthumb.php?src=" .$fila['rutaimagen'] . "&h=200&w=140&zc=0" ;				 
			   $nombproductos3=$fila['cnomcontenido'];
			   $cimagen3=$fila['cimgcontenido'];
			   $camicontenido3=$fila['camicontenido'];			   
			break;					

	  }//Fin switch 		   
	  $contador++; 
   }//Fin While 
?>
<body>
<div class="cont_produ_cambiantes">
    <div class="rectangulo">    	        
        
	    <div  id="cimagen"> </div>
       
	    <div id="nomproducto"> </div>
    </div>    
   
    <div class="verofertas">
   	<a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ofertas">Ver todas las ofertas </a>
    </div>
      
</div><!--fin  cont_produ_cambiante-->
<script type="text/javascript" charset="utf-8">
	nombproductos1= "<?=$nombproductos1?>";
	cimagen1= "<?=$cimagen1?>";
	camicontenido1="<?=$camicontenido1?>";
	
	nombproductos2= "<?=$nombproductos2?>";
	cimagen2= "<?=$cimagen2?>";
	camicontenido2="<?=$camicontenido2?>";
	
	nombproductos3= "<?=$nombproductos3?>";
	cimagen3= "<?=$cimagen3?>";
	camicontenido3="<?=$camicontenido3?>";
			
	var cont = 0; 
	var arroferta = [ 
	[nombproductos1,cimagen1,camicontenido1],
	[nombproductos2,cimagen2,camicontenido2],
	[nombproductos3,cimagen3,camicontenido3],
	] 
	function cambia() { 
		var cimagen = document.getElementById("cimagen"); 
		cont = cont % arroferta.length; 
		cimagen.innerHTML  = "<a href='<?php $_SERVER['DOCUMENT_ROOT'] ?>/ofertas/"+arroferta[cont][2]+"'><img src='"+arroferta[cont][1]+"' width='140' height='120'  border='0' /></a>"; 
		
		var nomproducto = document.getElementById("nomproducto"); 
		cont = cont % arroferta.length; 
		nomproducto.innerHTML  ="<font style='text-align:'center';color='#ffffff''>" + arroferta[cont][0] + "</font>"; 		
		
		cont++; 
	} 
	function inicio() { 
		cambia(); 
		setInterval(cambia, 3000); 
		} 
		window.onload=inicio; 
</script> 

<?php  }  //fin si	?>

