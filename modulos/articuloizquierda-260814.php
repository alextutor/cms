<?php
$sqlcontenido = db_query("SELECT * FROM  contenido c, contenidodetalle  cd WHERE c.ccodcontenido=cd.ccodcontenido and c.ccodcontenido='".$codcont ."'");
while ($row=db_fetch_array($sqlcontenido))
 { 
	//include "modulos/web_opciones.php"; 
	?>
	<h1><?=$row['cnomcontenido']?></h1>
    <div id="articulo">
	<?php if (trim($row['cimgcontenido'])!="") 
		{ 
		?>
		<a href="<?=$row['cimgcontenido']?>"  title="<?=$row['cnomcontenido']?>" rel="gb_imageset[nice_pics]">
        <img src="<?=ereg_replace('fotos','thumbs',$row['cimgcontenido'])?>" border="0" align="left" title="<?=$row['cnomcontenido']?>"  alt="<?=$row['cnomcontenido']?>" style=" margin-right:10px;"></a>
        
	<?php }?>
    <?=$row['cdetcontenido']?>
    </div>
    <?php include "modulos/web_galerias.php";?>
    <?php include "modulos/web_comentarios.php";?>
<?php }?>

