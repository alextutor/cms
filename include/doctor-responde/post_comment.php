 <?php 
 include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/conexioninfodisfap.php'); 
  include_once($_SERVER['DOCUMENT_ROOT'].'/variables.php');  
   $id_cliente=$_POST['id_cliente'];     
   $nombre=$_POST['nombre'];    
   $telefono=$_POST['telefono'];    
   $email=$_POST['email'];    
   $titulo=$_POST['titulo'];    
   $comentario=$_POST['comentario'];         
   $id_noticia=$_POST['id_noticia'];      
   $idcate=$_POST['idcate'];        
   $idsubcate=$_POST['idsubcate'];  
   $idSubSubcate=$_POST['idSubSubcate'];     
   
   $procedencia =$_POST['procedencia'];    
   $imagenfoto ="http://www.infodisfap.com/comentario_real/logocomentario.gif";     
   $parent_id = $_POST['parent_id'];    
   $PaginaDestino= $_POST['PaginaDestino']; 
   
//-----------INICIO Para Evitar Que mande en url anunciando su pagina SPAM-----------------------
//http://sumolari.com/detectar-un-caracter-con-php/
//strrpos nos devuelve el valor del lugar que ocupa la cadena de texto especificada  en caso de que ésta exista, o false en caso de que no esté.
//strrpos necesita dos cadenas de texto para funcionar: La cadena de texto donde buscará y los caracteres que debe buscar.
//strrpos('cadena donde buscar', 'caracteres a buscar');

$posicion = strrpos($comentario, "http://");
if ($posicion === false) {
	//---				 
			   //---------------------Inicio Para Fecha----------------------------------------------------
			   // Obtenemos y traducimos el nombre del día
			$dia=date("l");
			if ($dia=="Monday") $dia="Lunes";
			if ($dia=="Tuesday") $dia="Martes";
			if ($dia=="Wednesday") $dia="Miércoles";
			if ($dia=="Thursday") $dia="Jueves";
			if ($dia=="Friday") $dia="Viernes";
			if ($dia=="Saturday") $dia="Sabado";
			if ($dia=="Sunday") $dia="Domingo";
			
			// Obtenemos el número del día
			$dia2=date("d");
			
			// Obtenemos y traducimos el nombre del mes
			$mes=date("F");
			if ($mes=="January") $mes="Enero";
			if ($mes=="February") $mes="Febrero";
			if ($mes=="March") $mes="Marzo";
			if ($mes=="April") $mes="Abril";
			if ($mes=="May") $mes="Mayo";
			if ($mes=="June") $mes="Junio";
			if ($mes=="July") $mes="Julio";
			if ($mes=="August") $mes="Agosto";
			if ($mes=="September") $mes="Setiembre";
			if ($mes=="October") $mes="Octubre";
			if ($mes=="November") $mes="Noviembre";
			if ($mes=="December") $mes="Diciembre";
			// Obtenemos el año
			$ano=date("Y");
			$hora=date ( "h:i:s A") ;
			// Imprimimos la fecha completa
			//echo "$dia $dia2 de $mes de $ano";
			$cfechalarga=   "$dia $dia2 de $mes de $ano Hora: $hora" ;
			$cfechacorta=date("Y/m/d"); 
			 //----------------Fin Para Fecha---------------------------------------------------
				
			   //$_POST['$nombre']
			   // $persona=$_POST['$persona'];    
				//Generamos la ssql e insertamos el registro
				$ssql ="insert into doctorresponde (id_cliente,nombre,email,titulo,comentario,fechacorta,fechalarga,id_noticia,imagenfoto,parent_id,mostrarportada,idcate,idsubcate,idSubSubcate,procedencia,telefono) values('$id_cliente' ,'$nombre','$email','$titulo','$comentario','$cfechacorta','$cfechalarga','$id_noticia','$imagenfoto','$parent_id','0','$idcate','$idsubcate','$idSubSubcate','$procedencia','$telefono')";
			
			mysql_query($ssql,$conexion) or die ("problema con query");
			
			//	include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 
			   //header ("Location: EnvioCorreo.php");
			   
} //-----------FIN Para Evitar Que mande en url anunciando su pagina SPAM-----------------------	


