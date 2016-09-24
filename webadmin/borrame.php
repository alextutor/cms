<html>
<head>
<meta http-equiv="Content-Type" content="text/xml; charset=ISO-8859-1">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Documento sin título</title>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
 <script type="text/javascript" src="js/jsweb.js"></script>
<script>
$(document).ready(function(){

	$('#titulo').keyup(function() 
    {
	   $('#amigable').val(convierteAlias($('#titulo').val()));
	   $('#txttitulo').val($('#titulo').val());
	});
	$("#selectpage").change(function(){
		$.post("jq_selectseccion.php",{ idopera:'1',idmodulo:$("#selectmodulo").val(),iditem:$("#IDpro").val(),idpage:$("#selectpage").val()},function(data){$("#cuadrobox").html(data);})
	});
	
})
</script>

</head>
<body>
        <form action="/webadmin/mantenimiento/Insertar-Articulo.php" method="post" name="adminForm" id="adminForm" class="form-validate" onSubmit="return validar_form(this)">
<ul class="adminformlist">	
                    	<li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">T&iacute;tulo <span class="star">&nbsp;*</span></label>
                        <input type="text" name="titulo" id="titulo" value="" class="inputbox required" size="40" aria-required="true" required></li>
                                            
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Titulo Amigable<span class="star">&nbsp;*</span></label>
 						  <input type="text" name="amigable" id="amigable" value="" class="inputbox required" size="40" aria-required="true" required></li>                          
</ul>
     </form>                      
</body>

</html>