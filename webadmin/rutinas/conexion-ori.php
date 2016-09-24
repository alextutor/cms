<script language="php">
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];   
	include_once ( $INC_DIR . '/include/configuration.php');
    //cuando quieras revisar el link
	if(isset($conexion)) {
	   // hay bd conectada	  
	} else {  // hacer conexion
		 $dbhost="localhost";  // host del MySQL (generalmente localhost)
		$dbusuario=CUSUARIO; // aqui debes ingresar el nombre de usuario
						  // para acceder a la base
		$dbpassword=CDBPASSWORD; // password de acceso para el usuario de la
						  // linea anterior			
						  
		$db=CBASEDEDATOS;        // Seleccionamos la base con la cual trabajar
		$conexion = mysql_connect($dbhost, $dbusuario, $dbpassword) or die("Could not connect to database!"); 
		mysql_select_db($db, $conexion) or die ('Could not select database porque :' . mysql_error());
	} 
</script>