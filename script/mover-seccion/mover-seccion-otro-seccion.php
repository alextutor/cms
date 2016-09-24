<?Php  session_start();
   // Este script Mueve seccion entre secciones;
   
	//-------para que no me muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];		
	 include($_SERVER['DOCUMENT_ROOT']. '/config.php');		
	 $selectpage  = $_SESSION['selectpage'];
	 
	//---------------	
	 $cCodigoPadre  = "121728122014002800000000";     //  (Padre (CHINOS)) Ingrear el Codigo de la seccion padre donde se moveran las secciones . 
	 
	 $CodigoaMover  = "121728122014000800000000";   // (Origen) Ingrese el codigo de la seccion a Mover. DFAC.
	 //$secci = $selectroot;   // ccodseccion del padre
	 
 	 $nivel ="2" ;  // $selectnivel  -  cnivseccion del padre	 	 
	 //Conclusion  la seccion DFAC se Movera en la seccion CHINOS.mas abajo programar para que las subsecciones de DFAC tambien cambien el codigo.
	 
	 //121728122014002300010000 es el codigo de la subseccion DFA6920KB que se Encuentra dentro de la seccion DFAC 
	 //--------------	
	
	$csecc = substr($cCodigoPadre,0,8+($nivel*4));	
	$posix  = (9 +( $nivel *4));
	//$sqlcad  devuelve un entero cuanta cuantos registros hay en el resultado de la consulta  y lo suma uno 
	$sqlcad     = "select max(substring(ccodseccion,".$posix.",4))+1 from seccion   where ccodseccion like '".$csecc."%' and cnivseccion='".($nivel+1)."'";
	//echo $sqlcad,exit;
	$query_cod  = db_query($sqlcad);
	list($cod2) = mysql_fetch_array($query_cod);
	if(!isset($cod2))	$cod2='0001';	
	$var    = '0000';
	$menuinden ="0";		
	$codigoNuevo      = $csecc.substr_replace($var, $cod2, strlen($var)-strlen($cod2), strlen($cod2)).'0000000000000000';
	//echo $codigo;exit;
	$ccodplantilla= "0";	
	$sqlp    = "SELECT ccodplantilla FROM page  WHERE ccodpage='".$selectpage."'";
    $queryp  = db_query($sqlp);
	$rspagina    = db_fetch_array($queryp);
	$imagencab="";//mas opciones
	$menuinden ="0";	
	//$txtpaginar="0";
	//$selectorden="0";			
	//echo $codigo;exit; 
	 
	//------------------------nivel padre   ---------------
	//Lista el codigo a Mover pero sinceramente alex no se porque lo liste era poner defrente el Update con el codigo a mover pero en fin
	$sqlmenucab2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion,cnivseccion FROM seccion  WHERE  ccodseccion like '".$CodigoaMover."%'  and  estado='1' ORDER BY  cordcontenido ASC";
	//echo $sqlmenucab2;exit;
	$resmenucab2 = db_query($sqlmenucab2);
	$nromenucab2 = db_num_rows($resmenucab2);
	while ($rowmenucab2 = db_fetch_array($resmenucab2)) 
	{
		//echo $rowmenucab2['cnomseccion']."<br>";
		$s2 = substr($rowmenucab2['ccodseccion'],0,16); /* Utilizado para Menu Nivel2 */
		$cnivseccion2=$rowmenucab2['cnivseccion']; // le suma uno para buscar el menu de abajo
		$ActualizaSeccion = "UPDATE seccion SET						
					  ccodseccion      ='".$codigoNuevo."',
					  cnivseccion	   ='".($nivel+1)."',
					  cnewmenu  	   ='".$menuinden."'		
					   WHERE ccodseccion='".$CodigoaMover."'";
		
		 $lNivel_1=mysql_query($ActualizaSeccion);   								// 1) Primer  Insert
		
		//echo $ActualizaSeccion ."<br/><br/>";exit;
		
		/*-----------------Inicio ActualizaSeccionmenu -------------------------*/
		/* si el codigo a mover era una subseccion no se encontrara el codigo de la seccion, porque en Insertar-sub-seccion.php 
		no se inserta un registro a seccionmenu hay que poner una condicion alex para que no pase por aqui pero no importa
		no afecta en nada porque no lo encontrara */			  		
		$ActualizaSeccionmenu = "UPDATE seccionmenu SET						
					  ccodseccion      ='".$codigoNuevo."' 							
					  WHERE ccodseccion='".$CodigoaMover."'";						  
				mysql_query($ActualizaSeccionmenu); 						// 2) segundo  Insert
		/*-----------------Fin ActualizaSeccionmenu -------------------------*/		
		
		/*-----------------Inicio Actualiza tabla seccioncontenido -------------------------*/
		// actualiza los articulos que se an ingresado en esa seccion
		$ActualizaSeccioncontenido = "UPDATE seccioncontenido SET						
					  ccodseccion      ='".$codigoNuevo."' 							
					  WHERE ccodseccion='".$CodigoaMover."'";						  
					mysql_query($ActualizaSeccioncontenido); 				// 3) tercer  Insert
				
		/*-----------------Fin Actualiza tabla seccioncontenido -------------------------*/
		
		
		/*-----------------Inicio InsertarSeccionmenu  -------------------------*/
		/***  Nota Importante alex: solo se deve pasar por insertar seccionmenu(InsertarSeccionmenu) las subsecciones 
		que pasan a primer nivel es decir pasan a ser una seccion 
		Grabado de Ubicaciones de Menu 	sacado de Insertar-seccion.php*/
	if ($nivel<=1)
	{
		 //$rdmenu1=cabecera;  $rdmenu2=pie;		
		$sqlmenuubi = "select * from pagemenu where ccodpage='".$selectpage."' and cestmenu='1'";
		//echo $sqlmenuubi;exit;
		$resmenuubi = db_query($sqlmenuubi);
		while ($rows_menuubi = mysql_fetch_array($resmenuubi)) 
		{
				$save2_query = "INSERT INTO seccionmenu (ccodseccion,ccodmenu, cordmenu) VALUES ('".$codigoNuevo."','".$rows_menuubi['ccodmenu']."','0')";
				//echo $save2_query;exit;
				 mysql_query($save2_query);	 						// 4) Cuarto Insert
			}
	}	
		/*-----------------Fin InsertarSeccionmenu -------------------------*/
						  
		//echo $rowmenucab2['cnomseccion']."---Padre:--".$ActualizaSeccion."<br><br>";		
		
 }//Fin while padre
		
