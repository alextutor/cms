<br />
<br />
<form name="form1" method="post" action="/pedidos">
<input type="text"   name="productocan"  id="productocan" value="1" size="4"> 

	<select name="unidad" id="unidad"  style="width:250px;">
<?php	
	$sql_und = db_query("SELECT * FROM contenidounidad WHERE ccodcontenido='".$codcont."' order by cnomunidad");
	while($row_und = db_fetch_array($sql_und)) 
	{ 
		echo "<option value='".$row_und['ccodunidad']."'>".$row_und['cnomunidad']."</option>";
	}
?>
	</select>

	<input type="hidden" name="productocod"  id="productocod" value="<?=$row['ccodcontenido']?>">
	<input type="hidden" name="productonom"  id="productonom" value="<?=$row['cnomcontenido']?>">
	<input type="hidden" name="productoimg"  id="productoimg" value="<?=$row['cimgcontenido']?>">
	<input type="hidden" name="productomon"  id="productomon" value="<?=$row['ccodmoneda']?>">

    
	<input type="submit" name="Aceptar" id="Aceptar" value="Agregar" >
</form>
<br />

