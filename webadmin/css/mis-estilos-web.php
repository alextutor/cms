<?php	//http://www.cssblog.es/como-usar-variables-php-en-css/
   include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/include/config-webadmin.php'); 
?>
<style type="text/css">
/* --------------- Contactenos -----------*/
.ctn_contactos {
  width: 950px;
  margin: 0 auto; 
  color:#333;
}
.ctn_contactos .iz_contac_container {
  float:left;			
 height:450px;
}
.ctn_contactos .der-container {
  width: 280px;
  float:right;
   margin-left:15px;
  margin-right:15px;	
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

	form, button{border:0; margin:0; padding:0;}
	.spacer{clear:both; padding-bottom:5px;}
	/* ———– My Form ———– */
	.myform{
		margin:0 auto;
		width:580px;
		padding:14px;
	}
	/* ———– stylized ———– */
	#stylized{
		border:solid 2px #DDD; 
		background: <?php echo $colo_fdo_form_contac ?>;
	}
	#stylized h1,h2,h3,h4 {	
		/* le aplica a propaganda cambiante  jFlow lo desivlite poque queria blanco*/
		color: #FFF;
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

</style> 