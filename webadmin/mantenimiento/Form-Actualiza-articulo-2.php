<?Php  session_start(); 
//extract($_POST); 
$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');
////verificar no funciona
//include_once($_SERVER['DOCUMENT_ROOT']. '/webadmin/include/funciones.php');	
//$modulo="1100"; alex lo he definido en index en la tabla page
//$modulo="1100";
$modulo=$_SESSION['modulo'];//alex lo defini en index del webadmin 
$stylo = "3";
//include_once ( $INC_DIR . '/webadmin/header.php');

//agregar esto para que funcione asset manager
include($_SERVER['DOCUMENT_ROOT']. '/webadmin/panel_html.php');	
?>
<style type="text/css">
#estilos{
	margin-top:10px;
	clear:both;
	}
ul.stylos
{
	padding:0px;
	margin:5px 0px 5px 0px;
	list-style:none;
	overflow:auto;
}

ul.stylos li
{
	float:left;
	margin-bottom:5px;
	margin-right:1px;
	display:inline;
	width:100px;
	height:130px;

} 
</style>

<!--Inicio Calendario -->
<link rel="stylesheet" type="text/css" href="/webadmin/calendario_dw/calendario_dw/calendario_dw-estilos.css"/>
<script type="text/javascript" src="/webadmin/calendario_dw/calendario_dw/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="/webadmin/calendario_dw/calendario_dw/calendario_dw.js"></script>
<!--El último paso es colocar un script Javascript que invoque el plugin jQuery para hacer que el campo de texto se convierta en un calendario. -->
<script type="text/javascript">
$(document).ready(function(){
	$(".campofecha").calendarioDW();
})
</script>
<!--Fin Calendario -->

<script type="text/javascript" src="/webadmin/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	//Metodo para iniciar tinyMCE mas propiedades
	tinyMCE.init({
	file_browser_callback : elFinderBrowser,
	theme : "advanced",
	mode : "exact",					
    width: "100%",
    height:700,	

	plugins : "inlinepopups,advimage,advlink,jfilebrowser,media,preview,paste,table",      
	elements : "contenido",
    theme_advanced_buttons1 : "mybutton,bold,italic,underline,forecolor,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,link,unlink,pastetext,pasteword,selectall,cleanup,code",
    theme_advanced_buttons2 : "styleselect, formatselect,fontselect,fontsizeselect,separator,image,media,jfilebrowser,preview",
	
    theme_advanced_buttons3 : "insertfile,insertimage,tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",

    theme_advanced_toolbar_location : "top",
	//theme_advanced_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1",
	plugin_preview_width : "900",
	plugin_preview_height : "600",
	paste_auto_cleanup_on_paste : true,
	relative_urls : false,	
	
	
			
	file_browser_callback   : function myFileBrowser(field_name, url, type, win) {
/* Here goes the URL to your server-side script which manages all file browser things. */
// alert("Field_Name: " + field_name + "nURL: " + url + "nType: " + type + "nWin: " + win); // debug/testing
//var cmsURL       = '/webadmin/editor/assetmanager/assetmanager.php';     // your URL could look like "/scripts/my_file_browser.php"
var cmsURL       = '/webadmin/tiny_mce/plugins/jfilebrowser/filebrowser.php';
url : cmsURL;
var searchString = window.location.search; // possible parameters
if (searchString.length < 1) {
// add "?" to the URL to include parameters (in other words: create a search string because there wasn't one before)
searchString = "?";
}
        
  //alert("Example of filebrowser callback: field_name: " + field_name + ", url: " + url + ", type: " + type);
  
tinyMCE.activeEditor.windowManager.open({
file            : cmsURL,
title           : 'My File Browser',
width           : 650,  // Your dimensions may differ - toy around with them!
height          : 400,
resizable       : "yes",
inline          : "yes",  // This parameter only has an effect if you use the inlinepopups plugin!
close_previous          : "no"
}, {
 window : win,
                input : field_name,
               
});
win.document.forms[0].elements[field_name].value = field_name;
return false;
},

	});
	

