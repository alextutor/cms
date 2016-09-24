<?php 
	echo "hola";exit;
	extract($_POST); 
	include_once ($_SERVER['DOCUMENT_ROOT']. '/config.php');		
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

$telefono = isset($telefono) ? $telefono:"";
$asunto = isset($asunto) ? $asunto:"";
$nombre = isset($nombre) ? $nombre:"";
$comentario = isset($comentario) ? $comentario:"";
$email = isset($email) ? $email:"";
$procedencia = isset($procedencia) ? $procedencia:"";
$cfechacorta=date("Y/m/d"); 

//echo $procedencia."-".$email."--".$subdominio;exit;
 $server_name = $camipage;  
 $person_name = $nombre;	
 //echo  $server_name."--".$person_name."-".$person_email;
 //echo $cabeceraemail."*------------";exit;
	//echo $cemacontacto;exit;
	//echo $cuentasinarroba;exit;
 $header = "MIME-Version: 1.0\n";  
 $header .= "Content-Type: text/html; charset=UTF-8\n";  
 $header .="From: ".$cabeceraemail ." <$cuentasinarroba@$server_name>\nReply-To: " .$cabeceraemail."   <$cuentasinarroba@$server_name>\nX-Mailer: PHP/";      
 //echo $header
 $mensaje_cli = "<table width='100%' border='0' align='center'><tr><td align='justify'>		   		   
		   <font face='verdana' size='2'>Hola $person_name,<br><br>  
		   su comentario es:<br/>" . $comentario . "<br/><br/>
	 Gracias Por su Consulta y/o Respuesta Estaremos analizandolo para su Aceptación.<br><br>   
	 Gracias por todo.<br><br>  
	  Sinceramente,<br><br><center> " . $ctitpage ."	 
	 <br> 
	 <a href='http://www.". $camipage."'>http://www.".$camipage." </a><br>  
	 Correo :&nbsp; " . $cemacontacto . "
	   </center>
	   </font>  
	 <br><br>";	 	 	 	 
    $mensaje_cli .= "</td></tr></table>";	

$cabeceras = 'From: info@cuartocontingente93.com' . "\r\n" .
    'Reply-To: info@cuartocontingente93.com' . "\r\n" .
    'X-Mailer: PHP/';

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From: Miguel Angel Alvarez <info@cuartocontingente93.com>\r\n"; 
//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: info@cuartocontingente93.com\r\n"; 
//ruta del mensaje desde origen a destino 
$headers .= "Return-path: info@cuartocontingente93.com\r\n"; 
	
	
 if(!mail("sisdatahost@hotmail.com", "Gracias Por su Consulta", "dasdsad",$headers))
  {	  
	 echo "<h1>No se pudo enviar el Mensaje intentalo otra vez </h1>";
	  exit();	  
   } 
   		 
if ($email != "") {  	  	  
	//$mensaje_cli .=$pie;
	if(!mail($email, "Gracias Por su Consulta", $mensaje_cli,$header))
    {
	    echo "<h1>No se pudo enviar el Mensaje intentalo otra vez </h1>";
	   exit();
     }	
} 
 if(!mail($cemacontacto, "Gracias Por su Consulta", $mensaje_cli,$header))
  {
	  echo "<h1>No se pudo enviar el Mensaje intentalo otra vez </h1>";
	  exit();	  
   }
  
   //echo $header;exit;     	
?>