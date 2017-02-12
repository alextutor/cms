<?php
include_once $_SERVER['DOCUMENT_ROOT']."/config.php";		
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
//include 'config.inc.php';
//include $_SERVER['DOCUMENT_ROOT']."/config.php";
//echo $_POST["idhijo"];exit;
//echo "< pre >";print_r($_GET);echo "< /pre >";
if ($_GET["buscar"]=="hijos")
{
	//$consulta="SELECT * FROM hijo WHERE idpadre='".mysql_real_escape_string(intval($_GET["idpadre"]))."' order by hijo";
	//$s2_mm = mysql_real_escape_string(intval($_GET["idpadre"]));	
	$s2_mm = $_GET["idpadre"];
	if ($s2_mm<>"")
	{
		//echo $s2_mm;
		//$s2_mm ="1217281220150001"; //16
		$s2_mm = substr($s2_mm,0,16);
		$sqlmenumm2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s2_mm."%'  and cnivseccion=3 and  estado='1' ORDER BY cordcontenido ASC";
		//echo $sqlmenumm2 ;
		//mysql_select_db($dbname);
		$todos=mysql_query($sqlmenumm2);
		//$número_filas = mysql_num_rows($todos);
		//echo $número_filas;
		// Comienzo a imprimir el select	
		echo "<select name='idhijo' id='idhijo' class='select_filtro_categoria'>";	
		echo "<option value=''>[Seleccionar Modelo Motor]</option>";
		while($registro=mysql_fetch_array($todos))
		{
			
			// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
			// Imprimo las opciones del select
			echo "<option value='".$registro["ccodseccion"]."'";
			//if ($registro["ccodseccion"]==$valoractual) echo " selected";
			echo ">".utf8_encode($registro["cnomseccion"])."</option>\r\n";
		}
		echo "</select>";
	} // Fin Si  $s2_mm<>""
} 	// Fin Si  $_GET["buscar"]=="hijos"
?>