<?php session_start();
//echo $_SESSION['pagina_retorno']."WW";exit;
if ($_SESSION['id_usu_web']<>""){ 
	header ("Location: /aviso-logueado");
	echo "location.href =/include/control-usuario/aviso_logueado.php ";
	exit;
} ?>	

<script src="/include/js/jquery-1.7.1.min.js" type="text/javascript"></script> 
<script type="text/javascript">
$(document).ready(function() {    
    $('#nick').blur(function(){
		 var username = $(this).val(); 		  
		if( username !="" ){ /*Inicio si 2*/
		/*$('#submitbutton').attr('disabled', 'disabled');	*/			
        $('#Info').html('<img src="/include/control-usuario/loader.gif" alt="" />').fadeOut(1000);       
		//alert(username);	     
        var dataString = 'nick='+username;
			$.ajax({
				type: "POST",
				url: "/include/control-usuario/compueba-usuario-existe.php",
				data: dataString,
				success: function(data) {
					$('#Info').fadeIn(1000).html(data);				
					
				}
			});	/* fin ajax*/		
		}/*--fin si 2*/
    });              
});    
</script>

<style type="text/css">
.ctn_registro {
  max-width:100%;
  margin: 0 auto; 
  color:#333;
}
form, button{border:0; margin:0; padding:0;}
.spacer{clear:both; padding-bottom:1px;}
/* ———– My Form ———– */
.myform{
	margin:0 auto;
	max-width:580px;
	padding:14px;
}
	
	/* --- ———– stylized ———– */
	#stylized{ border:solid 1px #9eac91;background: #F2EFEE;}
	#stylized h1,h2,h3,h4 {	
		margin-bottom:8px;
		margin: 15px 0;
		line-height: 1.3em;
		padding-left: 5px;
	}
	#stylized h1 {font-size:22px;}
	#stylized h2 {color:#B3876A;font-size:14px;text-align:center;}	
	#stylized h4 {font-size: 22px;}
	#stylized p{font-size:11px;color:#666666;padding-bottom:10px;}
	#stylized label{
		display:block;
		font-weight:bold;
		text-align:right;
		width:110px;
		float:left;
		margin-right: 0px;
		margin-top: 5px;
	}
	#stylized .imagen{float:left;margin:5px;width:20%;}
	#stylized .texto{float:left; margin-left:15px;width:75%; text-align: justify; color:#FFF; font-weight:bold}
	#stylized .small{
		color:#666666;
		display:block;
		font-size:11px;
		font-weight:normal;
		text-align:right;
		max-width:140px;
	}
	#stylized input{
		float:left;
		font-size:12px;
		padding:4px 2px;
		border:solid 1px #aacfe4;
		max-width:360px;
		margin:2px 0 10px 10px;
	}
	#stylized textarea{
		float:left;
		font-size:12px;
		padding:4px 2px;
		border:solid 1px #aacfe4;
		max-width:360px;
		margin:2px 0 10px 10px;
	}
	#stylized .texcorto{
		float:left;
		font-size:12px;
		padding:4px 2px;
		border:solid 1px #aacfe4;
		max-width:200px;
		margin:2px 0 10px 10px;
	}		
	#stylized select{
		float:left;
		font-size:12px;
		padding:4px 2px;
		border:solid 1px #aacfe4;		
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
</style>


	<?php
    if(isset($_POST['submitbutton'])) {
        extract($_POST); 
        include_once ($_SERVER['DOCUMENT_ROOT']. '/config.php');		
        include_once ($_SERVER['DOCUMENT_ROOT']. '/include/funciones_web.php');	
        $fecha= date("Y-m-d H:i:s"); 
        $cfechacorta=date("Y/m/d"); 	 
        $nivel="USUARIO";
       /*----- Inicio Insertar Usuarios-------*/
        $ssql ="insert into usuarios(nick,password,nombre,email,eliminado,telefono,compania,fecha,nivel) 
        values('$nick','$password','$nombre','$email','NO','$telefono','$compania','$fecha','$nivel')";
        mysql_query($ssql) or die ("problema con query");
        $id_usu_web=mysql_insert_id();
        //echo $id_usu_web."ica";exit;	
        $_SESSION['id_usu_web']=$id_usu_web; 
        $_SESSION['nombre_usu_web']=$nombre; 
        //echo $_SESSION['pagina_retorno'];exit;
       /*----- Fin Insertar Usuarios-------*/
	   // echo $_SESSION['pagina_retorno']."dsdsd";
	   $caux=$_SESSION['pagina_retorno'];
		$_SESSION['pagina_retorno']=""; 		 
    ?>
   
    <script language="javascript"> 
    <?php
		
        if ($caux<>""){  //aqui viene de comenta antes e comentar se deve registrar			 	
			 echo "location.href = '".$caux."'";
        }
    ?> 
    </SCRIPT>
    
    <?php }else{ ?>	
    <div class="ctn_registro">
        <div id="stylized" class="myform">
                <form id="frmcontactenos" name="frmcontactenos" method="POST" action="#">
                <h1><?php echo "Registro de Usuarios : "//echo $webtituempre ?></h1>
                <!--<p>Enviar un correo electrónico. Todos los campos con el asterisco ('*') son obligatorios.</p> -->
                <hr>
                <div class="spacer">
                    <label>Nombre :</label>
                    <input name="nombre" type="text" required id="nombre" title="Se necesita un nombre" size="80"/>
                    <script>document.getElementById('nombre').focus()</script>
                </div>
                <div class="spacer">
                    <label>Nombre Usuario :</label>
                    <input  class="texcorto" name="nick" type="text" required id="nick" title="Se necesita un nombre" size="80"/>
                    <div id="Info"></div>
                </div>
                <div class="spacer">
                    <label>Correo :</label>
                    <input type="email" name="email" id="email"  size="80" required title="Ej: micorreo@hotmail.com" />
                 </div>
                 <div class="spacer">
                    <label>Contraseña :</label>
                    <input type="contrasena" name="password" id="password"  size="80" required title="" />
                 </div>
                 <div class="spacer">
                    <label>Telefono :</label>
                    <input type="telefono" name="telefono" id="telefono"  size="80"  title="" />
                 </div>
                <div class="spacer">
                  <label>Compañia :</label>
                    <select name="compania" id="compania">
                    <?php  $sqlCompania= db_query("select * from compania order by orden");
                        while ($rowCompania = db_fetch_array($sqlCompania)) 
                        {	
                       echo '<option value='.$rowCompania['id_conpania'].'>'.$rowCompania['desc_compania'].'</option>';				
                        }	
                    ?>
                    </select>
                </div>
              <!--  <div class="spacer">
                    <label>Facebook :</label>
                    <input type="facebook" name="facebook" id="facebook"  size="80"  title="" />
                </div>
                <div class="spacer">
                    <label>Patrulla :</label>
                    <input type="patrulla" name="patrulla" id="patrulla"  size="80"  title="" />
                </div>
                <div class="spacer">
                    <label>Fech. Nac. :</label>
                    <input type="nacimiento" name="nacimiento" id="nacimiento"  size="80"  title="" />
                </div>-->
                <button type='submit' name="submitbutton" id="submitbutton">Enviar</button>
                <div class="spacer"></div>
                </form>
                </div>
        <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div>
    <?php } ?>  
<!--
http://www.jose-aguilar.com/blog/comprobar-disponibilidad-de-nombre-de-usuario-en-vivo/
http://blog.reaccionestudio.com/comprobar-si-el-nombre-de-usuario-existe-con-jquery-y-php/ 
-->

