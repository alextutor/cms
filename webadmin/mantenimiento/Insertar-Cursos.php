<?Php 
$Title = "";
$Description = "";
$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/webadmin/header.php');
?>
<?php								
	 extract($_POST);
     $inicioclases_curso=date("Y-m-d",strtotime($inicioclases_curso));
	 $ccodpage="12172809";
	 include($_SERVER['DOCUMENT_ROOT']. '/config.php');		 	   	   
	    $ssql ="INSERT INTO cursos (ccodpage,codigo_curso,curso,duracion_curso,inicioclases_curso,modalidad_curso,detalle_curso,preciosoles,preciosolesoferta,estado,orden,imagen)
	   VALUES ('$ccodpage','$codigo_curso','$curso','$duracion_curso','$inicioclases_curso','$modalidad_curso','$detalle_curso',
	  '$preciosoles','$preciosolesoferta','$estado','$orden','$imagen')";
	  
     $sqlInsertCat =mysql_query($ssql,$conexion) or die ("problema con query");	
?>
<script language='JavaScript'>    
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/index.php?option=com_cursos&mensaje=El Curso ha sido Ingresada correctamente' 
</script> 
