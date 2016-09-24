<?php
date_default_timezone_set('America/Los_Angeles');
//echo date("d-m-Y"); exit;
//Se requiere el fichero para contactar con la base de datos: 
include_once $_SERVER['DOCUMENT_ROOT']."/config.php";
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
$cfecha=   "$dia $dia2 de $mes de $ano Hora: $hora" ;
 //----------------Fin Para Fecha---------------------------------------------------
 
//Se asignan las variables. 
//$IP = $REMOTE_ADDR; 
$IP = isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    ? $_SERVER['HTTP_X_FORWARDED_FOR']
    : $_SERVER['REMOTE_ADDR'];

$fecha = date("j del n de Y"); 
$cfechacorta=date("Y/m/d"); 
$hora = date("h:i:s A"); 
$segundos = time(); 
//$can = "3600"; 60 segundos x 60 minutos qye tuiene la hora 1 hora
$can = "32400";   ///lo cambie alex por 9 horas

$resta = $segundos-$can; 

//Se genera la consulta a la base de datos, solicitando cualquier registro 3600 segundos anteriores a los segundos //actuales(obtenemos todos los registros una hora atrás). 
$sql = "SELECT segundos, IP "; 
$sql.= "FROM contador WHERE segundos >= $resta AND IP LIKE '$IP' "; 

// lo cambie por dia ya no cuenta los segundos sino por dia es decir si ya entro esa maquina ya no se cuenta
$sql = "SELECT segundos, IP "; 
$sql.= "FROM contador WHERE IP LIKE '$IP' "; 

$es = mysql_query($sql) or die("Error al leer base de datos: ".mysql_error()); 
//Creamos el condicionamiento de loguear o no la entrada, dependiendo si el numero de registros es o no mayor a cero. 

if(mysql_num_rows($es)>0) 
{//no se cuenta la visita 
} 
else 
{ 
$sql = "INSERT INTO contador (id, IP, fecha, hora, segundos,fechacorta) "; 
$sql.= "VALUES ('','$IP','$cfecha','$hora','$segundos','$cfechacorta')"; 
$es = mysql_query($sql) or die("Error al grabar un mensaje: ".mysql_error()); } 

//Contamos los registros que tenemos en la tabla y se los asignamos a la variable $visitas que es la que después visualizaremos en pantalla. 
$sql = "SELECT * "; 
$sql.= "FROM contador WHERE id "; 
$es = mysql_query($sql) or die("Error al leer base de datos: ".mysql_error()); 
$visitas = mysql_num_rows($es); 

$cfechahoy=date("Y/m/d");  //Vemos que fecha es HOY
//Contamos los registros que han ingresado hoy y se los asignamos a la variable $visitashoy
//
$sqlhoy = "SELECT * "; 
$sqlhoy.= "FROM contador WHERE fechacorta='" .  date("Y-m-d")."'"; 
//echo date("d-m-Y h:i:s A"); exit;
//echo $sqlhoy;exit;

$eshoy = mysql_query($sqlhoy) or die("Error al leer base de datos: ".mysql_error()); 
$visitashoy = mysql_num_rows($eshoy); 

//Creamos una tabla para albergar las visitas: 
/*$men=$men . "<table  align='right' width='100%' border='0'>" . chr(10); 
$men=$men . "<tr>" . chr(10); 
$men=$men . "<td align='left' width='20%'><font color=#ffffff>Visitas Hoy:$visitashoy</font></td>" . chr(10); 
$men=$men . "<td align='left' width='50%'><font color=#ffffff>Total visitas:  $visitas  desde Enero del 2015</font></td>" . chr(10); 
$men=$men . 
"</tr>" . chr(10); 
$men=$men . "</table>" . chr(10); 
echo $men;*/
?>
<div class="visihoyconta" >Visitas Hoy&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?=$visitashoy?></div>
<div class="VisiTotalconta">Total visitas&nbsp;:&nbsp;&nbsp;<?=$visitas?> &nbsp;&nbsp; desde Enero del 2015
</div>
<div class="clear"></div>