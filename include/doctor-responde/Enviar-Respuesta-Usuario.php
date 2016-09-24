<?php   
 include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/conexioninfodisfap.php');  
  include_once($_SERVER['DOCUMENT_ROOT'].'/variables.php');  
 $Registro=$_GET['Registro'];  
 $paginacion=$_GET['paginacion']; 
 $email=$_GET['email'];
 $nombre=$_GET['persona'];  
 $parent_id=$_GET['parent_id'];  
 
  //Creamos la sentencia SQL y la ejecutamos
 $result = mysql_query("UPDATE doctorresponde SET respuestaenviada=1 WHERE id=".$Registro) ; 
 
  
$resultcate=mysql_query("SELECT * FROM doctorresponde WHERE id=".$Registro, $conexion);    
while ($row = mysql_fetch_array($resultcate)) 			
{ 						          
   $comentario= $row["comentario"] ;
   $fechalarga= $row["fechalarga"] ;
} 

//------------------------------------------
$rsPregUsuario=mysql_query("SELECT * FROM doctorresponde WHERE id=".$parent_id, $conexion);    
while ($rowPregUsuario = mysql_fetch_array($rsPregUsuario)) 			
{ 						          
   $ComenPregUsuario= $rowPregUsuario["comentario"] ;
   $NombrePregUsuario= $rowPregUsuario["nombre"] ;
   $EmailPregUsuario= $rowPregUsuario["email"] ;
   $fechalargaPregUsuario= $rowPregUsuario["fechalarga"] ;
} 
mysql_free_result($rsPregUsuario); 
mysql_free_result($resultcate); 

//------------------------------------------


//------------------------------------------------INICIO  Envio Correo ---------------------------
 if ($email != "") {  // -------inicio Si 3 
	 # Indicamos la dirección (nombre) del servidor  
	 $server_name = "infodisfap.com";  
	 # Indicamos el nombre de la persona que va a recibir el                        mensaje  
	 $person_name = $NombrePregUsuario;  
	 # Indicamos la dirección de correo de esa persona  
	 $person_email =$EmailPregUsuario ; //"destinatario@servidor.net";  
	 # Las tres líneas que vienen a continuación son necesarias  
	 # para que la cabecera del mensaje esté en formato HTML  
	 $header = "MIME-Version: 1.0\n";  
	 $header .= "Content-Type: text/html; charset=iso-8859-1\n";  
	 //$header .="From: infodisfap@$server_name\nReply-To:                        webmaster@$server_name\nX-Mailer: PHP/";  
	 //$header .="From: Informacion Personal Discapacitado FFAA\nReply-To: infodisfap@$server_name\nX-Mailer: PHP/";  
	 $header .="From:  infodisfap@$server_name\nReply-To: infodisfap@$server_name\nX-Mailer: PHP/";  
	 # Esto que viene es el mensaje. (Fíjate en los tags HTML)  
	 // ----------------   Inicio Logo Infodisfap
			 $mensaje = $LogoInfodisfap ;	  
		 // ----------------   Fin Logo Infodisfap 		  
	
		 // ----------------   Inicio Objetivo Infodisfap
		 $mensaje .= $ObjetivoInfodisfap ;	  
 		  // ----------------   Fin Objetivo Infodisfap 	
		  
	 $mensaje .="<table width='100%' border='0' align='center'>
		  <tr><td align='justify'>		  	   
		   <font face='verdana' size='2'>Hola <strong>$person_name </strong>,<br><br>  
	 Gracias Por su Consulta y/o Respuesta Ya Fue Contestada.<br><br>   	 
	 Gracias por todo.<br><br>  
	 Sinceramente,<br><br>";
	   $mensaje .= "<strong>Pregunta:</strong> <br> <br> $ComenPregUsuario\n <br><br>";
	   $mensaje .= "<strong>Fecha :  </strong>   $fechalargaPregUsuario  <br><br><br><br>";
	   
	  $mensaje .= "<strong>Respondido por :     $nombre     </strong> <br><br> $comentario\n <br><br>";
	  $mensaje .= "<strong>Fecha :  </strong>   $fechalarga  <br><br>";
	  
	  $mensaje .=" <center>  
	 INFODISFAP<br> Informacion para el Personal Discapacitado de las Fuerzas Armadas y Policia Nacional del Peru 
	 <br> 
	 <a href='http://www.infodisfap.com'>http://www.infodisfap.com</a><br>  
	 Correo MSN: <br>  infodisfap@infodisfap.com 
	   </center>
	   </font>  
	 <br><br>";	
	   $mensaje .= "</td></tr></table>"; 	 
	  
	   // ----------------   Inicio de Asociaciones Brindan Apoyo Personal Discapacitado 
		$mensaje .=$Asociaciones;
    // ----------------   Fin de Asociaciones Brindan Apoyo Personal Discapacitado 
	 
	 // ----------------   Inicio de Pie
		$mensaje .=$pie;
    // ----------------   Fin de pie
	
	
	# Función de envío del mensaje  
	 mail("$person_email","Gracias - Su Consulta fue Respondida","$mensaje","$header");  
	 // -----------Persona que envia
	 mail("$email","Gracias - Ya fue enviada su Respuesta","$mensaje","$header");	 
    mail("infodifap@infodisfap.com","Gracias - Su Consulta fue Respondida","$mensaje","$header");  
	 # Ten en cuenta que:  
	 # $person_email es la dirección de correo de la persona                        que recibe el mensaje  
	 # "Recomendación" es el Asunto del mensaje  
	 # $mensaje es todo el texto del mensaje  
	 # $header es la cabecera. En ella va incluida la dirección                        de remite.  
	 # Para comprobar que el script ha funcionado, podemos                        poner lo siguiente:  
	// echo "Mensaje enviado.";  
	// ------------------------------------------------FIN Envio Correo ---------------------------
}   // -------Fin Si 3 
	include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php');	
?>
<script language="javascript">
    location.href = 'mantDoctor-Responde-Admi.php?mensaje=Respuesta Enviada&paginacion='+ <?php echo  $paginacion ?> ;
</SCRIPT>