<?php
include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');			
$webplan="0001"	;
$sql_website = "SELECT * FROM estilopagina where ccodplantilla='".$webplan."'";
//echo $sql_website ;exit;
$res_website = db_query($sql_website);
while ($row_website = db_fetch_array($res_website))
{
	$cnomplantilla  	= $row_website['cnomplantilla'];
	$webestilo  		= $row_website['webestilo'];
	$webancho  			= $row_website['webancho'];
	$webalineahor 		= $row_website['webalineahor'];
	$columnacenancho 	=$row_website['columnacenancho']-30;
	$columnaizqancho 	=$row_website['columnaizqancho'];
	$columnaderancho 	=$row_website['columnaderancho'];
	$cRutaWeb			=$_SERVER['DOCUMENT_ROOT']."/templates/".$cnomplantilla ."/";
	$ampliarimagen_portada=$row_website['ampliarimagen_portada'];	//para saber si se amplia imagen en la portada o se muestra como una noticia
	$ampliarvideo_portada=$row_website['ampliarvideo_portada'];	//para saber si se amplia imagen en la portada o se muestra como una noticia
	//echo $ampliarimagen_portada."sadasd";exit;
	$galeria_imagen=$row_website['galeria_imagen'];	//que tipo de libreria se usara para presentar la galeria de imagenes
	//echo $galeria_imagen."-sadasd";exit;
	//Tabla webparametros  
	//ccodparametro=0020 cvalparametro=1   cnomparametro=Menu Clasico
	//ccodparametro=0020 cvalparametro=2   cnomparametro=Zetta Menu
	//ccodparametro=0020 cvalparametro=3   cnomparametro=Menu Duramenu
	
	//Tabla webparametros $ccodestilomenu = ccodparametro (filtrar x 0021 alex mas adelante hacer un select para asignar el $ccodestilomenu )
	$ccodestilomenu='0021';
	$menuestilomenu=$row_website['menuestilomenu'];	//(1,2,3)  1 =Menu Clasico , 2 =Zetta Menu , 3 =Menu Duramenu
	
	//Recuerda alex recien la variable $multidrop toma valor para  actualizaseccionestilomenu.php
	$sql_Nombreestilomenu="select * from webparametros where ccodparametro='0021' and ctipparametro=".$menuestilomenu ." and cvalparametro='".$multidrop."'";			 	//echo $sql_Nombreestilomenu;exit;
	$rs_Nombreestilomenu = db_query($sql_Nombreestilomenu);
	$row_Nombreestilomenu = db_fetch_array($rs_Nombreestilomenu);	
	$cNombreestilomenu=$row_Nombreestilomenu['cnomparametro'];
}
?>