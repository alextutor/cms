<!--
http://www.martiniglesias.eu/blog/combobox-o-selects-dependientes-de-3-niveles-con-php-y-jquery/158
http://www.martiniglesias.eu/demos/combobox/index.php
 idpadre=idMarcaVehiculo  ; idhijo =idModeloVehiculo ; pidhijo = pModeloVehiculo ; idhijo  = idModeloVehiculo ;
 -->
<?php
function idMarcaVehiculo($nombre,$valor)
{
//include_once $_SERVER['DOCUMENT_ROOT']."/config.php";
//include("config.inc.php");
$s1mm = substr('121728122014000000000000',0,12);	//Repuestos por Marca de Vehiculo	
 $sqlmenumm1 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s1mm."%'  and cnivseccion=2 and  estado='1' ORDER BY cordcontenido ASC";
//$query = "SELECT * from padre order by padre";
//mysql_select_db($dbname);
$result = mysql_query($sqlmenumm1);
echo "<select name='$nombre' id='$nombre' class='select_filtro_categoria'>";
echo "<option value=''>[Seleccionar Marca Vehiculo]</option>";
while($registro=mysql_fetch_array($result))
{
echo "<option value='".$registro["ccodseccion"]."'";
if ($registro["ccodseccion"]==$valor) echo " selected";
echo ">".$registro["cnomseccion"]."</option>\r\n";
}
echo "</select>";
}
function idModeloVehiculo($nombre,$valor)
{
//include_once $_SERVER['DOCUMENT_ROOT']."/config.php";		
//include("config.inc.php");
//$s3_1 = substr($rowmenucab3_2['ccodseccion'],0,20);
//$sqlmenumm3_1 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s3_1."%'  and cnivseccion=2 and  estado='1' ORDER BY cordcontenido ASC";
//$s2_mm = mysql_real_escape_string(intval($_GET["idMarcaVehiculo"]));
//$s2_mm ="1217281220150001";    
$s2_mm ="ALEX";    
$sqlmenumm2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s2_mm."%'  and cnivseccion=3 and  estado='1' ORDER BY cordcontenido ASC";
//mysql_select_db($dbname);
$result = mysql_query($sqlmenumm2);
echo "<select name='$idModeloVehiculo' id='$idModeloVehiculo' class='select_filtro_categoria'>";
echo "<option value=''>[Seleccionar Modelo Vehiculo]</option>";
while($registro=mysql_fetch_array($result))
{
echo "<option value='".$registro["ccodseccion"]."'";
if ($registro["ccodseccion"]==$valor) echo " selected";
echo ">".$registro["cnomseccion"]."</option>\r\n";
}
echo "</select>";
}
?>
<!--
<script type="text/javascript" src="/modulos/marca_motor/demo/jquery.js"></script>
 -->
 <script src="/include/js/jquery-1.7.1.min.js" type="text/javascript"></script> 
<script type="text/javascript">
$(document).ready(function() {
/* COMBOBOX */
$("#idMarcaVehiculo").change(function(event)
{
var idMarcaVehiculo = $(this).find(':selected').val();
$("#pModeloVehiculo").html("<img src='loading.gif' />");
$("#pModeloVehiculo").load('/modulos/marca_vehiculo/llenar_combobox_marca_vehiculo.php?buscar=hijos&idMarcaVehiculo='+idMarcaVehiculo);
var idModeloVehiculo = $("#idModeloVehiculo").find(':selected').val();
});
$("#idModeloVehiculo").live("change",function(event)
{
var id = $(this).find(':selected').val();
});
});
</script>

<!--<div id="resultados"> <?php //if (isset($_POST)) print_r($_POST); ?></div> -->
<form method="post" action="filtro-por-marca-vehiculo">
<fieldset>
<div class="titulo_filtro_categoria"><strong>Repuestos por Marca de Vehiculo</strong></div>
<p><?php idMarcaVehiculo("idMarcaVehiculo","1"); ?></p>
<p id="pModeloVehiculo"><?php idModeloVehiculo("idModeloVehiculo","2"); ?></p>
<p align="right" ><input type="submit" name="submit" value="Mostrar resultados" /></p>
</fieldset>
</form>