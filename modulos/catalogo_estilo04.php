<table width="98%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td class="titlehome">Codigo</td>
	<td class="titlecen">Imagen</td>
	<td class="titlecen">Nombre</td>
	<td class="titlecen">Unidad</td>
	<td class="titleend"  width="130">Cantidad Comprar</td>
</tr>
<?php
$sqlpag   = db_query("SELECT * FROM  contenido c, seccioncontenido s, estilocontenido e WHERE c.ccodcontenido=s.ccodcontenido and c.ccodestcontenido= e.ccodestcontenido and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='2'  order by c.dfeccontenido asc LIMIT 0 , 1 ");
while ($rowpag=db_fetch_array($sqlpag))
{
	$codcont = $rowpag['ccodcontenido'];
	$webpag  = "modulos/".$rowpag['cincestcontenido'];
	db_query("UPDATE contenido SET   nviscontenido = nviscontenido + 1  WHERE ccodcontenido = '" . $codcont . "'");
	db_query("INSERT INTO visitascontenido (ccodvisita, ccodcontenido, cestvisita, cestvoto ) VALUES ('".$_SESSION['NROCONTENIDO']."','".$codcont."','1','0' )");
	include $webpag;
}
$sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido  and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' order by c.ccodcontenido ";
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
		<tr>
            <td class="colblancohome"><a href="<?=$enlaceurl?>" title="<?=$row['cnomcontenido']?>" <?=$enlacedestino?>><?=$row['ccodinterno']?></a></td>
        	<td class="colblancocen">
			<?php
			if($row['cimgcontenido']!="")
			{
			?>
			<img src="<?=ereg_replace('/fotos/','/thumbs/',$row['cimgcontenido'])?>" border="0" title="<?=$row['cnomcontenido']?>"  alt="<?=$row['cnomcontenido']?>" width="120" >
			<?php } ?>
            </td>
            <td class="colblancocen"><a href="<?=$enlaceurl?>" title="<?=$row['cnomcontenido']?>" <?=$enlacedestino?>><?=$row['cnomcontenido']?></a></td>
            <td class="colblancocen"><?=$row['cnomunidad']?></td>
            <td class="colblancoend">
			<form name="form1" method="post" action="/pedidos">
				<input name="ccodunidad" type="hidden" value="<?=$row['ccodcontenido']?>" >
				<input name="ncanunidad" type="text"   size="5" value="1" > 
			   	<input type="submit" name="Aceptar" value="Agregar">
			</form>
            
            </td>
		</tr>            
<?php }?>
</table>
<?=paginar($pag, $total, $pagsecc, 3, $rutasec);?>


