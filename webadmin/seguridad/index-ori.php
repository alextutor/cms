<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel='stylesheet' id='login-css'  href='login.css' type='text/css' media='all' />
<link rel='stylesheet' id='colors-fresh-css'  href='colors-fresh.css' type='text/css' media='all' />
<link rel="stylesheet" type="text/css" href="bm-custom-login-3.css" />
<meta name='robots' content='noindex,nofollow' />
<body class="login">

<center>
<div id="login">
<h1><a href="index.php" title="Powered by ceicorperu">Intranet</a></h1>

<table align="center" width="225" cellspacing="2" cellpadding="2" border="0"> 
<td colspan="2" align="center" 
<?php if ($_GET["errorusuario"]=="si"){?> 
bgcolor=red><span style="color:ffffff"><b>Datos incorrectos</b></span> 
<?php }else{?> 
bgcolor=#cccccc>Introduce tu clave de acceso 
<?php }?></td>
</table> 
<form name="loginform" id="loginform" action="control.php" method="POST"> 
	<p>
		<label>Nombre de usuario<br />
		<input type="text" name="usuario" id="user_login" class="input" value="" size="20" tabindex="10" />
		</label>
	</p>
	<p>
		<label>Contraseña<br />
		<input type="password" name="contrasena" id="user_pass" class="input" value="" size="20" tabindex="20" />
		</label>
	</p>
	<p class="forgetmenot"><label><input name="guardar_clave" type="checkbox" id="guardar_clave" value="forever" tabindex="90" />
	 Recordarme</label></p>
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" value="Iniciar sesión" tabindex="100" />
		<input type="hidden" name="redirect_to" value="/" />
		<input type="hidden" name="testcookie" value="1" />
	</p>
</form>

<p id="nav">
<a href="http://intranet.anefs.es/wp-login.php?action=lostpassword" title="Recupera tu contraseña perdida">¿Has perdido tu contraseña?</a>
</p>

</div>

<p id="backtoblog"><a href="../index.php" title="¿Te has perdido?">&laquo; Volver a Inicio</a></p>

<script type="text/javascript">
try{document.getElementById('user_login').focus();}catch(e){}
</script>
</center>
</body>
</html>
