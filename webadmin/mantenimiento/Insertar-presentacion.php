<?php    session_start(); 		  
   extract($_POST); 
     //echo $seltipo;exit;
	// echo $selectclase;exit;
   // mysql_query('SET NAMES utf8');        

   //-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	
    include_once($_SERVER['DOCUMENT_ROOT']. '/include/funciones_web.php');		 
   include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
   
   
   $juvame_error = "";
   if ($titulo=="") 		$juvame_error = " * Ingresar el nombre del Contenido";	
   elseif($seltipo=="")  $juvame_error = " * Debe Seleccionar un tipo de contenido";
			   //--------------********
  else
  {		
	   if($seltipo=='1')    //************ Imagen 
	   {
		   if($imagen=="") 			$juvame_error = " * Debe Seleccionar una imagen";
		   elseif($anchoimagen=="") 	$juvame_error = " * Debe Ingresar el ancho de la imagen";
		   elseif($altoimagen=="")  	$juvame_error = " * Debe Ingresar el alto de la imagen";		   
			   //--------------********
		   else{				 			
				//campo estado  = campo cesthome pero lo puse para mantener origen				
				$insertar = "insert into pagehome(
  			  mostrar_titulo, 
				ccodpage,
				cnomhome,
				cordpublica,
				ccodclase,
				estado,
				cesthome,				
				ctiphome,
				cimgpubli,
				nancho,
				cuni_medi_nancho,
				nalto,
				curlpubli,
				cubidestino,
				dfecinicio,
				dfecfinal,
				dfechome) 
				values(						
						'".$mostrar_titulo."',
						'".$selectpage."',
						'".$titulo."',
						'".$cordpublica."',
						'".$selectclase."',
						'1',
						'1',
						'".$seltipo."',
						'".$imagen."',
						'".$anchoimagen."',
						'".$cuni_medi_nancho_img."'
						'".$altoimagen."',
						'".$urlimagen."',
						'".$selectubicacion."',
						'".fechaymd($fechaini). "',
						'".fechaymd($fechafin). "',
						'".date('Y-m-d')."')";											
				
				//db_query($insertar);				
				$sqlcontenido =mysql_query($insertar,$conexion) or die ("problema con Insertar Imagen");
				
				if(!empty($seccionpage[0])){
					$selcodigo = db_query("select max(ccodinicio) as codigo from pagehome where ccodpage='".$selectpage."'");
					$cod = db_fetch_array($selcodigo);
					while (list ($key, $val) = each ($seccionpage) ){
						db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')");
					}
				}
				 
		   }  
	   }
	   elseif($seltipo=='2')  //************ Animacion Flash 
	   {
		   if($flash=="") 			$juvame_error = " * Debe Seleccionar un banner flash";
		   elseif($anchoflash=="") 	$juvame_error = " * Debe Ingresar el ancho del banner flash";
		   elseif($altoflash=="")  	$juvame_error = " * Debe Ingresar el alto del banner flash";
		  		   //--------------********
		   else{
				$insertar = "insert into pagehome(
				ccodpage,
				cnomhome,
				cordpublica,
				ccodclase,
				cesthome,
				estado,
				ctiphome,
				cimgpubli,
				nancho,
				cuni_medi_nancho,
				nalto,
				cubidestino,
				dfecinicio,
				dfecfinal,
				dfechome) 
				values(
				'".$selectpage."',
				'".$titulo ."',
				'".$cordpublica ."',
				'".$selectclase."',
				'1',
				'1',
				'".$seltipo."',
				'".$flash."',				
				'".$anchoflash."',
				'".$cuni_medi_nancho_flash."'
				'".$altoflash."',
				'".$selectubicacion."',
				'".fechaymd($fechaini). "',
				'".fechaymd($fechafin). "',
				'".date('Y-m-d')."')";
				
				//echo $insertar;exit;
				
				db_query($insertar);
				if(!empty($seccionpage[0])){
					$selcodigo = db_query("select max(ccodinicio) as codigo from pagehome where ccodpage='".$selectpage."'");
					$cod = db_fetch_array($selcodigo);
					while (list ($key, $val) = each ($seccionpage) ){
						db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')");
					}
				} 
		   }
	   }
	   elseif($seltipo=='3')  //************ Codigo Html 
	   {
		   if($htmlcodigo=="") $juvame_error = " * Debe Ingresar el Codigo HTML";		   
					   //--------------********
		   else{
			  
			   //echo $seccionpage[0];exit;
				$insertar = "insert into pagehome(
				mostrar_titulo,
				ccodpage,
				cnomhome,
				cordpublica,
				ccodclase,
				cesthome,
				estado,
				ctiphome,
				cadspubli,
				cubidestino,
				dfecinicio,
				dfecfinal,
				dfechome)
				values(
				'".$mostrar_titulo."',
				'".$selectpage."',
				'".$titulo."',
				'".$cordpublica."',
				'".$selectclase."',
				'1',
				'1',
				'".$seltipo."',
				'".$htmlcodigo."',
				'".$selectubicacion."',
				'".fechaymd($fechaini). "',
				'".fechaymd($fechafin). "',
				'".date('Y-m-d')."')";										
																				
				//db_query($insertar);				
				$sqlcontenido =mysql_query($insertar,$conexion) or die ("problema con Insertar Codigo Html");			   			
							   
				if(!empty($seccionpage[0])){
					$selcodigo = db_query("select max(ccodinicio) as codigo from pagehome where ccodpage='".$selectpage."'");
					$cod = db_fetch_array($selcodigo);
					while (list ($key, $val) = each ($seccionpage) ){
						db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')");
					}
				} 
		   }
	   }

	   elseif($seltipo=='4') //************ Contenido Dinamico
	   {
		   
		   if($nroitems=="")
		   { 
		   		$juvame_error = " * Debe Ingresar una Cantidad para mostrar"; 
		   }
		   //--------------********
		   else
		   {		
				//echo $selectclase."----";exit;
				//ccodclase cambiado por cclase porque no hay ccodclase
					//cclase cambiado por ccodclase porque deberia haber ccodclase
				$insertar = "insert into pagehome(
												  mostrar_titulo,
												  ccodpage,
												  cnomhome,
												  cordpublica,
												  ccodclase,
												  cesthome,
												  estado,
												  ctiphome,
												  ccodestilo,
												  ccodmodulo,
												  ccodseccion,
												  ccodcategoria,
												  nnroitems,
												  ccodorden,
												  cubidestino,
												  dfecinicio,
												  dfecfinal,
												  cpubsec,
												  cpubnom,
												  cpubres,
												  cpubimg,
												  cimgsize,
												  dfechome) 
										values(
												'".$mostrar_titulo."',
												'".$selectpage."',
												'".$titulo."',
												'".$cordpublica."',
												'".$selectclase."',
												'1',
												'1',
												'".$seltipo."',
												'".$selectestilo."',
												'".$modulodinam."',
												'".$secciondinam."',
												'".$selectcategoria."',
												'".$nroitems."',
												'".$ordendinam."',
												'".$selectubicacion."',
												'".fechaymd($fechaini). "',
												'".fechaymd($fechafin). "',
												'0',
												'1',
												'1',
												'1',
												'3',
												'".date('Y-m-d')."')";
												

				//db_query($insertar);
				$sqlcontenido =mysql_query($insertar,$conexion) or die ("problema con Insertar Contenido Dinamico");	
				
				if(!empty($seccionpage[0]))
				{
					$selcodigo = db_query("select max(ccodinicio) as codigo from pagehome where ccodpage='".$selectpage."'");
					$cod = db_fetch_array($selcodigo);
					while (list ($key, $val) = each ($seccionpage) )
					{
						db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')");
					}
				}
		   }//fin else error 4
	   }	   
	   elseif($seltipo=='5')  //************ Slider Imagenes (nivo slider)
	   {		
		   if($anchoimagen=="") 	$juvame_error = " * Debe Ingresar el ancho de la imagen";
		   elseif($altoimagen=="")  	$juvame_error = " * Debe Ingresar el alto de la imagen";
		   
	   		   //--------------********
		   else
		   {				
				//echo "nivo slider";exit;			
				$insertar = "insert into pagehome(
												  mostrar_titulo,
												  ccodpage,
												  cnomhome,
												  cordpublica,
												  ccodclase,
												   estado,
												  cesthome,												 
												  ctiphome,
												  cubidestino,
												  nancho,
												  nalto,
												  dfecinicio,
												  dfecfinal,
												  cimagen1,
												  curl1,
												  cimagen2,
												  curl2,
												  cimagen3,
												  curl3,
												  cimagen4,
												  curl4,
												  cimagen5,
												  curl5,
												  dfechome) 
										values(
												'".$mostrar_titulo."',
												'".$selectpage."',
												'".$titulo."',
												'".$cordpublica."',
												'".$selectclase."',
												'1',
												'1',
												'".$seltipo."',
												'".$selectubicacion."',
												'".$anchoimagen."',
												'".$altoimagen."',
												'".fechaymd($fechaini). "',
												'".fechaymd($fechafin). "',
												'".$imagen1."',
												'".$url1."',
												'".$imagen2."',
												'".$url2."',
												'".$imagen3."',
												'".$url3."',
												'".$imagen4."',
												'".$url4."',
												'".$imagen5."',
												'".$url5."',
												'".date('Y-m-d')."')";												
				
				//db_query($insertar);
				//echo $insertar;exit;
				$sqlcontenido =mysql_query($insertar,$conexion) or die ("problema con Insertar Slider Imagenes nivo slider");
				
				if(!empty($seccionpage[0]))
				{
					$selcodigo = db_query("select max(ccodinicio) as codigo from pagehome where ccodpage='".$selectpage."'");
					$cod = db_fetch_array($selcodigo);
					while (list ($key, $val) = each ($seccionpage) )
					{
						db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')");
					}
				}
		   }//fin else error 5
	   }
	   
	   //I------------------------------------------------------
	      elseif($seltipo=='10')  //************ Slider Imagenes(LayerSlider5)
		{
		   if($anchoimagen=="") 	$juvame_error = " * Debe Ingresar el ancho de la imagen";
		   else if($altoimagen=="")  	$juvame_error = " * Debe Ingresar el alto de la imagen";
		   
	   		   //--------------********
		   else
		   {
				//echo "LayerSlider5";exit;
				$insertar = "insert into pagehome(
												  mostrar_titulo,
												  ccodpage,
												  cnomhome,
												  cordpublica,
												  ccodclase,
												  cesthome,
												  estado,
												  ctiphome,
												  cubidestino,
												  nancho,
												  nalto,
												  dfecinicio,
												  dfecfinal,
												  cimagen1,
												  curl1,
												  titulo_imagen1,
												  texto_imagen1,
												  cimagen2,
												  curl2,
												  titulo_imagen2,
												  texto_imagen2,
												  cimagen3,
												  curl3,
												  titulo_imagen3,
												  texto_imagen3,
												  cimagen4,
												  curl4,
												  titulo_imagen4,
												  texto_imagen4,
												  cimagen5,
												  curl5,
												  dfechome) 
										values(
												'".$mostrar_titulo."',
												'".$selectpage."',
												'".$titulo."',
												'".$cordpublica."',
												'".$selectclase."',
												'1',
												'1',
												'".$seltipo."',
												'".$selectubicacion."',
												'".$anchoimagen."',
												'".$altoimagen."',
												'".fechaymd($fechaini). "',
												'".fechaymd($fechafin). "',
												'".$imagen1."',
												'".$url1."',
												'".$titulo_imagen1."',
												'".$texto_imagen1."',												  
												'".$imagen2."',
												'".$url2."',
												'".$titulo_imagen2."',
												'".$texto_imagen2."',
												'".$imagen3."',
												'".$url3."',
												'".$titulo_imagen3."',
												'".$texto_imagen3."',
												'".$imagen4."',
												'".$url4."',
												'".$titulo_imagen4."',
												'".$texto_imagen4."',
												'".$imagen5."',
												'".$url5."',
												'".date('Y-m-d')."')";
												
				
				//db_query($insertar);
				 $sqlcontenido =mysql_query($insertar,$conexion) or die ("problema con Insertar  Slider Imagenes (LayerSlider5)");	
				
				if(!empty($seccionpage[0]))
				{
					$selcodigo = db_query("select max(ccodinicio) as codigo from pagehome where ccodpage='".$selectpage."'");
					$cod = db_fetch_array($selcodigo);
					while (list ($key, $val) = each ($seccionpage) )
					{
						db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')");
					}
				}
		   }//fin else error 7		   
	    }//fin Slider Imagenes(LayerSlider5) opcion 10	   
	   
	   //i---------------Fin Slider Imagenes(LayerSlider5)----------------------------------------
	   
	     elseif($seltipo=='11')  //************ Formulario Buscar
	   {
		   if($titulo=="") $juvame_error = " * Debe Ingresar el Codigo HTML";		   
					   //--------------********
		   else{
			  
			   //echo $seccionpage[0];exit;
				$insertar = "insert into pagehome(
				mostrar_titulo,
				ccodpage,
				cnomhome,
				cordpublica,
				ccodclase,
				cesthome,
				estado,
				ctiphome,			
				cubidestino,
				dfecinicio,
				dfecfinal,
				dfechome)
				values(
				'".$mostrar_titulo."',
				'".$selectpage."',
				'".$titulo."',
				'".$cordpublica."',
				'".$selectclase."',
				'1',
				'1',
				'".$seltipo."',				
				'".$selectubicacion."',
				'".fechaymd($fechaini). "',
				'".fechaymd($fechafin). "',
				'".date('Y-m-d')."')";										
																				
				//db_query($insertar);				
				$sqlcontenido =mysql_query($insertar,$conexion) or die ("problema con Insertar Formulario Buscar");			   			
							   
				if(!empty($seccionpage[0])){
					$selcodigo = db_query("select max(ccodinicio) as codigo from pagehome where ccodpage='".$selectpage."'");
					$cod = db_fetch_array($selcodigo);
					while (list ($key, $val) = each ($seccionpage) ){
						db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')");
					}
				} 
		   }
	   }
	   /*------------Fin Formulario Buscar------------*/
	   
	   //-----  Inicio Formulario Marca Motor=12  y Marca Vehiculo=13 Table: webparametros=0014 --------------
	    elseif($seltipo=='12' or $seltipo=='13' )  
	   {
		   if($titulo=="") $juvame_error = " * Debe Ingresar el Codigo HTML";		   
					   //--------------********
		   else{
			  
			   //echo $seccionpage[0];exit;
				$insertar = "insert into pagehome(
				mostrar_titulo,
				ccodpage,
				cnomhome,
				cordpublica,
				ccodclase,
				cesthome,
				estado,
				ctiphome,			
				cubidestino,
				dfecinicio,
				dfecfinal,
				dfechome)
				values(
				'".$mostrar_titulo."',
				'".$selectpage."',
				'".$titulo."',
				'".$cordpublica."',
				'".$selectclase."',
				'1',
				'1',
				'".$seltipo."',				
				'".$selectubicacion."',
				'".fechaymd($fechaini). "',
				'".fechaymd($fechafin). "',
				'".date('Y-m-d')."')";										
																				
				//db_query($insertar);				
				$sqlcontenido =mysql_query($insertar,$conexion) or die ("problema con Insertar Formulario Buscar");			   			
							   
				if(!empty($seccionpage[0])){
					$selcodigo = db_query("select max(ccodinicio) as codigo from pagehome where ccodpage='".$selectpage."'");
					$cod = db_fetch_array($selcodigo);
					while (list ($key, $val) = each ($seccionpage) ){
						db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')");
					}
				} 
		   }
	   }
	    //-----  Fin Formulario Marca Motor--------------
	   
	   
	   elseif($seltipo=='6') //************ Ventana Popup
	   {
		   if($anchoimagen=="") 	$juvame_error = " * Debe Ingresar el ancho de la imagen";
		   elseif($altoimagen=="")  	$juvame_error = " * Debe Ingresar el alto de la imagen";
		   
		  		   //--------------********
		   else
		   {
				$insertar = "insert into pagehome(
												  mostrar_titulo,
												  ccodpage,
												  cnomhome,
												  cordpublica,
												  cesthome,
												  estado,
												  ctiphome,
												  cubidestino,
												  nancho,
												  nalto,
												  cimgpubli,
												  cadspubli,
												  anchowin,
												  altowin,
												  dfecinicio,
												  dfecfinal,
												  dfechome) 
										values(
												'".$mostrar_titulo."',
												'".$selectpage."',
												'".$titulo."',
												'".$cordpublica."',
												'1',
												'1',
												'".$seltipo."',
												'".$selectubicacion."',
												'".$anchoimagen."',
												'".$altoimagen."',
												'".$imagen."',
												'".$htmlcodigo."',
												'".$anchowin."',
												'".$altowin."',
												'".fechaymd($fechaini). "',
												'".fechaymd($fechafin). "',
												'".date('Y-m-d')."')";
												
				
				//db_query($insertar);
				$sqlcontenido =mysql_query($insertar,$conexion) or die ("problema con Insertar Ventana Popup");
				
				if(!empty($seccionpage[0]))
				{
					$selcodigo = db_query("select max(ccodinicio) as codigo from pagehome where ccodpage='".$selectpage."'");
					$cod = db_fetch_array($selcodigo);
					while (list ($key, $val) = each ($seccionpage) )
					{
						//db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')");
						$insertar="insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')";
						$sqlcontenido =mysql_query($insertar,$conexion) or die ("problema con Insertar detalle Ventana Popup");

					}
				}
		   }//fin else error 6
		   }
  elseif($seltipo=='7')  //************ Slider Imagenes (jFlow)
	   {
		   if($anchoimagen=="") 	$juvame_error = " * Debe Ingresar el ancho de la imagen";
		   else if($altoimagen=="")  	$juvame_error = " * Debe Ingresar el alto de la imagen";
		   
	   		   //--------------********
		   else
		   {
				$insertar = "insert into pagehome(
												  mostrar_titulo,
												  ccodpage,
												  cnomhome,
												  cordpublica,
												  cesthome,
												  estado,
												  ctiphome,
												  cubidestino,
												  nancho,
												  nalto,
												  dfecinicio,
												  dfecfinal,
												  cimagen1,
												  curl1,
												  titulo_imagen1,
												  texto_imagen1,
												  cimagen2,
												  curl2,
												  titulo_imagen2,
												  texto_imagen2,
												  cimagen3,
												  curl3,
												  titulo_imagen3,
												  texto_imagen3,
												  cimagen4,
												  curl4,
												  titulo_imagen4,
												  texto_imagen4,
												  cimagen5,
												  curl5,
												  dfechome) 
										values(
												'".$mostrar_titulo."',
												'".$selectpage."',
												'".$titulo."',
												'".$cordpublica."',
												'1',
												'1',
												'".$seltipo."',
												'".$selectubicacion."',
												'".$anchoimagen."',
												'".$altoimagen."',
												'".fechaymd($fechaini). "',
												'".fechaymd($fechafin). "',
												'".$imagen1."',
												'".$url1."',
												'".$titulo_imagen1."',
												'".$texto_imagen1."',												  
												'".$imagen2."',
												'".$url2."',
												'".$titulo_imagen2."',
												'".$texto_imagen2."',
												'".$imagen3."',
												'".$url3."',
												'".$titulo_imagen3."',
												'".$texto_imagen3."',
												'".$imagen4."',
												'".$url4."',
												'".$titulo_imagen4."',
												'".$texto_imagen4."',
												'".$imagen5."',
												'".$url5."',
												'".date('Y-m-d')."')";
												
				
				//db_query($insertar);
				 $sqlcontenido =mysql_query($insertar,$conexion) or die ("problema con Insertar  Slider Imagenes (jFlow)");	
				
				if(!empty($seccionpage[0]))
				{
					$selcodigo = db_query("select max(ccodinicio) as codigo from pagehome where ccodpage='".$selectpage."'");
					$cod = db_fetch_array($selcodigo);
					while (list ($key, $val) = each ($seccionpage) )
					{
						db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')");
					}
				}
		   }//fin else error 7		   
	   }
		//return redirect($form_web);  
  }	
?>
<script language='JavaScript'>    
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/index.php?option=com_presentacion&mensaje=El Articulo ha sido Ingresada correctamente' 
</script> 

