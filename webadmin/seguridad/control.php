<?php $INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/header.php');
	include($_SERVER['DOCUMENT_ROOT']. '/webadmin/rutinas/conexion.php');	
$usuario=trim($_POST["username"]);
$contrasena=trim($_POST["passwd"]);
//$contrasena = md5($contrasena);
//Sentencia SQL para buscar un usuario con esos datos 
$ssql = "SELECT * FROM usuarios WHERE nick='$usuario' and password='$contrasena' and eliminado<>'SI'"; 
//Ejecuto la sentencia 
$rs = mysql_query($ssql,$conexion); 
$row = mysql_fetch_array($rs);

if (mysql_num_rows($rs)!=0){ 
    //usuario y contraseña válidos 
    //defino una sesion y guardo datos 	
    session_start(); 
    //session_register("permitido"); 
	$_SESSION['permitido']="SI";
	$_SESSION['nick']=$row["nick"] ;
	$_SESSION['id_cliente']='' ;
	$_SESSION['alias']='' ;						
    $permitido = "SI";     
	//echo $_SESSION['permitido'];
?>	
<script language='JavaScript'> 
    ROOT_PATH = "<?=$ROOT_PATH.'/webadmin/'?>";
    location.href= ROOT_PATH + 'index.php?option=pantallaprincipal' 
</script> 
<?php
}else { 
?>
<script language='JavaScript'> 
    ROOT_PATH = "<?=$ROOT_PATH.'/webadmin'?>";
    location.href= ROOT_PATH + '/index.php?errorusuario=si'
</script> 
<?php	
} 
?>