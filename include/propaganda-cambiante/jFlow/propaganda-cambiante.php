<?php session_start();
//function contenidosweb esta defino las variables         ?>
<!-- SLIDER DE FOTOS -->
<!--lo puse en config_style.php
<script type="text/javascript" src="../../js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/webadmin/propaganda-cambiante/jFlow/js/jquery.flow.1.2.js"></script>
<script type="text/javascript">// <![CDATA[
$(document).ready(function(){
	$("#myController").jFlow({
		slides: "#slides",
		controller: ".jFlowControl", // must be class, use . sign
		slideWrapper : "#jFlowSlide", // must be id, use # sign
		selectedWrapper: "jFlowSelected",  // just pure text, no sign
		auto: true,		//auto change slide, default true
		width: "910px",
		height: "235px",
		duration:500,
		prev: ".jFlowPrev", // must be class, use . sign
		next: ".jFlowNext" // must be class, use . sign
	});
});
// ]]></script>
 -->
<style type="text/css">
		/* implementado por alex*/
	.cont_sec{position: relative;width: 100%; height: 190px; overflow: hidden;}
	.cont_slides{position: relative; width: 3640px; height: 190px; overflow: hidden; margin-left: -1820px;}
	.cont_slides_1{position: relative; width: 100%; height: 190px; float: left; overflow: hidden;}
	.jflow-content-slider{ margin:0 auto; margin-left:20px;}
</style>

<style type="text/css">
	#jFlowSlide{ }
	#myController { padding:2px 0;  width:250px;}
	#myController span.jFlowSelected { margin-right:0px; color: #99cc00; font-weight:bold;}
	
	.slide-wrapper { padding: 5px; }
	.slide-details  { width:340px; float:left;margin-right:10px;}
	
	
	.slide-thumbnail img {float:right;}
	.slide-thumbnail{ width:540px; float:right; margin-left:10px;}
	.slide-details h2 { font-size:14px; font-weight:normal; line-height: 1.3; margin:0;  text-align:center;color: #e64c0f; }
	.slide-details .description {margin-top:10px; margin-left:30px;}
	.slide-details .description p {	color: #012626;font: 12px "Open Sans",sans-serif; font-weight:bold; margin-bottom:12px;}
	.slide-details .description .dott {padding: 0 5px 0 0;}
	.jFlowControl, .jFlowPrev, .jFlowNext {  font-weight:bold; color: #00458a; cursor:pointer; padding-left:5px; padding-right:5px; padding-top:2px; padding-bottom:2px; }
	.jFlowControl:hover, .jFlowPrev:hover, .jFlowNext:hover { color: #00458a; font-weight:bold;}
</style>
<div class="jflow-content-slider"> <!--Inicio Contenedor general -->    
    <div id="jFlowSlide" class="cont_sec"><!--Inicio Contenedor seccion -->

    	<!----------------------Inicio Diapositiva Imagen --------------------->
       <div id="slides" class="cont_slides"> <!--Inicio Contenedor slides -->            
          <div class="cont_slides_1"> <!--Inicio Contenedor slides_1 -->    
              <div class="slide-wrapper">
                  <div>
                      <div class="slide-details">
                          <h2><strong><?php echo $titulo_propaganda_1_1?></strong></h2>
                          <div>
                              <div class="description">					                           	                                                                     
							  <?php echo $texto_propaganda_1_1?>
                              </div>
                          </div>
                       </div><!--Fin slide-details -->
                  </div>
                  <div>
                      <div class="slide-thumbnail">
                      	<img src="<?php echo $propaganda_1_1?>" width="450" height="180" alt="gis">
                      </div>
                  </div>
              </div> <!--Fin slide-wrapper -->
          </div>  <!--Fin Contenedor slides_1 -->
        <!----------------------Fin Diapositiva Imagen --------------------->    
       	<!----------------------Inicio Diapositiva Imagen --------------------->    
            <div class="cont_slides_1"> <!--Inicio Contenedor slides_1 -->    
              <div class="slide-wrapper">
                  <div>
                      <div class="slide-details">
                          <h2><strong><?php echo $titulo_propaganda_1_2?></strong></h2>
                          <div>
                              <div class="description"><?php echo $texto_propaganda_1_2?></div>
                          </div>
                       </div><!--Fin slide-details -->
                  </div>
                  <div>
                      <div class="slide-thumbnail">
				<img src="<?php echo $propaganda_1_2?>" width="450" height="180" alt="ordenamiento-territorio">
                      </div>
                  </div>
              </div> <!--Fin slide-wrapper -->
          </div>  <!--Fin Contenedor slides_1 -->
       <!----------------------Fin Diapositiva Imagen --------------------->
       
       	<!----------------------Inicio Diapositiva Imagen --------------------->    
            <div class="cont_slides_1"> <!--Inicio Contenedor slides_1 -->    
              <div class="slide-wrapper">
                  <div>
                      <div class="slide-details">
                          <h2><strong><?php echo $titulo_propaganda_1_3?></strong></h2>
                          <div>
                              <div class="description"><?php echo $texto_propaganda_1_3?></div>
                          </div>
                       </div><!--Fin slide-details -->
                  </div>
                  <div>
                      <div class="slide-thumbnail">
                      <img src="<?php echo $propaganda_1_3?>" width="450" height="180" alt="topografia">
                      </div>
                  </div>
              </div> <!--Fin slide-wrapper -->
          </div>  <!--Fin Contenedor slides_1 -->
       <!----------------------Fin Diapositiva Imagen --------------------->                
            
            
        </div><!--Fin Contenedor slides -->
    </div><!--Fin Contenedor seccion -->


	<div id="myController">
    	<span class="jFlowPrev">« </span>
        <span class="jFlowControl jFlowSelected">1</span>
        <span class="jFlowControl">2</span> 
        <span class="jFlowControl">3</span>               
        <span class="jFlowNext"> »</span>
    </div>
</div> <!--Fin Contenedor general -->