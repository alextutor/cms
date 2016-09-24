<?php	session_start();// viene de funciones_web.php  (Contenido Dinamico) $rowads['ctiphome']=='4'
$s1 = substr($rowads['ccodseccion'],0,12);
$homesql   = "Select * FROM seccion where ccodseccion like '".$s1."%' and ccodmodulo='".$rowads['ccodmodulo'] ."' and cnivseccion='2'   and estado='1' order by cordcontenido asc  LIMIT 0 , ".$rowads['nnroitems']." ";				  
//echo $homesql;exit;
$hometabla = db_query($homesql);
$num_rows=mysql_num_rows($hometabla);
$sqlstylo   = "Select * FROM estiloclases  where ccodclase='".$rowads['ccodclase']."'";	
$rsstylo = db_query($sqlstylo);
$rowstylo  = db_fetch_array($rsstylo);
?>
<?php
//$nromenucab = db_num_rows($hometabla);echo $nromenucab;exit;	
if 	($rowads['ccodestilo']=='1805') // Inicio Si 1 
	{
	echo "<div class='cong_lista'>";	
	 $i=1;	
     $num_por_fila =3; 
     $contador= 0;	  		
	while($rowhome  = db_fetch_array($hometabla))
	{
		$nomurl   = crearurl_articulo($rowhome['ccodseccion']); //crearurl_articulo viene de include/funciones_web.php 
		//echo $nomurl;exit;
		//echo $rowhome['camiseccion'] ;exit;		
		//$ruta     = "/".$nomurl.$rowhome['camicontenido'];							
		$ruta     = "/".$nomurl."/".$rowhome['camiseccion'];							
		 if ($contador == 0) {  //si 1
		  	if ($num_rows==4 and $i==4 ) {  //si 1.1
				//echo "<div style='margin: 0 auto;width: 300px;'>";  //abre 1
			} ////fin si 1.1
			//echo "<div style='margin: 0 auto;'>";  //abre 1		  	 
		  }   //Fin Si 1
 	   if ($contador < $num_por_fila) {  //si 2 	   	
?>     
  <a href='<?=$ruta?>' title='<?=$rowhome[cnomcontenido]?>'>      
  <div class='<?=$rowstylo['cdesclase']?>'>  
      <div class='titulo'>
          <h4><?php echo $rowhome['cnomseccion']?></h4>
      </div>           
       <div class='imagen'> 						                                        
          <img src='/timthumb.php?src=<?=$rowhome['cimgseccion'] ?>&h=110&w=100&zc=0&q=100&s=1' border=0 title='<?= $rowhome['cnomseccion']?>' />	                  															  
       </div>             
    </div>                 
  </a>      
  <?php   
  	      ++$i;			 				   	   
		   $contador++; 			
		}   //Fin Si 2					
		if ($contador == $num_por_fila) {  // si 3
			$contador=0;
   			   echo"<div style='clear:both'></div>";
			 // echo"</div>"; 			 
		}   //Fin Si 3		
		       
   } // Fin while 
   echo "</div>";/*Fin cong_lista*/
} // Fin Si 1 
?>
<div class="clear"></div>	