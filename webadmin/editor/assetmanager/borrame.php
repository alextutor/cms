<?php
$carpeta_ficheros = $_SERVER ["DOCUMENT_ROOT"].'/imagen';
$directorio = opendir($carpeta_ficheros); // Abre la carpeta
while ($fichero = readdir($directorio)) { // Lee cada uno de los ficheros
  if (!is_dir($fichero)){ // Omite las carpetas
echo "<div class='fichero' data-src='".$carpeta_ficheros.$fichero."'>".$fichero."</div>";
}
}

?>

<script type="text/javascript" language="javascript">
$(document).on("click","div.fichero",function(){
  item_url = $(this).data("src");
  var args = top.tinymce.activeEditor.windowManager.getParams();
  win = (args.window);
  input = (args.input);
  win.document.getElementById(input).value = item_url;
  top.tinymce.activeEditor.windowManager.close();
});
</script>