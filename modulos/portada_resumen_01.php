<?php session_start();	
//$sql_seccion  viene de funciones_web.php (contenidosweb) // ver Contenido Dinamico
//ver juveme.php
$getNews_sql = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido ".$sql_seccion." AND c.estado='1' and c.ccodcategoria='1' order by c.dfeccontenido desc LIMIT 5; ";
//echo $getNews_sql;exit;
//echo $rowads['ccodseccion'];exit;
$getNews = mysql_query($getNews_sql);
?>
<div class="portada_contenido">
  <?php while ($row = mysql_fetch_array($getNews)) {
    	$sqlxsex  = db_query("Select cnomseccion,camiseccion FROM seccion where ccodseccion='".$rowads['ccodseccion']."' ");
		$rowxsex  = db_fetch_array($sqlxsex); 
		   
	if($row['ctipcontenido']=="1")
	{
		$nomurl        = crearurl_articulo($row['ccodseccion']);
		//echo $nomurl ;exit;
		$ruta     = "/".$nomurl."/".$row['camicontenido'];
		$enlacedestino = "";

	}
	else
	{
		$ruta     = $row['curlcontenido'];
		$enlacedestino = "";
	}	
    ?>         
    <div class="portada_item"> 
	  <div class="portada_item_imagen"> 
         <a href="<?=$ruta?>" title="<?=$rowhome['cnomcontenido']?>" <?=$enlacedestino?>>
               <img alt="" src="/timthumb.php?src=<?php echo $row['cimgcontenido']; ?>&h=60&w=80&zc=0&q=100&s=1" width="80px" height="60px" border="0"/>
         </a>       
   	  </div>      
      <div class="portada_item_contenido">
      	<div class="portada_item_contenido_titulo">     
          <a href="<?=$ruta?>" title="<?=$rowhome['cnomcontenido']?>" <?=$enlacedestino?>>	
           <?php echo $row['cnomcontenido']; ?>     
          </a>
      	</div>
        <div class="portada_item_contenido_detalle">                 
        	<?php echo $row['crescontenido']; ?>     
        </div>
      </div>                
    </div>
   <?php }?>
</div>