function elFinderBrowser (field_name, url, type, win) {
  tinymce.activeEditor.windowManager.open({
    file: 'elfinder-2.0-rc1/elfinder.html',// use an absolute path!
    title: 'Upload de Arquivos',
    width: 900,  
    height: 450,
    resizable: 'yes'
  }, {
    setUrl: function (url) {
      win.document.getElementById(field_name).value = url;
    }
  });
  return false;
}	
</script>




<!-- -------------------------- para resumen--------------------------- -->
<script type="text/javascript">
	//Metodo para iniciar tinyMCE mas propiedades
	tinyMCE.init({
	theme : "advanced",
	mode : "exact",					
    width: "100%",
    height:160,	
	plugins : "inlinepopups,advimage,advlink,jfilebrowser,media,preview,paste,table",      
	elements : "resumen",
    theme_advanced_buttons1 : "mybutton,bold,italic,underline,forecolor,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,link,unlink,pastetext,pasteword,selectall,cleanup,code",
    theme_advanced_buttons2 : "styleselect, formatselect,fontselect,fontsizeselect,separator,preview",
	
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,advhr,|,print,|,ltr,rtl,|,fullscreen",

    theme_advanced_toolbar_location : "top",
	//theme_advanced_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1",
	plugin_preview_width : "900",
	plugin_preview_height : "600",
	paste_auto_cleanup_on_paste : true,
	relative_urls : false,	
	});
</script>

<body>	
<?php $sql_contenido = db_query("SELECT * FROM contenido c, contenidodetalle d WHERE c.ccodcontenido=d.ccodcontenido and c.ccodcontenido = '" . $_GET['id'] . "'");

