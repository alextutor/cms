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
<div id="toolbar-box">
	<div class="m">
        <div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-apply">
	            <a onclick="document.forms['adminForm'].submit();" class="toolbar"><span class="icon-32-apply"></span>Guardar</a>
            </li>
            <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=com_menus" onclick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-category-add icon-48-content-category-add"><h2>Gestor de menús: Añadir un elemento de menú</h2></div>
    </div>
    <div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
            <form action="/webadmin/mantenimiento/Insertar-menu.php" method="post" name="adminForm" id="item-form" class="form-validate">
			<div class="width-60 fltlft">
               <fieldset class="adminform">
				<legend>Detalles del menú</legend>
					<ul class="adminformlist">	
                    	<li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Título del elemento del menú <span class="star">&nbsp;*</span></label>
                        <input type="text" name="titulo" id="titulo" value="" class="inputbox required" size="40" aria-required="true" required="required"></li>
                        
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Enlace <span class="star">&nbsp;*</span></label>
                        <input type="text" name="enlace" id="enlace" value="" class="inputbox required" size="40" aria-required="true" required="required"></li>
                                                
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Estado</label>	
                        <select id="estado" name="estado" class="inputbox" size="1" aria-invalid="false">
                            <option value="1" selected="selected">Publicado</option>
                            <option value="0">Despublicado</option>
                            <option value="2">Archivado</option>
                            <option value="-2">Movido a la papelera</option>
	                    </select>
    	                </li>
                      
                        <li>
                          <label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Menú <span class="star">&nbsp;*</span></label>
                             <!-- Inicio menu----------------------------------->
                                <select name="idmenu" id="idmenu">                                             
                                    <?php                     
                                        $rsmenu=mysql_query("SELECT * FROM menu  where estado=1 order by idmenu", $conexion);    
                                        while ($rowmenu = mysql_fetch_array($rsmenu)) 			
                                            { 
											  echo '<option value="'.$rowmenu['idmenu'].'"';                                                 
											  echo '>'. $rowmenu['titulo'] . '</option>'."\n";
											} 
                                            mysql_free_result($rsmenu); 	                    
                                    ?>                
                                  </select>             
                              <!-- Fin menu----------------------------------->
                          </li>                                            
                         <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Página de inicio<span class="star">&nbsp;*</span></label>
                           <select name="inicio" id="inicio">
                             <option value="NO">NO</option>
                             <option value="SI">SI</option>
                           </select>
                        </li>
                         
                    </ul> 
                </fieldset>       
             </div>
           <div class="width-40 fltrt">
           		<div id="categories-sliders-" class="pane-sliders">
                	<ul class="adminformlist">	
                	 
                    </ul>    
                </div>
           </div>
                 <input type="hidden" name="enviar" value="Enviar" />
            </form>
           	<!--FIN Formulario -->
            <div class="clr"></div>
      	  </div>
        <div class="clr"></div>
    </div>    
</div>
