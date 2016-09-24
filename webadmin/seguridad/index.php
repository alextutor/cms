<?Php 
$Title = "";
$Description = "";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/webadmin/header.php');
?>
 <base href="<?php echo ROOT_PATH_ADMI?>"/>
<body>
<div id="element-box" class="login">
  <div class="m wbg">
    <h1>Conexión a la administración de  sisdatahost.com</h1>
   	<div id="system-message-container"></div>
              <div id="section-box">
    <div class="m">
        <form method="post" id="form-login" action="/seguridad/control.php" >
        <fieldset class="loginform">
        
          <label id="mod-login-username-lbl" for="mod-login-username">Usuario</label>
          <input name="username" id="mod-login-username" type="text" class="inputbox" size="15">
        
          <label id="mod-login-password-lbl" for="mod-login-password">Contraseña</label>
          <input name="passwd" id="mod-login-password" type="password" class="inputbox" size="15">
        
          <label id="mod-login-language-lbl" for="lang">Idioma</label>
          <select id="lang" name="lang" class="inputbox">
        <option value="" selected="selected">Predeterminado</option>
        <option value="en-GB">English (United Kingdom)</option>
        <option value="es-ES">Spanish (español)</option>
        </select>
        
          <div class="button-holder">
              <div class="button1">
                  <div class="next">
                      <a  onclick="document.getElementById('form-login').submit();">
                          Conectar</a>
                  </div>
              </div>
          </div>
        
        <div class="clr"></div>
        <input type="submit" class="hidebtn" value="Conectar">
        <input type="hidden" name="option" value="com_login">
        <input type="hidden" name="task" value="login">
        <input type="hidden" name="return" value="aW5kZXgucGhw">
        <input type="hidden" name="8b29edb8587949cf49df451095aef192" value="1">	</fieldset>
        </form>
          <div class="clr"></div>
    </div>
</div>
      <p>Use un nombre de usuario y contraseña válidos para obtener acceso a la administración.</p>
      <p><a href="<?php echo ROOT_PATH?>">Ir a la página de inicio del sitio.</a></p>
      <div id="lock"></div>
  </div>
</div>
<script type="text/javascript">
try{document.getElementById('mod-login-username').focus();}catch(e){}
</script>
 <?php  include_once ($INC_DIR . '/footer.php');  ?> 