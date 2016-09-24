<?Php  session_start(); 
$Title = "";
$Description = "";
$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/webadmin/header.php');
?>
<?php				
   $id=$_GET['id'];	
   include($_SERVER['DOCUMENT_ROOT']. '/config.php');	           	
   $result=mysql_query("select * from subcategoria  Where idsubcategoria='$id' ",$conexion);    
   $rsCategoria=mysql_fetch_array($result);     
   $paginacion=trim($_GET['paginacion']); 
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
	elements : "descripcion",
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
  width: 600,
    height: 400,	
	plugins : "jfilebrowser",      
	elements : "imagen",
    theme_advanced_buttons1 : "jfilebrowser",
	
      theme_advanced_toolbar_location : "top",
	//theme_advanced_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1",
	plugin_preview_width : "900",
	plugin_preview_height : "600",
	paste_auto_cleanup_on_paste : true,
	relative_urls : false
	});
</script>			
<div id="toolbar-box">
	<div class="m">
        <div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-apply">
	            <a onclick="document.forms['adminForm'].submit();" class="toolbar"><span class="icon-32-apply"></span>Guardar</a>
            </li>
            <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=com_sub_categories" onclick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-sub-category-add">
           <h2>Gestor de Sub-Categorías: Editar una Sub-Categoría de artículos</h2></div>
    </div>
    <div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
            <form action="/webadmin/mantenimiento/ActualizaFormSubCategoria.php" method="post" name="adminForm" id="item-form" class="form-validate">
			<div class="width-60 fltlft">
               <fieldset class="adminform">
				<legend>Detalles</legend>
					<ul class="adminformlist">	
                    	<li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Título <span class="star">&nbsp;*</span></label>
                        <input type="text" name="titulo" id="titulo" value="<?php echo trim($rsCategoria["titulo"]); ?>" class="inputbox required" size="40" aria-required="true" required="required"></li>
                        
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Categoria</label>	
                         <!-- Inicio Categoria----------------------------------->
                            <select name="idcategoria" id="idcategoria">                                    
                                <?php                     
                                    $resultcate=mysql_query("SELECT * FROM categoria where estado=1 order by orden", $conexion);    
                                    while ($row = mysql_fetch_array($resultcate)) 			
                                        { 
										echo '<option value="'.$row['idcategoria'].'"';
										if($row['idcategoria']==$rsCategoria['idcategoria'])
										{
											echo ' selected';
										}
										echo '>'. $row['titulo'] . '</option>'."\n";		
										} 
										mysql_free_result($resultcate); 	                    
                                ?>                
                              </select>             
                          <!-- Fin Categoria----------------------------------->
    	                </li>
                        
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Orden <span class="star">&nbsp;*</span></label>
                        <input type="text" name="orden" id="orden" value="<?php echo trim($rsCategoria["orden"]); ?>" class="inputbox" size="40" aria-required="true" required="required"></li>
                        
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Estado</label>	
                        <select id="estado" name="estado" class="inputbox" size="1" aria-invalid="false">
                            <option value="1" selected="selected">Publicado</option>
                            <option value="0">Despublicado</option>
                            <option value="2">Archivado</option>
                            <option value="-2">Movido a la papelera</option>
	                    </select>
    	                </li>
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Descripción</label>	
                        <textarea name="descripcion" id="descripcion"><?php echo trim($rsCategoria["descripcion"]); ?></textarea></li>
                    </ul> 
                </fieldset>       
             </div>
           <div class="width-40 fltrt">
           		<div id="categories-sliders-" class="pane-sliders">
                	<ul class="adminformlist">	
                	 <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Imagen</label>	
                     	<div><textarea name="imagen" id="imagen"><?php echo trim($rsCategoria["imagen"]); ?></textarea></div>
                     </li>
                    </ul>    
                </div>
           </div>
           		 <input type="hidden" name="id" value="<?php echo $id?>" />	
                 <input type="hidden" name="enviar" value="Enviar" />
            </form>
           	<!--FIN Formulario -->
            <div class="clr"></div>
      	  </div>
        <div class="clr"></div>
    </div>    
</div>
