<style type="text/css">
.contacto{}
.contacto label{font-weight: bold; text-align:left; }
.contacto div{margin-bottom: 1px;}
.contacto input[type='text'], .contacto textarea{
    padding: 7px 6px;
    width: 294px; /* una longitud definida */
    border: 1px solid #CED5D7;
    resize: none; /* esta propiedad es para que el textarea no sea redimensionable */
    box-shadow:0 0 0 3px #EEF5F7;
    margin: 5px 15px;
}
.contacto input[type='text']:focus, .contacto textarea:focus{
    outline: none; /* reset especifico para Chrome/Safari */
    box-shadow:0 0 0 3px #dde9ec;
}
.contacto input[type='submit']{
    border: 1px solid #CED5D7;
    box-shadow:0 0 0 3px #EEF5F7;
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: bold;
    text-shadow: 1px 1px 0px white;
 
    background: #e4f1f6;
    background: -moz-linear-gradient(top, #e4f1f6 0%, #cfe6ef 100%);
    background: -webkit-linear-gradient(top, #e4f1f6 0%,#cfe6ef 100%);
}
.contacto input[type='submit']:hover{
    background: #edfcff;
    background: -moz-linear-gradient(top, #edfcff 0%, #cfe6ef 100%);
    background: -webkit-linear-gradient(top, #edfcff 0%,#cfe6ef 100%);
}
.contacto input[type='submit']:active{
    background: #cfe6ef;
    background: -moz-linear-gradient(top, #cfe6ef 0%, #edfcff 100%);
    background: -webkit-linear-gradient(top, #cfe6ef 0%,#edfcff 100%);
}
</style>
<script> 
function enviar_formulario(){ 
   document.frmContactos.submit() 
} 
</script> 
<script language="JavaScript" src="http://www.sisdatahost.com/js/gen_validatorv4.js"    type="text/javascript" xml:space="preserve">
</script>
</head>
<body>
<?php if(isset($_POST['submitbutton'])) { 
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
	$email_cliente=$_POST['email'];
	$telefono=$_POST['telefono'];      
	$comentario=$_POST['comentario'];
	
	if ($email_cliente != "") {  
		 $server_name = $camipage;  
		 $person_name = $nombre;	
		 //echo  $server_name."--".$person_name."-".$person_email;
		 //echo $cabeceraemail."*------------";exit;
	
		 $header = "MIME-Version: 1.0\n";  
		 $header .= "Content-Type: text/html; charset=UTF-8\n";  
		 $header .="From: ".$cabeceraemail ." <$cuentasinarroba@$server_name>\nReply-To: " .$cabeceraemail."   <$cuentasinarroba@$server_name>\nX-Mailer: PHP/";        
		 
		  $mensaje_cli .= "<table width='100%' border='0' align='center'><tr><td align='justify'>		   		   
			   <font face='verdana' size='2'>Hola $person_name,<br><br>  
			   su comentario es:<br/>" . $comentario . "<br/><br/>
		 Gracias Por su Consulta y/o Respuesta Estaremos analizandolo para su Aceptación.<br><br>   
		 Gracias por todo.<br><br>  
		  Sinceramente,<br><br><center> " . $ctitpage ."	 
		 <br> 
		 <a href='http://www.". $camipage."'>http://www.".$camipage." </a><br>  
		 Correo :&nbsp; " . $cemacontacto . "
		   </center>
		   </font>  
		 <br><br>";	 	 	 	 
		$mensaje_cli .= "</td></tr></table>";	
		$mensaje_cli .=$pie;
		if(!mail($email_cliente, "Gracias Por su Consulta", $mensaje_cli,$header))
		{
			echo "<h1>No se pudo enviar el Mensaje intentalo otra vez </h1>";
			exit();
		 }
		 if(!mail($cemacontacto, "Gracias Por su Consulta", $mensaje_cli,$header))
		{
			echo "<h1>No se pudo enviar el Mensaje intentalo otra vez </h1>";
			exit();	  
		 }
		 if(!mail("sisdatahost@hotmail.com", "Gracias Por su Consulta", $mensaje_cli,$header))
		{	  
		   echo "<h1>No se pudo enviar el Mensaje intentalo otra vez </h1>";
			exit();	  
		 }      	
	}  		   	
?>
    
<div class="boxin">
	<div class="header background_1"><h2 class="white">Muchas gracias!, su consulta ha sido recibida con éxito.</h2></div>
   <div class="ctn_contenidob"> 
       <div class="imagen">
       <img src="/modulos/imagen/email.png" width="125" height="130">
       </div>
       <div class="contenidob"> 
          <div class="texto">
           Te enviamos un email a <span class="color_1 bold"> <?=$email; ?></span> con las  instrucciones 
          para realizar el pago. 
          </div>
          <div class="pie lne_h_20"><span class="color_1 bold">Nota Importante :</span> Verific&aacute; que el mensaje   no sea   bloqueado o clasificado como Correo No Deseado, 
      agregando el dominio <strong> gamatell@gamatell.com</strong> a tu lista blanca o de remitentes permitidos.
          </div>
      </div>
  </div>
  <div style="clear:both" ></div>  
</div>

<?php }else{ ?>
<div class="boxin">
<h1>Transferencia Bancaria</h1>
<img src="modulos/tienda_virtual/imagen/logo_bcp.gif" width="246" height="39" />
<pre>

<strong>AGENTE AUTORIZADO del BCP sólo en Moneda Nacional (Nuevos Soles - S/.) </strong>

            La Cuenta de ahorros en soles para Agentes BCP es: <strong>19219436104027</strong></span>
            
            Titular: Marco Gamarra Romero       
            </pre>          
</div> 



<div class="boxin">
  <h1>Datos Para Contactarle</h1>
    <form class="contacto" id="frmContactos" name="frmContactos" method="post" action="#">            
      <div><label> &nbsp;&nbsp; Nombre:</label><input name="nombre" id="nombre" type='text' value=''></div>
      <div><label>Tu Email:</label><input name="email" id="email" type='text'></div>
      <div><label>Telefono:</label><input name="telefono" id="telefono" type='text' ></div>
      <div><label>Mensaje:</label><textarea rows='6' name="comentario" id="comentario"></textarea></div>
      <div><input type='submit' name="submitbutton" id="submitbutton"  value='Envia Mensaje'></div>                      
    </form>          
</div> 
<script language="JavaScript" type="text/javascript" xml:space="preserve">  
  var frmvalidator  = new Validator("frmContactos");    
  frmvalidator.addValidation("nombre","req", "Ingresar Nombre");
  frmvalidator.addValidation("nombre","maxlen=25", "maxima longitud para  nombre es 25");
  frmvalidator.addValidation("nombre","alpha","solo caracteres alfabeticos ");
  
  frmvalidator.addValidation("email","maxlen=50");
  frmvalidator.addValidation("email","req", "Ingresar Email");
  frmvalidator.addValidation("email","email", "Ingresar Email Valido");   
</script>
<?php } ?>
