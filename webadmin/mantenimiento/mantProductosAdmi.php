<?Php 
$Title = "";
$Description = "";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/header.php');
?>
<?php
include($_SERVER['DOCUMENT_ROOT']. '/config.php');	

$idcategoria=$_GET["idcategoria"];
$idsudcategoria=$_GET["idsudcategoria"];

$Filtro_en_oferta=$_GET["Filtro_en_oferta"];

$page=$_GET["page"];
if ($page=="" ){
	$page=1;
}
?>
<SCRIPT LANGUAGE="JavaScript"> 
	function EliminaRegistro(idconta,persona,page,idcategoria,idsudcategoria,Filtro_en_oferta) { 
	if (confirm("Estas Seguro(a) de eliminar el registro?" + idconta + " " + persona  )) { 
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+ '/webadmin/mantenimiento/EliminaPoductos.php?Registro=' +  idconta  +'&page='
		+ page + '&idcategoria=' + idcategoria +
		'&idsudcategoria='+ idsudcategoria +
		'&Filtro_en_oferta='+ Filtro_en_oferta		
	} 
	} 
	
	function InsertarRegistro(idconta,persona,idcategoria,idsudcategoria) { 
	if (confirm("Estas Seguro(a) de Insertar  registro?" + idconta + " " + 
	persona  )) {
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+ '/webadmin/mantenimiento/FormInsertarProductos.php?idcategoria=' + idcategoria +'&idsudcategoria=' + idsudcategoria		
	} 	
	} 
	
	function Actualizar(idconta,persona,page,idcategoria,idsudcategoria,Filtro_en_oferta ) { 
	if (confirm("Estas Seguro(a) de Actualizar el registro?" + idconta + " " + persona  )) { 
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+ 'webadmin/mantenimiento/FormActualizaProductos.php?page='+ page + '&Registro=' +  idconta +'&idcategoria='
		+ idcategoria +'&idsudcategoria='
		+ idsudcategoria + '&Filtro_en_oferta=' + Filtro_en_oferta ;				
	}} 	
</SCRIPT>
<link href="../galeria-productos/paginacion.css" type="text/css" rel="stylesheet">

<div style="margin:0 auto; width:300px; float:right;margin-bottom:20px;">
    <div style="float:left; width:100px">
            <font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC" onClick="javascript:InsertarRegistro('<?php echo $registro["idproductos"]?>', '<?php echo $registro["nombproductos"]?>', '<?php echo $idcategoria ?>', '<?php echo $idsudcategoria ?>');"><b>
        <img src="<?php echo ROOT_PATH?>/webadmin/mantenimiento/imagen/hoja.gif" width="61" height="48" alt="Insertar Registro"></b></font>
    </div>    
	<div style="float:left; width:100px"><a href="<?php echo ROOT_PATH?>/webadmin/index.php">
    	<img src="<?php echo ROOT_PATH?>/webadmin/mantenimiento/imagen/cerrar.png" width="61" height="48" alt="cerrar">
     </a></div>
    <div style="float:left; width:100px">
    <strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="<?php echo ROOT_PATH?>/webadmin/seguridad/salir.php">
      <img border="0" src="<?php echo ROOT_PATH?>/webadmin/mantenimiento/imagen/salir.gif" align="right"></a></font></strong>
     </div>

</div>
<div>    <!--Inicio contenedor general-->
<?php
//------------Inicio el criterio 
$criterio = " where borrado=0 ";   
if ($idcategoria!=""){ 
   $criterio = " where idcategoria=$idcategoria and borrado=0 ";   
} 
if ($idcategoria!="" and $idsudcategoria!=""){ 
   $criterio = " where idcategoria=$idcategoria and idsudcategoria=$idsudcategoria and borrado=0 " ;   
} 

if ($Filtro_en_oferta=="SI"){ 
   $criterio = " where en_oferta='$Filtro_en_oferta' and borrado=0 ";   
} 
//------------Fin el criterio

$sql="SELECT * FROM productos ".$criterio;
$res=mysql_query($sql); 
$numeroRegistros=mysql_num_rows($res); 

