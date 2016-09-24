<?php
/*----Alex lo implemnete para las clases-----*/
$sql_clase ="SELECT s.* , e.cdesclase  FROM  seccion s,estiloclases e  where e.ccodclase = s.ccodclase and s.ccodpage='" .$codpage."' and s.ccodseccion = '".$codsecc. "'";

$rsClase = db_query($sql_clase);
$rowClase=db_fetch_array($rsClase);
/*----Alex lo implemnete para las clases-----*/

$sql_query = "SELECT * FROM  contenido c, seccioncontenido s, contenidodetalle d WHERE c.ccodcontenido=s.ccodcontenido and c.ccodcontenido=d.ccodcontenido and s.ccodpage='".$codpage."' and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1'  order by c.dfeccontenido desc ";

//c.cestcontenido='1'  
//ccodcategoria='2' categoria es destacado	
//$codsecc="121728061410000000000000";

$query = db_query($sql_query);
$total = db_num_rows($query);
$pag    = $pagina;
$numpags = ceil($total/$pagsecc);
$reg     = ($pag-1) * $pagsecc;
$producto_query = db_query($sql_query . " LIMIT " .$reg." , ".$pagsecc);

while ($row=db_fetch_array($producto_query))
{ 
	if($row['curlcontenido']=="")
	{
		$nomurl        = crearurl_articulo($row['ccodseccion']);		
		$enlaceurl     = "/".$nomurl.$row['camicontenido'];
		$enlacedestino = "";		
	}
	else
	{
		$enlaceurl     = $row['curlcontenido'];
		$enlacedestino = "target='_blank'";
	}
?>
<div id='<?php echo $rowClase['cdesclase'] ?>'>
	<!-- begin post -->
    <article>	 
    <img src="<?php echo $row['cimgcontenido'] ?>" width="625" height="477" />
        <div class="r">
			<h2><span class="naranja bold t16"><?=$row['cnomcontenido']?></span></h2>
            <?=$row['cdetcontenido']?>
        </div>       
    </article>
    <!-- end post -->
    <p class="postnav"></p>    
 </div>   
<?php } // Fin while ?>
<?=paginar($pag, $total, $pagsecc, 3, $rutasec);?>