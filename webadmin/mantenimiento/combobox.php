<?php 
//http://www.forosdelweb.com/f18/combobox-dinamicos-php-2-mas-combos-anidados-575482/
include("Mysql.php");
//include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
$db = new MySQL();
$consulta_categoria = $db->consulta("SELECT * FROM categoria");  
echo '<html>';
echo '<form method="GET" action="mantProductosAdmi.php">'; 

$categoria=$_GET['categoria'];
$Subcategoria=$_GET['Subcategoria'];
            
echo '<select name="categoria"   onChange="submit()" style="position:absolute;left:14px;top:5px;width:186px;font-family:Times New Roman;font-size:16px;z-index:0">';
if ($db->num_rows($consulta_categoria)>0){
//echo "<option value= '$categoria'>".$categoria.'</option>';

while ($resultado=$db->fetch_array($consulta_categoria)){
	$selected = ( $resultado["idcategoria"]==$categoria) ? ' selected="selected" ' : '' ;
	if ($categoria !="")
	{
	   echo '<option value= "'.$resultado['idcategoria'].'" ' . $selected. ' >'.$resultado['descripcion'].'</option>';	
	}
	else{
		   echo '<option value= "'.$resultado['idcategoria'].'" ' . "Seleccionar". ' >'.$resultado['descripcion'].'</option>';	
	}	
}
}
echo '</select>';
echo '<br>';							
							                             
$consulta_cod_categoria = $db->consulta("SELECT idcategoria FROM categoria WHERE idcategoria ='$categoria'");
$resultado_cod_categoria=$db->fetch_array($consulta_cod_categoria);
$cod_categoria=$resultado_cod_categoria['idcategoria'];
$consulta_Subcategoria = $db->consulta("SELECT * FROM subcategoria where idcategoria ='$cod_categoria'");
    
    
echo '<select name="Subcategoria"   onChange="submit()" style="position:absolute;left:14px;top:35px;width:186px;font-family:Times New Roman;font-size:16px;z-index:1">';
if ($db->num_rows($consulta_Subcategoria)>0){
//echo "<option value= '$Subcategoria'>".$Subcategoria.'</option>';
while ($resultado=$db->fetch_array($consulta_Subcategoria)){
	$selected = ( $resultado["idsubcategoria"]==$Subcategoria) ? ' selected="selected" ' : '' ;	
    echo '<option value= "'.$resultado['idsubcategoria'].'" ' . $selected. ' >'.$resultado['descripSubcategoria'].'</option>';	
}
}
echo '</select>';
echo '<br>';  


echo '</select>';        
echo '<input type="submit" name="enviar" id="enviar" value="Enviar" /> </form>';
echo '</html>';
?> 