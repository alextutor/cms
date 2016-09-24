<?Php session_start();
	//-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 
	 extract($_POST);
	$option=$_GET["option"];
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
 	//echo "estado=".$estado ."--id=".$id ;exit;
?>
<?php    
	include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');	
	include_once($_SERVER['DOCUMENT_ROOT']. '/webadmin/include/funciones.php');	
 	         
 $paginacion=$_POST['paginacion']; 
  extract($_POST); 
 
 //ccodsubestilo ='".$selectsub."', fue sacado no hay campo
 $update_query = "UPDATE seccion SET
						estado      ='".$estado."',
						totalpantalla   ='".$totalpantalla."',	
						ccodclase   ='".$selectclase."',
						ccodmodulo    ='".$selectmodulo."',
						ccodsecestilo ='".$selectestilo."',					
						cnomseccion   ='".$titulo."',
						camiseccion   ='".$amigable."',
						ctitseccion   ='".$txttitulo."',
						cdesseccion   ='".$txtdetalle."',
						ctagseccion   ='".$txttags."',
						cimgseccion   ='".$cimgseccion."',
						cnewmenu      ='0',
						ctipseccion   ='".$selectenlace."',
						curlseccion   ='".$rutaenlace."',
						cpagseccion   ='".$txtpaginar."',
						cordcontenido ='".$orden."',
						ccodusuario   ='".$_SESSION['id_usuario']."',
						dfecmodifica  ='".date("Y-m-d H:i:s")."'
					WHERE ccodseccion='".$id."'";	

	//db_query($update_query);	
	$sqlcontenido =mysql_query($update_query,$conexion) or die ("problema con Actualiza Sub Seccion");
?>
<script language='JavaScript'>    
	page = "<?=$paginacion?>";
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+'/webadmin/index.php?option=com_categoria&mensaje=La SubCategoria ha sido Actuzalizado correctamente'
</script> 	


