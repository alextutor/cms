<?Php  session_start();
   // Este script solo mueve una subsección a ser sección de  primer nivel;
   // Ingresar el código a cambiar y a qué Nivel se Moverá (se trabaja con la tabla sección).   
   
   // Nota Importante alex: solo se deve pasar por insertar seccionmenu(InsertarSeccionmenu) las subsecciones 
   //que pasan a primer nivel es decir pasan a ser una seccion 
   
	//-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];		
	 include($_SERVER['DOCUMENT_ROOT']. '/config.php');		
	 
	//---------------	
	// $CodigoaCambiar="121728122000000400000000"; //Por Marca de Vehiculo 
	 $CodigoaCambiar  ="121728122000000200000000";   //Por Marca de Motor 	 
	 $cnivseccion="1"; //a que Nivel el padre se movera 
	 //--------------
	 
	//$codigo      = "1217280600140000000000000000";
	$selectpage  = $_SESSION['selectpage'];
	$secci = $selectpage;//$form_entrada['selectpage']
	$nivel=0; //empieza con 0 ver donde se modifica porque lagunos aparecen con 2 o 3 a mas tambien se usara para insertar a seccionmenu
	$csecc = substr($secci,0,8+($nivel*4));
	$posix  = (9 +( $nivel *4));
  	$sqlcad     = "select max(substring(ccodseccion,".$posix.",4))+1 from seccion   where ccodseccion like '".$csecc."%' and cnivseccion='".($nivel+1)."'";
	
	$query_cod  = db_query($sqlcad);
	list($cod2) = mysql_fetch_array($query_cod);
	if(!isset($cod2))	$cod2='0001';		
	$codigoNuevo = $csecc.substr_replace($var, $cod2, strlen($var)-strlen($cod2), strlen($cod2)).'000000000000';	
	$ccodplantilla= "0";
	//echo $codigoNuevo;exit;
	//echo $CodigoaCambiar;exit;	
	                 
	//------------------------nivel padre----------------------
	$sqlmenucab2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion,cnivseccion FROM seccion  WHERE  ccodseccion like '".$CodigoaCambiar."%'  and cnivseccion=2 and  estado='1' ORDER BY  cordcontenido ASC";
	$resmenucab2 = db_query($sqlmenucab2);
	$nromenucab2 = db_num_rows($resmenucab2);
	while ($rowmenucab2 = db_fetch_array($resmenucab2)) 
	{
		//echo $rowmenucab2['cnomseccion']."<br>";
		$s2 = substr($rowmenucab2['ccodseccion'],0,16); /* Utilizado para Menu Nivel2 */
		$cnivseccion2=$rowmenucab2['cnivseccion']; // le suma uno para buscar el menu de abajo
		$ActualizaSeccion = "UPDATE seccion SET						
					  ccodseccion      ='".$codigoNuevo."',
					  cnivseccion	   ='".$cnivseccion."'  			
					  WHERE ccodseccion='".$CodigoaCambiar."'";
		
		mysql_query($ActualizaSeccion);   // 1) Primer  Insert
		
		/*-----------------Inicio ActualizaSeccionmenu -------------------------*/
		/* si el codigo a mover era una subseccion no se encontrara el codigo de las seccion; porque en Insertar-sub-seccion.php 
		no se inserta un registro a seccionmenu hay que poner una condicion alex para que no pase por aqui pero no importa
		no afecta en nada porque no lo encontrara */			  		
		$ActualizaSeccionmenu = "UPDATE seccionmenu SET						
					  ccodseccion      ='".$codigoNuevo."' 							
					  WHERE ccodseccion='".$CodigoaCambiar."'";						  
		mysql_query($ActualizaSeccionmenu); 
		/*-----------------Fin ActualizaSeccionmenu -------------------------*/		
		
		/*-----------------Inicio Actualiza tabla seccioncontenido -------------------------*/
		// actualiza los articulos que se an ingresado en esa seccion
		$ActualizaSeccioncontenido = "UPDATE seccioncontenido SET						
					  ccodseccion      ='".$codigoNuevo."' 							
					  WHERE ccodseccion='".$CodigoaCambiar."'";						  
		mysql_query($ActualizaSeccioncontenido); 		
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
				mysql_query($save2_query);	 // 2) Segundo  Insert
			}
	}	
		/*-----------------Fin InsertarSeccionmenu -------------------------*/
				
			  
		echo $rowmenucab2['cnomseccion']."---Padre:--".$ActualizaSeccion."<br><br>";		
		
 }//Fin while padre
		



