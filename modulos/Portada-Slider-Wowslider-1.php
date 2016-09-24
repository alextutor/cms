<!--
http://wowslider.com/responsive-image-gallery-glass-linear.html
<script type="text/javascript" src="engine1/jquery.js"></script>
 -->
  
<!-- 
 <link rel="stylesheet" type="text/css" href="/modulos/wowslider/style.css" />
 <script type="text/javascript" src="/modulos/wowslider/wowslider.js"></script>
 <script type="text/javascript" src="/modulos/wowslider/script.js"></script>
-->
<style type="text/css">
	@media (min-width:481px) {/* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */
		.ws_images img{ height:300px;}  
    }
</style>
<?php 
//echo "infinitecarousel2.php";exit;
session_start();		
	$SqlWowslider = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido ".$sql_seccion." AND c.estado='1' and c.ccodcategoria='1' order by c.dfeccontenido desc LIMIT 5; ";
	//echo $SqlWowslider;exit;	
	$rsWowslider = mysql_query($SqlWowslider);

?>
<div id="wowslider-container1">
    <div class="ws_images">
        <ul>
          <?php while ($rowWowslider = mysql_fetch_array($rsWowslider)) {
              $nomurl   = crearurl_articulo($rowWowslider['ccodseccion']);			
              $ruta     = "/".$nomurl."/".$rowWowslider['camicontenido'];
			  $xid=0;	
          ?>         
            <li> 	     
              <a href="<?=$ruta?>" title="<?=$rowhome['cnomcontenido']?>" <?=$enlacedestino?>>           
              	<!--title="<?=$rowWowslider['cnomcontenido']; ?>" -->
				<img title="" src="<?=$rowWowslider['cimgcontenido']; ?>"
               id="wows1_<?=$xid?>"  />  
                                          
               </a>                
            </li>        
          <?php $xid++;  }?>
        </ul>
    </div>
</div>