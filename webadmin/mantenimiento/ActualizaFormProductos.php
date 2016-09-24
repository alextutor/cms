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
  
  extract($_POST);
  if ($idsudcategoria=="--seleccione--") {
	 $idsudcategoria=0;
  } 
  $inicioclases=date("Y-m-d",strtotime($inicioclases));
  
//Creamos la sentencia SQL y la ejecutamos
$sql2 = "UPDATE productos SET idcategoria='$idcategoria',idsudcategoria='$idsudcategoria',nombproductos='$nombproductos',curso='$curso',duracion='$duracion',inicioclases='$inicioclases',modalidad='$modalidad' ,detalle='$detalle',preciosoles='$preciosoles' ,preciosolesoferta='$preciosolesoferta' ,idcampana='$idcampana',mostrar='$mostrar'  WHERE idproductos='$id'" ;  	
	
 if(mysql_query($sql2)){ 
    //   $mensaje = "Se ha actualizado el articulo ".$name." correctamente";          
?>
	<script language='JavaScript'> 
		idcategoria = "<?=$idcategoria?>";
		idsudcategoria = "<?=$idsudcategoria?>";
		Filtro_en_oferta = "<?=$Filtro_en_oferta?>";
		page = "<?=$page?>";
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+ 'webadmin/mantenimiento/contenedor_man_produ_admi.php?mensaje=Registro Actualizado' + '&page='	+ page + '&idcategoria='	+idcategoria + '&idsudcategoria='	+idsudcategoria + '&Filtro_en_oferta='	+Filtro_en_oferta
	</script>     
<?php    	
}else {
	 $mensaje = "Ha ocurrido un error al actualizar el articulo, prueba mas tarde";          
}   
include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 
?>

