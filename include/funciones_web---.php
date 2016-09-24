<?php session_start();
//contenidosweb

/*************** Funcion paginacion ****************/
function paginar($page = 1, $totalitems, $limit = 15, $adjacents = 1, $targetpage = "/")
{		
	if(!$adjacents) $adjacents = 1;
	if(!$limit) $limit = 15;
	if(!$page) $page = 1;
	if(!$targetpage) $targetpage = "/";
	
	$prev = $page - 1;									
	$next = $page + 1;									
	$lastpage = ceil($totalitems / $limit);				
	$lpm1 = $lastpage - 1;								
	$paginacion = "";
	if($lastpage > 1)
	{	
		$paginacion .= "<div class=\"paginacion\"";
		if($margin || $padding)
		{
			$paginacion .= " style=\"";
			if($margin)
				$paginacion .= "margin: $margin;";
			if($padding)
				$paginacion .= "padding: $padding;";
			$paginacion .= "\"";
		}
		$paginacion .= ">";
		if ($page > 1) 
			$paginacion .= "<a href=\"$targetpage/$prev\">&#171; anterior</a>";
		else
			$paginacion .= "<span class=\"disabled\">&#171; anterior</span>";	
		if ($lastpage < 7 + ($adjacents * 2))	
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$paginacion .= "<span class=\"current\">$counter</span>";
				else
					$paginacion .= "<a href=\"$targetpage/$counter\">$counter</a>";					
			}
		}
		elseif($lastpage >= 7 + ($adjacents * 2))	
		{
			if($page < 1 + ($adjacents * 3))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$paginacion .= "<span class=\"current\">$counter</span>";
					else
						$paginacion .= "<a href=\"$targetpage/$counter\">$counter</a>";					
				}
				$paginacion .= "...";
				$paginacion .= "<a href=\"$targetpage/$lpm1\">$lpm1</a>";
				$paginacion .= "<a href=\"$targetpage/$lastpage\">$lastpage</a>";		
			}
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$paginacion .= "<a href=\"$targetpage/1\">1</a>";
				$paginacion .= "<a href=\"$targetpage/2\">2</a>";
				$paginacion .= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$paginacion .= "<span class=\"current\">$counter</span>";
					else
						$paginacion .= "<a href=\"$targetpage/$counter\">$counter</a>";					
				}
				$paginacion .= "...";
				$paginacion .= "<a href=\"$targetpage/$lpm1\">$lpm1</a>";
				$paginacion .= "<a href=\"$targetpage/$lastpage\">$lastpage</a>";		
			}
			else
			{
				$paginacion .= "<a href=\"$targetpage/1\">1</a>";
				$paginacion .= "<a href=\"$targetpage/2\">2</a>";
				$paginacion .= "...";
				for ($counter = $lastpage - (1 + ($adjacents * 3)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$paginacion .= "<span class=\"current\">$counter</span>";
					else
						$paginacion .= "<a href=\"$targetpage/$counter\">$counter</a>";					
				}
			}
		}
		if ($page < $counter - 1) 
			$paginacion .= "<a href=\"$targetpage/$next\">siguiente &#187;</a>";
		else
			$paginacion .= "<span class=\"disabled\">siguiente &#187;</span>";
		$paginacion .= "</div>\n";
	}
	return $paginacion;
}


/*************** Funcion URL Amigable ****************/
function url_amigable($url) 
{
	$url = strtolower($url);
	//Rememplazamos caracteres especiales latinos
	$find = array('�', '�', '�', '�', '�', '�');
	$repl = array('a', 'e', 'i', 'o', 'u', 'n');
	$url = str_replace ($find, $repl, $url);
	// A�aadimos los guiones
	$find = array(' ', '&', '\r\n', '\n', '+');
	$url = str_replace ($find, '-', $url);
	// Eliminamos y Reemplazamos dem�s caracteres especiales
	$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
	$repl = array('', '-', '');
	$url = preg_replace ($find, $repl, $url);
	return $url;
}


