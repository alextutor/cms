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
<body onLoad="sf('nombre');"> 
<div id="toolbar-box">
	<div class="m">
        <div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-apply">
	            <a onClick="document.forms['adminForm'].submit();" class="toolbar"><span class="icon-32-apply"></span>Guardar</a>
            </li>
            <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=com_gestor_propietarios" onClick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-category-add icon-48-content-category-add">
           <h2>Gestor de Propietario: Nuevo Propietario</h2></div>
    </div>
    <div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
            <form action="/webadmin/mantenimiento/control_condominios/insertar-propietario.php" method="post" name="adminForm" id="item-form" class="form-validate">
			<div class="width-60 fltlft">
              <fieldset class="adminform">
				<legend>Detalles</legend>
	   <ul class="adminformlist">	
       	   <li>
           <label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Condominio <span class="star">&nbsp;*</span></label>
            <select id="idcondominio" name="idcondominio" class="inputbox" size="1" aria-invalid="false"> 
					 <?php 
                     $rsesweb = db_query("select * from condominio");
                    while($rowesweb = db_fetch_array($rsesweb)) {	                                 													 				
					   echo '<option value="'.$rowesweb['idcondominio'].'">'.$rowesweb['nombrecondominio'].'</option>';		 
                        }//fin while						
                     ?>                                 
            </select>
           </li>
	       <li>
              <label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Tipo Residente <span class="star">&nbsp;*</span></label>
                 <select id="tiporesidente" name="tiporesidente" class="inputbox" size="1" aria-invalid="false"> 
                  <?php 
					 $rstiporesidente = db_query("select * from webparametros where ccodparametro='0022' and ctipparametro='1'");				 
				   while($rowtiporesidente = db_fetch_array($rstiporesidente)) 
				   {					                                    								
					   echo '<option value="'.$rowtiporesidente['cvalparametro'].'">'.$rowtiporesidente['cnomparametro'].'</option>';		 
                    }//fin while						
					 ?>                                 
                  </select>     
                               
          </li>
          <li>
          <label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Nombre <span class="star">&nbsp;*</span></label>
          <input type="text" name="nombre" id="nombre" value="<?php echo trim($rsUsuarios["nombre"]); ?>" class="inputbox required" size="40" aria-required="true" required style="text-transform:UPPERCASE" >
          </li>
          
          <li>          
          <label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Ap.Paterno<span class="star">&nbsp;*</span></label>                 
            <input  class="texcorto"   name="appaterno" type="text" required id="appaterno" title="" size="25" maxlength="15" 
             onkeypress="return soloLetras(event)" onpaste="return false" style="text-transform:UPPERCASE" />                                             
          </li>
          <li>    
          <label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Ap.materno<span class="star">&nbsp;*</span></label>                 
            <input  class="texcorto"  style="text-transform:UPPERCASE" name="apmaterno" type="text" required id="apmaterno" title="" size="25" maxlength="15" 
             onkeypress="return soloLetras(event)" onpaste="return false" />
          </li>  
          
           <li>    
          <label id="jform_title-lbl" for="jform_title" class="hasTip" title="">DNI<span class="star">&nbsp;*</span></label>                 
            <input  class="texcorto"  style="text-transform:lowercase" name="dni" type="text" required id="dni" title="DNI" size="25" maxlength="15" />
          </li>  
          
          <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Password<span class="star">&nbsp;*</span></label>
          <input type="text" name="password" id="password" value="<?php echo trim($rsUsuarios["password"]); ?>" class="inputbox" size="40" aria-required="true" required>
          </li> 
          <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Email<span class="star">&nbsp;*</span></label>
          <input type="text" name="email" id="email" value="<?php echo trim($rsUsuarios["email"]); ?>" class="inputbox" size="40" aria-required="true" required>
          </li>  
           <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Telefono<span class="star">&nbsp;*</span></label>
          <input type="text" name="telefono1" id="telefono1" value="<?php echo trim($rsUsuarios["telefono1"]); ?>" class="inputbox" size="40" aria-required="true" required>
          </li>   
          <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Telefono<span class="star">&nbsp;*</span></label>
          <input type="text" name="telefono2" id="telefono2" value="<?php echo trim($rsUsuarios["telefono2"]); ?>" class="inputbox" size="40" aria-required="true" required>
          </li> 
          <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Telefono<span class="star">&nbsp;*</span></label>
          <input type="text" name="telefono3" id="telefono3" value="<?php echo trim($rsUsuarios["telefono3"]); ?>" class="inputbox" size="40" aria-required="true" required>
          </li> 
          <li>
          <label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Nivel<span class="star">&nbsp;*</span></label>
          <select id="nivel" name="nivel" class="inputbox" size="1" aria-invalid="false">
             <option value="USUARIO">USUARIO</option>
          </select>                                                   
          </li>        
                     
        </ul> 
                </fieldset>       
             </div>
           <div class="width-40 fltrt">
           		<div id="categories-sliders-" class="pane-sliders">
                	<ul class="adminformlist">	                    
               <li>
                   <label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Seccion Condominio <span class="star">&nbsp;*</span></label>
                    <select id="idseccioncondominio" name="idseccioncondominio" class="inputbox" size="1" aria-invalid="false"> 
                             <?php 
                             $rs_condominio_secciones = db_query("select * from condominio_secciones");
                            while($row_condominio_secciones= db_fetch_array($rs_condominio_secciones)) {
								echo '<option value="'.$row_condominio_secciones['idseccion'].'">'.$row_condominio_secciones['nombreseccion'].'</option>';		 
                             }//fin while						
                             ?>                                 
                    </select>
               </li><br>
       
                	 <li>
                 <?php 
				 /*lo utilizo para llenar el iddepartamento al cargar la pagina porque al escoger otro idseccioncondominio el script se ejecuta ver abajo */
				 $rs_idseccion = db_query("select * from condominio_secciones LIMIT 1");
				 $row_idseccion= db_fetch_array($rs_idseccion)
				 ?>    
                 <label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Nombre o número de departamento<span class="star">&nbsp;*</span></label>
                     <select name="iddepartamento" id="iddepartamento" style="width:340px" class="box">						
						<?php
                        $sqlclase = db_query("select * from  condominio_departamentos where asignado='NO' and idseccion='".$row_idseccion['idseccion']."'");
                        while($rowclase = db_fetch_array($sqlclase)) 
                        {                        
						 if($rowclase['ccodclase']==$row['ccodclase'])
                              echo '<option value="' .utf8_encode($rowclase['iddepartamento']).'" selected>' . $rowclase["nombredepartamento"].'</option>';
                           else
                                echo '<option value="' . $rowclase['iddepartamento'].'" >' .utf8_encode($rowclase["nombredepartamento"]). '</option>';
                         }							
						?>                        
                  </select>                    
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
<!-- 
<script language="javascript" src="js/jquery-1.2.6.min.js"></script>
-->

<!--  -->
<script language="javascript">
	$(document).ready(function(){
   $("#idseccioncondominio").change(function () {
           $("#idseccioncondominio option:selected").each(function () {
            elegido=$(this).val();
            $.post("/webadmin/mantenimiento/control_condominios/depa_segun_condominio.php", { elegido: elegido }, function(data){
            $("#iddepartamento").html(data);
            });            
        });
   })
});
</script>