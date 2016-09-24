<style type="text/css">
	.contenido	{		
		margin-right:10px;		
	}
  .areas li 
	{ 
	display: inline; 
	padding-right: 20px;
  } 
</style> 
<?php
$webubica ="3"; // Columna Central
//$codsecc  cadena vacia
if (empty($_GET['idsec'])){	//aqui entra pagina principal	
	$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica FROM pagehome p, pagehomedet d where p.ccodinicio=d.ccodinicio and  p.ccodpage ='".$codpage."' and  ( d.ccoddestino='D' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ");	
		
	//alex modifique pra que tomara estilos
	$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica,e.cdesclase FROM pagehome p, pagehomedet d ,estiloclases e where p.ccodinicio=d.ccodinicio and e.ccodclase = p.ccodclase and p.ccodpage ='".$codpage."' and  ( d.ccoddestino='D' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ");				

}else{	

	//aqui NO entra pagina principal
	$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica FROM pagehome p, pagehomedet d where p.ccodinicio=d.ccodinicio and p.ccodpage ='".$codpage."' and ( d.ccoddestino='".$codsecc."' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ");
	
	//alex modifique para que tomara estilos
	$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica,e.cdesclase FROM pagehome p, pagehomedet d ,estiloclases e where p.ccodinicio=d.ccodinicio and e.ccodclase = p.ccodclase and p.ccodpage ='".$codpage."' and ( d.ccoddestino='".$codsecc."' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica "); 
	 	
}	
while($rowc  = db_fetch_array($sqlc))
{	
	if ($rowc['ctiphome']=='4') //aqui entra a repuestos,productos en home
	{			
		//cclase sustituito por cdesclase
		echo "<div id='".$rowc['cdesclase']."'>";
		echo "<div class='".$rowc['cdesclase']."_titulo'>".$rowc['cnomhome']."</div>";
	    echo "<div class='".$rowc['cdesclase']."_detalle'>";
		contenidosweb($rowc['ccodinicio']);
		echo "</div></div>";		
	}
	else
	{
		// pasa aqui cuando muestra central
		contenidosweb($rowc['ccodinicio']);
	}
}
?>