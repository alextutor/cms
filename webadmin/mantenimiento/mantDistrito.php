<?php		
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
	function EliminaRegistro(idconta,persona,page) { 
	if (confirm("Estas Seguro(a) de eliminar el registro?" +" "+ idconta + " " + persona  )) { 
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+ '/webadmin/mantenimiento/EliminaDistrito.php?Registro=' +  idconta  + '&page='
		+ page	
	} 
	} 
	
	function InsertarRegistro(idconta,persona) { 
	if (confirm("Estas Seguro(a) de Insertar  registro?" + idconta + " " + 
	persona  )) { 
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+ '/webadmin/mantenimiento/FormInsertarDistrito.php'		
	} 	
	} 
	
	function Actualizar(idconta,persona,page ) { 
	if (confirm("Estas Seguro(a) de Actualizar el registro?" + " " + idconta + " " + persona  )) { 
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+ '/webadmin/mantenimiento/FormActualizaDistrito&page=' + page + '&Registro=' +  idconta
	}} 	
</SCRIPT>
<link href="../galeria-productos/paginacion.css" type="text/css" rel="stylesheet">

<table width="100%" border="0">
	  <tr>
	    <td width="47%">&nbsp;</td>
	    <td width="42%"><a href="<?php echo $ROOT_PATH?>/seguridad/mainadministrador.php">Volver Administrador</a></td>
	    <td width="11%">
        <strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="../seguridad/salir.php">
      <img border="0" src="imagen/salir.gif" align="right"></a></font></strong>
      </td>
      </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC" onClick="javascript:InsertarRegistro('<? echo $registro["id_distrito"]?>', '<? echo $registro["desc_distrito"]?>');"><b>
        <img src="imagen/hoja.gif" width="35" height="35" alt="Insertar Registro"></b></font>
        
        </td>
  </tr>
    </table>
    
<?php
//------------Inicio el criterio 
$criterio = " where borrado='NO' ";   
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

$sql="SELECT * FROM distrito ".$criterio; 
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
       $orden="id_distrito";
    } 

$sql="SELECT * FROM distrito ".$criterio." ORDER BY ".$orden.",id_distrito ASC ";

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

echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=id_distrito&idcategoria=".$idcategoria."&criterio=".$txt_criterio."'>Codigo</a></th>";

echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=desc_distrito&idcategoria=".$idcategoria."&criterio=".$txt_criterio."'>Nombre</a></th>";

echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=precio_soles&idcategoria=".$idcategoria."&criterio=".$txt_criterio."'>Precio_soles</a></th>";

echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=orden &idcategoria=".$idcategoria."&criterio=".$txt_criterio."'>Orden</a></th>";

echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=idcategoria&idcategoria=".$idcategoria."&criterio=".$txt_criterio."'>borrado</a></th>";

echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=idsudcategoria&idcategoria=".$idcategoria."&criterio=".$txt_criterio."'>mostrar</a></th>";



while($registro=mysql_fetch_array($res)) 
{ 
?> 

	<tr bgcolor="#CC6666" onMouseOver="this.style.backgroundColor='#FF9900';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#CC6666'"o"];" >
	
    <td width='2%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["id_distrito"]; ?></b></font></td>
    
    <td width='30%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo htmlspecialchars($registro["desc_distrito"]); ?></b></font></td>
    
        <td width='10%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo htmlspecialchars($registro["precio_soles"]); ?></b></font></td>

       <td  align="center" width='15%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo htmlspecialchars($registro["orden"]); ?></b></font></td>    

 <td align="center" width='2%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["borrado"]; ?></b></font></td>  
      <td align="center" width='2%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["mostrar"]; ?></b></font></td>  
      
  <td width='10%' align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC" onClick="javascript:EliminaRegistro('<? echo $registro["id_distrito"]?>', '<? echo $registro["desc_distrito"]?>','<? echo $page ?>');"><b><img src="imagen/delete.gif" width="22" height="19" alt="Eliminar Registro"> </b></font></td>  

   <td width='10%' align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC" onClick="javascript:Actualizar('<? echo $registro["id_distrito"]?>', '<? echo $registro["desc_distrito"]?>' ,'<? echo $page ?>');"> <b>  <img src="imagen/actualiza.png" width="22" height="19" alt="Actualizar Registro"> </b></font></td>     
   
</tr>   
<? 
}//fin while 
echo "</table>";
echo "<br/><br/><center><div id='conte_paginacion'> " . $pages->display_pages()  . "</div></center>";
 
}  //----------------Fin Si 1
?> 
</html>