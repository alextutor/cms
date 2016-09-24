<?php session_start();
$pathcarro='www.gamatell.com/tienda_virtual';  
error_reporting(E_ALL);
@ini_set('display_errors', '1');
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;
?>

<?php 
   //$email = $_SESSION["email"];	
   $email = $_GET['email'];
   $suma=0.00;
   foreach($carro as $k => $v){
 	 $subto=$v['cantidad']*$v['precio'];
   	$suma=number_format($suma+$subto,2) ; 
   }
  
$mensaje ="<link href='www.gamatell.com/css/homestyle.css' rel='stylesheet' type='text/css'>";



// ------------Inicio envio_instruccion_pago_html.php ---------------------------------
$mensaje .=" 
<TABLE border='0' cellSpacing='0' cellPadding='0' width='600' height='1050' align='center'>
  <TBODY>
    <TR>
      <TD vAlign='top' align='middle'><TABLE border='0' cellSpacing='0' cellPadding='0' width='580'>
        <TBODY>
          <TR>
            <TD height='53' vAlign='center' align='right'><A href='www.gamatell.com'><img src='www.gamatell.com/propaganda/imagen/logo_cabecera_gamatell.gif'  border='0' width='600' height='91' /></A></TD>
          </TR>
        </TBODY>
      </TABLE>
      </TD>
    </TR>
    <TR>
      <TD height='10' vAlign='top' align='left'><IMG src='www.gamatell.com/propaganda/imagen/px.gif' width='1' height='1'></TD>
    </TR>
    <TR>
      <TD><TABLE border='0' cellSpacing='0' cellPadding='0' width='600'>
        <TBODY>
          <TR>
            <TD bgColor='#22aae4' height='10' vAlign='top' colSpan='2' align='left'><IMG src='http://www.gamatell.com/propaganda/imagen/common-blue-tl.gif' width='10' height='10'></TD>
            <TD bgColor='#22aae4' height='10' vAlign='top' width='10' align='right'><IMG src='www.gamatell.com/propaganda/imagen/common-blue-tr.gif' width='10' height='10'></TD>
          </TR>
          <TR>
            <TD bgColor='#22aae4' vAlign='top' width='10' align='left'><IMG alt=' ' src='www.gamatell.com/propaganda/imagen/px.gif' width='10' height='20'></TD>
            <TD bgColor='#22aae4' vAlign='center' align='left'>Instrucciones de pago</TD>
            <TD bgColor='#22aae4' vAlign='top' width='10' align='right'></TD>
          </TR>
          <TR>
            <TD bgColor='#22aae4' height='10' vAlign='top' colSpan='3' align='left'><IMG alt=' ' src='www.gamatell.com/propaganda/imagen/px.gif' width='10' height='10'></TD>
          </TR>
        </TBODY>
      </TABLE></TD>
    </TR>
    <TR>
      <TD bgColor='#ffffff'><IMG src='www.gamatell.com/propaganda/imagen/px.gif' width='10' height='20'></TD>
    </TR>
    <TR>
      <TD height='889' align='middle' vAlign='top' bgColor='#ffffff'>
      <TABLE width='600' height='800' border='0' cellPadding='0' cellSpacing='0'>
        <TBODY>
          <TR>
            <TD width='20' height='800'><IMG alt=' ' src='www.gamatell.com/propaganda/imagen/px.gif' width='1' height='1'></TD>
            <TD vAlign='top' align='left'><H2>Estimado/a   : $email  ,</H2>
              <p>A continuación te brindamos las instrucciones para que realices el pago.</p>
              <TABLE border='0' cellSpacing='0' cellPadding='10' bgColor='#f4ffaa'>
                <TBODY>
                  <TR>
                    <TD bgColor='#f4ffaa'><STRONG>Atención:</STRONG> las siguientes formas de pago tienen   un tiempo de acreditación de 24 a 72 hs.</TD>
                  </TR>
                </TBODY>
              </TABLE>
              <BR>
              <TABLE width='264' border='0' cellPadding='15' cellSpacing='0' bgcolor='#f4f4f4'>
                <TBODY>
                  <TR>
                    <TD width='271' align='left' vAlign='top'>Importe a pagar: <STRONG>$/.  $suma (Dolares)</STRONG></TD>
                  </TR>
                </TBODY>
            </TABLE>
              <BR>
              <H3>PASO 1 - Elegí   una forma y realizá el pago según las instrucciones.</H3>
              <table bgcolor='#f4f4f4' border='0' cellspacing='0' cellpadding='15' width='100%'>
                <tbody>
                  <tr>
                    <td height='232' align='left' valign='top'><table border='0' cellspacing='0' cellpadding='0' width='100%'>
                      <tbody>
                        <tr>
                          <td width='47%' align='left' valign='center'><span class='titulo_preguntas'><strong>- DEPOSITO BANCARIO (desde cualquier parte   del Perú)</strong></span><br />
                            <br />
                            <img src='www.gamatell.com/propaganda/imagen/logo_bcp.gif' alt='Banco de Credito del Perú' width='170' height='50' /></td>
                        </tr>
                      </tbody>
                    </table>
                      <br />
                      <p><strong>Datos   para depósitos y/o transferencia:</strong>                </p>
                      <p>Entidad Bancaria: <strong>Banco de Credito del Perú</strong>.<br />
                        <strong>AGENTE AUTORIZADO del BCP sólo en Moneda   Nacional                        </strong><br />
                        La Cuenta de ahorros en soles para Agentes BCP es: <strong>19219436104027</strong><br />
                      Titular :<strong> Marco Gamarra Romero </strong></p></td>
                  </tr>
                </tbody>
              </table>
              <br/> <br/>
              <TABLE  bgcolor='#f4f4f4' border='0' cellSpacing='0' cellPadding='15' width='100%'>
                <TBODY>
              
                
                  <TR>
                    <TD height='350' align='left' vAlign='top'><TABLE border='0' cellSpacing='0' cellPadding='0' width='100%'>
                      <TBODY>
                        <TR>
                          <TD colspan='2' align='left' vAlign='center'><p><STRONG class='titulo_preguntas'>- GIROS   INTERNACIONALES( Fuera del Perú)</STRONG><br>                                                     
                          </p></TD>
                          </TR>
                        <TR>
                          <TD width='47%' align='left' vAlign='center'><IMG src='www.gamatell.com/propaganda/imagen/westernunion.jpg' alt='Western Union' width='140' height='40'></TD>
                          <TD width='53%' align='right' vAlign='center'><IMG src='www.gamatell.com/propaganda/imagen/moneygram.jpg' alt='Western Union' width='140' height='40'></TD>
                        </TR>
                      </TBODY>
                    </TABLE>
                      <p>                        Transfiera a la siguiente   orden:<BR>
                        ################################<BR>
                        <STRONG>Nombre: Marco Gamarra Romero<BR>
                        DNI:  (Documento Nacional de Identidad)<BR>
                        Dirección: <BR>
                        Ciudad: Lima</STRONG><br>
                        <STRONG>Cod. Postal: <STRONG>Lima01</STRONG><BR>
                        País:   Perú</STRONG><BR>
                        ################################ <BR>
                        <BR>
                      <STRONG>Nota Importante:</STRONG> Recordá informar tu pago con   los datos exactos de quién hizo el envío de dinero. Si mandaste a un tercero a   realizar el pago, debés incluir los datos de dicha persona en el campo   'Comentarios', al momento de informar tu   operación.</p></TD>
                  </TR>
                </TBODY>
              </TABLE><BR>
              <H3>PASO 2 -   Informanos tu pago.</H3>
              <TABLE bgcolor='#f4f4f4' border='0' cellSpacing='0' cellPadding='15' width='100%'>
                <TBODY>
                  <TR>
                    <TD height='220' align='left' vAlign='top'><STRONG>Luego de realizar el pago, si la forma elegida   requiere que lo informes, hazlo <A title='Informar un Pago' href='http://www.gamatell.com/principal.php?pagina=contactos/contactenos-hosting&marco_izq_gene=no' target='_blank'>desde aquí</A>.</STRONG><BR>
                      <BR>
                      Una vez que informaste el pago, o   si la forma elegida no lo requiere, sólo resta esperar a que el monto se   acredite en tu cuenta. <BR>
                      <BR>
                      Finalmente, recibirás en tu email los datos de   alta del servicio contratado. <BR>
                      <BR>
                      Verificá que el mensaje no sea bloqueado   o clasificado como Correo No Deseado, agregando el dominio gamatell.com a tu   lista blanca o de remitentes permitidos. </TD>
                  </TR>
                </TBODY>
              </TABLE></TD>
            <TD width='20'><IMG alt=' ' src='www.gamatell.com/propaganda/imagen/px.gif' width='1' height='1'></TD>
          </TR>
        </TBODY>
      </TABLE></TD>
    </TR>
  </TBODY>
