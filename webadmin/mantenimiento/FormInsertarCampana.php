<link href="http://www.infodisfap.com/leyes/css/contenidotabla.css" rel="stylesheet" type="text/css" />

<SCRIPT LANGUAGE="JavaScript"> 
	function tancarFinestra()
	{
		opener.location='<?php $_SERVER['DOCUMENT_ROOT'] ?> /principal.php?idsec1=mantenimiento/FormInsertarProductos';
		window.close();
	}
</script> 

<table  class="estilotabla" width="40%" border="0" align="center">
  <tr>
    <td height="156">
    
    <?php
//include ("seguridad/seguridad.php") ;

// incluimos el archivo de conexion
include($_SERVER['DOCUMENT_ROOT']. '/config.php');	

// recibimos el formulario
if(isset($_POST['enviar']) && $_POST['enviar'] == 'Enviar'){
    // comprobamos que el formulario no envie campos vacios
    if(!empty($_POST['descripcampana'])){
        // creamos la variable y le asignamos el valor a insertar
        $descripcampana = $_POST['descripcampana'];
        // hacemos el INSERT en la BD   				
									
		 $ssql ="INSERT INTO campana (descripcampana)  VALUES ('$descripcampana')";
     $sqlInsertCat =mysql_query($ssql,$conexion) or die ("problema con query");
							
        // enviamos un mensaje de exito
        echo "<font color='#FF0000'><strong>Los datos fueron guardados correctamente</strong></font>";
		
		include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 

    }else{
        // si el formulario viene vacio
        // enviamos un mensaje de error
        echo "<font color='#FF0000'><strong>Debe llenar el formulario</strong></font>";
    }
}    

 // include("rutinas/cerrar_conexion.php"); 
?><!-- el formulario -->
<form name="categoria" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <table width="100%" border="0" align="center">
      <tr>
        <td width="37%"><strong>Nueva Campaña</strong></td>
        <td width="63%"><input type="text" name="descripcampana" id="descripcampana" /></td>
      </tr>
      <tr>
        <td  align="center" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td  align="center" colspan="2"><input type="submit" name="enviar" value="Enviar" />              
      </tr>
      <tr>
        <td height="26" colspan="2"  align="center">
        	<a href="#" onClick="tancarFinestra()">Close window</a>
        </tr>
    </table>  
</form> 
    </td>
  </tr>
</table>


