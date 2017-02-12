<!--
http://www.martiniglesias.eu/blog/combobox-o-selects-dependientes-de-3-niveles-con-php-y-jquery/158
http://www.martiniglesias.eu/demos/combobox/index.php
 -->
<?php
function idpadre($nombre,$valor)
{
//include_once $_SERVER['DOCUMENT_ROOT']."/config.php";
//include("config.inc.php");
$s1mm = substr('121728122015000000000000',0,12);	//Repuestos por Marca de Motor	
 $sqlmenumm1 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s1mm."%'  and cnivseccion=2 and  estado='1' ORDER BY cordcontenido ASC";
//$query = "SELECT * from padre order by padre";
//mysql_select_db($dbname);
$result = mysql_query($sqlmenumm1);
echo "<select name='$nombre' id='$nombre' class='select_filtro_categoria'>";
echo "<option value=''>[Seleccionar Marca Motor]</option>";
while($registro=mysql_fetch_array($result))
{
echo "<option value='".$registro["ccodseccion"]."'";
if ($registro["ccodseccion"]==$valor) echo " selected";
echo ">".$registro["cnomseccion"]."</option>\r\n";
}
echo "</select>";
}
function idhijo($nombre,$valor)
{
//include_once $_SERVER['DOCUMENT_ROOT']."/config.php";		
//include("config.inc.php");
//$s3_1 = substr($rowmenucab3_2['ccodseccion'],0,20);
//$sqlmenumm3_1 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s3_1."%'  and cnivseccion=2 and  estado='1' ORDER BY cordcontenido ASC";
//$s2_mm = mysql_real_escape_string(intval($_GET["idpadre"]));
//$s2_mm ="1217281220150001";    
$s2_mm ="ALEX";    
$sqlmenumm2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s2_mm."%'  and cnivseccion=3 and  estado='1' ORDER BY cordcontenido ASC";
//mysql_select_db($dbname);
$result = mysql_query($sqlmenumm2);
echo "<select name='$idhijo' id='$idhijo' class='select_filtro_categoria'>";
echo "<option value=''>[Seleccionar Modelo Motor]</option>";
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
$("#idpadre").change(function(event)
{
var idpadre = $(this).find(':selected').val();
$("#pidhijo").html("<img src='loading.gif' />");
$("#pidhijo").load('/modulos/marca_motor/llenar_combobox.php?buscar=hijos&idpadre='+idpadre);
var idhijo = $("#idhijo").find(':selected').val();
});
$("#idhijo").live("change",function(event)
{
var id = $(this).find(':selected').val();
});
});
</script>

<!--<div id="resultados"> <?php //if (isset($_POST)) print_r($_POST); ?></div> -->
<form method="post" action="filtro-por-marca-motor">
<fieldset>
<div class="titulo_filtro_categoria"><strong>Repuestos por Marca de Motor</strong></div>
<p><?php idpadre("idpadre","1"); ?></p>
<p id="pidhijo"><?php idhijo("idhijo","2"); ?></p>
<p align="right" ><input type="submit" name="submit" value="Mostrar resultados" /></p>
</fieldset>
</form>