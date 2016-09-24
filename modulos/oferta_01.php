<?php 	session_start();// viene de funciones_web.php  (Contenido Dinamico) $rowads['ctiphome']=='4'?>
<!--http://www.comocreartuweb.com/consultas/showthread.php/29186-Necesito-un-Script-de-imagen-cambiante-saludos-) -->
<style type="text/css">
 .cont_produ_cambiantes{width:98%;}  
 .text_decora_line_through{text-decoration: line-through; }    
.contenido_cambiante{text-align:center;margin:0 auto;}
.nombproductos{font-family: Garamond, serif;line-height: 1em;color: #000 ;font-weight:bold;
	font-size: 14px;}	
.verofertas{font-size:14px;color:#2a9c7b;font-weight:bold;margin-top:5px;text-align:center;}
</style>
<?php
	///echo $rowads['ccodseccion'];exit;
	// viene de funciones_web.php  (Contenido Dinamico)
  	//date_default_timezone_set("America/Lima");
	//$fecha_actual = date("d/m/Y"); 	
		$sql_oferta = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido and s.ccodpage='".$_SESSION['scodpage ']. "'  and s.ccodseccion ='". $rowads['ccodseccion']."' and  c.cestcontenido='1'  and c.cimgcontenido<>'' and precio_oferta<>0  ORDER BY RAND() LIMIT 3 ";
	$rsoferta = mysql_query($sql_oferta);
	$totaloferta = db_num_rows($rsoferta);
	
	//alex implemnte llamado seccion para ponerlo en la url de que seccion es llamado
	$sqlsec_oferta = "SELECT * FROM  seccion where ccodseccion='".$rowads['ccodseccion']."'";
	$datasec_oferta = mysql_query($sqlsec_oferta );
	$rssec_oferta=mysql_fetch_array($datasec_oferta);
	//alex implemnte llamado seccion para ponerlo en la url de que seccion es llamado
	
	//para moneda  variables a usar $cMoneda $cSimboloMoneda
	include($_SERVER['DOCUMENT_ROOT']."/modulos/rs-moneda.php");	
	
if ($totaloferta == 0) {
	?>
     <div class="contenido_cambiante">NO hay ofertas de productos</div>    

<?php     
}else {
    
   $contador=1;	  
   while( ($fila=mysql_fetch_array($rsoferta)) ) {
	  switch ($contador)
			{
			case "1":
			   //$foto1=$fila['rutaimagen'];
			   $foto1=$fila['cimgcontenido'];				 
			   $nombproductos1=$fila['cnomcontenido'];
			   $preciosoles1=number_format($fila['precio'],2);
   			   $preciosolesoferta1=number_format($fila['precio_oferta'],2);			   
			   $camicontenido1=$fila['camicontenido'];
			break;	
			case "2":
			   //$foto2=$fila['rutaimagen'];
   			   $foto2=$fila['cimgcontenido'];
			   $nombproductos2=$fila['cnomcontenido'];
			   $preciosoles2=number_format($fila['precio'],2);
   			   $preciosolesoferta2=number_format($fila['precio_oferta'],2);
			   $camicontenido2=$fila['camicontenido'];
			break;	 
    		case "3":
			   //$foto3=$fila['rutaimagen'];
			   $foto3=$fila['cimgcontenido'];
			   $nombproductos3=$fila['cnomcontenido'];
			   $preciosoles3=number_format($fila['precio'],2);
   			   $preciosolesoferta3=number_format($fila['precio_oferta'],2);
			   $camicontenido3=$fila['camicontenido'];			   
			break;	 	
	  }//Fin switch 		   
	  $contador++; 
   }//Fin While 
?>
<body>
<div class="cont_produ_cambiantes">
	<div class="contenido_cambiante">  
	    <div  id="imagen"> </div>       
	    <div id="nombproductos"> </div>
        <div id="preciosoles"></div>
    	 <div id="preciosolesoferta"></div>            
    </div>      
</div><!--fin  cont_produ_cambiante-->
<?php  }  //fin si	?>
<script> 
foto1= "<?=$foto1?>";
foto2= "<?=$foto2?>";
foto3= "<?=$foto3?>";
camicontenido1= "<?=$camicontenido1?>";
camicontenido2= "<?=$camicontenido2?>";
camicontenido3= "<?=$camicontenido3?>";
nombproductos1= "<?=$nombproductos1?>";
nombproductos2= "<?=$nombproductos2?>";
nombproductos3= "<?=$nombproductos3?>";
preciosoles1= "<?=$preciosoles1?>";
preciosoles2= "<?=$preciosoles2?>";
preciosoles3= "<?=$preciosoles3?>";
preciosolesoferta1= "<?=$preciosolesoferta1?>";
preciosolesoferta2= "<?=$preciosolesoferta2?>";
preciosolesoferta3= "<?=$preciosolesoferta3?>";

var cont = 0; 
var arr = [ 
[foto1,nombproductos1,preciosoles1,camicontenido1,preciosolesoferta1],
[foto2,nombproductos2,preciosoles2,camicontenido2,preciosolesoferta2],
[foto3,nombproductos3,preciosoles3,camicontenido3,preciosolesoferta3] 
] 
function cambia() { 
var imagen = document.getElementById("imagen"); 
cont = cont % arr.length; 
imagen.innerHTML  = "<a href='/<?php echo $rssec_oferta['camiseccion'];?>/"+arr[cont][3]+"'><img src='"+arr[cont][0]+"' width='120' height='130'  border='0' /></a>"; 

var nombproductos = document.getElementById("nombproductos"); 
cont = cont % arr.length; 
nombproductos.innerHTML  = arr[cont][1]; 


var preciosoles = document.getElementById("preciosoles"); 
cont = cont % arr.length; 
preciosoles.innerHTML  = "<div class='red text_decora_line_through'>  <span class='verde_mar bold'>Antes </span><?php echo $cSimboloMoneda ?>"+ arr[cont][2] + "</div>"; 
	
	
var preciosolesoferta = document.getElementById("preciosolesoferta"); 
cont = cont % arr.length; 
preciosolesoferta.innerHTML  = "<div class='red '> <span class='verde_mar bold'>Oferta  </span><?php echo $cSimboloMoneda ?>"+ arr[cont][4] + " </div>";

cont++; 
} 
function inicio() { 
cambia(); 
setInterval(cambia, 3000); 
} 
window.onload=inicio; 
</script> 
