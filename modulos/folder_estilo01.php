<?php
include  "modulos/articulo_estilo01.php";
$sql_query = "SELECT * FROM  seccion WHERE ccodseccion like '".$cat."%' and cnivseccion='".($nivsecc+1)."' AND cestseccion='1' ";
$query = db_query($sql_query);
$total = db_num_rows($query);
$pag    = $pagina;
$numpags = ceil($total/$pagsecc);
$reg     = ($pag-1) * $pagsecc;
$producto_query = db_query($sql_query . " LIMIT " .$reg." , ".$pagsecc);
while ($row=db_fetch_array($producto_query))
{ 
	$tipo_seccion = $row['ctipseccion'];
	switch($tipo_seccion)
		{
		case 1:
			$enlaceurl = $rutasec."/".$row['camiseccion'];
			break;
		case 2:
			$enlaceurl = $row['curlseccion'];
			break;
		}
?>
	<div class="seccionindex100">
	
		<dl class="seccionindex" >
			<dt>
			<?php
			if($row['cimgseccion']!="")
			{
			?>
			<a href="<?=$enlaceurl?>" title="<?=$row['cnomseccion']?>" ><img src="webfiles/cabeceras/<?=$row['cimgseccion']?>" border="0" title="<?=$row['cnomseccion']?>" width="140" alt="<?=$row['cnomseccion']?>" ></a>
			<?php } ?>
			</dt>
			<dd>
            <a href="<?=$enlaceurl?>" title="<?=$row['cnomseccion']?>"><?=$row['cnomseccion']?></a><br />
			<?=$row['cdesseccion']?>
			</dd>
		</dl>
	</div>
<?php }?>
<?=paginar($pag, $total, $pagsecc, 3, $rutasec);?>
