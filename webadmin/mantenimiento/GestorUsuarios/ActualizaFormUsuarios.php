<?php session_start();
 //-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 
 extract($_POST);
// echo $nivel;exit;
  $paginacion=$_POST['paginacion'];
$menuinden ="0";  
 include($_SERVER['DOCUMENT_ROOT']. '/config.php');	 
 //ccodsubestilo ='".$form_entrada['selectsub']."',  puso para confundir	
// echo $totalpantalla;exit;
 //echo "estado=".$estado ."--id=".$id ;exit;
$update_query = "UPDATE usuarios SET
						nombre   ='".$nombre."',	
						nick   ='".$nick."',	
						password  =AES_ENCRYPT('$password','$llavesita'),
						email    ='".$email."',						
						telefono ='".$telefono."',						
						nivel   ='".$nivel."' 																
					  WHERE id_usuario='".$id."'";
					  
//echo $update_query;exit;
if(mysql_query($update_query)){ 	
	?>
    <script language='JavaScript'>    
		page = "<?=$paginacion?>";
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+'/webadmin/index.php?option=com_usuario&mensaje=El Usuario ha sido guardado correctamente'
	</script> 	
	<?php    	
}else {	
	 $mensaje = "Ha ocurrido un error al actualizar el Usuario, prueba mas tarde";          
	 echo $mensaje;
}   
?>