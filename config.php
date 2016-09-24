<?php
define("VAR_NROITEMS",30);
define("fechahoy",date("d-m-Y"));
$llavesita="revolucionario che guevara"; 


define('SERVER_MYSQL', 'localhost');
define('DATABASE',   'bdfpdies_elperu');
define('BD_USUARIO', 'bdfpdies_elperu');
define('BD_CLAVE',   'huahuala05');

/*define('SERVER_MYSQL', 'localhost');
define('DATABASE',   'cisantia_productos');
define('BD_USUARIO', 'cisantia');
define('BD_CLAVE',   'huizaquispe01');*/

// ---------- Inicio para  assetmanager
//$_SESSION['RUTASERVIDOR']= '/home/geoenter/public_html/';
//$_SESSION['RUTASERVIDOR']= 'D:/Alex/Web/xampp/htdocs/desarrollo.com/';
$_SESSION['RUTASERVIDOR']= $_SERVER['DOCUMENT_ROOT']. "/";
$_SESSION['selectpage']="12172812";
// ---------- Fin  para  assetmanager

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