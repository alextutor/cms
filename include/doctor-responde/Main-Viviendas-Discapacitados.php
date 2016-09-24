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

 <?php     
   // include("config.php");  
   //include("functions.php");
   // include($_SERVER['DOCUMENT_ROOT'].'/rutinas/conexioninfodisfap.php'); 
	include($_SERVER['DOCUMENT_ROOT'].'/Foros/Viviendas-Discapacitados/functions.php');    
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

<link href="doctor-responde/narcissus.css" rel="stylesheet" type="text/css">
<link href="doctor-responde/Flickr.css" type="text/css" rel="stylesheet">
</head>
<body>
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
      <!--idcate = 8 es decir a vivienda pero se le puede poner por descripcion que envie y recoja por descripcion
        //idcate=8 DoctorResponde idsubcate=67 vivienda -->        
    <a href='principal.php?pagina=doctor-responde/FormConsulta&idcate=8&idsubcate=67&procedencia=ForoViviendaDiscapacitados&PaginaDestino=Foros/Main-Viviendas-Discapacitados&ConsultaRespuesta=AgregarConsulta'> <img src="doctor-responde/imagen/Nuevo-Tema-naranja.gif" width="98"  border="0" height="25"></a>   
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
    <?php	  		 	
		//AL PRINCIPIO COMPRUEBO SI HICIERON CLICK EN ALGUNA PÁGINA
		include($_SERVER['DOCUMENT_ROOT'].'/paginacion/config/db.php');
     //$conexion=get_db_conn(); 
if(isset($_GET['page'])){
    $page= $_GET['page'];
}else{
//SI NO DIGO Q ES LA PRIMERA PÁGINA
    $page=1;
}
 
//ACA SE SELECCIONAN TODOS LOS DATOS DE LA TABLA
//idcate=8 DoctorResponde idsubcate=67 vivienda 
$consulta="SELECT * FROM doctorresponde WHERE aceptado=1 and parent_id=0 and idcate=8 and idsubcate=67  ORDER BY id DESC";

$datos=mysql_query($consulta);
//if (mysql_num_rows($r) <> 0)  /// Inicio Si 1
	
//$consulta="SELECT * FROM peliculas";
//$datos=mysql_query($consulta,$conexion);
 
//MIRO CUANTOS DATOS FUERON DEVUELTOS
$num_rows=mysql_num_rows($datos);
 
//ACA SE DECIDE CUANTOS RESULTADOS MOSTRAR POR PÁGINA , EN EL EJEMPLO PONGO 15
$rows_per_page= 8;
 
//CALCULO LA ULTIMA PÁGINA
$lastpage= ceil($num_rows / $rows_per_page);
 
//COMPRUEBO QUE EL VALOR DE LA PÁGINA SEA CORRECTO Y SI ES LA ULTIMA PÁGINA
$page=(int)$page;
if($page > $lastpage){
    $page= $lastpage;
}
if($page < 1){
    $page=1;
}
 
//CREO LA SENTENCIA LIMIT PARA AÑADIR A LA CONSULTA QUE DEFINITIVA
$limit= 'LIMIT '. ($page -1) * $rows_per_page . ',' .$rows_per_page;
 
//REALIZO LA CONSULTA QUE VA A MOSTRAR LOS DATOS (ES LA ANTERIO + EL $limit)
$consulta .=" $limit";
$peliculas=mysql_query($consulta);
 
if(!$peliculas){
        //SI FALLA LA CONSULTA MUESTRO ERROR
 die('Invalid query: ' . mysql_error());
}else{  
?>



 <?php              
 // <!----------------------------Inicio Listado de Productos------------------------------------------------------------------>
	  //SI ES CORRECTA MUESTRO LOS DATOS    
      while($row = mysql_fetch_assoc($peliculas)):			
			getComments($row,1);			
      endwhile;          
    ?>             
    
          <!----------------------------Fin Listado de Consultas------------------------------------------------------------------>

<br><br>
<!--Inicio  Tabla 2 para centrar paginacion-->   
<table width="50%" border="0" align="center">
  <tr>
    <td>
        
<?
//UNA VEZ Q MUESTRO LOS DATOS TENGO Q MOSTRAR EL BLOQUE DE PAGINACIÓN SIEMPRE Y CUANDO HAYA MÁS DE UNA PÁGINA
 
if($num_rows != 0){
   $nextpage= $page +1;
   $prevpage= $page -1;
?><ul id="pagination-digg"><?
//SI ES LA PRIMERA PÁGINA DESHABILITO EL BOTON DE PREVIOUS, MUESTRO EL 1 COMO ACTIVO Y MUESTRO EL RESTO DE PÁGINAS
 if ($page == 1) {
 	?>
      <li class="previous-off">&laquo; Anterior</li>
      <li class="active">1</li> <?
	for($i= $page+1; $i<= $lastpage ; $i++){?>
			<li><a href="http://www.infodisfap.com/principal.php?pagina=doctor-responde/index&page=<? echo $i;?>"><? echo $i;?></a></li>
 <? }
       //Y SI LA ULTIMA PÁGINA ES MAYOR QUE LA ACTUAL MUESTRO EL BOTON NEXT O LO DESHABILITO
	if($lastpage >$page ){?>		
      <li class="next"><a href="http://www.infodisfap.com/principal.php?pagina=doctor-responde/index&page=<? echo $nextpage;?>" >Siguiente &raquo;</a></li><?
	}else{?>
	  <li class="next-off">Siguiente &raquo;</li>
<?	}
 } else {
//EN CAMBIO SI NO ESTAMOS EN LA PÁGINA UNO HABILITO EL BOTON DE PREVIUS Y MUESTRO LAS DEMÁS
	?>
	 <li class="previous"><a href="http://www.infodisfap.com/principal.php?pagina=doctor-responde/index&page=<? echo $prevpage;?>"  >&laquo; Anterior</a></li><?
      for($i= 1; $i<= $lastpage ; $i++){
                       //COMPRUEBO SI ES LA PÁGINA ACTIVA O NO
	  		if($page == $i){
		?>	<li class="active"><? echo $i;?></li><?
			}else{
		?>	<li><a href="http://www.infodisfap.com/principal.php?pagina=doctor-responde/index&page=<? echo $i;?>" ><? echo $i;?></a></li><?
			}
	  }
         //Y SI NO ES LA ÚLTIMA PÁGINA ACTIVO EL BOTON NEXT		
	  if($lastpage >$page ){	?>	
      <li class="next"><a href="http://www.infodisfap.com/principal.php?pagina=doctor-responde/index&page=<? echo $nextpage;?>">Siguiente &raquo;</a></li><?
	  }else{
	?> <li class="next-off">Siguiente &raquo;</li><?
	  }
 }	  
?></ul></div><?
} 
} ?> 

	</td>
  </tr>
	</table><!--Fin Tabla 2 para centrar paginacion-->   


</TD>
</TR> 
</TABLE>  <!--Fin Tabla 1 -->   
<br><br>
   
   <!-----------------Inicio Formulario COntestacion -->
   <!-----------------FIN Formulario COntestacion -->
<?php
	//	include($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 
?>

</body>
</html>
