<?php

define('SERVER_MYSQL', '25.73.219.210'); //hamachi
//define('SERVER_MYSQL', '25.38.25.129');
//define('SERVER_MYSQL', '190.187.143.24');
define('DATABASE',   'bd_rys_ninan');
define('BD_USUARIO', 'alextutor');
define('BD_CLAVE',   'inka');

$dsn = "DRIVER={MySQL ODBC 5.1 Driver};SERVER=190.187.143.24;UID=root;PWD=alextutor;DATABASE=bd_rys_ninan;OPTIONS=131329;";

//debe ser de sistema no de usuario
$usuario = "";
$clave="";

//realizamos la conexion mediante odbc
$cid=odbc_connect($dsn, $BD_USUARIO, $BD_CLAVE);

if (!$cid){
	exit("<strong>Ya ocurrido un error tratando de conectarse con el origen de datos.</strong>");
}	

// consulta SQL a nuestra tabla "usuarios" que se encuentra en la base de datos "db.mdb"
$sql="Select * from usuarios";

// generamos la tabla mediante odbc_result_all(); utilizando borde 1
$result=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
print odbc_result_all($result,"border=1");

?>