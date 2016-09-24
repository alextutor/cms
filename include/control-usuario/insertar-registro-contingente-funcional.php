<?php session_start();
//-------para que nome muestre errores en desarollo xamp ejemplo inicializar valores
	//ini_set('display_errors',0); 
	//error_reporting(E_ALL);	
	//-------	 
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
		  $ssql ="insert into usuarios(nick,password,nombre,email,eliminado,telefono,id_conpania,fecha,nivel,imagenfoto)   values('$nick',AES_ENCRYPT('$password','$llavesita'),'$nombre','$email','NO','$telefono','$id_conpania','$fecha','$nivel','$imagenfoto')";
		  mysql_query($ssql) or die ("problema con query");
		  $id_usu_web=mysql_insert_id();
		  //echo $id_usu_web."ica";exit;	
		  $_SESSION['id_usu_web']=$id_usu_web; 
		  $_SESSION['nombre_usu_web']=$nombre; 
		  //echo $_SESSION['pagina_retorno'];exit;
		 /*----- Fin Insertar Usuarios-------*/
		  //echo $_SESSION['pagina_retorno']."dsdsd";exit;
		 $caux="";
		 if  (isset($_SESSION['pagina_retorno'])){
			 $caux=$_SESSION['pagina_retorno'];
			 $_SESSION['pagina_retorno']=""; 		 
		  }  
/*----- Fin Insertar Usuarios-------*/

/*----- Inicio Enviar Correo-------*/
		//$Correo=enviar_correo($nombcliente,$emailcliente,$telefono,$nick,$password ,$Compañia)
		$sqlregistro="SELECT * FROM  page WHERE camipage='".subdominio()."' and cestpage ='1'";
		$rsregistro  = db_query($sqlregistro);
		$nrosub    = db_num_rows($rsregistro);
		//echo $sqlregistro;exit;
		if ( $nrosub >0 )
		{
			$rowpageweb  = db_fetch_array($rsregistro);
			$camipage     = $rowpageweb['camipage'];
			$cabeceraemail= $rowpageweb['cnompage'];
			$cemacontacto= $rowpageweb['cemacontacto'];	
			$ctitpage= $rowpageweb['ctitpage'];			
			$cnompage= $rowpageweb['cnompage'];	
			
			 $person_name = $nombre;
			$cemacontacto= $email;
			/*-----saca del email de contacto solo el correo sin el @*/
			$findme   = '@';
			$pos = strpos($cemacontacto, $findme);
			$cuentasinarroba = substr($cemacontacto,0,$pos);
			/*-----saca del email de contacto solo el correo sin el @*/
			 $server_name = $camipage;
			 
			  $header = "MIME-Version: 1.0\n";  
			 $header .= "Content-Type: text/html; charset=UTF-8\n";  
			 $header .="From: ".$cabeceraemail ." <$cuentasinarroba@$server_name>\nReply-To: " .$cabeceraemail."   <$cuentasinarroba@$server_name>\nX-Mailer: PHP/ \n";     	
			  $header .= 'Bcc: sisdatahost@hotmail.com,' .$cemacontacto. " \r\n";	   
			 //echo  $header;exit;
			  $mensaje_cli .= "<table width='100%' border='0' align='center'><tr><td align='justify'>		   		   
				   <font face='verdana' size='2'>Hola $person_name,<br><br>  
				   Email :  " . $email . "<br/>
				   Usuario :  " . $nick . "<br/>
				   Telefono:  " . $telefono . "<br/>
				   Compañia:  " . $id_conpania . "<br/>
				   Contraseña:  " . $password . "<br/><br/>
			 Gracias Por Registrase en la Web  ". $ctitpage ."<br><br>   
			 Gracias por todo.<br><br>  
			  Sinceramente,<br><br><center> " . $ctitpage ."	 
			 <br> 
			 <a href='http://www.". $camipage."'>http://www.".$camipage." </a><br>  
			 Correo :&nbsp; " . $cemacontacto . "
			   </center>
			   </font>  
			 <br><br>";	 	 	 	 
			$mensaje_cli .= "</td></tr></table>";	
			$mensaje_cli .=$pie;  
			$subject = utf8_decode('Gracias Por su Registro');
			if(!mail($email,$subject , $mensaje_cli,$header))
			{
			   // echo "<h1>No se pudo enviar el Mensaje intentalo otra vez </h1>";
			   // exit();
			 }		
		}
 /*----- Fin Enviar Correo-------*/	
		
  

?> 
<?php  if ($caux<>""){  //aqui viene de comenta antes e comentar se deve registrar			 	
		// echo "location.href = '".$caux."'";
		//header ("Location:/".$caux."");?>		
    <script language="javascript">
		var variablejs ="<?php echo $caux; ?>" ;
        location.href ="/"+variablejs;
    </SCRIPT>
<?php        
	}else{
		//header ("Location: /index.php");		?>
	<script language="javascript">
        location.href = "/configuracion";
    </SCRIPT>

 <?php        
	}
	//ob_end_flush
?> 