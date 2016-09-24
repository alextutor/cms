<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Threaded Comments</title>

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
<!--<script type='text/javascript' src='doctor-responde/jquery-1.4.3.min.js'></script> -->
<script type='text/javascript' src='../js/jquery-1.4.4.min.js'></script>
<script type='text/javascript'>
$(function(){
 $("a.reply").click(function() {
  var id = $(this).attr("id");
  $("#parent_id").attr("value", id);
 });
});
</script>


 <?php    
   // include("config.php");  
   //include("functions.php");
    include($_SERVER['DOCUMENT_ROOT'].'/rutinas/conexioninfodisfap.php'); 
	include($_SERVER['DOCUMENT_ROOT'].'/doctor-responde/functions.php');    
 ?>  

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

<link href="narcissus.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--Inicio wrapper -->
<div id='wrapper'>

<!--Inicio Tabla 1 -->  
<TABLE CELLSPACING=1 CELLPADDING=1 WIDTH=100% BORDER=0 STYLE="border:1px solid black">
<TR>
  <TD BGCOLOR="#FAFAFA">
  <CENTER>
    <p style="font-size:13px;font-family:Tahoma;color:black;font-weight:bold"> Consultas de Los Usuarios
      </p>
    <p style="font-size:13px;font-family:Tahoma;color:black;font-weight:bold"><font color="#000000"><strong>Por motivos de Privacidad no Publicaremos su Nombre </strong></font>y E-mail</p>
    <p style="font-size:13px;font-family:Tahoma;color:black;font-weight:bold">Si conoces del Tema y deseas ayudar responde a las Consultas de cada usuario en Responder</p>
    <p style="font-size:13px;font-family:Tahoma;color:black;font-weight:bold">Sino Abre 
    <a href='#comment_form'> <img src="doctor-responde/imagen/Nuevo-Tema-naranja.gif" width="98"  border="0" height="25"></a>   
    </p>
       
  </CENTER>
  </TD>
</TR>
<TR>
  <TD  align="center" BGCOLOR="#FAFAFA">   	
    <p align="center"> 
				<? $mensaje = $_GET['mensaje']; 
                 echo " <font color='#FF0000'><b> $mensaje  </b></font>  "; 
                ?> 	
     </p>            
  </TD>
</TR>

<TR>
<TD HEIGHT=1 BGCOLOR=black>
</TD>
</TR>

<TR>
<TD BGCOLOR="#FEFEFE">

<SPAN STYLE="font-size:13px;font-family:Tahoma;color:black;">
	
    	 <?php	  		 	
		 
       //Obtener el número de registros mas rapido utilisando SQL_CALC_FOUND_ROWS  y FOUND_ROWS()
		$SqlComen = "SELECT SQL_CALC_FOUND_ROWS * FROM doctorresponde WHERE aceptado=1 and parent_id=0 ORDER BY id DESC";
        $r = mysql_query($SqlComen);
		$nTotal = mysql_query("SELECT FOUND_ROWS()");        
		//if (mysql_num_rows($r) <> 0)  /// Inicio Si 1
		if ($nTotal<> 0)  /// Inicio Si 1
		{	  
			while($row = mysql_fetch_assoc($r)):			
				getComments($row,1);
			endwhile;
		 }	                         /// Fin Si 1
		mysql_free_result($r);	
		?>

</SPAN>
</TD>
</TR> 
</TABLE>  <!--Fin Tabla 1 -->   

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
         <td width="18%">Nombre o Alias:</td>
         <td width="59%"><p><font color="#000000"><strong>Por motivos de Privacidad no Publicaremos su Nombre </strong></font>
           </p>
           <p>
             <input name="nombre" type="text" id="nombre" size="50"/>
         </p></td>
         <td width="23%">&nbsp;</td>
       </tr>
       <tr>
         <td>E-mail :</td>
         <td><p><font color="#000000"><strong>Por motivos de Privacidad no Publicaremos su E-mail </strong></font>
           </p>
           <p>
             <input name="email" type="text" id="email" size="50"/>
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
         <td colspan="3"><input type='hidden' name='parent_id' id='parent_id' value='0'/></td>
       </tr>
       <tr>
         <td colspan="3">&nbsp;</td>
       </tr>
       <tr>
         <td colspan="3"><input type="submit" value="Agregar Consulta"/></td>
       </tr>
     </table>
     <br>  
      <div id='submit_button'></div>
  </form>
<?php
			
		include($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 
?>
</div><!--Fin wrapper -->
</body>
</html>
