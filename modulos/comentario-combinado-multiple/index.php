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
<script type='text/javascript' src='/include/js/jquery-1.7.1.min.js'></script>

<script type='text/javascript'>
$(function(){
 $("a.reply").click(function() {
  var id = $(this).attr("id");
  $("#parent_id").attr("value", id);
  document.mensaje.nombre.focus();

 });
});
</script>
 <?php  include_once $_SERVER['DOCUMENT_ROOT']."/config.php"; ?>  
<style type="text/css">

#ctn_coment {width:100%;margin:0px auto;padding:15px 0px; margin-top:20px;}
.coment_titulo{font-size:13px;color:black;font-weight:bold; text-align:center;}
.comment {padding:5px;border:2px solid #7d5f1e;margin-top:15px;list-style:none;}
.aut {font-weight:bold;}
.timestamp { font-size:85%; float:right;}
.reply {cursor: pointer; float:right;font-size: 12px; font-weight:bold; color:#F00;} /*Responder*/
</style>
</head>

<div id='ctn_coment'>
<TABLE CELLSPACING=1 CELLPADDING=1 WIDTH=100% BORDER=0 STYLE="border:1px solid black">
<TR>
<TD>
<div class="coment_titulo">Comentarios De Los Usuarios</div>
</TD>
</TR>
<TR>
<TD HEIGHT=1 BGCOLOR=black>
</TD>
</TR>
<TR>
<TD BGCOLOR="#FEFEFE">
<SPAN STYLE="font-size:12px;font-family:Tahoma;color:black;">	
<?php	  
	include($_SERVER['DOCUMENT_ROOT'].'/modulos/pagina-actual.php');
	include_once($_SERVER['DOCUMENT_ROOT'].'/modulos/comentario-combinado-multiple/functions.php'); 		  		  
	//un select a la pagina actual para ver si se presenta comentario  o no
	$subresultcomen=mysql_query("SELECT * FROM contenido where camicontenido='".$cpaginaactual."'");      	
	$cuenta = mysql_num_rows($subresultcomen);
	$subrowcomen = mysql_fetch_array($subresultcomen);      
   
if ($subrowcomen['cestcomentario'] ==1) {  //Inicio si 1
	$resultComen = "SELECT SQL_CALC_FOUND_ROWS * FROM comentarios WHERE id_noticia='".$subrowcomen['ccodcontenido']. "' and parent_id=0 ORDER BY id ASC";
	//echo $resultComen;exit;
	$r = mysql_query($resultComen);
	$cuenta = mysql_query("SELECT FOUND_ROWS()");   
	//echo $cuenta."---";exit;
	if ($cuenta  <> 0) 	
	{	
		  while ($row = mysql_fetch_array($r))  { getComments($row,1);}	
	} 
}  //fin si 1
?>

</SPAN>
</TD>
</TR> 
</TABLE>  <!--Fin Tabla 1 -->   
	<?php include_once($_SERVER['DOCUMENT_ROOT'].'/modulos/comentario-combinado-multiple/form-enviar-comentario.php');?>
</div>