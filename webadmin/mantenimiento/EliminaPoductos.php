<?php		
	$Title = "";
	$Description = "";
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/header.php'); 	
?>
 <?php   include($_SERVER['DOCUMENT_ROOT']. '/config.php');	 ?>
 <?php
 $Registro=$_GET['Registro'];  
 $idcategoria=$_GET['idcategoria'];
 $idsudcategoria=$_GET['idsudcategoria'];  
 $page=$_GET['page'];  
 $Filtro_en_oferta=$_GET['Filtro_en_oferta'];   
//Creamos la sentencia SQL y la ejecutamos
//$sSQL="Delete From productos  Where idproductos ='$Registro'";
//lo cambie por si las dudas el usuario como no sabe vaya a  borrar y la cancion
$sSQL = "UPDATE productos SET borrado='1' WHERE idproductos='$Registro'" ;   
	mysql_query($sSQL);
   include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 
?>
<script language='JavaScript'> 
    idcategoria = "<?=$idcategoria?>";
	idsudcategoria = "<?=$idsudcategoria?>";
	Filtro_en_oferta= "<?=$Filtro_en_oferta?>";
	page= "<?=$page?>";	
	ROOT_PATH = "<?=$ROOT_PATH?>";
    location.href= ROOT_PATH+'/webadmin/mantenimiento/contenedor_man_produ_admi.php?mensaje=Registro Eliminado' + '&idcategoria='	+idcategoria +  '&page='+ page + '&idsudcategoria='	+idsudcategoria + '&Filtro_en_oferta='	+Filtro_en_oferta 
</script>
</head>
<body>
</body>
</html>
