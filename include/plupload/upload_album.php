<?php session_start();
/**
 * upload.php
 *
 * Copyright 2013, Moxiecode Systems AB
 * Released under GPL License.
 *
 * License: http://www.plupload.com/license
 * Contributing: http://www.plupload.com/contributing
 */

#!! IMPORTANT: 
#!! this file is just an example, it doesn't incorporate any security checks and 
#!! is not recommended to be used in production environment as it is. Be sure to 
#!! revise it and customize to your needs.


// Make sure file is not cached (as it happens for example on iOS devices)
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
/* 
// Support CORS
header("Access-Control-Allow-Origin: *");
// other CORS headers if any...
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	exit; // finish preflight CORS requests here
}
*/

// 5 minutes execution time
@set_time_limit(5 * 60);

// Uncomment this one to fake upload time
// usleep(5000);

// Settings
//$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
?>
	
<?php
	
	
$alexruta='/imagen/foto-contenido/';
$targetDir = $_SERVER['DOCUMENT_ROOT'].$alexruta; //aqui sube los archivos si no existe carpeta lo crea
$cleanupTargetDir = true; // Remove old files
$maxFileAge = 5 * 3600; // Temp file age in seconds

$name1 = $_REQUEST["name1"];

// Create target dir
if (!file_exists($targetDir)) {
	@mkdir($targetDir);
}

// Get a file name
if (isset($_REQUEST["name"])) {
	$fileName = $_REQUEST["name"];
} elseif (!empty($_FILES)) {
	$fileName = $_FILES["file"]["name"];
} else {
	$fileName = uniqid("file_");
}

 include_once ( $_SERVER['DOCUMENT_ROOT'] . '/include/funciones_web.php');
 	  //Rememplazamos caracteres especiales latinos
	$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
	$repl = array('a', 'e', 'i', 'o', 'u', 'n');
	$fileName = str_replace ($find, $repl, $fileName);
	// Añaadimos los guiones
	$find = array(' ', '&', '\r\n', '\n', '+');
	$fileName =strtolower(str_replace ($find, '-', $fileName));	
	
	
$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

// Chunking might be enabled
$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;


// Remove old temp files	
if ($cleanupTargetDir) {
	if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
		die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
	}

	while (($file = readdir($dir)) !== false) {
		$tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

		// If temp file is current file proceed to the next
		if ($tmpfilePath == "{$filePath}.part") {
			continue;
		}

		// Remove temp file if it is older than the max age and is not the current file
		if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
			@unlink($tmpfilePath);
		}
	}
	closedir($dir);
}	


// Open temp file
if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
	die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
}

if (!empty($_FILES)) {
	if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
		die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
	}

	// Read binary input stream and append it to temp file
	if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
		die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
	}
} else {	
	if (!$in = @fopen("php://input", "rb")) {
		die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
	}
}

while ($buff = fread($in, 4096)) {
	fwrite($out, $buff);
}

@fclose($out);
@fclose($in);

// Check if file has been uploaded
if (!$chunks || $chunk == $chunks - 1) {
	// Strip the temp .part suffix off 
	rename("{$filePath}.part", $filePath);
	
	// ------------------------ Inicio Alex -----------------------------

	 include($_SERVER['DOCUMENT_ROOT']. '/config.php');		
	 extract($_POST);
	 $pagina = $_REQUEST["pagina"];
 	// $selectseccion = $_REQUEST["selectseccion"];	 
	$new_cod = $pagina.date('ymdHis').codigo_azar(4);
	
	 //$cquitaextension = trim(substr($fileName,0,-4));
	 //$cremplazavacio=str_replace(" ","-",$cquitaextension);
	 //$camicontenido=$cremplazavacio;
	 
	 $camicontenido =strtolower(trim(substr($fileName,0,-4))); 	

	$save_contenido= "INSERT INTO contenido 
						(
						ccodcontenido,
						ccodpage,
						ccodcategoria,
						ccodmodulo,
						ccodestcontenido,
						cnomcontenido,
						camicontenido,
						crescontenido,
						ctagcontenido,
						cimgcontenido,
						cordcontenido,
						cestcontenido,
						ctipcontenido,
						curlcontenido,
						cestcomentario,
						dfeccontenido,
						ccodusuario,
						dfecmodifica)
						values(
						'" . $new_cod . "', 
						'" . $pagina. "', 
						'1',
						'1400',   
						'1401', 
						'" . $camicontenido. "', 
						'" . $camicontenido . "', 
						
						'', 
						'', 
						'" . $alexruta . $fileName. "', 
						'" . $orden. "',  
						'1',
						'1',
						'',				
						'1',
						now(), 
						'" .$_SESSION['webuser_id']. "',
						now()
						)";		
						//'FOAB" . $new_cod . "',   
	//db_query($save_contenido);
	//echo $save_contenido;exit;
	$sqlInsertVideo =mysql_query($save_contenido) or die ("problema con insertar  contenido");					
			 
	$save_seccion="INSERT INTO seccioncontenido (ccodpage,ccodseccion, ccodcontenido ) values ('".$pagina."','" . $selectseccion . "', '" . $new_cod . "' )";
	$sqlInsertSecconte =mysql_query($save_seccion) or die ("problema con insertar  seccioncontenido");
	
	$save_contenidodetalle="INSERT INTO contenidodetalle (ccodcontenido,cdetcontenido) values ('".$new_cod."','" . $camicontenido . "' )";
	$sqlInsertcontenidodetalle =mysql_query($save_contenidodetalle) or die ("problema con insertar  contenidodetalle");					
	
    // ------------------------ Fin Alex -----------------------------
	
}

// Return Success JSON-RPC response
die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');