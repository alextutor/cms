<?Php  session_start(); 
$Title = "";
$Description = "";
$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/webadmin/header.php');
?>
<meta charset="utf-8">
    <style>
        text {text-transform: uppercase;}
    </style>
<?php				
   $id=$_GET['id'];	
   include($_SERVER['DOCUMENT_ROOT']. '/config.php');	           	
   $result=mysql_query("select u.nombre,u.email,u.nivel,u.nick,u.id_usuario,AES_DECRYPT(u.password,'$llavesita') 
   as password ,u.telefono FROM usuarios u  Where id_usuario='$id' ",$conexion);    
   
   $rsUsuarios=mysql_fetch_array($result);     
   $paginacion=trim($_GET['paginacion']); 
?>
<body onLoad="sf('nombredepa');"> 
<div id="toolbar-box">
	<div class="m">
        <div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-apply">
	            <a onClick="document.forms['adminForm'].submit();" class="toolbar"><span class="icon-32-apply"></span>Guardar</a>
            </li>
            <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=com_gestor_condominio" onClick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-category-add icon-48-content-category-add">
           <h2>Gestor de  Condominio: Nuevo Condominio</h2></div>
    </div>
    <div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
            <form action="/webadmin/mantenimiento/control_condominios/insertar-condominio-departamento.php" method="post" name="adminForm" id="item-form" class="form-validate">
			<div class="width-60 fltlft">
              <fieldset class="adminform">
				<legend>Detalles</legend>
	   <ul class="adminformlist">	      
          <li>
          <label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Nombre  del Condominio<span class="star">&nbsp;*</span></label>
          <input type="text" name="nombrecondominio" id="nombrecondominio" value="" class="inputbox required" size="40" aria-required="true" required style="text-transform:UPPERCASE" >
          </li>
          <li>
            <label for="observacion">Observacion :</label><br/>
            <textarea name="observacion" cols="50" rows="10" id="observacion"></textarea>
          </li>                     
        </ul> 
                </fieldset>       
             </div>
           <div class="width-40 fltrt">
           		<div id="categories-sliders-" class="pane-sliders">
                	<ul class="adminformlist">	<br>
                       <!----------------- Lado Derecha -----------------------------> 
                    <div class="spacer">
                      <label>Foto :</label>                           
                      <a class="grouped_elements" rel="<?=$_SESSION['id_usu_web']?>" href="<?=$row_usu['imagenfoto']?>"  title="<?=$row_usu['nombre']?> " />               	     <img src='/timthumb.php?src=<?=$row_usu['imagenfoto'] ?>&h=200&w=250&zc=0&q=100&s=1' border=0 title="<?=$row_usu['nombre']?>" />         
                       </a>	  
                       <br>
                       <a class="actualizarpadre" href="/webadmin/mantenimiento/control_condominios/foto/form-actualiza-foto-condominio.php"><div class="upload">Subir Archivo</div></a>           
                    </div>
                     <!----------------- Fin Lado Derecha -----------------------------> 
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
</body> 
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
        $('#Info').html('<img src="/webadmin/mantenimiento/control_condominios/loader.gif" alt="" />').fadeOut(1000);       
		//alert(username);	     
        var dataString = 'nick='+username;
			$.ajax({
				type: "POST",
				url: "/webadmin/mantenimiento/control_condominios/compueba-propietario-existe.php",
				data: dataString,
				success: function(data) {
					$('#Info').fadeIn(1000).html(data);				
					
				}
			});	/* fin ajax*/		
		}/*--fin si 2*/
    });              
});    
</script>
<script>
	function sf(ID){
	document.getElementById(ID).focus();
	}
</script>