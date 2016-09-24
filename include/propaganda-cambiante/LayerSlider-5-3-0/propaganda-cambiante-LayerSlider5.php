<!-- LayerSlider stylesheet --><!-- Slide -->                        
<div id="slider-wrapper">	
	<div id="layerslider" style="width:980px;height:240px;max-width:980px;">				
          <!-- slide with custom settings -->    
          <div class="ls-slide" data-ls="slidedelay:3000;transition2d:11;">
              <img src="<?php echo $propaganda_1_1?>" class="ls-bg" alt="Slide background"/>
              <img class="ls-l" style="top:0px;left:0px;white-space: nowrap;" data-ls="offsetxin:0;durationin:2000;easingin:linear;offsetxout:0;durationout:6000;showuntil:1;easingout:linear;"
              src="<?php echo $propaganda_1_1?>" alt="">
              
			  <?php if($titulo_propaganda_1_1<>""){ ?>
               <p class="ls-l" style="top:50%;left:70%;font-weight: 300; background: white; background:#fa6b4b;height:40px;padding-right:5px;padding-left:5px;font-size:20px;line-height:40px;color:#ffffff;white-space: nowrap;" data-ls="offsetxin:0;rotatexin:-70;scalexin:3;scaleyin:3;offsetxout:0;durationout:5000;showuntil:500;rotatexout:70;scalexout:0.5;scaleyout:0.5;">
                      <?php echo $titulo_propaganda_1_1?>
               </p> 
               <?php } ?>                                      
               
          </div>                               
          <!-- slide with custom settings -->     	 
          <div class="ls-slide" data-ls="slidedelay:3000;transition2d:11;">
              <img src="<?php echo $propaganda_1_2?>" class="ls-bg" alt="Slide background"/>
              
			  <?php if($titulo_propaganda_1_2<>""){ ?>
              <h1 class="ls-l" style="top:50%;left:70%;font-weight: 300;height:40px;padding-right:10px;padding-left:10px;font-size:20px;line-height:40px;color:#ffffff;background:#fa6b4b;border-radius:4px;white-space: nowrap;" data-ls="offsetxin:0;durationin:2500;delayin:1000;rotateyin:350;transformoriginin:right 20% 0;offsetxout:0;durationout:3500;showuntil:1;easingout:easeInBack;rotateyout:-90;transformoriginout:right 20% 0;">
              <?php echo $titulo_propaganda_1_2?>
              </h1> 
              <?php } ?>                
              
          </div>
          <!-- slide with custom settings -->
          <div class="ls-slide" data-ls="slidedelay:3000;transition2d:11;">
              <img src="<?php echo $propaganda_1_3?>" class="ls-bg" alt="Slide background"/>
                
             <?php if($titulo_propaganda_1_3<>""){ ?>
                <p class="ls-l" style="top:50%;left:70%;font-weight: 300; background: white; background:#fa6b4b;height:40px;padding-right:10px;padding-left:10px;font-size:20px;line-height:40px;color:#ffffff;white-space: nowrap;" data-ls="offsetxin:0;rotatexin:-70;scalexin:3;scaleyin:3;offsetxout:0;durationout:4000;showuntil:500;rotatexout:70;scalexout:0.5;scaleyout:0.5;">
                     <?php echo $titulo_propaganda_1_3?>
               </p>                        
              <?php } ?>  
               
          </div>                 
    </div>  <!--  Fin layerslider -->
</div>   
<style type="text/css">
 #slider-wrapper {
	/*margin: 0 auto;
	/*padding: 10px;
	background-color:#E1DED9;*/
	/*max-width: 980px;*/
}
</style>
