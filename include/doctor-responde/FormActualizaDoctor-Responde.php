<?php 
   //include_once("../rutinas/conexioninfodisfap.php");    
    include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/conexioninfodisfap.php'); 
   $Registro=$_GET['Registro'];
   $paginacion=$_GET['paginacion']; 
   $imagen80x80=$_GET['imagen80x80'];    
   $result=mysql_query("select * from doctorresponde  Where id='$Registro' ",$conexion);    
   $rsDoctorResponde=mysql_fetch_array($result);     
   
?>
<head> 
<script>
	function componer_Centros(cod_area)
	{
	//alert(cod_area);
	document.form1.idsudcategoria.length=0;
	document.form1.idsudcategoria.options[0] = new Option("-- Seleccione --","","defaultSelected","");
	var indice=1;
	<?
	$sql_depto = "SELECT * from subcategoria";
	$rs_depto = mysql_query($sql_depto, $conexion);
	if(mysql_num_rows($rs_depto)>0)
	{
	while($row_depto = mysql_fetch_assoc($rs_depto))
	{
	?>
	if(cod_area=='<?=$row_depto["idcate"]?>')
	{
	document.form1.idsudcategoria.options[indice] = new Option("<?=$row_depto["descripSubcategoria"]?>","<?=$row_depto["idsubcate"]?>");
	indice++;
	}
	<?
	}
	}
	//mysql_close($conexion);
	?>
	}
</script>

<script>
function componer_Subcategoria(cod_area)
{
//alert(cod_area);
document.form1.idSubSubcate.length=0;
document.form1.idSubSubcate.options[0] = new Option("-- Seleccione --","","defaultSelected","");
var indice=1;
<?
$sql_depto = "SELECT * from sub_subcategoria";
$rs_depto = mysql_query($sql_depto, $conexion);
if(mysql_num_rows($rs_depto)>0)
{
while($row_depto = mysql_fetch_assoc($rs_depto))
{
?>
if(cod_area=='<?=$row_depto["idsubcate"]?>')
{
document.form1.idSubSubcate.options[indice] = new Option("<?=$row_depto["descripSubSubcategoria"]?>","<?=$row_depto["idSubSubcate"]?>");
indice++;
}
<?
}
}
//mysql_close($conexion);
?>
}

</script>


<script> 
function Checked_aceptado(){ 
	$valor=0;
	$lprincipal = document.form1.chkAceptado.checked ;	
    if($lprincipal==true)
 	{$valor=1; }
	else 	
	
 	{$valor=0;	
	}
  document.form1.aceptado.value=$valor	;
} 
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head> 
<body>

