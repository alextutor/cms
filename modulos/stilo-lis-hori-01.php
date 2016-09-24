<?php	session_start();// viene de funciones_web.php  (Contenido Dinamico) $rowads['ctiphome']=='4'
$s1 = substr($rowads['ccodseccion'],0,12);
$homesql   = "Select * FROM seccion where ccodseccion like '".$s1."%' and ccodmodulo='".$rowads['ccodmodulo'] ."' and cnivseccion='2' order by cordcontenido asc  LIMIT 0 , ".$rowads['nnroitems']." ";				  
//echo $homesql;exit;
$hometabla = db_query($homesql);

$sqlstylo   = "Select * FROM estiloclases  where ccodclase='".$rowads['ccodclase']."'";	
$rsstylo = db_query($sqlstylo);
$rowstylo  = db_fetch_array($rsstylo);
//$nromenucab = db_num_rows($hometabla);echo $nromenucab;exit;	
$nmulticolor_1=1;
if 	($rowads['ccodestilo']=='1804') // Inicio Si 1 
  {
	  while($rowhome  = db_fetch_array($hometabla))
	  {
		$nomurl   = crearurl_articulo($rowhome['ccodseccion']);
		$ruta     = "/".$nomurl.$rowhome['camicontenido'];				
		switch ($rowstylo['cdesclase']) {  // estilo clase
		   case "cuadrado_multicolor":        	
?>		
      <div id="<?=$rowstylo['cdesclase']?>" class="multicolor_<?=$nmulticolor_1?>">                             
          <a href="<?=$ruta?>" title='<?=$rowhome[cnomcontenido]?>'>
             <div class="titulo"><?=$rowhome['cnomseccion'] ?> </div>
             <div class="imagen"><img src="/imagen/12172813/color-icon1.png" height="97px"/> </div>                
          </a>	        
      </div>	
<?php            
		  break;	
		  case "stylo_col_4": // estilo clase
		 	echo "<a href='$ruta' title='$rowhome[cnomcontenido]'>
			<div id='".$rowstylo['cdesclase']."'>" 
			.$rowhome['cnomseccion']."
			</div></a>";	 
			
?>
<?php            		 		        	
			break;
		   } // Fin case	
		$nmulticolor_1++;
		} // Fin while 
} // Fin Si 1 




?>
			
    	    
            
	