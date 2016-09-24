<?php
//recuerda quize enviar una cedena larga como comentario por la funcion Acptar pero e malogra no envia cadena larga
 include_once($_SERVER['DOCUMENT_ROOT'].'/seguridad/seguridad.php'); ?> 
<html> 
<head> 
<meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
<title>Consulta Data</title> 
    
<SCRIPT LANGUAGE="JavaScript"> 
	function Aceptar(idconta,persona,email,paginacion) { 
	if (confirm("Estas Seguro(a) Aceptar El Registro?" + idconta + " " + persona  )) { 
		location=("http://www.infodisfap.com/doctor-responde/Aceptar-Doctor-Responde.php?Registro=" +  idconta + "&email=" +  email +"&persona=" +  persona + "&CampoClave=" +  idconta + "&paginacion=" + paginacion );
	}} 	
	
	function NoAceptar(idconta,persona,email,paginacion) { 
	if (confirm("Estas Seguro(a) No Aceptar El Registro?" + idconta + " " + persona  )) { 
		location=("http://www.infodisfap.com/doctor-responde/No-Aceptar-Doctor-Responde.php?Registro=" +  idconta + "&email=" +  email +"&persona=" +  persona + "&CampoClave=" +  idconta + "&paginacion=" + paginacion );
	}} 	
	
	function Eliminar(idconta,persona,email,paginacion) { 
	if (confirm("Estas Seguro(a) Eliminar El Registro?" + idconta + " " + persona  )) { 
		location=("http://www.infodisfap.com/doctor-responde/Eliminar-Doctor-Responde.php?Registro=" +  idconta + "&email=" +  email +"&persona=" +  persona + "&CampoClave=" +  idconta + "&paginacion=" + paginacion  );
	}} 	
	
	function Actualizar(idconta,persona,email,paginacion) { 
	if (confirm("Estas Seguro(a) Actualizar El Registro?" + idconta + " " + persona  )) { 
		location=("http://www.infodisfap.com/principal.php?pagina=doctor-responde/FormActualizaDoctor-Responde&Registro=" +  idconta + "&email=" +  email +"&persona=" +  persona + "&CampoClave=" +  idconta + "&paginacion=" + paginacion );
	}} 	
	
	
	function EnviarRespuesta(idconta,persona,email,paginacion,parent_id) { 
	if (confirm("Estas Seguro(a) Enviar Respuesta al usuario?" + idconta + " " + persona  )) { 
		location=("http://www.infodisfap.com/doctor-responde/Enviar-Respuesta-Usuario.php?Registro=" +  idconta + "&email=" +  email +"&persona=" +  persona + "&CampoClave=" +  idconta + "&paginacion=" + paginacion + "&parent_id=" + parent_id);
	}} 	
	
	
</SCRIPT>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Pragma" content="no-cache" /> 
<style type="text/css"> 
<!-- 
a.p:link { 
    color: #0066FF; 
    text-decoration: none; 
} 
a.p:visited { 
    color: #0066FF; 
    text-decoration: none; 
} 
a.p:active { 
    color: #0066FF; 
    text-decoration: none; 
} 
a.p:hover { 
    color: #0066FF; 
    text-decoration: underline; 
} 
a.ord:link { 
    color: #000000; 
    text-decoration: none; 
} 
a.ord:visited { 
    color: #000000; 
    text-decoration: none; 
} 
a.ord:active { 
    color: #000000; 
    text-decoration: none; 
} 
a.ord:hover { 
    color: #000000; 
    text-decoration: underline; 
} 
--> 
</style> 
</head> 
<body bgcolor="#FFFFFF"> 

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/conexioninfodisfap.php'); ?> 

<div align="center"><strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><p><a href="http://www.infodisfap.com">www.infodisfap.com</a><a href="../seguridad/salir.php"><img border="0" 
src="../imagen/salir.gif"    align="right"></a></p> 
</font></strong> 
<br><br>

<p align="center"> 
<? $mensaje = $_GET['mensaje']; 
 echo " <font color='#FF0000'><b> $mensaje  </b></font>  "; 
?> 	
</p>

</div>
<hr noshade style="color:CC6666;height:1px"> 
<br> 

<form action="http://www.infodisfap.com/doctor-responde/eliminar-masivo.php" method="post">


