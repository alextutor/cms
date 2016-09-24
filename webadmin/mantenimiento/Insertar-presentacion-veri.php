<?php  session_start(); 
   $pagew=$_SESSION['selectpage'];
   $INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
   extract($_POST);
   $modulo="1100";
   $stylo = "3";
   
   //$inicioclases=date("Y-m-d",strtotime($inicioclases));   
   include($_SERVER['DOCUMENT_ROOT']. '/webadmin/include/funciones.php');	   
   include($_SERVER['DOCUMENT_ROOT']. '/config.php');	  

	   if($seltipo=='1')
	   {
		   if($imagen=="") 			$juvame_error = " * Debe Seleccionar una imagen";
		   elseif($juvame_form['anchoimagen']=="") 	$juvame_error = " * Debe Ingresar el ancho de la imagen";
		   elseif($juvame_form['altoimagen']=="")  	$juvame_error = " * Debe Ingresar el alto de la imagen";
		   
		   if ($juvame_error != "")
		   {		
		   		$respuesta->addAssign("mensaje","innerHTML","<span style='color:red;'>$juvame_error</span>");
				return $respuesta;
		   }
		   else{
				$insertar = "insert into pagehome(ccodpage,cnomhome,cesthome,ctiphome,cimgpubli,nancho,nalto,curlpubli,cubidestino,dfecinicio,dfecfinal,dfechome) 
								values(
									    ".$juvame_form['selectpage']."',
									    ".$juvame_form['titulo']."',
									    1',
										".$juvame_form['seltipo']."',
										".$juvame_form['imagen']."',
										".$juvame_form['anchoimagen']."',
										".$juvame_form['altoimagen']."',
										".$juvame_form['urlimagen']."',
										".$juvame_form['selectubicacion']."',
										".fechaymd($juvame_form['fechaini']). "',
										".fechaymd($juvame_form['fechafin']). "',
										".date('Y-m-d')."')";
				
				db_query($insertar);
				
				if(!empty($juvame_form['seccionpage'])){
					$selcodigo = db_query("select max(ccodinicio) as codigo from pagehome where ccodpage='".$juvame_form['selectpage']."'");
					$cod = db_fetch_array($selcodigo);
					while (list ($key, $val) = each ($juvame_form['seccionpage']) ){
						db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')");
					}
				}
				 
		   }  
	   }
	   elseif($juvame_form['seltipo']=='2')
	   {
		   if($juvame_form['flash']=="") 			$juvame_error = " * Debe Seleccionar un banner flash";
		   elseif($juvame_form['anchoflash']=="") 	$juvame_error = " * Debe Ingresar el ancho del banner flash";
		   elseif($juvame_form['altoflash']=="")  	$juvame_error = " * Debe Ingresar el alto del banner flash";
		   
		   if ($juvame_error != "")
		   {		
		   		$respuesta->addAssign("mensaje","innerHTML","<span style='color:red;'>$juvame_error</span>");
				return $respuesta;
		   }
		   else{
				$insertar = "insert into pagehome(ccodpage,cnomhome,cesthome,ctiphome,cimgpubli,nancho,nalto,cubidestino,dfecinicio,dfecfinal,dfechome) ";
				$insertar.= "values('".$juvame_form['selectpage']."','".$juvame_form['titulo']."','1','".$juvame_form['seltipo']."','".$juvame_form['flash']."',";
				$insertar.= "'".$juvame_form['anchoflash']."','".$juvame_form['altoflash']."','".$juvame_form['selectubicacion']."','".fechaymd($juvame_form['fechaini']). "','".fechaymd($juvame_form['fechafin']). "','".date('Y-m-d')."')";
				
				db_query($insertar);
				if(!empty($juvame_form['seccionpage'])){
					$selcodigo = db_query("select max(ccodinicio) as codigo from pagehome where ccodpage='".$juvame_form['selectpage']."'");
					$cod = db_fetch_array($selcodigo);
					while (list ($key, $val) = each ($juvame_form['seccionpage']) ){
						db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')");
					}
				} 
		   }
	   }
	   elseif($juvame_form['seltipo']=='3')
	   {
		   if($juvame_form['htmlcodigo']=="") $juvame_error = " * Debe Ingresar el Codigo HTML";
		   
		   if ($juvame_error != "")
		   {		
		   		$respuesta->addAssign("mensaje","innerHTML","<span style='color:red;'>$juvame_error</span>");
				return $respuesta;
		   }
		   else{
				$insertar = "insert into pagehome(ccodpage,cnomhome,cesthome,ctiphome,cadspubli,cubidestino,dfecinicio,dfecfinal,dfechome) ";
				$insertar.= "values('".$juvame_form['selectpage']."','".$juvame_form['titulo']."','1','".$juvame_form['seltipo']."',";
				$insertar.= "'".addslashes($juvame_form['htmlcodigo'])."','".$juvame_form['selectubicacion']."','".fechaymd($juvame_form['fechaini']). "','".fechaymd($juvame_form['fechafin']). "','".date('Y-m-d')."')";
				
				db_query($insertar);
				if(!empty($juvame_form['seccionpage'])){
					$selcodigo = db_query("select max(ccodinicio) as codigo from pagehome where ccodpage='".$juvame_form['selectpage']."'");
					$cod = db_fetch_array($selcodigo);
					while (list ($key, $val) = each ($juvame_form['seccionpage']) ){
						db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')");
					}
				} 
		   }
	   }
	   elseif($juvame_form['seltipo']=='4')
	   {
		   if($juvame_form['nroitems']=="")
		   { 
		   		$juvame_error = " * Debe Ingresar una Cantidad para mostrar"; 
		   }
		   
		   if($juvame_error != "")
		   {
			   	$respuesta->addAssign("mensaje","innerHTML","<span style='color:red;'>$juvame_error</span>");
				return $respuesta;
		   }
		   else
		   {
				$insertar = "insert into pagehome(ccodpage,
												  cnomhome,
												  ccodclase,
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
										values('".$juvame_form['selectpage']."',
												'".$juvame_form['titulo']."',
												'".$juvame_form['selectclase']."',
												'1',
												'".$juvame_form['seltipo']."',
												'".$juvame_form['selectestilo']."',
												'".$juvame_form['modulodinam']."',
												'".$juvame_form['secciondinam']."',
												'".$juvame_form['selectcategoria']."',
												'".$juvame_form['nroitems']."',
												'".$juvame_form['ordendinam']."',
												'".$juvame_form['selectubicacion']."',
												'".fechaymd($juvame_form['fechaini']). "',
												'".fechaymd($juvame_form['fechafin']). "',
												'0',
												'1',
												'1',
												'1',
												'3',
												'".date('Y-m-d')."')";
												
				
				db_query($insertar);
				
				if(!empty($juvame_form['seccionpage']))
				{
					$selcodigo = db_query("select max(ccodinicio) as codigo from pagehome where ccodpage='".$juvame_form['selectpage']."'");
					$cod = db_fetch_array($selcodigo);
					while (list ($key, $val) = each ($juvame_form['seccionpage']) )
					{
						db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')");
					}
				}
		   }//fin else error 4
	   }
	   elseif($juvame_form['seltipo']=='5')
	   {
		   if($juvame_form['anchoimagen']=="") 	$juvame_error = " * Debe Ingresar el ancho de la imagen";
		   elseif($juvame_form['altoimagen']=="")  	$juvame_error = " * Debe Ingresar el alto de la imagen";
		   
		   if($juvame_error != "")
		   {
			   	$respuesta->addAssign("mensaje","innerHTML","<span style='color:red;'>$juvame_error</span>");
				return $respuesta;
		   }
		   else
		   {
				$insertar = "insert into pagehome(ccodpage,
												  cnomhome,
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
										values('".$juvame_form['selectpage']."',
												'".$juvame_form['titulo']."',
												'1',
												'".$juvame_form['seltipo']."',
												'".$juvame_form['selectubicacion']."',
												'".$juvame_form['anchoimagen']."',
												'".$juvame_form['altoimagen']."',
												'".fechaymd($juvame_form['fechaini']). "',
												'".fechaymd($juvame_form['fechafin']). "',
												'".$juvame_form['imagen1']."',
												'".$juvame_form['url1']."',
												'".$juvame_form['imagen2']."',
												'".$juvame_form['url2']."',
												'".$juvame_form['imagen3']."',
												'".$juvame_form['url3']."',
												'".$juvame_form['imagen4']."',
												'".$juvame_form['url4']."',
												'".$juvame_form['imagen5']."',
												'".$juvame_form['url5']."',
												'".date('Y-m-d')."')";
												
				
				db_query($insertar);
				
				if(!empty($juvame_form['seccionpage']))
				{
					$selcodigo = db_query("select max(ccodinicio) as codigo from pagehome where ccodpage='".$juvame_form['selectpage']."'");
					$cod = db_fetch_array($selcodigo);
					while (list ($key, $val) = each ($juvame_form['seccionpage']) )
					{
						db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')");
					}
				}
		   }//fin else error 5
	   }
	   elseif($juvame_form['seltipo']=='6')
	   {
		   if($juvame_form['anchoimagen']=="") 	$juvame_error = " * Debe Ingresar el ancho de la imagen";
		   elseif($juvame_form['altoimagen']=="")  	$juvame_error = " * Debe Ingresar el alto de la imagen";
		   
		   if($juvame_error != "")
		   {
			   	$respuesta->addAssign("mensaje","innerHTML","<span style='color:red;'>$juvame_error</span>");
				return $respuesta;
		   }
		   else
		   {
				$insertar = "insert into pagehome(ccodpage,
												  cnomhome,
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
										values('".$juvame_form['selectpage']."',
												'".$juvame_form['titulo']."',
												'1',
												'".$juvame_form['seltipo']."',
												'".$juvame_form['selectubicacion']."',
												'".$juvame_form['anchoimagen']."',
												'".$juvame_form['altoimagen']."',
												'".$juvame_form['imagen']."',
												'".$juvame_form['htmlcodigo']."',
												'".$juvame_form['anchowin']."',
												'".$juvame_form['altowin']."',
												'".fechaymd($juvame_form['fechaini']). "',
												'".fechaymd($juvame_form['fechafin']). "',
												'".date('Y-m-d')."')";
												
				
				db_query($insertar);
				
				if(!empty($juvame_form['seccionpage']))
				{
					$selcodigo = db_query("select max(ccodinicio) as codigo from pagehome where ccodpage='".$juvame_form['selectpage']."'");
					$cod = db_fetch_array($selcodigo);
					while (list ($key, $val) = each ($juvame_form['seccionpage']) )
					{
						db_query("insert into pagehomedet(ccodinicio,ccoddestino) values('".$cod['codigo']."','".$val."')");
					}
				}
		   }//fin else error 6
	   } 
?>
<script language='JavaScript'>    
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/index.php?option=com_articulos&mensaje=El Articulo ha sido Ingresada correctamente' 
</script> 