<table width="78%" border="0" align="center">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="88%">&nbsp;</td>
    <td width="9%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    <form id="form1" name="form1" method="POST" action="http://www.infodisfap.com/doctor-responde/ActualizaFormDoctor-Responde.php" >
      <table width="100%" border="0" align="center">
        <tr>
          <td width="13%">Codigo</td>
          <td width="87%"><input name="id"  type="hidden"  id="id" value="<? echo $rsDoctorResponde["id"]; ?>" size="70" /></td>
        </tr>
        <tr>
          <td>paginacion</td>
          <td><input name="paginacion"  type="hidden"  id="paginacion" value="<? echo $paginacion; ?>" size="70" /></td>
        </tr>
        <tr>
          <td>parent_id</td>
          <td align="left"><input name="parent_id" type="text" id="parent_id" value="<? echo trim($rsDoctorResponde["parent_id"]); ?>" size="10" /></td>
        </tr>
        <tr>
          <td>procedencia</td>
          <td align="left"><input name="procedencia" type="text" id="procedencia" value="<? echo trim($rsDoctorResponde["procedencia"]); ?>" size="60" /></td>
        </tr>
        <tr>
          <td>Nombre</td>
          <td align="left"><p>
            <input name="Nombre" type="text" id="Nombre" value="<? echo trim($rsDoctorResponde["nombre"]); ?>" size="90" />
            </p></td>
        </tr>
        <tr>
          <td>Telefono</td>
          <td align="left"><input name="Nombre2" type="text" id="Nombre2" value="<? echo trim($rsDoctorResponde["telefono"]); ?>" size="50" /></td>
        </tr>
        <tr>
          <td>email</td>
          <td align="left"><input name="email" type="text" id="email" value="<? echo trim($rsDoctorResponde["email"]); ?>" size="50" /></td>
        </tr>
        <tr>
          <td>Titulo</td>
          <td align="left"><input name="titulo" type="text" id="titulo" value="<? echo trim($rsDoctorResponde["titulo"]); ?>" size="50" /></td>
        </tr>
        <tr>
          <td>Aceptado</td>
          <td align="left"><input name="chkAceptado" type="checkbox" id="chkAceptado" onClick="Checked_aceptado()"  <? if ($rsDoctorResponde['aceptado']) echo 'checked=checked'; ?> />         
           <input name="aceptado" type="text" id="aceptado" value="<? echo $rsDoctorResponde["aceptado"]; ?>" size="5" /></td>
        </tr>
        <tr>
          <td>mostrarportada</td>
          <td align="left"><input name="mostrarportada" type="text" id="mostrarportada" value="<? echo $rsDoctorResponde["mostrarportada"]; ?>" size="5" /></td>
        </tr>
        <tr>
          <td>Categoria</td>
          <td align="left"><select name="idcate" id="idcate" onChange="componer_Centros(this.value)">
            <option>--seleccione--</option>
            <?php                
                          $resultcate=mysql_query("SELECT * FROM categoria  order by idcate ", $conexion);    
                                while ($row = mysql_fetch_array($resultcate)) 	
									{                                 
                                   // echo '<option value="'.$row["idcategoria"]. '" ' . $selected. '>'.$row["descripcion"]. '   </option>';                     	   
								   echo '<option value="'.$row['idcate'].'"';
								if($row['idcate']==$rsDoctorResponde['idcate'])
								{
									echo ' selected';
								}
								echo '>'. $row['descripcion'] . '</option>'."\n";											
								    } 
                                mysql_free_result($resultcate); 	                    
                        ?>
          </select></td>
        </tr>
        <tr>
          <td>Sub-Categoria</td>
          <td align="left">
          <select name="idsudcategoria" id="idsudcategoria" onChange="componer_Subcategoria(this.value)">
            <option>--seleccione--</option>
            <?php                
                          $rssubcate=mysql_query("SELECT * FROM subcategoria  where idcate=" .$rsDoctorResponde['idcate'], $conexion);    
                                while ($rowsub = mysql_fetch_array($rssubcate)) 	
									{                                 
                                   // echo '<option value="'.$row["idcategoria"]. '" ' . $selected. '>'.$row["descripcion"]. '   </option>';                     	   
								   echo '<option value="'.$rowsub['idsubcate'].'"';
								if($rowsub['idsubcate']==$rsDoctorResponde['idsubcate'])
								{									 
									echo ' selected';
								}
								echo '>'. $rowsub['descripSubcategoria'] . '</option>'."\n";											
									} 
                                mysql_free_result($rssubcate); 	                    
                        ?>
          </select></td>
        </tr>
        <tr>
          <td>Sub-SubCategoria</td>
          <td align="left"><select name="idSubSubcate" id="idSubSubcate">
            <option>--seleccione--</option>
            <?php                
                          $rsSubSubcate=mysql_query("SELECT * FROM sub_subcategoria  where idsubcate =" .$rsDoctorResponde['idsubcate'], $conexion);    
                                while ($rowSubSub = mysql_fetch_array($rsSubSubcate)) 	
									{                                 
                                   // echo '<option value="'.$row["idcategoria"]. '" ' . $selected. '>'.$row["descripcion"]. '   </option>';                     	   
								   echo '<option value="'.$rowSubSub['idSubSubcate'].'"';
								if($rowSubSub['idSubSubcate']==$rsDoctorResponde['idSubSubcate'])
								{									 
									echo ' selected';
								}
								echo '>'. $rowSubSub['descripSubSubcategoria'] . '</option>'."\n";											
								    } 
                                mysql_free_result($rsSubSubcate); 	                    
                        ?>
          </select></td>
        </tr>
        <tr>
          <td>rutaimagen</td>
          <td align="left"><p>
            <input name="RutaImagen" type="text" id="RutaImagen" value="<?
			 if ($imagen80x80 <> "" )
			 {
				  echo "noticia/imagen/80-80/colaborador/" . $imagen80x80; 
			}	  
			 else {
			 	echo trim($rsDoctorResponde["rutaimagen"]); 
			 }

			 ?>" size="90" />
            </p>
            <p><a href="../principal.php?pagina=/infinitecarousel2/upload-resize80x80-DoctorResponde&<?php echo 'Registro='.$Registro."&paginacion=".$paginacion ?>">Subir Archivo 80x80</a></p></td>
        </tr>
        <tr>
          <td  align="center" colspan="2">Comentario</td>
          </tr>
        <tr>
          <td  align="center" colspan="2"><textarea name="comentario" cols="83" rows="30" id="comentario"><? echo trim($rsDoctorResponde["comentario"]); ?></textarea></td>
          </tr>
        <tr>
          <td>fechacorta</td>
          <td align="left"><input name="fechacorta" type="text" id="fechacorta" value="<? echo $rsDoctorResponde["fechacorta"]; ?>" size="10" /></td>
        </tr>
        <tr>
          <td align="center" colspan="2">          	
            </td>
        </tr>
        <tr>
          <td align="center" colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td align="center" colspan="2"><input type="submit" name="button" id="button" value="Enviar" />
            <table width="100%" border="0">
              <tr>
                <td align="center" width="51%"><img src="<? echo $rsDoctorResponde["../rutaimagen"]; ?>" width="70" height="100"></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="2" id="rojo2">&nbsp;</td>
        </tr>
      </table>
    </form>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><a href="http://www.infodisfap.com/doctor-responde/mantDoctor-Responde-Admi.php?pagina=<?php echo $paginacion?>" >Volver</a></td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>