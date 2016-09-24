<?php
session_start();
if ($_SESSION['webuser_aut']!='1') {
	session_destroy();
	header ("Location: /"); 
    exit; 
}
$bReturnAbsolute=false;

 //$currFolder=$sBase0; //aqui toma la ruta en assetmanager.php
 // $currFolder="E:/Alex/Web/xampp/htdocs/gamatell.com/www.gamatell.com/web/12172806/fotos";

$sBaseVirtual0="/".$_SESSION['rutaimages']; 
$sBase0=$_SESSION['RUTASERVIDOR'].$_SESSION['rutaimages']; //The real path

//echo $sBase0."----";exit;
//$_SESSION['RUTASERVIDOR']  es  /home/public_html/ ;
//$_SESSION['rutaimages'] es web/12172806/fotos

//$sBase0="E:/Alex/Web/xampp/htdocs/gamatell.com/www.gamatell.com/web/12172806/fotos"; //activar cuando se trabaja modo localhost

$sName0="fotos";

$sBaseVirtual1="";
$sBase1=""; //The real path
$sName1="";

$sBaseVirtual2="";
$sBase2="";
$sName2="";

$sBaseVirtual3="";
$sBase3="";
$sName3="";


$sBaseVirtual0="/".$_SESSION['rutaimages']; 
$sBaseVirtual1="/".$_SESSION['rutaimages']; 
$sBaseVirtual2="/".$_SESSION['rutaimages']; 
$sBaseVirtual3="/".$_SESSION['rutaimages']; 

$sBase1=$_SESSION['RUTASERVIDOR'].$_SESSION['rutaimages']."/"; //The real path
$sBase2=$_SESSION['RUTASERVIDOR'].$_SESSION['rutaimages']."/"; //The real path
$sBase3=$_SESSION['RUTASERVIDOR'].$_SESSION['rutaimages']."/"; //The real path
$sName1="fotos";
$sName2="fotos";
$sName3="fotos";
?>