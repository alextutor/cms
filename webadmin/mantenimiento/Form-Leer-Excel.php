<?php if(isset($_POST['submitbutton'])) { 
	//tomo el valor de un elemento de tipo texto del formulario 
	
	$cCarpetadestino = "/uploads/";
		
	$nombre_archivo = $_FILES['userfile']['name']; 
	$tipo_archivo =  $_FILES['userfile']['type']; 
	$tamano_archivo =  $_FILES['userfile']['size']; 
	
	
	//$file = basename($path); 
	$file = explode('.',$nombre_archivo); 
	$cnombresinextension = $file[0]; 
	$extension = substr($_FILES['userfile']['name'], strrpos($_FILES['userfile']['name'],'.'));  	
	
	//se repite con la variables hay que reemplazar las variables por session
	$_SESSION['cnombresinextension'] = $cnombresinextension;
	$_SESSION['extension'] = $extension;
	$_SESSION['cCarpetadestino'] = $cCarpetadestino;
	
/// Inicio codigo azar deveria meterlo en funciones web
	function codigo_azar2($length)
	{
		$str = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			
		for($i=0;$i<$length;$i++) 
			$key .= $str[mt_rand(0,strlen($str)-1)];
		return $key;
	} 
	/// Fin  codigo azar
	$cCodigoAzar =codigo_azar2(4);
	$_SESSION['cCodigoAzar'] = $cCodigoAzar;
	
	$cNuevoNombre=$cCarpetadestino.$cnombresinextension.$cCodigoAzar.$extension;
	$cNombreoriginalexcel=$cCarpetadestino.$cnombresinextension.$extension;
		
	if (!((strpos($tipo_archivo, "html") || 
	strpos($tipo_archivo, "htm")) && ($tamano_archivo < 100000))) { 
		echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .xlsx o .xls<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
	}else{ 		
		//echo $cNuevoNombre."-----".$cNombreoriginalexcel;exit;
		//Nota:La función move_uploaded_file() solo sirve una vez
		if (!copy($_FILES['userfile']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$cNombreoriginalexcel)) {
    		echo "Error al copiar $cNombreoriginalexcel...\n";
			exit;
		}
		
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$cNuevoNombre )) { 				
			//mueve archivo original con el mismo mombre arriba mueve pero le cambia nombre						
			$_SESSION['cNuevoNombreexcel'] = $cNuevoNombre;
			$_SESSION['cNombreoriginalexcel'] = $cNombreoriginalexcel;
			//echo $_SESSION['cNombreExcel'];exit;
			//echo "El archivo ha sido cargado correctamente."; 
			//echo $target_path;exit;
	?>	
    	<script language='JavaScript'>    
			page = "<?=$paginacion?>";
			ROOT_PATH = "<?php echo $_SERVER['DOCUMENT_ROOT']?>";
			location.href= '/webadmin/index.php?option=com_articulos_new'
		</script> 					
	<?php		
		}else{ 
			echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
		} 
	} 

?>
    
<?php }else{ ?>	
	<h3>Seleccionar archivo Excel</h3>
    <form id="frmload" name="frmload" method="POST" action="#" enctype="multipart/form-data">
        <input type="file" name="userfile" /> &nbsp; &nbsp; &nbsp; 
        <input  type='submit'  name="submitbutton" value="----- IMPORTAR -----" />
        <input type="hidden" name="option" value="com_articulos_new">
    </form>
<?php } ?>  

