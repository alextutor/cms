<?Php  session_start();
include($_SERVER['DOCUMENT_ROOT']. '/config.php');	  
$modulo="2000"; // galeria de videos tabla webmodulos
$Title = "";
$Description = "";
$option=$_GET["option"];
$modulo="2000"; // galeria de videos tabla webmodulos
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/webadmin/header.php');
//agregar esto para que funcione asset manager
include($_SERVER['DOCUMENT_ROOT']. '/webadmin/panel_html.php');		
?>
<!-- TinyMCE -->
<script type="text/javascript" src="<?php ROOT_PATH?>/webadmin/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	//Metodo para iniciar tinyMCE mas propiedades
	tinyMCE.init({
	theme : "advanced",
	mode : "exact",					
  width: 849,
    height: 265,	
	plugins : "inlinepopups,advimage,advlink,jfilebrowser,media,preview,paste,table",      
	elements : "descri_cate",
    theme_advanced_buttons1 : "mybutton,bold,italic,underline,forecolor,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,link,unlink,pastetext,pasteword,selectall,cleanup,code",
    theme_advanced_buttons2 : "styleselect, formatselect,fontselect,fontsizeselect,separator,image,media,jfilebrowser,preview",
	
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",

    theme_advanced_toolbar_location : "top",
	//theme_advanced_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1",
	plugin_preview_width : "900",
	plugin_preview_height : "600",
	paste_auto_cleanup_on_paste : true,
	relative_urls : false,	
	});
</script>
<script type="text/javascript">
	//Metodo para iniciar tinyMCE mas propiedades
	tinyMCE.init({
	theme : "advanced",
	mode : "exact",
  width: 700,
    height: 100,	
	plugins : "jfilebrowser",      
	elements : "img_cate",
    theme_advanced_buttons1 : "jfilebrowser",
	
      theme_advanced_toolbar_location : "top",
	//theme_advanced_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1",
	plugin_preview_width : "900",
	plugin_preview_height : "600",
	paste_auto_cleanup_on_paste : true,
	relative_urls : false
	});
</script>
<?php
//cuidado con cordcontenido en ambas tablas esisten y puede traer datos erroneos
$sql = "SELECT  * FROM contenido c  left join seccioncontenido  s on c.ccodcontenido=s.ccodcontenido WHERE  c.ccodpage= '".$_SESSION['selectpage']."'   " . $row_query . " and c.ccodmodulo='".$modulo."' and c.ccodcontenido = '" . $_GET['id'] . "'";
	//	echo $sql;exit;
	$res=mysql_query($sql); 
	$numeroRegistros=mysql_num_rows($res);
