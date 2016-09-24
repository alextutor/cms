<!--http://twitter.com/about/resources/tweetbutton  -para twiter--- -->
<!--http://www.forosdelweb.com/f18/obtener-titulo-idsec1-mediante-php-831352/-->  
<?php
 $idsec1=$_GET["idsec1"];
 
//////////////////////////////////////////INICIO  Obtener Titulo/////lo utiliso para twiter/////////////////////////////////////////////////
function obtener_titulo($contenido){ 
$ext = "|<[\s]*title[\s]*>([^<]+)<[\s]*/[\s]*title[\s]*>|Ui"; 
if(preg_match($ext, $contenido, $resultado)) 
return $resultado[1]; 
else 
return false; 
} 
$url ="http://www.infodisfap.com/" . $idsec1 . ".php"; 
$contenido = file_get_contents($url); 
$titulo = obtener_titulo($contenido); 
//////////////////////////////////////////FIN Obtener Titulo//////////////////////////////////////////////////////
// Conexión a base de datos
include_once($_SERVER['DOCUMENT_ROOT']. "/rutinas/conexioninfodisfap.php"); 
//$idsec1=$_GET["idsec1"];
//$ssql ="select enlace,visitas from enlaces where enlace='".$idsec1 ."'";

 $leyes=$_GET["leyes"];
 //si se llama a archivos de leyes 
 if ($leyes!='')  {	
   $idsec1=trim($idsec1) .'&leyes=' .trim($leyes);
}
$ssql ="select SQL_CALC_FOUND_ROWS news_link,visitas from NEWS where news_link='".$idsec1 ."'";
//$ssql ="select enlace,visitas from enlaces where enlace='Comunicados/ADISFFAAP/comunicado01'";
$respleida = mysql_query($ssql,$conexion) or die ("problema con query");
$nTotal = mysql_query("SELECT FOUND_ROWS()");   
$datosleidas = mysql_fetch_array($respleida) ;
//if(mysql_num_rows($respleida) != 0){
if ($nTotal<> 0)  /// Inicio Si 1
  {
	echo "<table width='100%' border='0'>";
    echo "<tr>";
    echo "<td align='left'>Leidas : " .$datosleidas["visitas"] ."</td>"; 
  echo "<td width='5%' valign='middle' align='right'><img src='imagen/redes-sociales/compartir-fondo-verde-separado.png' width='25' height='25' /> </td>";
  echo "<td width='18%' valign='middle' align='left'><strong>Compartir En:</strong></td>";
	echo "<td valign='top' width='15'align='left'><a href='http://twitter.com/share' class='twitter-share-button' data-text='" .$titulo ."' data-count='none' data-via='infodisfap' data-lang='es'>Tweet</a><script type='text/javascript' src='http://platform.twitter.com/widgets.js'></script></td>";    
	echo "<td  valign='top' width='15' align='left'><a name='fb_share' type='button_count' share_url='http://www.infodisfap.com/" . $idsec1 . ".php' href='http://www.facebook.com/sharer.php'>Compartir</a><script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share' type='text/javascript'></script></td>";		
    echo "</tr>";
    echo "</table>";
}
//include_once($_SERVER['DOCUMENT_ROOT']. "/rutinas/cerrar_conexion.php"); 
mysql_free_result($respleida);

?> 