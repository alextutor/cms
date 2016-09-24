<?php  session_start(); 
include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');
?>
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
	
	/* ------------- Inicio para boton examinar actualiza foto----------*/
	.actualizafoto{clear:both;width:250; height:auto; margin:0 auto }
	
	div.upload {
		width: 130px;
		height: 30px;
		background: url(/imagen/upload.png);
		overflow: hidden;
	}
	div.upload input {
		display: block !important;
		width: 130px !important;
		height: 30px !important;
		opacity: 0 !important;
		overflow: hidden !important;
	}
	/* ------------- Fin para boton examinar actualiza foto----------*/
</style>

<?php
//echo $_SESSION['pagina_retorno']."WW";exit;
if ($_SESSION['id_usu_web']==""){ 
	header ("Location: /aviso-no-logueado");
	//echo "location.href =/include/control-usuario/aviso_logueado.php ";
	exit;
} 

//echo $_SESSION['id_usu_web'];exit;
$sql_usuario = "SELECT nick,nombre,email,telefono,imagenfoto,patrulla,id_conpania,facebook,AES_DECRYPT(password,'$llavesita') as password FROM usuarios WHERE id_usuario= '".$_SESSION['id_usu_web']."'";
$rs=db_query($sql_usuario); 
while ($row_usu = db_fetch_array($rs))
{
	//echo $row_usu['imagenfoto']."ddd";exit;
?>	
<div class="ctn_registro">
    <div id="stylized" class="myform">
            <form id="frmcontactenos" name="frmcontactenos" method="POST" action="/include/control-usuario/actualiza-registro-contingente.php" enctype="multipart/form-data">
            <h1>
			<?php 
			if($_SESSION['usuario_actualizado']=="si"){
				echo "Usuario Actualizado: ";//echo $webtituempre 		
				$_SESSION['usuario_actualizado']="no";
			}else {
				echo "Configuración de Usuario : ";//echo $webtituempre 	
			}		
			
			?>
            </h1>
            <!--<p>Enviar un correo electrónico. Todos los campos con el asterisco ('*') son obligatorios.</p> -->
            <hr>
            <div class="spacer">
              <label>Foto :</label>                                       
         <!--<img src='/timthumb.php?src=<?=$row_usu['imagenfoto'] ?>&h=200&w=250&zc=0&q=100&s=1' border=0 title="<?=$row_usu['nombre']?>" />-->	         
          <div class="upload">
          <input type="file" id="files" name="files" onBlur='LimitAttach(this,1)' accept="image/*"  value="Search" />          </div>            
           <div class="actualizafoto"></div>
            <br />
            <div class="actualizafoto">
                <output id="list"></output>                
            </div>
                                 
            </div><br />
            <div class="spacer">
                <label>Nombre :</label>
                <input name="nombre" type="text" required id="nombre" title="Se necesita un nombre" size="80" value="<?=$row_usu['nombre']?>"/>
                <script>document.getElementById('nombre').focus()</script>
            </div>
            <div class="spacer">
                <label>Nombre Usuario :</label>
                <input  class="texcorto" name="nick" type="text" required id="nick" title="Se utiliza para ingresar a la Web" size="80"  value="<?=$row_usu['nick']?>" disabled="disabled"/>
                <div id="Info"></div>
            </div>
            <div class="spacer">
                <label>Correo :</label>
                <input type="email" name="email" id="email"  size="80" required title="Ej: micorreo@hotmail.com" value="<?=$row_usu['email']?>" />
             </div>
             <div class="spacer">
                <label>Facebook :</label>
                <input type="facebook" name="facebook" id="facebook"  size="80"  title="" value="<?=$row_usu['facebook']?>" />
             </div>
             <div class="spacer">
                <label>Contraseña :</label>
                <input type="contrasena" name="password" id="password"  size="80" required title="" value="<?=$row_usu['password']?>" />
             </div>
             
             <div class="spacer">
                <label>Telefono :</label>
                <input type="telefono" name="telefono" id="telefono"  size="80"  title="" value="<?=$row_usu['telefono']?>"/>
             </div>
            <div class="spacer">
              <label>Compañia :</label>
                <select name="id_conpania" id="id_conpania">
                <?php  $sqlCompania= db_query("select * from compania order by orden");
                    while ($rowCompania = db_fetch_array($sqlCompania)) 
                    {	
                ?>
                <option value="<?=$rowCompania['id_conpania']?>" <?php if( $rowCompania['id_conpania']==$row_usu['id_conpania']) echo " selected='selected'"  ?>><?=$rowCompania['desc_compania']?></option>
                <?php
                   //echo '<option value='.$rowCompania['id_conpania'].'>'.$rowCompania['desc_compania'].'</option>';				                   
		   	   	}						
                ?>
                </select>
            </div>
            <div class="spacer">
                <label>Patrulla :</label>
                <input type="patrulla" name="patrulla" id="patrulla"  size="80"  title="" value="<?=$row_usu['patrulla']?>"/>
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
            <button type='submit' name="submitbutton" id="submitbutton">Actualizar</button>
            <div class="spacer"></div>             
            </form>
            </div>
<?php } //  Fin While ?>
 <div style="clear:both"></div>
</div>
<div style="clear:both"></div>

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
<!-- Biografia
https://www.prestashop.com/forums/topic/290968-solucionado-texto-boton-seleccionar-archivo-winetheme-prestashop%E2%84%A2-1541/ -->
