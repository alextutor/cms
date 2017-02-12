<?php
if ($_POST['idopera']=='1')//cuando se cambia con el combo el cliente
{
	ob_start();
	session_start();	
	include "../config.php";
	$pagew   = $_POST['idpage'];
	$modulo = $_POST['idmodulo'];
	$iditem = $_POST['iditem'];
	$_SESSION['page']=$_POST['idpage'];
}
else //cuando entra por primera vez
{	
	//$pagew = $pageweb;
	$pagew =$_SESSION['page'];//alex
	//echo $pagew ;exit;
	//$iditem = $_GET['IDpro'];//alex
	$iditem = $_GET['id'];
	$_SESSION['page']=$pagew;
	$modulo = $_SESSION['modulo'];
}
?>
<form action="" method="post">
  <ul id="menuseccion">
  	<?php 
	// Primer Nivel1
	$sqlselec1="SELECT s.ccodseccion, s.cnomseccion, s.cnivseccion  FROM seccion s, webmodulos w WHERE 
			 s.ccodmodulo=w.ccodmodulo	and	s.ccodpage='".$pagew."' and s.estado ='1' and s.cnivseccion='1' 
			 and s.ctipseccion='1'     and w.es_producto='S' order by s.cordcontenido";
	$seccion_sql = db_query($sqlselec1);				 
	while($row_seccion = db_fetch_array($seccion_sql))  // Inicio While 1
	 {
	 	$s1sql = db_query("select * from seccioncontenido where ccodseccion='".$row_seccion['ccodseccion']."' and ccodcontenido='".$iditem."'");
		$s1ok = db_num_rows($s1sql);
		$niv1cod = substr($row_seccion['ccodseccion'],0,12); // Para Nivel2	 			 
		if ($s1ok=='0')	{		        
		 $checked1=" ";
		}else{
		  $checked1=" checked";
		}  							 
	?>
     <li> 					<!-- Inicio Li 1Nivel-->
      <input type="checkbox" name="select<?=$row_seccion['ccodseccion']?>"<?=$checked1?> />
      	<?php echo $row_seccion['cnomseccion'] ?>
        
         <!----------------------INICIO 2 NIVEL------------------------------------------->
        <?php
          	$sqlselec2="SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodseccion like '".$niv1cod."%' and estado ='1' and cnivseccion='2' and ctipseccion='1'  order by cordcontenido";								
			$seccion2_sql = db_query($sqlselec2);				
			$total2 = db_num_rows($seccion2_sql);
		?>						
	      <?php   if ($total2<>'0'){  //Inicio SI_2 If hay registro para mostrar en Nivel 2 	   ?>   
          
            <ul>  <!-- Inicio UL 2Nivel-->
        <?php    
			while($row_seccion2 = db_fetch_array($seccion2_sql)) // Inicio While 2
			{
					
		?>				
            <li>		<!-- Inicio Li 2Nivel-->            	
              <input type="checkbox" name="select<?=$row_seccion2['ccodseccion']?>" />                         
             <?php  echo $row_seccion2['cnomseccion']; ?>

               <!----------------------INICIO 3 NIVEL------------------------------------------->
             <?php
				 $niv2cod = substr($row_seccion2['ccodseccion'],0,16);				
				$sqlselec3="SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodseccion like '".$niv2cod."%' and estado ='1' and cnivseccion='3' and ctipseccion='1' order by cordcontenido";
				$seccion3_sql = db_query($sqlselec3);
				$total3 = db_num_rows($seccion3_sql);
				
			   if ($total3<>'0'){  // Inicio SI_3 If hay registro para mostrar en Nivel 3
			 ?>	
			    <ul>  <!-- Inicio UL 3Nivel--> 
			 <?php
            	while($row_seccion3 = db_fetch_array($seccion3_sql)) // Inicio While 3
			 	{
			 ?>		
	             <li>		<!-- Inicio Li 3Nivel-->
                 	<input type="checkbox" name="select<?=$row_seccion3['ccodseccion']?>" /> 
              		<?php echo $row_seccion3['cnomseccion']?>   
                 </li>
             <?php    
				} 					// Fin While 3	
			 ?>
				</ul>  <!-- Fin UL 3Nivel-->
             <?php  
			 	}  // Fin SI_3 If hay registro para mostrar en Nivel 3
			 ?>    
               	<!----------------------FIN 3 NIVEL------------------------------------------->   
                
			</li>		<!-- Fin Li 2Nivel-->
        <?php    	    
			} 					// Fin While 2
		?>										
        	</ul>		<!-- Fin UL 2Nivel-->
         <?php    	    
			} 					//Fin SI_2 If hay registro para mostrar en Nivel 2   
		?>		 
        <!---------------------- FIN 2 NIVEL------------------------------------------->
        
              
     </li>				<!-- Fin Li 1Nivel-->
    <?php
	} 								// Fin While 1
	?>   							
  </ul>							   <!--Fin  <ul id="menuseccion"> -->
</form>



<style type="text/css">	
	.art_borrado_1er_nivel{font-weight:bold;color:#000000;}
	.color_1er_nivel{color:#000000!important;font-weight:bold;}

	
	.art_borrado_2do_nivel{font-weight:bold;color:#449902; margin-left: 10px;}
	.color_2do_nivel{color:#449902;font-weight:bold;margin-left: 10px;}
	
	.art_borrado_3er_nivel{font-weight:bold;color:#1389D1;padding-left: 30px;}
	.color_3er_nivel{color:#1389D1;font-weight:bold;}
	
	.art_borrado_4to_nivel{font-weight:bold;color:#FF7D5D;padding-left: 40px; width:100%}
	.color_4to_nivel{color:#FF7D5D;font-weight:bold;}	
</style>