<?Php 
$Title = "";
$Description = "";
$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/webadmin/header.php');
?>
<?php								
	 extract($_POST);   	
	 include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
	$codigo      = "1217280600140000000000000000";
	$selectpage  = "12172806";
	$ccodplantilla= "0";
	
	$sqlp    = "SELECT ccodplantilla FROM page  WHERE ccodpage='".$selectpage."'";
    $queryp  = db_query($sqlp);
	$rspagina    = db_fetch_array($queryp);
	$selectsub=""; //sub estilos mas opciones
	$imagencab="";//mas opciones
	$nivel=0; //empieza con 0 ver donde se modifica porque lagunos aparecen con 2 o 3 a mas
	$menuinden ="0";	
	$txtpaginar="0";
	$selectorden="0";
	$save_query = "INSERT INTO seccion (
					ccodseccion,
					ccodpage,
					ccodmodulo,
					ccodplantilla,
					ccodsecestilo,
					ccodsubestilo,
					ccodgrupo,
					cnomseccion,
					camiseccion,
					ctitseccion,
					cdesseccion,
					ctagseccion,
					cimgseccion,
					cestseccion,
					cnivseccion,
					cnewmenu,
					ctipseccion,
					curlseccion,
					cpagseccion,
					cordcontenido,
					dfecseccion,
					ccodusuario,
					dfecmodifica)
				   VALUES (
					'".$codigo."',
					'".$selectpage."',
					'".$selectmodulo."',					
					'".$rspagina['ccodplantilla']."',					
					'".$selectestilo."',					
					'".$selectsub."',					
					'0',
					'".$titulo."',
					'".$amigable."',
					'".$txttitulo."',
					'".$txtdetalle."',
					'".$txttags."',
					'".$imagencab."',
					'1',
					'".($nivel+1)."',
					'".$menuinden."',
					'".$selectenlace."',
					'".$rutaenlace."',
					'".$txtpaginar."',
					'".$selectorden."',
					now(),
					'".$_SESSION['id_usuario']."',
					now()
					)";				   
				   
     $sqlInsertCat =mysql_query($save_query,$conexion) or die ("problema con query");	
?>
<script language='JavaScript'>    
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/index.php?option=com_categoria&mensaje=La Categoria ha sido Ingresada correctamente' 
</script> 
