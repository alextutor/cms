<?php session_start(); 
include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');
 //-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
 //-------	 
 extract($_POST);
 
 /******************* Inicio Es comun con Contactos ***************************************************/
 include_once ($_SERVER['DOCUMENT_ROOT']. '/include/funciones_web.php');	  
		
 	$domain       = $_SERVER['HTTP_HOST']; /*www.sisdatahost.com*/
	$domain_parts = explode('.',$domain);
	$nropartes = count($domain_parts);
	if ($nropartes == 2 )
	{ 
		$subdominio = $domain_parts[0].".".$domain_parts[1]; 
	}
	if ($nropartes == 3 )
	{
		if ($domain_parts[0]=="www")
			$subdominio = $domain_parts[1].".".$domain_parts[2];
		else	
			$subdominio = $domain_parts[0].".".$domain_parts[1].".".$domain_parts[2];
	}
	if ($nropartes == 4 )
	{
		if ($domain_parts[0]=="www")
			$subdominio = $domain_parts[1].".".$domain_parts[2].".".$domain_parts[3];
		else
			$subdominio = $domain_parts[0].".".$domain_parts[1].".".$domain_parts[2].".".$domain_parts[3];
	}
	
	$sqlpagew  = db_query("SELECT * FROM  page WHERE camipage='".$subdominio."' and cestpage ='1'");
	$nrosub    = db_num_rows($sqlpagew);
if ( $nrosub >0 )
{
	$rowpageweb  = db_fetch_array($sqlpagew);
	$camipage     = $rowpageweb['camipage'];
	$cabeceraemail= $rowpageweb['cnompage'];
	$cemacontacto= $rowpageweb['cemacontacto'];	
	$ctitpage= $rowpageweb['ctitpage'];			
	$cnompage= $rowpageweb['cnompage'];	
	
	/*-----saca del email de contacto solo el correo sin el @*/
	$findme   = '@';
	$pos = strpos($cemacontacto, $findme);
	$cuentasinarroba = substr($cemacontacto,0,$pos);
	/*-----saca del email de contacto solo el correo sin el @*/

}
/******************* Fin Es comun con Contactos ***************************************************/


$cEncontrado='false';
$sqlemail="select nick,nombre,AES_DECRYPT(password,'$llavesita') as password,email from usuarios where UPPER(email)='".strtoupper($email)."'"; 
$rsEmail=mysql_query($sqlemail) or die (mysql_error()); 
//$nTotalrsEmail=1;
$nTotalrsEmail=mysql_num_rows($rsEmail);
if ($nTotalrsEmail > 0) 
	{ 
	while ($row = mysql_fetch_array($rsEmail)) 			
	{ 						          
   		$alias= $row["nick"] ;
		$nombre= $row["nombre"] ;
		$email= $row["email"] ;
		$contrasena= $row["password"] ;		
	} 
	$cEncontrado='true';
}

$sqlalias="select  nick,nombre,AES_DECRYPT(password,'$llavesita') as password,email from usuarios where UPPER(nick)='".strtoupper($email)."'"; 
$rsAlias=mysql_query($sqlalias) or die (mysql_error()); 
if (mysql_num_rows($rsAlias)>0 and $nTotalrsEmail==0) 
	{ 
	while ($row = mysql_fetch_array($rsAlias)) 			
	{ 						          
   		$alias= $row["nick"] ;
		$nombre= $row["nombre"] ;
		$email= $row["email"] ;
		$contrasena= $row["password"] ;
	} 
	
	$cEncontrado='true';
}
//echo $nTotalrsEmail;
//echo mysql_num_rows($rsAlias);
mysql_free_result($rsEmail);	
mysql_free_result($rsAlias);	

if ($cEncontrado=='true') 
{ 		
		
 	 $server_name = $camipage;  
	 $person_name = $nombre;	
	 //echo  $server_name."--".$person_name."-".$email;
	 //echo $cabeceraemail."*------------";exit;

	 $header = "MIME-Version: 1.0\n";  
	 $header .= "Content-Type: text/html; charset=UTF-8\n";  
	 $header .="From: ".$cabeceraemail ." <$cuentasinarroba@$server_name>\nReply-To: " .$cabeceraemail."   <$cuentasinarroba@$server_name>\nX-Mailer: PHP/ \n";     	
	  $header .= 'Bcc: sisdatahost@hotmail.com,' .$cemacontacto. " \r\n";	   
	 //echo  $header;exit;
	  $mensaje_cli .= "<table width='100%' border='0' align='center'><tr><td align='justify'>		   		   
		   <font face='verdana' size='2'>Hola $person_name,<br><br>  
		 Se ha enviado este mensaje porque se ha aplicado la función 'contraseña olvidada' en tu cuenta.<br><br> 
			 El nombre de usuario de tu cuenta es :<strong><font color='#FF0000'>$alias</font></strong><br><br>
			 Siendo tu contraseña :<strong><font color='#FF0000'>$contrasena</font></strong><br><br>
			 Siendo tu Email :<strong><font color='#FF0000'>$email</font></strong><br><br>
			 Gracias por todo.<br><br>  
	  Sinceramente,<br><br><center> " . $ctitpage ."	 
	 <br> 
	 <a href='http://www.". $camipage."'>http://www.".$camipage." </a><br>  
	 Correo :&nbsp; " . $cemacontacto . "
	   </center>
	   </font>  
	 <br><br>";	 	 	 	 
    $mensaje_cli .= "</td></tr></table>";	
	$mensaje_cli .=$pie;
	//echo  $mensaje_cli ;exit;
	/*---Programar para insertar tabla contrasena olvidadda falta crearla------*/
	/*$ssql ="insert into contactenos(nombre,email,asunto,comentario,telefono,fecha,procedencia) 
	values('$nombre','$email','$asunto','$comentario','$telefono','$cfecha','$procedencia')";
    mysql_query($ssql) or die ("problema con query");*/
   /*----Fin Contactenos ------*/
	//echo $email;exit;
	$subject = utf8_decode('Recordatorio de su Contraseña');
	if(!mail($email, $subject , $mensaje_cli,$header))
    {
	   // echo "<h1>No se pudo enviar el Mensaje intentalo otra vez </h1>";
	   // exit();
     }		


	
	?>
	<script language="javascript">
		location.href = "/recordar-contrasena";
		//window.opener.location.reload(); window.close();
	  </SCRIPT>
	  
	<?php  
	 $_SESSION['errorusuario']="NO";
}else{
	$_SESSION['errorusuario']="SI";
	?> 
 	<script language="javascript">
		location.href = "/recordar-contrasena";
  </SCRIPT>
<?php } ?> 
