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
$sql2 = "UPDATE categoria SET titu_cate='$titu_cate',orden='$orden',estado='$estado',descri_cate='$descri_cate',img_cate='$img_cate' WHERE idcategoria='$id'" ;  

if(mysql_query($sql2)){ 
		//   $mensaje = "Se ha actualizado el articulo ".$name." correctamente";          
	?>
    <script language='JavaScript'>    
		page = "<?=$paginacion?>";
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+'/webadmin/index.php?option=com_categories&mensaje=La categoría ha sido guardada correctamente'
	</script> 	
	<?php    	
}else {
	 $mensaje = "Ha ocurrido un error al actualizar el articulo, prueba mas tarde";          
	 echo $mensaje;
}   
?>

