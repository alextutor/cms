<?php	session_start();// viene de funciones_web.php  (Contenido Dinamico) $rowads['ctiphome']=='4'
//lo utiliso para presentacion en portada
//Alex lo normal seria sacar de articulo_estilo02.php   y hacer un  SELECT * FROM  contenido c, seccioncontenido s, estilocontenido  pero
// nos limita solo mostrar los que solo tienen un contenido  mejor lo hice a mi modo y hago solo un select desde seccion
$s1 = substr($rowads['ccodseccion'],0,12);
$homesql   = "Select * FROM seccion where ccodseccion like '".$s1."%' and ccodmodulo='".$rowads['ccodmodulo'] ."' and cnivseccion='2'  and estado=1 order by cordcontenido asc  LIMIT 0 , ".$rowads['nnroitems']." ";				  
//echo $homesql;exit;
$hometabla = db_query($homesql);

$sqlstylo   = "Select * FROM estiloclases  where ccodclase='".$rowads['ccodclase']."'";	
$rsstylo = db_query($sqlstylo);
$rowstylo  = db_fetch_array($rsstylo);
//$nromenucab = db_num_rows($hometabla);echo $nromenucab;exit;	
$nmulticolor_1=1;
//echo $rowads['ccodestilo'];exit;
if 	($rowads['ccodestilo']=='1814') // Inicio Si 1 
  {
	  while($rowhome  = db_fetch_array($hometabla)) // Inicio While $hometabla
	  {
		$nomurl   = crearurl_articulo($rowhome['ccodseccion']);
		$ruta     = "/".$nomurl.$rowhome['camicontenido'];
		$s2Hori2nivel = substr($rowhome['ccodseccion'],0,16);
						
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
			break;          	
?>
<?php            		 		        	
	  	  case "portada_Resumen": // estilo clase
?>		  		  

   <div class="portada_item"> 
	  <div class="portada_item_imagen"> 
         <a href="<?=$ruta?>" title="<?=$rowhome['cnomcontenido']?>" <?=$enlacedestino?>>
               <img alt="" src="/timthumb.php?src=<?php echo $rowhome['cimgseccion']; ?>&h=60&w=80&zc=0&q=100&s=1" width="80px" height="60px" border="0"/>
         </a>       
   	  </div>      
      <div class="portada_item_contenido">
      	<div class="portada_item_contenido_titulo">     
          <a href="<?=$ruta?>" title="<?=$rowhome['cnomseccion']?>" <?=$enlacedestino?>>	
           <?php echo $rowhome['cnomseccion']; ?>     
          </a>
      	</div>
        <div class="portada_item_contenido_detalle">                 
        	<?php echo $rowhome['cdesseccion']; ?>     
        </div>
        <!----------------- Inicio 3er Nivel ------------>
        <!--Alex aqui lista los submenus que tuviera  -->
        <div class="portada_item_subItem">
        <?php 
		$sqlHori3nivel = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s2Hori2nivel."%'  and cnivseccion=3 and  estado='1' ORDER BY cordcontenido ASC   ";	
		$resHori3nivel = db_query($sqlHori3nivel);
		$nroHori3nivel = db_num_rows($resHori3nivel);		
		while ($rowHori3nivel = db_fetch_array($resHori3nivel))  //Inicio while 3er Menu       				
		{
		$tipoHori3nivel = $rowHori3nivel['ctipseccion'];
		switch($tipoHori3nivel)
		  {
		  case 1:
			  $enlaceHori3nivel = "/".$rowmenucab['camiseccion']."/".$rowhome['camiseccion']."/".$rowHori3nivel['camiseccion'];						
			  //antes era a nivel de seccion ahora es a nivel de web en tabla estilopagina	
		  //if ($mostrarurlcatebase=="NO"){
			  if ($_SESSION['mostrarurlcatebase']	=="NO"){		
				  $enlaceHori3nivel = "/".$rowHori3nivel['camiseccion'];							
			  }   	  	
			  break;
		  case 2:
			  $enlaceHori3nivel = $rowHori3nivel['curlseccion'];
			  break;
		  }	
		?>	
			<a href='<?=$enlaceHori3nivel?>'> <?=$rowHori3nivel['cnomseccion']?></a>
        <?php    
			} //Fin  while 3er Menu       				
		?>
        </div>
       <!----------------- Fin 3er Nivel ------------>
      </div>                
    </div><!-- fin portada_item-->
<?php            		 		        	
		  break;				  
  			
		   } // Fin case	
		$nmulticolor_1++;
		} // Fin while $hometabla
} // Fin Si 1 

?>
			
    	    
            
	