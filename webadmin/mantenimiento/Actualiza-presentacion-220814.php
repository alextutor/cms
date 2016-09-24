<?php  session_start();
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
			   $update	= "update pagehome set 
							  ccodpage    ='".$selectpage."', 
							  cnomhome    ='".$titulo."',
							  cordpublica ='".$cordpublica."',
							  cclase ='".$selectclase."',							  
							  cimgpubli   ='".$imagen."',
							  nancho      ='".$anchoimagen."', 
							  nalto       ='".$altoimagen."',
							  curlpubli   ='".$urlimagen."',
							  dfecinicio   ='".fechaymd($fechaini)."',
							  dfecfinal    ='".fechaymd($fechafin)."',
							  cubidestino ='".$selectubicacion."' 
							  where ccodinicio='".$idpro."' ";
				
				db_query($update);			 
		   }  
	   }
	   elseif($seltipo=='2')  //************ Animacion Flash 
	   {
		   if($flash=="") 			$juvame_error = " * Debe Seleccionar un banner flash";
		   elseif($anchoflash=="") 	$juvame_error = " * Debe Ingresar el ancho del banner flash";
		   elseif($altoflash=="")  	$juvame_error = " * Debe Ingresar el alto del banner flash";
		  		   //--------------********
		   else{
				  $update	= "update pagehome set 
				  				ccodpage     ='".$selectpage."', 
								cnomhome     ='".$titulo."',
  							  cordpublica ='".$cordpublica."',1
								cimgpubli    ='".$flash."',
								nancho       ='".$anchoflash."',
								nalto        ='".$altoflash."',
								dfecinicio   ='".fechaymd($fechaini)."',
								dfecfinal    ='".fechaymd($fechafin)."',
								cubidestino  ='".$selectubicacion."' 
								where ccodinicio ='".$idpro."' ";
				  
				  db_query($update);
		   }
	   }
	   elseif($seltipo=='3')  //************ Codigo Html 
	   {
		   if($htmlcodigo=="") $juvame_error = " * Debe Ingresar el Codigo HTML";		   
					   //--------------********
		   else{
			   //echo $seccionpage[0];exit;
				 $update	= "update pagehome set 
				  				ccodpage     ='".$selectpage."',
								cnomhome     ='".$titulo."',
								  cordpublica ='".$cordpublica."',
								cadspubli    ='".addslashes($htmlcodigo)."',
								dfecinicio   ='".fechaymd($fechaini)."',
								dfecfinal    ='".fechaymd($fechafin)."',
								cubidestino  ='".$selectubicacion."' 
								where ccodinicio='".$idpro."' ";				  
				  db_query($update);				  
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
				
				 $update	= "update pagehome set 
				  				ccodpage     ='".$selectpage."', 
								cnomhome     ='".$titulo."',
								  cordpublica ='".$cordpublica."',
								ccodestilo   ='".$selectestilo."',
								cclase   ='".$selectclase."',								
								ccodcategoria ='".$selectcategoria."',
								ccodmodulo   ='".$modulodinam."', 
								ccodseccion  ='".$secciondinam."',
								nnroitems    ='".$nroitems."',
								ccodorden    ='".$ordendinam."',
								dfecinicio   ='".fechaymd($fechaini)."',
								dfecfinal    ='".fechaymd($fechafin)."',
								cubidestino  ='".$selectubicacion."' 
								where ccodinicio='".$idpro."' ";
				  
				  db_query($update);								

				
		   }//fin else error 4
	   }
	   elseif($seltipo=='5')  //************ Slider Imagenes
	   {
		   if($anchoimagen=="") 	$juvame_error = " * Debe Ingresar el ancho de la imagen";
		   elseif($altoimagen=="")  	$juvame_error = " * Debe Ingresar el alto de la imagen";
		   
	   		   //--------------********
		   else
		   {
					$update	= "update pagehome set 
				  				ccodpage     ='".$selectpage."', 
								cnomhome     ='".$titulo."',
								  cordpublica ='".$cordpublica."',
								nancho       ='".$anchoimagen."',
								nalto        ='".$altoimagen."',
								cimagen1     ='".$imagen1."',
								curl1        ='".$url1."',
								cimagen2     ='".$imagen2."',
								curl2        ='".$url2."',
								cimagen3     ='".$imagen3."',
								curl3        ='".$url3."',
								cimagen4     ='".$imagen4."',
								curl4        ='".$url4."',
								cimagen5     ='".$imagen5."',
								curl5        ='".$url5."',
								dfecinicio   ='".fechaymd($fechaini)."',
								dfecfinal    ='".fechaymd($fechafin)."',
								cubidestino  ='".$selectubicacion."' 
								where ccodinicio ='".$idpro."' ";
				  
				  db_query($update);
		   }//fin else error 5
	   }
	   elseif($seltipo=='6') //************ Ventana Popup
	   {
		   if($anchoimagen=="") 	$juvame_error = " * Debe Ingresar el ancho de la imagen";
		   elseif($altoimagen=="")  	$juvame_error = " * Debe Ingresar el alto de la imagen";
		   
		  		   //--------------********
		   else
		   {
				 $update	= "update pagehome set 
				  				ccodpage     ='".$selectpage."', 
								cnomhome     ='".$titulo."',
								  cordpublica ='".$cordpublica."',
								cimgpubli    ='".$imagen."',
								nancho       ='".$anchoimagen."',
								nalto        ='".$altoimagen."',
								cadspubli    ='".addslashes($htmlcodigo)."',
								anchowin     ='".$anchowin."',
								altowin      ='".$altowin."',
								dfecinicio   ='".fechaymd($fechaini)."',
								dfecfinal    ='".fechaymd($fechafin)."',
								cubidestino  ='".$selectubicacion."' 
								where ccodinicio ='".$idpro."' ";
				 // db_query($update);
				  $sqlcontenido =mysql_query($update,$conexion) or die ("problema con Actualizar Ventana Popup");			
				
		   }//fin else error 6
		   
		    }
	   elseif($seltipo=='7')  //************ Slider Imagenes (jflow)
	   {

	   if($anchoimagen=="") 	$juvame_error = " * Debe Ingresar el ancho de la imagen";
		   elseif($altoimagen=="")  	$juvame_error = " * Debe Ingresar el alto de la imagen";
		   
	   		   //--------------********
		   else
		   {
					$update	= "update pagehome set 
				  				ccodpage     ='".$selectpage."', 
								cnomhome     ='".$titulo."',
								  cordpublica ='".$cordpublica."',
								nancho       ='".$anchoimagen."',
								nalto        ='".$altoimagen."',
								cimagen1     ='".$imagen1."',
								curl1        ='".$url1."',	
								titulo_imagen1        ='".$titulo_imagen1."',
								texto_imagen1        ='".$texto_imagen1."',							
								cimagen2     ='".$imagen2."',
								curl2        ='".$url2."',
								titulo_imagen2        ='".$titulo_imagen2."',
								texto_imagen2        ='".$texto_imagen2."',	
								cimagen3     ='".$imagen3."',
								curl3        ='".$url3."',
								titulo_imagen3        ='".$titulo_imagen3."',
								texto_imagen3        ='".$texto_imagen3."',	
								cimagen4     ='".$imagen4."',
								curl4        ='".$url4."',
								titulo_imagen4        ='".$titulo_imagen4."',
								texto_imagen4        ='".$texto_imagen4."',	
								cimagen5     ='".$imagen5."',
								curl5        ='".$url5."',
								dfecinicio   ='".fechaymd($fechaini)."',
								dfecfinal    ='".fechaymd($fechafin)."',
								cubidestino  ='".$selectubicacion."' 
								where ccodinicio ='".$idpro."' ";
				  
				  db_query($update);
		   }//fin else error 7
	   }	   
	   //--------------------------------------------------------------------------------------------
		  db_query("delete from pagehomedet where ccodinicio='".$idpro."'");
		  if(!empty($seccionpage[0]))
		  {
			  while (list ($key, $val) = each ($seccionpage) )
			  {
				  db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$idpro."','".$val."')");
			  }
		  }
      //--------------------------------------------------------------------------------------------
	
		//return redirect($form_web);  
  }	
?>
<script language='JavaScript'>    
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/index.php?option=com_presentacion&mensaje=La Presentacion se a Actualizado correctamente' 
</script> 

