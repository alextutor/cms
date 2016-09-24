<?php session_start();	
  include $_SERVER['DOCUMENT_ROOT']."/config.php";	
  extract($_POST);
  $id_usuario=$_SESSION['id_usu_web'];
  $id_cliente=$_SESSION['id_usu_web'];
   $sql_cusu = "select * from usuarios where id_usuario = '".$_SESSION['id_usu_web']."'";
   $rs_cusuario = mysql_query( $sql_cusu);
   while($row_cusuario = mysql_fetch_assoc($rs_cusuario)):
   		$nombre=$row_cusuario['nombre'];  
		$email=$row_cusuario['email'];
		$imagenfoto =$row_cusuario['imagenfoto'];
		if ($imagenfoto==""){$imagenfoto="/modulos/comentario-combinado-multiple/usuario-anonimo.gif";};
   endwhile;	     
 
   $titulo=$_POST['titulo'];    
   //$idcate = $_POST['idcate']; 	
   $idcate="categoria";
   $comentario=$_POST['comentario'];         
   $id_noticia=$_POST['id_noticia'];           
   //$imagenfoto ="/modulos/comentario-combinado-multiple/usuario-anonimo.gif"; 
   $parent_id = $_POST['parent_id']; 
   
   /*----- estamos comentando fuera de noticias ---- */
   if ($id_noticia==""){$id_noticia="";};
   if ($parent_id==""){$parent_id="0";};
   /*----- estamos comentando fuera de noticias ---- */  
   
   
//-----------INICIO Para Evitar Que mande en url anunciando su pagina SPAM-----------------------
//http://sumolari.com/detectar-un-caracter-con-php/
//strrpos nos devuelve el valor del lugar que ocupa la cadena de texto especificada  en caso de que ésta exista, o false en caso de que no esté.
//strrpos necesita dos cadenas de texto para funcionar: La cadena de texto donde buscará y los caracteres que debe buscar.
//strrpos('cadena donde buscar', 'caracteres a buscar');

$posicion = strrpos($comentario, "http://");
if ($posicion === false) {
			   // Obtenemos y traducimos el nombre del día
			$dia=date("l");
			if ($dia=="Monday") $dia="Lunes";
			if ($dia=="Tuesday") $dia="Martes";
			if ($dia=="Wednesday") $dia="Miércoles";
			if ($dia=="Thursday") $dia="Jueves";
			if ($dia=="Friday") $dia="Viernes";
			if ($dia=="Saturday") $dia="Sabado";
			if ($dia=="Sunday") $dia="Domingo";
			
			// Obtenemos el número del día
			$dia2=date("d");
			
			// Obtenemos y traducimos el nombre del mes
			$mes=date("F");
			if ($mes=="January") $mes="Enero";
			if ($mes=="February") $mes="Febrero";
			if ($mes=="March") $mes="Marzo";
			if ($mes=="April") $mes="Abril";
			if ($mes=="May") $mes="Mayo";
			if ($mes=="June") $mes="Junio";
			if ($mes=="July") $mes="Julio";
			if ($mes=="August") $mes="Agosto";
			if ($mes=="September") $mes="Setiembre";
			if ($mes=="October") $mes="Octubre";
			if ($mes=="November") $mes="Noviembre";
			if ($mes=="December") $mes="Diciembre";
			// Obtenemos el año
			$ano=date("Y");
			$hora=date ( "h:i:s A") ;
			// Imprimimos la fecha completa
			//echo "$dia $dia2 de $mes de $ano";
			$cfechalarga=   "$dia $dia2 de $mes de $ano Hora: $hora" ;
			$cfechacorta=date("Y/m/d"); 
			 //----------------Fin Para Fecha---------------------------------------------------
				
			   //$_POST['$nombre']
			   // $persona=$_POST['$persona'];    
				//Generamos la ssql e insertamos el registro
				$ssql ="insert into comentarios(nombre,email,titulo,comentario,fechacorta,fechalarga,id_noticia,imagenfoto,idcate,parent_id,id_usuario,id_cliente) values('$nombre','$email','$titulo','$comentario','$cfechacorta','$cfechalarga','$id_noticia','$imagenfoto','$idcate','$parent_id','$id_usuario','$id_cliente')";
//echo $ssql;exit;
mysql_query($ssql) or die ("problema con query");	
//----Inser para Doctor Responde ------------
$CONV_Telefono="";		
$procedencia="Noticias"; 	
$ssql ="insert into doctorresponde (nombre,email,titulo,comentario,fechacorta,fechalarga,id_noticia,imagenfoto,idcate,parent_id,mostrarportada,aceptado,procedencia,telefono,id_usuario,id_cliente) values('$nombre','$email','$titulo','$comentario','$cfechacorta','$cfechalarga','$id_noticia','$imagenfoto','$idcate','$parent_id','1','1','$procedencia','$CONV_Telefono','$id_usuario','$id_cliente')";
 
 mysql_query($ssql) or die ("problema con query");
  $_SESSION['titulo_comentario']=$titulo;
 
 //include $_SERVER['DOCUMENT_ROOT']."/modulos/enviar-correo.php";	
 
} //-----------FIN Para Evitar Que mande en url anunciando su pagina SPAM-----------------------	


?>
<script language="javascript"> 
<?php
    $paginaatras=$_SERVER["HTTP_REFERER"];
	echo "location.href = '$paginaatras' ";
?> 
</SCRIPT>