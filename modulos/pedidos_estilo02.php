<?php
echo "<br>";
$enviado ='0';
$_SESSION['mensaje_error']="";
if($_POST['enviaroferta'])
{
	$enviado ='1';
	    $mensaje = "Datos del Personalización :<br>";
		$mensaje .= "---------------------------------------------------------------------------<br>";
		$mensaje .= "PAQUETE : <br>";
		$mensaje .= "".$_POST["paquete"]."";
		$mensaje .= "---------------------------------------------------------------------------<br>";
	    $mensaje .= "Nombres   : " . $_POST["nombres"] . "<br>";
	    $mensaje .= "Correo    : " . $_POST["correo"] . "<br>";
	    $mensaje .= "Pais      : " . $_POST["pais"] . "<br>";
	    $mensaje .= "Ciudad    : " . $_POST["ciudad"] . "<br>";
	    $mensaje .= "Telefono  : " . $_POST["telefono"] . "<br>";
	    $mensaje .= "Mensaje   : " . $_POST["mensaje"] . "<br>";
		$mensaje .= "---------------------------------------------------------------------------<br>";
		$mensaje .= "DATOS A PERSONALIZAR :<br>";
		$mensaje .= "---------------------------------------------------------------------------<br>";
	    $mensaje .= "Ciudad Origen    : " . $_POST["origen"] . "<br>";
	    $mensaje .= "Fecha viaje      : " . $_POST["fechaida"] . "<br>";
	    $mensaje .= "Categoria        : " . $_POST["hcategorias"] . "<br>";
	    $mensaje .= "Regimen          : " . $_POST["hregimen"] . "<br>";
	    $mensaje .= "Nro habitaciones : " . $_POST["habitaciones"] . "<br>";
		
		
		$para    = "edug@digitalmediapublicidad.com";
		$paraweb = "dome@domeviajes.com";
		$asunto  = "Solicitud personalizacion paquete  ";
		$sqlcontacto = "INSERT INTO personabuzon 
					(ccodpage,cdespersona,cnommensaje,cestmensaje,cemamensaje,casumensaje,cdesmensaje,dfecmensaje)
					VALUES
					('00000001','11061212','".$_POST[nombres]."','1','".$_POST[correo]."','".$asunto."','".$mensaje."',now() )";
		db_query($sqlcontacto);
		
		require('include/sendmail/class.phpmailer.php');
		$mail = new phpmailer();
		$mail->Mailer    = "sendmail";
		$mail->SMTPAuth  = true;
		$mail->Host      = $mailserver;
		$mail->Username  = $mailuser;
		$mail->Password  = $mailpass;
		$mail->From      = $_POST["correo"];
		$mail->FromName  = $_POST["nombres"];
		$mail->IsHTML(true);
		$mail->AddAddress($para);
		$mail->AddAddress($paraweb);
		$mail->Subject   = $asunto;
		$mail->Body      = $mensaje;
		$mail->Send();
	
	echo "<center>Se envio la consulta para personalizar esta oferta</center><br>";
	echo "<center>en breve le estaremos atendiendo</center><br>";
	
}

