<?php 
$anchoderelogo="derelogo_100";
if ($logoweb!= "") {
	$anchoderelogo="derelogo";	
?>	
    <div class="izqlogo">
         <img src="<?php echo $logoweb ?>"  alt="logo-gis" width="99%" height="100px"  />
    </div>     
 <?php } ?>
<div class="<?=$anchoderelogo?>">
	<div class="logocentro_cabecera_1">
    <?php /* inccabecera-top-1-1.php  Posicion = al Costado del logo(lado derecho generalmente)*/ 
		 include_once($cRutaWeb.'/inccabecera-top-1-1.php');	?> 
    </div>       
</div>  