//------------------------------------------------INICIO  Envio Correo  al usuario ---------------------------
 if (trim($email) != "") {  // -------inicio Si 3 
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
	 
	 	 // ----------------   Inicio Logo Infodisfap
			 $mensaje = $LogoInfodisfap ;	  
	// ----------------   Fin Logo Infodisfap 		   

		// ----------------   Inicio Objetivo Infodisfap
		 $mensaje .= $ObjetivoInfodisfap ;	  
 		  // ----------------   Fin Objetivo Infodisfap 	    
		          $mensaje .="<table width='100%' border='0' align='center'>
		  <tr><td align='justify'>	  		      
		   <font face='verdana' size='2'>Hola <strong> $person_name </strong>,<br><br>  
	 Gracias su Mensaje a sido Recepcionado Lo estamos analizando para su pronta publicacion.<br><br>";
	 $mensaje  .= "<strong>Nombre: </strong>$nombre\n <br> <br>";
	$mensaje .= "<strong>Email: </strong>$email\n <br> <br>";
	$mensaje .= "<strong>Comentario:</strong> $comentario\n  <br><br>";	
	$mensaje .= "<strong>Fecha: </strong> $cfechalarga \n <br><br>";
   $mensaje .="Gracias por todo.<br><br>  
	 Sinceramente,<br><br><center>  
	 INFODISFAP<br> Informacion para el Personal Discapacitado de las Fuerzas Armadas y Policia Nacional del Peru 
	 <br> 
	 <a href='http://www.infodisfap.com'>http://www.infodisfap.com</a><br>  
	 Correo MSN: <br>  infodisfap@infodisfap.com 
	   </center>
	   </font>  
	 <br><br>" ;
	 $mensaje .= "</td></tr></table><br>";
	 
	 // ----------------   Inicio de Asociaciones Brindan Apoyo Personal Discapacitado 
		$mensaje .=$Asociaciones;
    // ----------------   Fin de Asociaciones Brindan Apoyo Personal Discapacitado 
	
	  // ----------------   Inicio de Pie
		$mensaje .=$pie;
    // ----------------   Fin de pie  
		   
		   
	# Función de envío del mensaje 
	if(mail("$person_email","Gracias su Mensaje a sido Recepcionado Analizando para su pronta publicacion" ,"$mensaje","$header"))  
			{
				mail("infodisfap@infodisfap.com","Se Envio Correctamente Consulta Doctor Responde -  $procedencia ","$mensaje","$header");  		
			}
			else
			{
				mail("infodisfap@infodisfap.com","El Envio Tuvo Problemas Consulta Doctor Responde -  $procedencia ","$mensaje","$header");  	
			}			 
	
	 # Ten en cuenta que:  
	 # $person_email es la dirección de correo de la persona                        que recibe el mensaje  
	 # "Recomendación" es el Asunto del mensaje  
	 # $mensaje es todo el texto del mensaje  
	 # $header es la cabecera. En ella va incluida la dirección                        de remite.  
	 # Para comprobar que el script ha funcionado, podemos                        poner lo siguiente:  
	// echo "Mensaje enviado.";  
	// ------------------------------------------------FIN Envio Correo ---------------------------
}   // -------Fin Si 3 



?>

<script language="javascript"> 
<?php
   // $paginaatras=$_SERVER["HTTP_REFERER"];
	//echo "location.href = '$paginaatras' ";
	$mensaje="Gracias su Mensaje a sido Recepcionado Lo estamos analizando para su pronta publicacion";		
	//echo "location.href = 'http://www.infodisfap.com/principal.php?pagina=doctor-responde/index&mensaje=$mensaje'";	
	echo "location.href = 'http://www.infodisfap.com/principal.php?pagina=$PaginaDestino&mensaje=$mensaje'" ;		
?> 
</SCRIPT>