<!--
http://www.catchmyfame.com/catchmyfame-jquery-plugins/
http://www.catchmyfame.com/catchmyfame-jquery-plugins/jquery-infinite-carousel-plugin/
http://www.catchmyfame.com/jquery/infinitecarousel3/demo/d6.html
 -->
<style type="text/css">
	#ctn_infinitecarousel2{ margin-left:10px;}
	#infinitecarousel2 {border: 2px solid #aaa; }
	#infinitecarousel2 ul{ margin:0 auto}
	#infinitecarousel2 li{}

	.textholder { margin:0 auto}
</style>
<?php 
//echo "infinitecarousel2.php";exit;
session_start();		
	$getNews_sql = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido ".$sql_seccion." AND c.estado='1' and c.ccodcategoria='1' order by c.dfeccontenido desc LIMIT 5; ";

	$getNews = mysql_query($getNews_sql);

?>
<div id="ctn_infinitecarousel2">
    <div id="infinitecarousel2">
        <ul>
          <?php while ($row = mysql_fetch_array($getNews)) {
              $nomurl   = crearurl_articulo($row['ccodseccion']);			
              $ruta     = "/".$nomurl."/".$row['camicontenido'];	
          ?>         
            <li> 	     
              <a href="<?=$ruta?>" title="<?=$rowhome['cnomcontenido']?>" <?=$enlacedestino?>>           
              	<?php
			 switch ($_SESSION['dispositivo']) {
 			   case "Movil":
		      ?>                        
              <img alt="" src="/timthumb.php?src=<?php echo $row['cimgcontenido']; ?>&h=150&w=210&zc=0&q=100&s=1" width="210px" height="150px" />    
        	<?php	
				break;
			 case "Tablet":
		      ?> 
              <img alt="" src="/timthumb.php?src=<?php echo $row['cimgcontenido']; ?>&h=150&w=210&zc=0&q=100&s=1" width="210px" height="150px" />    	
			<?php	
				break;
			 case "PC":
		      ?> 
              <img alt="" src="/timthumb.php?src=<?php echo $row['cimgcontenido']; ?>&h=250&w=450&zc=0&q=100&s=1" width="450px" height="250px" />    	
              	
            <?php	  
                break;
				} // fin case
			 	?>            
                           
               </a>                
              <p class="textholder"><?php echo $row['cnomcontenido']; ?></p>        
            </li>        
          <?php }?>
        </ul>
    </div>
</div>