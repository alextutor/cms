<?php session_start(); 
	$cfiltro=$_GET['cfiltro']; 	
		
	include($_SERVER['DOCUMENT_ROOT']. '/config.php');		
	include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/mis-funciones.php');

	if ($cfiltro<>"") {		
	}else{
		//campo estado = campo cesthome
		$sql="SELECT cnomhome,CONCAT(nancho,' x ',nalto) as tamano,cordpublica,cubidestino,ctiphome,ccodinicio,estado 
		 from pagehome ".$criterio; 	}				
	$res=mysql_query($sql); 
	//echo $sql;exit;
	$numeroRegistros=mysql_num_rows($res);
  if(!isset($orden)) 
    { 
       $orden="orden";
    } 	
	//echo $sql;exit;	 
	$columnas[] = 'cnomhome';	
	$columnas[] = 'tipo_contenido';
	$columnas[] = 'Ubicación';
	$columnas[] = 'tamano';
	$columnas[] = 'cordpublica';
	$columnas[] = 'Publicado';
	
	$nAncho[0] = '20%';
	$nAncho[1] = '10%';
	$nAncho[2] = '10%';
	$nAncho[3] = '10%';
	$nAncho[4] = '10%';
	$nAncho[5] = '10%';
	
	 $ipp=30;
	 include($_SERVER['DOCUMENT_ROOT'].'/webadmin/galeria-productos/paginator.class.php');  
                            $pages = new Paginator;
                            $pages->items_total = $numeroRegistros; //cuantos registros se mostraran
                            // Configuramos el total de links a mostrar. Por ejemplo el valor por defecto es 7 . Si estamos en la pág 50 mostraria : 47 47 49 50 51 52 53 
                            $pages->mid_range = 20; 
							//$pages->items_per_page=15; //cuantos registros se mostraran
                            $pages->paginate();							
                            $sql= $sql . " $pages->limit";
                            $res = mysql_query($sql) or die(mysql_error());
							
?>                
<SCRIPT LANGUAGE="JavaScript"> 
	function EliminaRegistro() { 
		document.forms["adminForm"].submit();
	} 
	/*para el boton buscar*/
	function validacion() {
		valor = document.getElementById("filter_search").value;
		if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
		  return false;
		}
	} 
	
	function limpiar() {
		location.href='/webadmin/index.php?option=com_presentacion';
	} 		
</SCRIPT>
<!--las imagenes estan en mis-estilos-webadmin.php -->
<div id="toolbar-box">
	<div class="m">
    	<div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-new">
            <a href="/webadmin/index.php?option=com_presentacion_new" onclick="" class="toolbar"><span class="icon-32-new"></span>Nuevo</a>
            </li>
            
            <li class="button" id="toolbar-edit">
            <a  onclick="if (document.adminForm.boxchecked.value==0){alert('Por favor, primero haga una selección desde la lista');}else{ 
            document.forms['adminForm'].task.value='com_presentacion_editar',
            document.forms['adminForm'].submit() }" class="toolbar"><span class="icon-32-edit"></span>Editar</a>
            </li> 
            
            <li class="divider"></li>
            <li class="button" id="toolbar-trash">
                <a  onclick="if (document.adminForm.boxchecked.value==0){alert('Por favor, primero haga una selección desde la lista');}else{
                document.forms['adminForm'].task.value='com_presentacion_eliminar',
                 document.forms['adminForm'].submit() }" class="toolbar">
                <span class="icon-32-trash">
                </span>
                Papelera
                </a>
            </li>
            <li class="divider"></li>
             <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=pantallaprincipal" onclick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>
            
            </ul>
         </div>
         <div class="pagetitle icon-48-article">
           <h2>Gestor de Presentacion: Contenido en la Presentacion</h2></div>            
    </div>
</div>
<div id="system-message-container">
	<?php 
		if($mensaje!="") { 
		?>
    <dl id="system-message">
        <dt class="message">Mensaje</dt>
        <dd class="message message">
            <ul>
                <li><?php echo $mensaje ?></li>
            </ul>
        </dd>
    </dl>
	<?php	   
		} 
	?>	
