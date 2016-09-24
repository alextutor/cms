<?Php  session_start();
//-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 
$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/webadmin/header.php');
?>
<?php								
	 extract($_POST);   		 
	 include($_SERVER['DOCUMENT_ROOT']. '/config.php');		
	//$codigo      = "1217280600140000000000000000";
	// alex nivel lo toma del campo oculto $selectnivel de Form-Insertar-subseccion.php 
	$nivel = $selectnivel;  // cnivseccion del padre
	$secci = $selectroot;   // ccodseccion del padre
	$csecc = substr($secci,0,8+($nivel*4));	
	$posix  = (9 +( $nivel *4));
	//echo $secci."---";echo $csecc;exit;
	//echo "nivel=".$nivel."<br>secci=".$selectroot."<br>csecc=".$csecc."<br>posix=".$posix ;exit;
	
	//$sqlcad  devuelve un entero cuanta cuantos registros hay en el resultado de la consulta  y lo suma uno 
	$sqlcad     = "select max(substring(ccodseccion,".$posix.",4))+1 from seccion   where ccodseccion like '".$csecc."%' and cnivseccion='".($nivel+1)."'";
	//echo "nivel:".$selectnivel."--".$sqlcad;exit;
	$query_cod  = db_query($sqlcad);
	list($cod2) = mysql_fetch_array($query_cod);
	if(!isset($cod2))	$cod2='0001';	
	$var    = '0000';
	$menuinden ="0";		
	$codigo      = $csecc.substr_replace($var, $cod2, strlen($var)-strlen($cod2), strlen($cod2)).'0000000000000000';
	//echo $codigo;exit;
	$ccodplantilla= "0";	
	$sqlp    = "SELECT ccodplantilla FROM page  WHERE ccodpage='".$selectpage."'";
    $queryp  = db_query($sqlp);
	$rspagina    = db_fetch_array($queryp);
	$imagencab="";//mas opciones
	$menuinden ="0";	
	//$txtpaginar="0";
	//$selectorden="0";			
	//echo "Codigo padre:".$secci."Codigo Nuevo:". $codigo ;exit;
	
	$ssql = "INSERT INTO seccion (
					ccodclase,
					totalpantalla,					
					ccodseccion,
					ccodpage,
					ccodmodulo,
					ccodplantilla,
					ccodsecestilo,																			
					cnomseccion,
					camiseccion,
					ctitseccion,
					cdesseccion,
					ctagseccion,
					cimgseccion,
					cestseccion,
					cnivseccion,
					cnewmenu,
					ctipseccion,
					curlseccion,
					cpagseccion,
					cordcontenido,
					dfecseccion,
					ccodusuario,
					dfecmodifica,
					estado)
				   VALUES (
				   '".$selectclase."',
				   '".$totalpantalla."',					  
					'".$codigo."',
					'".$selectpage."',
					'".$selectmodulo."',					
					'".$rspagina['ccodplantilla']."',					
					'".$selectestilo."',					
					'".$titulo."',
					'".$amigable."',
					'".$txttitulo."',
					'".$txtdetalle."',
					'".$txttags."',
					'".$cimgseccion."',
					'1',
					'".($nivel+1)."',
					'".$menuinden."',
					'".$selectenlace."',
					'".$rutaenlace."',
					'".$txtpaginar."',
					'".$orden."',
					now(),
					'".$_SESSION['id_usuario']."',
					now(),
					'1'
					)";				   
     $sqlInsertCat =mysql_query($ssql,$conexion) or die ("problema al insertar seccion");	
	 
	 /***  Grabado de Detalle seccion	*/
	 //alex lo desabilite por que no hay tabla secciondetalle en juvame
	 // $save_detalle = "INSERT INTO secciondetalle (ccodseccion, cnombre) values ('" . $codigo . "',''  )";
	  //$sqlInsertCat =mysql_query($save_detalle,$conexion) or die ("problema al insertar secciondetalle");			
	
?>
<script language='JavaScript'>    
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/index.php?option=com_categoria&mensaje=La Sub-Categoria ha sido Ingresada correctamente' 
</script> 
