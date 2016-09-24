<?php session_start();
 //-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 
 extract($_POST); 
   $paginacion=$_POST['paginacion'];
$menuinden ="0";  
 include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
 include_once($_SERVER['DOCUMENT_ROOT']. '/webadmin/recoger-valores.php');	 
 //ccodsubestilo ='".$form_entrada['selectsub']."',  puso para confundir	
// echo $totalpantalla;exit;
 //echo "estado=".$estado ."--id=".$id ;exit;
$update_query = "UPDATE seccion SET
						mostrarurlcatebase   ='".$mostrarurlcatebase."',											
						totalpantalla   ='".$totalpantalla."',	
						ccodclase   ='".$selectclase."',
						ccodmodulo    ='".$selectmodulo."',						
						ccodsecestilo ='".$selectestilo."',						
						cnomseccion   ='".$titulo."',										
						camiseccion   ='".$amigable."',
						ctitseccion   ='".$txttitulo."',
						cdesseccion   ='".$txtdetalle."',
						ctagseccion   ='".$txttags."',
						cimgseccion   ='".$cimgseccion."',
						cnewmenu      ='".$menuinden."',
						estado      ='".$estado."',
						ctipseccion   ='".$selectenlace."',
						curlseccion   ='".$rutaenlace."',
						cpagseccion   ='".$txtpaginar."',
						cordcontenido ='".$cordcontenido."',
						ccodusuario   ='".$_SESSION['id_usuario']."',
						dfecmodifica  ='".date("Y-m-d H:i:s")."',
						menuestilomenu   ='".$menuestilomenu."',  
						multidrop   ='".$multidrop."' 												
					     WHERE ccodseccion='".$id."'";		
 //echo $update_query , exit;						   
/***  Inicio Grabado EstiloMenu	*/ 
 include($_SERVER['DOCUMENT_ROOT']. '/webadmin/mantenimiento/actualizaseccionestilomenu.php');
 //exit;
/***  Fin Grabado EstiloMenu	*/ 

  
/***  Inicio Grabado de Ubicaciones de Menu 	*/
	$nivel = $selectnivel;	
	if ($nivel<=1) // solo esta aplicando a los padre no alos hijos
	{
//		db_query("DELETE FROM seccionmenu where ccodseccion = '".$form_entrada['ids']."'");
		
		$sqlmenuubi = "select * from pagemenu where ccodpage='".$selectpage."' and cestmenu='1'";
		$resmenuubi = db_query($sqlmenuubi);		
		while ($rows_menuubi = mysql_fetch_array($resmenuubi)) 
		{			
			//$ubimen = 'rd'.$rows_menuubi['ccodmenu'].$rows_menuubi['cordmenu'];
			$ubimen = ${'rd'.$rows_menuubi['ccodmenu'].$rows_menuubi['cordmenu']};
			
			$sqlmenusi = "select * from seccionmenu where ccodseccion='".$id."' and ccodmenu='".$rows_menuubi['ccodmenu']."'";
			$resmenusi = db_query($sqlmenusi);
			$totalsi   = db_num_rows($resmenusi);	
			if($totalsi==0)
			{
				if ($ubimen)	
				{
					//echo "holaaaa";exit;
					$save2_query = "INSERT INTO seccionmenu (
					ccodseccion, 
					ccodmenu,					
					cordmenu) 
					VALUES (
					'".$id."',
					'".$rows_menuubi['ccodmenu']."',
					'0'
					)";
					db_query($save2_query);	
				}
			}
			else
			{
				if ($ubimen)	
				{
					$insertado="";
				}
				else
				{
					$save3_query = "DELETE FROM seccionmenu where ccodseccion= '".$id."' and  ccodmenu='".$rows_menuubi['ccodmenu']."'";
					db_query($save3_query);	
					
			}
			}
		}
	}										
	
/***  Fin  Grabado de Ubicaciones de Menu 	*/

	//db_query($update_query);
	
if(mysql_query($update_query)){ 	
	?>
    <script language='JavaScript'>    
		page = "<?=$paginacion?>";
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+'/webadmin/index.php?option=com_categoria&mensaje=La Categoria ha sido guardado correctamente'
	</script> 	
	<?php    	
}else {	
	 $mensaje = "Ha ocurrido un error al actualizar la Sección, prueba mas tarde";          
	 echo $mensaje;
}   
?>