if($numeroRegistros<=0)  //----------------Inicio Si 1
{ 
    echo "<div align='center'>"; 
    echo "<font face='verdana' size='-2'>No se encontraron resultados</font>"; 
    echo "</div>"; 
}else{ 
    //////////elementos para el orden 
    if(!isset($orden)) 
    { 
       $orden="idproductos";
    } 

$sql="SELECT * FROM productos ".$criterio." ORDER BY ".$orden.",idproductos ASC ";
$columnas[] = 'idproductos';
$columnas[] = 'curso';
$columnas[] = 'duracion';
$columnas[] = 'modalidad';
$columnas[] = 'inicioclases';
$columnas[] = 'mostrar';

include($_SERVER['DOCUMENT_ROOT'].'/galeria-productos/paginator.class.php');  
$pages = new Paginator;
$pages->items_total = $numeroRegistros; //cuantos registros se mostraran
// Configuramos el total de links a mostrar. Por ejemplo el valor por defecto es 7 . Si estamos en la pág 50 mostraria : 47 47 49 50 51 52 53 
$pages->mid_range = 15; 
$pages->paginate();
$sql= $sql . " $pages->limit";
$res = mysql_query($sql) or die(mysql_error());

echo "<br/><center><div id='conte_paginacion'> " . $pages->display_pages()  ."<span class=\"\">".$pages->display_jump_menu().$pages->display_items_per_page()."</span></div></center><br/>";


//////////fin consulta con limites 
echo "<div align='center'>"; 
echo "<font face='verdana' size='-2'>encontrados ".$numeroRegistros." resultados<br>"; 
echo "ordenados por <b>".$orden."</b>"; 
if(isset($txt_criterio)){ 
    echo "<br>Valor filtro: <b>".$txt_criterio."</b>"; 
} 
echo "</font></div>"; 
echo "<table align='center' width='100%' border='0' cellspacing='1' cellpadding='0'>";
echo "<tr><td colspan='3'><hr noshade></td></tr>"; 

foreach($columnas as $CampoProducto){   
   echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=idproductos&idcategoria=".$idcategoria."&criterio=".$txt_criterio."'>". $CampoProducto ."</a></th>";

}  


echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=idcategoria&idcategoria=".$idcategoria."&criterio=".$txt_criterio."'>Categoria</a></th>";
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=idsudcategoria&idcategoria=".$idcategoria."&criterio=".$txt_criterio."'>Subcategoria</a></th>";


echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=rutaimagen  &idcategoria=".$idcategoria."&criterio=".$txt_criterio."'>Imagen</a></th>";


while($registro=mysql_fetch_array($res)) 
{ 
?> 

	<tr bgcolor="#CC6666" onMouseOver="this.style.backgroundColor='#FF9900';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#CC6666'"o"];" >
    
<?php 
	    foreach($columnas as $CampoProducto){
   
		   echo "<td width='10%'><font size='2' face='Verdana, Arial, Helvetica, sans-serif' color='#FFFFCC'><b>". $registro[$CampoProducto] ."</b></font></td>";
   		}  
?>
	
    <td  align="center" width='4%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b>
		 <!-- Inicio Categoria----------------------------------->
        	<select name="idcate" id="idcate">
                <option></option>           
                <?php                     
				    $resultcate=mysql_query("SELECT * FROM categoria  order by idcategoria", $conexion);    
			  		while ($row = mysql_fetch_array($resultcate)) 			
						{ 
								echo '<option value="'.$row['idcategoria'].'"';
								if($row['idcategoria']==$registro['idcategoria'])
								{
									echo ' selected';
								}
								echo '>'. $row['descripcion'] . '</option>'."\n";						} 
				    	mysql_free_result($resultcate); 	                    
                ?>                
              </select>             
          <!-- Fin Categoria----------------------------------->
	</b></font></td>

    <td  align="center" width='5%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b>
			 <!-- Inicio Subcategoria----------------------------------->
            <select name="idsubcate" id="isubdcate">
                        <option></option>
                      
                        <?php                     
                            $resultsubcate=mysql_query("SELECT * FROM subcategoria  order by idsubcategoria", $conexion);    
                            while ($rowsub = mysql_fetch_array($resultsubcate)) 			
                                { 
                                        echo '<option value="'.$row['idsubcategoria'].'"';
                                        if($rowsub['idsubcategoria']==$registro['idsudcategoria'])
                                        {
                                            echo ' selected';
                                        }
                                        echo '>'. $rowsub['descripSubcategoria'] . '</option>'."\n";						} 
                                mysql_free_result($resultsubcate); 	                    
                        ?>        
              </select>
        <!-- Fin Subcategoria-----------------------------------> 
        
    </b></font></td>    
 
    <td align="center" width='5%'>
    	<?php		
        $imagen='"' . primera_imagen($registro['detalle']);
						//   echo "<img src=$imagen/>" ;						
						$cadena = $imagen;
						$buscar = "alt";
						$resultado = strpos($cadena, $buscar);//ubica donde esta ubicado el alt
						$imagen=substr($cadena,0, $resultado);//quita el alt de la imagen
						$longitud=strlen($imagen); 	
						$imagen=substr($imagen,1,$longitud-1); //sustrae la 1 comilla "
						$imagen=substr($imagen,0,$longitud-3); //sustrae las ultimas comillas"						
					   //echo "<img src='timthumb.php?src=/tiny_mce/plugins/jfilebrowser/archivos/20140205210655_0.png'>"; 
					   echo "<img src='timthumb.php?src=".$imagen. "'>"; 		
        ?>                   
    </td> 
 
  <td width='10%' align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC" onClick="javascript:EliminaRegistro('<?php echo $registro["idproductos"]?>', '<?php echo $registro["nombproductos"]?>'
  , '<?php echo $page ?>', '<?php echo $registro["idcategoria"]?>', '<?php echo $registro["idsudcategoria"]?>', '<?php echo $Filtro_en_oferta ?>');"> <b>  <img src="webadmin/mantenimiento/imagen/delete.gif" width="18" height="19" alt="Eliminar Registro"> </b></font></td>  



   <td width='10%' align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC" onClick="javascript:Actualizar('<?php echo $registro["idproductos"]?>', '<?php echo $registro["nombproductos"]?>' ,'<?php echo $page ?>' , '<?php echo $registro["idcategoria"]?>', '<?php echo $registro["idsudcategoria"]?>' ,'<?php echo $Filtro_en_oferta  ?>' );"> <b>  <img src="webadmin/mantenimiento/imagen/actualiza.png" width="22" height="19" alt="Actualizar Registro"> </b></font></td>     
   
</tr>   
<?php 
}//fin while 
echo "</table>";
echo "<div id='conte_paginacion'> " . $pages->display_pages()  . "</div>"; 
}  //----------------Fin Si 1
?> 

</div> <!--fin contenedor general -->
 <?php  include_once ($INC_DIR . '/footer.php');  ?> 