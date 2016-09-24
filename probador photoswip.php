<script>
// Leer los datos GET de nuestra pagina y devolver un array asociativo (Nombre de la variable GET => Valor de la variable).
//http://blog.aplicacionesweb.cl/opensource/leer-parametros-de-la-url-con-javascript/
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
	var pid = getUrlVars()["pid"];
    var gid = $.getUrlVar('gid');
   //alert (pid);     
</script>


<?php	
	//echo $cimgcontenido;
	// ver lightGallery  competencia de  photoswipe ( http://sachinchoolur.github.io/lightGallery/ )
	$variablePHP = "<script>document.write(pid)</script>";	
	//echo $variablePHP1;exit;
	//echo $variablePHP;exit;
	//var_dump($variablePHP);
	
   // lo puse para photoswipe para que tome la imagen para compartir en facebook
	//if ($contenidoinc=="modulos/art_stylo_galeria_photoswipe.php"){			
		
		$sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido  and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' and c.estado='1' 
		 order by c.dfeccontenido desc  LIMIT ".intval($variablePHP); 
		//echo $sql_query;exit;
		$rsphotoswipe = db_query($sql_query);
		$row_photoswipe = mysql_num_rows($rsphotoswipe);
		 echo $row_photoswipe;exit; 
		
		//print $variablePHP;
		while ($row=db_fetch_array($rsphotoswipe))
		{
			$cimgcontenido= $row['cimgcontenido'];
			 
		}	
		echo $cimgcontenido;exit;
    //}  
?>