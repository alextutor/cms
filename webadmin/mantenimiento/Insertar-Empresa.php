<?php  session_start(); 
   $INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
   extract($_POST);   
   
   //$inicioclases=date("Y-m-d",strtotime($inicioclases));   
   include($_SERVER['DOCUMENT_ROOT']. '/webadmin/include/funciones.php');	   
   include($_SERVER['DOCUMENT_ROOT']. '/config.php');	  
	
	$ccodubigeo="";$ylati=""; $xlong=""; 
	$save_contenido= "INSERT INTO page
					(rutaimages,cnikpage,camipage,cnompage,
					crazpage,clogo,
					ctitpage,cfavicon,cdespage,ctagpage,cemacontacto,cemaventas					,ctelefonopri,ctelefonosec,tfax,tmovil1,tmovil2,tmovil3,tmovil4,cdistrito,cdirecempresa,chorarioatencion,cod_google_map,anchomapa,altomapa
					,credYoutube,credTwitter,credFacebook)
						values(											
							'" . $rutaimages ."',
							'" . $cnikpage ."',
							'" . $camipage. "', 
							'" . $cnompage . "', 
							'" . $crazpage . "', 
							'" . $clogo . "',
							'" . $ctitpage . "',
							'" . $cfavicon . "',
							'" . $cdespage . "',
							'" . $ctagpage . "', 
							'" . $cemacontacto . "', 
							'" . $cemaventas . "',
							'" . $ctelefonopri . "', 
							'" . $ctelefonosec . "',
							'" . $tfax . "', 
							'" . $tmovil1 . "', 
							'" . $tmovil2 . "', 
							'" . $tmovil3 ."',
							'" . $tmovil4 ."',
							'" . $cdistrito . "', 						
							'" . $cdirecempresa . "',
							'" . $chorarioatencion . "',
							'" . $cod_google_map . "',   
							'" . $anchomapa . "',   
							'" . $altomapa . "',
							'" . $credYoutube . "',
							'" . $credTwitter . "',
							'" . $credFacebook . "'
														      
							)";				
		
	//db_query($save_contenido);	
	echo $save_contenido;exit;	
	$sqlcontenido =mysql_query($save_contenido,$conexion) or die ("problema con Insertar Empresa");		    
?>
<script language='JavaScript'>    
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/index.php?option=com_empresa&mensaje=La Empresa ha sido Ingresada correctamente' 
</script> 
