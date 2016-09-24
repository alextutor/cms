<style type="text/css">
#element-box {margin-bottom: 11px;padding: 5px 5px 0 5px;}
div#element-box.login  {background-color: #e1e1e1;}
.login {margin: 50px auto 100px !important;width: 575px;}

div#element-box div.m {
	padding: 10px;
	border: 1px solid #ccc;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	border: 1px solid #ccc;
	background-color: #f4f4f4;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
}
.wbg {background-color: #fff!important;}
</style>
<div id="element-box" class="login">
  <div class="m wbg">
    <h1>Conexi&oacute;n a la administraci&oacute;n de  sisdatahost.com</h1>
    <div id="system-message-container"></div>
        <div id="section-box">
            <div class="m">
                <form method="post" id="form-login" action="/webadmin/index.php" >
                <fieldset class="loginform">        
                  <label id="mod-login-username-lbl" for="mod-login-username">Usuario</label>
                  <input name="username" id="mod-login-username" type="text" class="inputbox" size="15">
                
                  <label id="mod-login-password-lbl" for="mod-login-password">Contrase&ntilde;a</label>
                  <input name="passwd" id="mod-login-password" type="password" class="inputbox" size="15">             
                  <div class="button-holder">
                      <div class="button1">
                          <div class="next">
                              <a  onclick="document.getElementById('form-login').submit();">
                                  Conectar</a>
                          </div>
                      </div>
                  </div>                    
                <div class="clr"></div>
                <input type="submit" class="hidebtn" name='enviar' value="Conectar">
                <input type="hidden" name="option" value="com_login">
                <input type="hidden" name="task" value="login">
                <input type="hidden" name="return" value="aW5kZXgucGhw">
                <input type="hidden" name="8b29edb8587949cf49df451095aef192" value="1">	</fieldset>
                </form>
                  <div class="clr"></div>
            </div>
        </div>
      <p>Use un nombre de usuario y contrase&ntilde;a v&aacute;lidos para obtener acceso a la administraci&oacute;n.</p>     
      <div id="lock"></div>
  </div>
</div>