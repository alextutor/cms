<?php
foreach ($_POST['cid'] as $id){ 
	include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/rutinas/conexion.php');
	$sSQL = "UPDATE categoria SET borrado='SI' WHERE idcategoria=$id" ; 
	mysql_query($sSQL); 
	  //echo $id."<br>"; 
}
?>
<script language='JavaScript'> 
    page= "<?=$NOMBREEMPRESA?>"; 
	ROOT_PATH = "<?=$ROOT_PATH?>";
    location.href= ROOT_PATH+'/webadmin/index.php?option=com_categories&mensaje=Registro Eliminado' 
</script>  