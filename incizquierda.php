<?php
session_start();
$webubica ="2";//original 2 sino no sale los demas como facebook 
$MenuLateralUbubica ="2";
//-------------------Aqui recien toma lado izquierdo mirar el codigo de arriba que hace
if (empty($_GET['idsec'])) {
	//entra oferta de productos					
	$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica FROM pagehome p, pagehomedet d where p.ccodinicio=d.ccodinicio and p.ccodpage ='".$codpage."' and  ( d.ccoddestino='D' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica "); 
	
		//alex modifique para que tomara estilos
	$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica,e.cdesclase FROM pagehome p, pagehomedet d,estiloclases e where p.ccodinicio=d.ccodinicio and e.ccodclase = p.ccodclase  and p.ccodpage ='".$codpage."' and  ( d.ccoddestino='D' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica "); 

}else{
	$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica FROM pagehome p, pagehomedet d where p.ccodinicio=d.ccodinicio and p.ccodpage ='".$codpage."' and ( d.ccoddestino='".$codsecc."' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ");
	
	//alex modifique para que tomara estilos
	$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica,e.cdesclase FROM pagehome p, pagehomedet d ,estiloclases e  where p.ccodinicio=d.ccodinicio and e.ccodclase = p.ccodclase and p.ccodpage ='".$codpage."' and ( d.ccoddestino='".$codsecc."' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica "); 

}
	 
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
	contenidosweb($rowc['ccodinicio'],$rowc['cnomhome'],$rowc['ctiphome'],$rowc['cimgpubli'],$rowc['curlpubli'],$rowc['cadspubli'],$rowc['ccodestilo'],$rowc['ccodmodulo'],$rowc['ccodseccion'],$rowc['ccodcategoria'],$rowc['ccodorden'],$rowc['nancho'],$rowc['nalto'],$rowc['nnroitems'],'columnacenbanner');
	if ($rowc['ctiphome']=='4')	echo "</div></div>";
}
?>

<?php include_once($_SERVER['DOCUMENT_ROOT']."/"."inc_menu_lateral.php"); ?>