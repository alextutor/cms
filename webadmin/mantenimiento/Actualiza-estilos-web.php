<?Php session_start();
//-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 
	$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];

?>
<?php    
	include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');	
	include_once($_SERVER['DOCUMENT_ROOT']. '/webadmin/include/funciones.php');	 	         
 $paginacion=$_POST['paginacion']; 
  extract($_POST); 
  $Update_contenido= "UPDATE estilopagina SET 
							mostrarurlcatebase= '" .$mostrarurlcatebase. "',
							menu_1Nivel_Mayuscula_Minuscula= '" .$menu_1Nivel_Mayuscula_Minuscula. "',  
  							webestilo= '" .$webestilo. "',
  							menuestilomenu= '" .$menuestilomenu. "',							
							sBaseVirtual0= '" .$sBaseVirtual0. "',
							sBase0= '" .$sBase0. "',
							galeria_imagen= '" .$galeria_imagen. "',							
							sName0= '" .$sName0. "' 							
							where ccodpage ='".$_POST['id']."'	";
			//echo $Update_contenido;exit;																		
	$Update_empresa=mysql_query($Update_contenido,$conexion) or die ("problema con Actualiza Estilos Web");	
	
?>
<script language='JavaScript'>    
	page = "<?=$paginacion?>";
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+'/webadmin/index.php?option=com_estilos_web&mensaje=El estilo Web ha sido Actualizado correctamente'
</script> 	


