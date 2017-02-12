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
		<div class="logocentro_cabecera_1"><img src="/imagen/12172816/solucion-servicios-cabecera-pagina.png" alt=""> </div>
        <div class="logocentro_cabecera_2"><img src="/imagen/12172816/logo_kankyo_subtitulo.png" alt="">  </div>     
        <div id="ctn_slider">   		     
            <div class="slider">
                <?php include_once($cRutaWeb .'/inccabeceracontenido.php'); ?> 
            </div>     
        </div>                          
</div>  