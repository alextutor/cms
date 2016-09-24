<?Php 
$Title = "";
$Description = "";
$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/webadmin/header.php');
?>
<?php								
	 extract($_POST);
   $inicioclases=date("Y-m-d",strtotime($inicioclases));
	include($_SERVER['DOCUMENT_ROOT']. '/config.php');	

	 $ssql ="INSERT INTO productos (titulo,amigable,idesticonte,tipo,idcategoria,idsubcategoria,orden,estado,detalle_articulo,imagen,
	 codigo_curso,curso,duracion,inicioclases,modalidad,detalle_curso,preciosoles,preciosolesoferta,mostrar)
	   VALUES ('$titulo','$amigable','$idesticonte','$tipo','$idcategoria','$idsubcategoria','$orden','$estado','$detalle_articulo','$imagen',
	  '$codigo_curso','$curso','$duracion','$inicioclases','$modalidad','$detalle_curso','$preciosoles','$preciosolesoferta','$mostrar')";
     $sqlInsertCat =mysql_query($ssql,$conexion) or die ("problema con query");	
?>
<script language='JavaScript'>    
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/index.php?option=com_articulos&mensaje=El Articulo ha sido Ingresada correctamente' 
</script> 
