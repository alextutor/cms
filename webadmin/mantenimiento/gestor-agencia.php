<?php session_start();  
	$mensaje=$_GET['mensaje']; 
	$stylo="1";
	$VAR_NROITEMS="30";// verificar alex le puse el $ y le asigne 30 porque no se donde toma el valor y se declara 
	
if ($_POST['idbuscar']=='1')
{
	//ob_start();
	//session_start();		
	$palabra = $_POST['idpalabra'];
	$fecha   = $_POST['idfecha'];
	$item    = $_POST['iditems'];
	$pag     = $_POST['idpagina'];
	$pagew    = $_POST['idpage'];
	$_SESSION['page']=$_POST['idpage'];

}
else
{
	$palabra = "";
	$fecha   = "";
	$item    = $VAR_NROITEMS;
	$pag      =1;
	$pagew    =$_SESSION['page'];
}
	include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
	
		$row_campo = " ";
		$row_tabla = " ";
		$row_condi = " ";
		if($palabra != '' ) 
		{
			$row_query .= " and s.cnomsucursal = '".$palabra."'";
		}
		
		if($fecha != '' ) 
		{
			$row_query .= " and s.dfecsucursal = '".fechaymd($fecha)."'";
		}
		$sql = "SELECT s.*,p.cnompage FROM pagesucursal s, page p where s.ccodpage=p.ccodpage and s.ccodpage='".$pagew."'  ".$row_query." order by s.ccodsucursal desc";
		
	$res=mysql_query($sql); 
	$numeroRegistros=mysql_num_rows($res);
  if(!isset($orden)) 
    { 
       $orden="orden";
    } 	
	
	 
	$columnas[] = 'cnomsucursal';
	$columnas[] = 'cdiroficina';	
	$columnas[] = 'cnompage';	
		
	$nAncho[0] = '200px;';
	$nAncho[1] = '10%';	

	 include($_SERVER['DOCUMENT_ROOT'].'/webadmin/galeria-productos/paginator.class.php');  
                            $pages = new Paginator;
                            $pages->items_total = $numeroRegistros; //cuantos registros se mostraran
                            // Configuramos el total de links a mostrar. Por ejemplo el valor por defecto es 7 . Si estamos en la pág 50 mostraria : 47 47 49 50 51 52 53 
                            $pages->mid_range = 15; 
							//$pages->items_per_page=15; //cuantos registros se mostraran
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
            <a href="/webadmin/index.php?option=com_agencia_new" onclick="" class="toolbar"><span class="icon-32-new"></span>Nuevo</a>
            </li>
            
            <li class="button" id="toolbar-edit">
            <a  onclick="if (document.adminForm.boxchecked.value==0){alert('Por favor, primero haga una selección desde la lista');}else{ 
            document.forms['adminForm'].task.value='com_agencia_editar',
            document.forms['adminForm'].submit() }" class="toolbar"><span class="icon-32-edit"></span>Editar</a></li>              
           
            <li class="divider"></li>
            <li class="button" id="toolbar-trash">
                <a  onclick="if (document.adminForm.boxchecked.value==0){alert('Por favor, primero haga una selección desde la lista');}else{
                document.forms['adminForm'].task.value='com_agencia_eliminar',
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
           <h2>Gestor de Agencias: Agencia</h2></div></div></div><div id="system-message-container">
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
         <input type="checkbox" id="cb0" name="cid[]" value="<?php echo $registro['ccodsucursal'];?>" onclick="Joomla.isChecked(this.checked);" title="Casilla de selección para la fila 1">										
         </td>         
         <td width="<?=$nAncho[$x]?>">
		 <a href='/webadmin/index.php?option=com_agencia_editar&id=<?=$registro['ccodsucursal']?>'><?=$registro['cnomsucursal']?></a>
         </td>                             
         <td width="<?=$nAncho[$x]?>"><?=$registro['cdiroficina']?></td> 
         <td width="<?=$nAncho[$x]?>"><?=$registro['cnompage']?></td>                             
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
        
                </div>
                
        </form>
           </div>
</div>
<!--
http://www.forosdelweb.com/f18/faqs-php-530600/index3.html#post518710
http://www.blogdephp.com/foro/topic/eliminacion-multiple-de-registros-en-un-listado-con-php-y-mysql-utilizando-checkbox -->