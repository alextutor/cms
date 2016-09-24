<?php  if ( extension_loaded( "zlib" ) ) ob_start( "ob_gzhandler" );
	session_start();
	//-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 
	include "/config.php";	
	// configuramos la base de datos	
	include "/include/funciones_web.php";
	//include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/mis-funciones.php'); 	
$submenu ='0';
$mailserver ="mail.idnegocios.com";
$mailuser   ="info@idnegocios.com";
$mailpass   ="123456abc";
$totalpantalla="Portada";
$domain       = $_SERVER['HTTP_HOST']; /*www.juvame.com*/
$domain_parts = explode('.',$domain);
$nropartes = count($domain_parts);
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
if ( $nrosub >0 )
{	
	$rowpagew    = db_fetch_array($sqlpagew);
	$webanalytics  = $rowpagew['canagoogle'];
	$webgooglemaps = $rowpagew['cmapgoogle'];
	$pais          = $rowpagew['ccodpais'];
	if ($rowpagew['credpage']<>"")
	{
		$sqlpageweb  = db_query("SELECT * FROM  page WHERE ccodpage='".$rowpagew['credpage']."' ");
		$rowpageweb  = db_fetch_array($sqlpageweb);
		
		$codpage     = $rowpageweb['ccodpage'];
		$_SESSION['scodpage ']= $rowpageweb['ccodpage']; //lo implemente para usarlo en oferta_01.php
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
	}
	else
	{
		$codpage     = $rowpagew['ccodpage'];
		$_SESSION['scodpage ']= $rowpagew['ccodpage']; //lo implemente para usarlo en oferta_01.php
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
		$cdistrito  = $rowpagew['cdistrito'];
		$cdirecempresa  = $rowpagew['cdirecempresa'];
		$chorarioatencion  = $rowpagew['chorarioatencion'];
		$ctelefonopri  = $rowpagew['ctelefonopri'];		
		$ctelefonosec= $rowpagew['ctelefonosec'];	
		$tmovil	= $rowpagew['tmovil'];	
		
		$mostrarprecios = $rowpagew['nmosprecio'];
		$mostrarpedidos = $rowpagew['nsispedidos'];
		
		$modulo= $rowpageweb['ccodmodulo'];
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
// cuando no se visualiza pagina principal aqui entra contactos
if (!empty($_GET['idsec'])){ 
		$sqlseccion = db_query("SELECT s.*, es.cincsecestilo FROM  seccion s, estiloseccion es WHERE s.ccodsecestilo = es.ccodsecestilo and s.ccodpage='".$codpage."' and s.camiseccion ='".$_GET["idsec"]."' and s.cnivseccion ='1'");
		$nrosec     = db_num_rows($sqlseccion);		
		//$nrosec=1 cuando repuestos/por-marca-de-motor; //$pagsecc
		if ( $nrosec >0 )
		{
			$rowseccion     = db_fetch_array($sqlseccion);
			$webplan   = $rowseccion['ccodplantilla'];
			$webtitu   = $rowseccion['ctitseccion'];
			$webdesc   = $rowseccion['cdesseccion'];
			$webtags   = $rowseccion['ctagseccion'];
			$codsecc   = $rowseccion['ccodseccion'];
			$nivsecc   = $rowseccion['cnivseccion'];
			$nomsecc   = $rowseccion['cnomseccion'];
			$imgsecc   = $rowseccion['cimgseccion'];
			$modsecc   = $rowseccion['ccodmodulo'];
			$webestilo = $rowseccion['cincsecestilo'];
			$pagsecc   = $rowseccion['cpagseccion'];
			$totalpantalla   = $rowseccion['totalpantalla'];			
			$rutasec   = "/".$_GET['idsec'];
			$cat       = substr($codsecc,0,12); 
			$pagina    = 1;
			$contenidoinc = "modulos/".$webestilo; 	
			
			if (!empty($_GET['idsec2'])  and $_GET['idsec']<>'panel')
			{	
				
				if ($_GET['idsec2']>0)
				{
					/** Seccion con paginacion **/
					$pagina       = $_GET['idsec2'];
					$contenidoinc = "modulos/".$webestilo;
				
				}
				else
				{
					$sqlseccion2 = db_query("SELECT s.*, es.cincsecestilo FROM  seccion s, estiloseccion es WHERE s.ccodsecestilo = es.ccodsecestilo and s.ccodseccion like '".$cat."%' and s.cnivseccion ='2' and s.camiseccion ='".$_GET["idsec2"]."' ");
					$nrosec2     = db_num_rows($sqlseccion2);
					if ( $nrosec2 >0 )
					{					  
					 // Seccion 2
						$rowseccion2    = db_fetch_array($sqlseccion2);
						$webplan  = $rowseccion2['ccodplantilla'];
						$webtitu  = $rowseccion2['ctitseccion'];
						$webdesc  = $rowseccion2['cdesseccion'];
						$webtags  = $rowseccion2['ctagseccion'];
						$codsecc    = $rowseccion2['ccodseccion'];
						$nivsecc    = $rowseccion2['cnivseccion'];
						$nomsecc    = $rowseccion2['cnomseccion'];
						$imgsecc    = $rowseccion2['cimgseccion'];
						$modsecc    = $rowseccion2['ccodmodulo'];
						$webestilo  = $rowseccion2['cincsecestilo'];
						$pagsecc    = $rowseccion2['cpagseccion'];
						$totalpantalla   = $rowseccion2['totalpantalla'];		
						$rutasec    = "/".$_GET['idsec']."/".$_GET['idsec2'];
						$cat        = substr($codsecc,0,16); 
						$pagina     = 1;
						$contenidoinc = "modulos/".$webestilo;
						if (!empty($_GET['idsec3']))
						{
							if ($_GET['idsec3']>0)
								{
									/** Seccion  2 con paginacion  **/
									$pagina       = $_GET['idsec3'];
									$contenidoinc = "modulos/".$webestilo; 
								}
								else
								{
									/**  Seccion  3 ********/
									$sqlseccion3 = db_query("SELECT s.*, es.cincsecestilo FROM  seccion s, estiloseccion es WHERE s.ccodsecestilo = es.ccodsecestilo and s.ccodseccion like '".$cat."%' and s.cnivseccion ='3' and s.camiseccion ='".$_GET["idsec3"]."' ");
									$nrosec3     = db_num_rows($sqlseccion3);
									if ($nrosec3 >0 )
									{
										$rowseccion3    = db_fetch_array($sqlseccion3);
										$webplan  = $rowseccion3['ccodplantilla'];
										$webtitu  = $rowseccion3['cnomseccion'];
										$webdesc  = $rowseccion3['cdesseccion'];
										$webtags  = $rowseccion3['ctagseccion'];
										$codsecc    = $rowseccion3['ccodseccion'];
										$nivsecc    = $rowseccion3['cnivseccion'];
										$nomsecc    = $rowseccion3['cnomseccion'];
										$imgsecc    = $rowseccion3['cimgseccion'];
										$modsecc    = $rowseccion3['ccodmodulo'];
										$webestilo  = $rowseccion3['cincsecestilo'];
										$pagsecc    = $rowseccion3['cpagseccion'];
										$totalpantalla   = $rowseccion3['totalpantalla'];		
										$rutasec    = $_GET['idsec']."/".$_GET['idsec2']."/".$_GET['idsec3'];
										$cat        = substr($codsecc,0,20); 
										$pagina     = 1;
										$contenidoinc = "modulos/".$webestilo;
			
		  if (!empty($_GET['idsec4']))
		  {
			  if ($_GET['idsec4']>0)
			  {
				  /** Seccion  3 con paginacion  **/
				  $pagina       = $_GET['idsec4'];
				  $contenidoinc = "modulos/".$webestilo;
			  }
			  else
			  {
				  /******* Seccion 4 ************/
				  $sqlseccion4 = db_query("SELECT s.*, es.cincsecestilo FROM  seccion s, estiloseccion es WHERE s.ccodsecestilo = es.ccodsecestilo and s.ccodseccion like '".$cat."%' and s.cnivseccion ='4' and s.camiseccion ='".$_GET["idsec4"]."' ");
				  $nrosec4     = db_num_rows($sqlseccion4);
				  if ($nrosec4 >0 )
				  {
					  $rowseccion4    = db_fetch_array($sqlseccion4);
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
					  $contenidoinc = "modulos/".$webestilo;

													
													if (!empty($_GET['idsec5']))
													{
														if ($_GET['idsec5']>0)
														{
														/** Seccion  4 con paginacion  **/
															$pagina       = $_GET['idsec5'];
															$contenidoinc = "modulos/".$webestilo; 
														}
														else
														{
															/** Contenido 4 ***/
															$sqlproducto4 = db_query("SELECT c.ccodcontenido,c.ccodestcontenido,c.cnomcontenido,c.crescontenido,c.ctagcontenido,ec.cincestcontenido FROM contenido c, estilocontenido ec WHERE c.ccodestcontenido=ec.ccodestcontenido and c.camicontenido ='".$_GET["idsec5"]."'");
															$nropro4      = db_num_rows($sqlproducto4);
															if ( $nropro4 >0 )
															{
																$rowproducto4 = db_fetch_array($sqlproducto4);
																$codcont        = $rowproducto4['ccodcontenido'];
																
																$webtitu = $rowproducto4['cnomcontenido'];
																$webdesc = $rowproducto4['crescontenido'];
																$webtags = $rowproducto4['ctagcontenido'];

																$webestilo = $rowproducto4['cincestcontenido'];

																$contenidoinc = "modulos/".$webestilo;


																db_query("UPDATE contenido SET   nviscontenido = nviscontenido + 1  WHERE ccodcontenido = '" . $codcont . "'");
															}
															else
															{
																/***** Error Url idsec5 ********/
																tep_redirect('/404.php');
															}
														}
													}
												}
												else
												{
													/** Contenido 3 ***/
													$sqlproducto3 = db_query("SELECT c.ccodcontenido,c.ccodestcontenido,c.cnomcontenido,c.crescontenido,c.ctagcontenido,ec.cincestcontenido FROM contenido c, estilocontenido ec WHERE c.ccodestcontenido=ec.ccodestcontenido and c.camicontenido ='".$_GET["idsec4"]."'");
													$nropro3      = db_num_rows($sqlproducto3);
													$rutasec    = $_GET['idsec']."/".$_GET['idsec2']."/".$_GET['idsec3']."/".$_GET['idsec4'];
													if ( $nropro3 >0 )
													{
														$rowproducto3 = db_fetch_array($sqlproducto3);
														$codcont    = $rowproducto3['ccodcontenido'];

														$webtitu = $rowproducto3['cnomcontenido'];
														$webdesc = $rowproducto3['crescontenido'];
														$webtags = $rowproducto3['ctagcontenido'];

														$webestilo = $rowproducto3['cincestcontenido'];

														$contenidoinc = "modulos/".$webestilo;

														db_query("UPDATE contenido SET   nviscontenido = nviscontenido + 1  WHERE ccodcontenido = '" . $codcont . "'");
													}
													else
													{
														/***** Error Url idsec4 ********/
														tep_redirect('/404.php');
													}
												}
											}
										}
									}
								else
								{
									/** Contenido 2 ***/
									$sqlproducto2 = db_query("SELECT c.ccodcontenido,c.ccodestcontenido,c.cnomcontenido,c.crescontenido,c.ctagcontenido,ec.cincestcontenido FROM contenido c, estilocontenido ec WHERE c.ccodestcontenido=ec.ccodestcontenido and c.camicontenido ='".$_GET["idsec3"]."'");
									$nropro     = db_num_rows($sqlproducto2);
									$rutasec    = $_GET['idsec']."/".$_GET['idsec2']."/".$_GET['idsec3'];
									if ( $nropro >0 )
									{
										$rowproducto2 = db_fetch_array($sqlproducto2);
										$codcont = $rowproducto2['ccodcontenido'];

										$webtitu = $rowproducto2['cnomcontenido'];
										$webdesc = $rowproducto2['crescontenido'];
										$webtags = $rowproducto2['ctagcontenido'];

										$webestilo = $rowproducto2['cincestcontenido'];

										$contenidoinc = "modulos/".$webestilo;
										
										db_query("UPDATE contenido SET   nviscontenido = nviscontenido + 1  WHERE ccodcontenido = '" . $codcont . "'");
									}
									else
									{
										/***** Error Url idsec3 ********/
										tep_redirect('/404.php');
									}
								}
							}
						}
					}
				else
					{
						/** Contenido 1 ***/
						if ($_GET['idsec']=="panel")
						{
							$contenidoinc = "modulos/user_login.php";
						}
						else
						{
						$sqlproducto = db_query("SELECT c.ccodcontenido,c.ccodestcontenido,c.cnomcontenido,c.crescontenido,c.ctagcontenido,ec.cincestcontenido FROM contenido c, estilocontenido ec WHERE c.ccodestcontenido=ec.ccodestcontenido and c.camicontenido ='".$_GET["idsec2"]."'");
						$nropro      = db_num_rows($sqlproducto);
						$rutasec    = $_GET['idsec']."/".$_GET['idsec2'];
						if ( $nropro >0 )
						{
							$rowproducto = db_fetch_array($sqlproducto);
							$codcont = $rowproducto['ccodcontenido'];

							$webtitu = $rowproducto['cnomcontenido'];
							$webdesc = $rowproducto['crescontenido'];
							$webtags = $rowproducto['ctagcontenido'];

							$webestilo = $rowproducto['cincestcontenido'];

							$contenidoinc = "modulos/".$webestilo;
							
							db_query("UPDATE contenido SET   nviscontenido = nviscontenido + 1  WHERE ccodcontenido = '" . $codcont . "'");
						}
						else
						{
							/***** Error Url idsec2 ********/
							tep_redirect('/404.php');
						}
						}
					}
				}
			}
		}
		else
		{
			tep_redirect('/404.php');
		}
}
else /* de if (!empty($_GET['idsec']))  cuando se visualiza pagina principal */
{	
	$contenidoinc = "inccontenido.php";	
}
  $ccontacto=($ctelefonosec<>"")?"&nbsp;&nbsp;/&nbsp;&nbsp;".$ctelefonosec:"";	
  $ccontacto .=($tmovil<>"")?"&nbsp;&nbsp;/&nbsp;&nbsp;".$tmovil:"";							
  $ccontacto=$ctelefonopri.$ccontacto;
  include "/config_style.php";
?>
