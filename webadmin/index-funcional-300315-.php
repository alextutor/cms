<?Php  session_start();
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	$_SESSION['option']=$_GET["option"];
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	$id=$_GET['id'];		
	if ($_SESSION['option']!="com_seccion_new" and $_SESSION['option']!="com_sub_seccion_new"  and $_SESSION['option']!="com_presentacion_editar" ){		
	 include ( $INC_DIR . '/webadmin/header.php');	 
	}
?><?php if ($_GET["option"]!="com_seccion_new" and $_GET['option']!="com_sub_seccion_new" and $_GET['option']!="com_presentacion_editar") {	?>    
    <link rel="stylesheet" type="text/css" href="estilos/estilo.css"/>
     <div id="border-top" class="h_blue">
    	 <span class="logo">
          <a href="http://www.sisdatahost.com" target="_blank">
            <img src="/webadmin/logo-sisdatahost.gif" alt="Venta-hosting-Dominio" width="210" height="35"></a>
      </span>
      <span class="title"><a href="/webadmin/index.php?option=pantallaprincipal">Administraci&oacute;n</a></span>
    </div>  	
    <div id="header-box">
<?php if ($_SESSION['permitido'] == "SI") {?>
    	<div id="module-status">
          <span class="logout">
          <a href="<?=$_SERVER['DOCUMENT_ROOT']?>/webadmin/salir.php">Desconectar </a>
          </span>
        </div>
<?php } ?>								   
      <div class="clr"></div> 
    </div> 	    
<?php } ?><?php if ($_GET["option"]!="com_seccion_new" and $_GET['option']!="com_sub_seccion_new" and $_GET['option']!="com_presentacion_editar"  ){	?>
       <div id="content-box">
<?php } ?><?php if (isset($_POST['nick'])){
				include($_SERVER['DOCUMENT_ROOT']. '/config.php');			
				extract($_POST); 
				$nick=$_POST['nick']; 
				$password=$_POST['password'];  								
				$ssql = "SELECT * FROM usuarios WHERE LOWER(nick)='".strtolower($nick)."' and AES_DECRYPT(password,'$llavesita')='" .$password."'"; 				
				$rs = db_query($ssql); 
				$row = db_fetch_array($rs);				
				if (mysql_num_rows($rs)!=0){ 
					$_SESSION['permitido']="SI";
					$_SESSION['nick']=$row["nick"] ;
					$_SESSION['id_usuario']=$row["id_usuario"] ;
					$_SESSION['alias']='' ;											
					$_SESSION['option']='pantallaprincipal';      
					$_SESSION['selectpage']="12172806";				
					$sqldata = "SELECT * FROM page WHERE ccodpage=".$_SESSION['selectpage'];
					$resdata = db_query($sqldata);
					while($rowdata = db_fetch_array($resdata))
					{
						$_SESSION['webuser_aut'] = '1';
						$_SESSION['plantilla']   = $rowdata['ccodplantilla'];
						$_SESSION['page']        = $rowdata['ccodpage']; //12172806
						$_SESSION['rutaimages']  = $rowdata['rutaimages'];	
						$_SESSION['modulo']  = $rowdata['ccodmodulo'];					
					}
					$sqlestipage = "SELECT * FROM estilopagina WHERE ccodpage=".$_SESSION['selectpage'];
					$rsestipage = db_query($sqlestipage);
					while($rowestipage = db_fetch_array($rsestipage))
					{																	
						$_SESSION['sBaseVirtual0']  = $rowestipage['sBaseVirtual0'];
						$_SESSION['sBase0']  = $rowestipage['sBase0'];
						$_SESSION['sName0']  = $rowestipage['sName0'];
					}									
					include($_SERVER['DOCUMENT_ROOT']. '/webadmin/mantenimiento/rs-estilos-web.php');	
					$_SESSION['webuser_nivel']      = "9";					
				 } else {
					$_SESSION['permitido']="NO";				
					$_SESSION['option']='';      
				}		  
			} // fin si post enviar	  			
