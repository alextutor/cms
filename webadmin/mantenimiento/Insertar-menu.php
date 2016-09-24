<?php	session_start();
	 extract($_POST);
	 include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
	 $selectpage  = $_SESSION['selectpage'];
	
	 $ssql ="INSERT INTO pagemenu (ccodpage,cnommenu,cubimenu,cclamenu,cestmenu)  
	   VALUES ('$selectpage','$nomb_menu','$ubi_menu','','1')";
	   
	  $sqlInsertCat =mysql_query($ssql,$conexion) or die ("problema con query");					
?>
<script language='JavaScript'>    
	location.href=  '/webadmin/index.php?option=com_menus&mensaje=La Seccion ha sido Ingresada correctamente' 
</script> 