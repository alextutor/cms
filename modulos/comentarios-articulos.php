<?php
	//echo $nTotal."----";exit;
  if ($nTotal<> 0 and $row['cestcompartirredes']==1){ // para compartir redes                       
	   include_once ($_SERVER['DOCUMENT_ROOT']. '/enlace_leido.php'); 
	}
  if ($nTotal<> 0 and $row['cestcomentario']==1){ // para comentario normal creado por mi
	  //include_once($_SERVER['DOCUMENT_ROOT'].'/disqus-comentario.php'); 				
	  echo "<br />";					
	  include_once($_SERVER['DOCUMENT_ROOT'].'/modulos/comentario-combinado-multiple/index.php'); 
  }
    if ($nTotal<> 0 and $row['cestcomenface']==1){ // para comentario facebook
                              //include_once($_SERVER['DOCUMENT_ROOT'].'/disqus-comentario.php'); 				
	  ?>	
	<div class="comentarios-facebook">
		<?php include_once($_SERVER['DOCUMENT_ROOT'].'/modulos/facebook/comentarios-facebook.php');
		 ?> 
	</div> 	 
 <?php 
 	} 
 ?>	             
              
                    
