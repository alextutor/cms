<?php 
header ('Content-type: text/html; charset=utf-8');
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');
include_once($_SERVER['DOCUMENT_ROOT']. '/include/funciones_web.php');

/*$sqlinsert="SELECT * FROM  contenido c WHERE ccodestcontenido='1401'";
$rsinsertacondeta = db_query($sqlinsert);
while ($row=db_fetch_array($rsinsertacondeta))
 {
	 $save_contenido= "INSERT INTO contenidodetalle
					(
					ccodcontenido,
					cdetcontenido
					)
						values(
							'" . $row['ccodcontenido'] ."',
							'Fotos' 							
							)";				
		
	//db_query($save_contenido);
	//$sqlarcentro="SELECT * FROM  contenido c WHERE ccodcontenido='".$row['ccodcontenido']."'";
	
	$sqlcontenido =mysql_query($save_contenido,$conexion) or die ("problema con Insertar contenidodetalle");		 
 }*/
 
 // actualizamos camicontenido FOAB12172806150519003556J5PE 

//-------------------------- INICIO REMPLAZAR  URL AMIGABLE DE LAS FOTOS
/* $sqlinsert="SELECT * FROM  contenido c WHERE ccodestcontenido='1401'";
$rsinsertacondeta = db_query($sqlinsert);
while ($row=db_fetch_array($rsinsertacondeta))
 {	 	 
	$cquitaextension =strtolower(trim(substr($row['cnomcontenido'],0,-4))); 	
	  //Rememplazamos caracteres especiales latinos
	$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
	$repl = array('a', 'e', 'i', 'o', 'u', 'n');
	$camicontenido = str_replace ($find, $repl, $cquitaextension);
	// Añaadimos los guiones
	$find = array(' ', '&', '\r\n', '\n', '+');
	$camicontenido = str_replace ($find, '-', $camicontenido);	
	
	 $Update_contenido= "UPDATE contenido SET
							camicontenido     = '" .$camicontenido. "',
							cnomcontenido     = '" .$camicontenido. "',							
							cestcompartirredes     = '1',
							cestcomentario     = '0',
							cestcomenface     = '1'							 							
							where ccodcontenido ='".$row['ccodcontenido']."'	";		 

	$Update_agencia=mysql_query($Update_contenido,$conexion) or die ("problema con Actualiza contenido");				
 }*/
//-------------------------- FIN REMPLAZAR  URL AMIGABLE DE LAS FOTOS

//-------------------------- INICIO Insertamos Para los videos que solo se insertaron en contenido
$sqlinsert="SELECT * FROM  contenido c WHERE ccodestcontenido='2001'";
$rsinsertacondeta = db_query($sqlinsert);
while ($row=db_fetch_array($rsinsertacondeta))
 {
	 $save_contenido= "INSERT INTO contenidodetalle
					(
					ccodcontenido,
					cdetcontenido
					)
						values(
							'" . $row['ccodcontenido'] ."',
							'Videos' 							
							)";					
	//$sqlcontenido =mysql_query($save_contenido,$conexion) or die ("problema con Insertar contenidodetalle");		 
	
	$save_seccion="INSERT INTO seccioncontenido (ccodpage,ccodseccion, ccodcontenido ) values ('".$pagina."','" .   $selectseccion . "', '" . $new_cod . "' )";
	$sqlInsertSecconte =mysql_query($save_seccion) or die ("problema con insertar  seccioncontenido");
	
 }
 //-------------------------- FIN Insertamos Para los videos que solo se insertaron en contenido

?>