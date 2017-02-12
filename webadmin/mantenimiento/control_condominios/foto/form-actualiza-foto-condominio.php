<?php session_start();
//-------para que nome muestre errores en desarollo xamp ejemplo inicializar valores
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 
 include_once ($_SERVER['DOCUMENT_ROOT']. '/config.php');		
  include_once ($_SERVER['DOCUMENT_ROOT']. '/include/funciones_web.php');	
  
?>
<style type="text/css">
	.ctnactulizafoto{ width:99%;margin:20px auto}
	.imagenfotoborde:hover{ border:5px solid #5890ff;cursor: pointer;}
</style>
<div class="ctnactulizafoto">
    <form id="frmactualizafoto" name="frmactualizafoto" action="/webadmin/mantenimiento/control_condominios/foto/Actualiza-foto-condominio.php"
    onSubmit="return ajaxSubmit(this);" method="POST" enctype="multipart/form-data">
        <div class="spacer">        	
           <label>Foto :</label>
		   <input type="hidden" name="id_usuario" id="id_usuario" value="<?=$_SESSION['id_usu_web']?>" />
           <input type="file" id="files" name="files" onBlur='LimitAttach(this,1)' accept="image/*";/>   
          <div style="width:250; height:auto; margin:10px auto; ">
              <output id="list"></output>                
          </div>
        </div><br /><br />       
        
    </form>
</div>
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
                      document.getElementById("list").innerHTML = ['<img name="imgfoto" id="imgfoto"   onclick="aceptar()" class="imagenfotoborde" src="', e.target.result,'" title="', escape(theFile.name), '"  width="250" height="200" />'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
}
             
      document.getElementById('files').addEventListener('change', archivo, false);
</script>
<!-- Fin previsualizar imagen -->
<script type="text/javascript">
			var datos  = null;
            var ajaxSubmit = function(formEl) {
                // fetch where we want to submit the form to
                var url = $(formEl).attr('action');
                // fetch the data for the form
                var data = $(formEl).serializeArray();
	                // setup the ajax request
					$.ajax({
						url: url,
						data: data,
						dataType: 'json',																
						success: function() {
							if(result.success) {
								alert('form has been posted successfully');
								
							}	 // fin if				
						}	 // fin success										
                    }
				   );	// fin ajax						 	
                // return false so the form does not actually
                // submit to the page
               // return false;
		}
		 // parent.$.fancybox.close();	
        </script>

<script type="text/javascript">	

	function aceptar() {
		imgfoto.onclick = null;
		frmactualizafoto.submit();
		//$.ajax({
//		type:'POST'; 
//		url:'/modulos/Actualiza-foto-usuario.php';	
//		})
//		parent.$.fancybox.close();
		//alert(document.frmactualizafoto.files.tmp_name);
//		frmactualizafoto.submit();
  	 	//var nombre

		//parent.$.fancybox.close();
//		var variablejs ="<?php echo $caux; ?>" ;
	}
	
</script>

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

http://stackoverflow.com/questions/5143191/inserting-into-mysql-from-php-jquery-ajax
 -->