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
	.noespacionimayu{ text-align:center;  color:#F00; margin-bottom:3px; clear:both  }
</style>
<div class="ctn_registro">
    <div id="stylized" class="myform">
            <form id="frmcontactenos" name="frmcontactenos" method="POST" action="/include/control-usuario/insertar-registro-contingente.php" enctype="multipart/form-data" 
            onsubmit="document.forms['frmcontactenos']['submitbutton'].disabled=true;">
            <h1><?php echo "Registro de Usuarios : "//echo $webtituempre ?></h1>
            <!--<p>Enviar un correo electrónico. Todos los campos con el asterisco ('*') son obligatorios.</p> -->
            <hr>
            <div class="spacer">
                <label>Nombre:</label>
                <input name="nombre" type="text" required id="nombre" title="Se necesita un nombre" size="80"  style="text-transform:lowercase"/>
                <script>document.getElementById('nombre').focus()</script>
            </div>           
            <div class="spacer">
            <div class="noespacionimayu">En Campo Usuario: NO se permite Espacios en Blanco, Letras en Mayusculas ,ñ , @ , Maximo 15 Caracteres</div>
                <label>Usuario:</label>
                <input  class="texcorto"  style="text-transform:lowercase" name="nick" type="text" required id="nick" title="Se utiliza para ingresar a la Web" size="15" maxlength="15" 
                 onkeypress="return soloLetras(event)" onpaste="return false"/>
                <div id="Info"></div>                 
            </div>
            <div class="spacer">
                <label>Correo :</label>
                <input type="email" name="email" id="email"  size="100" required title="Ej: micorreo@hotmail.com" style="text-transform:lowercase"/>
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
                <select name="id_conpania" id="id_conpania">
                <?php  $sqlCompania= db_query("select * from compania order by orden");
                    while ($rowCompania = db_fetch_array($sqlCompania)) 
                    {	
                   echo '<option value='.$rowCompania['id_conpania'].'>'.$rowCompania['desc_compania'].'</option>';				
                    }	
                ?>
                </select>
            </div>
            <br /><br />
            <div class="spacer">
            	 <label>Foto :</label>
                 <input type="file" id="files" name="files" onBlur='LimitAttach(this,1)' accept="image/*";/>

					<br />
                    <div style="width:250; height:auto; margin:0 auto">
						<output id="list"></output>                
                    </div>
             </div><br /><br />

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
<!--
http://www.jose-aguilar.com/blog/comprobar-disponibilidad-de-nombre-de-usuario-en-vivo/
http://blog.reaccionestudio.com/comprobar-si-el-nombre-de-usuario-existe-con-jquery-y-php/ 
-->
<script type="text/javascript">
	$('#nick').keydown(function(e) { if (e.keyCode == 32) { return false;} });
</script>

<!-- Inicio previsualizar imagen
http://blog.reaccionestudio.com/previsualizar-imagen-antes-de-subirla-con-html5-y-javascript/
-->
<script type="text/javascript">
	function archivo(evt) {
      var files = evt.target.files; // FileList object
       
        //Obtenemos la imagen del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('image.*')) {
                continue;
           }
       
           var reader = new FileReader();
           
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
                      document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"  width="250" height="200" />'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
}
             
      document.getElementById('files').addEventListener('change', archivo, false);
</script>
<!-- Fin previsualizar imagen -->
<!--P:Como validar que se seleccionen solo archivos de determinado tipo en un INPUT TYPE='FILE'?
de tal forma que en tu input type='file' agreges
onBlur='LimitAttach(this,n);' donde n es el tipo de validacion que deseas hacer

Nota. Los tipos de validaciones mostrados son
1: gif, jpg, png
2: swf
3: exe, sit, zip, tar, swf, mov, hqx, ra, wmf, mp3, qt, med, et
4: mov, ra, wmf, mp3, qt, med, et, wav
5: htm, html, shtml
6: doc, xls, ppt
pero pueden agregarse o cambiarse segun se necesiten
 -->
<script type="text/javascript">
function LimitAttach(tField,iType) { 
file=tField.value; 
if (iType==1) { 
extArray = new Array(".gif",".jpg",".png",".jpeg",".bmp"); 
} 
if (iType==2) { 
extArray = new Array(".swf"); 
} 
if (iType==3) { 
extArray = new Array(".exe",".sit",".zip",".tar",".swf",".mov",".hqx",".ra",".wmf",".mp3",".qt",".med",".et"); 
} 
if (iType==4) { 
extArray = new Array(".mov",".ra",".wmf",".mp3",".qt",".med",".et",".wav"); 
} 
if (iType==5) { 
extArray = new Array(".html",".htm",".shtml"); 
} 
if (iType==6) { 
extArray = new Array(".doc",".xls",".ppt"); 
} 
allowSubmit = false; 
if (!file) return; 
while (file.indexOf("\\") != -1) file = file.slice(file.indexOf("\\") + 1); 
ext = file.slice(file.indexOf(".")).toLowerCase(); 
for (var i = 0; i < extArray.length; i++) { 
if (extArray[i] == ext) { 
allowSubmit = true; 
break; 
} 
} 
if (allowSubmit) { 
} else { 
tField.value=""; 
 document.getElementById("list").innerHTML = ['<img src="" />'];
alert("Usted sólo puede subir archivos con extensiones " + (extArray.join(" ")) + "\nPor favor seleccione un nuevo archivo"); 
} 
}  
</script>
<!--Biografia
P:Como validar que se seleccionen solo archivos de determinado tipo en un INPUT TYPE='FILE'?
http://www.forosdelweb.com/f13/faqs-javascript-105325/index5.html#post426198

Previsualizar imagen con Html5 y Javascript
http://blog.reaccionestudio.com/previsualizar-imagen-antes-de-subirla-con-html5-y-javascript/
 -->
 
<!--validar campo de texto  http://analista3.info/?p=108 -->
 <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "abcdefghijklmnopqrstuvwxyz1234567890";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
			//document.frmcontactenos.nick.value="";			
            return false;
        }
    }
</script>