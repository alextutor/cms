<?php  if ( extension_loaded( "zlib" ) ) ob_start( "ob_gzhandler" );//habilitar la compresión Gzip 
 session_start();
 //recuerda cuando se muestra portada primero pasa por else // else 1   nro 442
// if(substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); 	
	//echo $_GET["idsec"];exit;	
	//-------para que nome muestre errores en desarollo xamp ejemplo inicializar valores
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 	
	include $_SERVER['DOCUMENT_ROOT']."/config.php";			
	// configuramos la base de datos	
	//include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/mis-funciones.php'); 	
 
$submenu ='0';
$mailserver ="mail.idnegocios.com";
$mailuser   ="info@idnegocios.com";
$mailpass   ="123456abc";
$totalpantalla="Portada";
$domain       = $_SERVER['HTTP_HOST']; /*www.juvame.com*/
$domain_parts = explode('.',$domain);
$nropartes = count($domain_parts);
//$codpage="prueba";
//echo $_GET["idsec2"]."dsdsa";exit;
/* al entrar como www.juvame.com se tiene 3 partes */
/* $domain_parts[0]; /*www*/
/* $domain_parts[1]; juvame*/
 /* $domain_parts[2]; com*/
if ($nropartes == 2 )
{ 
	$subdominio = $domain_parts[0].".".$domain_parts[1]; 
}
if ($nropartes == 3 )
{
	if ($domain_parts[0]=="www")
		$subdominio = $domain_parts[1].".".$domain_parts[2];
	else	
		$subdominio = $domain_parts[0].".".$domain_parts[1].".".$domain_parts[2];
}
if ($nropartes == 4 )
{
	if ($domain_parts[0]=="www")
		$subdominio = $domain_parts[1].".".$domain_parts[2].".".$domain_parts[3];
	else
		$subdominio = $domain_parts[0].".".$domain_parts[1].".".$domain_parts[2].".".$domain_parts[3];
}

$sqlpagew  = db_query("SELECT * FROM  page WHERE camipage='".$subdominio."' and cestpage ='1'");
$nrosub    = db_num_rows($sqlpagew);
//echo $subdominio;exit;
//echo "SELECT * FROM  page WHERE camipage='".$subdominio."' and cestpage ='1'";exit;
//echo $nrosub;exit;
if ( $nrosub >0 )
{	
	$rowpagew    = db_fetch_array($sqlpagew);
	$webanalytics  = $rowpagew['canagoogle'];
	$webgooglemaps = $rowpagew['cmapgoogle'];
	$cscriptfacebook  =trim($rowpagew['cscriptfacebook']);
	$fb_admins_facebook  =trim($rowpagew['fb_admins_facebook']);
	$fb_app_id_facebook  =trim($rowpagew['fb_app_id_facebook']);	
	
	$Script_chat         =trim($rowpagew['Script_chat']); // para el chat
		
		
	$pais          = $rowpagew['ccodpais'];
	if ($rowpagew['credpage']<>"")
	{
		$sqlpageweb  = db_query("SELECT * FROM  page WHERE ccodpage='".$rowpagew['credpage']."' ");
		$rowpageweb  = db_fetch_array($sqlpageweb);
		
		$codpage     = $rowpageweb['ccodpage'];
		$_SESSION['scodpage']= $rowpageweb['ccodpage']; //lo implemente para usarlo en oferta_01.php,rs-moneda.php
		$webnombre   = $rowpageweb['cnompage'];
		$webplan     = $rowpageweb['ccodplantilla'];
		$webidio     = $rowpageweb['ccodidioma'];
		$webtitu     = $rowpageweb['ctitpage'];//este titulo se confunde con el de las secciones
		$webtituempre     = $rowpageweb['ctitpage'];//lo cambie para que no se confunda con webtitu
		$webdesc     = $rowpageweb['cdespage'];
		$webtags     = $rowpageweb['ctagpage'];
		$webpie      = $rowpageweb['cpiepage'];
		$webvisitas  = $rowpageweb['nvispage'];
		$webpais     = $rowpageweb['ccodpais'];
		$logoweb     = $rowpageweb['clogo'];
		$cfavicon	  = $rowpagew['cfavicon'];		
		
		$emailsoporte = $rowpageweb['cemasoporte'];
		$emailcontacto= $rowpageweb['cemacontacto'];
		$emailventas  = $rowpageweb['cemaventas'];
		
		$mostrarprecios = $rowpageweb['nmosprecio'];
		$mostrarpedidos = $rowpageweb['nsispedidos'];
		
		$modulo= $rowpageweb['ccodmodulo'];
		//echo $subdominio;exit;
	}
	else
	{
		$codpage     = $rowpagew['ccodpage'];
		$_SESSION['scodpage']= $rowpagew['ccodpage']; //lo implemente para usarlo en oferta_01.php
		$webnombre   = $rowpagew['cnompage'];
		$webplan     = $rowpagew['ccodplantilla'];
		$webidio     = $rowpagew['ccodidioma'];
		$webtitu     = $rowpagew['ctitpage'];//este titulo se confunde con el de las secciones
		$webtituempre  = $rowpagew['ctitpage'];//lo cambie para que no se confunda con webtitu
		$webdesc     = $rowpagew['cdespage'];
		$webtags     = $rowpagew['ctagpage'];
		$webpie      = $rowpagew['cpiepage'];
		$webvisitas  = $rowpagew['nvispage'];
		$webpais     = $rowpagew['ccodpais'];
		$logoweb      = $rowpagew['clogo'];
		$cfavicon	  = $rowpagew['cfavicon'];		
		
		$emailsoporte = $rowpagew['cemasoporte'];
		$emailcontacto= $rowpagew['cemacontacto'];
		$emailventas  = $rowpagew['cemaventas'];
		$cprovincia  = $rowpagew['cprovincia'];
		$cdistrito  = $rowpagew['cdistrito'];
		$cdirecempresa  = $rowpagew['cdirecempresa'];
		$chorarioatencion  = $rowpagew['chorarioatencion'];
		
		$cprovincia2  = $rowpagew['cprovincia2'];
		$cdistrito2  = $rowpagew['cdistrito2'];
		$cdirecempresa2  = $rowpagew['cdirecempresa2'];
		
		$ctelefonopri  = $rowpagew['ctelefonopri'];		
		$ctelefonosec=  $rowpagew['ctelefonosec'];	
		$tmovil1	= $rowpagew['tmovil1'];	
		$tmovil2= $rowpagew['tmovil2'];
		$tmovil3	= $rowpagew['tmovil3'];	
		$tmovil4= $rowpagew['tmovil4'];
		
		$mostrarprecios = $rowpagew['nmosprecio'];
		$mostrarpedidos = $rowpagew['nsispedidos'];
		
		$modulo= $rowpageweb['ccodmodulo'];
		//echo $subdominio;exit;
	}
}
else
{	
	tep_redirect('/404.php');
}

