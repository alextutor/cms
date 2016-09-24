<?php
	// configuramos la base de datos	   
  if (!empty($_GET['idsec']) and empty($_GET['idsec2'])){$pagina =$_GET['idsec'];}
  if (!empty($_GET['idsec2'])){$pagina =$_GET['idsec2'];}	
  //un select a la pagina actual parasacar su categoria
  //Obtener el número de registros mas rapido utilisando SQL_CALC_FOUND_ROWS  y FOUND_ROWS()
  $subresult=mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM contenido where camicontenido='$pagina'"); 
  $cuenta = mysql_query("SELECT FOUND_ROWS()");        
   // $cuenta = mysql_num_rows($subresult); 
  $subrow = mysql_fetch_array($subresult);     
  //echo "Pagina=".$pagina ."-" . $cuenta;
  
  if ($cuenta!=0)  {	   // Inicio Si 1 si hay registros que mostrar		  
		
		 $resultenlacecabe=mysql_query("SELECT * FROM contenido where ccodcontenido='" . $subrow['ccodcontenido'] . "' order by dfecmodifica desc");    		  
          echo "<img src='imagen/masinformacion.gif' width='480' height='28' /><br><br>";  		  
		   while ($row = mysql_fetch_array($resultenlacecabe)) 		// Inicio Mientras 1		
		  { 
		  	if ( trim($row['news_link'])<>trim($pagina))  {	  // Inicio Si 2
			 		  
					echo "<table align='center' width='100%' border='0' cellspacing='1' cellpadding='0'>";
					?>
			<tr bgcolor="#eaf5e0" onMouseOver="this.style.backgroundColor='#FF9900';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#eaf5e0'"o"];" >
				<?php									
					 echo "<td width='2%'><img src='imagen/circle.gif' width='13' height='13' /></td>";
					 echo "<td width='80%'>"; 
				  echo "<a href='http://www.infodisfap.com/enlaces.php?pagina=".$row['news_link']."' >
				  <span class='txt_red txt_bold'></span> <font size='2'>" .$row['titulocorto'] ." </font></a>";
								"</td>";
						 echo " </tr> ";
						 echo "</table>"; 				
			}  // Fin  Si 2	
		  }		   // Fin  Mientras 1      
/*    mysql_free_result($resultenlacecabe);       			
	mysql_free_result($subresult); */
  }	 		// Fin  Si 1			                   
 ?>