<? 
// Realizar la conexión a la BD .. Seleccionar la BD a usar. 
include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/conexioninfodisfap.php'); 
// Ejecutar la consulta para obtener los datos de la BD. 
$resultado=mysql_query("SELECT * FROM doctorresponde"); 

// Se inicial el formulario 
echo "<form action=\"procesar.php\" method=\"post\"> \n"; 

// Extraemos y componemos los checbox dinámicos de los datos de nuestra tabla de la BD. 
while ($row = mysql_fetch_array($resultado)){ 
  echo "<input type=\"checkbox\" name=\"seleccion[]\" value=\"".$row['id']."\">".$row['nombre']."<br>"; 
} 

// Cerramos el formulario y ponemos nuestro botón de Submit. 
echo "<input type=\"submit\" name=\"Submit\" value=\"Enviar\">"; 
echo "</form>"; 
?> 