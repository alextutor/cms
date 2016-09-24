<?php	session_start();
/*$homesql = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido  and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' order by c.cordcontenido desc ";*/
$modulo=2000;//videos webmodulos

$homesql = "SELECT
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
    AND contenido.ccodpage ='".$_SESSION['scodpage ']."' and contenido.estado=1 ) 
	ORDER BY contenido.cordcontenido ASC";
//echo $homesql;exit;
$hometabla = db_query($homesql);
$num_rows=mysql_num_rows($hometabla);
//echo $num_rows;exit;
$sqlstylo   = "Select s.ccodseccion,ec.cnomclase,ec.cdesclase  FROM seccion s,estiloclases ec  WHERE   s.ccodclase=ec.ccodclase and s.ccodseccion= '".$codsecc."'"; 
$rsstylo = db_query($sqlstylo);
$rowstylo  = db_fetch_array($rsstylo);
//echo $sqlstylo;exit;
?>
<!-- <div class='ctn_videos_lis_gene'>-->
<!--fancybox  open_video esta en  config_style.php de cada template-->

<!--  julio 2016 si funciona 
<iframe width='640' height='360' src='//www.youtube.com/embed/1c5U1TRbC_M?INSERTAR AQUi' 
frameborder='0' allowfullscreen></iframe>
-->
<div class='<?=$rowstylo['cdesclase']?>'>
	<?php while($rowhome  = db_fetch_array($hometabla)){ ?>     	        
         <a class="iframe" id="open_video"
               title="<?=$rowhome['cnomcontenido']?>" 
        href="<?php echo "http://www.youtube.com/v/".id_youtube($rowhome['url_video'])?>&rel=0&autoplay=1">
             <div class="info-image">
                     <!--<img src='/timthumb.php?src=<?=$rowhome['cimgcontenido']?>&h=90&w=110&zc=0&q=100&s=1' border=0 title='<?= $rowhome['cimgseccion']?>' />-->
               <img src="<?php echo 'http://img.youtube.com/vi/'.id_youtube($rowhome['url_video']).'/0.jpg' ?>" width="200px" />				             	 <div class="titulo"><?php echo $rowhome['cnomcontenido']?></div>   
                       
             </div>                                         
           </a>     
      <?php  } // Fin while  ?>
</div><!-- Fin cong_lista -->
<!--http://www.lawebdelprogramador.com/codigo/PHP/3002-Utilizar-la-API-de-Youtube-para-obtener-el-thumbnail-titulo-descripcion-y-tiempo-de-un-video.html -->
