<?php 
	//http://www.forosdelweb.com/f18/faqs-php-530600/index3.html#post518710
	//$paginacion=$_POST['paginacion'];		
	 include_once($_SERVER['DOCUMENT_ROOT'].'/seguridad/seguridad.php');
	 include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/conexioninfodisfap.php'); 
	// Generamos una lista de los ID's (campo value= ..) que tenemos en nuestro array y lo separamos por coma ',' apellido,email,telefono 
	$lista=implode(',',$_POST['seleccion']); 
	//echo $lista;
	// Y lo aplicamos al SQL correspondiente y ejecutamos la consulta. 
	mysql_query("DELETE FROM doctorresponde WHERE id IN(".$lista.")"); 	
?> 
<script language="javascript">
    location.href = 'mantDoctor-Responde-Admi.php?mensaje=Registro Eliminado';
</SCRIPT>