<?php session_start();	
// echo $_SESSION['infinitecarousel3']."entro infinitecarousel3";exit;	
// no te olvides que en Gestor de Videos: Videos  que la columna cnomseccion  este relacionado con su seccion
//ejemplo  se creo en Gestor de Seccion: Seccion  la seccion (Videos Portada) modulo (galeria de videos) 
//estilo seccion (Videos Listado General) 
// en Gestor de Presentación: Videos Portada   Tipo Contenido(contenido dinamico)  Modulo (galeria de videos)
//Seccion (Videos Portada) Estilo Seccion (Videos Slider Portada)  Verificar que  Gestor de Videos: Videos los videos esten
//en la  seccion creada Videos Portada.

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
//echo $sql_query;exit;
//$total = db_num_rows($rsportavideos);
//$numPags = ceil($total/ $item);
//echo $total;exit;
?>
<div id="ctn_infinitecarousel3">
    <div id="infinitecarousel3">
        <ul>
          <?php 
		  //echo $GLOBALS["ampliarvideo_portada"];exit;
		   //le puse global porque la variable definida en index no alcanza a la funcion contenido en funciones_web.php
		  if ($GLOBALS["ampliarvideo_portada"]=="NO")	{// while 1		  
			  while ($rowpovideo = mysql_fetch_array($rsportavideos)) {
				  //$nomurl   = crearurl_articulo($row['ccodseccion']);			
				  //$ruta     = "/".$nomurl."/".$row['camicontenido'];	
			  ?>         
				<li> 	     
				  <a class="iframe" id="open_video"
				   title="<?=$rowpovideo['cnomcontenido']?>"             
				  href="<?="http://www.youtube.com/embed/".id_youtube($rowpovideo['url_video']) ?>&rel=0&autoplay=1">                                                 
              <img src="/timthumb.php?src=<?php echo $rowpovideo['cimgcontenido']; ?>&h=150&w=210&zc=0&q=100&s=1" width="210px" height="150px" />    
                     
                   </a>                
				  <p class="textholder"><?=$rowpovideo['cnomcontenido']; ?></p>        
				</li>        
			 <?php  } // fin while 1 
		   }else { 			  			   
			   while ($rowpovideo = mysql_fetch_array($rsportavideos)) { // while 2	
			   	  //echo $rowpovideo['ccodseccion'];exit;				 
				  $nomurl   = crearurl_articulo($rowpovideo['ccodseccion']);
				  //echo  $rowpovideo['camicontenido'];exit;				 	
				  $ruta     = "/".$nomurl."/".$rowpovideo['camicontenido'];	          	
			  ?>           	  	      
				<li>          
				   <a href="<?=$ruta?>" title="<?=$rowpovideo['cnomcontenido']?>" <?=$enlacedestino?>>
			        	 <img alt="" src="/timthumb.php?src=<?php echo $rowpovideo['cimgcontenido']; ?>&h=120&zc=0&q=100&s=1"
          				width="96%" height="120px" />
           			</a>                
              <!--<p class="textholder"><?php //echo $rowpofotos['cnomcontenido']; ?></p>  -->
              
				 </li>          	
            <?php  } } ?>     		 
        </ul>
    </div>
</div>
<!--http://webdesignandsuch.com/fancybox-youtube-videos/
http://www.jose-aguilar.com/blog/abrir-un-video-de-youtube-en-una-nueva-ventana-con-fancybox-1-3-4/ -->

<style type="text/css">
	#ctn_infinitecarousel3{width:100%; margin:0 auto; height:auto;
	 display:flex; Flex-direction: column;Justify-content:space-between;Align-items: center; }
	#infinitecarousel3 {border: 2px solid #aaa; width:100%;}
	#infinitecarousel3 ul{ margin:0 auto;}
	#infinitecarousel3 li{}

	.textholder {margin:0 auto; text-align:center; padding-bottom:5px}
</style>