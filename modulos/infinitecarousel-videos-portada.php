<!--
http://www.catchmyfame.com/catchmyfame-jquery-plugins/
http://www.catchmyfame.com/catchmyfame-jquery-plugins/jquery-infinite-carousel-plugin/
http://www.catchmyfame.com/jquery/infinitecarousel3/demo/d6.html

tutorial
http://7sabores.com/blog/como-crear-un-carrusel-imagenes-infinitecarousel-drupal-7
 -->
<style type="text/css">
	#ctn_infinitecarousel3{ margin-left:5px;}
	#infinitecarousel3 {border: 2px solid #aaa; }
	#infinitecarousel3 ul{ margin:0 auto}
	#infinitecarousel3 li{}

	.textholder { margin:0 auto}
</style>
<?php session_start();		
	$getNews_sql = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido ".$sql_seccion." AND c.cestcontenido='1' and c.ccodcategoria='1' order by c.dfeccontenido desc ";

	$getNews = mysql_query($getNews_sql);

?>
<div id="ctn_infinitecarousel3">
    <div id="infinitecarousel3">
        <ul>
          <?php while ($row = mysql_fetch_array($getNews)) {
              $nomurl   = crearurl_articulo($row['ccodseccion']);			
              $ruta     = "/".$nomurl."/".$row['camicontenido'];	
          ?>         
            <li> 	     
              <a href="<?=$ruta?>" title="<?=$rowhome['cnomcontenido']?>" <?=$enlacedestino?>>
               <img alt="" src="/timthumb.php?src=<?php echo $row['cimgcontenido']; ?>&h=280&zc=0&q=100&s=1" width="95%" /></a>                
              <p class="textholder"><?php echo $row['cnomcontenido']; ?></p>        
            </li>        
          <?php }?>
        </ul>
    </div>
</div>