?><?php if ($_SESSION['permitido'] != "SI") {		// INICIO SI 2 ?>     
		<div id="element-box" class="login">
              <div class="m wbg">
                <h1>Conexi&oacute;n a la administraci&oacute;n de  sisdatahost.com</h1>
                <div id="system-message-container"></div>
             <div id="section-box">
                <div class="m">
                    <form method="post" id="form-login" action="/webadmin/index.php" >
                    <fieldset class="loginform">        
                      <label id="mod-login-username-lbl" for="mod-login-username">Usuario</label>
                      <input name="nick" id="mod-login-username" type="text" class="inputbox" size="15">
                    
                      <label id="mod-login-password-lbl" for="mod-login-password">Contrase&ntilde;a</label>
                      <input name="password" id="mod-login-password" type="password" class="inputbox" size="15">
                    
                      <label id="mod-login-language-lbl" for="lang">Idioma</label>
                      <select id="lang" name="lang" class="inputbox">
                    <option value="" selected="selected">Predeterminado</option>
                    <option value="en-GB">English (United Kingdom)</option>
                    <option value="es-ES">Spanish (espa&ntilde;ol)</option>
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
                  <p style="font-size:12px;font-weight:bold; color:#F00"><a style="color: #F00" href="<?=$_SERVER['DOCUMENT_ROOT']?>/index.php">Ir a la p&aacute;gina de inicio del sitio.</a></p>
                  <div id="lock"></div>
              </div>
          </div>
<?php  } if ($_SESSION['permitido'] == "SI") {
			switch ($_SESSION['option']) {
			 case "pantallaprincipal": 
			 	include_once ( $INC_DIR . '/webadmin/pantalla-principal.php'); 
				 break;				 
			case "com_articulos": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-articulos.php'); 
				 break;	
			case "com_articulos_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-articulo.php'); 
				 break;				
			case "com_articulos_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-articulo.php'); 
				 break;				 
			case "com_categoria": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-seccion.php'); 
				 break;	
			case "com_seccion_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-seccion.php'); 
				 break;				
			case "com_seccion_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-seccion.php'); 
				 break;	 				 				 	 	 				 					 	 							 			case "com_sub_seccion_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-subseccion.php'); 
				 break;						 
			 case "com_menus": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-menu.php'); 
				 break;
			 case "com_menus_new": 
				include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-Menu.php'); 
				 break;
			 case "com_menus_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-actualiza-menu.php'); 
				 break;					 	 			 	 				
			 case "com_menus_elemen": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-menu-elementos.php'); 
				 break;
			 case "com_menus_elemen_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-menu-elementos.php'); 
				 break;		
			 case "com_presentacion": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-presentacion.php'); 
				 break;				
			  case "com_presentacion_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-presentacion.php'); 
				 break;	
			 case "com_presentacion_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-Presentacion.php'); 
				 break;	
			 case "com_agencia": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-agencia.php'); 
				 break;				
			  case "com_agencia_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-agencia.php'); 
				 break;	
			 case "com_agencia_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-agencia.php'); 
				 break;		 
			 case "com_empresa": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-empresa.php'); 
				 break;				
			  case "com_empresa_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-empresa.php'); 
				 break;	
			 case "com_empresa_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-empresa.php'); 
				 break;
			 case "com_estilos_web": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-estilos-web.php'); 
				 break;	
			  case "com_estilos_web_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-estilos-web.php'); 
				 break;		 		 		
			 case "com_estilos_web_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-estilos-web.php'); 
				 break;		
			case "com_usuario": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-usuarios.php'); 
				 break;	
			case "com_usuario_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-usuarios.php'); 
				 break;				
			case "com_usuario_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-usuarios.php'); 
				 break;				 	 				 			 	 	 
			 case "com_videos": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-videos.php'); 
				 break;				
			  case "com_videos_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-videos.php'); 
				 break;	
			 case "com_videos_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-videos.php'); 
				 break;		 	 
			 }	 			 			 			 	  		  	
		  }		 
?><?php if ($_GET["option"]!="com_seccion_new" and $_GET['option']!="com_sub_seccion_new" ){	?>
    	 <div class="clr"></div>
	  </div> <!--fin content-box -->
<?php } ?>		             
  <script type="text/javascript">
            try{document.getElementById('mod-login-username').focus();}catch(e){}
   </script>   
  <script type="text/javascript" src="js/jsweb.js"></script>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="/webadmin/js/core.js"></script>
<?php include_once ($INC_DIR . '/footer.php');  ?>