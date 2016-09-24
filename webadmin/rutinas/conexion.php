<?php
/////////////////////////////////
//http://blog.timersys.com/   //
///////////////////////////////
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];   
	include_once ( $INC_DIR . '/webadmin/include/configuration.php');
		
	$GLOBALS['DB_IP'] = 'localhost';
	$GLOBALS['DB_USER'] = CUSUARIO;
	$GLOBALS['DB_PASS'] = CDBPASSWORD;
	$GLOBALS['DB_NAME'] = CBASEDEDATOS;
	$GLOBALS['DB_TBL'] = DB_TBL;

if(isset($conexion)) {
	   // hay bd conectada	  
	} else {  // hacer conexion
		$conexion = mysql_connect($GLOBALS['DB_IP'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);
		mysql_select_db($GLOBALS['DB_NAME'], $conexion);
} 		
if (!$conexion) {
echo "No pudo conectarse a la BD: " . mysql_error();
exit;
}
//PARA PROTEGER SQL INJECT

if (!function_exists('cleanQuery')) { 
	function cleanQuery($string)
	{
	if(get_magic_quotes_gpc())  // prevents duplicate backslashes
	{
	$string = stripslashes($string);
	}
	if (phpversion() >= '4.3.0'){
	$string = mysql_real_escape_string($string);
	}else{
	$string = mysql_escape_string($string);
	}
	return $string;
	}
}
?>