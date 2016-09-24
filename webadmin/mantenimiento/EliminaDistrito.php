<?php   include($_SERVER['DOCUMENT_ROOT']. '/config.php');	 ?>
<?php		
	$Title = "";
	$Description = "";
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/header.php'); 	
?>
<?
 $Registro=$_GET['Registro'];  
 $page=$_GET['page'];   
//Creamos la sentencia SQL y la ejecutamos
//$sSQL="Delete From productos  Where idproductos ='$Registro'";
//lo cambie por si las dudas el usuario como no sabe vaya a  borrar y la cancion
$sSQL = "UPDATE distrito SET borrado='1' WHERE id_distrito='$Registro'" ;   
	mysql_query($sSQL);
   include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 
?>
<script language='JavaScript'> 
    page= "<?=$NOMBREEMPRESA?>"; 
	ROOT_PATH = "<?=$ROOT_PATH?>";
    location.href= ROOT_PATH+'/webadmin/mantenimiento/mantDistrito.php?mensaje=Registro Eliminado' +  '&page='+ page  
</script>
</head>
<body>
</body>
</html>
