<?php $idsec=$_GET['idsec'];$idsec2=$_GET['idsec2']; $idsec3=$_GET['idsec3']; $idsec4=$_GET['idsec4']; 
//echo "idsec2=".$idsec2   
//echo "idsec=".$idsec ."---idsec2=" .$idsec2 ."----idsec3=".$idsec3 ."---idsec4=".$idsec4;exit;
?>

<div class="miga">	<!--inicio breadcrumbs vea css homestyle-->
		<?php
        $sqlmenucab1 = "SELECT * from seccion s where s.camiseccion='".$idsec."' and estado=1";	
		$resmenucab1 = db_query($sqlmenucab1);
		$nromenucab1 = db_num_rows($resmenucab1);
        	while ($rowmenucab1 = db_fetch_array($resmenucab1)) 
			{
				$cnomseccion1=$rowmenucab1['cnomseccion'];		
			}				    
        ?>
		<a class="breadCrumb" href="/index.php">Inicio</a>        
        <img class="breadCrumbIMG" src="/webadmin/imagen/flechita.gif" width="1" height="1">
        <a class="breadCrumb" href="<?php echo "/".$idsec ?>"><?php echo $cnomseccion1  ?></a>
	 	<?php 
		if ($idsec2 !="") { //si 2
			//echo "idsec2=".$idsec2;
		   	$sqlmenucab2 = "SELECT * from seccion s where s.camiseccion='".$idsec2."' and estado=1";	
			//echo $sqlmenucab2 ;exit;
			$resmenucab2 = db_query($sqlmenucab2);
			$nromenucab2 = db_num_rows($resmenucab2);
			//echo $sqlmenucab ;exit;
			//echo $nromenucab;exit;
			if ($nromenucab2>0) {
			  while ($rowmenucab2 = db_fetch_array($resmenucab2)) 
			  {
				  $cnomseccion2=$rowmenucab2['cnomseccion'];		
			  }
			}else{
			  $sqlmenuconte2 = "SELECT * from contenido c3 where c3.camicontenido='".$idsec2."' and estado=1";	
			  $resmenuconte2 = db_query($sqlmenuconte2);
			  $nromenuconte2 = db_num_rows($resmenuconte2);
			  //echo $sqlmenuconte3 ;exit;
			  while ($rowmenuconte2 = db_fetch_array($resmenuconte2)) 
			  {
				  $cnomseccion2=$rowmenuconte2['camicontenido'];		
			  }		
			}	
								
		?>	
		<img class='breadCrumbIMG' src='/webadmin/imagen/flechita.gif' width='1' height='1'>  
		<a class='breadCrumb' href="<?php echo "/".$idsec."/".$idsec2 ?>"><?php echo $cnomseccion2 ?></a>
        <?php	
			if ($idsec3 !="") {
				$sqlmenucab3 = "SELECT * from seccion s where s.camiseccion='".$idsec3."' and estado=1";	
				$resmenucab3 = db_query($sqlmenucab3);
				$nromenucab3 = db_num_rows($resmenucab3);
				//echo $sqlmenucab3 ;exit;
				//echo $nromenucab;exit;
				if ($nromenucab3>0) {
					while ($rowmenucab3 = db_fetch_array($resmenucab3)) 
					{
						$cnomseccion3=$rowmenucab3['cnomseccion'];		
					}	
				}else{
					$sqlmenuconte3 = "SELECT * from contenido c3 where c3.camicontenido='".$idsec3."' and estado=1";	
					$resmenuconte3 = db_query($sqlmenuconte3);
					$nromenuconte3 = db_num_rows($resmenuconte3);
					//echo $sqlmenuconte3 ;exit;
					while ($rowmenuconte3 = db_fetch_array($resmenuconte3)) 
					{
						$cnomseccion3=$rowmenuconte3['cnomcontenido'];		
					}		
				}
		 ?>	
    	     <img class='breadCrumbIMG' src='/webadmin/imagen/flechita.gif' width='1' height='1'>  
			 <a class='breadCrumb' href="<?php echo "/".$idsec."/".$idsec2 ."/".$idsec3 ?>">
			 <?php echo $cnomseccion3 ?></a>
          
           <?php	
			if ($idsec4 !="") {
				$sqlmenucab4 = "SELECT * from seccion s where s.camiseccion='".$idsec4."' and estado=1";	
				$resmenucab4 = db_query($sqlmenucab4);
				$nromenucab4 = db_num_rows($resmenucab4);
				//echo $sqlmenucab ;exit;
				//echo $nromenucab;exit;
				while ($rowmenucab4 = db_fetch_array($resmenucab4)) 
				{
					$cnomseccion4=$rowmenucab4['cnomseccion'];		
				}	
		 ?>	
    	     <img class='breadCrumbIMG' src='/webadmin/imagen/flechita.gif' width='1' height='1'>  
			 <a class='breadCrumb' href="<?php echo "/".$idsec."/".$idsec2 ."/".$idsec3 ."/".$idsec4 ?>">
			 <?php echo $cnomseccion4 ?></a>   
             
          <?php	
		   } //Fin si 4				
			 } //Fin si 3			 
		 }	//Fin si 2	 

			  //echo "<img class='breadCrumbIMG' src='/webadmin/imagen/flechita.gif' width='1' height='1'>";  
			  //echo "<a class='breadCrumb' href='/".$idsec."/".$idsec2."'>" . $cnomseccion2 . "</a>";	          	
			 
		?> 
        	                        
        <?php echo $Title ?>
</div>