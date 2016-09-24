<?Php  session_start(); 
$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');
//agregar esto para que funcione asset manager
include($_SERVER['DOCUMENT_ROOT']. '/webadmin/panel_html.php');	
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


<body>	
<div id="toolbar-box">
	<div class="m">
        <div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-apply">
	            <a onClick="document.forms['adminForm'].submit();" class="toolbar"><span class="icon-32-apply"></span>Guardar</a>
            </li>
            <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=com_empresa" onClick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-article-add">
           <h2>Gestor de Empresa: Añadir una nueva Empresa</h2></div></div><div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
            <form action="/webadmin/mantenimiento/Insertar-Empresa.php" method="post" name="adminForm" id="adminForm" class="form-validate"
             onSubmit="return validar_form(this)">
               <input type="hidden" name="id" id="id" value="">            
			<div class="width-60 fltlft">
               <fieldset class="adminform">
				<legend>Datos Empresa</legend>
					<ul class="adminformlist">	
                    	<li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Pagina <span class="star">&nbsp;*</span></label>
                    	  <input type="text" name="cnikpage"  size="60" maxlength="150" id="cnikpage" >
                   	  </li>
                                            
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title=""><span class="colgrishome">URL Pagina</span><span class="star">&nbsp;*</span></label>
                        <input type="text" name="camipage"  size="60" maxlength="150" id="camipage" >
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
                        <li><span class="colgrishome">Nombre Comercial:</span>
                          <input type="text" name="cnompage"  size="50" maxlength="150" id="cnompage" >
                       </li>
                        <li><span class="colgrishome">Razon Social:</span><span class="colblancocen">
                          <input name='crazpage' type='text' id='crazpage'  size='50'  maxlength="150" class="box500">
                        </span></li>   
                      
                        <li><span class="colgrishome">Logo:</span><span class="colblancocen">
                          <input type="text" name="clogo" id="clogo" size="60"  maxlength="150" class="box400">
                        </span><span class="colblancocen">
                        <input type="button" value="Seleccionar" onClick="openAsset('imagen')" id="btnAsset" name="btnAsset" >
                        </span></li> <br>
                        <li><span class="colgrishome">Ruta Imagenes:</span><span class="colblancocen">
                          <input type="text" name="rutaimages" id="rutaimages" size="60"  maxlength="150" class="box400">
                        </span>
                        <span class="colblancocen"> </span>(<strong>solo poner nombre sin / ni adelante ni atras</strong>)</li>
                        <li><span class="colblancocen">E</span>s usado por webadmin\editor\assetmanager pero una vez definido deves salir y volver a entrar al webadmin</li>                      
                        
                    </ul> 
                </fieldset> 
                <!-----------------------Inicio -------------------------------------------->
                <fieldset class="adminform">
				<legend>Contactos</legend>
					<ul class="adminformlist">	
                      <li>
                        <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Telefono Fijo 1</label>	
                        
                        <input type="text" name="ctelefonopri"  size="30" maxlength="60" id="ctelefonopri" >
                        </li> 
                         <li>
                        <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Telefono Fijo 2</label>	                       
                        <input type="text" name="ctelefonosec"  size="30" maxlength="60" id="ctelefonosec" >
                        </li> 
                         <li>
                   <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Fax</label>	
                   <input type="text" name="tfax"  size="30" maxlength="30" >
                         </li>
                         <strong>*Nota Poner rpm /rpc/ nextel / etc  si lo tuviera</strong>
                         <li>
                  <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Movil 1</label>	                   <input type="text" name="tmovil1"  size="30" maxlength="30" >
                         </li>
                           <li>
                  <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Movil 2</label>	                   <input name="tmovil2" type="text" value=""  size="60" maxlength="60" >
                        </li>
                          <li>
                  <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Movil 3</label>	                   <input name="tmovil3" type="text" value=""  size="60" maxlength="60" >
                        </li> 
                        
                         <li>
                  <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Movil 4</label>	                   <input type="text" name="tmovil4"  size="30" maxlength="30" >
                         </li>
                          <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Distrito</label>	
                       <input type="text" name="cdistrito"  size="85" maxlength="150" id="cdistrito" >
                       </li>
                      <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Direccion</label>	
                       <input type="text" name="cdirecempresa"  size="85" maxlength="300" id="cdirecempresa" >
                       </li>
                          <li>
                  <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Horario de atención<br>
                  </label>
                  <textarea name="chorarioatencion" cols="80px" rows="5" id="chorarioatencion"></textarea>
                         </li> 
                      <li>
                    <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Codigo Google Map</label>	
                      <br>
                      <textarea name="cod_google_map" cols="80" rows="15" id="cod_google_map"></textarea></li>   
                      
                        <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Ancho Mapa</label>	
                       <input name="anchomapa" type="text"  size="10" maxlength="10" >
                       (hay que ponerle px , %)</li>                      
                      <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Alto Mapa</label>	
                       <input name="altomapa" type="text" size="10" maxlength="10" >
                       (hay que ponerle px , %)</li>         
                                                                                
                    </ul>
                </fieldset> 
                  <!-----------------------Fin -------------------------------------------->     
             </div>
           <div class="width-40 fltrt">
           		<div id="content-sliders-" class="pane-sliders"> 
         
                  
       <div class="panel">
  <h3 id="bobcontent1-title" class="handcursor">Opciones Pagina Web</h3> 
  <div id="bobcontent1" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	
	                    <li>
                        <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Titulo:</label>
                        <span class="colblancocen">
                        <input name='ctitpage' type='text' id='ctitpage'  size='90'  maxlength="150"  class="box500">
                        </span>	                    </li> 
                         <li><span class="colgrishome">Favicon</span>:<span class="colblancocen">
                           <input type="text" name="cfavicon" id="cfavicon" size="60"  maxlength="150" class="box400">
                         </span><span class="colblancocen">
                         <input type="button" value="Seleccionar" onClick="openAsset('favicon')" id="btnAsset2" name="btnAsset2" >
                         </span></li>
                         <li><span class="colgrishome">Descripción</span>:<span class="colblancocen">
                           <br>
                           <textarea id="cdespage" name="cdespage" rows="5" cols="65"  class="area500">
                           </textarea>
                         </span></li>
                         <li><span class="colgrishome">Tags</span>:<br>
                           <span class="colblancocen">
                           <textarea name="ctagpage" id="ctagpage" cols="65" rows="4"  class="area500">
                           </textarea>
                         </span></li>
                          <li><span class="colgrishome">Email Contacto:</span><span class="colblancocen">
                            <input name='cemacontacto' type='text' id='cemacontacto'  size='50'  maxlength="80" class="box500">
                          </span></li>
                         <li><span class="colgrishome">Email Venta :</span><span class="colblancocen">
                           <input name='cemaventas' type='text' id='cemaventas'  size='50'  maxlength="80" class="box500">
                         </span></li>         
                    </ul>
               </fieldset>	    
    </div></div> 
    
    <!--  Inicio  Grupo Redes sociales  -->
    <div class="panel">
  <h3 id="bobcontent2-title" class="handcursor">Opciones Redes Sociales</h3> 
  <div id="bobcontent2" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	
                      <li>
		                 <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Youtube:</label>
                        <span class="colblancocen">
                        <input name='credYoutube' type='text' id='credYoutube'  size='90'  maxlength="150"  class="box500">
                        </span>	                   
                         </li>                     
                       <li>
		                 <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Twitter:</label>
                        <span class="colblancocen">
                        <input name='credTwitter' type='text' id='credTwitter'  size='90'  maxlength="150"  class="box500">
                        </span>	                   
                         </li>
                         <li>
		                 <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Facebook:</label>
                        <span class="colblancocen">
                        <input name='credFacebook' type='text' id='credFacebook'  size='90'  maxlength="150"  class="box500">
                        </span>	                   
                         </li>                            
                    </ul>
               </fieldset>	    
    </div></div>
    <!--  Fin GRupo Redes Sociales -->
    
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