while ($row_contenido = db_fetch_array($res))
{	
?>		
<div id="toolbar-box">
	<div class="m">
        <div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-apply">
	            <a onclick="document.forms['adminForm'].submit();" class="toolbar"><span class="icon-32-apply"></span>Guardar</a>
            </li>
            <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=com_videos" onclick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-category-add icon-48-content-category-add">
           <h2>Gestor de Videos: Actualiza   Video</h2></div>
    </div>
    <div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
            <form action="/webadmin/mantenimiento/Actualiza-videos.php" method="post" name="adminForm" id="item-form" class="form-validate">             
			<div class="width-60 fltlft">
               <fieldset class="adminform">
				<legend>Detalles</legend>
					<ul class="adminformlist">	
                    
                    	<li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Título <span class="star">&nbsp;*</span></label>
                        <input type="text" name="cnomcontenido" id="cnomcontenido" class="inputbox required" size="40" aria-required="true" required="required" value="<?=$row_contenido['cnomcontenido']?>"></li>
                        
                       <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Url del Video <span class="star">&nbsp;*</span></label>
                        <input type="text" name="url_video" id="url_video" value="<?=$row_contenido['url_video']?>"  class="inputbox required" size="70" aria-required="true" required="required" ></li>
                           <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Url Imagen <span class="star">&nbsp;*</span></label>
                                <input name="cimgcontenido" type="text" required="required"  class="inputbox required" id="cimgcontenido" value="<?=$row_contenido['cimgcontenido']?>" size="70" aria-required="true">
                        <span class="colblancocen">
                        <input type="button" value="Seleccionar" onClick="openAsset('cimgcontenido')" id="btnAsset" name="btnAsset" >
                        </span>                        
                   </li>
                        
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Album <span class="star">&nbsp;*</pan></label>                                        
                 <select name='selectseccion' id='selectseccion' style='width:190px;' class="box" >";
<?php
$sqlsec1 = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodpage= '".$row_contenido['ccodpage']."' and ccodmodulo='".$modulo."' and cnivseccion='1' and ctipseccion='1'  order by cnomseccion");
while($row1 = db_fetch_array($sqlsec1)) 
		{
			$cod1 = substr($row1['ccodseccion'],0,12);
			if( $row1['ccodseccion']==$row_contenido['ccodseccion'])
				echo '<option value="' . $row1['ccodseccion'] . '" selected>'.$row1['cnomseccion'] . '</option>';
			else
				echo '<option value="' . $row1['ccodseccion'] . '">'.$row1['cnomseccion'] . '</option>';
			$sqlsec2 = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodseccion like '".$cod1."%' and ccodmodulo='".$modulo."' and cnivseccion='2'  and ctipseccion='1'  order by cnomseccion");
			while($row2 = db_fetch_array($sqlsec2)) 
			{
				$cod2 = substr($row2['ccodseccion'],0,16);
				if( $row2['ccodseccion']==$row_contenido['ccodseccion'])
					echo '<option value="' . $row2['ccodseccion'] . '" selected>&nbsp;- ' . $row2['cnomseccion'] . '</option>';
				else
					echo '<option value="' . $row2['ccodseccion'] . '">&nbsp;- ' . $row2['cnomseccion'] . '</option>';
				
				$sqlsec3 = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodseccion like '".$cod2."%' and ccodmodulo='".$modulo."' and cnivseccion='3'  and ctipseccion='1'  order by cnomseccion");
				while($row3 = db_fetch_array($sqlsec3)) 
				{
					$cod3 = substr($row3['ccodseccion'],0,20);
					if( $row3['ccodseccion']==$row_contenido['ccodseccion'])
						echo '<option value="' . $row3['ccodseccion'] . '" selected>&nbsp;&nbsp;&nbsp;- ' . $row3['cnomseccion'] . '</option>';
					else
						echo '<option value="' . $row3['ccodseccion'] . '">&nbsp;&nbsp;&nbsp;- ' . $row3['cnomseccion'] . '</option>';
					
					$sqlsec4 = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodseccion like '".$cod3."%' and ccodmodulo='".$modulo."' and cnivseccion='4'  and ctipseccion='1'  order by cnomseccion");
					while($row4 = db_fetch_array($sqlsec4)) 
					{
						echo '<option value="' . $row4['ccodseccion'] . '">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-' . $row4['cnomseccion'] . '</option>';
					}
				}
		}
	}
?>
</select>
                      </li>                     
                    	
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Orden <span class="star">&nbsp;*</span></label>
                        <input type="text" name="cordcontenido" id="cordcontenido" value="<?=$row_contenido['cordcontenido']?>" class="inputbox" size="40" aria-required="true" required="required"></li>
                          
                        
                        
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Estado</label>	
            <select id="estado" name="estado" class="inputbox" size="1" aria-invalid="false">
                <option value="1" <?php if( $row_contenido['estado']=="1") echo " selected='selected'"  ?>>Publicado</option>
                <option value="2" <?php if( $row_contenido['estado']=="2") echo " selected='selected'"  ?>>Despublicado</option>
                <option value="3" <?php if( $row_contenido['estado']=="3") echo " selected='selected'"  ?>>Archivado</option>
                <option value="4" <?php if( $row_contenido['estado']=="4") echo " selected='selected'"  ?>>Movido a la papelera</option>                     
             </select>
    	                </li>
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Descripción</label>	
                      <textarea name="descri_cate" id="descri_cate"></textarea></li>
                    </ul> 
                </fieldset>       
             </div>     
          <input type="hidden" name="ccodcontenido" id="ccodcontenido" value="<?=$row_contenido['ccodcontenido']?>" />         <input type="hidden" name="camicontenido" id="camicontenido" value="<?=$row_contenido['camicontenido']?>" />
          <input type="hidden" name="pagina" id="pagina" value="<?=$_SESSION['page'] ?>" />
          <input type="hidden" name="enviar" value="Enviar" />
            </form>
           	<!--FIN Formulario -->
            <div class="clr"></div>
      	  </div>
        <div class="clr"></div>
    </div>    
</div>
<?php } //  Fin While ?>