/*************** Funcion generacion de password aleatorios ****************/
function generar_password ($pw_largo = 20) 
{ 
	$i=0; 
	$password=""; 
	//$pw_largo = 20; 
	$desde_ascii = 50; 
	$hasta_ascii = 122; 
	$no_usar = array (58,59,60,61,62,63,64,73,79,91,92,93,94,95,96,108,111); 
	while ($i < $pw_largo) 
	{ 
		mt_srand ((double)microtime() * 1000000); 
		$numero_aleat = mt_rand ($desde_ascii, $hasta_ascii); 
		if (!in_array ($numero_aleat, $no_usar))
		{ 
		 	$password = $password . chr($numero_aleat); 
			$i++; 
		} 
	} 
	return $password; 
} 
function diasemana($fecha)
{
    $fecha= strtotime($fecha); // convierte la fecha de formato mm/dd/yyyy a marca de tiempo
    $diasemana=date("w", $fecha);// optiene el n�mero del dia de la semana. El 0 es domingo
       switch ($diasemana)
       {
       case "0":
          $diasemana="Domingo";
          break;
       case "1":
          $diasemana="Lunes";
          break;
       case "2":
          $diasemana="Martes";
          break;
       case "3":
          $diasemana="Miercoles";
          break;
       case "4":
          $diasemana="Jueves";
          break;
       case "5":
          $diasemana="Viernes";
          break;
       case "6":
          $diasemana="Sabado";
          break;
       }	
return $diasemana;
}

//$cfecha=traducefecha("09/11/2014","S"); Jueves, 11 de Septiembre de 2014
//$cfecha=traducefecha("09/11/2014","N"); 11 de Septiembre de 2014
function traducefecha($fecha,$verdia)
    {
    $fecha= strtotime($fecha); // convierte la fecha de formato mm/dd/yyyy a marca de tiempo
    $diasemana=date("w", $fecha);// optiene el n�mero del dia de la semana. El 0 es domingo
       switch ($diasemana)
       {
       case "0":
          $diasemana="Domingo";
          break;
       case "1":
          $diasemana="Lunes";
          break;
       case "2":
          $diasemana="Martes";
          break;
       case "3":
          $diasemana="Miercoles";
          break;
       case "4":
          $diasemana="Jueves";
          break;
       case "5":
          $diasemana="Viernes";
          break;
       case "6":
          $diasemana="Sabado";
          break;
       }
    $dia=date("d",$fecha); // d�a del mes en n�mero
    $mes=date("m",$fecha); // n�mero del mes de 01 a 12
       switch($mes)
       {
       case "01":
          $mes="Enero";
          break;
       case "02":
          $mes="Febrero";
          break;
       case "03":
          $mes="Marzo";
          break;
       case "04":
          $mes="Abril";
          break;
       case "05":
          $mes="Mayo";
          break;
       case "06":
          $mes="Junio";
          break;
       case "07":
          $mes="Julio";
          break;
       case "08":
          $mes="Agosto";
          break;
       case "09":
          $mes="Septiembre";
          break;
       case "10":
          $mes="Octubre";
          break;
       case "11":
          $mes="Noviembre";
          break;
       case "12":
          $mes="Diciembre";
          break;
       }
    $ano=date("Y",$fecha); // optenemos el a�o en formato 4 digitos
	if ($verdia=='S')
	    $fecha= $diasemana.", ".$dia." de ".$mes." de ".$ano; // unimos el resultado en una unica cadena
	else
	    $fecha= $dia." de ".$mes." de ".$ano; // unimos el resultado en una unica cadena
    return $fecha; //enviamos la fecha al programa
}
function calcular_dias($fecha1,$fecha2) 
{
	$partes1 = explode("-", $fecha1);
	$partes2 = explode("-", $fecha2);
             //defino fecha 1 
	$ano1 = $partes1[0];
	$mes1 = $partes1[1]; 
	$dia1 = $partes1[2]; 
             //defino fecha 2 
	$ano2 = $partes2[0]; 
	$mes2 = $partes2[1]; 
	$dia2 = $partes2[2]; 
             //calculo timestam de las dos fechas 
	$timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1); 
	$timestamp2 = mktime(4,12,0,$mes2,$dia2,$ano2); 
             //resto a una fecha la otra 
	$segundos_diferencia = $timestamp1 - $timestamp2; 
             //echo $segundos_diferencia; 
             //convierto segundos en d�as 
	$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 
              //obtengo el valor absoulto de los d�as (quito el posible signo negativo) 
	$dias_diferencia = abs($dias_diferencia); 
              //quito los decimales a los d�as de diferencia 
	$dias_diferencia = floor($dias_diferencia); 
               //echo "Cantidad de dias contenidos:".$dias_diferencia;
	return $dias_diferencia;
}
function fechadmy($fecha){
    list($anio,$mes,$dia)=explode("-",$fecha);
    return $dia."-".$mes."-".$anio;
}  