while ($row_contenido = db_fetch_array($sql_contenido))
{
	$pageweb =	$row_contenido['ccodpage'];	
?>	
<div id="toolbar-box">
	<div class="m">
        <div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-apply">
	            <a onClick="document.forms['adminForm'].submit();" class="toolbar"><span class="icon-32-apply"></span>Guardar</a>
            </li>
            <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=com_articulos" onClick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-article-add">
           <h2>Gestor de artículos: Actualiza un  artículo</h2></div>
    </div>
    <div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->                        
            <form action="/webadmin/mantenimiento/Actualiza-Articulo.php" method="post" name="adminForm" id="adminForm" class="form-validate"
             onSubmit="return validar_form(this)">
			<div class="width-60 fltlft">
               <fieldset class="adminform">
				<legend>Detalles</legend>
					<ul class="adminformlist">	
                    	<li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Título <span class="star">&nbsp;*</span></label>
                 	<input name="titulo" type="text"   class="box500" id="titulo" value='<?=$row_contenido['cnomcontenido']?>' size="50" maxlength="250" >
                        </li>
                                            
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Titulo Amigable<span class="star">&nbsp;*</span></label>
		<input name="amigable" type="text" class="box500" id="amigable" value='<?=$row_contenido['camicontenido']?>' size="50"  maxlength="150">
</li>                   <br>     
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Resumen</label>
                     <textarea name="resumen"  rows="5" class="area500"><?=$row_contenido['crescontenido']?></textarea>
                     </li>                        
                           <br>                       
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Orden <span class="star">&nbsp;*</span></label>
					<input type="text" name="orden" id="orden"  maxlength="150" class="box500" value='<?=$row_contenido['orden']?>'>                        
                        
                        </li>                
                         
                        
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Estado</label>	
            <select id="estado" name="estado" class="inputbox" size="1" aria-invalid="false">
                <option value="1" <?php if( $row_contenido['estado']=="1") echo " selected='selected'"  ?>>Publicado</option>
                <option value="2" <?php if( $row_contenido['estado']=="2") echo " selected='selected'"  ?>>Despublicado</option>
                <option value="3" <?php if( $row_contenido['estado']=="3") echo " selected='selected'"  ?>>Archivado</option>
                <option value="4" <?php if( $row_contenido['estado']=="4") echo " selected='selected'"  ?>>Movido a la papelera</option>                     
             </select>
    	                </li>
                        <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Mostrar</label>	
                           <select name='mostrar' id='mostrar'>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>                           
                          </select>
                       </li>
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Descripción</label>	
                   
                   <?php $sContent = $row_contenido['cdetcontenido']; ?>
                    <textarea id="contenido" name="contenido" >
                    <?php
                    function encodeHTML($sHTML)
                        {
                        $sHTML=ereg_replace("&","&amp;",$sHTML);
                        $sHTML=ereg_replace("<","&lt;",$sHTML);
                        $sHTML=ereg_replace(">","&gt;",$sHTML);
                        return $sHTML;
                        }
                    if(isset($sContent)) echo encodeHTML($sContent);
                    ?>
                    </textarea>
        
                   </li>                      
                        
                    </ul> 
                </fieldset>       
             </div>
           <div class="width-40 fltrt">
           		<div id="content-sliders-" class="pane-sliders">
                <div style="display:none;"><div>		</div></div>
                
                
                <!-------------------------------------------------->
		<!--Inicio grupo1 --> 
        	<?php include_once $_SERVER['DOCUMENT_ROOT']. "/webadmin/mantenimiento/opciones-publi-actualiza.php" ?>                          	
        <!--Fin grupo1 -->            
                <!-------------------------------------------------->
       <div class="panel"><h3 id="bobcontent2-title" class="handcursor">Opciones de Imágenes</h3> 
  <div id="bobcontent2" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	
	                    <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Estilo de Presentación del Contenido</label>	
                       
                          <div id="estilos">
                            <ul class="stylos">
                              <?php 							
							  $estilo_query = db_query("select * from estilocontenido where ccodmodulo='".$modulo."' and cestestcontenido = '1' order by ccodestcontenido");
							    //tomaba del módulo activo ahora lo pondré del módulo que esta su sección, más adelante cambiarlo para que el modulo sea seleccionado por un combo  
						/*	  $estilo_query = db_query("select * from estilocontenido where ccodmodulo='".$row_contenido['ccodmodulo']."' and cestestcontenido = '1' order by ccodestcontenido");*/
							   
                                 while ($estilo = db_fetch_array($estilo_query))
                                 {
                                    if ($estilo['ccodestcontenido'] == $row_contenido['ccodestcontenido']) 
                                        echo "<li><img src='estilos/images/".$estilo['cimgestcontenido']."'><br><input name='selectestilo' type='radio' value='".$estilo['ccodestcontenido']."' checked>".$estilo['cnomestcontenido']."</li>";
                                    else 
                                        echo "<li><img src='estilos/images/".$estilo['cimgestcontenido']."'><br><input name='selectestilo' type='radio' value='".$estilo['ccodestcontenido']."' >".$estilo['cnomestcontenido']."</li>";
                                }
                              ?>
                            </ul>
                        </div>                        
                        </li> 
                         <li><span class="colgrishome">Imagen:</span><span class="colblancocen">
                          <input name="imagen" type="text" class="box400" id="imagen" value="<?=$row_contenido['cimgcontenido']?>" size="60"  maxlength="150">
                        </span><span class="colblancocen">
                        <input type="button" value="Seleccionar" onClick="openAsset('imagen')" id="btnAsset" name="btnAsset" >
                        </span></li>                         
                    </ul>
               </fieldset>	    
    </div></div> 
             <!----------------Inicio Precio---------------------------------->
             
             <div class="panel"><h3 id="bobcontent3-title" class="handcursor">Precio y Otras Opciones</h3> 
  <div id="bobcontent3" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	
	                    <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Precio</label>	
                       <input name="precio" type="text"   class="box500" id="precio" value='<?=$row_contenido['precio']?>' size="10" maxlength="10" >
                       <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Precio Oferta</label>	
                       <input name="precio_oferta" type="text"   class="box500" id="precio_oferta" value='<?=$row_contenido['precio_oferta']?>' size="10" maxlength="10" >                       
                        </li> 
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Garantia</label>	          
                     
                       <select id="garantia" name="garantia" class="inputbox" size="1" aria-invalid="false">
                        <option value="3 Meses" <?php if( $row_contenido['garantia']=="3 Meses") echo " selected='selected'"  ?>>3 Meses</option>
                        <option value="6 Meses" <?php if( $row_contenido['garantia']=="6 Meses") echo " selected='selected'"  ?>>6 Meses</option>
	                  </select>                               
                        </li> 
                       
                    </ul>
               </fieldset>	    
    </div></div>
             <!-----------------------Fin Precio---------------------------> 
             
             
              <!----------------Inicio Curso---------------------------------->  
             <div class="panel"><h3 id="bobcontent4-title" class="handcursor">Opciones de Curso</h3> 
  <div id="bobcontent4" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	
                       <li><label id="codigo_curso_lbl" for="codigo_curso" class="hasTip" title="">Codigo Curso</label>	
                         	<input type="text" name="codigo_curso" id="codigo_curso" value="<?=$row_contenido['codigo_curso']?>" class="inputbox" size="20">
                       </li> 
                       
                       <li><label id="duracion_lbl" for="duracion" class="hasTip" title="">Duración</label>	
                           <select name="duracion_curso" id="duracion_curso">
                              <option value="1 Mes" <?php if( $row_contenido['duracion_curso']=="1 Mes") echo " selected='selected'"  ?>>1 Mes</option>
                              <option value="2 Meses" <?php if( $row_contenido['duracion_curso']=="2 Meses") echo " selected='selected'"  ?>>2 Meses</option>
                              <option value="3 Meses" <?php if( $row_contenido['duracion_curso']=="3 Meses") echo " selected='selected'"  ?>>3 Meses</option>
                              <option value="6 Meses" <?php if( $row_contenido['duracion_curso']=="6 Meses") echo " selected='selected'"  ?>>6 Meses</option>
                           </select>                        
                       </li>  
                        <li>
                       	<div style="clear:both;">
                        	  <label id="inicio_clases_lbl" for="inicioclases" class="hasTip" title="">Inicio de Clases</label>	
	                          <input name="inicioclases" type="text"  value="<?=$row_contenido['inicioclases']?>"  class="campofecha" size="12" id="inicioclases">
                        </div>    
                       </li>
                       <li><label id="modalidad_lbl" for="modalidad" class="hasTip" title="">Modalidad</label>	
	                      <select id="modalidad_curso" name="modalidad_curso" class="inputbox" size="1" aria-invalid="false"> 
                  <?php 
					 $rsmodacurso = db_query("select * from webparametros where ccodparametro='0019' and ctipparametro='1'");				 
				   while($rowmodacurso = db_fetch_array($rsmodacurso)) 
				   {					                                    								
					  if( $rowmodacurso['cvalparametro']==$row_contenido['modalidad_curso']) {
						   $selected=' selected';
					  }else{
						   $selected='';	   
					   }					  							
					   echo '<option value="'.$rowmodacurso['cvalparametro'].'" '. $selected .' >'.$rowmodacurso['cnomparametro'].'</option>';		 
                      	}//fin while						
					 ?>                                 
                    </select> 
                       </li> 
                    </ul>
               </fieldset>	    
    </div></div>
                     <!----------------Fin Curso---------------------------------->  
                </div><!--fin content-sliders--->
           </div><!--fin width-40 fltrt--->
             <input type="hidden" name="selectmodulo" id="selectmodulo" value="<?=$modulo?>" />
            <input type="hidden" name="id" id="id" value="<?=$_GET['id']?>">
            <input type="hidden" id="descripcion" name="descripcion" />
                 <input type="hidden" name="enviar" value="Enviar" />
            </form>
           	<!--FIN Formulario -->
            <div class="clr"></div>
      	  </div>
        <div class="clr"></div>
    </div>    
</div>
<?php } //  Fin While ?>
</body>
  <script type="text/javascript" src="js/jsweb.js"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/webadmin/js/core.js"></script>
<script type="text/javascript">
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
	bobexample.defaultExpanded(0,1,2) //expande el 0 y el 1
	bobexample.setPersist(false)
	bobexample.collapsePrevious(true) //Only one content open at any given time
	bobexample.init()
</script>

<!--TinyMCE FileBrowserCallBack implementation
http://geekswithblogs.net/narent/archive/2006/07/14/85195.aspx -->