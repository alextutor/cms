<?php
$webubica ="5";
if (empty($_GET['idsec'])){	
	/*$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica FROM pagehome p, pagehomedet d where p.ccodinicio=d.ccodinicio  and p.ccodpage ='".$codpage."' and  ( d.ccoddestino='D' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica "); */
	
	$sql="SELECT p.*,d.ccoddestino,p.cordpublica,e.cdesclase FROM pagehome p, pagehomedet d ,estiloclases e where p.ccodinicio=d.ccodinicio  and e.ccodclase = p.ccodclase and p.ccodpage ='".$codpage."' and  ( d.ccoddestino='D' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ";
	//echo $sql;exit;
	$sqlc= db_query($sql); 
	
}else{	
	/*$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica FROM pagehome p, pagehomedet d where p.ccodinicio=d.ccodinicio and p.ccodpage ='".$codpage."' and ( d.ccoddestino='".$codsecc."' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica "); */
	
	//alex modifique pra que tomara estilos
	$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica,e.cdesclase FROM pagehome p, pagehomedet d ,estiloclases e where p.ccodinicio=d.ccodinicio and e.ccodclase = p.ccodclase and p.ccodpage ='".$codpage."' and ( d.ccoddestino='".$codsecc."' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica "); 
	
		//$sqlc= db_query($sql);				



}		
while($rowc  = db_fetch_array($sqlc))
{
	if ($rowc['ctiphome']=='4') 
	{					
		echo "<div id='".$rowc['cdesclase']."'>";
		//echo "<div id='".$rowc['cclase']."'>";
		if ($rowc['mostrar_titulo']=='si'){
			//echo "<div id='".$rowc['cclase']."titulo'>".$rowc['cnomhome']."</div>";
    		echo "<div class='".$rowc['cdesclase']."_titulo'>".$rowc['cnomhome']."</div>";			
		}
		//echo "<div id='".$rowc['cclase']."contenido'>";
		echo "<div class='".$rowc['cdesclase']."_detalle'>";		
		
	}
	contenidosweb($rowc['ccodinicio'],$rowc['cnomhome'],$rowc['ctiphome'],$rowc['cimgpubli'],$rowc['curlpubli'],$rowc['cadspubli'],$rowc['ccodestilo'],$rowc['ccodmodulo'],$rowc['ccodseccion'],$rowc['ccodcategoria'],$rowc['ccodorden'],$rowc['nancho'],$rowc['nalto'],$rowc['nnroitems'],'columnacenbanner');
	if ($rowc['ctiphome']=='4')	echo "</div></div>";
}
?>

