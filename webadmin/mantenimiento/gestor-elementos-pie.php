<?php
	$mensaje=$_GET['mensaje']; 
	include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
	$criterio = " where estado=1 ";   
	$sql="SELECT * FROM elementos_pie ".$criterio; 
	$res=mysql_query($sql); 
	$numeroRegistros=mysql_num_rows($res); 

  if(!isset($orden)) 
    { 
       $orden="posicion";
    } 
	$sql="SELECT * FROM elementos_pie ".$criterio." ORDER BY ".$orden." ASC ";
	$columnas[] = 'titulo';
	$columnas[] = 'estado';
	$columnas[] = 'descripcion';
	$columnas[] = 'imagen';
	$columnas[] = 'orden';
	$columnas[] = 'posicion';		
	
	$nAncho[0] = '10%';
	$nAncho[1] = '1%';
	$nAncho[2] = '30%';
	$nAncho[3] = '10%';
	$nAncho[4] = '1%';
	$nAncho[5] = '1%';
	
	 include($_SERVER['DOCUMENT_ROOT'].'/webadmin/galeria-productos/paginator.class.php');  
                            $pages = new Paginator;
                            $pages->items_total = $numeroRegistros; //cuantos registros se mostraran
                            // Configuramos el total de links a mostrar. Por ejemplo el valor por defecto es 7 . Si estamos en la pág 50 mostraria : 47 47 49 50 51 52 53 
                            $pages->mid_range = 15; 
                            $pages->paginate();
                            $sql= $sql . " $pages->limit";
                            $res = mysql_query($sql) or die(mysql_error());
							
?>                
<SCRIPT LANGUAGE="JavaScript"> 
	function EliminaRegistro() { 
		document.forms["adminForm"].submit();
	} 
</SCRIPT>
<div id="toolbar-box">
	<div class="m">
    	<div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-new">
            <a href="/webadmin/index.php?option=com_elementos_pie_new" onclick="" class="toolbar"><span class="icon-32-new"></span>Nuevo</a>
            </li>
            
            <li class="button" id="toolbar-edit">
            <a  onclick="if (document.adminForm.boxchecked.value==0){alert('Por favor, primero haga una selección desde la lista');}else{ 
            document.forms['adminForm'].task.value='com_categories_editar',
            document.forms['adminForm'].submit() }" class="toolbar"><span class="icon-32-edit"></span>Editar</a></li>
            <li class="divider"></li>      

            <li class="button" id="toolbar-trash">
                <a  onclick="if (document.adminForm.boxchecked.value==0){alert('Por favor, primero haga una selección desde la lista');}else{
                document.forms['adminForm'].task.value='com_categories_eliminar',
                 document.forms['adminForm'].submit() }" class="toolbar">
                <span class="icon-32-trash">
                </span>
                Papelera
                </a>
            </li>
			<li class="divider"></li>              
                <li class="button" id="toolbar-cancel">
              <a href="/webadmin/index.php?option=pantallaprincipal"  class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
                </li>           
          
            </ul>
         </div>
         <div class="pagetitle icon-48-categories icon-48-content-categories"><h2>Gestor de Elementos: Pie</h2></div>            
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
    	<form action="/webadmin/procesar-accion.php" method="post" name="adminForm" id="adminForm">        
            <fieldset id="filter-bar">
                <div class="filter-search fltlft">
                    <label class="filter-search-lbl" for="filter_search">Filtro:</label>
                    <input type="text" name="filter_search" id="filter_search" value="" title="Buscar">
                    <button type="submit">Buscar</button>
                    <button type="button" onclick="document.id('filter_search').value='';this.form.submit();">Limpiar</button>
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
                
<?php 
while($registro=mysql_fetch_array($res)) {

 ?> 
	<tr class="row0">	
    <td class="center">
     <input type="checkbox" id="cb0" name="cid[]" value="<?php echo $registro['idelepie'];?>" onclick="Joomla.isChecked(this.checked);" title="Casilla de selección para la fila 1">										
     </td>                      
 <?php 	
	//$x=0;			   
	//foreach($columnas as $CampoProducto){
		//echo "<td width='".$nAncho[$x]."'>". $registro[$CampoProducto] ."</td>";						
		//$x++;		   
	//}
	 foreach($columnas as $CampoProducto){   
		if ($CampoProducto=="imagen") {
		  $imagen='"' . primera_imagen($registro[$CampoProducto]);								 
		  $cadena = $imagen;
		  $buscar = "alt";
		  $resultado = strpos($cadena, $buscar);//ubica donde esta ubicado el alt
		  $imagen=substr($cadena,0, $resultado);//quita el alt de la imagen
		  $longitud=strlen($imagen); 	
		  $imagen=substr($imagen,1,$longitud-1); //sustrae la 1 comilla "
		  $imagen=substr($imagen,0,$longitud-3); //sustrae las ultimas comillas"						  
		 echo "<td width='".$nAncho[$x]."'>". "<img src='timthumb.php?src=" .$imagen. "&h=80&w=80&zc=0&q=100&s=1' border=0 class='mgredondearesq'/>" ."</td>"; 
		} else {
		  echo "<td width='".$nAncho[$x]."'>". $registro[$CampoProducto] ."</td>";		
		} 
		$x++;								
	}								    
  ?> 
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