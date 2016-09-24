<?php		
	$Title = "";
	$Description = "";
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/header.php'); 	
?> 
<?php    
   ////////////////////////////////////////////////////
//Convierte fecha de normal a mysql
////////////////////////////////////////////////////
function cambiaf_a_mysql($date){
# ================================================== ========
# ==== Recibe una fecha con formato dd-mm-aa ====
# ==== Devuelve una fecha con formato aaaa-mm-dd hh:mm:ss ====
# ================================================== ========
$day=substr($date,0,2);
$month=substr($date,3,2);
$year=substr($date,6,4);
//$date=mktime(0,0,0,$month,$day,$year);
 $date=$year."/".$month."/".$day;
return ($date);
}
function DateToQuotedMySQLDate($Fecha)
{
if ($Fecha<>""){
   $trozos=explode("/",$Fecha,3);
   return "'".$trozos[2]."-".$trozos[1]."-".$trozos[0]."'"; }
else
   {return "NULL";}
}
function MySQLDateToDate($MySQLFecha)
{
if (($MySQLFecha == "") or ($MySQLFecha == "0000-00-00") )
    {return "";}
else
    {return date("d/m/Y",strtotime($MySQLFecha));}
} 
   
   include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
   
   $desc_distrito=$_POST['desc_distrito'];    
   $precio_soles=$_POST['precio_soles'];    
   $mostrar=$_POST['mostrar'];    
   $orden=$_POST['orden'];    
   $borrado=$_POST['borrado'];    
     
   	 
   //---------------------Inicio Para Fecha----------------------------------------------------
   // Obtenemos y traducimos el nombre del día
$dia=date("l");
if ($dia=="Monday") $dia="Lunes";
if ($dia=="Tuesday") $dia="Martes";
if ($dia=="Wednesday") $dia="Miércoles";
if ($dia=="Thursday") $dia="Jueves";
if ($dia=="Friday") $dia="Viernes";
if ($dia=="Saturday") $dia="Sabado";
if ($dia=="Sunday") $dia="Domingo";

// Obtenemos el número del día
$dia2=date("d");

// Obtenemos y traducimos el nombre del mes
$mes=date("F");
if ($mes=="January") $mes="Enero";
if ($mes=="February") $mes="Febrero";
if ($mes=="March") $mes="Marzo";
if ($mes=="April") $mes="Abril";
if ($mes=="May") $mes="Mayo";
if ($mes=="June") $mes="Junio";
if ($mes=="July") $mes="Julio";
if ($mes=="August") $mes="Agosto";
if ($mes=="September") $mes="Setiembre";
if ($mes=="October") $mes="Octubre";
if ($mes=="November") $mes="Noviembre";
if ($mes=="December") $mes="Diciembre";
// Obtenemos el año
$ano=date("Y");
$hora=date ( "h:i:s A") ;
// Imprimimos la fecha completa
//echo "$dia $dia2 de $mes de $ano";
$fecha=   "$dia $dia2 de $mes de $ano Hora: $hora" ;
$fechacorta=date("Y/m/d"); 
 //----------------Fin Para Fecha---------------------------------------------------	
   //$_POST['$nombre']
   // $persona=$_POST['$persona'];    
    //Generamos la ssql e insertamos el registro
    $ssql ="insert into distrito(desc_distrito,precio_soles,mostrar,orden,borrado)  values('$desc_distrito','$precio_soles','$mostrar','$orden','$borrado')";
mysql_query($ssql,$conexion) or die ("problema con query");
    include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 
   //header ("Location: EnvioCorreo.php");
?>

<script language='JavaScript'> 
	paginacion = "<?=$paginacion?>";
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/mantenimiento/mantDistrito.php?mensaje=Registro Insertado' + '&paginacion='	+paginacion 		
</script> 

<?php
//}
?>