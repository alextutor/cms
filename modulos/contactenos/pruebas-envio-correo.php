<?php
 include_once ($_SERVER['DOCUMENT_ROOT']. '/include/funciones_web.php');	  
$to = "soporte@cuartocontingente93.com";
//$to = "sisdatahost@hotmail.com";
$subject = "Correo de prueba";
$mensaje_cli = "es solo un mensaje de prueba";
$from = "soporte@cuartocontingente93.com";

/*-----saca del email de contacto solo el correo sin el @*/
	$findme   = '@';
	$pos = strpos($cemacontacto, $findme);
	$cuentasinarroba = substr($cemacontacto,0,$pos);
	/*-----saca del email de contacto solo el correo sin el @*/
	
$server_name="cuartocontingente93.com";
$cabeceraemail="Cuarto contingente 93";

 $header = "MIME-Version: 1.0\n";  
	 $header .= "Content-Type: text/html; charset=UTF-8\n";  
	 $header .="From: ".$cabeceraemail ." <$cuentasinarroba@$server_name>\nReply-To: " .$cabeceraemail."   <$cuentasinarroba@$server_name>\nX-Mailer: PHP/";        
	 

if(!mail($to, "Gracias Por su Consulta", "hola",$header))
{
	echo "Correo no enviado";exit;
}else{
	echo "Correo  enviado";exit;	
};
exit;
?>