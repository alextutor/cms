<?php 

/*
 * $Id: jFileBrowser, 2010.
 * @author Juaniquillo
 * @copyright Copyright © 2010, Victor Sanchez (Juaniquillo).
 * @email juaniquillo@gmail.com
 * @website http://juaniquillo.com
*/

//alex lo agregue para que se enlace con mi conexion config.php
include($_SERVER['DOCUMENT_ROOT']. '/config.php');	

// alex esto lo desabilite para implementar abajo
/*$sql_host = 'localhost';
/////informacion MySQL
$sql_db = "gamatell_general";
$sql_user = "gamatell";
$sql_password = "0403221757";*/

//Funciones
include('funciones.inc.php');
//PHPPaging
include('PHPPaging.lib.php');

// alex estolo desabilite para implementar abajo 
//Conexion
/*$conexion_gal = db_connect($sql_host, $sql_user, $sql_password) or die('No se puede conectar a la base de datos');
db_select_db($sql_db, $conexion_gal);
*/
$conexion_gal = db_connect(SERVER_MYSQL, BD_USUARIO, BD_CLAVE) or die('No se puede conectar a la base de datos');
db_select_db(DATABASE, $conexion_gal);

?>