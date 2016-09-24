<?php include($_SERVER['DOCUMENT_ROOT']. '/webadmin/seguridad/seguridad.php') ; ?>
<?Php 
$Title = "";
$Description = "";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/webadmin/header.php');
?>
<table width="54%" border="0" align="center"  bgcolor="#ffffff">
  <tr>
    <td><? //include('../cabecera.php'); ?>
    </td>
  </tr>
  <tr>
    <td width="84%"><!-- Begin Publishing Scripts of Flash Menu menu_sisdataweb -->
        <!-- End Publishing Scripts of Flash Menu menu_sisdataweb -->
    </td>
  </tr>
  <tr>
    <td height="214"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tablamarco1">
      <tr>
        <td height="42">&nbsp;</td>
        <td height="42" align="left"><!-- Begin Publishing Scripts of Flash Menu menu_sisdataweb -->
              <!-- Begin Publishing Scripts of Flash Menu menu_sisdataweb -->
          <!-- End Publishing Scripts of Flash Menu menu_sisdataweb -->
              <!-- End Publishing Scripts of Flash Menu menu_sisdataweb -->        </td>
        <td><table width="90" border="0">
          <tr>
            <td align="center"><div align="right"><a href="<?php echo ROOT_PATH?>/webadmin/seguridad/salir.php"><img src="<?php echo ROOT_PATH?>/webadmin/seguridad/imagen/salir.gif" width="60" height="17" /></a></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="24" height="106">&nbsp;</td>
        <td width="682" valign="top">
          <p><a href="<?php echo ROOT_PATH?>/webadmin/mantenimiento/contenedor_man_produ_admi.php" target="_parent">Mantenimiento Productos</a><br>
            <a href="<?php echo ROOT_PATH?>/webadmin/mantenimiento/mantCategoriaAdmi.php" target="_parent">Mantenimiento Categoria</a><br>
            <a href="<?php echo ROOT_PATH?>/webadmin/mantenimiento/mantSub_CategoriaAdmi.php" target="_parent">Mantenimiento SubCategoria</a><br />
        <td width="72">&nbsp;</td>
      </tr>     
    </table></td>
  </tr>
  <tr>
    <td><div align="center"><?php  include_once ($_SERVER['DOCUMENT_ROOT']. '/pie-abajo.php');  ?> </div>
    </td>
  </tr>
</table>
 <?php  include_once ($INC_DIR . '/footer.php');  ?> 
