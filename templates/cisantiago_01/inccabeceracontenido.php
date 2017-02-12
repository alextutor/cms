<?php 
$webubica ="1";
if (empty($_GET['idsec'])){	
/*	$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica,e.cdesclase FROM pagehome p, pagehomedet d  where p.ccodinicio=d.ccodinicio and p.ccodpage ='".$codpage."' and  ( d.ccoddestino='D' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica "); */

	//alex modifique para que tomara estilos
	$sqlcabecera="SELECT p.*,d.ccoddestino,p.cordpublica FROM pagehome p, pagehomedet d,estiloclases e where p.ccodinicio=d.ccodinicio and e.ccodclase=p.ccodclase and p.ccodpage ='".$codpage."' and  ( d.ccoddestino='D' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ";
	$sqlc= db_query($sqlcabecera); 		
	
}else{
	/*$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica FROM pagehome p, pagehomedet d where p.ccodinicio=d.ccodinicio and  p.ccodpage ='".$codpage."' and ( d.ccoddestino='".$codsecc."' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ");*/ 
	
	//alex modifique para que tomara estilos
	$sqlcabecera="SELECT p.*,d.ccoddestino,p.cordpublica,e.cdesclase FROM pagehome p, pagehomedet d,estiloclases e where p.ccodinicio=d.ccodinicio and e.ccodclase=p.ccodclase  and p.ccodpage ='".$codpage."' and ( d.ccoddestino='".$codsecc."' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ";	
	$sqlc= db_query($sqlcabecera); 
}
while($rowc  = db_fetch_array($sqlc))
{	
	if ($rowc['ctiphome']=='4') 
	{		
		echo "<div id='".$rowc['cdesclase']."'>";
		echo "<div id='".$rowc['cdesclase']."titulo'>".$rowc['cnomhome']."</div>";
		echo "<div id='".$rowc['cdesclase']."contenido'>";
		contenidosweb($rowc['ccodinicio']);
		echo "</div></div>";
	}
	else
	{			
	//1   include/funciones_web.php esta contenidosweb ver el codigo de arriba que carga		
		contenidosweb($rowc['ccodinicio']);
	}	
}
?>
