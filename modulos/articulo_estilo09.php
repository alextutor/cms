<?php 	
//http://www.webtutoriales.com/articulos/mostrar-resultados-por-columnas
//aqui falta parte arriba mas codigo ver lis  articulos_estilos ejemplo articulo_estilo04.php

//echo $_GET['idsec'];exit; 
//Esta consulta es para sacar el titulo de la seccion nada mas.
$sql_query = "SELECT * FROM  seccion s where ccodseccion='".$codsecc."'";
$rsSecc= db_query($sql_query);
$rowSecc=db_fetch_array($rsSecc);
?>
<h1><?php echo $rowSecc['cnomseccion'] . $secdescripcion ?></h1>
<div class="listado_numeral">    
<?php 
//121728061416000100060000 catrasto
//121728061416000200050000 capacitacion
$s1 = $codsecc;
if (empty($_GET['idsec2'])){ //aqui entra cuando solo esta  idsec
	//sacado de inccabeceramenu.php
	$s1 = substr($codsecc,0,12);
	$sqlmenucab2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s1."%'  and cnivseccion=2 and  cestseccion='1' ORDER BY  seccion.cordcontenido ";
}
if (!empty($_GET['idsec2'])){
	//sacado de inccabeceramenu.php
	$s1 = substr($codsecc,0,16);
	$sqlmenucab2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion s WHERE  ccodseccion like '".$s1."%'  and cnivseccion=3 and  cestseccion='1'  ORDER BY s.cordcontenido ASC  ";
}

$numcolumnas = 2;
$producto_query = db_query($sqlmenucab2);
$número_filas = mysql_num_rows($producto_query);
$nprimera=1;
if ($número_filas>0) { // si 1
    $i = 0;
	while ($row=db_fetch_array($producto_query)){//while 3
			//echo $row['ss'];exit;
			
			if($row['curlcontenido']=="")
			{
				$nomurl        = crearurl_articulo($row['ccodseccion']);
				//$enlaceurl     = "/".$nomurl."/".$row['camiseccion'];
				$enlaceurl     = "/".$nomurl;
				$enlacedestino = "";
			}
			else
			{
				$enlaceurl     = $row['curlcontenido'];
				$enlacedestino = "target='_blank'";
			}	
	   $resto = (round($número_filas /$numcolumnas)); 	  
	   if ($resto>$i ) { //si 2
	   		if($i==0){echo "<div class='izq'><ol>";}
?>		   
            <li><span><?=$i+1?></span><p>
           <a href="<?=$enlaceurl?>" title="<?=$row['cnomseccion']?>" <?=$enlacedestino?>><?=$row['cnomseccion'].$row['cordcontenido']?></a>
           </p></li>    
 <?php       
	   }
	   else{		   	
		  if($nprimera==1){
			  echo "</ol></div>";
			  echo "<div class='dere'><ol>";$nprimera=2;			 
		   }   		   
?>	
		  <li><span><?=$i+1?></span><p>
           <a href="<?=$enlaceurl?>" title="<?=$row['cnomseccion']?>" <?=$enlacedestino?>><?=$row['cnomseccion']?></a>
           </p></li>   
<?php
	   }//fin si 2	 
	   $i++;	      
	} //  fin while 2		   
	  echo "</ol></div>";
}	 // fin si 1	
?>
</div><!--Fin listado_numeral -->