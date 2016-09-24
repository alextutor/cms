<?php
$sqlpag   = db_query("SELECT * FROM  contenido c, seccioncontenido s, estilocontenido e WHERE c.ccodcontenido=s.ccodcontenido and c.ccodestcontenido= e.ccodestcontenido and s.ccodpage='".$codpage."' and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='2'  order by c.dfeccontenido asc LIMIT 0 , 1 ");
while ($rowpag=db_fetch_array($sqlpag))
{
	$codcont = $rowpag['ccodcontenido'];
	$webpag  = "modulos/".$rowpag['cincestcontenido'];
	db_query("UPDATE contenido SET   nviscontenido = nviscontenido + 1  WHERE ccodcontenido = '" . $codcont . "'");
	db_query("INSERT INTO visitascontenido (ccodvisita, ccodcontenido, cestvisita, cestvoto ) VALUES ('".$_SESSION['NROCONTENIDO']."','".$codcont."','1','0' )");
	include $webpag;
}
$sql_seccion = "SELECT * FROM  seccion WHERE ccodseccion like '".$codsecc."%' and cnivseccion='".($nivsecc+1)."' AND cestseccion='1' ";
$que_seccion = db_query($sql_seccion);
while ($row_seccion=db_fetch_array($que_seccion))
{ 
	$enlaceurl     = $rutasec."/".$row_seccion['camiseccion'];
?>
	<div class="seccionindex100">
		<dl class="seccionindex" >
			<dt>
			<?php	if($row_seccion['cimgseccion']!="")	{ ?>
				<a href="<?=$enlaceurl?>" title="<?=$row_seccion['cnomseccion']?>" ><img src="webfiles/cabeceras/<?=$row_seccion['cimgseccion']?>" border="0" title="<?=$row_seccion['cnomseccion']?>" width="140" alt="<?=$row_seccion['cnomseccion']?>" ></a>
			<?php } ?>
			</dt>
			<dd><a href="<?=$enlaceurl?>" title="<?=$row_seccion['cnomseccion']?>"><?=$row['cnomseccion']?></a><br /><?=$row_seccion['cdesseccion']?></dd>
		</dl>
	</div>
<?php }

$sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido and s.ccodpage='".$codpage."' and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' order by c.dfeccontenido desc ";
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
	<div class="seccionindex100">
		<dl class="seccionindex" >
			<dt>
            &raquo;&nbsp;<a href="<?=$enlaceurl?>" title="<?=$row['cnomcontenido']?>" <?=$enlacedestino?>><?=$row['cnomcontenido']?></a>
			</dt>
			<dd>
			</dd>
		</dl>
	</div>
<?php }?>
<?=paginar($pag, $total, $pagsecc, 3, $rutasec);?>
