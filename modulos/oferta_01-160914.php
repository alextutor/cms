<?php 	session_start();?>
<!--http://www.comocreartuweb.com/consultas/showthread.php/29186-Necesito-un-Script-de-imagen-cambiante-saludos-) -->
<style type="text/css">
 .cont_produ_cambiantes{
	width:98%;
 }  
 .text_decora_line_through{
 text-decoration: line-through;
  }    

.contenido_cambiante{	
	text-align:center;

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
	text-align:center;
}

</style>
<?php
  	//date_default_timezone_set("America/Lima");
	//$fecha_actual = date("d/m/Y"); 	
		$sql_oferta = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido and s.ccodpage='".$_SESSION['scodpage ']."' and  c.cestcontenido='1'  and c.cimgcontenido<>'' and precio_oferta<>0  ORDER BY RAND() LIMIT 3 ";
	$rsoferta = mysql_query($sql_oferta);
	$totaloferta = db_num_rows($rsoferta);
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
			   //$foto1="timthumb.php?src=" .$fila['rutaimagen'] . "&h=200&w=140&zc=0" ;				 
			   $nombproductos1=$fila['cnomcontenido'];
			   $cimagen1=$fila['cimgcontenido'];
			   $camicontenido1=$fila['camicontenido'];
			   $precio1=number_format($fila['precio'],2);
   			   $preciooferta1=number_format($fila['precio_oferta'],2);		
			break;			
			case "2":
			   //$foto1=$fila['rutaimagen'];
			   //$foto1="timthumb.php?src=" .$fila['rutaimagen'] . "&h=200&w=140&zc=0" ;				 
			   $nombproductos2=$fila['cnomcontenido'];
			   $cimagen2=$fila['cimgcontenido'];
			   $camicontenido2=$fila['camicontenido'];
		       $precio2=number_format($fila['precio'],2);
   			   $preciooferta2=number_format($fila['precio_oferta'],2);				   
			break;					
			case "3":
			   //$foto1=$fila['rutaimagen'];
			   //$foto1="timthumb.php?src=" .$fila['rutaimagen'] . "&h=200&w=140&zc=0" ;				 
			   $nombproductos3=$fila['cnomcontenido'];
			   $cimagen3=$fila['cimgcontenido'];
			   $camicontenido3=$fila['camicontenido'];			   
			   $precio3=number_format($fila['precio'],2);
   			   $preciooferta3=number_format($fila['precio_oferta'],2);				   
			break;					

	  }//Fin switch 		   
	  $contador++; 
   }//Fin While 
?>
<body>
<div class="cont_produ_cambiantes">
    <div class="contenido_cambiante">  
	    <div  id="cimagen"> </div>       
	    <div id="nomproducto"> </div>
        <div id="precio"></div>
    	 <div id="preciooferta"></div>        
    
    </div>       
    <div class="verofertas">
   	<a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/ofertas">Ver todas las ofertas </a>
    </div>
      
</div>
<?php  }  //fin si	?>
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
	
	
	precio1= "<?=$precio1?>";
	precio2= "<?=$precio2?>";
	precio3= "<?=$precio3?>";
	preciooferta1= "<?=$preciooferta1?>";
	preciooferta2= "<?=$preciooferta2?>";
	preciooferta3= "<?=$preciooferta3?>";
			
	var cont = 0; 
	var arroferta = [ 
	[nombproductos1,cimagen1,camicontenido1,precio1,preciooferta1],
	[nombproductos2,cimagen2,camicontenido2,precio2,preciooferta2],
	[nombproductos3,cimagen3,camicontenido3,precio3,preciooferta3],
	] 
	
	
	
	function cambia() { 
		var cimagen = document.getElementById("cimagen"); 
		cont = cont % arroferta.length; 
		cimagen.innerHTML  = "<a href='<?php $_SERVER['DOCUMENT_ROOT'] ?>/ofertas/"+arroferta[cont][1]+"'><img src='"+arroferta[cont][1]+"' width='140' height='120'  border='0' /></a>"; 
		
		var nomproducto = document.getElementById("nomproducto"); 
		cont = cont % arroferta.length; 
		nomproducto.innerHTML  ="<font style='text-align:'center';color='#ffffff''>" + arroferta[cont][0] + "</font>"; 		
		
		var precio = document.getElementById("precio"); 
cont = cont % arr.length; 
precio.innerHTML  = "<font style='text-align:'center';size='2';color='#d50000'><span class='verde_mar bold'>Antes </span>S/."+ arr[cont][3] + "<span class='black'> Soles</span></font>"; 

		var preciooferta = document.getElementById("preciooferta"); 
		cont = cont % arr.length; 
		preciooferta.innerHTML  = "<font style='text-align:'center';size='2';color='#d50000'><span class='verde_mar bold'>Oferta  </span>S/."+ arr[cont][4] + " <span class='black'> Soles </span></font>";

		cont++; 
	} 
	function inicio() { 
		cambia(); 
		setInterval(cambia, 3000); 
		} 
		window.onload=inicio; 
</script> 