<?php session_start();		
// no te olvides que en Gestor de Videos: Videos  que la columna cnomseccion  este relacionado con su seccion
//ejemplo  se creo en Gestor de Seccion: Seccion  la seccion (Videos Portada) modulo (galeria de videos) 
//estilo seccion (Videos Listado General) 
// en Gestor de Presentación: Videos Portada   Tipo Contenido(contenido dinamico)  Modulo (galeria de videos)
//Seccion (Videos Portada) Estilo Seccion (Videos Slider Portada)  Verificar que  Gestor de Videos: Videos los videos esten
//en la  seccion creada Videos Portada.

//Otra forma de presentar videos http://www.jose-aguilar.com/blog/popup-me-con-jquery/

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
    AND contenido.ccodpage ='".$_SESSION['scodpage ']."' and contenido.estado=1 ) 
	ORDER BY contenido.cordcontenido ASC";
//	echo $sql_query ;exit;	
$rsportavideos = mysql_query($sql_query);
//echo $sql_query;exit;
//$total = db_num_rows($rsportavideos);
//$numPags = ceil($total/ $item);
//echo $total;exit;
?>
<div id="ctn_video_estatica_1_portada">        
	<?php 
    //echo $GLOBALS["ampliarvideo_portada"];exit;
     //le puse global porque la variable definida en index no alcanza a la funcion contenido en funciones_web.php
    if ($GLOBALS["ampliarvideo_portada"]=="SI")	{// while 1
        while ($rowpovideo = mysql_fetch_array($rsportavideos)) {
            //$nomurl   = crearurl_articulo($row['ccodseccion']);			
            //$ruta     = "/".$nomurl."/".$row['camicontenido'];	
        ?>                              
        <div class="item">
             <a class="iframe" id="open_video"
           title="<?=$rowpovideo['cnomcontenido']?>"            
          href="<?php echo "http://www.youtube.com/v/".id_youtube($rowpovideo['url_video']) ?>&rel=0&autoplay=1"> 
          
                <img src="<?php echo 'http://img.youtube.com/vi/'.id_youtube($rowpovideo['url_video']).'/0.jpg' ?>"
                 width="100%"  />
                 <p><?=$rowpovideo['cnomcontenido']?></p>      
          
            </a> 
        </div>         
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
         <img alt="" src="/timthumb.php?src=<?php echo $rowpovideo['cimgcontenido']; ?>&h=120&zc=0&q=100&s=1" width="96%" height="120px" /></a>                
        <!--<p class="textholder"><?php //echo $rowpofotos['cnomcontenido']; ?></p>  -->
        
           </li>          	
      <?php  } } ?>     		 
</div>
<!--http://webdesignandsuch.com/fancybox-youtube-videos/
http://www.jose-aguilar.com/blog/abrir-un-video-de-youtube-en-una-nueva-ventana-con-fancybox-1-3-4/ -->

<style type="text/css">
	#ctn_video_estatica_1_portada{width: 100%;display: flex;
	Justify-content: Space-between;Flex-wrap: wrap;}	
	#ctn_video_estatica_1_portada .item { 
	width: calc((100% - 20px)/3); flex: none;box-sizing: border-box; margin-bottom: 10px; 
	display: flex; justify-content: center;flex-wrap: wrap;height:150px;}
	.item p{ margin:0 auto; width:100%; text-align:center; background-color:#2B2B2B ; padding:5px;box-sizing:border-box;
	color:#FFF; margin-top:5px; height:50px; }	
	
	.item figure {}
	.item figcaption { margin-top: 8px;color: #777574;font-size: 13px;
	 text-align: center;  width: 100%; height:100%;}		
</style>