<?Php  session_start(); 
$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');
//include_once ( $INC_DIR . '/webadmin/header.php');
$fechahoy= date("d-m-Y");
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
<script type="text/javascript">
	//Metodo para iniciar tinyMCE mas propiedades
	tinyMCE.init({
	theme : "advanced",
	mode : "exact",					
  width: "100%",
    height: 265,	
	plugins : "inlinepopups,advimage,advlink,jfilebrowser,media,preview,paste,table",      
	elements : "contenido",
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
<body>	
<div id="toolbar-box">
	<div class="m">
        <div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-apply">
	            <a onClick="document.forms['adminForm'].submit();" class="toolbar"><span class="icon-32-apply"></span>Guardar</a>
            </li>
            <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=com_estilos_web" onClick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-article-add">
           <h2>Gestor de Estilos Web: Añadir un nuevo estilo Web</h2></div></div><div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
            <form action="/webadmin/mantenimiento/Insertar-Agencia.php" method="post" name="adminForm" id="adminForm" class="form-validate"
             onSubmit="return validar_form(this)">
               <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="selectmodulo" id="selectmodulo" value="<?=$modulo?>" />
			<div class="width-60 fltlft">
               <fieldset class="adminform">
				<legend>Detalles</legend>
					<ul class="adminformlist">	
                    	<li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Pagina <span class="star">&nbsp;*</span></label>
                      <select name="selectpage" id="selectpage" style="width:250px">
					  <?php
                        if ($_SESSION['webuser_nivel'] == '9')
                            $sql_page = db_query("select * from page  where  cestpage='1' and credpage='' order by cnompage");
                        else
                            $sql_page = db_query("select * from page p, personapage pp  where p.ccodpage=pp.ccodpage and pp.ccodpersona='".$_SESSION['webuser_id']."' and p.cestpage='1' and p.credpage='' order by p.cnompage");
                      
                         while($row_page = db_fetch_array($sql_page)) 
                         {
                             if( $row_page['ccodpage']==$_SESSION['page'])
                                echo '<option value="' . $row_page['ccodpage'] .'" selected>' . $row_page['cnompage'] . '</option>';
                             else
                                echo '<option value="' . $row_page['ccodpage'] .'">' . $row_page['cnompage'] . '</option>';
                         }
                      ?>
                      </select>
                      
                      </li>
                                            
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Titulo<span class="star">&nbsp;*</span></label>
                        <input type="text" name="titulo"  size="85" maxlength="150" >
                        </li>                        
                                        
                                                
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Orden <span class="star">&nbsp;*</span></label>
                        <input type="text" name="orden" id="orden" value="" class="inputbox" size="40" aria-required="true" required></li>                
                         
                        
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
                        <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Direccion</label>	
                       <input type="text" name="direccion"  size="85" maxlength="150" >
                       </li>
                        <li>
                    <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Codigo Google Map</label>	
                      <textarea name="cod_google_map" id="cod_google_map"></textarea></li>   
                      
                        <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Ancho Mapa</label>	
                       <input name="anchomapa" type="text"  size="10" maxlength="10" >
                       px</li>                      
                      <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Alto Mapa</label>	
                       <input name="altomapa" type="text" size="10" maxlength="10" >
                       px</li>                      
                        
                    </ul> 
                </fieldset>       
             </div>
           <div class="width-40 fltrt">
           		<div id="content-sliders-" class="pane-sliders">
                
       <div class="panel"><h3 id="bobcontent2-title" class="handcursor">Contactos</h3> 
  <div id="bobcontent2" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	
	                    <li>
                        <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Telefono Fijo</label>	
                         <input type="text" name="tfijo"  size="30" maxlength="15" >
                        </li> 
                         <li>
                   <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Fax</label>	
                   <input type="text" name="tfax"  size="30" maxlength="15" >
                         </li>
                         <li>
                  <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Movil</label>	                   <input type="text" name="tmovil"  size="30" maxlength="15" >
                         </li>
                         <li>
                  <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Nextel</label>	                   <input type="text" name="nextel"  size="30" maxlength="15" >
                         </li>
                          <li>
                  <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Horario de atención<br>
                  </label>
                  <textarea name="horario_atencion" cols="80px" rows="5" id="horario_atencion"></textarea>
                         </li>
                      <li>
                  <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Local Principal </label>
                  <select name="localprincipal" id="localprincipal">
                    <option value="si">SI</option>
                    <option value="no">NO</option>
                  </select>
                   </li>
                             <li>
                  <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Email</label>	                   <input type="text" name="email"  size="40" maxlength="15" >
                         </li>
                         <li>
                 <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Pagina Web</label>	                
                 <input type="text" name="web"  size="40" maxlength="15" >
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
            <div class="clr"></div>
      	  </div>
        <div class="clr"></div>
    </div>    
</div>
</body>

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
	bobexample.defaultExpanded(0,1) //expande el 0 y el 1
	bobexample.setPersist(false)
	bobexample.collapsePrevious(true) //Only one content open at any given time
	bobexample.init()
</script>

