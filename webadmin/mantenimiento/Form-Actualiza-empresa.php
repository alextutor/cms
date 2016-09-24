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
<?php
$sqlp    = db_query("SELECT * FROM page WHERE ccodpage = '". $_GET['id'] ."'");
while ($row = db_fetch_array($sqlp))
{
?>
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
           <h2>Gestor de Empresa: Actualiza una nueva Empresa</h2></div></div><div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
            <form action="/webadmin/mantenimiento/Actualiza-Empresa.php" method="post" name="adminForm" id="adminForm" class="form-validate"
             onSubmit="return validar_form(this)">
                <input type="hidden" name="id" id="id" value="<?=$_GET['id']?>">
			<div class="width-60 fltlft">
            
               <fieldset class="adminform">
				<legend>Datos Empresa</legend>
					<ul class="adminformlist">	
                    	<li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Pagina <span class="star">&nbsp;*</span></label>
                    	  <input name="cnikpage" type="text" id="cnikpage" value="<?=$row['cnikpage']?>"  size="60" maxlength="150" >
                   	  </li>
                                            
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title=""><span class="colgrishome">URL Pagina</span><span class="star">&nbsp;*</span></label>
                        <input name="camipage" type="text" id="camipage" value="<?=$row['camipage']?>"  size="60" maxlength="150" >
                        </li>                        
                                        
                                                
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Orden <span class="star">&nbsp;*</span></label>
                        <input type="text" name="orden" id="orden" value="<?=$row['orden']?>" class="inputbox" size="40" aria-required="true" required></li>                
                         
                        
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Estado</label>	
                  <select id="estado" name="estado" class="inputbox" size="1" aria-invalid="false">
                        <option value="1" <?php if( $row['estado']=="1") echo " selected='selected'"  ?>>Publicado</option>
                        <option value="2" <?php if( $row['estado']=="2") echo " selected='selected'"  ?>>Despublicado</option>
                        <option value="3" <?php if( $row['estado']=="3") echo " selected='selected'"  ?>>Archivado</option>
                        <option value="4" <?php if( $row['estado']=="4") echo " selected='selected'"  ?>>Movido a la papelera</option>                     
                  </select>
    	                </li>
                        <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Mostrar</label>	
                           <select name='mostrar' id='mostrar'>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>                           
                          </select>
                       </li>
                        <li><span class="colgrishome">Nombre Comercial:</span>
                          <input name="cnompage" type="text" id="cnompage" value="<?=$row['cnompage']?>"  size="50" maxlength="150" >
                       </li>
                        <li><span class="colgrishome">Razon Social:</span><span class="colblancocen">
                          <input name='crazpage' type='text' class="box500" id='crazpage' value="<?=$row['crazpage']?>"  size='50'  maxlength="150">
                        </span></li>   
                      
                        <li><span class="colgrishome">Logo:</span><span class="colblancocen">
                          <input name="clogo" type="text" class="box400" id="clogo" value="<?=$row['clogo']?>" size="70"  maxlength="150">
                        </span><span class="colblancocen">
                        <input type="button" value="Seleccionar" onClick="openAsset('clogo')" id="btnAsset" name="btnAsset" >
                        </span></li>                                         
                        
                        
                    </ul> 
                </fieldset>
                
	                 <!------------------  Tipo de Moneda  --------------------->
                                          
              <fieldset class="adminform">
				<legend>Tipo Moneda</legend>
				<ul class="adminformlist">	
               	  <li>
               	    <label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Moneda <span class="star">&nbsp;</span></label>
                   	    <select name="ccodmoneda" id="ccodmoneda" style="width:340px" class="box">						
						<?php
                        $sqlclase = db_query("select * from webparametros  where  ccodparametro='0002' and ctipparametro='1' order by cnomparametro");
                        while($rowclase = db_fetch_array($sqlclase)) 
                        {                        
						 if($rowclase['cvalparametro']==$row['ccodmoneda'])
                                    echo '<option value="' .$rowclase['cvalparametro'].'" selected>' . $rowclase["cnomparametro"].'</option>';
                           else
                                echo '<option value="' . $rowclase['cvalparametro'].'" >' .$rowclase["cnomparametro"]. '</option>';
                            }							
						   // echo '<option value="'.$rowclase['ccodclase'].'">'.utf8_encode($rowclase['cdesclase']).'</option>'		                 ?>                        
                        </select>
           	      </li>                  
                </ul> 
                </fieldset>                
                      <!-----------------------Inicio -------------------------------------------->
                <fieldset class="adminform">
				<legend>Contactos</legend>
					<ul class="adminformlist">	
                      <li>
                 <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Telefono Fijo 1</label>	
                   <textarea name="ctelefonopri" id="ctelefonopri" cols="45" rows="3"><?=$row['ctelefonopri']?></textarea>
                        </li>
                     
                      <li>
	               <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Telefono Fijo 2</label>			                     <textarea name="ctelefonosec" id="ctelefonosec" cols="45" rows="3"><?=$row['ctelefonosec']?></textarea>               
                        </li>              

                      <li>
                  <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Movil 1</label>	
                 <textarea name="tmovil1" id="tmovil1" cols="45" rows="3"><?=$row['tmovil1']?></textarea>              
                        </li>
                      <li>
                        <li>
<label id="jform_published-lbl" for="jform_published2" class="hasTip" title="" aria-invalid="false">Movil 2</label>
<textarea name="tmovil2" id="tmovil2" cols="45" rows="3"><?=$row['tmovil2']?></textarea>       
                        </li>
                          <li>
<label id="jform_published-lbl" for="jform_published3" class="hasTip" title="" aria-invalid="false">Movil 3</label>
<textarea name="tmovil3" id="tmovil3" cols="45" rows="3"><?=$row['tmovil3']?></textarea>  
                        </li> 
                      <li>
<label id="jform_published-lbl" for="jform_published4" class="hasTip" title="" aria-invalid="false">Movil 4</label>
<textarea name="tmovil4" id="tmovil4" cols="45" rows="3"><?=$row['tmovil4']?></textarea>  
                        </li>                   
                      <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Provincia</label>	
                       <input name="cprovincia" type="text" id="cprovincia" value="<?=$row['cprovincia']?>"  size="85" maxlength="150" >
                       </li>
                       
                      <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Distrito</label>	
                       <input name="cdistrito" type="text" id="cdistrito" value="<?=$row['cdistrito']?>"  size="85" maxlength="150" >
                       </li>
                      <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Direccion</label>	
                       <input name="cdirecempresa" type="text" id="cdirecempresa" value="<?=$row['cdirecempresa']?>"  size="85" maxlength="300" >
                       </li>
                          <li>
                  <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Horario de atención<br>
                  </label>
                  <textarea name="chorarioatencion" cols="80px" rows="5" id="chorarioatencion"><?=$row['chorarioatencion']?>
                  </textarea>
                         </li><br><br>
                         
                      <li>
                        <label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Provincia2</label>	
                       <input name="cprovincia2" type="text" id="cprovincia2" value="<?=$row['cprovincia2']?>"  size="85" maxlength="150" >
                       </li>
                       
                      <li>
                        <label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Distrito2</label>	
                       <input name="cdistrito2" type="text" id="cdistrito2" value="<?=$row['cdistrito2']?>"  size="85" maxlength="150" >
                       </li>
                      <li>
                        <label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Direccion2</label>	
                       <input name="cdirecempresa2" type="text" id="cdirecempresa2" value="<?=$row['cdirecempresa2']?>"  size="85" maxlength="300" >
                       </li>
                    </ul>
					<p>&nbsp;</p>
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
                        <input name='ctitpage' type='text'  class="box500" id='ctitpage' value="<?=$row['ctitpage']?>"  size='90'  maxlength="150">
                        </span>	                    </li> 
                         <li><span class="colgrishome">Favicon</span>:<span class="colblancocen">
                           <input name="cfavicon" type="text" class="box400" id="cfavicon" value="<?=$row['cfavicon']?>" size="60"  maxlength="150">
                         </span><span class="colblancocen">
                         <input type="button" value="Seleccionar" onClick="openAsset('cfavicon')" id="btnAsset2" name="btnAsset2" >
                         </span></li>
                         <li><span class="colgrishome">Descripción</span>:<span class="colblancocen">
                           <br>
                           <textarea id="cdespage" name="cdespage" rows="5" cols="65"  class="area500"><?=$row['cdespage']?>
                           </textarea>
                         </span></li>
                         <li><span class="colgrishome">Tags</span>:<br>
                           <span class="colblancocen">
                           <textarea name="ctagpage" id="ctagpage" cols="65" rows="4"  class="area500"><?=$row['ctagpage']?>
                           </textarea>
                         </span></li>
                          <li><span class="colgrishome">Email Contacto:</span><span class="colblancocen">
                            <input name='cemacontacto' type='text' class="box500" id='cemacontacto' value="<?=$row['cemacontacto']?>"  size='50'  maxlength="80">
                          </span></li>
                         <li><span class="colgrishome">Email Venta :</span><span class="colblancocen">
                           <input name='cemaventas' type='text' class="box500" id='cemaventas' value="<?=$row['cemaventas']?>"  size='50'  maxlength="80">
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
                        <input name='credYoutube' type='text'  class="box500" id='credYoutube' value="<?=$row['credYoutube']?>"  size='90'  maxlength="150">
                        </span>	                   
                         </li>                     
                      <li>
	                    <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Twitter:</label>
                        <span class="colblancocen">
                        <input name='credTwitter' type='text'  class="box500" id='credTwitter' value="<?=$row['credTwitter']?>"  size='90'  maxlength="150">
                        </span>	                   
                        </li>
                      <li>
	                    <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Facebook:</label>
                        <span class="colblancocen">
                        <input name='credFacebook' type='text'  class="box500" id='credFacebook' value="<?=$row['credFacebook']?>"  size='90'  maxlength="150">
                        </span>	                   
                        </li>   
                        
                         <li>                           
                           <a href="https://developers.facebook.com" target="new">
                           <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false"><strong>Script de Facebook</strong></label>	
                           <br><br>                                   
                           </a>
                           <textarea name="cscriptfacebook"  cols="80" rows="15" id="cscriptfacebook"  style="width:100%">
						   <?=$row['cscriptfacebook']?>
                           </textarea>
                      </li>
                       <li>
                       <div style="text-align:center; font-weight:bold; margin:20px auto"><a href="https://developers.facebook.com/tools/comments" target="new">Comentarios Facebook</a></div>
                       </li>
                      <li>
                        <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">fb:admins:</label>                        
                        <span class="colblancocen">
                        <input name='fb_admins_facebook' type='text'  class="box500" id='fb_admins_facebook' 
                        value="<?=$row['fb_admins_facebook']?>"  size='30'  maxlength="50">
                        </span><a href="http://findmyfacebookid.com/" target="new">Saber Id Facebook</a><a href="https://developers.facebook.com/apps/" target="new"></a></li>
                      <li>
                        <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">fb:app_id:</label>
                        <span class="colblancocen">
                        <input name='fb_app_id_facebook' type='text'  class="box500" id='fb_app_id_facebook'
                         value="<?=$row['fb_app_id_facebook']?>"  size='30'  maxlength="50">
                        </span>	
                                            
                        <a href="https://developers.facebook.com/apps/" target="new">Saber ID aplicación</a></li>                                  
                  </ul>
               </fieldset>	    
    </div></div>
    <!--  Fin GRupo Redes Sociales --> 
          
    <!--  Inicio  chat para Web  -->
    <div class="panel">
  <h3 id="bobcontent3-title" class="handcursor">Opciones chat para Web</h3> 
  <div id="bobcontent3" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
         <fieldset class="panelform">
              <ul class="adminformlist"> 
               <li>                           
                 <a href="https://dashboard.smartsupp.com/" target="new">
                 <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">
                 <strong>Ir al Panel Control Smartsupp</strong></label>	
                 <br><br>                         
                 </a>                
              </li>
                                   	                                                     
                  <li>                           
                     <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" 
                     aria-invalid="false"><strong>Script de chat</strong></label>	
                     <br><br>                                   
                     <textarea name="Script_chat"  cols="80" rows="15" id="Script_chat"  style="width:100%">
                     <?=$row['Script_chat']?>
                     </textarea>
                </li>                                                          
            </ul>
         </fieldset>	    
    </div></div>
    <!--  Fin GRupo Redes Sociales --> 
             
                      
             
   <!--  Inicio  Productos Google  -->
    <div class="panel">
  <h3 id="bobcontent4-title" class="handcursor">Opciones Productos Google</h3> 
  <div id="bobcontent4" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	
                          <li>
                    <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false"><strong><a href="https://www.google.es/maps/mm?authuser=0&hl=es-419&mid=1414003557" target="new">Codigo Google Map</a></strong>                     
                    </label>	<br>
                     <a href="https://www.google.es/maps/mm?authuser=0&hl=es-419&mid=1414003557" target="new"></a>
                     <textarea name="cod_google_map" cols="80" rows="15" id="cod_google_map"><?=trim($row['cod_google_map'])?>
                      </textarea>        
                      
                      </li>   
                      
                      <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Ancho Mapa</label>	
                       <input name="anchomapa" type="text" value="<?=$row['anchomapa']?>"  size="10" maxlength="10" >
                       (hay que ponerle px , %)</li>                      
                      <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Alto Mapa</label>	
                       <input name="altomapa" type="text" value="<?=$row['altomapa']?>" size="10" maxlength="10" >
                      (hay que ponerle px , %)</li>
                      <br> 
                <li><span class="colgrishome">Imagen Mapa</span>:<span class="colblancocen">
                 <input name="imagen_mapa" type="text" class="box400" id="imagen_mapa" value="<?=$row['imagen_mapa']?>" size="60"  maxlength="150">
               </span><span class="colblancocen">
               <input type="button" value="Seleccionar" onClick="openAsset('imagen_mapa')" id="btnAsset2" name="btnAsset2" >
               </span>
                </li>
                                                              
                        <li>
                          <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false"><strong><a href="www.google.com.pe/intl/es/analytics/" target="_blank">Codigo Google analytics</a></strong></label>	<br><br>
                           <a href="http://www.google.com.pe/intl/es/analytics/" target="new"></a>                             (para Agregar una nueva web deve ir a Administrador en el combo CUENTA desplegar y escoger Crear nueva cuenta) <br><br>
                      Para encontrar el código de seguimiento, el ID de seguimiento o el número de propiedad en la cuenta de Google Analytics:

Inicie sesión en su cuenta de Google Analytics y acceda a la página Administrador.
Seleccione una cuenta en el menú desplegable de la columna Cuenta.
Seleccione una propiedad en el menú desplegable de la columna Propiedad.
Haga clic en Información de seguimiento.<br><br>
                      <textarea name="canagoogle" cols="80" rows="15" id="canagoogle"  style="width:100%"><?=$row['canagoogle']?>
                      </textarea></li>                                               
                    </ul>
               </fieldset>	    
    </div></div>
    <!--  Fin Productos Google --> 
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
<?php } //  Fin While ?>
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
	bobexample.defaultExpanded(2) //expande el 0 y el 1
	bobexample.setPersist(false)
	bobexample.collapsePrevious(true) //Only one content open at any given time
	bobexample.init()
</script>
