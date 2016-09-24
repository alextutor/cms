<?php //echo "sdasd";

/// --------------- Inicio Destacado -------------------------------------------------

//Inicio Aqui entra cuando tabla contenido ccodcategoria='2' (destaco(2)) es decir
//cuando se escoge en formulario gestor de articulos Categoria : Normal (1) o destaco(2) 

$yaentro="0";
$sqlarti_esti01="SELECT * FROM  contenido c, seccioncontenido s, estilocontenido e WHERE c.ccodcontenido=s.ccodcontenido and c.ccodestcontenido= e.ccodestcontenido and s.ccodpage='".$codpage."' and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='2'  order by c.dfeccontenido asc LIMIT 0 , 1 ";
$sqlpag   = db_query($sqlarti_esti01);

//echo $sqlarti_esti01 ;exit;
while ($rowpag=db_fetch_array($sqlpag))
{
	
	$codcont = $rowpag['ccodcontenido'];
	$webpag  = "modulos/".$rowpag['cincestcontenido'];
	db_query("UPDATE contenido SET   nviscontenido = nviscontenido + 1  WHERE ccodcontenido = '" . $codcont . "'");
	db_query("INSERT INTO visitascontenido (ccodvisita, ccodcontenido, cestvisita, cestvoto ) VALUES ('".$_SESSION['NROCONTENIDO']."','".$codcont."','1','0' )");							
	//aqui entra quienes somos y muestra estilo del articulo					
	//echo $webpag;exit;
	include $webpag;
	$yaentro="1";				
}
///------------------- Fin Destacado ---------------------------------------------------


/// --------------- Inicio Normal  -------------------------------------------------

//Inicio Aqui entra cuando tabla contenido ccodcategoria='1' (normal(2)) es decir
//cuando se escoge en formulario gestor de articulos Categoria : Normal (1) o destaco(2) 
// fijate la consulta destado tiene and c.ccodcategoria='2'   creo que hay que poner and c.ccodcategoria='1' en la 
//consulta normal

//////////////////Elimina el Contenido Original y puse este que si muestra estilo pagina lo saque de catalogo_estilo01.php
if ($yaentro=="0"){ 
$sqlarti_estilo="SELECT * FROM  contenido c, seccioncontenido s, estilocontenido e WHERE c.ccodcontenido=s.ccodcontenido and c.ccodestcontenido= e.ccodestcontenido and s.ccodpage='".$codpage. "' and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1'  order by c.dfeccontenido asc LIMIT 0 , 1 ";
//echo $sqlarti_estilo;exit;
$sqlpag   = db_query($sqlarti_estilo);

	while ($rowpag=db_fetch_array($sqlpag))
	{
		//echo $rowpag['cincestcontenido'];exit;
		$codcont = $rowpag['ccodcontenido'];
		$webpag  = "modulos/".$rowpag['cincestcontenido'];
		db_query("UPDATE contenido SET   nviscontenido = nviscontenido + 1  WHERE ccodcontenido = '" . $codcont . "'");
		db_query("INSERT INTO visitascontenido (ccodvisita, ccodcontenido, cestvisita, cestvoto ) VALUES ('".$_SESSION['NROCONTENIDO']."','".$codcont."','1','0' )");	
		//echo  $webpag;exit;//modulos/catalogoderecha.php	
		include $webpag;
	}
}
/// --------------- Fin  Normal  -------------------------------------------------



$webubica ="3";
if (empty($_GET['idsec'])) { //Inicio Si 1

	$sqlarti_esti= "SELECT p.*,d.ccoddestino,p.cordpublica FROM pagehome p, pagehomedet d where p.ccodinicio=d.ccodinicio and p.ccodpage ='".$codpage."' and  ( d.ccoddestino='D' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ";
	db_query($sqlarti_esti); 
}else{
	$sqlarti_esti="SELECT p.*,d.ccoddestino,p.cordpublica FROM pagehome p, pagehomedet d where p.ccodinicio=d.ccodinicio and p.ccodpage ='".$codpage."' and ( d.ccoddestino='".$codsecc."' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ";
	$sqlc= db_query($sqlarti_esti); 
}
//echo $sqlarti_esti;exit;
while($rowc  = db_fetch_array($sqlc))
	{	
	if ($rowc['ctiphome']=='4') 
	{		
		echo "<div id='".$rowc['ccodclase']."'>";
		echo "<div id='".$rowc['ccodclase']."titulo'>".$rowc['cnomhome']."</div>";
		echo "<div id='".$rowc['ccodclase']."contenido'>";
		contenidosweb($rowc['ccodinicio']);
		echo "</div></div>";
	}
	else
	{			
		contenidosweb($rowc['ccodinicio']);
	}
}

?>
<?php 
//exit;
// se  pone en Form-Actualiza-estilos-web.php
switch ($galeria_imagen) {
    case 'PhotoSwipe':
      include_once ($_SERVER['DOCUMENT_ROOT']."/modulos/listado-horizontal-foto-contenido-photoswipe.php");
        break;
    case 'Shadowbox':
       include_once ($_SERVER['DOCUMENT_ROOT']."/modulos/listado-horizontal-foto-contenido.php");
        break;
}
 //echo $codcont."111111"."<br>";
?>