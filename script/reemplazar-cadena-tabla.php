<?php 
include $_SERVER['DOCUMENT_ROOT']."/config.php";	

/*$sql_website = "SELECT * FROM contenido";
$res_website = db_query($sql_website);
while ($row_website = db_fetch_array($res_website))
{
	$cimgcontenido  	= $row_website['cimgcontenido'];	
	$valor_a_buscar="foto-contenido";
	$valor_de_reemplazo ="12172806";
	$cNuevaimgcontenido  	= str_replace ( $valor_a_buscar , $valor_de_reemplazo , $cimgcontenido);	
	//echo $cNuevaimgcontenido."<br>";
	$Update_contenido= "UPDATE contenido SET
							cimgcontenido     = '" . $cNuevaimgcontenido. "' 							
							where ccodcontenido ='".$row_website['ccodcontenido']."'";							
	//echo $Update_contenido;exit;						
	$Update_agencia=mysql_query($Update_contenido,$conexion) or die ("problema con Actualiza contenido");
}*/

$sql_website = "SELECT * FROM foto_contenido";
$res_website = db_query($sql_website);
while ($row_website = db_fetch_array($res_website))
{
	$cimgcontenido  	= $row_website['url_foto'];	
	$valor_a_buscar="foto-contenido";
	$valor_de_reemplazo ="12172806";
	$cNuevaimgcontenido  	= str_replace ( $valor_a_buscar , $valor_de_reemplazo , $cimgcontenido);	
	//echo $cNuevaimgcontenido."<br>";
	$Update_contenido= "UPDATE foto_contenido SET
							url_foto     = '" . $cNuevaimgcontenido. "' 							
							where ccodfoto ='".$row_website['ccodfoto']."'";							
	//echo $Update_contenido;exit;						
	$Update_agencia=mysql_query($Update_contenido,$conexion) or die ("problema con Actualiza contenido");
}

?>

