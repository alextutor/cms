<?php		
	$Title = "";
	$Description = "";
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/header.php'); 	
?>
<?php   include($_SERVER['DOCUMENT_ROOT']. '/config.php');	 ?>
<?php
 $Registro=$_GET['Registro'];  
//Creamos la sentencia SQL y la ejecutamos
//$sSQL="Delete From productos  Where idproductos ='$Registro'";
//lo cambie por si las dudas el usuario como no sabe vaya a  borrar y la cancion
$sSQL = "UPDATE subcategoria SET borrado='1' WHERE idsubcategoria='$Registro'" ;   
	mysql_query($sSQL);
   include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 
?>
<script language='JavaScript'> 
	ROOT_PATH = "<?=$ROOT_PATH?>";
    location.href= ROOT_PATH+'/webadmin/mantenimiento/mantSub_CategoriaAdmi.php?mensaje=Registro Eliminado'
</script>
</head>
<body>
</body>
</html>
