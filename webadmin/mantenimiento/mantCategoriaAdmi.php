
<style>
a:link{
	color: #ee2f2c;
}
.titulo_cabecera {
	font-size:22px;
	font-weight:bold;
	margin:0 auto;
	text-align:center;
	color:#F00;
	}
</style>
<meta charset="utf-8">
<?php
include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
$idcategoria=$_GET["idcategoria"];
$idsudcategoria=$_GET["idsudcategoria"];
?>
<SCRIPT LANGUAGE="JavaScript"> 
	function EliminaRegistro(idconta,persona) { 
	if (confirm("Estas Seguro(a) de eliminar el registro?" + idconta + " " + persona  )) { 
		ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/mantenimiento/EliminaCategoria.php?Registro=' +  idconta
	} 
	} 
	
	function InsertarRegistro(idconta,persona) { 
	if (confirm("Estas Seguro(a) de Insertar  registro" )) { 
		location=("/webadmin/mantenimiento/FormInsertarCategoria.php");
	} 	
	} 
	
	function Actualizar(idconta,persona,paginacion,idcategoria,idsudcategoria) { 
	if (confirm("Estas Seguro(a) de Actualizar el registro?" + idconta + " " + persona  )) { 
		location=("/webadmin/mantenimiento/FormActualizaCategoria&paginacion="+ paginacion + "&Registro=" +  idconta +"&idcategoria="
		+ idcategoria +"&idsudcategoria="
		+ idsudcategoria );
	}} 	
</SCRIPT>
<link href="../galeria-productos/paginacion.css" type="text/css" rel="stylesheet">

<table width="100%" border="0">
	  <tr>
	    <td colspan="3">
        <div class="titulo_cabecera">Mantenimiento Categoria</div>        
        </td>
  </tr>
	  <tr>
	    <td width="47%">&nbsp;</td>
	    <td width="42%"><a href="<?php echo ROOT_PATH?>/webadmin/index.php">Volver Administrador</a></td>
	    <td width="11%">
        <strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="../seguridad/salir.php">
      <img border="0" src="/webadmin/mantenimiento/imagen/salir.gif" align="right"></a></font></strong>
      </td>
      </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC" onClick="javascript:InsertarRegistro('<?php echo $registro["idproductos"]?>', '<?php echo $registro["nombproductos"]?>');"><b>
        <img src="/webadmin/mantenimiento/imagen/hoja.gif" width="18" height="19" alt="Insertar Registro"></b></font>
        
        </td>
  </tr>
    </table>
    
<?php
//------------Inicio el criterio 
$criterio = " where borrado=0 ";   
//------------Fin el criterio


$sql="SELECT * FROM categoria ".$criterio; 
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
       $orden="orden";
    } 

$sql="SELECT * FROM categoria ".$criterio." ORDER BY ".$orden." ASC ";
$columnas[] = 'idcategoria';
$columnas[] = 'titulo';
$columnas[] = 'estado';
$columnas[] = 'descripcion';
$columnas[] = 'orden';
$columnas[] = 'borrado';


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


while($registro=mysql_fetch_array($res)) 
{ 
?> 

	<tr bgcolor="#CC6666" onMouseOver="this.style.backgroundColor='#FF9900';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#CC6666'"o"];" >
	
 <?php 
	    foreach($columnas as $CampoProducto){
   
		   echo "<td width='10%'><font size='2' face='Verdana, Arial, Helvetica, sans-serif' color='#FFFFCC'><b>". $registro[$CampoProducto] ."</b></font></td>";
   		}  
?>
 
   <td width='2%' align="center"><font onClick="javascript:EliminaRegistro('<?php echo $registro["idcategoria"]?>',
      '<?php echo $registro["titulo"]?>');"> 
            <img src="/webadmin/mantenimiento/imagen/delete.gif" width="18" height="19" alt="Eliminar Registro"></font>
       </td>  

   <td width='2%' align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC" onClick="javascript:Actualizar('<?php echo $registro["idcategoria"]?>', '<?php echo $registro["titulo"]?>');"> <b>  <img src="/webadmin/mantenimiento/imagen/actualiza.png" width="22" height="19" alt="Actualizar Registro"> </b></font></td> 
   
</tr>   
<?php 
}//fin while 
echo "</table>";
echo "<br/><br/><center><div id='conte_paginacion'> " . $pages->display_pages()  . "</div></center>";
 
}  //----------------Fin Si 1
?> 