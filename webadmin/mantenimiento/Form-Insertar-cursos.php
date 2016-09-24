<?Php  session_start(); 
$Title = "";
$Description = "";
$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/webadmin/header.php');
?>
<?Php
	include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
?>
<!--Inicio Calendario -->
<link rel="stylesheet" type="text/css" href="<?php ROOT_PATH?>/webadmin/calendario_dw/calendario_dw/calendario_dw-estilos.css"/>
<script type="text/javascript" src="<?php ROOT_PATH?>/webadmin/calendario_dw/calendario_dw/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php ROOT_PATH?>/webadmin/calendario_dw/calendario_dw/calendario_dw.js"></script>
<!--El último paso es colocar un script Javascript que invoque el plugin jQuery para hacer que el campo de texto se convierta en un calendario. -->
<script type="text/javascript">
$(document).ready(function(){
	$(".campofecha").calendarioDW();
})
</script>
<!--Fin Calendario -->

<script type="text/javascript" src="<?php ROOT_PATH?>/webadmin/tiny_mce/tiny_mce.js"></script>

<!-- TinyMCE -->
<script type="text/javascript">
	//Metodo para iniciar tinyMCE mas propiedades
	tinyMCE.init({
	theme : "advanced",
	mode : "exact",
  width: 700,
    height: 600,	
	plugins : "inlinepopups,advimage,advlink,jfilebrowser,media,preview,paste,table",      
	elements : "detalle_curso",
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
<!-- TinyMCE -->

<script type="text/javascript">
	//Metodo para iniciar tinyMCE mas propiedades
	tinyMCE.init({
	theme : "advanced",
	mode : "exact",
    width: 600,
    height: 300,	
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
          <a href="/webadmin/index.php?option=com_cursos" onclick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-article-add">
           <h2>Gestor de Cursos: Añadir un nuevo Curso</h2></div>
    </div>
    <div id="element-box">
		<div class="m">
        	<!-------------Inicio Contenedor Lado Izquierda Formulario -->
            <form action="/webadmin/mantenimiento/Insertar-Cursos.php" method="post" name="adminForm" id="adminForm" class="form-validate"
             onSubmit="return validar_form(this)">
			<div class="width-60 fltlft">
                	<!--Inicio  -->
                
                 <fieldset class="panelform">
                    <ul class="adminformlist">                       
                       <li><label id="codigo_curso_lbl" for="codigo_curso" class="hasTip" title="">Codigo Curso</label>	
                         	<input type="text" name="codigo_curso" id="codigo_curso" value="" class="inputbox" size="20">
                       </li>    
                       <li><label id="curso_lbl" for="curso" class="hasTip" title="">Curso</label>	
                         	<input type="text" name="curso" id="curso" value="" class="inputbox" size="80">
                       </li>  
                       <li><label id="duracion_curso_lbl" for="duracion_curso" class="hasTip" title="">Duración</label>	
                           <select name="duracion_curso" id="duracion_curso">
                              <option value="1 Mes">1 Mes</option>
                              <option value="2 Meses">2 Meses</option>
                              <option value="3 Meses">3 Meses</option>
                              <option value="6 Meses">6 Meses</option>
                           </select>                        
                       </li>  
					   <li>
                       	<div style="clear:both;">
                        	  <label id="inicioclases_curso_lbl" for="inicioclases" class="hasTip" title="">Inicio de Clases</label>	
	                          <input name="inicioclases_curso" type="text"    class="campofecha" size="12" id="inicioclases_curso">
                        </div>    
                       </li>
                       <li><label id="modalidad_lbl" for="modalidad" class="hasTip" title="">Modalidad</label>	
	                       <select name="modalidad_curso" id="modalidad_curso">
    	                        <option>Virtual</option>          
	                       </select>
                       </li> 
                       <li><label id="detalle_lbl" for="detalle_curso" class="hasTip" title="">Detalle Curso</label>	
							<textarea name="detalle_curso" id="detalle_curso"></textarea>
                       </li> 
                         <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Orden <span class="star">&nbsp;*</span></label>
                        <input type="text" name="orden" id="orden" value="" class="inputbox" size="40" aria-required="true" required="required"></li>                
                         
                        
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Estado</label>	
                        <select id="estado" name="estado" class="inputbox" size="1" aria-invalid="false">
                            <option value="1" selected="selected">Publicado</option>
                            <option value="0">Despublicado</option>
                            <option value="2">Archivado</option>
                            <option value="-2">Movido a la papelera</option>
	                    </select>
    	                </li>
                       <li><label id="preciosoles_lbl" for="preciosoles_lbl" class="hasTip" title="">Precio Soles</label>	
	                         <input name="preciosoles" type="text" class="text" id="preciosoles" size="10" />	
                       </li>  
                       <li><label id="preciooferta_lbl" for="preciosolesoferta" class="hasTip" title="">Precio Oferta</label>	
	                         <input name="preciosolesoferta" type="text" class="text" id="preciosolesoferta" size="10" />	
                       </li>                  
                             
					</ul>
				</fieldset> 
             </div>
           <div class="width-40 fltrt">
           		<div id="content-sliders-" class="pane-sliders">
                <div style="display:none;"><div>		</div></div>
                <!--------------Fin Contenedor Lado Izquierda ------------------------------------>		     
                <!------------------Inicio -------------------------------->
       <div class="panel"><h3 id="bobcontent1-title" class="handcursor">Opciones de Imágenes</h3> 
  <div id="bobcontent1" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	
                	 <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Imagen</label>	
                     	<div><textarea name="imagen" id="imagen"></textarea></div>
                     </li>
                    </ul>
               </fieldset>	    
    </div></div> 
             <!------------------Fin -------------------------------->          
                </div><!--fin content-sliders--->
           </div><!--fin width-40 fltrt--->
                 <input type="hidden" name="enviar" value="Enviar" />
            </form>
           	<!--FIN Formulario -->
            <div class="clr"></div>
      	  </div>
        <div class="clr"></div>
    </div>    
</div>

<!--http://www.dynamicdrive.com/dynamicindex17/switchcontent.htm -->
<script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/js/switchcontent/switchcontent.js"></script>
<script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/js/switchcontent/switchicon.js"></script>
<script type="text/javascript">
// MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
// Call Instance.init() at the very end. REQUIRED
	var bobexample=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
	//bobexample.setStatus('<img src="imagen/selector_azul_vertical.gif" /> ', '<img src="imagen/selector-azul.gif" /> ')
	bobexample.setStatus('<img src="imagen/regular-dark.png" /> ', '<img src="imagen/regular-dark.png" /> ')
	bobexample.setColor('darkred', 'black')
	bobexample.defaultExpanded(1) //1=2st content expanded
	bobexample.setPersist(false)
	bobexample.collapsePrevious(true) //Only one content open at any given time
	bobexample.init()
</script>
