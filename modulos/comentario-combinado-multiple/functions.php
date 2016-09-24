<?php 
function getComments($row,$nOpcion) {
	//echo $nOpcion."-sssdsad-ss";exit;	
 if($nOpcion==1) // there is at least reply
  {	
	 echo "<table align='center' width='100%' border='0' cellspacing='1' cellpadding='0'>";
				?>
				<tr bgcolor="#e8edee" onMouseOver="this.style.backgroundColor='#FF9900';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#e8edee'"o"];" >
				<?php		
					 echo "<td width='5%'>" ."<img src='"  . $row['imagenfoto'] . "' width='25' height='25' /></td>";																																
					 echo "	<td width='95%'>
								 <table width='100%' border='0'>
								  <tr>
									<td align='left'><font class='titulo_preguntas'>" . $row['nombre'] . "</font></td>
								  </tr>
								  <tr>
									<td>	  	  
									   <table width='100%' border='0'>
										  <tr>
											<td align='left' width='60%'><strong><font color='#990048' size=1>" .  $row['titulo']. "</font></strong></td>
											<td align='right' width='40%'><strong><font color='#990048' size=1>" .  traducefecha($row['fechacorta']). "</font></strong></td>
										  </tr>
										</table>									
								    </td>
								  </tr>
								  <tr>
									<td align='justify'>" . nl2br($row['comentario']). "</td>
								  </tr>
								  
								   <tr>
									<td align='justify'><a href='#comment_form' class='reply' 
									id='".$row['id']."'>Responder</a></td>
								  </tr>
								  
								</table>";
					 echo "</td>";					  
					 echo " </tr> ";
			 echo "</table>";			
 }
 
 
  if($nOpcion==2) // there is at least reply
  {
	  
	  
	  echo "<table width='100%' border='0'>
  <tr>
    <td>&nbsp;</td>
    <td>";

	   echo "<table align='center' width='100%' border='0' cellspacing='1' cellpadding='0'>";
				?>				
                <tr bgcolor="#ffffff" onMouseOver="this.style.backgroundColor='#FF9900';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#ffffff'"o"];" >
				<?php							
					  echo "<td width='5%'>" ."<img src='"  . $row['imagenfoto'] . "' width='25' height='25' /></td>";																																
					 echo "	<td width='95%'>
								 <table width='100%' border='0'>
								  <tr>
									<td align='left'><font class='titulo_preguntas'>" . $row['nombre'] . "</font></td>
								  </tr>
								  <tr>
									<td>	  	  
									   <table width='100%' border='0'>
										  <tr>
											<td align='left' width='60%'><strong><font color='#990048' size=1>" .  $row['titulo']. "</font></strong></td>
											<td align='right' width='40%'><strong><font color='#990048' size=1>" .  traducefecha($row['fechacorta']). "</font></strong></td>
										  </tr>
										</table>									
								    </td>
								  </tr>
								  <tr>
									<td align='justify'>" . nl2br($row['comentario']). "</td>
								  </tr>
								  <tr>
									<td align='justify'><a href='#comment_form' class='reply' id='".$row['id']."'>Responder</a></td>
								  </tr>
								</table>";
					 echo "</td>";					  
					 echo " </tr> ";
			 echo "</table>";			
echo "</td>
  </tr>
</table>";			 
  }  
  
 /* The following sql checks whether there's any reply for the comment */
 $q = "SELECT * FROM comentarios WHERE parent_id = ".$row['id']."";
 $r = mysql_query($q);
 if(mysql_num_rows($r)>0) // there is at least reply
  {
  echo "<ul>";
  while($row = mysql_fetch_assoc($r)) {
    getComments($row,2);
  }
  echo "</ul>";
  }
 echo "</li>";
}
?>
