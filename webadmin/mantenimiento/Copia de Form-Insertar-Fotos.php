<?Php  session_start();
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/include/uploadify/jquery.uploadify.min.js"></script>

<link href="/include/uploadify/uploadify.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="/include/uploadify/jquery.uploadify.js"></script>
<script type="text/javascript" src="/include/uploadify/swfobject.js"></script>
<script type="text/javascript">// <![CDATA[
$(document).ready(function() {
	$('#fileInput').uploadify({
		'uploader'  : '/include/uploadify/uploadify.swf',
		'script'    : 'galeriafotosup.php',
		'cancelImg' : '/include/uploadify/cancel.png',
		'auto'      : false,
		'folder'    : '/',
		'fileExt'   : '*.jpg;',
		'fileDesc'  : 'Archivos de Imagen',
		'sizeLimit' : 10485760,//10mb,		
		'multi'   : true,
		'onComplete': function(event, queueID, fileObj, response, data) {
 		    $('#fotosWrapper').append(response);
		}
	});
	$('#enviar').click(function () {
		$('#fileInput').uploadifyUpload();
	}); 	
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
          <a href="/webadmin/index.php?option=com_articulos" onclick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-category-add icon-48-content-category-add">
           <h2>Insertar Fotos: Añadir una nueva Foto</h2></div></div><div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
            <form action="/webadmin/mantenimiento/Insertar-videos.php" method="post" name="adminForm" id="item-form" class="form-validate">
              <input type="hidden" name="pagina" id="pagina" value="<?=$_SESSION['page'] ?>" />
			<div class="width-60 fltlft">
               <fieldset class="adminform">
				<legend>Detalles</legend>
					<ul class="adminformlist">	
    
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Archivos <span class="star">&nbsp;*</span></label>
                        <input type="file" name="fileInput" id="fileInput" />
							<div id="fotosWrapper"></div>
                       </li>                  
                    	
    
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Título <span class="star">&nbsp;*</span></label>
                        <input type="text" name="cnomcontenido" id="cnomcontenido" class="inputbox required" size="40" aria-required="true" required="required"></li>                                 
                                             
                    	
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
                    </ul> 
                    
                     <input type="button" name="enviar" id="enviar"  value="enviar"/>
                </fieldset>       
             </div>           
                
            </form>
           	<!--FIN Formulario -->
            <div class="clr"></div>
      	  </div>
        <div class="clr"></div>
    </div>    
</div>
