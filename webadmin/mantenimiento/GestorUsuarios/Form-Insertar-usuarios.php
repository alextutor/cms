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
           <h2>Gestor de Usuarios: Nuevo Usuario</h2></div>
    </div>
    <div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
            <form action="/webadmin/mantenimiento/GestorUsuarios/insertar-usuario.php" method="post" name="adminForm" id="item-form" class="form-validate">
			<div class="width-60 fltlft">
              <fieldset class="adminform">
				<legend>Detalles</legend>
	   <ul class="adminformlist">	
            <li>
          <label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Nombre <span class="star">&nbsp;*</span></label>
          <input type="text" name="nombre" id="nombre" value="<?php echo trim($rsUsuarios["nombre"]); ?>" class="inputbox required" size="40" aria-required="true" required="required">
          </li>
          
          <li>
             <div class="noespacionimayu">En Campo Nick: NO se permite Espacios en Blanco, Letras en Mayusculas ,ñ , @ , Maximo 15 Caracteres</div>
          <label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Nick<span class="star">&nbsp;*</span></label>       
          
            <input  class="texcorto"  style="text-transform:lowercase" name="nick" type="text" required id="nick" title="Se utiliza para ingresar a la Web" size="15" maxlength="15" 
             onkeypress="return soloLetras(event)" onpaste="return false"/>
            <div id="Info"></div>                 
                
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
<!--
http://www.jose-aguilar.com/blog/comprobar-disponibilidad-de-nombre-de-usuario-en-vivo/
http://blog.reaccionestudio.com/comprobar-si-el-nombre-de-usuario-existe-con-jquery-y-php/ 
-->
<script type="text/javascript">
	$('#nick').keydown(function(e) { if (e.keyCode == 32) { return false;} });
</script>

<!--validar campo de texto  http://analista3.info/?p=108 -->
 <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "abcdefghijklmnopqrstuvwxyz1234567890";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
			//document.frmcontactenos.nick.value="";			
            return false;
        }
    }
</script>

<script src="/include/js/jquery-1.7.1.min.js" type="text/javascript"></script> 
<script type="text/javascript">
$(document).ready(function() {    
    $('#nick').blur(function(){
		 var username = $(this).val(); 		  
		if( username !="" ){ /*Inicio si 2*/
		/*$('#submitbutton').attr('disabled', 'disabled');	*/			
        $('#Info').html('<img src="/webadmin/mantenimiento/GestorUsuarios/loader.gif" alt="" />').fadeOut(1000);       
		//alert(username);	     
        var dataString = 'nick='+username;
			$.ajax({
				type: "POST",
				url: "/webadmin/mantenimiento/GestorUsuarios/compueba-usuario-existe.php",
				data: dataString,
				success: function(data) {
					$('#Info').fadeIn(1000).html(data);				
					
				}
			});	/* fin ajax*/		
		}/*--fin si 2*/
    });              
});    
</script>