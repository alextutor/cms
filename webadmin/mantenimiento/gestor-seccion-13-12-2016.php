<?php	session_start(); 
	$mensaje=$_GET['mensaje']; 
	$selectpage  = $_SESSION['selectpage']; //"12172806";
	include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
	$criterio = " where estado=1"; 
	
	$cBuscaporidSeccion=$_GET['cBuscaporidSeccion'];  
	$cBuscaporidSeccion2=$_GET['cBuscaporidSeccion2'];  
	//echo $cBuscaporidSeccion;exit;

	//$sql="SELECT * FROM productos ".$criterio; 	
	
	  // Inicio si el usuario no es administrador esconde los registros borrados	
	if($_SESSION['nivel']=='ADMINISTRADOR'){$cfiltronivel="";}
	else{$cfiltronivel=" s.estado<>-2 and ";}	
	
	//echo $cfiltronivel;exit;
	/*$sql = "SELECT s.*,m.cnommodulo FROM  seccion s, webmodulos m where s.ccodpage='". $selectpage ."' and  s.ccodmodulo=m.ccodmodulo and s.cnivseccion='1' and s.estado!='-2' order by s.cnomseccion";
	*/

/*	$sql = "SELECT s.*,m.cnommodulo FROM  seccion s, webmodulos m where s.ccodpage='". $selectpage ."' and  s.ccodmodulo=m.ccodmodulo and s.cnivseccion='1' order by s.cordcontenido";
*/

// solo listar Cabecera=1  ( seccionmenu.ccodmenu=1 )
if ($cfiltro=="" and $cBuscaporidSeccion=="") {
	  $sql ="SELECT
    s.cnomseccion
    , s.estado
	, s.ctipseccion
    , s.cnivseccion
    , s.ccodseccion
    , s.cordcontenido	
    , webmodulos.cnommodulo
    , IF((seccionmenu.ccodmenu IS NULL), 'Nada', seccionmenu.ccodmenu) AS ccodmenu 
    , IF((pagemenu.cnommenu IS NULL), 'Nada', pagemenu.cnommenu) AS cnommenu 
  FROM
    webmodulos
    INNER JOIN seccion s 
        ON (webmodulos.ccodmodulo = s.ccodmodulo)
    LEFT JOIN seccionmenu 
        ON (s.ccodseccion = seccionmenu.ccodseccion)
    LEFT JOIN pagemenu 
        ON (seccionmenu.ccodmenu = pagemenu.ccodmenu)
WHERE ".$cfiltronivel ." (s.cnivseccion =1 AND (seccionmenu.ccodmenu=1 OR seccionmenu.ccodmenu IS NULL)) 
  order by pagemenu.cnommenu,s.cordcontenido asc ";	 
}	
//echo  $sql."";exit;
	//seccionmenu.ccodmenu <> 3 cambiado alex por el de abajo 
	//ccodmenu=1 OR seccionmenu.ccodmenu=5   solo listar Cabecera=1
	// (no muestra pie=3 y otro menu creado ejemplo menu lateral Servicios=10)
	//echo $sql; exit;//muestra el menu nivel 1
	$res=mysql_query($sql); 
	$numeroRegistros=mysql_num_rows($res); 

  if(!isset($orden)) 
    { 
       $orden="orden";
    } 	
			 
	$columnas[] = 'cnomseccion';
	$columnas[] = 'cruz';
	$columnas[] = 'cnommodulo';
	$columnas[] = 'Publicado';
	$columnas[] = 'cnommenu';
	$columnas[] = 'ctipseccion';	
	$columnas[] = 'cordcontenido';	
	
	$nAncho[0] = '30%';
	$nAncho[1] = '1%';
	$nAncho[2] = '20%';
	$nAncho[3] = '10%';		
	$nAncho[4] = '20%';	
	$nAncho[5] = '10%';	
	$nAncho[6] = '10%';	
	
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
	function limpiar() {
		location.href='/webadmin/index.php?option=com_categoria';
	}
	function filtrar_seccion(idSelectOrigen,idSelectOrigen2) {
		cseccion = "<?=$idSelectOrigen?>";
		location.href='/webadmin/index.php?option=com_categoria&cBuscaporidSeccion='+idSelectOrigen+'&cBuscaporidSeccion2='+idSelectOrigen2;
	} 
</SCRIPT>

