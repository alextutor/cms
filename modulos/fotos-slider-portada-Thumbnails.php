<?php session_start();	 
	$modulo=1400;//fotos webmodulos
	//echo $rowads['ccodseccion'];exit;
	//echo $rowads['ccodseccion'];exit;
$sql_portafotos = "SELECT * FROM contenido c  left join seccioncontenido  s on c.ccodcontenido=s.ccodcontenido WHERE  c.ccodpage= '".$_SESSION['scodpage']."' and c.ccodmodulo='".$modulo."' ORDER BY RAND() LIMIT 5";

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
    AND seccioncontenido.ccodseccion ='".$rowads['ccodseccion'] ."'
    AND contenido.ccodpage ='".$_SESSION['scodpage']."'  ) 
	ORDER BY RAND() LIMIT 5";
	
 //echo $sql_portafotos;exit;
 //and contenido.estado=1
$rsportafotos = mysql_query($sql_portafotos);
//$total = db_num_rows($rsportavideos);
//$numPags = ceil($total/ $item);
//echo $total;exit;
?>
<div id="ctn_infinitecarousel5">
    <div id="infinitecarousel5">
        <ul>
          <?php 
		 //le puse global porque la variable definida en index no alcanza a la funcion contenido en funciones_web.php
		  if ($GLOBALS["ampliarimagen_portada"]=="SI")	{ 	  
	
			  while ($rowpofotos = mysql_fetch_array($rsportafotos)) {// while 1
				  //$nomurl   = crearurl_articulo($row['ccodseccion']);			
				  //$ruta     = "/".$nomurl."/".$row['camicontenido'];	
			  ?>     	      
				<li>          
				<!--grouped_elements se  define en config_style.php -->                                           
				   <a class="grouped_elements" rel="<?=$rowads['ccodseccion']?>" 
				   href="<?=$rowpofotos['cimgcontenido']?>"  title="<?=$rowpofotos['cnomcontenido']?> " /> 
                    	<?php
			 switch ($_SESSION['dispositivo']) {
 			   case "Movil":
		      ?>   
                   	<img alt="" src="/timthumb.php?src=<?php echo $rowpofotos['cimgcontenido']; ?>&h=120&w=310&zc=0&q=100&s=1" width="310px" height="120px" />                     
        	<?php	
				break;
			 case "Tablet":
		      ?> 
              <img alt="" src="/timthumb.php?src=<?php echo $rowpofotos['cimgcontenido']; ?>&h=150&w=210&zc=0&q=100&s=1" width="310px" height="150px" />    	
			<?php	
				break;
			 case "PC":
		      ?> 
              <img alt="" src="/timthumb.php?src=<?php echo $rowpofotos['cimgcontenido']; ?>&h=250&w=450&zc=0&q=100&s=1" width="450px" height="250px" />    	
              	
            <?php	  
                break;
				} // fin case
			 	?>                            
			
				 </a>                                  
					 <!--<p class="textholder"><?=$rowpofotos['cnomcontenido']; ?></p>  -->                                                      
				 </li> 
				<?php  } // fin while 1 
			  }else { 
			  
			   while ($rowpofotos = mysql_fetch_array($rsportafotos)) { // while 2
				  $nomurl   = crearurl_articulo($rowpofotos['ccodseccion']);
				  //echo $nomurl;exit;			
				  //$ruta     = "/".$nomurl."/".$rowpofotos['camicontenido'];	          	
				  $ruta     = "/".$nomurl."/".$rowpofotos['camicontenido'];	          	
			  ?>           	  	      
				<li>          
				   <a href="<?=$ruta?>" title="<?=$rowpofotos['cnomcontenido']?>" <?=$enlacedestino?>>
               
              <?php
			  switch ($_SESSION['dispositivo']) {
 			   case "Movil":
		      ?>   
                      <img alt="" src="/timthumb.php?src=<?php echo $rowpofotos['cimgcontenido']; ?>&h=150&w=250&zc=0&q=100&s=1" width="250px" height="150px" />
        	<?php	
				break;
			 case "Tablet":
		      ?> 
              <img alt="" src="/timthumb.php?src=<?php echo $rowpofotos['cimgcontenido']; ?>&h=150&w=450&zc=0&q=100&s=1" width="450px" height="150px" />    	
			<?php	
				break;
			 case "PC":
		      ?> 
              <img alt="" src="/timthumb.php?src=<?php echo $rowpofotos['cimgcontenido']; ?>&h=130&w=210&zc=0&q=100&s=1" width="210px" height="130px" />    	
              	
            <?php	  
                break;
				} // fin case
			 	?>                       
                
            
               
               </a>                
              <!--<p class="textholder"><?php //echo $rowpofotos['cnomcontenido']; ?></p>  -->
              
				 </li>          	
            <?php  } }  ?>       
                   

        </ul>
    </div>
</div>
<!--http://webdesignandsuch.com/fancybox-youtube-videos/
http://www.jose-aguilar.com/blog/abrir-un-video-de-youtube-en-una-nueva-ventana-con-fancybox-1-3-4/ -->

<style type="text/css">
	#ctn_infinitecarousel5{ width:98%; margin:0 auto; height:auto;}
	#infinitecarousel5 {border: 2px solid #aaa; }
	#infinitecarousel5 ul{ margin:0 auto; list-style: none}
	#infinitecarousel5 li{ }

	.textholder {margin:0 auto; text-align:center; padding-bottom:5px}
</style>