<? 
//inicializo el criterio y recibo cualquier cadena que se desee buscar 
$criterio = ""; 
$txt_criterio = ""; 
if ($_GET["criterio"]!=""){ 
   $txt_criterio = $_GET["criterio"]; 
   $criterio = " where id  like '%" . $txt_criterio . "%' or nombre like '%" . $txt_criterio . "%' or email like '%" . $txt_criterio . "%'";
} 


$sql="SELECT * FROM doctorresponde  ".$criterio; 
$res=mysql_query($sql); 
$numeroRegistros=mysql_num_rows($res); 
if($numeroRegistros<=0) 
{ 
    echo "<div align='center'>"; 
    echo "<font face='verdana' size='-2'>No se encontraron resultados</font>"; 
    echo "</div>"; 
}else{ 
    //////////elementos para el orden 
    if(!isset($orden)) 
    { 
       $orden=" fechacorta ";
    } 
    //////////fin elementos de orden 

    //////////calculo de elementos necesarios para paginacion 
    //tamao de la pagina 
    $tamPag=10; 

    //pagina actual si no esta definida y limites 
    if(!isset($_GET["pagina"])) 
    { 
       $pagina=1; 
       $inicio=1; 
       $final=$tamPag; 
    }else{ 
       $pagina = $_GET["pagina"]; 
    } 
    //calculo del limite inferior 
    $limitInf=($pagina-1)*$tamPag; 

    //calculo del numero de paginas 
    $numPags=ceil($numeroRegistros/$tamPag); 
    if(!isset($pagina)) 
    { 
       $pagina=1; 
       $inicio=1; 
       $final=$tamPag; 
    }else{ 
       $seccionActual=intval(($pagina-1)/$tamPag); 
       $inicio=($seccionActual*$tamPag)+1; 

       if($pagina<$numPags) 
       { 
          $final=$inicio+$tamPag-1; 
       }else{ 
          $final=$numPags; 
       } 

       if ($final>$numPags){ 
          $final=$numPags; 
       } 
    } 

//////////fin de dicho calculo 

//////////creacion de la consulta con limites 
$sql="SELECT * FROM doctorresponde ".$criterio." ORDER BY ".$orden." DESC LIMIT ".$limitInf.",".$tamPag;
$res=mysql_query($sql); 

//////////fin consulta con limites 
echo "<div align='center'>"; 
echo "<font face='verdana' size='-2'>encontrados ".$numeroRegistros." resultados<br>"; 
echo "ordenados por <b>".$orden."</b>"; 
if(isset($txt_criterio)){ 
    echo "<br>Valor filtro: <b>".$txt_criterio."</b>"; 
} 
echo "</font></div>"; 
echo "<table align='center' width='100%' border='0' cellspacing='1' cellpadding='0'>";
echo "<tr><td colspan='3'><hr noshade></td></tr>"; 

echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=id&idcate=".$idcate."&criterio=".$txt_criterio."'>Cd</a></th>";

echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=nombre&idcate=".$idcate."&criterio=".$txt_criterio."'>Nombre</a></th>";
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=email&idcate=".$idcate."&criterio=".$txt_criterio."'>E-mail</a></th>";

echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=telefono&idcate=".$idcate."&criterio=".$txt_criterio."'>Telefono</a></th>";

echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=fechacorta&idcate=".$idcate."&criterio=".$txt_criterio."'>Fechacorta</a></th>";


echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=idcate&idcate=".$idcate."&criterio=".$txt_criterio."'>Categoria</a></th>";
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=idsudcate&idcate=".$idcate."&criterio=".$txt_criterio."'>Subcategoria</a></th>";
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=idSubSubcate&idcate=".$idcate."&criterio=".$txt_criterio."'>SubSubcategoria</a></th>";

echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=aceptado&idcate=".$idcate."&criterio=".$txt_criterio."'>Aceptado</a></th>";
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=mostrarportada&idcate=".$idcate."&criterio=".$txt_criterio."'>mostrarportada</a></th>";

echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=parent_id&idcate=".$idcate."&criterio=".$txt_criterio."'>parent_id</a></th>";

echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=procedencia&idcate=".$idcate."&criterio=".$txt_criterio."'>Procedencia</a></th>";

echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?paginacion = ".$paginacion."&orden=comentario&idcate=".$idcate."&criterio=".$txt_criterio."'>Comentario</a></th>";

while($registro=mysql_fetch_array($res)) 
{ 
?> 
   <!-- tabla de resultados --> 
	
	<tr bgcolor="#CC6666" onMouseOver="this.style.backgroundColor='#FF9900';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#CC6666'"o"];" >
	
   <tr bgcolor="#CC6666" onMouseOver="this.style.backgroundColor='#FF9900';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#CC6666'"o"];" >
	
   <td width='2%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["id"]; ?></b></font></td>
    
    <td width='5%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["nombre"]; ?></b></font></td>

    <td width='5%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["email"]; ?></b></font></td>
    
    <td width='5%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["telefono"]; ?></b></font></td>


    <td width='8%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["fechacorta"]; ?></b></font></td>
    
    
    
 <!-- Inicio Categoria----------------------------------->
    <td  align="center" width='4%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b>
		
        	<select name="idcate" id="idcate">
                <option></option>           
                <?php                     
				    $resultcate=mysql_query("SELECT * FROM categoria  order by idcate", $conexion);    
			  		while ($row = mysql_fetch_array($resultcate)) 			
						{ 
								echo '<option value="'.$row['idcate'].'"';
								if($row['idcate']==$registro['idcate'])
								{
									echo ' selected';
								}
								echo '>'. $row['descripcion'] . '</option>'."\n";						} 
				    	mysql_free_result($resultcate); 	                    
                ?>
                
              </select>             
          
	</b></font></td>
<!-- Fin Categoria----------------------------------->
     <!-- Inicio Subcategoria----------------------------------->
    <td  align="center" width='5%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b>			
            <select name="idsubcate" id="isubdcate">
                        <option></option>
                      
                        <?php                     
                            $resultsubcate=mysql_query("SELECT * FROM subcategoria  order by idsubcate", $conexion);    
                            while ($rowsub = mysql_fetch_array($resultsubcate)) 			
                                { 
                                        echo '<option value="'.$row['idsubcate'].'"';
                                        if($rowsub['idsubcate']==$registro['idsubcate'])
                                        {
                                            echo ' selected';
                                        }
                                        echo '>'. $rowsub['descripSubcategoria'] . '</option>'."\n";						} 
                                mysql_free_result($resultsubcate); 	                    
                        ?>        
              </select>        
    </b></font></td>
      <!-- Fin Subcategoria-----------------------------------> 
      
        <!-- Inicio SubSubcategoria----------------------------------->
    <td  align="center" width='5%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b>			
            <select name="idSubSubcate" id="idSubSubcate">
                        <option></option>
                      
                        <?php                     
                            $resultSubSubcate=mysql_query("SELECT * FROM sub_subcategoria  order by idSubSubcate", $conexion);    
                            while ($rowsubSub = mysql_fetch_array($resultSubSubcate)) 			
                                { 
                                        echo '<option value="'.$rowsubSub['idSubSubcate'].'"';
                                        if($rowsubSub['idSubSubcate']==$registro['idSubSubcate'])
                                        {
                                            echo ' selected';
                                        }
                                        echo '>'. $rowsubSub['descripSubSubcategoria'] . '</option>'."\n";						} 
                                mysql_free_result($resultSubSubcate); 	                    
                        ?>        
              </select>        
    </b></font></td>
      <!-- Fin SubSubcategoria-----------------------------------> 
      
      
      
    <td width='1%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["aceptado"]; ?></b></font></td>
    
        <td width='1%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["mostrarportada"]; ?></b></font></td>
    
    
    <td width='1%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["parent_id"]; ?></b></font></td>
    
      <td width='1%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["procedencia"]; ?></b></font></td>
        
    <td width='45%'><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["comentario"]; ?></b></font></td>     

 

<?php 
//si es una respuesta parenid deve estar valor diferente a 0 y no fue ya contestada
if($registro["aceptado"]==0 ){ ?>  
 <td width='2%' align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC" onClick="javascript:Aceptar('<? echo $registro["id"]?>', '<? echo $registro["nombre"]?>', '<? echo $registro["email"]?>', '<? echo $pagina?>' );"> <b>  <img src="../imagen/check.gif" width="18" height="19" alt="Aceptar"> </b></font></td>    

<?php } else  { ?> 
<td width='2%' align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC" onClick="javascript:Aceptar('<? echo $registro["id"]?>', '<? echo $registro["nombre"]?>', '<? echo $registro["email"]?>', '<? echo $pagina?>' );"> <b>  <img src="../imagen/check-aceptada.gif" width="18" height="19" alt="Ya fue Aceptada"> </b></font></td>    
<?php
}
?>



<td width='2%' align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC" onClick="javascript:NoAceptar('<? echo $registro["id"]?>', '<? echo $registro["nombre"]?>', '<? echo $registro["email"]?>', '<? echo $pagina?>');"> <b>  <img src="../imagen/No-check.gif" width="18" height="19" alt="No Aceptar"> </b></font></td>    

<td width='2%' align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC" onClick="javascript:Eliminar('<? echo $registro["id"]?>', '<? echo $registro["nombre"]?>', '<? echo $registro["email"]?>', '<? echo $pagina?>');"> <b>  <img src="../imagen/delete.gif" width="18" height="19" alt="Eliminar"> </b></font></td>    

<td width='2%' align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC" onClick="javascript:Actualizar('<? echo $registro["id"]?>', '<? echo $registro["nombre"]?>', '<? echo $registro["email"]?>', '<? echo $pagina?>');"> <b>  <img src="../imagen/actualiza.png" width="18" height="19" alt="Actualizar Registro"> </b></font></td>    

<?php 
//si es una respuesta parenid deve estar valor diferente a 0 y no fue ya contestada
if($registro["parent_id"]!=0 and $registro["respuestaenviada"] ==0 and $registro["aceptado"] ==1 ){ ?>  
<td width='2%' align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC" onClick="javascript:EnviarRespuesta('<? echo $registro["id"]?>', '<? echo $registro["nombre"]?>', '<? echo $registro["email"]?>', '<? echo $pagina?>','<? echo  $registro["parent_id"]?>');"> <b>  <img src="../imagen/email.gif" width="18" height="19" alt="Enviar Respuesta"> </b></font></td>  
<?php } ?>

<?php 
//si es una respuesta parenid deve estar valor diferente a 0 pero ya fue contestada para sbaber no mas
if($registro["parent_id"]!=0 and $registro["respuestaenviada"] ==1 and $registro["aceptado"] ==1 ){ ?>  
<td width='2%' align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC" onClick="javascript:EnviarRespuesta('<? echo $registro["id"]?>', '<? echo $registro["nombre"]?>', '<? echo $registro["email"]?>', '<? echo $pagina?>','<? echo  $registro["parent_id"]?>');"> <b>  <img src="../imagen/email-ya-enviada.gif" width="18" height="19" alt="ya fue Contestada"> </b></font></td>  
<?php } ?>

<td width='2%' align="center"><input type="checkbox" name="seleccion[]" value="<?php echo $registro['id']?>" ></td>
  
</tr>   
   <!-- fin tabla resultados --> 
<? 
}//fin while 
echo "</table>"; 
}//fin if 
//////////a partir de aqui viene la paginacion 
?> 
    <br> 
    <table border="0" cellspacing="0" cellpadding="0" align="center"> 
    <tr><td align="center" valign="top"> 
