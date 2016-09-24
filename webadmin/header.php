<!doctype html>
<html lang="es">   
<head>   
	<?php
	//-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	  
	//http://www.forosdelweb.com/f53/solucion-definitiva-para-conflictos-entre-navegadores-583772/
function ObtenerNavegador($user_agent) { 
     $navegadores = array( 
          'Opera' => 'Opera',
		  'Chrome' => 'Chrome', 
          'Safari' => 'Safari', 
          'Mozilla Firefox'=> '(Firebird)|(Firefox)', 
          'Galeon' => 'Galeon', 
          'Mozilla'=>'Gecko', 
          'MyIE'=>'MyIE', 
          'Lynx' => 'Lynx', 
          'Netscape' => '(Mozilla/4\.75)|(Netscape6)|(Mozilla/4\.08)|(Mozilla/4\.5)|(Mozilla/4\.6)|(Mozilla/4\.79)', 
          'Konqueror'=>'Konqueror',
		  'IExplorer 10' => '(MSIE 10\.[0-9]+)',
		  'IExplorer 9' => '(MSIE 9\.[0-9]+)',
		  'IExplorer 8' => '(MSIE 8\.[0-9]+)',
		  'IExplorer 7' => '(MSIE 7\.[0-9]+)',
		  'IExplorer 6' => '(MSIE 6\.[0-9]+)',
		  'IExplorer 5' => '(MSIE 5\.[0-9]+)',
		  'IExplorer 4' => '(MSIE 4\.[0-9]+)',	
); 
foreach($navegadores as $navegador=>$pattern){ 
       if (eregi($pattern, $user_agent)) 
       return $navegador; 
    } 
return 'Desconocido'; 
} 
?>
	<?php  include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/include/config-webadmin.php'); ?>    
        <?php  include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/mis-funciones.php'); ?>    
    <meta charset="utf-8">
    
     <base href="<?php echo $ROOT_PATH ?>"/> 
    <title> <?php echo $Title ?> </title>    
    <Meta name = "description" content = " <?php echo $Description ?>">
    <meta name="author" content="sisdatahost.com">
    <meta name="google-site-verification" content="a6GxuWnA8GcPKSH4sSErALnWp5pMV7Rsgt6ZQ1XaIpM" />
   <link rel="stylesheet" type="text/css" href="/webadmin/css/system.css">
	<?php
	$navegador=ObtenerNavegador($_SERVER['HTTP_USER_AGENT']);		
	switch($navegador) { 
		case 'Internet Explorer 6': $css = '/webadmin/css/homestyle-IE.css'; break; 
		case 'Internet Explorer 7': $css = '/webadmin/css/homestyle-IE.css'; break;
		case 'Chrome': $css = '/webadmin/css/mis-estilos-webadmin.php'; break;		 
		case 'Operai' : $css = 'opera'; break; 
		case 'Safari': $css = 'safari'; break; 
		default: $css = 0; 
	} 
	if ($css !== 0) { 	
	?> 
    <style type="text/css"> <?php include_once($_SERVER['DOCUMENT_ROOT'].$css); ?> </style> 
<?php } ?>		

</head>