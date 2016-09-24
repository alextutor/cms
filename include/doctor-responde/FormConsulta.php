<?php
session_start();			
error_reporting(E_ALL);
@ini_set('display_errors', '0');								
//Esta función nos permite comprobar si una variable se ha definido y en ese caso devuelve un True.
 //La sintaxis es isset($variable), es muy útil para comprobar si se han rellenado los campos de un formulario
 include($_SERVER['DOCUMENT_ROOT'].'/rutinas/conexioninfodisfap.php'); 

$id_cliente = $_GET['id_cliente']; 
if(isset($_SESSION['id_cliente']))
	{
     $id_cliente=$_SESSION['id_cliente'];									
	 $alias=$_SESSION['alias'];
   	  $result=mysql_query("select rutaimagen,AES_DECRYPT(contrasena,'$llavesita') as contrasena from clientes  Where id_cliente='$id_cliente' ",$conexion);    
	  $rsCliente=mysql_fetch_array($result);    
	  $cRutaImagenCli= $rsCliente['rutaimagen'];  
	  $cContrasenaCli= $rsCliente['contrasena'];   								 						   
   	  mysql_free_result($result);	
      //include($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 
 }	         
                  

 $parent_id = $_GET['parent_id']; 
 $idcate= $_GET['idcate']; 
 $idsubcate= $_GET['idsubcate']; 
 $idSubSubcate= $_GET['idSubSubcate'];  
 $PaginaDestino= $_GET['PaginaDestino'];  
 $procedencia= $_GET['procedencia'];   
 $ConsultaRespuesta= $_GET['ConsultaRespuesta'];  
 ?>

<script language="JavaScript" type="text/javascript">
function trim(pStr)
{
	while (pStr.charAt(0) == ' ') pStr = pStr.substring(1);
	while (pStr.charAt(pStr.length - 1) == ' ') pStr = pStr.substring(0, pStr.length - 1);
	return pStr;
}

function validar_form(val) {
	if (trim(document.getElementById("nombre").value)=="") {
		alert("Debe rellenar el campo Nombre.");
		document.getElementById("nombre").focus();
		return false;
	} 
	if (trim(document.getElementById("comentario").value)=="") {
		alert("Debe rellenar el campo comentario.");
		document.getElementById("comentario").focus();
		return false;
	} 

	else {	
		camp=document.getElementById("validar").value;
		funcio="validar_"+camp;
		return eval("validar_"+camp)(val,2);
	}	
}

</script>
<style type="text/css">
html, body, div, h1, h2, h3, h4, h5, h6, ul, ol, dl, li, dt, dd, p, blockquote,
pre, form, fieldset, table, th, td { margin: 0; padding: 0; }

body {
font-size: 14px;
line-height:1.3em;
}

a, a:visited {
outline:none;
color:#7d5f1e;
}

.clear {
clear:both;
}

#wrapper {
 width:710px;
 margin:0px auto;
 padding:15px 0px;
}

.comment {
 padding:5px;
 border:2px solid #7d5f1e;
 margin-top:15px;
 list-style:none;
}

.aut {
 font-weight:bold;
}

.timestamp {
 font-size:85%;
 float:right;
}

#comment_form {
 margin-top:15px;
}

#comment_form input {
 font-size:1.2em;
 margin:0 0 10px;
 padding:3px;
 display:block;
 width:100%;
}

#comment_body {
 display:block;
 width:100%;
 height:150px;
}

#submit_button {
 text-align:center; 
 clear:both;
}

</style>

 <form id="comment_form" action="http://www.infodisfap.com/doctor-responde/post_comment.php" method='post' onSubmit="return validar_form(this)">
     <table width="100%" border="0">
       <tr>
         <td  align="center" colspan="3">
         	 <p align="center"> 
				<? $mensaje = $_GET['mensaje']; 
                 echo " <font color='#FF0000'><b> $mensaje  </b></font>  "; 
                ?> 	
            </p>
         </td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>
         <input type='hidden' name="id_cliente" value="<?php echo $id_cliente ?>">
         <input type='hidden' name="parent_id" value="<?php echo $parent_id ?>">
</td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td><input type='hidden' name="PaginaDestino" value="<?php echo $PaginaDestino ?>"></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>
         <input type='hidden' name="idcate" value="<?php echo $idcate ?>">
         <input type='hidden' name="idsubcate" value="<?php echo $idsubcate ?>">        
         <input type='hidden' name="idSubSubcate" value="<?php echo $idSubSubcate ?>">      
         
         <input type='hidden' name="procedencia" value="<?php echo $procedencia ?>">      
         
         </td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td width="18%">Nombre o Alias:</td>
         <td width="59%"><p><font color="#000000"><strong>Por motivos de Privacidad no Publicaremos su Nombre </strong></font>
           </p>
           <p>
             <input name="nombre" type="text" id="nombre" value="<?php echo $_SESSION['alias'] ?>" size="50"/>
         </p></td>
         <td width="23%">&nbsp;</td>
       </tr>
       <tr>
         <td>Telefono</td>
         <td><input name="telefono" type="text" id="telefono" value="<?php echo $_SESSION['telefono'] ?>" size="50"/></td>
         <td align="center"><font color="#FF0000"><strong>Opcional</strong></font></td>
       </tr>
       <tr>
         <td>E-mail :</td>
         <td><p><font color="#000000"><strong>Por motivos de Privacidad no Publicaremos su E-mail </strong></font>
           </p>
           <p>
             <input name="email" type="text" id="email" value="<?php echo $_SESSION['email'] ?>" size="50"/>
         </p></td>
         <td align="center"><font color="#FF0000"><strong>Opcional</strong></font></td>
       </tr>
       <tr>
         <td>Titulo :</td>
         <td><input name="titulo" type="text" id="titulo" size="50"/></td>
         <td align="center"><font color="#FF0000"><strong>Opcional</strong></font></td>
       </tr>
       <tr>
         <td>Comentarios:</td>
         <td><textarea name="comentario" cols="50" rows="10" id='comentario'></textarea></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td colspan="3"></td>
       </tr>
       <tr>
         <td colspan="3">&nbsp;</td>
       </tr>
       <tr>
         <td colspan="3">
           <table width="100%" border="0">
             
             <tr>
               <td colspan="2"><table width="53%" border="0" align="center">
                 <tr>
                   <td><input type="submit" value="<?php echo $ConsultaRespuesta ?>"/></td>
                 </tr>
                 <tr>
                   <td  align="center" width="55%">
					
                   <a href="javascript:history.back()"><img src="../imagen/atras.jpg" width="202"  border="0" height="56" /></a>                   
                   </td>
                 </tr>
               </table></td>
             </tr>
         </table></td>
       </tr>
     </table>
<br>  
      <div id='submit_button'></div>
 </form>