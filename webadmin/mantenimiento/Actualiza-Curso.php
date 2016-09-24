<?Php 
$Title = "";
$Description = "";
$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/webadmin/header.php');
?>
<?php    
include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/mis-funciones.php');  	
 include($_SERVER['DOCUMENT_ROOT']. '/config.php');	       
 $paginacion=$_POST['paginacion']; 
  extract($_POST);
  // $inicioclases_curso=date("Y-m-d",strtotime($inicioclases_curso));
  echo $inicioclases_curso;
  $inicioclases_curso=convertirFecha_SpanishToEnglish($inicioclases_curso); 
//Creamos la sentencia SQL y la ejecutamos
$sql2 = "UPDATE cursos SET  		 codigo_curso='$codigo_curso',curso='$curso',duracion_curso='$duracion_curso',inicioclases_curso='$inicioclases_curso',modalidad_curso='$modalidad_curso'
         ,detalle_curso='$detalle_curso',estado='$estado',orden='$orden',imagen='$imagen',preciosoles='$preciosoles',preciosolesoferta='$preciosolesoferta'
		    WHERE id_curso='$id'" ;  	  

if(mysql_query($sql2)){ 	
	?>
    <script language='JavaScript'>    
		page = "<?=$paginacion?>";
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+'/webadmin/index.php?option=com_cursos&mensaje=El Curso ha sido guardado correctamente'
	</script> 	
	<?php    	
}else {
	 $mensaje = "Ha ocurrido un error al actualizar el Curso, prueba mas tarde";          
	 echo $mensaje;
}   
?>

