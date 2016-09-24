<ul class="galeriafotos">
<?php
$sqlgaleria= db_query("select * from contenidogaleria where ccodcontenido='".$codcont."' order by ccodmodulo,ccodcontenido");
while($rowg=db_fetch_array($sqlgaleria))
{
?>	<li>
	   	<div class="galeriaimagen"><a href="<?=$rowg['cimggaleria']?>" title="<?=$row['cnomgaleria']?>" rel="gb_imageset[nice_pics]"><img src="<?=$rowg['cimggaleria'];?>"  width="150"/></a></div>
	    <div class="galeriatitulo"><?=$rowg['cnomgaleria']?></div>
    </li>
<?php } ?>
</ul>
