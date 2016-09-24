<?php	//http://www.cssblog.es/como-usar-variables-php-en-css/
   include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/include/configuration.php'); 
?>
<style type="text/css">
@charset "utf-8";
@import url(http://fonts.googleapis.com/css?family=Open+Sans);
@import url(http://fonts.googleapis.com/css?family=Roboto);
@import url(http://fonts.googleapis.com/css?family=Spirax);
@import url(http://fonts.googleapis.com/css?family=Droid +Sans:400,700);
@import url(http://fonts.googleapis.com/css?family=Aclonica);

.primero {} /*NO QUITAR si quito esto no me funciona investigar alex*/

body
{  
   font-family: 'Roboto', sans-serif;
    font-size: 14px;  
	line-height: 18px;
    text-align: justify;
	background-image:url('<?php echo $img_fondo_web?>');	
	background-color: <?php echo $colo_fondo_web?> ;

	margin:0 auto;	
	scrollbar-face-color:#FFFFFF;
	scrollbar-arrow-color:#00a0df
;
	scrollbar-highlight-color:#fff6eb;
	scrollbar-3dlight-color:#00a0df
;
	scrollbar-shadow-color:#00a0df
;
	scrollbar-darkshadow-color:#fff6eb;
	scrollbar-track-color:#FFFFFF;	
}

#warp{	
	width:960px;		
	color: #ffffff;
	margin:0 auto;	
	margin-top:5px; 	
	border-radius: 10px;
	-moz-border-radius: 11px;     	/*(firefox)*/
	-webkit-border-radius: 11px;   /*(chrome,safari)*/
	-O-border-radius: 11px;   /*(opera)*/
	behavior: url(/ie-css3.htc);  /*(IE)*/		
} 

p {margin: 0px 0px 8px 0px; padding: 0px 0px 0px 0px;}


/* agrupa el contenido de la idsec1 tanto texto e imagenes lado derecha*/
.contenedor_derecha{margin: 0 auto;} 

h1, h2, h3, h4, h5, h6 {
	margin: 15px 0px 25px 0;
	color:#ffffff; 
}
h1 {font-size: 18px;} h2 {font-size: 12px;color:#ff0000;} h3 {font-size: 12px;} h4 {font-size: 12px;}
li {padding-bottom: 4px;}

/* Inicio Imagen */
a img{border: none;} 
img {border:0;}
/* es cuando una imagen esta en medio de dos parrafos para darle la separacin y no usar br*/
.cnt_img_sola {	margin:15px 0px; text-align:center; clear:both;}
/* cuando presento 2 imagenes junstas es para separarlas  */
.cnt_img_sola .img_1 { float:left;}
.cnt_img_sola .img_2 { float:right;}

/* Fin Imagen */

/* Inicio texto lado derecha y al costado la imagen en lado izquierda */
.ctn_general_texto {
	clear:both;
	
}	
.ctn_general_texto .ctn_texto_img_dere {
	float:left;
	width:400px;
	margin: 0px 0px;
}

.ctn_general_texto .imagen {
	float:right;
	margin: 0px 0px;
	width:265px;
	text-align:right;
}
/* Fin texto lado derecha y al costado la imagen en lado izquierda */

.titulo_preguntas { 
	font-size : 12px; 
	font-weight : bold; 
}

header, footer, aside, nav, article, section, form {
    display: block;    
}
/* **********ENCABEZADO**************************************/
#encabezado {
position: relative;
top: 0px;
left: 0px;
width: 100%;
height: auto;
margin-bottom: 15px;
padding-left: 5px;
padding-right: 5px;
padding-top: 15px;
display: inline-block;
box-sizing: border-box;
-moz-box-sizing: border-box;
}
.contenedor-logo{
	margin:10px auto;

}
.contenedor-logo .textologo{	
	text-transform: uppercase;
    font-family: 'Droid Sans', sans-serif;
    font-size: 26px;  
	color: transparent;
	color:#FFF;
	letter-spacing:-0.05em;
	text-shadow: #211C1C 0px 5px 2px;	
}
.contenedor-logo .texto_rubro_logo{	
	font-family: 'Aclonica', serif;
    font-size: 18px;  
	color: transparent;
	color:#FFF;
	letter-spacing:-0.05em;	
}

#encabezado .menu{
	clear:both;
	margin:10px auto;

}
#encabezado .slider{	
	clear:both;
	margin:0 auto;
}
/* -----------------------------------      */
.PiePrincipal
{
	width: 950px;
	padding: 5px 5px;
	clear:both;
	margin:0 auto;
	margin-bottom:5px;    
   	background-color:<?php echo $colo_pie_web?>; 
	border: solid 1px #dddddd;
 	border-radius: 10px;
	-moz-border-radius: 11px;     	/*(firefox)*/
	-webkit-border-radius: 11px;   /*(chrome,safari)*/
	-O-border-radius: 11px;   /*(opera)*/	
	behavior: url(/ie-css3.htc);  /*(IE)*/          
}

/* Apartado */
aside	{ 
   /*http://www.wextensible.com/temas/css3-fondo-bordes/bordes.html*/
	width:210px; 
	float:left !important; 	
	margin-left:5px;	
}
aside .side {
  width: 220px;
  border: 2px solid #cc3300;
  background-color: #F6FAFA;
  margin-top: 10px;
  margin-left: 5px;  
  padding-bottom: 5px;
  font-size: 12px;
  color: #777777;
  text-align:center;
  
  box-shadow: #aaa 0 0 10px;
  border-radius: 10px;
  -moz-border-radius: 11px;     	/*(firefox)*/
  -webkit-border-radius: 11px;   /*(chrome,safari)*/
  -O-border-radius: 11px;   /*(opera)*/
  
  	position: relative;
	z-index:1;
	behavior: url(/ie-css3.htc);  /*(IE)*/      
}
aside .side h3 {
  border-bottom: 1px solid #DEEBEB;
  font-size: 16px;
  font-weight: bold;
  letter-spacing: -1px;  
  color: #e73f3f;
}


section {	
	margin:0 auto;	
	text-align: justify;
}

section#presentacion {
	width: 950px;
	padding: 5px 5px;
	clear: both;
	margin: 0 auto;	
	background-color:<?php echo $colo_presentacion?>; 
	border: solid 1px #dddddd;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border-radius: 10px;
	-goog-ms-border-radius: 10px;		
}

/* --- LINKS--- */
a:visited {
	text-decoration: none;
	color: #ffffff;
}
a{
	text-decoration:none;
	color: #ffffff;
} 
a:hover {
	color: #ffffff;
}
/* --- LINKS--- */

/* caja rectangular*/
.boxin {
	box-shadow: #aaa 0 0 10px;
	-webkit-box-shadow: #aaa 0 0 10px;
	-moz-box-shadow: #aaa 0 0 10px;
	border: 1px solid #999;
	border-radius: 6px;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	background: #fff;
	/*height:130px;*/
	text-align:center;
	margin:0 auto;
}
.boxin .content {
	padding-top:10px;
	margin-bottom: 5px;
	/* height:50px;		*/
}
/* --------------- Contactenos -----------*/
.ctn_contactos {
  width: 960px;
  margin: 0 auto; 
  color:#333;
}
.ctn_contactos .iz_contac_container {
  float:left;			
 height:489px;
}
.ctn_contactos .der-container {
  width: 280px;
  float:right;
  margin-left:22px;			
  border: 1px solid #DDD;	
  background: #fff;
  height:489px;
}	
.ctn_contactos .der-container h2{
	padding: 8px 10px;
	color: #555;
	text-shadow: 1px 1px 1px white;
	letter-spacing: 1px;
	border-bottom: 1px solid #DDD;
	background-color:<?php echo $colo_titulo_resena ?> ;
	text-transform: uppercase;
	margin:0;
	
}	
.ctn_contactos .der-container .contenido{
	padding: 10px;
}

	p, h1, form, button{border:0; margin:0; padding:0;}
	.spacer{clear:both; padding-bottom:5px;}
	/* ———– My Form ———– */
	.myform{
		margin:0 auto;
		width:580px;
		padding:14px;
	}
	/* ———– stylized ———– */
	#stylized{
		border:solid 2px #9d4646; 
		background: <?php echo $colo_fdo_form_contac ?>;
	}
	#stylized h1,h2,h3,h4 {	
		color: #303030;
		font-weight:bold;
		margin-bottom:8px;
		margin: 15px 0;
		line-height: 1.1em;
		padding-left: 5px;
	}
	#stylized h1 {
		font-size:22px;	
	}
	#stylized h4 {
		font-size: 22px;
	}
	#stylized p{
		font-size:11px;
		color:#666666;
		margin-bottom:20px;
		border-bottom:solid 1px #b7ddf2;
		padding-bottom:10px;
	}
	#stylized label{
		display:block;
		font-weight:bold;
		text-align:right;
		width:140px;
		float:left;
		margin-right: 20px;
		margin-top: 5px;
	}
	#stylized .small{
		color:#666666;
		display:block;
		font-size:11px;
		font-weight:normal;
		text-align:right;
		width:140px;
	}
	#stylized input{
		float:left;
		font-size:12px;
		padding:4px 2px;
		border:solid 1px #aacfe4;
		width:360px;
		margin:2px 0 20px 10px;
	}
	#stylized textarea{
		float:left;
		font-size:12px;
		padding:4px 2px;
		border:solid 1px #aacfe4;
		width:360px;
		margin:2px 0 20px 10px;
	}	
	#stylized button{
		clear:both;
		margin-left:290px;
		width:125px;
		height:31px;
		background:#666666 url(img/button.gif) no-repeat;
		text-align:center;
		line-height:31px;
		color:#FFFFFF;
		font-size:11px;
		font-weight:bold;
	}		

  input:focus:required:invalid {
	  /*background-color:yellow;*/
	}
    input:focus:required:valid {
	}
	

	ul li {
		padding: 0;
		margin: 0;
	}
	ul.lists {
		padding: 5px 0;
		list-style: none;
		margin: 0;
	}
	ul.lists a{
		color: #2A7b99;		
	}	
	ul.lists li {
		position: relative;
		padding-left: 25px;
		line-height: 25px;
	}
		
	ul.lists li .icon {
		width: 16px;
		height: 16px;
		display: block;
		position: absolute;
		left: 4px;
		top: 5px;
		background-image: url(contactenos/imagen/jf-list.gif) ;
		background-repeat: no-repeat;
		background-position: 0 0;
	}
	ul.lists li.mail .icon {background-position: -288px 0;}
	ul.lists li.location .icon {background-position:-79px -32px	}	
	ul.lists li.iphone .icon {background-position: -64px -32px;}
	ul.lists li.chart .icon {background-position:-272px -32px;}
	

/* --------------- Galeria.php -----------*/
.ctn_galeria{
	width: 960px;
	margin: 0 auto;		
	color:#333;
}
.ctn_galeria .iz-container {
	float:left;
	width: 210px;
	margin-left:1px;						
	border: 1px solid #DDD;		
	background-color:<?php echo $colo_fdo_lado_iz ?> ;				
	height:489px;
	border-radius: 10px;
	-moz-border-radius: 11px;     	/*(firefox)*/
	-webkit-border-radius: 11px;   /*(chrome,safari)*/
	-O-border-radius: 11px;   /*(opera)*/
	behavior: url(/ie-css3.htc);  /*(IE)*/
	padding-left:10px;
}
.ctn_galeria .der-container {		
	float:right;
	width:700px;
	margin-right:1px;		
	border: 1px solid #DDD;	
	background: <?php echo $colo_fdo_lado_der ?> ;
	height:489px;
}
</style> 