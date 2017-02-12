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
		$nombre = trim($_POST['nombre']);
		$departamento  = trim($_POST['departamento']);
	}
	else
	{
     	$selectseccion ="";
		$nombre ="";
		$departamento = "";
	}	
	$cfiltro="";
	 // Inicio si el usuario no es administrador esconde los registros borrados	
	if($_SESSION['nivel']<>'ADMINISTRADOR'){
		$cfiltro .=	" condominio_secciones.estado<>-2 ";
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
		$cfiltro .= " and CONCAT(p.nombre , ' ',p.apellidopaterno , ' ', p.apellidomaterno) like '%".$nombre."%'";
	}
	//alex aqui el codigo interno no hay no se ha definido en la empresa
	if($departamento != '' ) 
	{
		$cfiltro .= " and nombreseccion like '%".$departamento."%'";
	}
	//echo $cfiltro ;exit;
			
	$sql = "SELECT
    condominio.nombrecondominio
    ,condominio_secciones.nombreseccion
    , condominio_secciones.estado   
    FROM
    condominio_secciones 
    INNER JOIN condominio 
        ON (condominio_secciones.idcondominio = condominio.idcondominio) 
		  WHERE ".$cfiltro ; 

	//echo $sql;exit;
	
	$res=mysql_query($sql); 
	$numeroRegistros=mysql_num_rows($res);
  if(!isset($orden)) 
    { 
       $orden="orden";
    } 	
	$columnas[] = 'nombrecondominio';	
	$columnas[] = 'nombreseccion';	
	$columnas[] = 'estado';			
	
	$nAncho[0] = '10%;'; // nombredepartamento
	$nAncho[1] = '10%';	//Propietario
	$nAncho[2] = '10%';//Departamento
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
?> 
	<tr class="row0">	
        <td class="center">
        <!--no te olvide de poner el & porque en procesar-accion.php hago esto y al no encontrar decuelve cadena vacia 
        $codigoid = strstr($id[0], '&', true) -->
       <input type="checkbox" id="cb0" name="cid[]" value="<?=$registro['idseccion'];?>
&selectseccion=<?=$selectseccion?>&cfiltro=<?=$cfiltro?>" 
onclick="Joomla.isChecked(this.checked);" 
title="Casilla de selección para la fila 1">	
									
         </td>         
         <td width="<?=$nAncho[0]?>">
             <a href='/webadmin/index.php?option=com_articulos_editar&id=<?=$registro['idseccion']?>&selectseccion=<?=$selectseccion?>&cfiltro=<?=$cfiltro?>'>
                 <?php  if ($registro['estado']==-2){  //Eliminado
                           echo "<div class='art_borrado'>".$registro['nombrecondominio']."</div>";
                        }else {
                            echo "<div class='art_normal'>".$registro['nombrecondominio'] ."</div>" ;  
                         }
                 ?>                  
             </a>
         </td>                       
         <td width="<?=$nAncho[1]?>"><?=$registro['nombreseccion']?></td>       
         <td width="<?=$nAncho[2]?>"><?=$registro['estado']?></td>                                                         
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