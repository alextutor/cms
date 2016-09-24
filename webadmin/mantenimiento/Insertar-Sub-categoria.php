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
	 $ssql ="INSERT INTO subcategoria (idcategoria,titulo,orden,estado,descripcion,imagen)  VALUES ('$idcategoria','$titulo','$orden','$estado','$descripcion','$imagen')";
     $sqlInsertCat =mysql_query($ssql,$conexion) or die ("problema con query");					
?>
<script language='JavaScript'>    
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/index.php?option=com_sub_categories&mensaje=La Sub Categoría ha sido Ingresada correctamente' 
</script> 
