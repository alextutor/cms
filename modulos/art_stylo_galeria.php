<style type="text/css">
	.ctn_arti_galeria{width:100%; display:flex; justify-content: Space-between;Flex-wrap: wrap;}	
</style> 
<?php  
$sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido  and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' and c.estado='1' order by c.dfeccontenido desc ";
$rsgaleria = db_query($sql_query);
$num_rows = db_num_rows($rsgaleria);  

$sqlstylo   = "Select estiloclases.* FROM estiloclases,seccion s where s.ccodseccion='".$codsecc."' and  
 estiloclases.ccodclase=s.ccodclase";	  
$rsstylo = db_query($sqlstylo);
$rowstylo  = db_fetch_array($rsstylo);
?>
<div class="ctn_arti_galeria">
     <?php   				
	 while( ($rowfila=mysql_fetch_array($rsgaleria)) ) { //al terminar while el puntero esta en el ultimo registro						
		?>
           <div class='<?=$rowstylo['cdesclase']?>'> 
          	<div class="titulo">
          		<h4><?=$rowfila['cnomcontenido']?></h4>
            </div>
             <div class="imagen"> 					
                <a rel="shadowbox[galeria1]" href="<?=$rowfila['cimgcontenido']?>">						
         <img src='/timthumb.php?src=<?=$rowfila['cimgcontenido'] ?>&h=135&w=90&zc=0&q=100&s=1' 
         border=0 title="<?=$fila['cnomcontenido']?>" />	 
                 </a>	                                                 			                     											  
              </div>
          </div>
        <?php    	
			
	}//Fin While        					      
    ?>          
  <div class="clear"></div> 
</div><!--Fin ctn_arti_galeria--> 