<? 
    if($pagina>1) 
    { 
       echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina-1)."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
       echo "<font face='verdana' size='-2'>anterior</font>"; 
       echo "</a> "; 
    } 

    for($i=$inicio;$i<=$final;$i++) 
    { 
       if($i==$pagina) 
       { 
          echo "<font face='verdana' size='-2'><b>".$i."</b> </font>"; 
       }else{ 
          echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".$i."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
          echo "<font face='verdana' size='-2'>".$i."</font></a> "; 
       } 
    } 
    if($pagina<$numPags) 
   { 
       echo " <a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina+1)."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
       echo "<font face='verdana' size='-2'>siguiente</font></a>"; 
   } 
//////////fin de la paginacion 
?> 
    </td>
    </tr>
    
    <tr>
    <td align="center"> <br><br>   <input type="submit" value="Submit" name="Enviar" /><td>
    </tr>
     
    </table> 
    
	 
 </form>   
<hr noshade style="color:CC6666;height:1px ; width:100% "> 
<!-- 2 aviso registro  -->
<p align="center"> 
<? $mensaje = $_GET['mensaje']; 
 echo " <font color='#FF0000'><b> $mensaje  </b></font>  "; 
?> 	
</p>


<div align="center">
  <p><font face="verdana" size="4"><a class="p" href="http://www.infodisfap.com/index.php">::Inicio::</a></font>    <font face="verdana" size="4"><a class="p" href="http://www.infodisfap.com/mainadministrador.php">: :Administrador::</a></font></p>
</div>

<form action="mantContactosAdmi.php" method="get">
Criterio de bsqueda: 
<input type="text" name="criterio" size="22" maxlength="150"> 
<input type="submit" value="Buscar"> 
</form> 

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); ?> 
</body> 
</html> 