<?php 
$sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido  and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' order by c.dfeccontenido desc ";
$rsgaleria = db_query($sql_query);
$num_rows = db_num_rows($rsgaleria);  

$sqlstylo   = "Select estiloclases.* FROM estiloclases,seccion s where s.ccodseccion='".$codsecc."' and  
 estiloclases.ccodclase=s.ccodclase";	  
$rsstylo = db_query($sqlstylo);
$rowstylo  = db_fetch_array($rsstylo);

?>
<div class="cong_lista">
     <?php   				
	   $i=1;	
	  $num_por_fila =3; 
  	  $contador= 0;
	  while( ($rowfila=mysql_fetch_array($rsgaleria)) ) { //al terminar while el puntero esta en el ultimo registro						
		  if ($contador == 0) {  //si 1
		  	if ($num_rows==4 and $i==4 ) {  //si 1.1
				echo "<div style='margin: 0 auto;width: 200px;'>";  //abre 1
			} //fin si 1.1			
			echo "<div style='margin: 0 auto;'>";  //abre 1		  	 
		  }   //Fin Si 1	
		  if ($contador < $num_por_fila) {  //si 2	
			  	if (($num_rows < $num_por_fila) and ($contador==$num_por_fila-2) ) {  
				//si 3 si devuelve  2 registros y tenemos 3 por fila que inserte un espacio vacio en el medio 					
					//echo "<div  class='".$rowstylo['cdesclase']."_vacio'></div>"	;
				} // fin si 3
		?>
           <div class="<?php echo $rowstylo['cdesclase']?>"> 
          	<div class="titulo">
          		<h4><?php echo $rowfila['cnomcontenido']?></h4>
            </div>
             <div class="imagen"> 					
                <a rel="shadowbox[galeria1]" href="<?=$rowfila['cimgcontenido']?>">						
         <img src='/timthumb.php?src=<?=$rowfila['cimgcontenido'] ?>&h=110&w=90&zc=0&q=100&s=1' border=0 title="<?php echo $fila['cnomcontenido']?>" />	 
                 </a>	                                                 			                     											  
              </div>
          </div>
        <?php
    	   ++$i;			 				   	   
		   $contador++; 			
		}   //Fin Si 2					
		if ($contador == $num_por_fila) {  // si 3
			$contador=0;
   			   echo"<div style='clear:both'></div>";
			  echo"</div>"; 			 
		}   //Fin Si 3								
	}//Fin While        					      
    ?>          
  <div class="clear"></div> 
</div><!--Fin cong_lista--> 