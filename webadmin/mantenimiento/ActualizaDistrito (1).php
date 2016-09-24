<?php		
	$Title = "";
	$Description = "";
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/header.php'); 	
?> 
<?php    
 include($_SERVER['DOCUMENT_ROOT']. '/config.php');	 
 mysql_query('SET NAMES utf8');        
 $page=$_POST['page']; 
 $id_distrito =$_POST['id_distrito'];    
 $desc_distrito =$_POST['desc_distrito']; 
 $precio_soles =$_POST['precio_soles']; 
 $mostrar =$_POST['mostrar']; 
 $borrado =$_POST['borrado']; 
 $orden =$_POST['orden'];   

//Creamos la sentencia SQL y la ejecutamos

$sql2 = "UPDATE distrito SET desc_distrito='$desc_distrito', precio_soles='$precio_soles',
 mostrar='$mostrar' ,borrado='$borrado', orden='$orden' WHERE id_distrito='$id_distrito'" ;  
 
 if(mysql_query($sql2)){ 
    //   $mensaje = "Se ha actualizado el articulo ".$name." correctamente";          
?>
<script language='JavaScript'> 
	page = "<?=$page?>";
    ROOT_PATH = "<?=$ROOT_PATH?>";
    location.href= ROOT_PATH+ '/webadmin/mantenimiento/mantDistrito.php?mensaje=Registro Actualizado' + '&page='	+ page 
</script> 

<?php    	
}else {
	 $mensaje = "Ha ocurrido un error al actualizar el articulo, prueba mas tarde";          
}   
include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 
?>

