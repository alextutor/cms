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
<script type="text/javascript">
function componer_Centros(cod_area)	
	{	
	/*alert(cod_area)
	http://www.programacion.com/foros/php/novato_muy_perdido_con_las_listas_enlazadas_247138;*/
	document.adminForm.idsubcategoria.length=0;
	document.adminForm.idsubcategoria.options[0] = new Option("-- Seleccione --","","defaultSelected","");
	var indice=1;
	<?php
	$sql_subcate = "SELECT * from subcategoria where estado=1";
	$rs_subcate = mysql_query($sql_subcate, $conexion);
	if(mysql_num_rows($rs_subcate)>0)
	{	
	while($row_subcate = mysql_fetch_assoc($rs_subcate))
	{
	?>
		if(cod_area=='<?=$row_subcate["idcategoria"]?>')
		{
		document.adminForm.idsubcategoria.options[indice] = new Option("<?=$row_subcate["titulo"]?>","<?=$row_subcate["idsubcategoria"]?>");
		indice++;
		}
	<?php
	} //fin while
	} //fin si
	?> 	
	}
</script>


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
<script type="text/javascript">
	//Metodo para iniciar tinyMCE mas propiedades
	tinyMCE.init({
	theme : "advanced",
	mode : "exact",					
  width: 849,
    height: 265,	
	plugins : "inlinepopups,advimage,advlink,jfilebrowser,media,preview,paste,table",      
	elements : "detalle_articulo",
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
          <a href="/webadmin/index.php?option=com_categoria" onclick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-article-add">
           <h2>Gestor de Sección: Añadir una nueva Sección</h2></div>
    </div>
    <div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
            <form action="/webadmin/mantenimiento/Insertar-seccion.php" method="post" name="adminForm" id="adminForm" class="form-validate"
             onSubmit="return validar_form(this)">
			<div class="width-60 fltlft">
               <fieldset class="adminform">
				<legend>Detalles</legend>
					<ul class="adminformlist">	
                    	<li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Título <span class="star">&nbsp;*</span></label>
                        <input type="text" name="titulo" id="titulo" value="" class="inputbox required" size="40" aria-required="true" required="required"></li>              
                   

						<li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Menu</label>	
                         <div id="mostrarmenu"> 
							<?php include "jq_selectmenu.php"?>
                          </div>
                        </li>
                        
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Tipo</label>	
                        <select id="selectenlace" name="selectenlace" class="inputbox" size="1" aria-invalid="false">
                            <option value="1" selected="selected">Es una seccion</option>
                            <option value="0">Es un enlace o link</option>
	                    </select>
                        </li>
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">URL</label>
                        <input type="text" name="rutaenlace" id="rutaenlace" value="" class="inputbox required" size="40" aria-required="true" required="required">
                        </li>
                         
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Modulo</label>	
                        <select name="selectmodulo" style="width:190px" onChange="xajax_procesar_estilos(xajax.getFormValues('form'))" class="box">
							<?php  $sqlmod = db_query("select * from webmodulos where cestmodulo='1' order by ccodmodulo");
                                while ($rowmod = db_fetch_array($sqlmod)) 
                                {	
                                    echo '<option value='.$rowmod['ccodmodulo'].'>'.$rowmod['cnommodulo'].'</option>';
                                }
                            ?>
                            </select>
                        </li>
                        
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Estilo Sección</label>	
                         <!-- Inicio Estilo contenido----------------------------------->
                            <select name="idesticonte" id="idesticonte" onChange="componer_Centros(this.value);">
                          <option>-- Seleccione --</option>
                          <?php                
							  $resultcate=mysql_query("SELECT * FROM estilo_contenido where estado=1 order by desc_esti_conte", $conexion);    
								   while ($row = mysql_fetch_array($resultcate)) 							{                                 
									  echo '<option value="'.$row["idesticonte"]. '" ' . $selected. '>'.$row["desc_esti_conte"]. '   </option>';                        																		                                           } 
							?>          
                          </select>
                          <!-- Fin Estilo contenido----------------------------------->
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
                        <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Mostrar</label>	
                           <select name='mostrar' id='mostrar'>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>                           
                          </select>
                       </li>
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Descripción</label>	
                      <textarea name="detalle_articulo" id="detalle_articulo"></textarea></li>                      
                        
                    </ul> 
              </fieldset>       
             </div>
           <div class="width-40 fltrt">
           		<div id="content-sliders-" class="pane-sliders">
                <div style="display:none;"><div>		</div></div>
                <!-------------------------------------------------->
		<!--Inicio grupo1 -->                   
   <div class="panel"><h3 id="bobcontent1-title" class="handcursor">Información para Buscadores (SEO)</h3> 
  <div id="bobcontent1" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >         
                <fieldset class="panelform">
                    <ul class="adminformlist">                       
                          <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Titulo</label>
                        <input type="text" name="txttitulo" id="txttitulo" value="" class="inputbox required" size="40" aria-required="true" required="required"></li>

                          <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Titulo Amigable</label>
                        <input type="text" name="amigable" id="amigable" value="" class="inputbox required" size="40" aria-required="true" required="required"></li>

                      <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Descripción</label>
                        <textarea id="txtdetalle" name="txtdetalle" rows="4" cols="55"></textarea> </li>                            
                        
                         <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Tags</label>
                        <textarea id="txttags" name="txttags" rows="4" cols="55"></textarea> </li>   
					</ul>
				</fieldset>									
			</div> </div>      <!--Fin grupo1 -->            
                <!-------------------------------------------------->
       <div class="panel"><h3 id="bobcontent2-title" class="handcursor">Opciones de Imágenes</h3> 
  <div id="bobcontent2" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	
                	 <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Imagen</label>	
                     	<div><textarea name="imagen" id="imagen"></textarea></div>
                     </li>
                    </ul>
               </fieldset>	    
    </div></div> 
             <!-------------------------------------------------->          
                </div><!--fin content-sliders--->
           </div><!--fin width-40 fltrt--->
                 <input type="hidden" name="enviar" value="Enviar" />
            </form>
           	<!--FIN Formulario -->
            <div style="text-align:left; margin-left:100px;">Estilo Secccion Para Articulos<br />
            <img src="/webadmin/imagen/estilos.JPG" width="701" height="150" /></div>
<div class="clr"></div>
      	  </div>
        <div class="clr"></div>
    </div>    
</div>


<script>
$(document).ready(function(){

	$('#titulo').keyup(function() 
    {
	   $('#amigable').val(convierteAlias($('#titulo').val()));
	   $('#txttitulo').val($('#titulo').val());
	});
	$("#selectpage").change(function(){
		$.post("jq_selectseccion.php",{ idopera:'1',idmodulo:$("#selectmodulo").val(),iditem:$("#IDpro").val(),idpage:$("#selectpage").val()},function(data){$("#cuadrobox").html(data);})
	});
	
})
</script>


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
	bobexample.defaultExpanded(0) //1=2st content expanded
	bobexample.setPersist(false)
	bobexample.collapsePrevious(true) //Only one content open at any given time
	bobexample.init()
</script>

