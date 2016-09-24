<?php		
	$Title = "";
	$Description = "";
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/header.php'); 	
?> 
<?php  include($_SERVER['DOCUMENT_ROOT']. '/config.php');	  ?>
<SCRIPT LANGUAGE="JavaScript"> 
	function Cancelar(){		
	paginacion = "<?=$paginacion?>";
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/mantenimiento/mantDistrito.php?mensaje=Registro Cancelado' + '&paginacion='	+paginacion 		
	}
</script> 

<script language="JavaScript" type="text/javascript">
function validar_form(val) {
	cadena =document.getElementById("desc_distrito").value; 
	cadena = cadena.replace(/(^\s*)|(\s*$)/g,"");
	if (cadena.length==0) {
		alert("Debe rellenar el campo Descripcion Distrito.");
		document.getElementById("desc_distrito").focus();
		return false;
	} 

}

 </script>
    
<body>
<table align="center" class="estilotabla" width="80%" border="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    <form id="FormInsertar" name="FormInsertar" method="POST" action="<?php echo $ROOT_PATH?>/webadmin/mantenimiento/InsertarDistrito.php" onSubmit="return validar_form(this)">
    	<table width="93%" border="0">
        <tr>
          <td width="26%">Descripcion Distrito</td>
          <td width="74%"><input name="desc_distrito" type="text" class="text" id="desc_distrito" size="50" /></td>
        </tr>
        <tr>
          <td>Precio Soles</td>
          <td width="74%"><input name="precio_soles" type="text" class="text" id="precio_soles" size="10" /></td>
          </tr>
        <tr>
          <td>Mostrar</td>
          <td><label for="mostrar"></label>
            <select name="mostrar" id="mostrar">
              <option value="SI">SI</option>
              <option value="NO">NO</option>
            </select></td>
        </tr>
        <tr>
          <td>Borrado</td>
          <td><select name="borrado" id="borrado">
            <option value="NO">NO</option>
            <option value="SI">SI</option>
          </select></td>
        </tr>
        <tr>
          <td>Orden</td>
          <td><input name="orden" type="text" class="text" id="orden" size="5" /></td>
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
        </table>
        
    </form>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 
?>
</body>
</html>