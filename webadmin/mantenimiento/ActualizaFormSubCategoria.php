<?Php 
$Title = "";
$Description = "";
$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/webadmin/header.php');
?>
<?php    
 include($_SERVER['DOCUMENT_ROOT']. '/config.php');	         
 $paginacion=$_POST['paginacion']; 
  extract($_POST);
//Creamos la sentencia SQL y la ejecutamos
$sql2 = "UPDATE subcategoria SET titulo='$titulo',orden='$orden',estado='$estado',descripcion='$descripcion',imagen='$imagen',idcategoria='$idcategoria'  WHERE idsubcategoria='$id'" ;  

if(mysql_query($sql2)){ 
		//   $mensaje = "Se ha actualizado el articulo ".$name." correctamente";          
	?>
    <script language='JavaScript'>    
		page = "<?=$paginacion?>";
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+'/webadmin/index.php?option=com_sub_categories&mensaje=La Sub Categoría ha sido guardada correctamente'
	</script> 	
	<?php    	
}else {
	 $mensaje = "Ha ocurrido un error al actualizar el articulo, prueba mas tarde";          
	 echo $mensaje;
}   
?>

