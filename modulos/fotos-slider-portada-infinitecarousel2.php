<?php session_start();		
	$modulo=1400;//fotos webmodulos
	//echo $ampliarimagen_portada."sdadas";exit;
	//echo $rowads['ccodseccion'];exit;
$sql_portafotos = "SELECT * FROM contenido c  left join seccioncontenido  s on c.ccodcontenido=s.ccodcontenido WHERE  c.ccodpage= '".$_SESSION['scodpage']."' and c.ccodmodulo='".$modulo."' ORDER BY RAND() LIMIT 5";

$sliderpor=substr($rowads['ccodseccion'],0,16) ;
//echo $sliderpor;exit;
$sql_portafotos = "SELECT
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
    AND seccioncontenido.ccodseccion like  '" .$sliderpor . "%' 
    AND contenido.ccodpage ='".$_SESSION['scodpage']."'  ) 
	ORDER BY RAND() LIMIT 5";
	
//echo $sql_portafotos;exit;
 //and contenido.estado=1
$rsportafotos = mysql_query($sql_portafotos);
//$total = db_num_rows($rsportavideos);
//$numPags = ceil($total/ $item);
//echo $total;exit;

?>
<div id="ctn_infinitecarousel4">
    <div id="infinitecarousel4">
        <ul>
          <?php 		  
		  //le puse global porque la variable definida en index no alcanza a la funcion contenido en funciones_web.php
		  if ($GLOBALS["ampliarimagen_portada"]=="SI")	{ 	  
			  while ($rowpofotos = mysql_fetch_array($rsportafotos)) { // while 1
				  //$nomurl   = crearurl_articulo($row['ccodseccion']);			
				  //$ruta     = "/".$nomurl."/".$row['camicontenido'];	          	
			  ?>           	  	      
				<li>          
				<!--grouped_elements se  define en config_style.php -->                                           
				   <a class="grouped_elements" rel="<?=$sliderpor?>" href="<?=$rowpofotos['cimgcontenido']?>"  title="<?=$rowpofotos['cnomcontenido']?> " />  
				<img alt="" src="/timthumb.php?src=<?php echo $rowpofotos['cimgcontenido']; ?>&h=120&w=180&zc=0&q=100&s=1" width="180px" height="120px" />
				 </a>                                  
					 <!--<p class="textholder"><?=$rowpofotos['cnomcontenido']; ?></p>  -->                                                      
				 </li>          					   
			  <?php  } // fin while 1 
			  }else { 
			  
			   while ($rowpofotos = mysql_fetch_array($rsportafotos)) { // while 2
				  $nomurl   = crearurl_articulo($rowpofotos['ccodseccion']);			
				  $ruta     = "/".$nomurl."/".$rowpofotos['camicontenido'];	          	
			  ?>           	  	      
				<li>          
				   <a href="<?=$ruta?>" title="<?=$rowpofotos['cnomcontenido']?>" <?=$enlacedestino?>>
               <img alt="" src="/timthumb.php?src=<?php echo $rowpofotos['cimgcontenido']; ?>&h=120&w=180&zc=0&q=100&s=1" width="180px" height="120px" /></a>                
              <!--<p class="textholder"><?php //echo $rowpofotos['cnomcontenido']; ?></p>  -->
              
				 </li>          	
            <?php  } }  ?>
        </ul>
    </div>
</div>
<!--http://webdesignandsuch.com/fancybox-youtube-videos/
http://www.jose-aguilar.com/blog/abrir-un-video-de-youtube-en-una-nueva-ventana-con-fancybox-1-3-4/ -->

<style type="text/css">
	#ctn_infinitecarousel4{ width:98%; margin:0 auto; height:auto;}
	#infinitecarousel4 {border: 2px solid #aaa; }
	#infinitecarousel4 ul{ margin:0 auto; list-style: none}
	#infinitecarousel4 li{ }

	.textholder {margin:0 auto; text-align:center; padding-bottom:5px}
</style>