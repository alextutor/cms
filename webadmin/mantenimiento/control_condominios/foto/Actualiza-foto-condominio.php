<?php session_start();
//-------para que nome muestre errores en desarollo xamp ejemplo inicializar valores
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 
  include_once ($_SERVER['DOCUMENT_ROOT']. '/config.php');		
  include_once ($_SERVER['DOCUMENT_ROOT']. '/include/funciones_web.php');	
   extract($_POST);	
  $fecha= date("Y-m-d H:i:s"); 
  $cfechacorta=date("Y/m/d"); 	 
  $nivel="USUARIO"; 
   $myfile= $_FILES['files']['name'];
   //  print_r($_FILES); 
  //echo $myfile ."hola";exit;
  $imagenfoto="/modulos/comentario-combinado-multiple/usuario-anonimo.gif";
  
  
 /*----- Inicio Subir Foto Servidor -------*/
if(strlen($_FILES['files']['name'])<>0){ // inicio si 1
	//echo "hola";exit;
	$uploadedfileload="true";
	$uploadedfile_size=$_FILES['files'][size];
	//echo $_FILES[files][name];
	//echo $_FILES['files'][type];
	if ($_FILES['files'][size]>200000)
	{$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo<BR>";
	$uploadedfileload="false";}
	
	if (!($_FILES['files'][type] =="image/jpeg" OR $_FILES['files'][type] =="image/gif" OR $_FILES['files'][type] =="image/png"))
		{$msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
		$uploadedfileload="false";}	
	
		$directorio_root="/home/alextutor/public_html/";
		$directorio="imagen/foto-usuarios";
		$archivo=$_FILES['files']['tmp_name'];
		$nombrearchivo=$_FILES['files']['name'];
		//echo  $archivo;exit;
		//echo  $uploadedfileload;exit;
		//echo   $directorio_root.$directorio."/".$nombrearchivo;exit;
		if($uploadedfileload=="true"){			 
			if(move_uploaded_file($archivo, $directorio_root.$directorio."/".$nombrearchivo))
			{
				//echo " Ha sido subido satisfactoriamente";  
				$imagenfoto=$directorio."/".$nombrearchivo;
			}else{
				echo "Error al subir el archivo";exit;
			}
	}else{echo $msg;exit;}

 }// Fin si 1 isset
/*----- Fin Subir Foto Servidor -------*/


   $Update_Foto= "UPDATE condominio SET
							imagenfoto     = '"."/".$imagenfoto."' 							
							where idcondominio ='" . $_SESSION['id_usu_web']."'";							
							
	$result=mysql_query($Update_Foto,$conexion) or die ("problema con Actualiza contenido");
	// lets run our query
	
	$sql_usu_foto = "SELECT nick,nombre,email,telefono,imagenfoto,patrulla,id_conpania,facebook,AES_DECRYPT(password,'$llavesita') as password FROM usuarios WHERE id_usuario= '".$_SESSION['id_usu_web']."'";
$rs_usu_foto=db_query($sql_usu_foto); 
$row_usu_foto = db_fetch_array($rs_usu_foto);
$nombre=$row_usu_foto['nombre'];
$email=$row_usu_foto['email'];
$telefono=$row_usu_foto['telefono'];
$nick=$row_usu_foto['nick'];
$password="";
	/*----- Inicio Enviar Correo-------*/
		$cCorreo=enviar_correo($nombre,$email,$telefono,$nick,$password ,
		$id_conpania,$csubject="Se cambio correctamente su foto",$agradecimiento="")		
 /*----- Fin Enviar Correo-------*/	 
 
	// setup our response "object"
	//$resp = new stdClass();
//	$resp->success = false;
//	if($result) {
//		$resp->success = true;
//	}
//	
	//return  $result;	
?>
<script type="text/javascript">
	var variablejs ="<?php echo $result; ?>" ;
	parent.$.fancybox.close();
</script>