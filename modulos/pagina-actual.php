<?php 
$idsec= $_GET['idsec'];$idsec2= $_GET['idsec2'];	
if (!empty($idsec) and empty ($idsec2)) {$cpaginaactual=$idsec;}
if (!empty($idsec) and !empty ($idsec2)) {$cpaginaactual=$idsec2;}
?>