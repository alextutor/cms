<?php		
	$Title = "";
	$Description = "";
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/header.php'); 	
?> 
<SCRIPT LANGUAGE="JavaScript"> 
	function Cancelar(){
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+ '/webadmin/mantenimiento/mantCategoriaAdmi.php' 	
	}
</script> 


<!-- TinyMCE -->
<script type="text/javascript" src="<?php ROOT_PATH?>/webadmin/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	//Metodo para iniciar tinyMCE mas propiedades
	tinyMCE.init({
	theme : "advanced",
	mode : "exact",
  width: 700,
    height: 600,	
	plugins : "inlinepopups,advimage,advlink,jfilebrowser,media,preview,paste,table",      
	elements : "descripcion",
    theme_advanced_buttons1 : "mybutton,bold,italic,underline,forecolor,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,link,unlink,pastetext,pasteword,selectall,cleanup,code",
    theme_advanced_buttons2 : "styleselect, formatselect,fontselect,fontsizeselect,separator,image,media,jfilebrowser,preview",
	
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",

    theme_advanced_toolbar_location : "top",
	//theme_advanced_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1",
	plugin_preview_width : "900",
	plugin_preview_height : "600",
	paste_auto_cleanup_on_paste : true,
	relative_urls : false
	});
</script>


<table  class="estilotabla" width="40%" border="0" align="center">
  <tr>
    <td >
    
    <?php
//include ("seguridad/seguridad.php") ;

// incluimos el archivo de conexion
include($_SERVER['DOCUMENT_ROOT']. '/config.php');	 

// recibimos el formulario
if(isset($_POST['enviar']) && $_POST['enviar'] == 'Enviar'){
    // comprobamos que el formulario no envie campos vacios
    if(!empty($_POST['catCategoria'])){
        // creamos la variable y le asignamos el valor a insertar
        $catCategoria = $_POST['catCategoria'];
        // hacemos el INSERT en la BD   				
									
		 $ssql ="INSERT INTO categoria (descripcion)  VALUES ('$catCategoria')";
     $sqlInsertCat =mysql_query($ssql,$conexion) or die ("problema con query");
							
        // enviamos un mensaje de exito
        echo "<font color='#FF0000'><strong>Los datos fueron guardados correctamente</strong></font>";
		
		// mysql_query(): 6 is not a valid MySQL-Link resource  si cierro me manda este error alex
		//include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 

    }else{
        // si el formulario viene vacio
        // enviamos un mensaje de error
        echo "<font color='#FF0000'><strong>Debe llenar el formulario</strong></font>";
    }
}    

 // include("rutinas/cerrar_conexion.php"); 
?><!-- el formulario -->
<form name="categoria" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <table width="100%" border="0" align="center">
      <tr>
        <td width="37%"><strong>Titulo</strong></td>
        <td width="63%"><input type="text" name="titulo" id="titulo" /></td>
      </tr>
      <tr>
        <td>Estado</td>
        <td><select name='estado' id='estado'>
          <option value="Publicado">Publicado</option>
          <option value="Despublicado">Despublicado</option>
        </select></td>
      </tr>
      <tr>
        <td  align="left" colspan="2">Descripción</td>
      </tr>
      <tr>
        <td  align="left" colspan="2"><textarea name="descripcion" id="descripcion"></textarea></td>
      </tr>
      <tr>
        <td  align="center" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td  align="center" colspan="2"><table width="50%" border="0">
          <tr>
            <td><input type="submit" name="enviar" value="Enviar" /></td>
            <td>&nbsp;</td>
            <td><input type="button" class="cancelar" name="cancelar" id="cancelar" value="Cancelar" onclick="Cancelar()" /></td>
          </tr>
      </table>              
        </tr>
      <tr>
        <td height="26" colspan="2"  align="center">

        </tr>
    </table>  
</form> 
    </td>
  </tr>
</table>


