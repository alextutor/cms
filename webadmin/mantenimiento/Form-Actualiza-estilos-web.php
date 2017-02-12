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
$sqlesweb = "SELECT
    estilopagina.*
    , page.ccodpage
    , page.camipage   
	FROM    page
    INNER JOIN estilopagina 
        ON (page.ccodpage = estilopagina.ccodpage)
	WHERE (page.ccodpage ='" .$_GET['id']."')";	
	
$rsesweb    = db_query($sqlesweb);
while ($row = db_fetch_array($rsesweb))
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
          <a href="/webadmin/index.php?option=com_estilos_web" onClick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-article-add">
           <h2>Gestor de Estilos Web: Actualiza Estilos web</h2></div></div><div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
            <form action="/webadmin/mantenimiento/Actualiza-estilos-web.php" method="post" name="adminForm" id="adminForm" class="form-validate"
             onSubmit="return validar_form(this)">
                <input type="hidden" name="id" id="id" value="<?=$_GET['id']?>">
			<div class="width-60 fltlft">
               <fieldset class="adminform">
				<legend>Datos Empresa</legend>
					<ul class="adminformlist">	
                    	<li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Pagina <span class="star">&nbsp;*</span></label>
                    	  <input name="cnikpage" type="text" disabled id="cnikpage" value="<?=$row['cnikpage']?>"  size="60" maxlength="150" >
                   	  </li>
                                            
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title=""><span class="colgrishome">URL Pagina</span><span class="star">&nbsp;*</span></label>
                        <input name="camipage" type="text" disabled id="camipage" value="<?=$row['camipage']?>"  size="60" maxlength="150" >
                        </li>                                                             
                                                
                                    
                        
                        <li>
                        <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Estilo Web</label>	                          
                         
                         <?php //echo $row['webestilo'];exit;?>   
                  <select id="webestilo" name="webestilo" class="inputbox" size="1" aria-invalid="false"> 
						 <?php 
						 $rsesweb = db_query("select * from webparametros where ccodparametro='0017' and ctipparametro='1'");
						 
						   while($rowesweb = db_fetch_array($rsesweb)) 
                        	{					                                    								
				  if( $rowesweb['cvalparametro']==$row['webestilo']) {
					   $selected=' selected';
				  }else{
					   $selected='';	   
				   }					  							
                   echo '<option value="'.$rowesweb['cvalparametro'].'" '. $selected .' >'.$rowesweb['cnomparametro'].'</option>';		 
                        	}//fin while						
						 ?>                                 
                    </select> 
    	                </li>                                         
                       
                    </ul> 
                </fieldset>
                
                      <!-----------------------Inicio -------------------------------------------->
                <fieldset class="adminform">
				<legend>Contactos</legend>
					<ul class="adminformlist">									
                                                                                     
                    </ul>
                </fieldset> 
                  <!-----------------------Fin -------------------------------------------->         
             </div>
           <div class="width-40 fltrt">
           		<div id="content-sliders-" class="pane-sliders">
                
       <div class="panel">
  <h3 id="bobcontent1-title" class="handcursor">Configuracion<strong> Assetmanager</strong>  (webadmin\editor\assetmanager)
     </h3>
  <div id="bobcontent1" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
    <fieldset class="panelform">
                	<ul class="adminformlist">	
	                       <li><span class="colgrishome"><strong>Carpeta Recursos:</strong></span><span class="colblancocen"> 
	                         <input type="text" name="sBaseVirtual0" id="sBaseVirtual0" size="40"  maxlength="100" value="<?=$row['sBaseVirtual0']?>" class="box400">                        
                           (<strong>sBaseVirtual0</strong>)<br>
	                       </span></li>
	                       <li><strong>Ruta Real:</strong> 
	                         <input type="text" name="sBase0" id="sBase0" size="60"  maxlength="150" value="<?=$row['sBase0']?>" class="box400"> 
	                         (<strong>sBase0</strong>)</li>
	                       <li><strong>Nombre Titulo:</strong><input type="text" name="sName0" id="sName0" size="50"  maxlength="100" value="<?=$row['sName0']?>" class="box400"> 
	                         (<strong>sName0</strong>)<br>
	                         <br>
	                       </li>
                           una vez definido deves salir y volver a entrar al webadmin   
       	          </ul>
               </fieldset>	    
  </div></div>
    
        <!--  Inicio  Grupo Redes sociales  -->
    <div class="panel">
  <h3 id="bobcontent2-title" class="handcursor">Opciones Redes Sociales</h3> 
  <div id="bobcontent2" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	
                                 
                    </ul>
               </fieldset>	    
    </div></div>
    <!--  Fin GRupo Redes Sociales --> 
             <!--------------------------------------------------> 
             
             
                     <!--  Inicio  Productos Google  -->
    <div class="panel">
  <h3 id="bobcontent3-title" class="handcursor">Opciones Productos Google</h3> 
  <div id="bobcontent3" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	
                                   
                    </ul>
               </fieldset>	    
    </div></div>
    <!--  Fin Productos Google --> 
             
  <!--  Inicio  Grupo Imagen  -->
  <div class="panel">
  <h3 id="bobcontent4-title" class="handcursor">Opciones Imagen</h3> 
  <div id="bobcontent4" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	
                         <li><strong>Libreria Galeria Imagen:</strong>                          
       <select id="galeria_imagen" name="galeria_imagen" class="inputbox" size="1" aria-invalid="false">
         <option value="PhotoSwipe" <?php if( $row['galeria_imagen']=="PhotoSwipe") echo " selected='selected'"  ?>>PhotoSwipe</option>
        <option value="Shadowbox" <?php if( $row['galeria_imagen']=="Shadowbox") echo " selected='selected'"  ?>>Shadowbox</option>      </select>                      
                 <!--aqui dependiendo llama  a /modulos/listado-horizontal-foto-contenido-photoswipe.php
                 0 /modulos/listado-horizontal-foto-contenido.php (Shadowbox) -->    
                      </li>         
                    </ul>
               </fieldset>	    
    </div></div>
    <!--  Fin Grupo Imagen --> 
 
  <!--  Inicio  Estilo Menu  -->
  <div class="panel">
  <h3 id="bobcontent5-title" class="handcursor">Estilo Menu</h3> 
  <div id="bobcontent5" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	
                         <li><strong>Estilo Menu:</strong>  
                <select id="menuestilomenu" name="menuestilomenu" class="inputbox" size="1" aria-invalid="false"> 
                  <?php 
					 $rs_menuEstilos = db_query("select * from webparametros where ccodparametro='0020' and ctipparametro='1'");				 
				   while($row_menuEstilos= db_fetch_array($rs_menuEstilos)) 
				   {					                                    								
					  if( $row_menuEstilos['cvalparametro']==$row['menuestilomenu']) {
						   $selected=' selected';
					  }else{
						   $selected='';	   
					   }					  							
					   echo '<option value="'.$row_menuEstilos['cvalparametro'].'" '. $selected .' >'.$row_menuEstilos['cnomparametro'].'</option>';		 
                      	}//fin while						
					 ?>                                 
                    </select>              
                      </li>  
                     <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title=""><strong>Mostrar Url padre</strong></label>		                       
                      <select id="mostrarurlcatebase" name="mostrarurlcatebase" class="inputbox" size="1" aria-invalid="false">
                          <option value="SI"<?php if( $row['mostrarurlcatebase']=="SI") echo " selected='selected'"  ?>>SI</option>                           
                          <option value="NO"  <?php if( $row['mostrarurlcatebase']=="NO") echo " selected='selected'"  ?>>NO</option>                           
                        </select>                                      	                      
                      </li>       
                      <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title=""><strong>Mostrar Menu 1Nivel Mayuscula/Minuscula</strong></label>		                          <select id="menu_1Nivel_Mayuscula_Minuscula" name="menu_1Nivel_Mayuscula_Minuscula" class="inputbox" size="1" aria-invalid="false">
                          <option value="Mayuscula"<?php if( $row['menu_1Nivel_Mayuscula_Minuscula']=="Mayuscula") echo " selected='selected'"  ?>>Mayuscula</option>                          <option value="Minuscula"  <?php if( $row['menu_1Nivel_Mayuscula_Minuscula']=="Minuscula") echo " selected='selected'"  ?>>Minuscula</option>                          </select>                                      	                      
                      </li>   
                    </ul>
               </fieldset>	    
    </div></div>
<!--  Fin Estilo Menu --> 
 
 
                      
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
	bobexample.defaultExpanded(3,4) //expande el 0 y el 1
	bobexample.setPersist(false)
	bobexample.collapsePrevious(true) //Only one content open at any given time
	bobexample.init()
</script>

