<?php session_start();

$bReturnAbsolute=false;  //si se muestra o nop toda la direccion del archivo

/*sBaseVirtual0 =  ubicación de la carpeta de recursos web (por favor, utilice "relativo a la raíz" path). 
sBase0	  = ruta real / física.
sName0	  = nombre / título. 
*/
//echo $_SESSION['sBase0']."ica";exit;
$sBaseVirtual0="/".$_SESSION['sBaseVirtual0']; 
$sBase0=$_SESSION['RUTASERVIDOR'].$_SESSION['sBase0']; //The real path
$sName0="fotos";
/*$sBaseVirtual1="";
$sBase1=""; 
$sName1="";

$sBaseVirtual2="";
$sBase2="";
$sName2="";

$sBaseVirtual3="";
$sBase3="";
$sName3="";

$sBaseVirtual1="/".$_SESSION['rutaimages']; 
$sBaseVirtual2="/".$_SESSION['rutaimages']; 
$sBaseVirtual3="/".$_SESSION['rutaimages']; 

$sBase1=$_SESSION['RUTASERVIDOR'].$_SESSION['rutaimages']."/"; //The real path
$sBase2=$_SESSION['RUTASERVIDOR'].$_SESSION['rutaimages']."/"; //The real path
$sBase3=$_SESSION['RUTASERVIDOR'].$_SESSION['rutaimages']."/"; //The real path
*/

$sBase1="";
$sBase2="";
$sBase3="";

//$sName1="fotos";
//$sName2="fotos";
//$sName3="fotos";
?>