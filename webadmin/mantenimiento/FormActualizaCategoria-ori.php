<?Php 
$Title = "";
$Description = "";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/header.php');
?>

<?php
 include($_SERVER['DOCUMENT_ROOT']. '/config.php');	          
   $Registro=$_GET['Registro'];
   $result=mysql_query("select * from categoria  Where idcategoria='$Registro' ",$conexion);    
   $rsCategoria=mysql_fetch_array($result);     
   $paginacion=trim($_GET['paginacion']); 

?>
<SCRIPT LANGUAGE="JavaScript"> 
	function Cancelar(){
		location=("<?php $_SERVER['DOCUMENT_ROOT'] ?> /webadmin/mantenimiento/mantCategoriaAdmi.php?paginacion= <?php echo $paginacion ?>");	
	}
</script> 
<script language="JavaScript" type="text/javascript">
function validar_form(val) {
	cadena =document.getElementById("descripcion").value; 
	cadena = cadena.replace(/(^\s*)|(\s*$)/g,"");
	if (cadena.length==0) {
		alert("Debe rellenar el campo descripcion.");
		document.getElementById("descripcion").focus();
		return false;
	} 
	cadena =document.getElementById("orden").value; 
	cadena= cadena.replace(/(^\s*)|(\s*$)/g,"");
	if (cadena.length==0) {
		alert("Debe rellenar el orden.");
		document.getElementById("orden").focus();
		return false;
	} 
	cadena =document.getElementById("borrado").value; 
	cadena= cadena.replace(/(^\s*)|(\s*$)/g,"");
	if (cadena.length==0) {
		alert("Debe rellenar el campo borrado.");
		document.getElementById("borrado").focus();
		return false;
			} 
}
 </script>    
<body>
<table width="80%" height="84%" border="0" align="center" class="estilotabla">  
  <tr>
    <td height="391" valign="top" >    
    <form id="form1" name="form1" method="POST" action="<?php echo $ROOT_PATH?>/webadmin/mantenimiento/ActualizaFormCategoria.php" onSubmit="return validar_form(this)">
    	<table width="93%" border="0">
        <tr>
          <td width="24%">Codigo</td>
          <td width="76%"><input name="id"  type="hidden"  id="id" value=" <? echo trim($rsCategoria["idcategoria"]); ?> " size="70" /></td>         
        </tr>
         <tr>
          <td>paginacion</td>
          <td><input name="paginacion"  type="hidden"  id="paginacion" value=" <? echo $paginacion; ?> " size="70" /></td>
         </tr>
        <tr>
          <td>descripcion</td>
          <td><input name="descripcion" type="text" class="text" id="descripcion" value="<? echo trim($rsCategoria["descripcion"]); ?>" size="40" /></td>
        </tr>
        <tr>
          <td>orden</td>
          <td><input name="orden" type="text" class="text" id="orden" value="<? echo trim($rsCategoria["orden"]); ?>" size="10" /></td>
        </tr>
        <tr>
          <td>Borrado</td>
          <td><input name="borrado" type="text" class="text" id="borrado" value="<? echo trim($rsCategoria["borrado"]); ?>" size="10" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><table  align="center" width="64%" border="0">
            <tr>
              <td><input type="submit" name="submit" id="button" value="Enviar" /></td>
              <td><input type="button" class="cancelar" name="cancelar" id="cancelar" value="Cancelar" onClick="Cancelar()" /></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td align="center" colspan="2">&nbsp;</td>
        </tr>
        </table>        
    </form>
    </td>
  </tr>
  <tr>
  </tr>
</table>
<?php
mysql_free_result($result); 
//include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 
?>
</body>
</html>