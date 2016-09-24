<?php		
	$Title = "";
	$Description = "";
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/header.php'); 	
?> 
<?php 
   //Preguntamos si nuetro arreglo 'archivos' fue definido
         if (isset ($_FILES["archivos"])) {
         //de se asi, para procesar los archivos subidos al servidor solo debemos recorrerlo
         //obtenemos la cantidad de elementos que tiene el arreglo archivos
         $tot = count($_FILES["archivos"]["name"]);
         //este for recorre el arreglo
         for ($i = 0; $i < $tot; $i++){
         //con el indice $i, poemos obtener la propiedad que desemos de cada archivo
         //para trabajar con este
            $tmp_name = $_FILES["archivos"]["tmp_name"][$i];
            $name = $_FILES["archivos"]["name"][$i];
			
			$newfile = $_SERVER['DOCUMENT_ROOT'] ."/productos/295-299/" .$name;
			
			//http://php.net/manual/es/function.is-uploaded-file.php
            if (is_uploaded_file($tmp_name)) {   //Indica si el archivo fue subido mediante HTTP POST

               if (!copy($tmp_name,"$newfile")) {
                  print "Error en transferencia de archivo.";
                  exit();
			   } else {      				    
	
					//echo($nombcolabora);
					//echo("<b>Archivo </b> $key ");
					//echo("<br />");
					//echo("<b>el nombre original:</b> ");
					//echo($name);
					//echo("<br />");
					//echo("<b>el nombre temporal:</b> \n");
					//echo($tmp_name);
					//echo("<br />");      
					//$mensaje="Gracias Por tu colaboracion";
?>
				<script language="javascript">
					ROOT_PATH = "<?=$ROOT_PATH?>";
					name = "<?=$name?>";
				location.href= ROOT_PATH+ 'principal.php?idsec1=mantenimiento/FormInsertarProductos&mensaje=Gracias Por tu colaboracion&imagen295x299='+name;                    
                    //window.opener.location.reload(); window.close();
                </SCRIPT>	

<!----------------------Inicio Para Correo ---------------------------------------------------- -->
<?php 
  } // if copy
  } // if is_up...		      
   }
}      
?>