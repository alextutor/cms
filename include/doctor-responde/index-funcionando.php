<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Threaded Comments</title>

<script type='text/javascript' src='comentario-combinado-multiple/jquery-1.4.3.min.js'></script>
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
	include($_SERVER['DOCUMENT_ROOT'].'/comentario-combinado-multiple/functions.php');    
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

<link href="/comentario_multi/narcissus.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id='wrapper'>
<ul>
 <li class='comment'>
 <div class='aut'><!-- NAME OF THE AUTHOR --></div>
 <div class='comment-body'><!-- COMMENT BODY --></div>
 <div class='timestamp'><!-- TIMESTAMP --></div>
 <a href='#comment_form'>Reply</a>
  <!-- The following is an example of child comment -->
  <ul>
		 <?php
	   
       $q = "SELECT * FROM comentarios WHERE id_noticia=176  and parent_id=0 ORDER BY id ASC";
        $r = mysql_query($q);
        
		if (mysql_num_rows($r) == 0) {
	    echo "No se han encontrado filas, nada a imprimir, asi que voy " .
         "a detenerme.";
    	 //exit;
		}
		while($row = mysql_fetch_assoc($r)):			
            getComments($row);
        endwhile;
		//include($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 

		?>
   

  </ul>
 </li>
</ul>
    <form id="comment_form" action="http://www.infodisfap.com/comentario-combinado-multiple/post_comment.php" method='post'>
     <table width="100%" border="0">
       <tr>
         <td width="18%">Nombre o Alias:</td>
         <td width="59%"><input name="nombre" type="text" id="nombre" size="50"/></td>
         <td width="23%">&nbsp;</td>
       </tr>
       <tr>
         <td>E-mail :</td>
         <td><input name="email" type="text" id="email" size="50"/></td>
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
         <td colspan="3"><input type='hidden' name='id_noticia' id='id_noticia' value="176"/></td>
       </tr>
       <tr>
         <td colspan="3"><input type="submit" value="Add comment"/></td>
       </tr>
     </table>
     <br>
  
      <div id='submit_button'></div>
  </form>

</div>
</body>
</html>