if($_POST['Personal'])
{
	$enviado ='1';
	
	$sql_unidad = db_query("SELECT * FROM contenidounidad WHERE ccodcontenido = '" . $_POST['productocod'] . "' AND cestunidad='1'");
	while($row_unidad = db_fetch_array($sql_unidad)) 
	{ 
		$sqlc = db_query("SELECT * FROM webparametros where ccodparametro='1001' and cvalparametro='".$row_unidad['cclase']."' and ctipparametro='1'");
		$rowc = db_fetch_array($sqlc);
		$sqlh = db_query("SELECT * FROM webparametros where ccodparametro='1002' and cvalparametro='".$row_unidad['ctipohotel']."' and ctipparametro='1'");
		$rowh = db_fetch_array($sqlh);
		$sqla = db_query("SELECT * FROM webparametros where ccodparametro='1003' and cvalparametro='".$row_unidad['ctipohabita']."' and ctipparametro='1'");
		$rowa = db_fetch_array($sqla);
		$sqlr = db_query("SELECT * FROM webparametros where ccodparametro='1004' and cvalparametro='".$row_unidad['cregimen']."' and ctipparametro='1'");
		$rowr = db_fetch_array($sqlr);
		$monto = $row_unidad['nprepaquete'];
	?>
	<div id="formcuenta">
		<h3><?=$_POST['productonom'];?></h3><br />
        
		<input type="hidden" name="unidadventa" id="unidadventa" value="<?=$row_unidad['ccodunidad']?>"/> 
        <h3>Precio por persona: <?=number_format($row_unidad['npreunidad'],2)?> €  </h3>
        <h3>Precio Paquete: <?=number_format($row_unidad['nprepaquete'],2)?> € </h3><br />

	<?php
	}
	?>

	<br />
	<form  name="frm_persona" action="/pedidos" method="post">
    	<input type="hidden" name="paquete" id="paquete" value="<?=$_POST['productonom']?>"/>
    	<label><B>PERSONALIZAR OFERTA</B></label><br />
		<label>Ciudad Origen</label> <input name="origen"  id="origen" type="text"  size="54"  class="cuadro"/><br>
        <label>Fecha Viaje</label><input name="fechaida"  id="fechaida" type="text"  size="12"  class="cuadromin"/><br>
        <label><B>TIPO DE ALOJAMIENTO</B></label><br>
        <label>Categoria</label>
        <select name='hcategorias' class="cuadropais">
        <option value="1 estrella">1 estrella</option>
        <option value="2 estrella">2 estrella</option>
        <option value="3 estrella">3 estrella</option>
        <option value="4 estrella">4 estrella</option>
        <option value="5 estrella">5 estrella</option>
        <option value="Apartamento">Apartamentos</option>
        </select><br>
        <label>Regimen</label>
        <select name='hregimen' class="cuadropais">
        <option value="Solo Alojamiento">Solo Alojamiento</option>
        <option value="Alojamiento y desayuno">Alojamiento y desayuno</option>
        <option value="Media pension">Media pension</option>
        <option value="Pension Completa">Pension Completa</option>
        <option value="Todo incluido">Todo incluido</option>
        </select><br>
        <label>Nro de habitaciones</label><input name="habitaciones"  id="habitaciones" type="text"  size="5"  class="cuadromin"/><br>
        
        <label><B>DATOS DEL CLIENTE</B></label><br />
		<label>Nombres</label> <input name="nombres"  id="nombres" type="text"  size="54" class="cuadro"><br>
		<label>Email</label> <input name="correo"  id="correo" type="text"  size="54" class="cuadro"><br>
        <label>Pais</label>
        <select name='pais' class="cuadropais">
		<?php
		$codpais='ES000000';
		$sqlpais=db_query("SELECT * FROM webubigeo WHERE  cnivubigeo='1' ORDER BY cnomubigeo");
		while($rowpais=db_fetch_array($sqlpais))
		{
			if ($rowpais['ccodubigeo']==$codpais)
				echo "<option value=".$rowpais['ccodubigeo']." selected>".$rowpais['cnomubigeo']."</option>";
			else
				echo "<option value=".$rowpais['ccodubigeo'].">".$rowpais['cnomubigeo']."</option>";
			
		} 
		?>
		</select><br />
		<label>Ciudad</label> <input name="ciudad"  id="ciudad" type="text"  size="54"  class="cuadromin"><br>
		<label>Telefono</label> <input name="telefono"  id="telefono" type="text"  size="54"  class="cuadromin"><br>

		<label>Comentarios</label> <textarea name="mensaje" id="mensaje" cols="40" rows="4" class="cuadroarea"></textarea><br>
		<script type="text/javascript">
			var txtnombre = new LiveValidation('nombre',{ validMessage: "Ok" });
			txtnombre.add(Validate.Presence,{failureMessage: "x"});
			txtnombre.add(Validate.Length, { minimum: 5, tooShortMessage:"Min 5c "});

			var txtemail = new LiveValidation('correo',{ validMessage: "Ok" });
			txtemail.add(Validate.Presence, {failureMessage: "x"});
			txtemail.add(Validate.Email,{failureMessage: "Error email"} );

		</script>  
        
        <input type="submit" name="enviaroferta" id="enviaroferta" value="Enviar Consulta" class="enviar"/>
	</form>
	</div>

<?php	
}

if($_POST['update'])
{
	$_SESSION['ocarrito']->updatecart();
}
if($_POST['limpiar'])
{
	$_SESSION['ocarrito']->vaciar_carrito();

}

if($_POST['pedido'])
{
	if ($_SESSION['usuario_aut'] =='1')
	{
		$enviado ='1';
		$_SESSION['ocarrito']->save_pedido();
	}
	else
	{
		$enviado ='1';
		$viajeros  ="Nombre viajero 1 :".$_POST['nombre1']."<br>";
		$viajeros .="DNI :".$_POST['dni1']."<br>";
		$viajeros .="Pais :".$_POST['pais1']."<br>";
		$viajeros .="Provincia :".$_POST['provi1']."<br>";
		$viajeros .="localidad :".$_POST['local1']."<br>";
		$viajeros .="Edad :".$_POST['edad1']."<br>";
		$viajeros .="Telefono :".$_POST['telefono1']."<br><br>";
		$viajeros .="Nombre viajero 2 :".$_POST['nombre2']."<br>";
		$viajeros .="DNI :".$_POST['dni2']."<br>";
		$viajeros .="Pais :".$_POST['pais2']."<br>";
		$viajeros .="Provincia :".$_POST['provi2']."<br>";
		$viajeros .="localidad :".$_POST['local2']."<br>";
		$viajeros .="Edad :".$_POST['edad2']."<br>";
		$viajeros .="Telefono :".$_POST['telefono2']."<br><br>";
		
		$_SESSION['ocarrito']->save_pedidocliente($_POST['nombre'],$_POST['email'],$_POST['pais'],$_POST['ciudad'],$viajeros);
	}
}


if($_POST['Aceptar'])
{
	$_SESSION['ocarrito']->introduce_producto($_POST['productocod'],$_POST['productonom'],$_POST['productoimg'],$_POST['unidadcod'],$_POST['unidadnom'],$_POST['unidadpre'],$_POST['productocan']);
}
if ($enviado =='0' )
{
	$_SESSION['ocarrito']->imprime_carrito();
}

?>
<br />
