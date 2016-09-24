<?php

define('SERVER_MYSQL', '25.73.219.210'); //hamachi
//define('SERVER_MYSQL', '25.38.25.129');
//define('SERVER_MYSQL', '190.187.143.24');
define('DATABASE',   'bd_rys_ninan');
define('BD_USUARIO', 'alex');
define('BD_CLAVE',   'inka');


$conexion = db_data(SERVER_MYSQL,BD_USUARIO,BD_CLAVE,DATABASE);

function db_data($server = DB_SERVER, $user = USER_DB, $password = PASSWORD_DB, $database = DATABASE, $link = 'link_db'){
	global $$link;
	$$link   = @mysql_connect($server, $user, $password);
	mysql_query("SET NAMES 'utf8'");
	mysql_set_charset('utf8',$$link);
	if (!$$link) 
	{ 
  	 	die('No se puedo conectar a la Base de Datos'); 
	} 
	if($$link) mysql_select_db($database);
	return $$link;
}
function db_query($queryeli, $link = 'link_db'){
	global $$link;
	//echo $queryeli;exit;
	$result = mysql_query($queryeli);
	return $result;
}
function db_fetch_array($query){
	return mysql_fetch_array($query);
}
function db_num_rows($query){
	return mysql_num_rows($query);
}
function db_insert_id(){
	// devuelve el identificador generado para un campo de tipo AUTO_INCREMENTED. Se devolverá el identificador generado por el último INSERT para el identificador_de_enlace. Si no se específica el identificador_de_enlace, se asume por defecto el último enlace abierto.
	return mysql_insert_id();
}
function db_close(){
	return mysql_close();	
}
?>