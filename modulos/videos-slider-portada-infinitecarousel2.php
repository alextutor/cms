<?php session_start();		
	//http://webdesignandsuch.com/fancybox-youtube-videos/
	
	$modulo=2000;//videos webmodulos
 // viene de funciones_web.php contenido deinamico
$sql_query = "SELECT
    contenido.*
    , contenido.ccodmodulo
    , seccioncontenido.ccodseccion
    , contenido.ccodpage
	, contenido.estado
FROM
    contenido
    LEFT JOIN seccioncontenido 
        ON (contenido.ccodcontenido = seccioncontenido.ccodcontenido)
    INNER JOIN seccion 
        ON (seccioncontenido.ccodseccion = seccion.ccodseccion)
WHERE (contenido.ccodmodulo ='".$modulo ."'
    AND seccioncontenido.ccodseccion ='".$rowads['ccodseccion'] ."'
    AND contenido.ccodpage ='".$_SESSION['scodpage']."' and contenido.estado=1 ) 
	ORDER BY contenido.cordcontenido ASC";
//	echo $sql_query ;exit;	
$rsportavideos = mysql_query($sql_query);
//$total = db_num_rows($rsportavideos);
//$numPags = ceil($total/ $item);
//echo $total;exit;
?>
<div id="ctn_infinitecarousel3">
    <div id="infinitecarousel3">
        <ul>
          <?php 
		   //le puse global porque la variable definida en index no alcanza a la funcion contenido en funciones_web.php
		  if ($GLOBALS["ampliarvideo_portada"]=="NO")	{// while 1		  
			  while ($rowpovideo = mysql_fetch_array($rsportavideos)) {
				  //$nomurl   = crearurl_articulo($row['ccodseccion']);			
				  //$ruta     = "/".$nomurl."/".$row['camicontenido'];	
			  ?>         
				<li> 	     
				  <a class="iframe" id="open_video"
				   title="<?=$rowpovideo['cnomcontenido']?>" 
                   href="<?="http://www.youtube.com/v/".id_youtube($rowpovideo['url_video']) ?>&rel=0&autoplay=1">

				   
                   <?php
			  switch ($_SESSION['dispositivo']) {
 			   case "Movil":
		      ?>   
                      <img  src="/timthumb.php?src=<?php echo $rowpovideo['cimgcontenido']; ?>&h=150&w=250&zc=0&q=100&s=1" width="250px" height="150px" />
                      
        	<?php	
				break;
			 case "Tablet":
		      ?> 
              <img alt="" src="/timthumb.php?src=<?php echo $rowpovideo['cimgcontenido']; ?>&h=150&w=220&zc=0&q=100&s=1" width="220px" height="150px" />    	
			<?php	
				break;
			 case "PC":
		      ?> 
              <img alt="" src="/timthumb.php?src=<?php echo $rowpovideo['cimgcontenido']; ?>&h=150&w=220&zc=0&q=100&s=1" width="220px" height="150px" />    	
              	
            <?php	  
                break;
				} // fin case
			 	?>          
                
                </a>
                   
                                   
				  <p class="textholder"><?=$rowpovideo['cnomcontenido']; ?></p>        
				</li>        
			 <?php  } // fin while 1 
		   }else { 			  
			   while ($rowpovideo = mysql_fetch_array($rsportavideos)) { // while 2				 
				  $nomurl   = crearurl_articulo($rowpovideo['ccodseccion']);		
				  $ruta     = "/".$nomurl."/".$rowpovideo['camicontenido'];	          	
			  ?>           	  	      
				<li>          
				   <a href="<?=$ruta?>" title="<?=$rowpovideo['cnomcontenido']?>" <?=$enlacedestino?>>
               <img alt="" src="/timthumb.php?src=<?php echo $rowpovideo['cimgcontenido']; ?>&h=120&w=180&zc=0&q=100&s=1" width="180px" height="120px" /></a>                
              <!--<p class="textholder"><?php //echo $rowpofotos['cnomcontenido']; ?></p>  -->
              
				 </li>          	
            <?php  } } ?>     		 
        </ul>
    </div>
</div>
<!--http://webdesignandsuch.com/fancybox-youtube-videos/
http://www.jose-aguilar.com/blog/abrir-un-video-de-youtube-en-una-nueva-ventana-con-fancybox-1-3-4/ -->

<style type="text/css">
	#ctn_infinitecarousel3{ width:98%; margin-left:10px; height:auto;}
	#infinitecarousel3 {border: 2px solid #aaa; }
	#infinitecarousel3 ul{ margin:0 auto}
	#infinitecarousel3 li{}
	@media all and (max-width: 768px){
		#infinitecarousel3 .imagencarousel3 { width:250px; height:150px}
		#ctn_infinitecarousel3{ display:none }
		#boton_verde_1{ display:none }
	 }

	.textholder {margin:0 auto; text-align:center; padding-bottom:5px}
</style>