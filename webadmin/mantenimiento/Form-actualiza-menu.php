<?Php  session_start(); 
	  extract($_GET);
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/webadmin/header.php');   
   include($_SERVER['DOCUMENT_ROOT']. '/config.php');	           	
   	//submenu  principal=cabecera,pie,etc  1nivel=es el menu inicio,quienes somos,servicios  2nivel=debajo de servicios						
   //cuando es menu principal 
   switch ($submenu){   
		case "principal":  /* cabecera,pie,etc */
			$sql="select * from pagemenu  Where ccodmenu='".$id."'";
			$result=mysql_query($sql,$conexion);    
			$rsCategoria=mysql_fetch_array($result); 
			$cnombreMenu =$rsCategoria["cnommenu"];  
			break;
		case "1nivel":
		 	$sql="select * from seccion  Where ccodseccion='".$id."'";	
			$result=mysql_query($sql,$conexion);    
			$rsCategoria=mysql_fetch_array($result); 
			$cnombreMenu =$rsCategoria["cnomseccion"]; 
			break;
		case "2nivel":
			//falta completar alex
			break;
		
	}  
	$corden=$rsCategoria["cordcontenido"];    	
	//ejemplo de  substr
	 //rest = substr("abcdef", -1);    // devuelve "f"
   //substr("abcdef", 0, -1); // devuelve "abcde" 
   
   
	/*$ccodmenu=substr($id,-1);					 						
	$id=substr($id,0,-1);
	$result=mysql_query("select * from seccionmenu  Where ccodseccion='$id' and ccodmenu='$ccodmenu'  ",$conexion);       	   
	$rsCategoria=mysql_fetch_array($result);     
	$corden=$rsCategoria["cordmenu"];    */    
  ?>
<div id="toolbar-box">
	<div class="m">
        <div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-apply">
	            <a onclick="document.forms['adminForm'].submit();" class="toolbar"><span class="icon-32-apply"></span>Guardar</a>
            </li>
            <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=com_menus" onclick="" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-category-add icon-48-content-category-add"><h2>Gestor de menús: Editar menú</h2></div>
    </div>
    <div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
            <form action="/webadmin/mantenimiento/Actualiza-menu.php" method="get" name="adminForm" id="item-form" class="form-validate">
			<div class="width-60 fltlft">
               <fieldset class="adminform">
				<legend>Detalles</legend>
					<ul class="adminformlist">	
                    	<li>
                        <label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Nombre<span class="star">&nbsp;*</span></label>
                    	  <input type="text" name="cnombreMenu" id="cnombreMenu" 
                          value="<?=$cnombreMenu ?>" class="inputbox required" size="40" aria-required="true" required="required" />                              
						</li>
                      <li>  
                     <label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Ubicación <span class="star">&nbsp;*</span></label>
                     
                                     
                     <select id="cubimenu" name="cubimenu" class="inputbox" size="1" aria-invalid="false"> 
					 <?php 
                     $rsesweb = db_query("select * from webparametros where ccodparametro='0018' and ctipparametro='1'");
                    while($rowesweb = db_fetch_array($rsesweb)) {					                                    								
					  if( $rowesweb['cvalparametro']==$rsCategoria['cubimenu']) { //lo puse porque en fin
						   $selected=' selected';
					  }else{
						   $selected='';	   
					   }					  							
					   echo '<option value="'.$rowesweb['cvalparametro'].'" '. $selected .' >'.$rowesweb['cnomparametro'].'</option>';		 
                        }//fin while						
                     ?>                                 
                    </select>
                     (solo implemente para submenu principal,ver si ocultarlo para 1nivel,2nivel)
                      </li>
                    	<li>
                        <label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Orden <span class="star">&nbsp;*</span></label>
                        <input type="text" name="cordmenu" id="cordmenu" value="<?php echo trim($corden); ?>" class="inputbox required" size="40" aria-required="true" required="required"></li>                       
                          <li>
                        
                          <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Mostrar en Portada</label>
                     <select id="mostrarportada" name="mostrarportada" class="inputbox" size="1" aria-invalid="false">                     
        <option value="SI" <?php if( $rsCategoria['mostrarportada']=="SI") echo " selected='selected'"  ?>>SI</option>
        <option value="NO" <?php if( $rsCategoria['mostrarportada']=="NO") echo " selected='selected'"  ?>>NO</option>                       </select>
                          <strong>(Solo para Ubicacion: Columna Derecha y Izquierda)</strong>
                        </li>
                        
                        <li>
                          <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Borrar</label>
                          <input name="despublicar" type="checkbox" id="despublicar" value="1" />
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
           		 <input type="hidden" name="id" value="<?php echo $id?>" />	
                 <input type="hidden" name="ccodmenu" value="<?php echo $ccodmenu?>" />	
                  <input type="hidden" name="submenu" value="<?php echo $submenu?>" />	
                 <input type="hidden" name="enviar" value="Enviar" />
            </form>
           	<!--FIN Formulario -->
            <div class="clr"></div>
      	  </div>
        <div class="clr"></div>
    </div>    
</div>
<script type="text/javascript">
   window.onload= function(){
		   document.adminForm.cordmenu.focus()
	   }
</script>