function fechaymd($fecha){
    list($dia,$mes,$anio)=explode("-",$fecha);
    return $anio."-".$mes."-".$dia;
}  

/************* Crear Url  **************/
function crearurl_articulo($articulocod)
{
$codniv1 =substr($articulocod,0,12).'000000000000';
$codniv2 =substr($articulocod,0,16).'00000000';
$codniv3 =substr($articulocod,0,20).'0000';
$codniv4 =substr($articulocod,0,24);
$urlweb .="";
$sqlurl="SELECT ccodseccion, camiseccion FROM seccion WHERE ccodseccion ='".$codniv1."' or ccodseccion ='".$codniv2."'or ccodseccion ='".$codniv3."'or ccodseccion ='".$codniv4."'";
//alex lo modifique para eliminar la url del padre se habilita en secccion eje antes http://www.desarrollo.com/servicios/puertas-portones-madera/  ahora
// http://www.desarrollo.com/puertas-portones-madera/
$sqlurl="SELECT ccodseccion, camiseccion FROM seccion WHERE (ccodseccion ='".$codniv1."' or ccodseccion ='".$codniv2."'or ccodseccion ='".$codniv3."'or ccodseccion ='".$codniv4."') AND mostrarurlcatebase='SI'";

$rssqlurl = db_query($sqlurl);
while($row_url  = db_fetch_array($rssqlurl))
{
	//$urlweb .=$row_url['camiseccion'].'/';
	//le quite el '/'
	$urlweb .=$row_url['camiseccion'];		
}

return $urlweb;
}


/************* Publicacion de contenidos ***********/

