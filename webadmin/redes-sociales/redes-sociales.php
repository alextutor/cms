<?Php 
$Title = "redes sociales facebook,twitter sobre hosting,dominio";
$Description = "redes sociales facebook,twitter sobre hosting,dominio";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/header.php');
?> 
<style type="text/css">
.menuredes {
	float:right;	
	list-style:none;
	margin:0 auto;
	height:43px;
	margin-right:10px;	
}
.menuredes li {
	float:left;
	position:relative;
	padding-left:5px;	
}
.menuredes li img {
	filter:alpha(opacity=100); 
	-moz-opacity: .04; 
	opacity: 0.4;
}

.cont_redes-sociales{	
	width:300px; /*310 px ver logo.php*/
}
.siguenos{
	color:#FFF;
	width:85px;
	float:left;	
}
	
</style>
<div>
     <div class="siguenos">Siguenos en:</div> 
         <ul class="menuredes">            
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
<?php  include_once ($INC_DIR . '/footer.php');  ?> 