<?Php  session_start();
//-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
//-------	

$Title = "";
$Description = "";
$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/webadmin/header.php');
?>
<?php								
	 extract($_POST);   	
	 include($_SERVER['DOCUMENT_ROOT']. '/config.php');		
	//$codigo      = "1217280600140000000000000000";
	$selectpage  = $_SESSION['selectpage'];
	$secci = $selectpage;//$form_entrada['selectpage']
	$nivel=0; //empieza con 0 ver donde se modifica porque lagunos aparecen con 2 o 3 a mas
	$csecc = substr($secci,0,8+($nivel*4));
	$posix  = (9 +( $nivel *4));
  	$sqlcad     = "select max(substring(ccodseccion,".$posix.",4))+1 from seccion   where ccodseccion like '".$csecc."%' and cnivseccion='".($nivel+1)."'";	
	//echo $sqlcad."dasdasd",exit;	
	$query_cod  = db_query($sqlcad);
	list($cod2) = mysql_fetch_array($query_cod);
	if(!isset($cod2))	$cod2='0001';		
	$codigo = $csecc.substr_replace($var, $cod2, strlen($var)-strlen($cod2), strlen($cod2)).'0000000000000000';	
	//echo $codigo ;exit;
	$ccodplantilla= "0";	
	$sqlp    = "SELECT ccodplantilla FROM page  WHERE ccodpage='".$selectpage."'";
    $queryp  = db_query($sqlp);
	$rspagina    = db_fetch_array($queryp);
	//$imagencab="";//mas opciones
	$menuinden ="0";	
	//$txtpaginar="0";
	$selectorden="0";
	$ssql = "INSERT INTO seccion (
					mostrarurlcatebase,
					ccodclase,   
					ccodseccion,
					ccodpage,
					totalpantalla,
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
				   '".$mostrarurlcatebase."',
					'".$selectclase."',
					'".$codigo."',
					'".$selectpage."',
					'".$totalpantalla."',	
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
					'".$cordcontenido."',
					now(),
					'".$_SESSION['id_usuario']."',
					now(),
					'1'
					)";				   
				//  echo $ssql;
     $sqlInsertCat =mysql_query($ssql,$conexion) or die ("problema con insertar seccion");	
	 /***  Grabado de Detalle seccion	*/
	  $save_detalle = "INSERT INTO secciondetalle (ccodseccion, cnombre) values ('" . $codigo . "',''  )";
	  db_query($save_detalle);	
	
	/***  Grabado de Ubicaciones de Menu 	*/
	if ($nivel<=1)
	{
		 //$rdmenu1=cabecera;  $rdmenu2=pie;
		$sqlmenuubi = "select * from pagemenu where ccodpage='".$selectpage."' and cestmenu='1'";
		$resmenuubi = db_query($sqlmenuubi);
		while ($rows_menuubi = mysql_fetch_array($resmenuubi)) 
		{
			//$ubimen = '$'. 'rdmenu'.$rows_menuubi['ccodmenu'];
			//alex rdmenu viene de jq_selectmenu.php que se le incluye en Form-Insertar-seccion.php 
			// muestra los menus donde se mostraran las secciones llama a la tabla pagemenu ejemplo (cabecera, pie , servicios )									
			if (${'rdmenu'.$rows_menuubi['ccodmenu']})	
			{
				$save2_query = "INSERT INTO seccionmenu (ccodseccion,ccodmenu, cordmenu) VALUES ('".$codigo."','".$rows_menuubi['ccodmenu']."','0')";
				db_query($save2_query);	
			}
		}
	}	

?>
<script language='JavaScript'>    
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/index.php?option=com_categoria&mensaje=La Seccion ha sido Ingresada correctamente' 
</script> 