function contenidosweb($codbanner)
{
$adssql   = db_query("Select * FROM pagehome where ccodinicio='".$codbanner."'");

//alex modifique para que tomara estilos
$adssql   = db_query("Select p.*,e.cdesclase FROM pagehome p,estiloclases e  where p.cesthome='1' and e.ccodclase = p.ccodclase and ccodinicio='".$codbanner."'");

while ($rowads=db_fetch_array($adssql))
{
	//echo $rowads['ctiphome'];exit;
if ($rowads['ctiphome']=='1') //----------  Imagen
{		
	if ($rowads['curlpubli']=="")
	{
		/*echo "<div id='".$rowads['cdesclase']."'>\n";
		echo "<img src='".$rowads['cimgpubli']."' width='".$rowads['nancho']."' border='0'>\n";
		echo "</div>\n";*/
		echo "<div id='".$rowads['cdesclase']."'>";
		echo "<div class='".$rowads['cdesclase']."_titulo'>".$rowads['cnomhome']."</div>";
		echo "<div class='".$rowads['cdesclase']."_detalle'>";
		
		echo "<img src='".$rowads['cimgpubli']."' width='".$rowads['nancho']."' height='".$rowads['nalto']."' border='0'>\n"; //aqui esta el contenido		
		echo "</div></div>";		
	}
	else
	{		
		/*echo "<div id='".$rowads['cdesclase']."'>\n";
		echo "<a href ='".$rowads['curlpubli']."' title= '$nombre'  ><img src='".$rowads['cimgpubli']."' width='".$rowads['nancho']."' border='0'></a>\n";
		echo "</div>\n";*/
		
		//		arriba lo desabilite porque me msotraba diferente al asignarle un link
		echo "<div id='".$rowads['cdesclase']."'>";
		echo "<div class='".$rowads['cdesclase']."_titulo'>".$rowads['cnomhome']."</div>";
		echo "<div class='".$rowads['cdesclase']."_detalle'>";
		
		echo "<a href ='".$rowads['curlpubli']."' title= '$nombre'  >
		<img src='".$rowads['cimgpubli']."' width='".$rowads['nancho']."' height='".$rowads['nalto']."' border='0'>
		</a>\n"; //aqui esta el contenido		
		echo "</div></div>";		

	}
}
/*****  Banner SWF *****/
if ($rowads['ctiphome']=='2')
{
?>
	<div id="<?=$rowads['cdesclase']?>flash" style="z-index:1">
    <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Instale Flash Player" /></a></p>
    </div>
    <script type="text/javascript">
	var flashvars = {};
	var params = {wmode:"transparent"};
	var attributes = {};
	swfobject.embedSWF("<?=$$rowads['cimgpubli']?>", "<?=$rowads['cdesclase']?>flash", "<?=$rowads['nancho']?>", "<?=$rowads['nalto']?>", "9.0.0", "",flashvars, params, attributes);
	</script>
<?php
}
if ($rowads['ctiphome']=='3') //----------Codigo HTML
{
	/*echo "<div id='".$rowads['cdesclase']."'>\n";
	echo $rowads['cadspubli']."\n";
	echo "</div>\n";*/	
	echo "<div id='".$rowads['cdesclase']."'>";
	if ($rowads['mostrar_titulo']=='si'){
		echo "<div class='".$rowads['cdesclase']."_titulo'><h2>".$rowads['cnomhome']."</h2></div>";
	}
    echo "<div class='".$rowads['cdesclase']."_detalle'>";
	
	echo $rowads['cadspubli']."\n"; //aqui esta el contenido
	
	echo "</div></div>";		
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($rowads['ctiphome']=='4')  //----------Contenido Dinamico  --Aqui entra tambien en Portada como mostrar catalogo productos
{
	if ($rowads['ccodseccion']=="00")
	{
		$sql_seccion="";
	}
	else
	{
		$sql_seccion=" AND s.ccodseccion = '".$rowads['ccodseccion']."'";	
	}
	if ($rowads['ccodcategoria']=="0")
	{
		$sql_cate="";
	}
	else
	{
		$sql_cate=" AND c.ccodcategoria = '".$rowads['ccodcategoria']."'";	
	}
	//echo $rowads['ccodestilo']."---";exit;
	/*alex yo lo implemente para que jale de estilo seccion un estilo*/
	$sql_estilos_pre="Select * from estiloseccion where ccodsecestilo='".$rowads['ccodestilo']."'";
	$homeestilospre = db_query($sql_estilos_pre);
	$rowestilopre  = db_fetch_array($homeestilospre);	
	   
	 //  echo $rowestilopre['cincsecestilo']."--";exit;
	//aqui entra estilo_pre_01.php ,oferta_01.php 	
	include_once($_SERVER['DOCUMENT_ROOT']."/modulos/".$rowestilopre['cincsecestilo']);		
	
	/*alex yo lo implemente para que jale de estilo seccion un estilo*/
}

if ($rowads['ctiphome']=='5') //----------  Slider Imagenes (nivo slider)
{
	echo "<div id='wrapper'>\n";
	echo "<div id='slider-wrapper'>\n";
	echo "<div id='slider".$rowads['cubidestino']."' class='nivoSlider'>\n";
	echo "<img src='".$rowads['cimagen1']."' width='".$rowads['nancho']."' height='".$rowads['nalto']."' alt='' title='' />\n";
	echo "<img src='".$rowads['cimagen2']."' width='".$rowads['nancho']."' height='".$rowads['nalto']."' alt='' title='' />\n";
	echo "<img src='".$rowads['cimagen3']."' width='".$rowads['nancho']."' height='".$rowads['nalto']."' alt='' title='' />\n";
	//echo "<img src='".$rowads['cimagen4']."' width='".$rowads['nancho']."' height='".$rowads['nalto']."' alt='' title='' />\n";
	//echo "<img src='".$rowads['cimagen5']."' width='".$rowads['nancho']."' height='".$rowads['nalto']."' alt='' title='' />\n";
	echo "</div>\n";
	echo "</div>\n";
	echo "</div>\n";	
}

if ($rowads['ctiphome']=='6') //----------  Popup
{
	echo "<div id='".$rowads['cdesclase']."'>\n";
	echo "<a href ='javascript:ventanapopup(".$codbanner.", ".$rowads['anchowin'].",".$rowads['altowin'].")' title= '".$rowads['cnomhome']."'  ><img src='".$rowads['cimgpubli']."' width='".$rowads['nancho']."' border='0'></a>\n";
	echo "</div>\n";
}

if ($rowads['ctiphome']=='7') //----------  Slider Imagenes (jflow)
{
	$propaganda_1_1  =$rowads['cimagen1'];
	$propaganda_1_2  =$rowads['cimagen2'];
	$propaganda_1_3  =$rowads['cimagen3'];	
	$titulo_propaganda_1_1  =$rowads['titulo_imagen1'];
	$titulo_propaganda_1_2  =$rowads['titulo_imagen2'];
	$titulo_propaganda_1_3  =$rowads['titulo_imagen3'];	
	$texto_propaganda_1_1  =$rowads['texto_imagen1'];
	$texto_propaganda_1_2  =$rowads['texto_imagen2'];
	$texto_propaganda_1_3  =$rowads['texto_imagen3'];

	include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/propaganda-cambiante/jFlow/propaganda-cambiante.php'); 
}

} // fin bucle

} // fin funcion


function nombre_pais($ubigeo)
{
	$xpais = substr($ubigeo,0,2);
	$xdpto = substr($ubigeo,2,2);
	$xcity = substr($ubigeo,4,4);
	$sqlpais = db_query("SELECT cnomubigeo FROM webubigeo WHERE  ccodubigeo like '".$xpais."%' and cnivubigeo='1' ");
	$rowpais = db_fetch_array($sqlpais);
	if ($xdpto=="00")
	{
		$nompais =	$rowpais['cnomubigeo'];
		return $nompais;
	}
	else
	{
		$sqldpto = db_query("SELECT cnomubigeo FROM webubigeo WHERE  ccodubigeo like '".$xpais.$xdpto."%' and cnivubigeo='2' ");
		$rowdpto = db_fetch_array($sqldpto);
		if ($xcity=="00")
		{
			$nompais = $rowpais['cnomubigeo'].' / '.$rowdpto['cnomubigeo'];
			return $nompais;
		}
		else
		{
			$sqlcity = db_query("SELECT cnomubigeo FROM webubigeo WHERE  ccodubigeo = '".$ubigeo."' ");
			$rowcity = db_fetch_array($sqlcity);
			$nompais = $rowpais['cnomubigeo'].' / '.$rowdpto['cnomubigeo'].' / '.$rowcity['cnomubigeo'];
			return $nompais;
		}
	}
}

function logo($weblogo)
{
	if ($weblogo!="")
	{
	echo "<div class='websitelogo'>";
	echo "<a href='".WEB_DOMINIO."' title='".$webempresa."' ><img src='/webfiles/fotosusuarios/".$weblogo."' border='0' alt='".$webempresa."' ></a>";
	echo "</div>";
	}
}
function tep_redirect($url) 
{
	echo "<script language:javascript>";
	echo "window.location.href='".$url."';";
	echo "</script>";
}
function get_file_extension($filename)
{		preg_match("/(.*)\.([a-zA-Z0-9]{0,5})$/", $filename, $regs);
		return($regs[2]);
}
function codigo_azar($length)
{
    $str = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        
    for($i=0;$i<$length;$i++) 
        $key .= $str[mt_rand(0,strlen($str)-1)];
    return $key;
} 
function validar_letras($cadena)
{	if(ereg("^[a-zA-Z�������\ ]+$",$cadena))	return true;
	else 								return false;
}
function validar_fecha($cadena)
{	
	$anho= substr($cadena,0,4);
	$mes = substr($cadena,5,2);
	$dia = substr($cadena,8,2);
	if(!ereg("^([0-9]{4})+\-([0-9]{2})+\-([0-9]{2})+$",$cadena))	{	return false;	}
	else	{

		if($anho<1940 || $anho>2007)  {		return false;	}
		else 						    {
	switch ($mes) { 
    		case '01': 
			        if($dia>=1 && $dia<=31) return true;
					else					 return false;
		    break; 
		    case '02': 
					if($anho%4==0 && $anho%100!=0 || $anho%400==0) 
					{	if($dia>=1 && $dia<=29)	return true;
						else						return false;
					}
					else 								
					{	if($dia>=1 && $dia<=28)	 return true;
						else					   	  	 return false;
					}
			break;
	 
    		case '03': 
			        if($dia>=1 && $dia<=31) return true;
					else					   return false;
			break; 
		
			case '04': 
        			if($dia>=1 && $dia<=30) return true;
					else					   return false;
			break; 	
		
			case '05': 
			        if($dia>=1 && $dia<=31) return true;
					else					   return false;
	        break; 		
		
			case '06': 
			        if($dia>=1 && $dia<=30) return true;
					else					   return false;
		    break; 
		
			case '07': 
			        if($dia>=1 && $dia<=31) return true;
					else					   return false;
		    break; 	

			case '08': 
			        if($dia>=1 && $dia<=31) return true;
					else					   return false;
	        break; 	
		
			case '09': 
	 			   if($dia>=1 && $dia<=30) return true;
				   else					   return false;
	        break; 	
			
			case '10': 
			        if($dia>=1 && $dia<=31) return true;
					else					   return false;
		    break; 	
		
			case '11': 
        			if($dia>=1 && $dia<=30) return true;
					else					   return false;
		   	break; 	
		
			case '12': 
			        if($dia>=1 && $dia<=31) return true;
					else					   return false;
		    break; 							
		 	} // switch
		}//else
	 } // else
	
}
function validar_passwd($cadena)
{	if(ereg("^[a-zA-Z0-9]+$",$cadena))	return true;
	else 								return false;
}
function validar_email($address)
{	if(ereg("^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-\.]+$",$address))		return true;
	else		return false;
}
function validar_alfanum($cadena)
{	if(ereg("^[a-zA-Z0-9�������\@\_\,\.\:\ \?\-]+$",$cadena))	return true;
	else 								return false;
}
function validar_numero($cadena)
{	if(ereg("^[0-9]+$",$cadena))		return true;	
	else 							return false;
}
function validar_letrasbd($cadena)
{	if(ereg("^[a-zA-Z0-9\ \/]+$",$cadena))		return true;	
	else 							return false;
}
function validar_nick($cadena)
{	if(ereg("^[a-zA-Z0-9\_\-]+$",$cadena))		return true;	
	else 									return false;
}
function validar_alfanumerico($cadena)
{	if(ereg("^[a-zA-Z0-9\_]+$",$cadena))		return true;	
	else 									return false;
}
function validar_web($cadena)
{	if(ereg("^www.[a-zA-Z0-9\/\_\.]+$",$cadena))		return true;	
	else 							return false;
}
function validar_pagweb($cadena)
{	if(ereg("^[a-zA-Z0-9\_\.]+$",$cadena))		return true;	
	else 							return false;
}
function edad($edad){
	list($anio,$mes,$dia) = explode("-",$edad);
	$anio_dif = date("Y") - $anio;
	$mes_dif = date("m") - $mes;
	$dia_dif = date("d") - $dia;
	if ($dia_dif < 0 || $mes_dif < 0)
	$anio_dif--;
	return $anio_dif;
}
function ubicacion($ubigeo){
	$sqlubicacion = db_query("select * from webubigeo where ccodubigeo='".$ubigeo."'");
	$ciudad       = "";
	while($rowubicacion = db_fetch_array($sqlubicacion)) 
	{
		$ciudad= $rowubicacion['cnomubigeo'];
	}
	return $ciudad;
}
function CalendarioPHP($year, $month)
{
$ColorFondoCelda = '#CCCCCC';
$ColorFondoTabla = '#006699';
//Calculo la fecha actual
$dia_actual=date("j",time());
$mes_actual=date("n",time());
$anio_actual=date("Y",time());

$first_of_month = mktime (0,0,0, $month, 1, $year);
$maxdays = date('t', $first_of_month); #number of days in the month
$date_info = getdate($first_of_month); #get info about the first day of the month
$month = $date_info['mon'];
$year = $date_info['year'];

//Traduzco los meses de ingles a Espa�ol
switch ($date_info['mon']) 
{
	case "January" : $date_info[$month]="Enero";break;
	case "February" : $date_info[$month]="Febrero";break;
	case "March" : $date_info[$month]="Marzo";break;
	case "April" : $date_info[$month]="Abril";break;
	case "May" : $date_info[$month]="Mayo";break;
	case "June" : $date_info[$month]="Junio";break;
	case "July" : $date_info[$month]="Julio";break;
	case "August" : $date_info[$month]="Agosto";break;
	case "September": $date_info[$month]="Septiembre";break;
	case "October" : $date_info[$month]="Octubre";break;
	case "November" : $date_info[$month]="Noviembre";break;
	case "December" : $date_info[$month]="Diciembre";break;
};

//Comienzo la tabla que contiene el calendario
$calendar = ("<table border='0' width='225' cellspacing='1' cellpadding='2' bgcolor='#e3e3e3'>\n");
$calendar .= "<tr>\n";
$calendar .= "<td height='35' colspan='7' class='zonap_titulo'>".$date_info[month]." - ".$year."</td>\n";
$calendar .= "<tr>\n";
$calendar .= "<td height='30' class='zonap_subtitulo'>D</td>\n";
$calendar .= "<td class='zonap_subtitulo'>L</td>\n";
$calendar .= "<td class='zonap_subtitulo'>M</td>\n";
$calendar .= "<td class='zonap_subtitulo'>M</td>\n";
$calendar .= "<td class='zonap_subtitulo'>J</td>\n";
$calendar .= "<td class='zonap_subtitulo'>V</td>\n";
$calendar .= "<td class='zonap_subtitulo'>S</td>\n";
$calendar .= "</tr>\n";

//$weekday = $date_info['wday']-1; //Para que sea el Lunes el primer dia de la semana
$weekday = $date_info['wday']; 

$day = 1; 
// Los primeros dias "vacios" del mes
if($weekday > 0)
{
	$calendar .= ("<td colspan='".$weekday."'></td>\n");
}

//Imprimimos los dias del mes
while ($day <= $maxdays)
{
	if($weekday == 7)
	{ //Empieza una nueva semana
		$calendar .= "</tr>\n<tr>\n";
		$weekday = 0;
	}
	$colorcelda = "background-color:#EEF2F7;";
	$nvafecha = $year."-".$month."-".$day;
	$sqlfecha = db_query("SELECT * FROM hoteltemporada t, hotelfechas f where t.ccodtemporada = f.ccodtemporada and f.dfechotel='".$nvafecha."'");
	while($rowfecha = db_fetch_array($sqlfecha))
	{
			$colorcelda = "background-color:#".$rowfecha['ccoltemporada'].";";
	}

		
	// Aqui es donde le pongo lo que tiene que hacer en caso de exista enlace
	//$link = (basename($_SERVER["PHP_SELF"]))."?fecha=".$month."/".$day."/".$year;
	$xfecha = $day."-".$month."-".$year;
	$link="javascript:asignartemporada('".$xfecha."')";
	
	$calendar .= "<td width='50' height=25' align='center' valign='middle' style='".$colorcelda."' ><a href=".$link.">".$day."</a></td>\n";
	$day++;
	$weekday++;
}
	//Cuidadin con los ultimos dias vacios del mes
if($weekday != 7)
{
	$calendar .= '<td colspan="' . (7 - $weekday) . '"></td>';
}
$calendar.="</tr>\n</table>\n";
return $calendar;
} 
//Formato $fecha yyyymmdd
function nextDate($fecha,$dias) {
$diaActual = substr($fecha,6,2);
$mesActual = $mesProx = substr($fecha,4,2);
$anioActual = $anioProx = substr($fecha,0,4);
$diaProx = $diaActual + $dias;
$diasMes = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anioActual);
if ($diaProx > $diasMes) {
$diaProx = $dias - ($diasMes - $diaActual);
$mesProx = $mesActual + 1;
if ($mesProx > 12) {
$mesProx = "01";
$anioProx = $anioActual + 1;
}
$diasProxMes = cal_days_in_month(CAL_GREGORIAN, $mesProx, $anioProx);
if ($diaProx > $diasProxMes) {
$dias = $diaProx - $diasProxMes;
$diaProx = (strlen($diaProx) == 1)?"0".$diaProx:$diaProx;
$mesProx = (strlen($mesProx) == 1)?"0".$mesProx:$mesProx;
return nextDate($anioProx.$mesProx.$diasProxMes,$dias);
}
}
$diaProx = (strlen($diaProx) == 1)?"0".$diaProx:$diaProx;
$mesProx = (strlen($mesProx) == 1)?"0".$mesProx:$mesProx;
return $anioProx.'-'.$mesProx.'-'.$diaProx;
}
function getCountry($ip_address){
      $url = "http://ip-to-country.webhosting.info/node/view/36";
      $inici = "src=/flag/?type=2&cc2=";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST,"POST");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, "ip_address=$ip_address"); 
      ob_start();
      curl_exec($ch);
      curl_close($ch);
      $cache = ob_get_contents();
      ob_end_clean();
      $resto = strstr($cache,$inici);
      $pais = substr($resto,strlen($inici),2);
      return $pais;
   }
