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
        <div id="ctn_slider">   		     
            <div class="slider">
                <?php include_once($cRutaWeb .'/inccabeceracontenido.php'); ?> 
            </div>     
        </div>                          
</div>  