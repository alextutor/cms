<?php
if ($_POST['idopera']=='1')
{
	echo "edasd";exit;
}
	$mensaje=$_GET['mensaje']; 
	include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
	   
	
	$codigo = $_SESSION['page'];
	
	$sql="SELECT * FROM pagemenu WHERE ccodpage = '" . $codigo . "' ";
	$rsPagemenu  = db_query($sql);

	
	$numeroRegistros=mysql_num_rows($rsPagemenu); 

  
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
		document.forms["adminForm<?php echo $iformulario ?>"].submit();
	} 	
</SCRIPT>

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
<?php 
while ($row = db_fetch_array($rsPagemenu))
{
	$iformulario = $iformulario +1;
?>
<div id="toolbar-box">
	<div class="m">
    	<div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-new">
            <a href="/webadmin/index.php?option=com_menus_new" onclick="" class="toolbar"><span class="icon-32-new"></span>Nuevo</a>
            </li>
            
            <li class="button" id="toolbar-edit">
            <a  onclick="if (document.adminForm<?php echo $iformulario ?>.boxchecked.value==0){alert('Por favor, primero haga una selección desde la lista');}else{ 
            document.forms['adminForm<?php echo $iformulario ?>'].task.value='com_menus_editar',
            document.forms['adminForm<?php echo$iformulario ?>'].submit() }" class="toolbar"><span class="icon-32-edit"></span>Editar</a></li>
            <li class="divider"></li>
            
            <li class="button" id="toolbar-trash">
                <a  onclick="if (document.adminForm<?php echo $iformulario ?>.boxchecked.value==0){alert('Por favor, primero haga una selección desde la lista');}else{
                document.forms['adminForm<?php echo $iformulario ?>'].task.value='com_menu_eliminar',
                 document.forms['adminForm<?php echo $iformulario ?>'].submit() }" class="toolbar">
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
         <div class="pagetitle icon-48-categories icon-48-content-categories"><h2>Gestor de menús: Menús</h2></div>            
    </div>
</div>


<div id="element-box">
	<div class="m">
    	<form action="/webadmin/procesar-accion.php" method="post" name="adminForm<?php echo $iformulario ?>" id="adminForm<?php echo $iformulario ?>">        
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
                        <th>cnomseccion</th>
                        <th>Orden</th>                       		
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
$iorden=0;
$sqlmenu  = db_query("SELECT * FROM seccionmenu sm, seccion s  WHERE sm.ccodseccion=s.ccodseccion and sm.ccodmenu='".$row['ccodmenu']."' order by sm.cordmenu ");
while ($rowmenu = db_fetch_array($sqlmenu))
{
	$iorden = $iorden +1;
	$save_orden = db_query("update seccionmenu set cordmenu='".$iorden."' where ccodseccion='".$rowmenu['ccodseccion']."' and ccodmenu='".$row['ccodmenu']."'");
?>                  

	<tr class="row0">	
    <td class="center">
     <input type="checkbox" id="cb0" name="cid[]" value="<?php echo $rowmenu['ccodseccion'].$rowmenu['ccodmenu'];?>" onclick="Joomla.isChecked(this.checked);" title="Casilla de selección para la fila 1">										
     </td>                      
	
    <td> <?php echo $rowmenu["cnomseccion"] ?></td>
    	
   <td class='colblancoend'>
    <input type="text" name="orden<?=$rowmenu['ccodmenu'].$iorden?>" id="orden<?=$rowmenu['ccodmenu'].$iorden?>" value="<?=$iorden?>"  size="5" maxlength="3"/> 
    <a onclick="javascript:ordenar('<?=$rowmenu['ccodseccion']?>','<?=$rowmenu['ccodmenu']?>','<?=$iorden?>');"  style="cursor:pointer">Orderna</a>
    </td>
                                              
</tr>   
<?php 
}//fin while 
?>
          
                 </tbody>
            </table>                                                       
        </form>
           </div>
</div>

<?php 
}//fin while 1 rsPagemenu
?>
<span id="resultado">0</span>

<script>
function ordenar(id,menu,fila)
{
	var campo = $('#orden'+menu+fila);
	var valora=fila;
	var valor = $('#orden'+menu+fila).val();
	if(!isNaN(valor))
	{
		$.post("http://www.gamatell.com/webadmin/mantenimiento/gestor-menu.php",{ idopera:'1',idsave:'1',idmenu:menu, idactual:fila, idorden:valor, idseccion:id },function(data){$("#resultado").html(data);})		
	}
	else{
		alert("por favor, ingrese solo valores numericos.");
		campo.attr('value',fila);
	}
	
}
</script>
<!--
http://www.forosdelweb.com/f18/faqs-php-530600/index3.html#post518710
http://www.blogdephp.com/foro/topic/eliminacion-multiple-de-registros-en-un-listado-con-php-y-mysql-utilizando-checkbox -->