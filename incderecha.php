<?php
//echo $ampliarimagen_portada."sdasds";exit;
$webubica ="4";
$MenuLateralUbubica ="3";

if (empty($_GET['idsec'])) {
	$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica FROM pagehome p, pagehomedet d where p.ccodinicio=d.ccodinicio and p.ccodpage ='".$codpage."' and  ( d.ccoddestino='D' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica "); 
	
	//alex modifique para que tomara estilos
	$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica,e.cdesclase FROM pagehome p, pagehomedet d,estiloclases e where p.ccodinicio=d.ccodinicio and e.ccodclase = p.ccodclase  and p.ccodpage ='".$codpage."' and  ( d.ccoddestino='D' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica "); 
	
}else{
	$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica FROM pagehome p, pagehomedet d where p.ccodinicio=d.ccodinicio and p.ccodpage ='".$codpage."' and ( d.ccoddestino='".$codsecc."' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ");
	
	//alex modifique para que tomara estilos
	$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica,e.cdesclase FROM pagehome p, pagehomedet d ,estiloclases e  where p.ccodinicio=d.ccodinicio and e.ccodclase = p.ccodclase and p.ccodpage ='".$codpage."' and ( d.ccoddestino='".$codsecc."' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica "); 
	
}
//echo $ampliarimagen_portada."sdasds";exit;
while($rowc  = db_fetch_array($sqlc))
{
	//ctiphome=4 contenido dinamico
	if ($rowc['ctiphome']=='4') 
	{
		echo "<div id='".$rowc['cdesclase']."'>";
		if ($rowc['mostrar_titulo']=="si"){
			echo "<div class='".$rowc['cdesclase']."_titulo'><h2>".$rowc['cnomhome']."</h2></div>";
		}
	    echo "<div class='".$rowc['cdesclase']."_detalle'>";		
	}	
	contenidosweb($rowc['ccodinicio']);
	if ($rowc['ctiphome']=='4')	echo "</div></div>";
}	
	 //include_once ($_SERVER['DOCUMENT_ROOT']. '/include/doctor-responde/doc-res-pre-lado-1.php');
   //include_once ($_SERVER['DOCUMENT_ROOT']. '/doc-res-pre-lado-1.php');   
?>


<?php include_once($_SERVER['DOCUMENT_ROOT']."/"."inc_menu_lateral.php"); ?>