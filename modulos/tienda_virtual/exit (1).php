<?php
    session_start();
	//session_start(); No hace falta incluir la sesión puesto que ya se ha efectuado la compra.
	$titulo = "Carrito de Compra con Php y Mysql";
	//include("conecta.php"); No hace falta incluir la conexión puesto que no accedemos a base de datos
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
#exito {
	clear: both;
	width: 800px;
	border: 8px solid #a8dbf1;
	text-align: center;
	margin: 0 auto;
	background:#f0f0f0;
	padding: 30px; 
}
</style>
<link href="../css/homestyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="textoderechaEncelda" id="exito">
<font color='#bd0000'> <strong>	La transacción ha sido un exito , consulte su correo para ver la   notificación</strong></font>
 </div>       
     <?php
				//1. recogemos los valores del cliente y de la compra.
				//****************************************************
				//Con print-r podremos ver todos los valores que nos devuelve PayPal mediante POST
				//para después elegir los que queramos utilizar en nuestra aplicación.
				//print_r($_POST);
						$nombre = $_POST['first_name'];
						$apellido = $_POST['last_name'];
						$email_client = $_POST['payer_email'];
						$calle_client = $_POST['address_name'];
						$ciudad_client = $_POST['address_city'];
						$pais_client = $_POST['address_country'];
						$zonaRes_client = $_POST['residence_country'];
						$total_pedido = $_POST['mc_gross'];
				//2. Creamos el HTML que se enviará por e-mail
				//********************************************
						/*Cuando subas este fichero a Producción, tienes que asteriscar
						el mail de pruebas y desasteriscar el Real*/
							//pruebas
								//$email = 'tuEmail@tuDominio.com';
								//$email = 'compra_1332949950_per@hotmail.com';
							//real
								//$email = $email_client;
								$email = $_SESSION["email"];
						$asunto = 'SISDATAHOST - Resumen de tu pedido';
					$html .= "<div  style='width:800px;margin:0 auto;padding: 30px; background: #f0f0f0;border:10px solid #a8dbf1; font-size:12px;  '>
											<font color='#bd0000'> <strong>	COMPRA PRODUCTOS SISDATAHOST</strong></font>
												<p>Hola <b>$nombre</b>,</p>
												<p>Tu solicitud de compra ha sido realizada con éxito.
												Gracias por comprar en SISDATAHOST.<br>Aquí te adjuntamos el resumen de tu pedido.</p>
										";
						$html .= "<h3>Datos del Comprador</h3>";
						$html .= "<b>Nombre</b>				   : " . $nombre . "<br>";
						$html .= "<b>Apellido</b>				 : " . $apellido . "<br>";
						$html .= "<b>E-mail del comprador</b>	 : " . $email_client . "<br>";
						$html .= "<b>Calle del comprador</b>	  : " . $calle_client . "<br>";
						$html .= "<b>Ciudad del comprador</b>	 : " . $ciudad_client . "<br>";
						$html .= "<b>País del comprador</b>	   : " . $pais_client . "<br>";
						$html .= "<b>Zona Residencia comprador</b>: " . $zonaRes_client . "<br>";
						$html .= "<hr>";
						$html .= "<b>Total de la compra</b>	   : <b><span style='font-size:14px;'>" . "$ " . $total_pedido . "</span></b><br>";
						
						$html_correo= $html ; 
						$html_correo .="<div align='center'>
             <p align='left'><br />
               Saludos cordiales<br />
               <br />
               www.sisdatahost.com<br />
               Soluciones de Paginas Web, Venta Hosting y Dominios. <br />
               Reparación y Mantenimiento de Computadoras<br />
               Lima - Peru<br />
             En Perú llama al : 997265342</p>
             <p><a href='www.sisdatahost.com'>www.sisdatahost.com</a></p>
           </div>";
		   
		   
		   
				$cabeceras = "Content-type: text/html\r\n";
				/*Si no te funciona enviar mail desde localhost, prueba a imprimir en
				pantalla la información que se enviará al mail del cliente.*/
					echo "</br>$html</br>";
				//3. llamamos a una función para enviar el mail con la factura al cliente.
				  mail($email,$asunto,$html_correo,$cabeceras);	
  				  mail("sisdatahost@hotmail.com",$asunto,$html_correo,$cabeceras);				
			
				//  mail("sisdatahost@hotmail.com",$asunto,$html,$cabeceras);				   
			?>            
</body>
</html>