<?Php 
$Title = "redes sociales facebook,twitter sobre hosting,dominio";
$Description = "redes sociales facebook,twitter sobre hosting,dominio";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/header.php');
?> 
<style type="text/css">
ul.linklist5 li{
	display: inline;
	list-style-type: none;	
	 display: inline;
       
}
ul.linklist5 li a img {
filter:alpha(opacity=100); 
-moz-opacity: .04; 
opacity: 0.4;
}

ul.linklist5 li a img:hover {
filter:alpha(opacity=70);   
-moz-opacity: 1.0;   
opacity: 1.0;
position: relative; 
top: -2px;
cursor:allowed;
}

ul.linklist5 li a img:active {
filter:alpha(opacity=0);   
-moz-opacity: .0;   
opacity: .0;
}

.cont_redes-sociales{
	float: right;	
	width:300px; /*310 px ver logo.php*/
	margin-top:-48px;
}
.cont_redes-sociales .siguenos{
	color:#FFF;
	width:85px;
	float:left;	
}
.cont_redes-sociales .redes-sociales{
	width:215px;
	float:right;
		
}	
	
</style>
<div class="cont_redes-sociales">
     <div class="siguenos">Siguenos en:</div> 
     <div class="redes-sociales">
         <ul class="linklist5">            
            <li> <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/redes-sociales/imagen/57x57/facebook.png" width="40" height="40" border="0" />
            </li>
            <li>
            <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/redes-sociales/imagen/57x57/twitter.png" width="40" height="40" border="0"/>
            </li>
             <li>
     
                <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/redes-sociales/imagen/57x57/youtube.png"  width="40" height="40" border="0"/>
            </li>            
          </ul>   
    </div>         
</div>    
<?php  include_once ($INC_DIR . '/footer.php');  ?> 