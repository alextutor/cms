<?php		
	$Title = "";
	$Description = "";
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/header.php'); 	
?> 
<?php
   include($_SERVER['DOCUMENT_ROOT']. '/config.php');	          
   $Registro=$_GET['Registro'];
   $page=trim($_GET['page']); 
   $result=mysql_query("select * from distrito  Where id_distrito='$Registro' ",$conexion);    
   $rsContactos=mysql_fetch_array($result);  
?>

<script language='JavaScript'>
function Cancelar(){
	page = "<?=$page?>";
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/mantenimiento/mantDistrito.php?mensaje=Registro cancelado' + '&page='	+ page 		     
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
<table width="100%" height="84%" border="0" align="center" class="estilotabla">  
  <tr>
    <td height="391" valign="top" >    
    <form id="form1" name="form1" method="POST" action="<?php echo $ROOT_PATH?>/webadmin/mantenimiento/ActualizaDistrito.php" onSubmit="return validar_form(this)">
    	<table width="93%" border="0">
        <tr>
          <td width="35%">Codigo</td>
          <td width="65%"><input name="id_distrito"  type="hidden"  id="id_distrito" value=" <? echo trim($rsContactos["id_distrito"]); ?> " size="70" /></td>         
        </tr>
         <tr>
          <td>paginacion</td>
          <td><input name="page"  type="hidden"  id="page" value=" <? echo $page; ?> " size="70" /></td>
         </tr>
        <tr>
          <td>Descripcion Distrito</td>
          <td><input name="desc_distrito" type="text" class="text" id="desc_distrito" value="<? echo trim($rsContactos["desc_distrito"]); ?>" size="40" />
            <a href="/infinitecarousel2/upload-resize108x96.php"></a></td>
        </tr>
        <tr>
          <td>Precio Soles</td>
          <td><input name="precio_soles" type="text" class="text" id="precio_soles" value="<? echo trim($rsContactos["precio_soles"]); ?>" size="10" /></td>
        </tr>
        <tr>
          <td>Mostrar</td>
          <td><select name='mostrar' id='mostrar'>
            <?php 
				   if ($rsContactos["mostrar"]=="SI") { 
                     echo "<option value='SI' SELECTED >SI</option>";
					 echo "<option value='NO'>NO</option>";       
                    } else  {  
                     echo "<option value='SI'>SI</option>";              
					 echo "<option value='NO' SELECTED>NO</option>";       
					} 
					?>
          </select></td>
        </tr>
        <tr>
          <td>Borrado</td>
          <td><select name='borrado' id='borrado'>
            <?php 
				   if ($rsContactos["borrado"]=="SI") { 
                     echo "<option value='SI' SELECTED >SI</option>";
					 echo "<option value='NO'>NO</option>";       
                    } else  {  
                     echo "<option value='SI'>SI</option>";              
					 echo "<option value='NO' SELECTED>NO</option>";       
					} 
					?>
          </select></td>
        </tr>
        <tr>
          <td>Orden</td>
          <td><input name="orden" type="text" class="text" id="orden" value="<? echo trim($rsContactos["orden"]); ?>" size="10" /></td>
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
include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 
?>
</body>
</html>