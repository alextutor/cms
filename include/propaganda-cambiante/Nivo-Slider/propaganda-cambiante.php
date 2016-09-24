<?php
  // getBrowser esta en mis-funciones.php y en funciones.php
  $ua=getBrowser();	   
  if ($ua['name']=="Internet Explorer") {
?>	
    <div class="slider"><img src="<?php echo $propaganda_1_1?>" alt="" width="99%" />        </div>	
<?php } else {
		?>
	<link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT']?>/webadmin/propaganda-cambiante/Nivo-Slider/css/nivo-slider.css" type="text/css" media="screen" /> 
	<link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT']?>/webadmin/propaganda-cambiante/Nivo-Slider/css/default.css" type="text/css" media="screen" />	
	<script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
	<!--Inicio Nivo-Slider -->
	<script src="<?php $_SERVER['DOCUMENT_ROOT']?>/webadmin/propaganda-cambiante/Nivo-Slider/js/jquery.nivo.slider.pack.js" type="text/javascript">
    </script>
			<script type="text/javascript"> 
				$(window).load(function() {
					$('#slider').nivoSlider(
					
					);
				});
	</script> 
	<!--Fin Nivo-Slider -->	
	 <!--Inicio Lo puse en pie-abajo      
	<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script> 
	<script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
			<script type="text/javascript"> 
				$(window).load(function() {
					$('#slider').nivoSlider();
				});
			</script> 
	Fin Lo puse en pie-->       	
	<div class="slider-wrapper theme-default">
      <div id="slider" class="nivoSlider">
          <img src="<?php echo $propaganda_1_1?>" alt="" width="99%" data-transition="fade" />
          <img src="<?php echo $propaganda_1_2?>" alt="" width="99%" data-transition="boxRainGrowReverse" />
          <img src="<?php echo $propaganda_1_3?>" alt="" width="99%" data-transition="slideInLeft" />
	   </div>  
	</div>        
<?php }	 ?>
