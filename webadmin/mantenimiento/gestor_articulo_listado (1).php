<?php ob_start();	
	session_start(); 
	//-------para que nome muestre errores en desarollo xamp ejemplo inicializar valores
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 	
	
	//$modulo="1100";	
	include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');		
	include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/mis-funciones.php');
	$modulo=$_SESSION['modulo'];//alex lo defini en index del webadmin 
	$pagew=$_SESSION['selectpage'];
	//extract($_POST);
	if ($_POST['idbuscar']=='1'){
		$selectseccion = $_POST['idseccion'];
		$nombre = $_POST['nombre'];
		$codigo  = $_POST['codigo'];
	}
	else
	{
     	$selectseccion ="";
		$nombre ="";
		$codigo = "";
	}	
	$cfiltro="";
	 // Inicio si el usuario no es administrador esconde los registros borrados	
	if($_SESSION['nivel']<>'ADMINISTRADOR'){
		$cfiltro .=	" c.estado<>-2 ";
	}	
		
   	if($selectseccion   != '' && $selectseccion   != 'todas_secciones' ) 
	{
		if (strlen($selectseccion)==24)
			$cfiltro .= " and s.ccodseccion = '".$selectseccion."'";
		else
			$cfiltro .= " and s.ccodseccion like '".$selectseccion."%'";	
	}	
	
	if($nombre != '' ) 
	{
		$cfiltro .= " and c.cnomcontenido like '%".$nombre."%'";
	}
	//alex aqui el codigo interno no hay no se ha definido en la empresa
	if($codigo != '' ) 
	{
		$cfiltro .= " and c.ccodinterno like '%".$codigo."%'";
	}


	$sql = "SELECT  c.ccodcontenido, c.ccodcategoria,c.dfeccontenido,c.cnomcontenido,c.camicontenido,c.cordcontenido, c.cestcontenido, c.nviscontenido,c.nnrocomentario,c.ctipcontenido,c.cimgcontenido,c.estado FROM contenido c  left join seccioncontenido  s on c.ccodcontenido=s.ccodcontenido WHERE ".$cfiltro ." and c.ccodpage= '".$pagew."' and (c.ccodmodulo='1100' or c.ccodmodulo='1200')  group by c.ccodcontenido desc  order by c.dfeccontenido desc";
			
	
	$res=mysql_query($sql); 
	$numeroRegistros=mysql_num_rows($res);
  if(!isset($orden)) 
    { 
       $orden="orden";
    } 	
	//echo $sql;exit;	 
	$columnas[] = 'cnomcontenido';
	//$columnas[] = 'camicontenido';
	$columnas[] = 'Sección';
	$columnas[] = 'Publicado';
	$columnas[] = 'Fecha Publicado';
	$columnas[] = 'Orden';
	$columnas[] = 'Visitas';	
	$columnas[] = 'Imagen';	
	
	$nAncho[0] = '10%;'; //cnomcontenido
	//$nAncho[0] = '20%;'; //camicontenido
	$nAncho[1] = '8%';	//seccion
	$nAncho[2] = '2%';//Publicado
	$nAncho[3] = '3%';//fecha Publicado	
	$nAncho[4] = '1%';//orden
	$nAncho[5] = '1%';//visitas
	$nAncho[6] = '5%';	//Imagen
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
<form action="/webadmin/procesar-accion.php" method="post" name="adminForm" id="adminForm" onsubmit="return validacion()">        
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
	$x=0;
	while($registro=mysql_fetch_array($res)) {
		// --------------  Inicio Para sacar nombre seccion
		//$linea = $linea + 1;		
		$cnomsec="";
		$sqlxsec = db_query("SELECT s.cnomseccion FROM seccion s, seccioncontenido sc  WHERE s.ccodseccion=sc.ccodseccion  and sc.ccodpage= '".$pagew."' and sc.ccodcontenido ='" .$registro['ccodcontenido'] . "'");		
		while($rowxsec = db_fetch_array($sqlxsec))
			{
				$cnomsec.= $rowxsec['cnomseccion']."<br>";
			}
		// --------------  Fin Para sacar nombre seccion		
?> 
	<tr class="row0">	
        <td class="center">
        <!--no te olvide de poner el & porque en procesar-accion.php hago esto y al no encontrar decuelve cadena vacia 
        $codigoid = strstr($id[0], '&', true) -->
       <input type="checkbox" id="cb0" name="cid[]" value="<?=$registro['ccodcontenido'];?>
&selectseccion=<?=$selectseccion?>&cfiltro=<?=$cfiltro?>" 
onclick="Joomla.isChecked(this.checked);" 
title="Casilla de selección para la fila 1">	
									
         </td>         
         <td width="<?=$nAncho[0]?>">
		 <a href='/webadmin/index.php?option=com_articulos_editar&id=<?=$registro['ccodcontenido']?>&selectseccion=<?=$selectseccion?>&cfiltro=<?=$cfiltro?>'>
         <?php  if ($registro['estado']==-2){  //Eliminado
		           echo "<div class='art_borrado'>".$registro['cnomcontenido']."</div>";
		  		}else {
		 			echo "<div class='art_normal'>".$registro['cnomcontenido'] ."</div>" ;  
                 }
         ?>                  
		 </a>
         </td>     
         <!--<td width="<?=$nAncho[$x]?>"><?=$registro['camicontenido']?></td> -->                   
         <td width="<?=$nAncho[1]?>"><?=$cnomsec?></td>
         <td width="<?=$nAncho[2]?>" align="center">
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
         <td width="<?=$nAncho[3]?>"><?=fecha_a_letras($registro['dfeccontenido']) ?></td>                     
         <td width="<?=$nAncho[4]?>"><?=$registro['cordcontenido']?></td> 
         <td width="<?=$nAncho[5]?>"><?=$registro['nviscontenido']?></td> 
         <td width="<?=$nAncho[6]?>">         
		 <?php			
			 echo "<img src='/timthumb.php?src=" .$registro['cimgcontenido']. "&h=80&w=80&zc=0&q=100&s=1' border=0 class='mgredondearesq'/>" ; 
		  ?>
          </td>                                      
	</tr>   
<?php 	
	}//fin while 
?>              
                 </tbody>
            </table>
       <div>
          <input type="hidden" name="task" value="">
          <input type="hidden" name="boxchecked" value="0">                
          <input type="hidden" name="pagina" value="com_articulos">	 	              
       </div>                
 </form>