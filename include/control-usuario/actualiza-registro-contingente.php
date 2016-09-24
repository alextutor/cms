<?php  session_start(); 
 include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');
  extract($_POST);  
  
/*  
http://www.9lessons.info/2011/06/image-upload-and-cropping-with-php-and.html
$session_id=$_SESSION['id_usu_web'];//  Session ID
  $path = $_SERVER['DOCUMENT_ROOT']."/include/cropimages/uploads/";
  $valid_formats = array("jpg", "png", "gif", "bmp");
  $name = $_FILES['photoimg']['name'];
  $size = $_FILES['photoimg']['size'];
  if(strlen($name))
	{
	list($txt, $ext) = explode(".", $name);
	if(in_array($ext,$valid_formats) && $size<(250*1024))
	{
		$actual_image_name = time().substr($txt, 5).".".$ext;
		$tmp = $_FILES['photoimg']['tmp_name'];
		if(move_uploaded_file($tmp, $path.$actual_image_name))
		{		
			mysql_query("UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'");
			$image="<h1>Please drag on the image</h1><img src='uploads/".$actual_image_name."' id=\"photo\" ";
		}
	else
		echo "failed";
	}
	else
		echo "Invalid file formats..!"; 
  }
*/

 // echo $facebook."ss";exit;
  $save_usuario= "UPDATE usuarios SET							
							password= AES_ENCRYPT('$password','$llavesita') ,							
							nombre= '" .$nombre. "',
							email= '" .$email. "',	
							facebook= '" .$facebook. "',														
  							id_conpania= '" .$id_conpania. "', 
						    telefono    = '" .$telefono. "', 						    							
						    patrulla    = '" .$patrulla. "'  							
						WHERE id_usuario = '" . $_SESSION['id_usu_web'] . "'";
	// imagenfoto    = '" .$imagenfoto. "',
	mysql_query($save_usuario) or die ("problema con Actualiza Usuario");	
	$_SESSION['usuario_actualizado']="si";
	header ("Location: /configuracion");
?>