</div>
<div id="element-box">
	<div class="m">
    	<form action="/webadmin/procesar-accion.php" method="post" name="adminForm" id="adminForm" onsubmit="return validacion()">        
            <fieldset id="filter-bar">
                <div class="filter-search fltlft">
                    <label class="filter-search-lbl" for="filter_search"><strong>Filtro&nbsp;&nbsp;:&nbsp;&nbsp;</strong></label>
                    <input name="filter_search" type="text" id="filter_search" title="Buscar" value="" size="40">
                    <button type="submit">Buscar</button>

                    <button type="button" onClick="limpiar();">Limpiar</button>
               
                    
                </div>
        
                <div class="filter-select fltrt">
                    <select name="filter_level" class="inputbox" onchange="this.form.submit()">
                        <option value="">- Seleccionar niveles máximos -</option>
                        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3" selected="selected">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
                    </select>
        
                    <select name="filter_published" class="inputbox" onchange="this.form.submit()">
                        <option value="">- Seleccionar estado -</option>
                        <option value="1" selected="selected">Publicado</option>
        <option value="0">Despublicado</option>
        <option value="2">Archivado</option>
        <option value="-2">Movido a la papelera</option>
        <option value="*">Todos</option>
                    </select>
        
                    <select name="filter_access" class="inputbox" onchange="this.form.submit()">
                        <option value="">- Seleccionar acceso -</option>
                        <option value="1">Public</option>
        <option value="2">Registered</option>
        <option value="3">Special</option>
                    </select>
        
                    <select name="filter_language" class="inputbox" onchange="this.form.submit()">
                        <option value="">- Seleccionar idioma -</option>
                        <option value="*">Todos</option>
        <option value="en-GB">English (UK)</option>
                    </select>
                </div>
            </fieldset>
            <div class="clr"> </div>
        
            <table class="adminlist">
                <thead>
                    <tr>
                        <th width="1%">
                            <input type="checkbox" name="checkall-toggle" value="" title="Marcar todo" onclick="Joomla.checkAll(this)">
                        </th>
                         <?php
	                         foreach($columnas as $CampoProducto){								 									
								   echo "<th>". $CampoProducto ."</th>";										
							 }  						
							?>                     
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="15">
                            <div class="container"><div class="pagination">        				
							<?php                                                       
                            echo "<br/><center><div id='conte_paginacion'> " . $pages->display_pages()  ."<span class=\"\">".$pages->display_jump_menu().$pages->display_items_per_page()."</span></div></center><br/>";
                            ?>
        
        <input type="hidden" name="limitstart" value="0">
        </div></div>				</td>
                    </tr>
                </tfoot>
                <tbody>                
<?php while($registro=mysql_fetch_array($res)) { ?> 
	<tr class="row0">	
        <td class="center">
         <input type="checkbox" id="cb0" name="cid[]" value="<?php echo $registro['ccodinicio'];?>" onclick="Joomla.isChecked(this.checked);" title="Casilla de selección para la fila 1">										
         </td>         
         <td width="<?=$nAncho[$x]?>">
		 <a href='/webadmin/index.php?option=com_presentacion_editar&id=<?=$registro['ccodinicio']?>'>
         <?php  if ($registro['estado']==-2){  //Eliminado   
		           echo "<div class='art_borrado'>".$registro['cnomhome']."</div>";
		  		}else {
		 			echo "<div class='art_normal'>".$registro['cnomhome'] ."</div>" ;  
                }
         ?>                  
		 </a>
         </td>        
         <td width="<?=$nAncho[$x]?>" align="center"> 
         <?php
		  //tipo_contenido      
		$tipo = $registro['ctiphome'];		
		switch($tipo)
			{
			case  1:
			$tiposec="Imagen";
			break;
			case  2:
			$tiposec="Flash";
			break;
			case  3:
			$tiposec="Html";
			break;
			case  4:
			$tiposec="Items";
			break;
			case  5:
			$tiposec="Slider";
			break;
			case  6:
			$tiposec="Popup";
			break;
		}		
		echo $tiposec;		
	  ?>        
      </td>  
      <td width="<?=$nAncho[$x]?>" align="left">
      <?php
	  	  //Ubicación	         
		  $ubica_sql  =mysql_query("SELECT * FROM webparametros where ccodparametro='0004' and ctipparametro='1' and cvalparametro='".          $registro['cubidestino']."' ");
		  $rowu  = mysql_fetch_array($ubica_sql);
		  $Ubicación=$rowu['cnomparametro']; 
		  echo $Ubicación;
	  ?>
      </td> 
      <td width="<?=$nAncho[$x]?>" align="center"><?=$registro['tamano'] ?></td> 
      <td width="<?=$nAncho[$x]?>" align="center"><?=$registro['cordpublica'] ?></td>                     
      <td width="<?=$nAncho[$x]?>" align="center">
      <?php 	  
	   switch ($registro['estado']) {
		  case 1: //Publicado
			  echo "<img src='./imagen/imagefiles-check_sign_icon_light_green.png' width='20' height='20' />";
			  break;
		  case 2: //despublicado
			  echo "<img src='./imagen/imagefiles-check_sign_icon_red2.png' width='20' height='20' />";
			  break;
		  case -2: //eliminado
			  echo "<img src='./imagen/papelera_rojo.png' width='20' height='20' />";
			  break;	
		  case 3: //Archivado
			  echo "<img src='./imagen/archivo-50x50.png' width='20' height='20' />";
			  break;		  		  	    		
	   }		 
	  ?>
     </td>                           
	</tr>   
<?php 
	}//fin while 
?>              
	   </tbody>
  </table>                           
<div>
  <input type="hidden" name="extension" value="com_content">
  <input type="hidden" name="task" value="">
  <input type="hidden" name="boxchecked" value="0">
  <input type="hidden" name="filter_order" value="a.published">
  <input type="hidden" name="filter_order_Dir" value="asc">
  <input type="hidden" name="original_order_values" value="1">
  <input type="hidden" name="458c3a2e74a4456efb49c61f593f3c41" value="1">      
</div>
	  
</form>
 </div>
</div>
<!--
http://www.forosdelweb.com/f18/faqs-php-530600/index3.html#post518710
http://www.blogdephp.com/foro/topic/eliminacion-multiple-de-registros-en-un-listado-con-php-y-mysql-utilizando-checkbox -->
<style type="text/css">
	.art_borrado{font-weight:bold;text-decoration: line-through;color:#F00;}
	.art_normal{font-weight:bold;}
</style>
