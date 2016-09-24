<?php
echo "<br>";
$enviado ='0';
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
		$_SESSION['ocarrito']->save_pedido($_POST['comenta'],$codpage);
	}
	else
	{
		$enviado ='1';
		$_SESSION['ocarrito']->save_pedidocliente($_POST['nombre'],$_POST['email'],$_POST['telefono'],$_POST['comenta'],$codpage);
	}
}

if($_POST['Aceptar'])
{
	$sqlu = db_query("SELECT * FROM contenidounidad WHERE ccodunidad = '" . $_POST['unidad'] . "'");
	$rowu = db_fetch_array($sqlu);
	$_SESSION['ocarrito']->introduce_producto($_POST['productocod'],$_POST['productonom'],$_POST['productoimg'],$_POST['productomon'],$_POST['productocan'],$rowu['ccodunidad'],$rowu['cnomunidad'],$rowu['nfacunidad'],$rowu['nstounidad'],$rowu['npreunidad'],$rowu['npreoferta']);
}
if ($enviado =='0' )
{
	$_SESSION['ocarrito']->imprime_carrito();
}

?>
<br />
