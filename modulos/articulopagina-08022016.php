<?php 
$sqlcontenido = db_query("SELECT * FROM  contenido c, contenidodetalle  cd WHERE c.ccodcontenido=cd.ccodcontenido and c.ccodcontenido='".$codcont ."'");
while ($row=db_fetch_array($sqlcontenido))
 { 
	?>
    <h1 class="center lne_h_20"><?=$row['cnomcontenido']?></h1>
	<div id="articulo">
		 <div class="resumen_articulo"> <?=$row['crescontenido']?>  <!--resumen -->   </div>
        <div class="contenido_articulo"> <?=$row['cdetcontenido']?>  <!--contenido -->   </div>
    </div>
<?php }?>
<br />
 <?php  include_once ($_SERVER['DOCUMENT_ROOT']."/modulos/listado-horizontal-foto-contenido.php");?>