</TABLE>";
// ------------Fin envio_instruccion_pago_html.php ---------------------------------

 $server_name = "gamatell.com";  
	 # Indicamos el nombre de la persona que va a recibir el                        mensaje  
//	 $person_name = $CONV_Name;  
	 $parami  = "m-y-s-gr@hotmail.com" ;
	 # Indicamos la dirección de correo de esa persona  
	 $person_email =$email ; //"destinatario@servidor.net";  
	 # Las tres líneas que vienen a continuación son necesarias  
	 # para que la cabecera del mensaje esté en formato HTML  
	 $header = "MIME-Version: 1.0\n";  
	 $header .= "Content-Type: text/html; charset=iso-8859-1\n";  
	 //$header .="From: infodisfap@$server_name\nReply-To:                        webmaster@$server_name\nX-Mailer: PHP/";  
	 //$header .="From: Informacion Personal Discapacitado FFAA\nReply-To: infodisfap@$server_name\nX-Mailer: PHP/";  
	 $header .="From:  gamatell@$server_name\nReply-To: gamatell@$server_name\nX-Mailer: PHP/";  
	 # Esto que viene es el mensaje. (Fíjate en los tags HTML)  	 

				/*Si no te funciona enviar mail desde localhost, prueba a imprimir en
				pantalla la información que se enviará al mail del cliente.*/
				//	echo "</br>$html_correo</br>";
				//3. llamamos a una función para enviar el mail con la factura al cliente.
	if(!mail($parami, "Gamatell-Instrucciones de Pago", $mensaje,$header))
    {
	   echo "<h1>No se pudo enviar el Mensaje</h1>";
	   exit();
     } 
	
	if(!mail($person_email, "Gamatell-Instrucciones de Pago", $mensaje,$header))
    {
	   echo "<h1>No se pudo enviar el Mensaje</h1>";
	   exit();
     } 
?> 
<script language='JavaScript'> 
    email = "<?=$email?>";
    location.href='http://www.gamatell.com/principal.php?pagina=tienda_virtual/instrucciones_pagos&marco_izq_gene=no&email='   	+email 
</script> 