<div id="toolbar-box">
	<div class="m">
    	<div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-new">
            <a href="/webadmin/index.php?option=com_seccion_new" onclick="" class="toolbar"><span class="icon-32-new"></span>Nuevo</a>
            </li>
            
            <li class="button" id="toolbar-edit">
            <a  onclick="if (document.adminForm.boxchecked.value==0){alert('Por favor, primero haga una selección desde la lista');}else{ 
            document.forms['adminForm'].task.value='com_categories_editar',
            document.forms['adminForm'].submit() }" class="toolbar"><span class="icon-32-edit"></span>Editar</a></li>              
           
            <li class="divider"></li>
            
            <li class="button" id="toolbar-subseccion">
            <a  onclick="if (document.adminForm.boxchecked.value==0){alert('Por favor, primero haga una selección desde la lista');}else{ 
            document.forms['adminForm'].task.value='com_subseccion_new',
            document.forms['adminForm'].submit() }" class="toolbar"><span class="icon-32-new"></span>Nueva Sub-Sección</a></li>              
           
            <li class="divider"></li>
            
            <li class="button" id="toolbar-trash">
                <a  onclick="if (document.adminForm.boxchecked.value==0){alert('Por favor, primero haga una selección desde la lista');}else{
                document.forms['adminForm'].task.value='com_seccion_eliminar',
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
           <h2>Gestor de Seccion: Seccion </h2>
           <strong>Recuerda no estamos listando el pie</strong></div>            
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
	while($registro=mysql_fetch_array($res)) {  ///////  Inicio While 1  Menu Nivel 1
		//echo $registro['ccodseccion']."hola";exit;
		$codsec= substr($registro['ccodseccion'],0,12);  // Utilizado en while 2 para Menu Nivel2
		if ($registro['cnivseccion']=='1') $espacio="";
		if ($registro['cnivseccion']=='2') $espacio="&nbsp;&nbsp;&nbsp;";
		if ($registro['cnivseccion']=='3') $espacio="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		if ($registro['cnivseccion']=='4') $espacio="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";				
 ?> 
	<tr class="row0">	
        <td class="center">
        <!--no te olvide de poner el & porque en procesar-accion.php hago esto y al no encontrar decuelve cadena vacia 
        $codigoid = strstr($id[0], '&', true) -->
         <input type="checkbox" id="cb0" name="cid[]" value="<?=$registro['ccodseccion'];?>&" onclick="Joomla.isChecked(this.checked);" title="Casilla de selección para la fila 1">										
        </td>                 
		<td width="<?=$nAncho[$x]?>"><?=$espacio?>
        <a href='/webadmin/mantenimiento/Form-Actualiza-Seccion.php?id=<?=$registro['ccodseccion']?>'>
        	<?php  if ($registro['estado']==-2){  //Eliminado
		           echo "<strike style='color:red'><span class='art_borrado_1er_nivel'>".$registro['cnomseccion']."</span></strike>";
		  		}else {
		 			echo "<span class='color_seccion_1er_nivel'>".$registro['cnomseccion'] ."</span>" ;  
                 }
         	?>                 
        </a>
        </td>       
        <!--Inicio cruz -->
        <td width="<?=$nAncho[$x]?>">
        	<img src="/imagen/p_boton_mas.png" alt="" width="18" height="17" id="BTN_100" 
	        style="padding-bottom:11px;cursor:pointer" onClick="MUEVE('100')" />
        </td>
        <!--Fin cruz --> 
        
       	<td width="<?=$nAncho[$x]?>"><span class="<?=$registro['cnommenu']?>"><?= $registro['cnommodulo']?></span></td>
        
        <!-----------------   Publicado ---------------------------> 
        <td width="<?=$nAncho[$x]?>"> <!--Estado Publicado o no Orden 3-->
         <?php //Estado
		 switch ($registro['estado']) {
			case 1:    //Publicado
				echo "<img src='./imagen/imagefiles-check_sign_icon_light_green.png' width='20' height='20' />";
				break;
			case 2:   //despublicado
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
        <!-----------------   Publicado ---------------------------> 
        
       	<td width="<?=$nAncho[$x]?>"><span class="<?=$registro['cnommenu']?>"><?=$registro['cnommenu']?></span></td> 
       	<td width="<?=$nAncho[$x]?>"><span class="color_seccion_1er_nivel">
		<?php switch ($registro['ctipseccion']) {
            case 1:    //Publicado
                echo "Es una Seccion";
                break;
            case 2:   //despublicado
                echo "Es un Enlace";
                break;	
            case 3: //Archivado
              echo "Es una Seccion Contenido";
              break;		  		  	    		   			
            }
        ?>						
		</span>
        </td>        
         <td width="<?=$nAncho[$x]?>"><span class="<?=$registro['cnommenu']?>"><?=$registro['cordcontenido']?></span></td>
     </tr> 
      
        <?php		
        $sql2_query = "SELECT s.cnivseccion,s.cnomseccion,s.ctipseccion,s.cordcontenido,s.ccodmodulo,s.ccodseccion,s.estado,
		m.cnommodulo FROM  seccion s, webmodulos m where ".$cfiltronivel ."  s.ccodmodulo=m.ccodmodulo and ccodseccion like '" . $codsec . "%' and s.cnivseccion='2' order by s.cordcontenido asc ";	  				
		//echo $sql2_query;exit;
		$sql2 = db_query($sql2_query);	
		while($row2 = db_fetch_array($sql2)) ////// Inicio while 2  Menu Nivel 2 Subseciones
			{
			$codsec2= substr($row2['ccodseccion'],0,16);  // Utilizado en while 3 para Menu Nivel3	
			$linea = $linea + 1;			
			if ($row2['cnivseccion']=='1') $espacio2="";
			if ($row2['cnivseccion']=='2') $espacio2="&nbsp;&nbsp;&nbsp;";
			if ($row2['cnivseccion']=='3') $espacio2="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			if ($row2['cnivseccion']=='4') $espacio2=		
			"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
		?>	 
        
        <tr class="row0">	
            <td class="center">
             <!--no te olvide de poner el & porque en procesar-accion.php hago esto y al no encontrar decuelve cadena vacia 
        $codigoid = strstr($id[0], '&', true) -->
             <input type="checkbox" id="cb0" name="cid[]" value="<?php echo $row2['ccodseccion'];?>&" onclick="Joomla.isChecked(this.checked);" title="Casilla de selección para la fila 1">										
             </td>   

            <td width="<?=$nAncho[$x]?>"><?=$espacio2?>
            <a href='mantenimiento/Form-Actualiza-SubSeccion.php?id=<?=$row2['ccodseccion']?>'>            
                <?php  if ($row2['estado']==-2){  //Eliminado
                   echo "<strike style='color:red'><span class='art_borrado_2do_nivel'>".$row2['cnomseccion']."</span></strike>";
                }else {
                    echo "<span class='color_seccion_2do_nivel'>".$row2['cnomseccion'] ."</span>" ;  
                 }
                ?>             
            </a>            
            </td>
       
        <!--Inicio cruz -->
        <td width="<?=$nAncho[$x]?>">
        	<img src="/imagen/p_boton_mas.png" alt="" width="18" height="17" id="BTN_100" 
	        style="padding-bottom:11px;cursor:pointer" onClick="MUEVE('100')" />
        </td>
        <!--Fin cruz --> 

            <td width="<?=$nAncho[$x]?>"><span class="color_seccion_2do_nivel"><?=$row2['cnommodulo']?></span></td>            
            <td width="<?=$nAncho[$x]?>"> 
             <?php //Estado
             switch ($row2['estado']) {
                case 1:    //Publicado
                    echo "<img src='./imagen/imagefiles-check_sign_icon_light_green.png' width='20' height='20' />";
                    break;
                case 2:   //despublicado
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
           	<td width="<?=$nAncho[$x]?>"><span class="color_seccion_2do_nivel"><?=$registro['cnommenu']?></span></td>  
            <td width="<?=$nAncho[$x]?>"><span class="color_seccion_2do_nivel">
            <?php switch ($row2['ctipseccion']) {
            case 1:    //Publicado
                echo "Es una Seccion";
                break;
            case 2:   //despublicado
                echo "Es un Enlace";
                break;	
            case 3: //Archivado
              echo "Es una Seccion Contenido";
              break;		  		  	    		   			
            }
	        ?>			
            </span></td> 
            <td width="<?=$nAncho[$x]?>"><span class="color_seccion_2do_nivel"><?=$row2['cordcontenido']?></span></td>
        </tr>        
         <?php	
		 // -------------  Aqui empieza Menu Nivel3 --------------------	
        $sql3_query = "SELECT s.cnivseccion,s.cnomseccion,s.ctipseccion,s.cordcontenido,s.ccodmodulo,s.ccodseccion,s.estado,m.cnommodulo FROM  seccion s, webmodulos m where ".$cfiltronivel ." s.ccodmodulo=m.ccodmodulo and ccodseccion like '" . $codsec2 . "%' and s.cnivseccion='3' order by s.cordcontenido asc ";	  				
		//echo $sql3_query;exit;
		$sql3 = db_query($sql3_query);	
		while($row3 = db_fetch_array($sql3)) ////// Inicio while 2  Menu Nivel 2 Subseciones
			{
			$codsec3= substr($row3['ccodseccion'],0,20);  // Utilizado en while 4 para Menu Nivel4	
			$linea = $linea + 1;			
			if ($row3['cnivseccion']=='1') $espacio3="";
			if ($row3['cnivseccion']=='2') $espacio3="&nbsp;&nbsp;&nbsp;";
			if ($row3['cnivseccion']=='3') $espacio3="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			if ($row3['cnivseccion']=='4') $espacio3=		
			"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
		?>	
        <tr class="row0">	
            <td class="center">
             <input type="checkbox" id="cb0" name="cid[]" value="<?php echo $row3['ccodseccion'];?>&" onclick="Joomla.isChecked(this.checked);" title="Casilla de selección para la fila 1">										
             </td>   
            <td width="<?=$nAncho[$x]?>"><?=$espacio3?>
			
             <a href='mantenimiento/Form-Actualiza-SubSeccion.php?id=<?=$row3['ccodseccion']?>'>            
            	<?php  if ($row3['estado']==-2){  //Eliminado
		           echo "<strike style='color:red'><span class='art_borrado_3er_nivel'>".$row3['cnomseccion']."</span></strike>";
		  		}else {
		 			echo "<span class='color_seccion_3er_nivel'>".$row3['cnomseccion'] ."</span>" ;  
                 }
	         	?>             
            </a>             
            </td> 
            
        <!--Inicio cruz -->
        <td width="<?=$nAncho[$x]?>">
        	<img src="/imagen/p_boton_mas.png" alt="" width="18" height="17" id="BTN_100" 
	        style="padding-bottom:11px;cursor:pointer" onClick="MUEVE('100')" />
        </td>
        <!--Fin cruz --> 
          
           <td width="<?=$nAncho[$x]?>"><span class="color_seccion_2do_nivel"><?=$row3['cnommodulo']?></span></td>           
           <td width="<?=$nAncho[$x]?>"> <!--Estado Publicado o no Orden 3 2da subseccion-->
             <?php //Estado
             switch ($row3['estado']) {
                case 1:    //Publicado
                    echo "<img src='./imagen/imagefiles-check_sign_icon_light_green.png' width='20' height='20' />";
                    break;
                case 2:   //despublicado
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
           <!-----------------   Publicado 3er nivel--------------------------->  

           	<td width="<?=$nAncho[$x]?>"><span class="sub_1"><?=$registro['cnommenu']?></span></td>  
             <td width="<?=$nAncho[$x]?>"><span class="color_seccion_3er_nivel">
			<?php switch ($row3['ctipseccion']) {
				case 1:    //Publicado
					echo "Es una Seccion";
					break;
				case 2:   //despublicado
					echo "Es un Enlace";
					break;	
				case 3: //Archivado
				  echo "Es una Seccion Contenido";
				  break;		  		  	    		   			
				}
	        ?>			            
			</span></td> 
            <td width="<?=$nAncho[$x]?>"><span class="sub_1"><?=$row3['cordcontenido']?></span></td>
        </tr>                
        	
            <?php	
		 // -------------  Aqui empieza Menu Nivel 4 --------------------	
        $sql4_query = "SELECT s.cnivseccion,s.cnomseccion,s.ctipseccion,s.cordcontenido,s.ccodmodulo,s.ccodseccion,s.estado,m.cnommodulo FROM  seccion s, webmodulos m where  ".$cfiltronivel ." s.ccodmodulo=m.ccodmodulo and ccodseccion like '" . $codsec3 . "%' and s.cnivseccion='4' order by s.cordcontenido asc ";	  				
		//echo $sql4_query;exit;
		$sql4 = db_query($sql4_query);	
		while($row4 = db_fetch_array($sql4)) ////// Inicio while 4  Menu Nivel 4 Subseciones
			{
			$codsec5= substr($row4['ccodseccion'],0,24);  // Utilizado en while 5 para Menu Nivel5	
			$linea = $linea + 1;			
			if ($row4['cnivseccion']=='1') $espacio4="";
			if ($row4['cnivseccion']=='2') $espacio4="&nbsp;&nbsp;&nbsp;";
			if ($row4['cnivseccion']=='3') $espacio4="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			if ($row4['cnivseccion']=='4') $espacio4=		
			"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
		?>	
        <tr class="row0">	
            <td class="center">
             <input type="checkbox" id="cb0" name="cid[]" value="<?php echo $row4['ccodseccion'];?>&" onclick="Joomla.isChecked(this.checked);" title="Casilla de selección para la fila 1">										
             </td>   
            <td width="<?=$nAncho[$x]?>"><?=$espacio4?>			
             <a href='mantenimiento/Form-Actualiza-SubSeccion.php?id=<?=$row4['ccodseccion']?>'>            
            	<?php  if ($row4['estado']==-2){  //Eliminado
		           echo "<strike style='color:red'><span class='art_borrado_4to_nivel'>".$row4['cnomseccion']."</span></strike>";
		  		}else {
		 			echo "<span class='color_4to_nivel'>".$row4['cnomseccion'] ."</span>" ;  
                 }
	         	?>             
            </a>              
            </td> 
        
        <!--Inicio cruz -->
        <td width="<?=$nAncho[$x]?>">
        	<img src="/imagen/p_boton_mas.png" alt="" width="18" height="17" id="BTN_100" 
	        style="padding-bottom:11px;cursor:pointer" onClick="MUEVE('100')" />
        </td>
        <!--Fin cruz --> 
             
            <td width="<?=$nAncho[$x]?>"><span class="color_seccion_2do_nivel"><?=$row4['cnommodulo']?></span></td>
           
           <!-----------------   Publicado 4to nivel ---------------------------> 
           <td width="<?=$nAncho[$x]?>"> <!--Estado Publicado o no Orden 3 2da subseccion-->
             <?php //Estado
             switch ($row4['estado']) {
                case 1:    //Publicado
                    echo "<img src='./imagen/imagefiles-check_sign_icon_light_green.png' width='20' height='20' />";
                    break;
                case 2:   //despublicado
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
           	<td width="<?=$nAncho[$x]?>"><span class="sub_1"><?=$registro['cnommenu']?></span></td>  
            <td width="<?=$nAncho[$x]?>"><span class="color_4to_nivel">
            	<?php switch ($row4['ctipseccion']) {
					case 1:    //Publicado
						echo "Es una Seccion";
						break;
					case 2:   //despublicado
						echo "Es un Enlace";
						break;	
					case 3: //Archivado
					  echo "Es una Seccion Contenido";
					  break;		  		  	    		   			
					}
				?>					
                </span>
            </td> 
            <td width="<?=$nAncho[$x]?>"><span class="sub_1"><?=$row4['cordcontenido']?></span></td>
             
        </tr>        
        <?php
			 // -------------  Aqui Termina Menu Nivel 4 --------------------
			}///////////////////////////////////////fin while 4
		?> 
        <?php
			 // -------------  Aqui Termina Menu Nivel3 --------------------
			}///////////////////////////////////////fin while 3
		?> 
       
		<?php
			}///////////////////////////////////////fin while 2
		?>        
<?php 
	}///////////////////////////////////////fin while 1
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
http://www.blogdephp.com/foro/topic/eliminacion-multiple-de-registros-en-un-listado-con-php-y-mysql-utilizando-checkbox 
.color_seccion_1er_nivel{color:#000000;font-weight:bold;} esta en estilos/estilo.css 
-->
<style type="text/css">	
	.art_borrado_1er_nivel{font-weight:bold;color:#000000;}	
	.art_borrado_2do_nivel{font-weight:bold;color:#449902; margin-left: 10px;}
	
	.art_borrado_3er_nivel{font-weight:bold;color:#1389D1;padding-left: 30px;}
	
	.art_borrado_4to_nivel{font-weight:bold;color:#FF7D5D;padding-left: 40px; width:100%}
	.color_4to_nivel{color:#FF7D5D;font-weight:bold;padding-left: 40px;}
	
	/*ver tabla pagemenu deve ser igual al campo cnommenu*/
	.Cabecera{color:#0b98e3; font-weight:bold;}
	.Pie{}
	.Servicios{color:#a14829;; font-weight:bold;}
	
	.filter-search{ display: flex;justify-content: flex-start; width: 100%; padding: 10px;}
	.filtrarxcontenido{ display: flex;justify-content: space-between; width: 35	;margin-left:20px;}
	.filtrarxcategoria { display: flex;justify-content: space-between; width: 40%; margin-left:20px; height:20px}
	.filtrarxcategoria .titulo{ font-size:12px; font-weight: bold; color:#E70C10;text-align: right; line-height:20px }
</style>
 <script type="text/javascript">
    function MUEVE(a){if(Desplegables[a]==null){Desplegables[a]=1;$("#BTN_"+a).attr("src","/imagen/p_boton_menos.png");$("#DESC_"+a).animate({height:"toggle"},{duration:300})}else{Desplegables[a]=null;$("#BTN_"+a).attr("src","/imagen/p_boton_mas.png");$("#DESC_"+a).animate({height:"toggle"},{duration:300})}}var NoticiasBlog=new Array();
   </script>  