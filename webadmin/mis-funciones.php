<?php 
	if (!function_exists('primera_imagen')) { 
		 function primera_imagen($texto) {
			$foto = '';
			ob_start();
			ob_end_clean();
			preg_match_all("/<img[\s]+[^>]*?src[\s]?=[\s\"\']+(.*\.([gif|jpg|png|jpeg]{3,4}))[\"\']+.*?>/", $texto, $array);
			$foto = $array [1][0];
			if(empty($foto)){
				$foto = '';
			}
			return $foto;
		}
	}
	/*tep_redirect('/404.php');*/ 	
	function tep_redirect($url) 
	{
		echo "<script language:javascript>";
		echo "window.location.href='".$url."';";
		echo "</script>";
	}
	
	if (!function_exists('trasformar_espacio_guiones')) { 
		 function trasformar_espacio_guiones($texto) {
    		 $texto_cambiado = str_replace(" ", "-", $texto);
			return $texto_cambiado;
		}
	}
	
	//http://www.forosdelweb.com/f18/como-trasformar-espacio-guiones-859714/
	function urls_amigables($url) { 
		// Tranformamos todo a minusculas		 
		$url = strtolower($url);		 
		//Rememplazamos caracteres especiales latinos		 
		$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');		 
		$repl = array('a', 'e', 'i', 'o', 'u', 'n');		 
		$url = str_replace ($find, $repl, $url);		 
		// Añaadimos los guiones		 
		$find = array(' ', '&', '\r\n', '\n', '+'); 
		$url = str_replace ($find, '-', $url);		 
		// Eliminamos y Reemplazamos demás caracteres especiales		 
		$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');		 
		$repl = array('', '-', '');		 
		$url = preg_replace ($find, $repl, $url);		 
		return $url; 
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
 
 
 /**
 * Funcion que devuelve una fecha en formato ingles: yyyy/mm/dd o
 *  yyyy/mm/dd hh:mm:ss segun si recibe la hora
 * Tiene que recibir la fecha en formato español:
 *  dd/mm/yyyy
 *  d/m/yy
 * NOTA: Puede recibir la hora (dd/mm/yyyy hh:mm:ss)S
 */
function convertirFecha_SpanishToEnglish($date)
{
    if($date)
    {
        $fecha=$date;
        $hora="";

        # separamos la fecha recibida por el espacio de separación entre
        # la fecha y la hora
        $fechaHora=explode(" ",$date);
        if(count($fechaHora)==2)
        {
            $fecha=$fechaHora[0];
            $hora=$fechaHora[1];
        }

        # cogemos los valores de la fecha
        $values=preg_split('/(\/|-)/',$fecha);
        if(count($values)==3)
        {
            # devolvemos la fecha en formato ingles
            if($hora && count(explode(":",$hora))==3)
            {
                # si la hora esta separada por : y hay tres valores...
                $hora=explode(":",$hora);
                return date("Y/m/d H:i:s",mktime($hora[0],$hora[1],$hora[2],$values[1],$values[0],$values[2]));
            }else{
                return date("Y/m/d",mktime(0,0,0,$values[1],$values[0],$values[2]));
            }
        }
    }
    return "";
}
	
/**
 * Funcion que devuelve una fecha a letras
 *  Solo recuerden que deben llamarla así: 
$fecha = '2013-04-07';
echo fecha_a_letras($fecha);
 */	
function  fecha_a_letras($x) {
   $year = substr($x, 0, 4);
   $mon = substr($x, 5, 2);
   switch($mon) {
      case "01":
         $month = "Enero";
         break;
      case "02":
         $month = "Febrero";
         break;
      case "03":
         $month = "Marzo";
         break;
      case "04":
         $month = "Abril";
         break;
      case "05":
         $month = "Mayo";
         break;
      case "06":
         $month = "Junio";
         break;
      case "07":
         $month = "Julio";
         break;
      case "08":
         $month = "Agosto";
         break;
      case "09":
         $month = "Septiembre";
         break;
      case "10":
         $month = "Octubre";
         break;
      case "11":
         $month = "Noviembre";
         break;
      case "12":
         $month = "Diciembre";
         break;
   }
   $day = substr($x, 8, 2);
   return $day." de ".$month." de ".$year;
}
 	
?>
