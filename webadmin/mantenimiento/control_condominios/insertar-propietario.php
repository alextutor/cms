<?php session_start();
//-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);		
	
 extract($_POST); 
  include_once ($_SERVER['DOCUMENT_ROOT']. '/config.php');		
  include_once ($_SERVER['DOCUMENT_ROOT']. '/include/funciones_web.php');	
  //echo enviar_correo("pepe","ceicorperu@hotmail.com","6272600","lucas","12312" ,"1212");exit;  
  $fecha= date("Y-m-d H:i:s"); 
  $cfechacorta=date("Y/m/d"); 	 
  $nivel="USUARIO"; 
   $myfile= $_FILES['files']['name'];
   //  print_r($_FILES); 
  //echo $myfile ;exit;
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
 /*----- Inicio Insertar Usuarios-------*/		
		// echo $imagenfoto;exit;

$save_contenido= "INSERT INTO condominio_propietarios 
						(
						idcondominio,
						codtiporesidente,
						nombre,
						apellidopaterno,
						apellidomaterno,	
						dni,					
						password,
						email,
						telefono1,
						telefono2,
						telefono3,
						nivel,
						id_usuario,
						fecharegistro)
						values('$idcondominio','$tiporesidente','$nombre',
						'$appaterno','$apmaterno','$dni',AES_ENCRYPT('$password','$llavesita'),
						'" . $email . "',
						'" . $telefono1 . "',
						'" . $telefono2 . "', 
						'" . $telefono3. "', 
						'".$nivel."',						
						'" .$_SESSION['id_usuario']. "',
						now()
						)";						
    //cestcomentario  = Habilitar Comentarios							
	//db_query($save_contenido);
	//echo $save_contenido;exit;	
	$sqlcontenido =mysql_query($save_contenido,$conexion) or die ("problema con Insertar Propietario");		
	$idpropietarios=mysql_insert_id();
	
				/* $save_departamento= "INSERT INTO departamentos 
						(
						codpropietario,
						nombredepartamento,
						id_usuario,
						fecharegistro
						)
						values(
						'" . $idpropietarios ."',
						'" . $nombredepa ."',
						'" . $_SESSION['id_usuario'] ."',						
						now()
						)";						
	//$sqlcontenido =mysql_query($save_departamento,$conexion) or die ("problema con Insertar Departamento");			
	//$iddepartamento=mysql_insert_id();
	*/
      $iddepartamento=$iddepartamento;
	  
	
$save_propietarios_vivienda= "INSERT INTO condominio_propietarios_vivienda 
						(
						idcondominio,
						codpropietario,
						iddepartamento,
						id_usuario,
						estado,
						fecharegistro
						)
						values(
						'" . $condominio ."',					
						'" . $idpropietarios ."',
						'" . $iddepartamento ."',
						'" . $_SESSION['id_usuario'] ."',						
						'1',
						now()
						)";						
	$sqlcontenido =mysql_query($save_propietarios_vivienda,$conexion) or die ("problema con Insertar maestro_propietarios_vivienda");			

    $Update_Depa= "UPDATE  condominio_departamentos SET
							asignado     = 'SI' 
							where iddepartamento ='".$iddepartamento."'";							
							
	$lUpdate_Depa=mysql_query($Update_Depa,$conexion) or die ("problema con Actualiza Departamento");	
	
/*----- Fin Insertar Usuarios-------*/
?> 

<script language='JavaScript'>    
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/index.php?option=com_gestor_propietarios&mensaje=El Propietario ha sido Ingresada correctamente' 
</script> 