//exit;
//------------------------2 nivel----------------------
$sqlmenucab3 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s2."%'  and cnivseccion=".($cnivseccion2+1) ." and  estado='1' ORDER BY cordcontenido ASC   ";
  //echo $sqlmenucab3;exit;
  $resmenucab3 = db_query($sqlmenucab3);
  $nromenucab3 = db_num_rows($resmenucab3);
  while ($rowmenucab3 = db_fetch_array($resmenucab3)) 
  {
	  //echo $codigoNuevo."<br/>";exit;	  
	  $s3 = substr($rowmenucab3['ccodseccion'],0,20);			
	  
	  /* lo mismo que arriba alex*/
	 $cCodigoPadre  = $codigoNuevo;
  	 $nivel =$nivel+1 ;  
	   
	$csecc = substr($cCodigoPadre,0,8+($nivel*4));	
	$posix  = (9 +( $nivel *4));
	//$sqlcad  devuelve un entero cuanta cuantos registros hay en el resultado de la consulta  y lo suma uno 
	$sqlcad     = "select max(substring(ccodseccion,".$posix.",4))+1 from seccion   where ccodseccion like '".$csecc."%' and cnivseccion='".($nivel+1)."'";
	//echo $sqlcad,exit;
	$query_cod  = db_query($sqlcad);
	list($cod2) = mysql_fetch_array($query_cod);
	if(!isset($cod2))	$cod2='0001';	
	$var    = '0000';
	$menuinden ="0";		
	$codigoNuevo3      = $csecc.substr_replace($var, $cod2, strlen($var)-strlen($cod2), strlen($cod2)).'0000000000000000';
	//echo $codigo;exit;
	$ccodplantilla= "0";	
	$sqlp    = "SELECT ccodplantilla FROM page  WHERE ccodpage='".$selectpage."'";
    $queryp  = db_query($sqlp);
	$rspagina    = db_fetch_array($queryp);
	$imagencab="";//mas opciones
	$menuinden ="0";	
    
	$ActualizaSubSeccion2 = 
				"UPDATE seccion SET						
				 ccodseccion      ='".$codigoNuevo3."',
				 cnivseccion	   ='".($nivel+1) . "'   			
				 WHERE ccodseccion='".$rowmenucab3['ccodseccion']."'";
				 
				mysql_query($ActualizaSubSeccion2);	 // 5) quinto Insert	
		//echo  $ActualizaSubSeccion2;exit;		
		/*-----------------Inicio Actualiza tabla seccioncontenido 2do Nivel -------------------------*/
		// actualiza los articulos que se an ingresado en esa seccion
		$ActualizaSeccioncontenido2 = "UPDATE seccioncontenido SET						
					  ccodseccion      ='".$codigoNuevo3."' 							
					  WHERE ccodseccion='".$rowmenucab3['ccodseccion']."'";						  
					
					mysql_query($ActualizaSeccioncontenido2); 		// 6) Sexto Insert
		
		/*-----------------Fin Actualiza tabla seccioncontenido 2do Nivel -------------------------*/
		
					
	  //echo "<br><strong>";
	  //echo  "---Nivel01:---".$rowmenucab3['cnomseccion']."<br>". $ActualizaSubSeccion2."</strong><br><br>";				  
	  
	  //------------------------Inicio 3 nivel----------------------
	$sqlmenucab4 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s3."%'  and cnivseccion=".($cnivseccion2+2) ." and  estado='1' ORDER BY cordcontenido ASC   ";
	  //echo ($cnivseccion2+2)."<br>";
	  //echo $sqlmenucab4."<br>"."<br>";
	  $resmenucab4 = db_query($sqlmenucab4);
	  $nromenucab4 = db_num_rows($resmenucab4);
	  while ($rowmenucab4 = db_fetch_array($resmenucab4)) 
	  {
		 //echo "  --".$rowmenucab4['cnomseccion']."<br>";
		  //echo $rowmenucab3['ccodseccion']."<br>";
		  $s4 = substr($rowmenucab4['ccodseccion'],0,20);			
		  
		 //alex implementar lo que hize en 2 nvivel	
		  $ActualizaSubSeccion4 = 
					"UPDATE seccion SET						
					 ccodseccion      ='".$codigo4."',
					 cnivseccion	   ='".($cnivseccion+2) . "'   			
					 WHERE ccodseccion='".$rowmenucab4['ccodseccion']."'";	
					 
					 
		 /*-----------------Inicio Actualiza tabla seccioncontenido 3er Nivel -------------------------*/
		// actualiza los articulos que se an ingresado en esa seccion
		$ActualizaSeccioncontenido3 = "UPDATE seccioncontenido SET						
					  ccodseccion      ='".$codigo4."' 							
					  WHERE ccodseccion='".$rowmenucab4['ccodseccion']."'";						  
					  
				//mysql_query($ActualizaSeccioncontenido3); 						// 7) septimo  Insert
				
		/*-----------------Fin Actualiza tabla seccioncontenido 3er Nivel -------------------------*/
		
		
					 	
		  			//echo "---Nivel02:---".$rowmenucab4['cnomseccion'].$ActualizaSubSeccion4."<br><br>";		  	 
		  
		  		//mysql_query($ActualizaSubSeccion4);	// 						// 8) Octavo Insert			  
		   
	  }	//Fin while 3		
	//------------------------Fin 3 nivel---------------------						  
  }	//Fin while 2					
?>      