//------------------------2 nivel----------------------
$sqlmenucab3 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s2."%'  and cnivseccion=".($cnivseccion2+1) ." and  estado='1' ORDER BY cordcontenido ASC   ";
  //echo $sqlmenucab3;exit;
  $resmenucab3 = db_query($sqlmenucab3);
  $nromenucab3 = db_num_rows($resmenucab3);
  while ($rowmenucab3 = db_fetch_array($resmenucab3)) 
  {
	  // echo "<br>";
	  //echo "(".$rowmenucab3['cnomseccion'].")"."<br><br>";
	  //echo $rowmenucab3['ccodseccion']."<br>";
	  $s3 = substr($rowmenucab3['ccodseccion'],0,20);			
	  
	  $codigoNuevoMenos16delante  = substr( $codigoNuevo, 0, 12);  // 1217281220140000
	  $codigoAntiguoMenos8final  = substr( $rowmenucab3['ccodseccion'], 16,8 );  // 1217281220140000
	  
	  //echo  $rowmenucab3['ccodseccion']."<br>";
	  //echo $codigoNuevoMenos16delante.$codigoAntiguoMenos8final;exit;				 
	  $codigo2      = $codigoNuevoMenos16delante.$codigoAntiguoMenos8final ."0000" ;		
	  $ActualizaSubSeccion2 = 
				"UPDATE seccion SET						
				 ccodseccion      ='".$codigo2."',
				 cnivseccion	   ='".($cnivseccion+1) . "'   			
				 WHERE ccodseccion='".$rowmenucab3['ccodseccion']."'";
				 
				mysql_query($ActualizaSubSeccion2);	 // 3) Tercer  Insert	
				
		/*-----------------Inicio Actualiza tabla seccioncontenido 2do Nivel -------------------------*/
		// actualiza los articulos que se an ingresado en esa seccion
		$ActualizaSeccioncontenido2 = "UPDATE seccioncontenido SET						
					  ccodseccion      ='".$codigo2."' 							
					  WHERE ccodseccion='".$rowmenucab3['ccodseccion']."'";						  
		mysql_query($ActualizaSeccioncontenido2); 		
		/*-----------------Fin Actualiza tabla seccioncontenido 2do Nivel -------------------------*/
		
					
	  echo "<br><strong>";
	  echo  "---Nivel01:---".$rowmenucab3['cnomseccion']."<br>". $ActualizaSubSeccion2."</strong><br><br>";			
	  
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
		  
		  $codigoNuevoMenos16delante2  = substr( $codigoNuevo, 0, 12);  // 121728122014 0000
		  $codigoAntiguoMenos8final2 = substr( $rowmenucab4['ccodseccion'], 16,8 );  // 1217281220140000
		  //121728122014 0000 0023 0001
		  //121728122014 0000 0023
		  
		  //echo  $rowmenucab3['ccodseccion']."<br>";
		  //echo $codigoNuevoMenos16delante.$codigoAntiguoMenos8final;exit;				 
		  $codigo4      = $codigoNuevoMenos16delante2.$codigoAntiguoMenos8final2 ."0000" ;		
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
		mysql_query($ActualizaSeccioncontenido3); 		
		/*-----------------Fin Actualiza tabla seccioncontenido 3er Nivel -------------------------*/
		
		
					 	
		  echo "---Nivel02:---".$rowmenucab4['cnomseccion'].$ActualizaSubSeccion4."<br><br>";		  	 
		  
		  mysql_query($ActualizaSubSeccion4);	// 4) Cuarto  Insert				  
		   
	  }	//Fin while 3		
	//------------------------Fin 3 nivel---------------------						  
  }	//Fin while 2					
?>      