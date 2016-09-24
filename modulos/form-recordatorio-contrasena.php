<?php 	session_start();?>
<style type="text/css">
#recordarcontrasena
{
   
   /*background-color: #faf8e8;*/
   background-color: #f2efee;   
	border: 1px solid #9eac91;
	color: #333333;

    /*background-color: #fff;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));
    background-image: -webkit-linear-gradient(top, #fff, #eee);
    background-image: -moz-linear-gradient(top, #fff, #eee);
    background-image: -ms-linear-gradient(top, #fff, #eee);
    background-image: -o-linear-gradient(top, #fff, #eee);
    background-image: linear-gradient(top, #fff, #eee);  */
    height: 150px;
    width: 400px;
	margin:0 auto;   
    padding: 30px;
    /*position: absolute;
    top: 50%;
    left: 50%;
    z-index: 0;*/
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;  
   /* -webkit-box-shadow:
          0 0 2px rgba(0, 0, 0, 0.2),
          0 1px 1px rgba(0, 0, 0, .2),
          0 3px 0 #fff,
          0 4px 0 rgba(0, 0, 0, .2),
          0 6px 0 #fff,  
          0 7px 0 rgba(0, 0, 0, .2);
    -moz-box-shadow:
          0 0 2px rgba(0, 0, 0, 0.2),  
          1px 1px   0 rgba(0,   0,   0,   .1),
          3px 3px   0 rgba(255, 255, 255, 1),
          4px 4px   0 rgba(0,   0,   0,   .1),
          6px 6px   0 rgba(255, 255, 255, 1),  
          7px 7px   0 rgba(0,   0,   0,   .1);
    box-shadow:
          0 0 2px rgba(0, 0, 0, 0.2),  
          0 1px 1px rgba(0, 0, 0, .2),
          0 3px 0 #fff,
          0 4px 0 rgba(0, 0, 0, .2),
          0 6px 0 #fff,  
          0 7px 0 rgba(0, 0, 0, .2);*/
}

#login:before
{
   
}

/*--------------------*/

h1
{
   /* text-shadow: 0 1px 0 rgba(255, 255, 255, .7), 0px 2px 0 rgba(0, 0, 0, .5);
    text-transform: uppercase;*/
    text-align: center;
    color: #666;
    margin: 0 0 30px 0;
    letter-spacing: 4px;
    font: normal 20px/1 Verdana, Helvetica;
    position: relative;
}

/*h1:after, h1:before
{
    background-color: #777;
    content: "";
    height: 1px;
    position: absolute;
    top: 15px;
    width: 120px;   
}

h1:after
{ 
    background-image: -webkit-gradient(linear, left top, right top, from(#777), to(#fff));
    background-image: -webkit-linear-gradient(left, #777, #fff);
    background-image: -moz-linear-gradient(left, #777, #fff);
    background-image: -ms-linear-gradient(left, #777, #fff);
    background-image: -o-linear-gradient(left, #777, #fff);
    background-image: linear-gradient(left, #777, #fff);      
    right: 0;
}*/

h1:before
{
    background-image: -webkit-gradient(linear, right top, left top, from(#777), to(#fff));
    background-image: -webkit-linear-gradient(right, #777, #fff);
    background-image: -moz-linear-gradient(right, #777, #fff);
    background-image: -ms-linear-gradient(right, #777, #fff);
    background-image: -o-linear-gradient(right, #777, #fff);
    background-image: linear-gradient(right, #777, #fff);
    left: 0;
}

/*--------------------*/

fieldset
{
    border: 0;
    padding: 0;
    margin: 0;
}

/*--------------------*/

#inputs input
{
    background: #f1f1f1 url('/modulos/imagen/login-sprite.png') no-repeat;
    padding: 15px 15px 15px 30px;
    margin: 0 0 10px 0px;
    width: 353px; /* 353 + 2 + 45 = 400 */
    border: 1px solid #ccc;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    -moz-box-shadow: 0 1px 1px #ccc inset, 0 1px 0 #fff;
    -webkit-box-shadow: 0 1px 1px #ccc inset, 0 1px 0 #fff;
    box-shadow: 0 1px 1px #ccc inset, 0 1px 0 #fff;
}

#username
{
    background-position: 5px -2px !important;
}

#password
{
    background-position: 5px -52px !important;
}

#inputs input:focus
{
    background-color: #fff;
    border-color: #e8c291;
    outline: none;
    -moz-box-shadow: 0 0 0 1px #e8c291 inset;
    -webkit-box-shadow: 0 0 0 1px #e8c291 inset;
    box-shadow: 0 0 0 1px #e8c291 inset;
}

/*--------------------*/
#actions
{
    margin: 15px 50px 0 0;
	float:right;
}


#actions a
{
    color: #3151A2;    
    float: right;
    line-height: 35px;
    margin-left: 10px;
}

/*--------------------*/

#back
{
    display: block;
    text-align: center;
    position: relative;
    top: 60px;
    color: #999;
}

.errorusuario{color:#F00;font-weight:bold; width:90%; 
margin:0 auto; margin-bottom:20px; clear:both; text-align:center;}

</style>   
 <?php 
  if ($_SESSION['errorusuario']=="SI"){ ?> 
	 <div class="errorusuario">El Email o Nombre de Usuario NO figuran en nuestra Base de datos.</div>
  <?php $_SESSION['errorusuario']=""; } ?>
  <?php 
   if ($_SESSION['errorusuario']=="NO"){ ?>
   <div class="errorusuario">Se te ha enviado un mensaje a tu dirección Email.  con tu contraseña.</div>
  <?php  $_SESSION['errorusuario']=""; } ?>            
<form id="recordarcontrasena" method="POST"  action="/modulos/enviar-recordatorio-contrasena.php" >	 
    <h1>Contraseña Recordatorio</h1>  
    <fieldset id="inputs">
        <input id="email" name="email" type="text" placeholder="Email" autofocus required>   
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Enviar" >       
    </fieldset>
</form>
<!--
http://jorgelessin.com/25-formularios-de-login-con-css/
http://red-team-design.com/slick-login-form-with-html5-css3/ 
-->