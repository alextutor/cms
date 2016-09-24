<?php   

 include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/conexioninfodisfap.php');  
 $Registro=$_GET['Registro'];  
 $paginacion=$_GET['paginacion']; 
 $email=$_GET['email'];
  $nombre=$_GET['persona'];  
  
$resultcate=mysql_query("SELECT * FROM doctorresponde WHERE id=".$Registro, $conexion);    
while ($row = mysql_fetch_array($resultcate)) 			
{ 						          
   $comentario= $row["comentario"] ;
} 
mysql_free_result($resultcate); 	                    
                
                
  
  
//Creamos la sentencia SQL y la ejecutamos
	$result = mysql_query("Delete from doctorresponde  WHERE id=".$Registro) ;

	
	//------------------------------------------------INICIO  Envio Correo ---------------------------
 if ($email != "") {  // -------inicio Si 3 
	 # Indicamos la dirección (nombre) del servidor  
	 $server_name = "infodisfap.com";  
	 # Indicamos el nombre de la persona que va a recibir el                        mensaje  
	 $person_name = $nombre;  
	 # Indicamos la dirección de correo de esa persona  
	 $person_email =$email ; //"destinatario@servidor.net";  
	 # Las tres líneas que vienen a continuación son necesarias  
	 # para que la cabecera del mensaje esté en formato HTML  
	 $header = "MIME-Version: 1.0\n";  
	 $header .= "Content-Type: text/html; charset=iso-8859-1\n";  
	 //$header .="From: infodisfap@$server_name\nReply-To:                        webmaster@$server_name\nX-Mailer: PHP/";  
	 //$header .="From: Informacion Personal Discapacitado FFAA\nReply-To: infodisfap@$server_name\nX-Mailer: PHP/";  
	 $header .="From:  infodisfap@$server_name\nReply-To: infodisfap@$server_name\nX-Mailer: PHP/";  
	 # Esto que viene es el mensaje. (Fíjate en los tags HTML)  
	 
	 $mensaje = "
	     <table width='45%' border='0' align='center'>
         <tr>
           <td><a href='http://www.infodisfap.com/'><img src='http://www.infodisfap.com/imagen/logoInfodisfap.png' width='692' height='91' /></a></td>
         </tr>
         <tr>
           <td  align='center' class='textoprincipal'><a href='http://www.infodisfap.com/'><img src='http://www.infodisfap.com/imagen/botonera-imagen.jpg' alt='' width='613' height='109' /></a></td>
         </tr>
         <tr>
           <td align='justify'>		   
		   
		   <font face='verdana' size='2'>Hola $person_name,<br><br>  
	 Gracias Por su Consulta y/o Respuesta ha sido Analizada y Fue ELIMINADA.<br><br>   
	 Gracias por todo.<br><br>  
	 Sinceramente,<br><br><center>  
	 INFODISFAP<br> Informacion para el Personal Discapacitado de las Fuerzas Armadas y Policia Nacional del Peru 
	 <br> 
	 <a href='http://www.infodisfap.com'>http://www.infodisfap.com</a><br>  
	 Correo MSN: <br>  infodisfap@infodisfap.com 
	   </center>
	   </font>  
	 <br><br>";	 	 
	  $mensaje .= "Comentario: <br>  <br> $comentario\n";
	 $mensaje .="<br><br> </td>		    
         </tr>
         <tr>
           <td align='left'><p>&nbsp;</p></td>
         </tr>
         <tr>
           <td><a href='http://www.infodisfap.com/'><img src='http://www.infodisfap.com/imagen/pie.jpg' alt='' width='692' height='174' /></a></td>
         </tr>
         <tr>
           <td><div align='center'><a href='../www.infodisfap.com'>www.infodisfap.com</a></div></td>
         </tr>
    </table>
	
	
	 
	 ";  
	# Función de envío del mensaje  
	 mail("$person_email","Gracias Por su Consulta y/o Respuesta - ELIMINADA","$mensaje","$header");  
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
    location.href = 'mantDoctor-Responde-Admi.php?mensaje=Registro Eliminado&paginacion='+ <?php echo  $paginacion ?> ;
</SCRIPT>