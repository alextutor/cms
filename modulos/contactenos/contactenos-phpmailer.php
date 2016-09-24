<?php
/*$to = "sisdatahost@hotmail.com";
$subject = "Correo de prueba";
$message = "Este es sólo un mensaje de prueba.";
$from = "soporte@cuartocontingente93.com";
$headers = "From:" . $from;
if(!mail($to,$subject,$message,$headers)){
	echo "Correo no enviado";exit;
};
*/
?>

<?php //session_start(); 

/*mirar esto funciona para ie sino utilizar el otro antiguo para ie
http://www.matiasmancini.com.ar/ajax-jquery-validation-html5-form.html */
if(isset($_POST['submitbutton'])) { 
	extract($_POST); 
	include_once ($_SERVER['DOCUMENT_ROOT']. '/config.php');		
    include_once ($_SERVER['DOCUMENT_ROOT']. '/include/funciones_web.php');	  
		
 	$domain       = $_SERVER['HTTP_HOST']; /*www.sisdatahost.com*/
	$domain_parts = explode('.',$domain);
	$nropartes = count($domain_parts);
	if ($nropartes == 2 )
	{ 
		$subdominio = $domain_parts[0].".".$domain_parts[1]; 
	}
	if ($nropartes == 3 )
	{
		if ($domain_parts[0]=="www")
			$subdominio = $domain_parts[1].".".$domain_parts[2];
		else	
			$subdominio = $domain_parts[0].".".$domain_parts[1].".".$domain_parts[2];
	}
	if ($nropartes == 4 )
	{
		if ($domain_parts[0]=="www")
			$subdominio = $domain_parts[1].".".$domain_parts[2].".".$domain_parts[3];
		else
			$subdominio = $domain_parts[0].".".$domain_parts[1].".".$domain_parts[2].".".$domain_parts[3];
	}
	
	$sqlpagew  = db_query("SELECT * FROM  page WHERE camipage='".$subdominio."' and cestpage ='1'");
	$nrosub    = db_num_rows($sqlpagew);
if ( $nrosub >0 )
{
	$rowpageweb  = db_fetch_array($sqlpagew);
	$camipage     = $rowpageweb['camipage'];
	$cabeceraemail= $rowpageweb['cnompage'];
	$cemacontacto= $rowpageweb['cemacontacto'];	
	$ctitpage= $rowpageweb['ctitpage'];			
	$cnompage= $rowpageweb['cnompage'];	
	
	/*-----saca del email de contacto solo el correo sin el @*/
	$findme   = '@';
	$pos = strpos($cemacontacto, $findme);
	$cuentasinarroba = substr($cemacontacto,0,$pos);
	/*-----saca del email de contacto solo el correo sin el @*/

}
$nombre=$_POST['nombre'];   
$telefono=$_POST['telefono'];      
$asunto=$_POST['asunto'];
$comentario=$_POST['mensaje'];   
$procedencia="Formulario Contactenos";  

	
$cfechacorta=date("Y/m/d"); 
if ($email_cliente != "") {  

	//http://www.lewebmonster.com/como-enviar-correos-utilizando-php-funcion-mail-y-smtp-con-swift-mailer/
	//https://www.youtube.com/watch?v=qxOH3FpV4DA
	//https://daveismyname.com/sending-html-emails-attachments-using-php-swiftmailer-bp#.VKm_ftKUfTo
	
	$mailserver ="mail.cuartocontingente3.com";
	$mailuser   ="soporte@cuartocontingente93.com";
	$mailpass   ="0403221757";
	 //quien esta enviando el mensaje?
	$sender_email="soporte@cuartocontingente93.com";
	$sender_name="Huiza Quispe";
	//a quien le enviamos el mensaje
	$para="sisdatahost@hotmail.com";
	$emailsoporte="sisdatahost@hotmail.com";
	$paraweb = $emailsoporte;	
	//cuerpo del mensaje  
	$asunto="Hola";
	$mensaje="Hola a todos";
	require($_SERVER['DOCUMENT_ROOT'].'/include/PHPMailer/class.phpmailer.php');
	//require($_SERVER['DOCUMENT_ROOT'].'/include/sendmail/class.smtp.php');
	$mail = new phpmailer();
	//$mail->Mailer    = "sendmail";

   $mail->CharSet = "UTF-8";
   $mail->Host      = $mailserver;
	$mail->Username  = $mailuser;
	$mail->Password  = $mailpass;
	$mail->From      = $sender_email;
	$mail->FromName  = $sender_name;
	$mail->IsHTML(true);
	$mail->AddAddress($para);
	$mail->AddAddress($paraweb);
	$mail->Subject   = $asunto;
	$mail->Body      = $mensaje;
	$mail->Send();		
	if(!$mail->Send()) {
		  echo "Error: " . $mail->ErrorInfo;
	} else {
	  echo "Enviado!";
	}


/*Lo primero es añadir al script la clase phpmailer desde la ubicación en que esté*/
// http://donnierock.com/2013/09/09/enviar-un-email-con-phpmailer-usando-una-cuenta-de-gmail/


/* require($_SERVER['DOCUMENT_ROOT'].'/include/PHPMailer/class.phpmailer.php');
	require($_SERVER['DOCUMENT_ROOT'].'/include/PHPMailer/class.smtp.php');
	
//Crear una instancia de PHPMailer
$mail = new PHPMailer();
//Definir que vamos a usar SMTP
$mail->IsSMTP();
//Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
// 0 = off (producción)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug  = 0;
//Ahora definimos gmail como servidor que aloja nuestro SMTP
$mail->Host       = 'ssl://smtp.gmail.com';
//El puerto será el 587 ya que usamos encriptación TLS
$mail->Port       = 587;
//Definmos la seguridad como TLS
					$mail->SMTPSecure = 'tls';
//Tenemos que usar gmail autenticados, así que esto a TRUE
$mail->SMTPAuth   = true;
//Definimos la cuenta que vamos a usar. Dirección completa de la misma
$mail->Username   = "sisdatahost@gmail.com";
//Introducimos nuestra contraseña de gmail
$mail->Password   = "0403221757";
//Definimos el remitente (dirección y, opcionalmente, nombre)
$mail->SetFrom('sisdatahost@gmail.com', 'Mi nombre');
//Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
$mail->AddReplyTo('sisdatahost@gmail.com','El de la réplica');
//Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
$mail->AddAddress('sisdatahost@hotmail.com', 'El Destinatario');
//Definimos el tema del email
$mail->Subject = 'Esto es un correo de prueba';
//Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
$mail->MsgHTML("hola");
//Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
$mail->AltBody = 'This is a plain-text message body';
//Enviamos el correo
if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {
  echo "Enviado!";
}*/

}
?>
<div class="ctn_contactos">
	<div class="iz_contac_container">
        <div id="stylized" class="myform">
	       	<h1><?php echo $webtituempre ?></h1>
            <hr>
     	    <div class="ok-recibido">
	            <h2>Muchas gracias!, su consulta ha sido recibida con &eacute;xito.</h2>
            	<div class="imagen">
                <img src="/modulos/imagen/email.png" width="128" height="128" alt="email" />
                </div>
                <div class="texto">
           <P>Te enviamos una  copia de tu consulta al email &nbsp;<div class="red"><?php echo $email_cliente;?></div></p>
           <p >Verific&aacute; que el mensaje no sea   bloqueado o clasificado como Correo No Deseado, agregando el dominio<br>
                  <br>
            <?php echo $cemacontacto;?>a tu lista blanca o de remitentes permitidos.</p>
       		</div>  
            </div>
            <div style="clear:both"></div>
        </div>
	</div>
    <div class="der-container">
    	<h2><?php echo $webtitu ?></h2>
        <div class="contenido">
            <ul class="lists">
                <li class="mail"><span class="icon"></span>Responsable:  
                    <a href="mailto:<?php echo $emailcontacto ?>"><?php echo $emailcontacto ?></a>
                </li>
            </ul>
            <h4><?php echo $cdistrito ."  -  ". $cprovincia  ?></h4>
            <ul class="lists">
                <li class="location"><span class="icon"></span>
                    <?php echo $cdirecempresa ?>  
                </li>
                  <li class="chart"><span class="icon"></span>
                  	<?php echo $chorarioatencion ?> 					 
                  </li>    

                <li class="iphone"><span class="icon"></span>
                    <?php echo $ctelefonopri ?>  
                </li>
                <?php if ($ctelefonosec !="") {	?>
                <li class="iphone"><span class="icon"></span>
                    <?php echo $ctelefonosec ?>  
                </li>
                <?php } ?>
            </ul>        
        </div>
    </div>
    <div style="clear:both"></div>
</div>    
<?php }else{ ?>		
<div class="ctn_contactos">
	<div class="iz_contac_container">
 	<div id="stylized" class="myform">
            <form id="frmcontactenos" name="frmcontactenos" method="POST" action="#">
            <h1><?php echo $webtituempre ?></h1>
            <p>Enviar un correo electrónico. Todos los campos con el asterisco ('*') son obligatorios.</p>
            <hr>
            <div class="spacer">
                <label>Nombre</label>
                <input name="nombre" type="text" required id="nombre" title="Se necesita un nombre" size="80"/>
                <script>document.getElementById('nombre').focus()</script>
            </div>
            <div class="spacer">
                <label>Correo electrónico</label>
                <input type="email_cliente" name="email_cliente" id="email_cliente"  size="80" required title="Ej: micorreo@hotmail.com" />
             </div>
            <div class="spacer">
                <label>Asunto</label>
                <input name="asunto" type="text" required id="asunto"  title="Ingrese el Asunto" size="80"/>
            </div>
            <div class="spacer">
                <label>Mensaje</label>
				<textarea cols="50" id="mensaje" name="mensaje" rows="10" required>
                </textarea>                
            </div>
            <button type='submit' name="submitbutton" id="submitbutton">Enviar</button>
            <div class="spacer"></div>
            </form>
            </div>
    </div>
    <div class="der-container">
    	<h2><?php echo $webtitu ?></h2>
        <div class="contenido">
            <ul class="lists">
                <li class="mail"><span class="icon"></span>Responsable:  
                    <a href="mailto:<?php echo $emailcontacto ?>"><?php echo $emailcontacto ?></a>
                </li>
            </ul>
            <h4><?php echo $cdistrito."  -  ". $cprovincia ?></h4>
            <ul class="lists">
                <li class="location"><span class="icon"></span>
                    <?php echo $cdirecempresa ?>  
                </li>
                  <li class="chart"><span class="icon"></span>
                  	<?php echo $chorarioatencion ?> 					 
                  </li>    

                <li class="iphone"><span class="icon"></span>
                    <?php echo $ctelefonopri ?>  
                </li>
                <?php if ($ctelefonosec !="") {	?>
                <li class="iphone"><span class="icon"></span>
                    <?php echo $ctelefonosec ?>  
                </li>
                <?php } ?>
            </ul>        
        </div>
    </div>
    <div style="clear:both"></div>
</div> 
<?php } ?>  