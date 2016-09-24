<!-- estilos copiado de art_stylo_galeria_photoswipe.php   -->
<style>
.my-gallery {width: 100%;display:flex; Justify-content:Space-between;Flex-wrap: wrap;}
.desc_galeria{ margin-bottom:10px; width:100%; text-align:left; font-size:14px;margin-left:10px; }
.my-gallery img {width: 100%;height: auto;}
.my-gallery figure {
   width:calc((100% - 10px)/2);
	flex:none;
	box-shadow: 0 0 0 1px #fff,
	            0 0 0 2px #ccc;
	box-sizing  : border-box ; 			
	margin-bottom:10px;
	display:flex;
	justify-content:center;
	flex-wrap:wrap;
	padding:1em 0;
	}
/*.my-gallery figcaption {display: none;}*/
.my-gallery figcaption { margin-top:8px;color:#777574;font-size: 13px; text-align:center ; width:80%;}

@media all and (min-width: 400px){ /* si es mayor a 400px 3 columnas */
	.my-gallery figure {width:calc((100% - 20px)/3);}
} 		
@media all and (min-width: 600px){/* si es mayor a 600px 4 columnas */
	.my-gallery figure {width:calc((100% - 30px)/4);}
} 


</style>
<?php 
 //saca estilo
$sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido  and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' and c.estado='1' order by c.dfeccontenido desc ";
$rsgaleria = db_query($sql_query);
$num_rows = db_num_rows($rsgaleria);  

$sqlstylo   = "Select estiloclases.* FROM estiloclases,seccion s where s.ccodseccion='".$codsecc."' and  
 estiloclases.ccodclase=s.ccodclase";	  
$rsstylo = db_query($sqlstylo);
$rowstylo  = db_fetch_array($rsstylo);

// saca descripcion de la seccion para seo 
$sql_Secciongaleria = "SELECT cdesseccion,cnomseccion FROM  seccion where ccodseccion = '".$codsecc."' AND estado='1'";
//echo $sql_Secciongaleria;exit;
$rsSecciongaleria = db_query($sql_Secciongaleria);
$rowSecciongaleria  = db_fetch_array($rsSecciongaleria);
// saca descripcion
?>
<div class="desc_galeria">
<h1><?php echo $rowSecciongaleria['cnomseccion'] ?></h1>
<?php echo $rowSecciongaleria['cdesseccion'] ?>
</div>
<div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
	<?php 
    $sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido  and s.ccodseccion = '".$codsecc."' AND c.estado='1' and c.ccodcategoria='1' order by c.dfeccontenido desc ";
    $query = db_query($sql_query);
    $total = db_num_rows($query);
    $pag    = $pagina;
    $numpags = ceil($total/$pagsecc);
    $reg     = ($pag-1) * $pagsecc;
    $producto_query = db_query($sql_query . " LIMIT " .$reg." , ".$pagsecc);
    $dataindex=0;
    while ($row=db_fetch_array($producto_query))
    { 
        if($row['curlcontenido']=="")
        {
            $nomurl        = crearurl_articulo($row['ccodseccion']);
            $enlaceurl     = "/".$nomurl."/".$row['camicontenido'];
            $enlacedestino = "";
    
        }
        else
        {
            $enlaceurl     = $row['curlcontenido'];
            $enlacedestino = "target='_blank'";
        }	
		//echo $enlaceurl."<br/>";
    ?>
        <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
         <a href="<?=$enlaceurl?>" title="<?=$row['cnomcontenido']?>" <?=$enlacedestino?>>
       
              <img src="/timthumb.php?src=<?=$row['cimgcontenido'] ?>&h=200&w=160&zc=0&q=100&s=1" itemprop="thumbnail" alt="<?=$row['cnomcontenido']?>" />
          </a>
            <figcaption itemprop="caption description"><?=$row['cnomcontenido']?></figcaption>                                          
        </figure>
      
      
    <?php	++$dataindex; } //fin while ?>
</div>