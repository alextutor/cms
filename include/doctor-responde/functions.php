<?php
 include_once($_SERVER['DOCUMENT_ROOT'].'/traducefecha.php');    

function getComments($row,$nOpcion) {

// ---  Inicio Consulta si es Usuario Registrado
$cAliasCli ="ANONIMO";
$cRutaImagenCli ="http://www.infodisfap.com/comentario_real/logocomentario.gif";
if ($row['id_cliente']<>'') {
	$sqlCliente="select * from clientes where id_cliente='".$row['id_cliente']."'"; 
	$rsCliente=mysql_query($sqlCliente) or die (mysql_error()); 
	while($rowCli = mysql_fetch_assoc($rsCliente)):			
		$cAliasCli = $rowCli['alias'];
		$cRutaImagenCli= $rowCli['rutaimagen'];
		
		$alias=$rowCli['alias'];
		$email=$rowCli['email'];
		$NombAsociacion=$rowCli['NombAsociacion'];
		$Cargo=$rowCli['Cargo'];
		$DirecAsocia=$rowCli['DirecAsocia'];
		$rutaimagenCli=$rowCli['rutaimagen'];
		
		
		$NombAsociacion=$rowCli['NombAsociacion'];
		$NombAsociacion=$rowCli['NombAsociacion'];

	endwhile; 
	mysql_free_result($rsCliente);
	 }
// ---  Fin Consulta si es Usuario Registrado				


 if($nOpcion==1) // there is at least reply
  {	
	 echo "<table align='center' width='100%' border='0' cellspacing='1' cellpadding='0'>";
				?>
				<tr bgcolor="#e8edee" onMouseOver="this.style.backgroundColor='#FF9900';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#e8edee'"o"];" >
				<?php		
					 
					 echo "<td width='5%'>" ."<img src='"  .$cRutaImagenCli . "' width='45' height='55' /></td>";						  																															
					 echo "	<td width='95%'>
								 <table width='100%' border='0'>
								  <tr>
									<td align='left'><font class='titulo_preguntas'>";
									echo $cAliasCli;	
									
									echo "</font></td>														
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
									
									 <table width='100%' border='0'>
									  <tr>
										<td align='left' width='11%'>
																		<a href='principal.php?pagina=doctor-responde/FormConsulta&idcate=".$row['idcate']."&idsubcate=".$row['idsubcate']."&procedencia=DoctorResponde&PaginaDestino=doctor-responde/index&parent_id=".$row['id']."&ConsultaRespuesta=Responder'><img src='doctor-responde/imagen/responder-naranja.gif' width='70' height='20' /></a>	
																		
										</td>
										<td align='left' width='8%'><a href='										principal.php?pagina=doctor-responde/FormConsulta&idcate=0&idsubcate=0&procedencia=DoctorResponde&PaginaDestino=doctor-responde/index&ConsultaRespuesta=AgregarConsulta' ><img src='doctor-responde/imagen/Nuevo-Tema-naranja.gif' width='70' height='20' /></a>
										</td>
										<td width='81%'>&nbsp;</td>
									  </tr>
									</table>	
																										
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
					  echo "<td width='5%'>" ."<img src='"  .$cRutaImagenCli . "' width='45' height='55' /></td>";																																
					 echo "	<td width='95%'>
								 <table width='100%' border='0'>
								  <tr>
									<td align='left'><font class='titulo_preguntas'>";
									    echo $cAliasCli;									
									
								echo "</font></td>								
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
								
								 <table width='100%' border='0'>
									  <tr>
										<td align='left' width='11%'>
										<a href='principal.php?pagina=doctor-responde/FormConsulta&idcate=".$row['idcate']."&idsubcate=".$row['idsubcate']."&procedencia=DoctorResponde&PaginaDestino=doctor-responde/index&parent_id=".$row['id']."&ConsultaRespuesta=Responder'><img src='doctor-responde/imagen/responder-naranja.gif' width='70' height='20' /></a>											
										
										</td>
										<td align='left' width='8%'><a href='principal.php?pagina=doctor-responde/FormConsulta&idcate=0&idsubcate=0&procedencia=DoctorResponde&PaginaDestino=doctor-responde/index&ConsultaRespuesta=AgregarConsulta' ><img src='doctor-responde/imagen/Nuevo-Tema-naranja.gif' width='70' height='20' /></a>
										</td>
										<td width='81%'>&nbsp;</td>
									  </tr>
									</table>	
									
									
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
 $q = "SELECT * FROM doctorresponde WHERE aceptado=1 and parent_id = ".$row['id']."  ORDER BY id DESC ";
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
