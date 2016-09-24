<?php		
	$Title = "";
	$Description = "";
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/header.php'); 	
?> 
<SCRIPT LANGUAGE="JavaScript"> 
	function Cancelar(){	
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+ '/webadmin/mantenimiento/mantSub_CategoriaAdmi.php' 
	}
</script> 

<?php
//include ("seguridad/seguridad.php") ;

// incluimos el archivo de conexion
include($_SERVER['DOCUMENT_ROOT']. '/config.php');	

// recibimos el formulario
if(isset($_GET['enviar']) && $_GET['enviar'] == 'Enviar'){
    // comprobamos que el formulario no envie campos vacios
    if(!empty($_GET['idcategoria']) and  !empty($_GET['descripSubcategoria'])){
        // creamos la variable y le asignamos el valor a insertar
        $idcategoria  = $_GET['idcategoria'];
	    $descripSubcategoria = $_GET['descripSubcategoria'];
        // hacemos el INSERT en la BD   									
		 $ssql ="INSERT INTO subcategoria (idcategoria,descripSubcategoria)  VALUES ('$idcategoria','$descripSubcategoria')";
     $sqlInsertCat =mysql_query($ssql,$conexion) or die ("problema con query");
							
        // enviamos un mensaje de exito
        echo "<font color='#FF0000'><strong>Los datos fueron guardados correctamente</strong></font>";

    }else{
        // si el formulario viene vacio
        // enviamos un mensaje de error
        echo "<font color='#FF0000'><strong>Debe llenar el formulario</strong></font>";
    }
}
 // include("rutinas/cerrar_conexion.php"); 
?>
<!-- el formulario -->
<form name="subcategoria" action="<?php echo $ROOT_PATH?>/principal.php?idsec1=webadmin/mantenimiento/FormInsertarSub-Categoria" method="GET">

    <table align="center" width="31%" border="0">
      <tr>
        <td>&nbsp;</td>
        <td>

        <input name="idsec1" type="hidden" value="webadmin/mantenimiento/FormInsertarSub-Categoria" /></td>
      </tr>
      <tr>
        <td width="38%">Categoria</td>
        <td width="62%">
        
        <select name="idcategoria" id="idcategoria">
          <option></option>
          <?php                     
				    $resulCategoria=mysql_query("SELECT * FROM categoria where borrado=0 order by idcategoria", $conexion);    
			  		while ($rowCategoria = mysql_fetch_array($resulCategoria)) 			
						{ 					
								echo '<option value="'.$rowCategoria['idcategoria'].'"';
								if($rowCategoria['idcategoria']==$rsContactos['idcategoria'])
								{
									echo ' selected';
								}
								echo '>'. $rowCategoria['descripcion'] . '</option>'."\n";						} 
				    	mysql_free_result($resulCategoria); 	                    
                ?>
        </select></td>
      </tr>
      <tr>
        <td>Sub-Categor&iacute;a</td>
        <td><input name="descripSubcategoria" type="text" id="descripSubcategoria" size="30" /></td>
      </tr>
      <tr>
        <td  align="center" colspan="2"><table width="100%" border="0">
          <tr>
              <td width="49%"><input type="submit" name="enviar" value="Enviar" /></td>
              <td width="13%">&nbsp;</td>
              <td width="38%"><input type="button" class="cancelar" name="cancelar" id="cancelar" value="Cancelar" onclick="Cancelar()" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td  align="center" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        
       
      </tr>
    </table>
</form>
