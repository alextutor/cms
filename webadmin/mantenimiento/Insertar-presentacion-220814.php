<?php   
   session_start(); 		  
   extract($_POST);
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
 			
				$insertar = "insert into pagehome(
				ccodpage,
				cnomhome,
				cordpublica,
				cclase,
				cesthome,				
				ctiphome,
				cimgpubli,
				nancho,
				nalto,
				curlpubli,
				cubidestino,
				dfecinicio,
				dfecfinal,
				dfechome) 
				values(
						'".$selectpage."',
						'".$titulo."',
						'".$cordpublica."',
						'".$selectclase."',
						'1',
						'".$seltipo."',
						'".$imagen."',
						'".$anchoimagen."',
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
				$insertar = "insert into pagehome(ccodpage,cnomhome,cordpublica,cesthome,ctiphome,cimgpubli,nancho,nalto,cubidestino,dfecinicio,dfecfinal,dfechome) ";
				$insertar.= "values('".$selectpage."','".$titulo ."','".$cordpublica ."','1','".$seltipo."','".$flash."',";
				$insertar.= "'".$anchoflash."','".$altoflash."','".$selectubicacion."','".fechaymd($fechaini). "','".fechaymd($fechafin). "','".date('Y-m-d')."')";
				
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
				$insertar = "insert into pagehome(ccodpage,cnomhome,cordpublica,cclase,cesthome,ctiphome,cadspubli,cubidestino,dfecinicio,dfecfinal,dfechome) ";
				$insertar.= "values('".$selectpage."','".$titulo."','".$cordpublica."','".$selectclase."','1','".$seltipo."',";
				$insertar.= "'".addslashes($htmlcodigo)."','".$selectubicacion."','".fechaymd($fechaini). "','".fechaymd($fechafin). "','".date('Y-m-d')."')";				
				
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
				$insertar = "insert into pagehome(ccodpage,
												  cnomhome,
												  cordpublica,
												  cclase,
												  cesthome,
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
										values('".$selectpage."',
												'".$titulo."',
												'".$cordpublica."',
												'".$selectclase."',
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
	   elseif($seltipo=='5')  //************ Slider Imagenes
	   {
		   if($anchoimagen=="") 	$juvame_error = " * Debe Ingresar el ancho de la imagen";
		   elseif($altoimagen=="")  	$juvame_error = " * Debe Ingresar el alto de la imagen";
		   
	   		   //--------------********
		   else
		   {
				$insertar = "insert into pagehome(ccodpage,
												  cnomhome,
												  cordpublica,
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
										values('".$selectpage."',
												'".$titulo."',
												'".$cordpublica."',
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
												
				
				db_query($insertar);
				
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
	   elseif($seltipo=='6') //************ Ventana Popup
	   {
		   if($anchoimagen=="") 	$juvame_error = " * Debe Ingresar el ancho de la imagen";
		   elseif($altoimagen=="")  	$juvame_error = " * Debe Ingresar el alto de la imagen";
		   
		  		   //--------------********
		   else
		   {
				$insertar = "insert into pagehome(ccodpage,
												  cnomhome,
												  cordpublica,
												  cesthome,
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
										values('".$selectpage."',
												'".$titulo."',
												'".$cordpublica."',
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
				$insertar = "insert into pagehome(ccodpage,
												  cnomhome,
												  cordpublica,
												  cesthome,
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
										values('".$selectpage."',
												'".$titulo."',
												'".$cordpublica."',
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

