<?php //echo "dadasdsfsdfsdfsdf";exit;
//Verificar si esta cambiado tabla estiloseccion 12-03-2016  8802  Buscador      
//buscador_estilo01.php cambiado por  buscador_01.php                           8800
/*************************** Buscador de articulos ************************/
if(isset($_POST['palabra'])) 
{
	$buspalabra = strtolower($_POST['palabra']);
	$sql_query  = "SELECT * FROM  seccioncontenido s, contenido c  WHERE s.ccodcontenido = c.ccodcontenido and (c.cnomcontenido LIKE '%".$buspalabra."%'  or  c.crescontenido LIKE '%".$buspalabra."%') order by c.dfeccontenido desc";
	$_SESSION['BUSTIENDA']=$sql_query;
}
if(isset($_POST['palabra']) or  ($_SESSION['BUSTIENDA']<>'')) 
{	
	$query      = db_query($_SESSION['BUSTIENDA']);
	$total      = db_num_rows($query);
	$pag        = $pagina;
	if ($pag=='') $pag = 1;
	$numPags = ceil($total/$pagsecc);
	$reg     = ($pag-1) * $pagsecc;
	$buscar_query = db_query($_SESSION['BUSTIENDA'] . " LIMIT " .$reg." , ".$pagsecc);
}
if ($total >0) 
{
?>
	<? while ($rowlista=db_fetch_array($buscar_query)) 
	{ 
	if($row['curlcontenido']=="")
	{
		$nomurl        = crearurl_articulo($rowlista['ccodseccion']);
		$enlaceurl     = $nomurl.$rowlista['camicontenido'];
		$enlacedestino = "";

	}
	else
	{
		$enlaceurl     = $rowlista['curlcontenido'];
		$enlacedestino = "target='_blank'";
	}

	?>
	<div class="seccionindex100">
		<dl class="seccionindex" >
			<dt>
			<?
			if($rowlista['cimgcontenido']!="")
			{
			?>
			<img src="<?=ereg_replace('/fotos/','/fotos/thumbs/',$rowlista['cimgcontenido'])?>" border="0" title="<?=$rowlista['cnomcontenido']?>"  width="140" height="140" alt="<?=$rowlista['cnomcontenido']?>" >
			<? } ?>
            
            </dt>
			<dd>
            <a href="<?=$enlaceurl?>" title="<?=$rowlista['cnomcontenido']?>" <?=$enlacedestino?>><?=$rowlista['cnomcontenido']?></a><br />
			<?=$rowlista['crescontenido']?>
			</dd>
		</dl>
	</div>
	<? } ?>
<?=paginar($pag, $total, $pagsecc, 3, $rutasec);
}
else 
{
?>
	<p>No se encontraron datos coincidentes con el criterio de busqueda </p>
<?
}
?>