if  ($_SESSION['CONTADOR']=='0') 
{ 
	if( isset($_SERVER['HTTP_X_FORWARDED_FOR']) &&   $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
		{ 
		$nroip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
	else
		{
		$nroip = $_SERVER['REMOTE_ADDR'];
		}
	if ($nroip <> '66.249.71.53')	
	{
		$webvisitas = $webvisitas + 1; 
		$_SESSION['CONTADOR'] ='1';
		db_query("UPDATE page SET nvispage = nvispage + 1 where ccodpage='".$codpage."'");
		db_query("INSERT INTO visitas (ccodpage, ccodvisita, cnroip,dfecvisita) VALUES ('".$codpage."','".$webvisitas."','".$nroip."', NOW())");
	}
}
//**********************************************************************************************//
//include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/css/mis-estilos-web.php');  
/* $webplan=000001  ya esta definido en index en la consultya a page*/
$sql_website = "SELECT * FROM estilopagina where ccodplantilla='".$webplan."'";
//echo $sql_website ;exit;
$res_website = db_query($sql_website);
while ($row_website = db_fetch_array($res_website))
{
	$cnomplantilla  	= $row_website['cnomplantilla'];
	$webestilo  		= $row_website['webestilo'];
	$webancho  			= $row_website['webancho'];
	$webalineahor 		= $row_website['webalineahor'];
	$columnacenancho 	=$row_website['columnacenancho']-30;
	$columnaizqancho 	=$row_website['columnaizqancho'];
	$columnaderancho 	=$row_website['columnaderancho'];
	$cRutaWeb			=$_SERVER['DOCUMENT_ROOT']."/templates/".$cnomplantilla ."/";
	$ampliarimagen_portada=$row_website['ampliarimagen_portada'];	//para saber si se amplia imagen en la portada o se muestra como una noticia
	$ampliarvideo_portada=$row_website['ampliarvideo_portada'];	//para saber si se amplia imagen en la portada o se muestra como una noticia
	//echo $ampliarimagen_portada."sadasd";exit;
	$galeria_imagen=$row_website['galeria_imagen'];	//que tipo de libreria se usara para presentar la galeria de imagenes
	//echo $galeria_imagen."-sadasd";exit;
	$menuestilomenu=$row_website['menuestilomenu'];
	
}
include $_SERVER['DOCUMENT_ROOT']. "/include/funciones_web.php";  //NO LO Muevas de aqui alex porque las variables definidas si lo pones arrriba se pierden
//**********************************************************************************************//
// cuando no se visualiza pagina principal aqui entra contactos
//echo $_GET["idsec"];exit;
if (!empty($_GET['idsec']) and $_GET['idsec']<>'usuario' ){ 	// Inicio Si 1	//que sea diferente de usuario		  
  $sql1="SELECT s.*, es.cincsecestilo FROM  seccion s, estiloseccion es WHERE s.ccodsecestilo = es.ccodsecestilo and s.ccodpage='".$codpage."' and s.camiseccion ='".$_GET["idsec"]."' and s.cnivseccion ='1' and s.estado=1 ";
		$sqlseccion = db_query($sql1);
		$nrosec     = db_num_rows($sqlseccion);		
		//$nrosec=1 cuando repuestos/por-marca-de-motor; //$pagsecc 
		//echo $sql1;exit;					  
	$rowseccion     = db_fetch_array($sqlseccion);
	//echo $nrosec."|";exit;
  if ( $nrosec >0 and $rowseccion['ctipseccion']<>3) // Inicio Si 2  //ctipseccion = 3 es una seccion contenido 
  {
	$webplan   = $rowseccion['ccodplantilla'];
	$webtitu   = $rowseccion['ctitseccion'];
	$webdesc   = $rowseccion['cdesseccion'];
	$webtags   = $rowseccion['ctagseccion'];
	$codsecc   = $rowseccion['ccodseccion'];
	$nivsecc   = $rowseccion['cnivseccion'];
	$nomsecc   = $rowseccion['cnomseccion'];
	$imgsecc   = $rowseccion['cimgseccion'];
	$modsecc   = $rowseccion['ccodmodulo'];
	$estilo = $rowseccion['cincsecestilo']; 
	$ccodclase = $rowseccion['ccodclase'];	//nuevo alex 
	$pagsecc   = $rowseccion['cpagseccion'];
	$totalpantalla   = $rowseccion['totalpantalla'];			
	$rutasec   = "/".$_GET['idsec'];
	$cat       = substr($codsecc,0,12); 
	$pagina    = 1;
	$contenidoinc = "modulos/".$estilo; 	
	//echo $contenidoinc;exit;
	//echo $totalpantalla;exit;	
  	
	//****************************Inicio Para idsec2 **************************		
	
	if (!empty($_GET['idsec2'])  and $_GET['idsec']<>'panel')  // Inicio Si 3
	{	//echo "alex";exit;	
	  if ($_GET['idsec2']=="alex")  // Inicio Si 4  ori $_GET['idsec2']>0
	  {		 
		 // echo $_GET['idsec2']."sdsdasd";exit;
		  /** Seccion con paginacion **/
		  $pagina       = $_GET['idsec2'];
		  $contenidoinc = "modulos/".$estilo;
	      //echo $_GET['idsec2'];exit;		   
	  }else{    // entra cuando !empty($_GET['idsec2']
	  	 	
		//echo $_GET['idsec2']."sdsdasd";exit;
		$sql2="SELECT s.*, es.cincsecestilo FROM  seccion s, estiloseccion es WHERE s.ccodsecestilo = es.ccodsecestilo and s.ccodseccion like '".$cat."%' and s.cnivseccion ='2' and s.camiseccion ='".$_GET["idsec2"]."'  and s.estado=1";
		//echo $sql2;exit;
		$sqlseccion2 = db_query($sql2);
		$nrosec2     = db_num_rows($sqlseccion2);
		//echo $nrosec2;exit;
		 $rowseccion2    = db_fetch_array($sqlseccion2);
		if ( $nrosec2 >0 and $rowseccion2['ctipseccion']<>3)  // Inicio Si 5   //ctipseccion = 3 es una seccion contenido 
		{					  			 
		  $webplan  = $rowseccion2['ccodplantilla'];
		  $webtitu  = $rowseccion2['ctitseccion'];
		  $webdesc  = $rowseccion2['cdesseccion'];
		  $webtags  = $rowseccion2['ctagseccion'];
		  $codsecc    = $rowseccion2['ccodseccion'];
		  $nivsecc    = $rowseccion2['cnivseccion'];
		  $nomsecc    = $rowseccion2['cnomseccion'];
		  $imgsecc    = $rowseccion2['cimgseccion'];
		  $modsecc    = $rowseccion2['ccodmodulo'];
		  $estilo  = $rowseccion2['cincsecestilo'];
		  $ccodclase = $rowseccion2['ccodclase'];	//nuevo alex 
		  $pagsecc    = $rowseccion2['cpagseccion'];
		  $totalpantalla   = $rowseccion2['totalpantalla'];		
		  $rutasec    = "/".$_GET['idsec']."/".$_GET['idsec2'];
		  $cat        = substr($codsecc,0,16); 
		  $pagina     = 1;
		  $contenidoinc = "modulos/".$estilo; 		  
		 // echo $contenidoinc."pepe";exit;
		 
	 	//**************************** Inicio Para idsec3 **************************
		
		  if (!empty($_GET['idsec3'])) // Inicio Si 6
		  {
			//echo "juan";exit;
			if ($_GET['idsec3']=="alex") //Inicio Si 7  oiginal $_GET['idsec3']>0
			{
				/** Seccion  2 con paginacion  **/
				$pagina       = $_GET['idsec3'];
				$contenidoinc = "modulos/".$estilo; 
			}
			else // else 7
			{				
			  /**  Seccion  3 ********/
			  $sql3="SELECT s.*, es.cincsecestilo FROM  seccion s, estiloseccion es WHERE s.ccodsecestilo = es.ccodsecestilo and s.ccodseccion like '".$cat."%' and s.cnivseccion ='3' and s.camiseccion ='".$_GET["idsec3"]."' and s.estado=1";
			  //echo $sql3;exit;
			  
			  $sqlseccion3 = db_query($sql3);
			  $nrosec3     = db_num_rows($sqlseccion3);
			  //echo $nrosec3;exit;
  		      $rowseccion3    = db_fetch_array($sqlseccion3);
			  if ($nrosec3 >0 and $rowseccion3['ctipseccion']<>3) //Inicio Si 8  //ctipseccion = 3 es una seccion contenido 
			  {
				
				  $webplan  = $rowseccion3['ccodplantilla'];
				  $webtitu  = $rowseccion3['cnomseccion'];
				  $webdesc  = $rowseccion3['cdesseccion'];
				  $webtags  = $rowseccion3['ctagseccion'];
				  $codsecc    = $rowseccion3['ccodseccion'];
				  $nivsecc    = $rowseccion3['cnivseccion'];
				  $nomsecc    = $rowseccion3['cnomseccion'];
				  $imgsecc    = $rowseccion3['cimgseccion'];
				  $modsecc    = $rowseccion3['ccodmodulo'];
				  $estilo  = $rowseccion3['cincsecestilo'];
				  $ccodclase = $rowseccion3['ccodclase'];	//nuevo alex 
				  $pagsecc    = $rowseccion3['cpagseccion'];
				  $totalpantalla   = $rowseccion3['totalpantalla'];		
				  $rutasec    = $_GET['idsec']."/".$_GET['idsec2']."/".$_GET['idsec3'];
				  $cat        = substr($codsecc,0,20); 
				  $pagina     = 1;
				  $contenidoinc = "modulos/".$estilo;
				  
				  //**************************** Inicio Para idsec4 **************************
				  
				  if (!empty($_GET['idsec4'])) //Inicio Si 9
                  {                 
				 //echo "mexico";exit;
				    if ($_GET['idsec4']=="alex")  //Inicio Si 10  original $_GET['idsec4']>0
                    {
                      /** Seccion  3 con paginacion  **/
                      $pagina       = $_GET['idsec4'];
                      $contenidoinc = "modulos/".$estilo;
                    }
                    else  // else 10
                    {
        //hace un select si hay secciones con $_GET["idsec4"] si no lo hay pasa a comprobar si hay articulos con $_GET["idsec4"] 
		// si no lo hay te manda 404

					  $sql4="SELECT s.*, es.cincsecestilo FROM  seccion s, estiloseccion es WHERE s.ccodsecestilo = es.ccodsecestilo and s.ccodseccion like '".$cat."%' and s.cnivseccion ='4' and s.camiseccion ='".$_GET["idsec4"]."' and s.estado=1";					  
                      $sqlseccion4 = db_query($sql4);					  
                      $nrosec4     = db_num_rows($sqlseccion4);
					 //echo "Nro Registros:".$nrosec4."----".$sql4;exit;
					  $rowseccion4    = db_fetch_array($sqlseccion4);
                      if ($nrosec4 >0 and $rowseccion4['ctipseccion']<>3)  //ctipseccion = 3 es una seccion contenido 					 
					  //if 11 - Inicio Seccion 4  comprueba si no hay subsecciones en seccion 4
							  {
								 //$rowseccion4    = db_fetch_array($sqlseccion4);
								  $webplantilla   = $rowseccion4['ccodplantilla'];
								  $sectitulo      = $rowseccion4['cnomseccion'];
								  $secdescripcion = $rowseccion4['cdesseccion'];
								  $secmetatags    = $rowseccion4['ctagseccion'];
		
								  $codsecc    = $rowseccion4['ccodseccion'];
								  $nivsecc    = $rowseccion4['cnivseccion'];
								  $nomsecc    = $rowseccion4['cnomseccion'];
								  $imgsecc    = $rowseccion4['cimgseccion'];
								  $modsecc    = $rowseccion4['ccodmodulo'];
								  $estsecc    = $rowseccion4['ccodsecestilo'];
								  $pagsecc    = $rowseccion4['cpagseccion'];
								  $totalpantalla   = $rowseccion4['totalpantalla'];		
								  $rutasec    = $_GET['idsec']."/".$_GET['idsec2']."/".$_GET['idsec3']."/".$_GET['idsec4'];
								  $cat        = substr($codsecc,0,24); 							
								  $pagina = 1;						
								  $contenidoinc = "modulos/".$estilo;
								 //echo $contenidoinc;exit;
							if (!empty($_GET['idsec5'])) {  //Inicio Si 12               
								if ($_GET['idsec5']=="alex") //Inicio Si 13 original $_GET['idsec5']>0
								{
								/** Seccion  4 con paginacion  **/
									$pagina       = $_GET['idsec5'];
									$contenidoinc = "modulos/".$estilo; 
								} else  { // else 13	
									$sql4="SELECT c.ccodcontenido,c.ccodestcontenido,c.cimgcontenido,c.cnomcontenido,c.crescontenido,c.ctagcontenido,ec.cincestcontenido FROM contenido c, estilocontenido ec WHERE c.ccodestcontenido=ec.ccodestcontenido and c.camicontenido ='".$_GET["idsec5"]."'";
									//echo $sql4;exit;
									$sqlproducto4 = db_query($sql4);
									$nropro4      = db_num_rows($sqlproducto4);
									if ( $nropro4 >0 )  //Inicio Si 14
									{
										$rowproducto4 = db_fetch_array($sqlproducto4);
										$codcont        = $rowproducto4['ccodcontenido'];							
										$webtitu = $rowproducto4['cnomcontenido'];
										$webdesc = $rowproducto4['crescontenido'];
										$webtags = $rowproducto4['ctagcontenido'];
											//lo uso para facebok
										$cimgcontenido = $rowproducto4['cimgcontenido'];	
										$estilo = $rowproducto4['cincestcontenido'];
									//$ccodclase = $rowproducto4['ccodclase'];	//nuevo alex 
										$contenidoinc = "modulos/".$estilo;
										db_query("UPDATE contenido SET   nviscontenido = nviscontenido + 1  WHERE ccodcontenido = '" . $codcont . "'");
									}else { // else 14 									
										tep_redirect('/404.php');
									}   //Fin Si 14
								}     //Fin Si 13
							} //Fin Si 12
							}
                   else  //else 11 - Inicio Seccion 4  si no hay subsecciones en seccion 4 ahora comprueba	
				   		 //	si se ha ingresado un articulo en esa subseccion				  
                    {
						$sql3="SELECT c.ccodcontenido,c.ccodestcontenido,c.cimgcontenido,c.cnomcontenido,c.crescontenido,c.estado,c.ctagcontenido,ec.cincestcontenido FROM contenido c, estilocontenido ec WHERE c.estado=1 and c.ccodestcontenido=ec.ccodestcontenido and c.camicontenido ='".$_GET["idsec4"]."'";
						//echo $sql3;exit;
                        $sqlproducto3 = db_query($sql3);
                        $nropro3      = db_num_rows($sqlproducto3);
                        $rutasec    = $_GET['idsec']."/".$_GET['idsec2']."/".$_GET['idsec3']."/".$_GET['idsec4'];
						//echo $nropro3;exit;
                        if ( $nropro3 >0 )  //Inicio Si 15
                        {
						  $rowproducto3 = db_fetch_array($sqlproducto3);
						  $codcont    = $rowproducto3['ccodcontenido'];
						  $webtitu = $rowproducto3['cnomcontenido'];
						  $webdesc = $rowproducto3['crescontenido'];
						  $webtags = $rowproducto3['ctagcontenido'];
						  $cimgcontenido = $rowproducto3['cimgcontenido'];  //lo uso para facebok
						  $estilo = $rowproducto3['cincestcontenido'];
						  $contenidoinc = "modulos/".$estilo;
						  db_query("UPDATE contenido SET   nviscontenido = nviscontenido + 1  WHERE ccodcontenido = '" . $codcont . "'");
                        } else { //else 15								
						    if ($rowseccion4['ctipseccion']=='3') { //es una seccion tipo contenido lo he implementado
								 $contenidoinc = "modulos/articulo_contenido_vacio.php";
							}else { 
								tep_redirect('/404.php');
						    }							
                          
                        }  //Fin Si 15
                    } //Fin Si 11					
/********************************************** Fin Seccion 4 ***************************************************************/				

                }   //Fin Si 10
                  }//Fin Si 9
				  }
				else { // else 8				
					/** Contenido 2 ***/
					$sqlprodu2="SELECT         c.ccodcontenido,c.ccodestcontenido,c.cimgcontenido,c.cnomcontenido,c.crescontenido,c.ctagcontenido,ec.cincestcontenido 
					FROM contenido c, estilocontenido ec WHERE c.ccodestcontenido=ec.ccodestcontenido and c.camicontenido ='".$_GET["idsec3"]."'";
					//echo $sqlprodu2;exit;
					$sqlproducto2 = db_query($sqlprodu2);
					$nropro     = db_num_rows($sqlproducto2);
					$rutasec    = $_GET['idsec']."/".$_GET['idsec2']."/".$_GET['idsec3'];
					if ( $nropro >0 )	//Inicio Si 16						  
					{
					  $rowproducto2 = db_fetch_array($sqlproducto2);
					  $codcont = $rowproducto2['ccodcontenido'];
					  $webtitu = $rowproducto2['cnomcontenido'];
					  $webdesc = $rowproducto2['crescontenido'];
					  $webtags = $rowproducto2['ctagcontenido'];												
				      $cimgcontenido = $rowproducto2['cimgcontenido'];		
					  $estilo = $rowproducto2['cincestcontenido'];
					  $contenidoinc = "modulos/".$estilo;						
					  db_query("UPDATE contenido SET   nviscontenido = nviscontenido + 1  WHERE ccodcontenido = '" . $codcont . "'");
					}
					else //else 16
					{
						/***** Error Url idsec3 ********/										
						tep_redirect('/404.php');
					} //Fin 16
				} //Fin Si 8
			}  // Fin Si 7
		  } // Fin Si 6
		} // Fin Si 5
	  else  // else 4
		  {
			  /** Contenido 1 ***/
			  if ($_GET['idsec']=="panel")
			  {
				  $contenidoinc = "modulos/user_login.php";
			  }
			  else
			  {
				 //echo $_GET['idsec2'];	exit;
				//echo "hola";exit;	
			  $sql4 ="SELECT c.ccodcontenido,c.ccodestcontenido,c.cimgcontenido,c.cnomcontenido,c.crescontenido,c.ccodmodulo,c.ctagcontenido,ec.cincestcontenido FROM contenido c, estilocontenido ec WHERE c.ccodestcontenido=ec.ccodestcontenido and c.camicontenido ='".$_GET["idsec2"]."'";	
			// echo $sql4;exit;	  
			  $sqlproducto = db_query($sql4);			
			  $nropro      = db_num_rows($sqlproducto);
			  $rutasec    = $_GET['idsec']."/".$_GET['idsec2'];						
			  if ( $nropro >0 )
			  {
				  $rowproducto = db_fetch_array($sqlproducto);
				  $codcont = $rowproducto['ccodcontenido'];
  
				  $webtitu = $rowproducto['cnomcontenido'];
				  $webdesc = $rowproducto['crescontenido'];
				  $webtags = $rowproducto['ctagcontenido'];
				  //lo uso para facebok
				  $cimgcontenido = $rowproducto['cimgcontenido'];														
				  
				  $estilo = $rowproducto['cincestcontenido'];
  				  
				  if ($rowproducto['ccodmodulo']=="1400"){ $totalpantalla="ambos"; }
				  
				  $contenidoinc = "modulos/".$estilo;
				  
				  db_query("UPDATE contenido SET   nviscontenido = nviscontenido + 1  WHERE ccodcontenido = '" . $codcont . "'");
			  }
			  else
			  {
				  //echo "carajo";exit;
				  /***** Error Url idsec2 ********/
				  tep_redirect('/404.php');
			  }
			  }
		  }
	  } // Fin  Si 4
  }  // Fin Si 3
  } else    //  Si 2
  {	
	  tep_redirect('/404.php');
  }      // Fin Si 2
}  
else // else 1   cuando se visualiza PORTADA  pasa primero por aqui*/
{		
	
	$contenidoinc = "inccontenido.php";	
	
	/*------- Inicio Mostrar Usuario----------------*/
	if (!empty($_GET['idsec'])){ 
		if ($_GET['idsec']=='usuario'){ 
			$contenidoinc = "modulos/form-perfil-usuario.php";			
		}
	}
	/*------- Fin Mostrar Usuario----------------*/
}	// Fin Si 1
	
	
	//usado en inccabecera.php,pie-abajo.php
		//echo $ctelefonosec;exit;
	  $ccontacto=($ctelefonosec<>"")?"&nbsp;&nbsp;/&nbsp;&nbsp;".$ctelefonosec:"";	
	  $ccontacto .=($tmovil<>"")?"&nbsp;&nbsp;".$tmovil:"";
	  $ccontacto .=($rpm<>"")?"&nbsp;/&nbsp;<span style='color:#3f8bd8'>RPM : </span>".$rpm:"";							
	  $ccontacto=$ctelefonopri.$ccontacto;
	  //echo $ccontacto;exit; 
	  
	  $ccontactopie .=($ctelefonopri<>"")?"".$ctelefonopri."":"";
	  $ccontactopie .=($ctelefonosec<>"")?"".$ctelefonosec:"";	
	  $ccontactopie .=($tmovil1<>"")?"".$tmovil1:"";
	  $ccontactopie .=($tmovil2<>"")?"".$tmovil2:"";								  						
	  $ccontactopie=$ccontactopie;	  
	  
	  $ccdirecempresa .=($cdirecempresa<>"")?"".$cdirecempresa."":"";
  	  $ccdirecempresa .=($cdistrito<>"")?"".$cdistrito."":"";
	  $ccdirecempresa .=($cprovincia<>"")?"".$cprovincia."":"";
	  $ccdirecempresa="<strong>".$ccdirecempresa."</strong>";	  
?>

<?php		
	 
	 //$webdesc .=$webdesc." - ".$ccontactopie;
	//echo $webdesc;exit;
	 //echo $secdescripcion;exit;
	 //echo $codcont."ddddddd";exit;
	 //echo $codpage;exit;
	 //echo $cRutaWeb;exit; 
	 //echo $cimgcontenido."dasdas";exit;
	 //echo $contenidoinc;exit;
 	 //echo $codsecc."hola-";exit;	
	 //echo $cRutaWeb;exit; 
	  //echo $cRutaWeb. "config_style.php";exit;	  
	  //se cambia en funciones_web.php  funtion contenidosweb
	  $_SESSION['cSlidernivoslider']= "NO"; 
  	  $_SESSION['cSliderflow']= "NO"; 
	  $_SESSION['cSliderLayerSlider5']= "NO";  //Slider Imagenes (LayerSlider-5-3-0)
	  // $_SESSION['contenidodinamico'] = agrupa infinitecarousel2 y infinitecarousel3  //(infinitecarousel2.php=portada noticias y infinitecarousel3=videos-slider-portada-infinitecarousel2.php)
	  $_SESSION['contenidodinamico']= "NO";  
	  $_SESSION['infinitecarousel2']= "NO";
	  $_SESSION['infinitecarousel3']= "NO";
      $_SESSION['infinitecarousel4']= "NO"; //infinitecarousel4 (fotos-slider-portada-infinitecarousel2.php)
  	  $_SESSION['infinitecarousel5']= "NO"; //infinitecarousel5 (fotos-slider-portada-Thumbnails.php)	   
	  $_SESSION['Portada-Slider-Wowslider-1']= "NO"; // para noticias portada pero con Wowslider
	  
	   //---------- Inicio Detectar Movil
	    $_SESSION['dispositivo']="PC";
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	if (preg_match("/mobile/i", $useragent))
	{ $_SESSION['dispositivo']="Movil";	}
	if (preg_match("/tablet/i", $useragent))
	{ $_SESSION['dispositivo']="Tablet";	}
	   
 //---------- Fin Detectar Mobil
 
	  include $cRutaWeb. "config_style.php";
	   //ob_end_flush  
	 
?>
<!-- <script src="/include/js/jquery-1.7.1.min.js" type="text/javascript"></script>  -->
<script src="/include/js/jquery-1.7.1.min.js" type="text/javascript"></script> 
<!-- Inicio Para slider deslizante---------->
<!--
slider3=cuando se presenta en el centro 
slider1=cuando se presenta Cabecera 
-->

<?php if($_SESSION['cSlidernivoslider']=="SI") {  //Slider Imagenes (nivo slider) ?>

<link rel="stylesheet" href="/include/css/nivo-slider-v23.css" type="text/css" media="screen" />
<script src="/include/js/jquery.nivo.slider.pack-v23.js" type="text/javascript" ></script>
<script type="text/javascript">
	var cSlidernivoslider = jQuery.noConflict();
	cSlidernivoslider(window).load(function() {
        cSlidernivoslider('#slider1').nivoSlider({
			animSpeed:500,	
			pauseTime:5000
		});	
		 cSlidernivoslider('#slider3').nivoSlider({
			animSpeed:500,	
			pauseTime:5000
		});	
    });
</script>
<?php } ?> <!-- Fin  $_SESSION['cSlidernivoslider']-->

<?php if($_SESSION['cSliderflow']=="SI") { //Slider Imagenes (nivo slider) ?>
<script type="text/javascript" src="/include/js/jquery.flow.1.2.js"></script>
<script type="text/javascript">// <![CDATA[
	var cSliderflow = jQuery.noConflict();
	cSliderflow(document).ready(function(){
	cSliderflow("#myController").jFlow({
		slides: "#slides",
		controller: ".jFlowControl", // must be class, use . sign
		slideWrapper : "#jFlowSlide", // must be id, use # sign
		selectedWrapper: "jFlowSelected",  // just pure text, no sign
		auto: true,		//auto change slide, default true
		width: "100%",
		height: "180px",
		duration:500,
		prev: ".jFlowPrev", // must be class, use . sign
		next: ".jFlowNext" // must be class, use . sign
	});
});
</script>
<?php } ?> <!-- Fin  $_SESSION['cSliderflow']-->

<?php if($_SESSION['cSliderLayerSlider5']=="SI") { //Slider Imagenes (LayerSlider-5-3-0) ?>

<!-- Inicio  propaganda-cambiante-LayerSlider5.php -->
<!--<script src="/include/propaganda-cambiante/LayerSlider-5-3-0/layerslider/js/jquery.js" type="text/javascript"></script> -->
<link rel="stylesheet" href="/include/propaganda-cambiante/LayerSlider-5-3-0/layerslider/css/layerslider.css" type="text/css">
	<!-- External libraries: jQuery & GreenSock -->
	<script src="/include/propaganda-cambiante/LayerSlider-5-3-0/layerslider/js/greensock.js" type="text/javascript"></script>
	<script src="/include/propaganda-cambiante/LayerSlider-5-3-0/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
	<script src="/include/propaganda-cambiante/LayerSlider-5-3-0/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>

<script type="text/javascript"> 
	var cSliderLayerSlider5 = jQuery.noConflict();
    // Running the code when the document is ready
    cSliderLayerSlider5(document).ready(function(){
 
        // Calling LayerSlider on the target element with adding custom slider options
        cSliderLayerSlider5('#layerslider').layerSlider({
            autoStart: true,			
           // skin: 'borderlesslight',            
            skinsPath: '/include/propaganda-cambiante/LayerSlider-5-3-0/layerslider/skins/' 
            // Please make sure that you didn't forget to add a comma to the line endings
            // except the last line!
        });
    });
 
</script>
<!-- Fin  propaganda-cambiante-LayerSlider5.php -->
<?php } ?> 

<?php if($_SESSION['contenidodinamico']=="SI") {  
//infinitecarousel2.php  para Portada Noticias  ----infinitecarousel2
//videos-slider-portada-infinitecarousel2.php  ---- infinitecarousel3 ?>
 <script type="text/javascript" src="/include/infinitecarousel2/jquery.infinitecarousel2-thumbmod-1.js"></script>
    
	<?php if($_SESSION['infinitecarousel2']=="SI") {  //infinitecarousel2 (Portada Noticias) ?>
        <!--viene de Portada Noticias infinitecarousel2.php cuando se escoge en presentacion  -->
    
        <script type="text/javascript">
        var infinitecarousel2 = jQuery.noConflict();
            infinitecarousel2(function(){
                infinitecarousel2('#infinitecarousel2').infiniteCarousel({
                    displayTime: 6000,
                    inView: 1,
                    advance:1,
                    autoPilot: false,
                    internalThumbnails: false,
            
                    thumbnailWidth: '80px',
                    thumbnailHeight: '60px',
                    thumbnailFontSize: '1 em', 
                    imagePath: '/include/infinitecarousel2/images/',
                    textholderHeight : .10,
                    padding:'10px',		
                    //displayThumbnails: 0,
                  displayThumbnailBackground: 0, 
            });
        });
        </script>
    <?php } ?><!-- Fin  $_SESSION['infinitecarousel2']-->
    
	<?php if($_SESSION['infinitecarousel3']=="SI") {  //infinitecarousel3 ( videos-slider-portada-infinitecarousel2.php ) ?>
        <!--usado por videos-slider-portada-infinitecarousel2.php -->
        <script type="text/javascript">
            var infinitecarousel3 = jQuery.noConflict();
            infinitecarousel3(function(){
                infinitecarousel3('#infinitecarousel3').infiniteCarousel({
                transitionSpeed : 1800,
                displayTime : 5500,
                textholderHeight : .2,
                displayProgressBar : 1, /* valor 0 no se muestra barra progreso*/
                displayThumbnails: 1, /* valor 0 no se muestra Thumbnails debajo */
                displayThumbnailNumbers:0,
                displayThumbnailBackground: 0,		   
            });
        });
        </script>
        
         <!--------------------- Inicio Para visualizar Formularios Modales ----------------------->
         <!--------------------- videos-slider-portada-infinitecarousel2.php  utiliza ventana modal hay que cambiarlo ----------------------->
        <!--http://www.paginaswebynnova.com/web/descargas-y-script/formulario-de-contacto-en-ventana-modal-mejorado.html -->
        <!-- <script type="text/javascript" src="/include/modal/jquery-1.8.3.min.js"></script>  -->
        <script type="text/javascript" src="/include/modal/fancybox/jquery.fancybox-1.3.4.js"></script>
        <script type="text/javascript" src="/include/modal/js-contacto-modal-ynnova.js"></script>
        <link href="/include/modal/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css"/>
        
        <!--<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>-->
        <script type="text/javascript">	  
             var modalfancybox = jQuery.noConflict();
           modalfancybox(document).ready(function() {	 
            modalfancybox("a#open_video").fancybox(	);	
            modalfancybox("a.grouped_elements").fancybox({
                'transitionIn'	: 'elastic',
                'transitionOut'	: 'elastic',
                'titlePosition'  : 'over'		
            });/* fotos-slider-portada-infinitecarousel2.php*/		
            
            modalfancybox("a.actualizarpadre").fancybox({
              /*'width': 800,
              'height': 450,*/
              'type'	: 'iframe',
              "hideOnOverlayClick" : false, // Evita cerrar cuando se hace click fuera de  fancybox
              closeClick: false,
              'onClosed': function() {
                parent.location.reload(true);
              }
            }
            );/*-- fin actualizarpadre - */	
        }
        );
        </script>
        <!-------- Fin Para visualizar Formularios Modales ------->
	
    <?php } ?> <!-- Fin  $_SESSION['infinitecarousel3']-->

	<?php if($_SESSION['infinitecarousel4']=="SI") {  //infinitecarousel4 (fotos-slider-portada-infinitecarousel2.php) ?>
    
    <!--usado por fotos-slider-portada-infinitecarousel2.php -->
    <script type="text/javascript">
        var infinitecarousel4 = jQuery.noConflict();
        infinitecarousel4(function(){
        infinitecarousel4('#infinitecarousel4').infiniteCarousel({
            transitionSpeed : 1000,
            displayTime : 3000,
            textholderHeight : .2,
            displayProgressBar : 0, /* valor 0 no se muestra barra progreso*/
            displayThumbnails: 0, /* valor 0 no se muestra Thumbnails debajo */
            displayThumbnailNumbers:0,
            displayThumbnailBackground: 1,		   
        });
    });
    </script>
    <?php } ?><!-- Fin  $_SESSION['infinitecarousel4']-->
    
    <?php if($_SESSION['infinitecarousel5']=="SI") {  //infinitecarousel5 (fotos-slider-portada-Thumbnails.php) ?>
		<script type="text/javascript">
		var infinitecarousel5 = jQuery.noConflict();
        infinitecarousel5(function(){
            infinitecarousel5('#infinitecarousel5').infiniteCarousel({
            transitionSpeed : 1000,
            displayTime : 2900,
            textholderHeight : .2,
            displayProgressBar : 1, /* valor 0 no se muestra barra progreso*/
            displayThumbnails: 1, /* valor 0 no se muestra Thumbnails debajo */
            displayThumbnailNumbers:0,
            displayThumbnailBackground: 1,               
            });
        });
        </script>
     <?php } ?><!-- Fin  $_SESSION['infinitecarousel5]-->   
     
<?php } ?>  <!-- Fin $_SESSION['contenidodinamico'] -->


<?php if($subdominio=="desarrollo.com" or $subdominio=="cuartocontingente93.com"  ) {  ?>
<!--
Inicio Para jScrollPane  lo pase a su config_style.php
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"> </script>
 -->

<script src="/include/js/jScrollPane/jquery.jscrollpane.min.js"></script>
<script src="/include/js/jScrollPane/jquery.mousewheel.js"></script>
<link rel="stylesheet" type="text/css" href="/include/js/jScrollPane/jquery.jscrollpane.css">
<script>
var jsc = jQuery.noConflict();
	jsc(document).ready(function(){
		jsc('.ctn_comen_post').jScrollPane({ /*.Initialize jScrollPane to your selector.*/
		horizontalGutter:5,
		verticalGutter:12,
		'showArrows': false
		});
		
		jsc('.jspDrag').hide(); /*Barra de desplazamiento debe estar oculta si no hay ratón sobre en él.*/
		jsc('.jspScrollable').mouseenter(function(){
			jsc('.jspDrag').stop(true, true).fadeIn('slow');
		});
		jsc('.jspScrollable').mouseleave(function(){
			jsc('.jspDrag').stop(true, true).fadeOut('slow');
		});
	
	});
</script>
<?php } ?> <!--Fin Para jScrollPane ---------->

<script src="include/js/prefixfree.min.js" type="text/javascript"></script>
  
  
  <!--INICIO SEO: Atributos Alt y Title Automáticos en las Imágenes 
PROBLEMAS en el slider le pone caption -->
<script type='text/javascript'>
//	$(document).ready(function() {
//	$('img').each(function(){
//	var $img = $(this);
//	var filename = $img.attr('src')
//	$img.attr('title', filename.substring((filename.lastIndexOf('/'))+1, filename.lastIndexOf('.')));
//	$img.attr('alt', filename.substring((filename.lastIndexOf('/'))+1, filename.lastIndexOf('.')));
//	});
//	});
//</script>

<!--Utilizado por art_stylo_galeria.php -->
<link rel="stylesheet" type="text/css" href="/include/Shadowbox/shadowbox.css"/>
<script type="text/javascript" src="/include/Shadowbox/shadowbox.js"></script>
<script type='text/javascript'>
	Shadowbox.init({
        overlayColor: "#000",
        overlayOpacity: "0.6",		
    });	
</script>   


<!--Inicio Menu Responsive -->
<script type="text/javascript">
	var menu = jQuery.noConflict();
   menu('#submenu1').click(function(){
      $(this).children('ul').SlideToggle();
    });
</script>
<!--Fin Menu Responsive -->

<script type="text/javascript">
	var conexion;
	conexion=new XMLhttpRequest();	
	conexion.open("GET","index.php?variable=hola",true);
	conexion.send();

</script>

<?php if($_SESSION['Portada-Slider-Wowslider-1']=="SI") {  //(Portada Noticias pero con Wowslider) ?>
    <link rel="stylesheet" type="text/css" href="/modulos/wowslider/style_wowslider.css" />
    <script type="text/javascript" src="/modulos/wowslider/wowslider.js"></script>
    <script type="text/javascript" src="/modulos/wowslider/script.js"></script>
<?php } ?> <!--Fin Para Portada Noticias pero con Wowslider ---------->
 
 <?php if ($cscriptfacebook<>"" ) {	echo  $cscriptfacebook;} 	?>
 <?php if ($Script_chat<>"" ) {	echo  $Script_chat ;}  ?>
 
 <script type="text/javascript">
$(document).ready(function(){
	var imgSrc = $(this).find('img').attr('src'); // image stored as variable
  	 $('meta[property="og:image"]').attr('content', 'ica');	
	  $meta = document.getElementById('og:image');
        $meta.setAttribute("content","sss");
		
});
</script>  

 <?php	
	//Se escoge en Gestor de Estilos Web   (Form-Actualiza-estilos-web.php  y lo graba en la tabla estilopagina)y jala  los valores de la tabla  webparametros código  ccodparametro= 0020       
	//echo $menuestilomenu."--head-general.php---";exit;
	//echo $menu_estilo."-----";exit;
 	switch ($menuestilomenu) {
	 case "1": // Menu Duramenu 
?>	 
 	<link  href="/menus/menu_clasico/css/menu_clasico.css"  rel="stylesheet" type="text/css" >
<?php		 
	 case "2": // Menu Duramenu 
?>	 
 	<link  href="/menus/zetta_menu/css/blue.css"  rel="stylesheet" type="text/css" >
<?php		 
	 case "3": // Menu Duramenu 
?>	 
	<!-- BOOTSTRAP 3.3.6 -->
    <link href="/menus/menu_duramenu/css/bootstrap.min.css" rel="stylesheet" type="text/css">
       <!-- DURA MENU V1.0 -->
    <link href="/menus/menu_duramenu/css/dura-main.css" rel="stylesheet" type="text/css">
    <link href="/menus/menu_duramenu/css/dura-responsive.css" rel="stylesheet" type="text/css">
       <!-- FONT AWESOME -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- FONTS -->
    <link href="css/font-arimo.css" rel="stylesheet" type="text/css">
    <link href="css/font-notosans.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Khula:400,300' rel='stylesheet' type='text/css'> 
    
      <!-- DURAMENU V1.0 JAVASCRIPT FILES TO BE INCLUDED -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="/menus/menu_duramenu/js/bootstrap.min.js"></script>
    <script src="/menus/menu_duramenu/js/dura-main.js"></script>
<?php		 
	 case "4": // Otros menus
	
  break;
	}	
  ?>
  
