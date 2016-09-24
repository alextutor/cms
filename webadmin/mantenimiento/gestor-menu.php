<?php session_start();
	$mensaje=$_GET['mensaje']; 
	include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
	$codigo = $_SESSION['page'];	
	//submenu  principal=cabecera,pie,etc  1nivel=es el menu inicio,quienes somos,servicios  2nivel=debajo de servicios						
?>                
<SCRIPT LANGUAGE="JavaScript"> 
	function EliminaRegistro() { 
		document.forms["adminForm"].submit();
	} 	
</SCRIPT>
<style>
	/*ver tabla pagemenu deve ser igual al campo cnommenu*/
	.pagemenu{color:#0b98e3; font-weight:bold;}
	.Cabecera{color:#0b98e3; font-weight:bold;}
	.Pie{color:#26bd5a; font-weight:bold;}
	.Servicios{color:#a14829; font-weight:bold;}
	.sub_1{	color:#F00;}
</style>
<div id="toolbar-box">
	<div class="m">
    	<div class="toolbar-list" id="toolbar">
            <ul>
			<li class="button" id="toolbar-new">
            <a href="/webadmin/index.php?option=com_menus_new" onclick="" class="toolbar"><span class="icon-32-new"></span>Nuevo</a>
            </li>
            
            <li class="button" id="toolbar-edit">
            <a  onclick="if (document.adminForm.boxchecked.value==0){alert('Por favor, primero haga una selección desde la lista');}else{ 
            document.forms['adminForm'].task.value='com_menus_editar',
            document.forms['adminForm'].submit() }" class="toolbar"><span class="icon-32-edit"></span>Editar</a> (FALTA IMPLEMENTAR)</li>
            <li class="divider"></li>
            
            <li class="button" id="toolbar-trash">
                <a  onclick="if (document.adminForm.boxchecked.value==0){alert('Por favor, primero haga una selección desde la lista');}else{
                document.forms['adminForm'].task.value='com_menu_eliminar',
                 document.forms['adminForm'].submit() }" class="toolbar">
                <span class="icon-32-trash">
                </span>
                Papelera
                </a>
             (FALTA IMPLEMENTAR)</li>

            <li class="divider"></li>
            <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=pantallaprincipal" onclick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>

            </ul>
         </div>
         <div class="pagetitle icon-48-categories icon-48-content-categories"><h2>Gestor de menús: Menús</h2></div>            
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
						 	$columnas[] = 'cnomseccion';
							$columnas[] = 'Ubicación';
							$columnas[] = 'cordmenu';	
							
							$nAncho[0] = '10%';
							$nAncho[1] = '30%';	
							$nAncho[2] = '30%';	
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
                          //  echo "<br/><center><div id='conte_paginacion'> " . $pages->display_pages()  ."<span class=\"\">".$pages->display_jump_menu().$pages->display_items_per_page()."</span></div></center><br/>";
                            ?>
        
        <input type="hidden" name="limitstart" value="0">
        </div></div>				</td>
                    </tr>
                </tfoot>
                <tbody>               
                
<?php 	
	$sql1="select * from pagemenu";	
	$res1=mysql_query($sql1); 
	$nro1=mysql_num_rows($res1);
	
while($row1=mysql_fetch_array($res1)) {  //Inicio While 1			
 ?> 
<tr class="row0">	
    <td class="center">
     <input type="checkbox" id="cb0" name="cid[]" value="<?php echo $row1['ccodmenu'];?>" onclick="Joomla.isChecked(this.checked);" title="Casilla de selección para la fila 1">	       
     </td>                     
     <td width="<?=$nAncho[$x]?>"><?=$espacio?>
        <a href='/webadmin/index.php?option=com_menus_editar&submenu=principal&id=<?=$row1['ccodmenu'];?>'>
		<span class="<?=$row1['cnommenu']?>"><?=$row1['cnommenu']?></span></a></td> 
    <td width="<?=$nAncho[$x]?>"><span class="<?=$row1['cnommenu']?>"><?=$row1['cubimenu']?></span></td> 
      <td width="<?=$nAncho[$x]?>"><span class="<?=$row1['cnommenu']?>"><?=$row1['cmenuorden']?></span></td>                                       
</tr>          	
<?php 		
	$sql2="SELECT s.ccodseccion,s.cnomseccion,s.camiseccion, s.curlseccion,s.ctipseccion,s.cordcontenido,
  su.cordmenu,s.cnivseccion,su.ccodmenu,pm.cnommenu FROM  seccion s, seccionmenu  su,
   pagemenu pm WHERE s.ccodseccion=su.ccodseccion AND su.ccodmenu = pm.ccodmenu   
   AND s.ccodpage='".$codigo."' AND su.ccodmenu='" . $row1['ccodmenu'] . "' and s.cnivseccion=1 AND  
   s.estado='1'   ORDER BY su.ccodmenu ASC , su.cordmenu ASC";
   	$rs2=mysql_query($sql2); 
	$nro2=mysql_num_rows($rs2); 
		
	while($row2=mysql_fetch_array($rs2)) {  //Inicio While 2
		$codsec= substr($row2['ccodseccion'],0,12);  // Utilizado en while 2 para los sub-secciones
		$linea = $linea + 1;	
		if ($row2['cnivseccion']=='1') $espacio2="&nbsp;&nbsp;&nbsp;";
?>
	  <tr class="row0">	
            <td class="center">
             <input type="checkbox" id="cb0" name="cid[]" value="<?php echo $row2['ccodseccion'];?>" onclick="Joomla.isChecked(this.checked);" title="Casilla de selección para la fila 1">										
             </td>   
            <td width="<?=$nAncho[$x]?>"><?=$espacio2?>
            <a href='/webadmin/index.php?option=com_menus_editar&submenu=1nivel&id=<?=$row2['ccodseccion'];?>&ccodmenu=<?=$row2['ccodmenu'];?>'><span class="<?=$row2['cnommenu']?>"><?=$row2['cnomseccion']?></span></a></td>                   
            <td width="<?=$nAncho[$x]?>"><span class="<?=$row2['cnommenu']?>"><?=$row2['cnommenu']?></span></td>
            <td width="<?=$nAncho[$x]?>"><span class="<?=$row2['cnommenu']?>"><?=$row2['cordmenu']?></span></td> 
        </tr>
<?php		
  if ($row1['cnommenu']<>"Pie"){	//Inicio si 1  no se muestra subniveles si es pie 
	  $sql3 = "SELECT s.ccodseccion,s.cnomseccion,s.camiseccion, s.curlseccion,s.ctipseccion,s.cnivseccion,s.cordcontenido FROM  seccion s WHERE s.ccodseccion like '".$codsec. "%' and s.ccodpage='".$codigo."' and s.cnivseccion=2 and  s.estado='1'   ORDER BY s.cordcontenido ASC"; 										
		//echo $sql3_query;exit;
		
		$rs3 = db_query($sql3);
		while($row3 = db_fetch_array($rs3)) ////// Inicio while 3		
		{	
			$linea = $linea + 1;
			if ($row3['cnivseccion']=='2') $espacio3="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";	
				//echo $row3['ccodseccion']."--------------------";exit;		
		?>
         <tr class="row0">	
            <td class="center">
             <input type="checkbox" id="cb0" name="cid[]" value="<?php echo $row3['ccodseccion'];?>" onclick="Joomla.isChecked(this.checked);" title="Casilla de selección para la fila 1">										
             </td>   
            <td width="<?=$nAncho[$x]?>"><?=$espacio3?>
            <a href='/webadmin/index.php?option=com_menus_editar&submenu=2nivel&id=<?=$row3['ccodseccion'];?>'><span class="sub_1"><?=$row3['cnomseccion']?></span></a></td>                   
            <td width="<?=$nAncho[$x]?>"><span class="sub_1"><?=$row3['cnommenu']?></span></td>
            <td width="<?=$nAncho[$x]?>"><span class="sub_1"><?=$row3['cordmenu']?></span></td> 
        </tr>
        
        <?php	
		} // -- Fin while 3
  }//Fin si 1  no se muestra subniveles si es pie 
	} // -- Fin while 2
}//---fin while 1
?>
              
                 </tbody>
            </table>                           
            <div>
                <input type="hidden" name="extension" value="com_content">
                <input type="hidden" name="task" value="">                
                <input type="hidden" name="boxchecked" value="0">
                <input type="hidden" name="filter_order" value="a.published">
                <input type="hidden" name="filter_order_Dir" value="asc">                            
             </div>                
        </form>
           </div>
</div>