function idiomas()
{
	$sqlidioma = db_query("SELECT * FROM page WHERE  cestpage='1'");
	$nroidioma = db_num_rows($sqlidioma);
	if ($nroidioma > 1)
	{
	    echo "<div class='websiteidioma'>";
		while ($rowidioma = db_fetch_array($sqlidioma)) 
		{
		?>
		<a href="http://<?=$rowidioma['camipage']?>"><img src="/estilos/images/ban<?=$rowidioma['ccodidioma']?>.gif"  border='0'  alt="<?=$rowidioma['cnompage']?>"> <?=$rowidioma['cnompage']?></a>&nbsp;&nbsp;
	    <?php
		}
		echo "</div>";
	}
}

//------------------- Inicio  http://www.php.net/manual/es/function.get-browser.php ----------------------------------------------
	function getBrowser() 
		{ 
			$u_agent = $_SERVER['HTTP_USER_AGENT']; 
			$bname = 'Unknown';
			$platform = 'Unknown';
			$version= "";
		
			//First get the platform?
			if (preg_match('/linux/i', $u_agent)) {
				$platform = 'linux';
			}
			elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
				$platform = 'mac';
			}
			elseif (preg_match('/windows|win32/i', $u_agent)) {
				$platform = 'windows';
			}
			
			// Next get the name of the useragent yes seperately and for good reason
			if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
			{ 
				$bname = 'Internet Explorer'; 
				$ub = "MSIE"; 
			} 
			elseif(preg_match('/Firefox/i',$u_agent)) 
			{ 
				$bname = 'Mozilla Firefox'; 
				$ub = "Firefox"; 
			} 
			elseif(preg_match('/Chrome/i',$u_agent)) 
			{ 
				$bname = 'Google Chrome'; 
				$ub = "Chrome"; 
			} 
			elseif(preg_match('/Safari/i',$u_agent)) 
			{ 
				$bname = 'Apple Safari'; 
				$ub = "Safari"; 
			} 
			elseif(preg_match('/Opera/i',$u_agent)) 
			{ 
				$bname = 'Opera'; 
				$ub = "Opera"; 
			} 
			elseif(preg_match('/Netscape/i',$u_agent)) 
			{ 
				$bname = 'Netscape'; 
				$ub = "Netscape"; 
			} 
			
			// finally get the correct version number
			$known = array('Version', $ub, 'other');
			$pattern = '#(?<browser>' . join('|', $known) .
			')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
			if (!preg_match_all($pattern, $u_agent, $matches)) {
				// we have no matching number just continue
			}
			
			// see how many we have
			$i = count($matches['browser']);
			if ($i != 1) {
				//we will have two since we are not using 'other' argument yet
				//see if version is before or after the name
				if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
					$version= $matches['version'][0];
				}
				else {
					$version= $matches['version'][1];
				}
			}
			else {
				$version= $matches['version'][0];
			}
			
			// check if we have a number
			if ($version==null || $version=="") {$version="?";}
			
			return array(
				'userAgent' => $u_agent,
				'name'      => $bname,
				'version'   => $version,
				'platform'  => $platform,
				'pattern'    => $pattern
			);		
		} 		
	// now try it
	//	$ua=getBrowser();
	//$yourbrowser= "Your browser: " . $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'] . " reports: <br >" . $ua['userAgent'];
	//print_r($yourbrowser);	
	//echo $ua['name'];
	
 //------------------- FIN  http://www.php.net/manual/es/function.get-browser.php ---------------------------------------------- 
?>