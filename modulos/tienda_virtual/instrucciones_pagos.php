<?php    
	$email = $_GET['email'];
?>

<style type="text/css">
#exito {clear: both;
	width: 850px;
	border: 1px solid #d8d566;
	text-align: center;
	/* background:#f0f0f0; */
	background:	#fef8c4 ;
	
	padding: 30px;
	margin-top: 0;
	margin-right: auto;
	margin-bottom: 0;
	margin-left: auto;
}
</style>
<link href="../css/homestyle.css" rel="stylesheet" type="text/css" />
<div id="exito" class="textoderechaEncelda">
  <p> <strong> Te enviamos un email a <span class="tex_rojo_negro_13"> <?php echo $email; ?></span> con las  instrucciones para realizar el pago. </strong></p>
  <p> <span class="Texto_naranja_negri_12">Nota Importante :</span> Verific&aacute; que el mensaje no sea   bloqueado o clasificado como Correo No Deseado, agregando el dominio <strong> gamatell@gamatell.com</strong> a tu lista blanca o de remitentes permitidos.</p>
</div>
