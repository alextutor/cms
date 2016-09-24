<?php
$idsec1= $_GET['idsec1'];$idsec2= $_GET['idsec2'];	
if (!empty($idsec1) and empty ($idsec2)) {
	$sql="SELECT * FROM  productos p, categoria  cate WHERE p.idcategoria=cate.idcategoria and amigable='".$idsec1."'";
}	
if (!empty($idsec1) and !empty ($idsec2)) {
	$sql="SELECT * FROM  productos p, categoria  cate WHERE p.idcategoria=cate.idcategoria and amigable='".$idsec2."'";
}		

$sqlcontenido = db_query($sql);

while ($row=db_fetch_array($sqlcontenido))
 { 
	?>   
	<div id="articulo"><?=$row['detalle_articulo']?></div>
<?php }?>
