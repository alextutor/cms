<?php 	session_start();
include_once ($_SERVER['DOCUMENT_ROOT']. '/config.php');	
/*$email=$_POST['email'];  
$alias=$_POST['email'];  
$contrasena=$_POST['contrasena']; */
extract($_POST); 
$nick=$_POST['nick']; 
$password=$_POST['password'];  

$ssql = "SELECT * FROM usuarios WHERE (LOWER(nick)='".strtolower($nick)."' or LOWER(email)='".strtolower($nick)."') and AES_DECRYPT(password,'$llavesita')='" .$password."'"; 

//Ejecuto la sentencia 
$rs = mysql_query($ssql); 
$num_total_registros = mysql_num_rows($rs);
$rowUsuario=mysql_fetch_array($rs);   
 if ($num_total_registros!=0){ 
	  $_SESSION['id_usu_web']=$rowUsuario['id_usuario']; 
	  $_SESSION['nombre_usu_web']=$rowUsuario['nick'];
  	  $_SESSION['email_usu_web']=$rowUsuario['email'];
	  $_SESSION['errorusuario']="NO"; 		     
	//$variable="seguridad_cliente/registro-creado&tipoacceso=ingreso&id_cliente=".$rsCliente["id_cliente"] ;
    //header("Location: http://www.infodisfap.com/principal.php?pagina=". $variable );	
	//header("Location: /index.php");	
	header("Location: /configuracion");	
}else { 
  $_SESSION['errorusuario']="SI";
   header("Location: /iniciarsesion"); 
    }   
?>