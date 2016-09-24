<?php session_start(); 
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