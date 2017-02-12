<?php
$options="";
/*
http://www.jose-aguilar.com/blog/combos-dependientes-con-jquery-ajax-y-php/
if ($_POST["elegido"]==1) {
    $options= '
    <option value="1">4</option>
    <option value="2">5</option>
    <option value="3">7</option>
    <option value="4">21</option>
    <option value="5">Scennic</option>
    <option value="6">Traffic</option>
    ';    
}
*/     
   include($_SERVER['DOCUMENT_ROOT']. '/config.php');	 
   $sqlclase = db_query("select * from  condominio_departamentos where asignado='NO' and idseccion='".$_POST["elegido"]."'");  
	while($rowclase = db_fetch_array($sqlclase)) 
	{                        
	 $options .= '<option value="' . $rowclase['iddepartamento'].'" >' .utf8_encode($rowclase["nombredepartamento"]). '</option>';
	} 				
					   
   echo $options;    
?>