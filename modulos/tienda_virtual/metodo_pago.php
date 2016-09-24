<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="../css/homestyle.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#contenedor_tienda {	
	width: 710px;
	border: 1px solid #d8d566;
	text-align: center;
	background:	#fef8c4 ;
	margin: 0 auto;  	
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
<div id="contenedor_tienda" class="textoderechaEncelda">
<table width="100%" border="0">
  <tr>
    <td><br/>
      <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <td width="26%" rowspan="2" align="left" valign="top">
           <div class="tex_rojo_normal_12" style="margin-left:5px">Transferencia Bancaria</div>
           </td>
          <td width="1%"> </td>
          <td width="73%" colspan="4" align="left"><p><img src="tienda_virtual/imagen/logo_bcp.gif" width="246" height="39" /><br />
            <br />
<span class="textoderechaEncelda"><strong>AGENTE AUTORIZADO del BCP sólo en Moneda Nacional <br />
(Nuevos Soles - S/.) </strong><br />
            <br />
            La Cuenta de ahorros en soles para Agentes BCP es: <strong>19219436104027</strong></span><span class="textoderechaEncelda"><br />
            Titular: Marco Gamarra Romero
            </span><br />
          </p></td>
        </tr>
        <tr>
          <td> </td>
          <td colspan="4" align="left">&nbsp;</td>
        </tr>        
      </table></td>
  </tr>
</table>
</div> 
<p>
  <!--fin contenedor_tienda -->
</p>
<p><br/>
</p>
<div id="contenedor_tienda" class="textoderechaEncelda">
  <table width="100%" border="0">
  <tr>
    <td><table width="100%" cellpadding="0" cellspacing="0">
      <tr>
          <td width="26%" align="right" valign="top"> </td>
          <td width="1%"> </td>
          <td width="73%" align="left">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top" align="left">
          <div class="tex_rojo_normal_12" style="margin-left:5px">Datos Para Contactarle</div>
          <br />
          <div class="tex_rojo_normal_12" style="margin-left:5px; text-align:left">y Enviar Detalle del Pedido</div></td>
          <td>&nbsp;</td>
          <td align="left">
          <form id="frmContactos" name="frmContactos" method="get" action="http://www.gamatell.com/tienda_virtual/envio_instruccion_pago.php">
            <table width="100%" border="0">
              <tr>
                <td width="32%">Nombre</td>
                <td width="68%"><input name="nombre" type="text" id="nombre" size="30" /></td>
              </tr>
              <tr>
                <td>Telefono</td>
                <td><input name="telefono" type="text" id="telefono" size="30" /></td>
              </tr>
              <tr>
                <td>E-Mail</td>
                <td><input name="email" type="text" id="email" size="30" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="center">                
                <input type="image" src="http://www.gamatell.com/tienda_virtual/imagen/boton_enviar.gif"  name="Submit" value="  Enviar  ">
                
                  </td>
              </tr>
              <tr>
                <td colspan="2" >&nbsp;</td>
              </tr>
            </table>
          </form></td>
        </tr>
        <tr>
          <td valign="top" align="right">&nbsp;</td>
          <td>&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
</table>
</div> <!--fin contenedor_tienda -->
<script language="JavaScript" type="text/javascript" xml:space="preserve">  
  var frmvalidator  = new Validator("frmContactos");    
  frmvalidator.addValidation("nombre","req", "Ingresar Nombre");
  frmvalidator.addValidation("nombre","maxlen=25", "maxima longitud para  nombre es 25");
  frmvalidator.addValidation("nombre","alpha","solo caracteres alfabeticos ");
  
  frmvalidator.addValidation("email","maxlen=50");
  frmvalidator.addValidation("email","req", "Ingresar Email");
  frmvalidator.addValidation("email","email", "Ingresar Email Valido"); 
  
</script>
</body>
</html>