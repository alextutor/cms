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
   $result=mysql_query("select u.nombre,u.email,u.nivel,u.nick,u.id_usuario,AES_DECRYPT(u.password,'$llavesita') 
   as password ,u.telefono FROM usuarios u  Where id_usuario='$id' ",$conexion);    
   
   $rsUsuarios=mysql_fetch_array($result);     
   $paginacion=trim($_GET['paginacion']); 
?>
<div id="toolbar-box">
	<div class="m">
        <div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-apply">
	            <a onclick="document.forms['adminForm'].submit();" class="toolbar"><span class="icon-32-apply"></span>Guardar</a>
            </li>
            <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=com_usuario" onclick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-category-add icon-48-content-category-add">
           <h2>Gestor de Usuarios: Editar Usuarios</h2></div>
    </div>
    <div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
            <form action="/webadmin/mantenimiento/GestorUsuarios/ActualizaFormUsuarios.php" method="post" name="adminForm" id="item-form" class="form-validate">
			<div class="width-60 fltlft">
              <fieldset class="adminform">
				<legend>Detalles</legend>
	   <ul class="adminformlist">	
            <li>
          <label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Nombre <span class="star">&nbsp;*</span></label>
          <input type="text" name="nombre" id="nombre" value="<?php echo trim($rsUsuarios["nombre"]); ?>" class="inputbox required" size="40" aria-required="true" required="required">
          </li>
          
          <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Nick<span class="star">&nbsp;*</span></label>
          <input type="text" name="nick" id="nick" value="<?php echo trim($rsUsuarios["nick"]); ?>" class="inputbox" size="40" aria-required="true" required="required">
          </li>  
          
          <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Password<span class="star">&nbsp;*</span></label>
          <input type="text" name="password" id="password" value="<?php echo trim($rsUsuarios["password"]); ?>" class="inputbox" size="40" aria-required="true" required="required">
          </li> 
          <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Email<span class="star">&nbsp;*</span></label>
          <input type="text" name="email" id="email" value="<?php echo trim($rsUsuarios["email"]); ?>" class="inputbox" size="40" aria-required="true" required="required">
          </li>  
           <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Telefono<span class="star">&nbsp;*</span></label>
          <input type="text" name="telefono" id="telefono" value="<?php echo trim($rsUsuarios["telefono"]); ?>" class="inputbox" size="40" aria-required="true" required="required">
          </li>   
          <li>
          <label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Nivel<span class="star">&nbsp;*</span></label>
          <select id="nivel" name="nivel" class="inputbox" size="1" aria-invalid="false">
             <option value="ADMINISTRADOR" <?php if( $rsUsuarios['nivel']=="ADMINISTRADOR") echo " selected='selected'"  ?>>ADMINISTRADOR</option>
             <option value="ADMIN_CONDOMINIO" <?php if( $rsUsuarios['nivel']=="ADMIN_CONDOMINIO") echo " selected='selected'"  ?>>ADMIN_CONDOMINIO</option>
             <option value="USUARIO" <?php if( $rsUsuarios['nivel']=="USUARIO") echo " selected='selected'"  ?>>USUARIO</option>
          </select>                                                   
          </li>        
                     
        </ul> 
                </fieldset>       
             </div>
           <div class="width-40 fltrt">
           		<div id="categories-sliders-" class="pane-sliders">
                	<ul class="adminformlist">	
                	 <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Imagen</label>	
                     	<div><textarea name="img_cate" id="img_cate"><?php echo trim($rsUsuarios["img_cate"]); ?></textarea></div>
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
