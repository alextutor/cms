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
         <div class="pagetitle icon-48-category-add icon-48-content-category-add">
           <h2>Gestor de menús: Añadir   menú</h2></div>
    </div>
    <div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
            <form action="/webadmin/mantenimiento/Insertar-menu.php" method="post" name="adminForm" id="item-form" class="form-validate">
			<div class="width-60 fltlft">
               <fieldset class="adminform">
				<legend>Detalles del menú</legend>
					<ul class="adminformlist">	
                    	<li>
                        <label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Título del menú <span class="star">&nbsp;*</span></label>
                        <input type="text" name="nomb_menu" id="nomb_menu" class="inputbox required" size="40" aria-required="true" required="required"></li>
                        
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
                          <label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Ubicación <span class="star">&nbsp;*</span></label>
                     <!-- Inicio menu----------------------------------->
                   <select id="ubi_menu" name="ubi_menu" class="inputbox" size="1" aria-invalid="false"> 
					 <?php 
                     $rsesweb = db_query("select * from webparametros where ccodparametro='0018' and ctipparametro='1'");
                    while($rowesweb = db_fetch_array($rsesweb)) {					                                    								
					  if( $rowesweb['cnomparametro']=="Columna Izquierda") { //lo puse porque en fin
						   $selected=' selected';
					  }else{
						   $selected='';	   
					   }					  							
					   echo '<option value="'.$rowesweb['cvalparametro'].'" '. $selected .' >'.$rowesweb['cnomparametro'].'</option>';		 
                        }//fin while						
                     ?>                                 
                    </select>                                      
                  <!-- Fin menu----------------------------------->
                  </li>
                  
                 <li>
                    <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Mostrar en Portada</label>
                     <select id="mostrarportada" name="mostrarportada" class="inputbox" size="1" aria-invalid="false">                     
        <option value="SI" <?php if( $rsCategoria['mostrarportada']=="SI") echo " selected='selected'"  ?>>SI</option>
        <option value="NO" <?php if( $rsCategoria['mostrarportada']=="NO") echo " selected='selected'"  ?>>NO</option>                       </select>
                          <strong>(Solo para Ubicacion: Columna Derecha y Izquierda)</strong>
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
