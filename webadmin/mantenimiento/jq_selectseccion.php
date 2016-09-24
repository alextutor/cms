<?php  

if ($_POST['idopera']=='1')//cuando se cambia con el combo el cliente
{
	ob_start();
	session_start();	
	include "../config.php";
	$pagew   = $_POST['idpage'];
	$modulo = $_POST['idmodulo'];
	$iditem = $_POST['iditem'];
	$_SESSION['page']=$_POST['idpage'];
}
else //cuando entra por primera vez
{	
	//$pagew = $pageweb;
	$pagew =$_SESSION['page'];//alex
	//echo $pagew ;exit;
	//$iditem = $_GET['IDpro'];//alex
	$iditem = $_GET['id'];
	$_SESSION['page']=$pagew;
	$modulo = $_SESSION['modulo'];
}
//ya esta definido en webadmin/index
//$_SESSION['rutaimages']  = "web/".$_SESSION['page']."/fotos";
?>

   <?php
	    echo "<ul id='menuseccion'>";
			//$seccion_sql = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodpage='".$pagew."' and cestseccion ='1' and ccodmodulo='".$modulo."'  and cnivseccion='1' and ctipseccion='1' order by cnomseccion");
			
			//Alex quite modulo para que me muetre articulo y catalogo a la vez 
			//$seccion_sql = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodpage='".$pagew."' and cestseccion ='1' and cnivseccion='1' and ctipseccion='1' order by cnomseccion");
			
			//Alex quite modulo para que me muetre articulo y catalogo a la vez  //alex modifique ccodmodulo
			//s.ctipseccion='1'=Es una seccion  s.ctipseccion='3'=Es un contenido
			$sqlselec1="SELECT s.ccodseccion, s.cnomseccion, s.cnivseccion  FROM seccion s, webmodulos w WHERE 
			 s.ccodmodulo=w.ccodmodulo	and	s.ccodpage='".$pagew."' and s.estado ='1' and s.cnivseccion='1' 
			 and s.ctipseccion='1'     and w.es_producto='S' order by s.cordcontenido";
			 //echo $sqlselec;exit;
			//Menu Primer Nivel Repuesto-Servicios-Ofertas-Empresa-Galeria
			$seccion_sql = db_query($sqlselec1);				 
			
			while($row_seccion = db_fetch_array($seccion_sql)) 
				{
				$s1sql = db_query("select * from seccioncontenido where ccodseccion='".$row_seccion['ccodseccion']."' and ccodcontenido='".$iditem."'");
				$s1ok = db_num_rows($s1sql);
				if ($s1ok=='0')			        
					echo "<li><input type='checkbox' name='select".$row_seccion['ccodseccion']."'>"
					."<span class='color_1er_nivel'>".$row_seccion['cnomseccion']."</span></li>";
				else
					echo "<li><input type='checkbox' name='select".$row_seccion['ccodseccion']."' checked>"
					 ."<span class='color_1er_nivel'>".$row_seccion['cnomseccion']."</span></li>"; 				
				$niv1cod = substr($row_seccion['ccodseccion'],0,12);
				//s.ctipseccion='1'=Es una seccion  s.ctipseccion='3'=Es un contenido


				$sqlselec2="SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodseccion like '".$niv1cod."%' and estado ='1' and cnivseccion='2' and ctipseccion='1'  order by cordcontenido";								
				$seccion2_sql = db_query($sqlselec2);				
				$total2 = db_num_rows($seccion2_sql);
				if ($total2<>'0') echo "<ul>";
				while($row_seccion2 = db_fetch_array($seccion2_sql)) 
				{
					//echo $$sqlselec2;
					$s2sql = db_query("select * from seccioncontenido where ccodseccion='".$row_seccion2['ccodseccion']."' and ccodcontenido='".$iditem."'");
					$s2ok = db_num_rows($s2sql);						
					//$s2ok=1
					if ($s2ok=='0')
				        //Menu 2do Nivel  Repuesto : Por Marca Vehiculo y POrmarca Motor
						echo "<li><input type='checkbox' name='select".$row_seccion2['ccodseccion']."'>"
						."<span class='color_2do_nivel'>".$row_seccion2['cnomseccion']."</span>";						
					else
						//aqui esta el problema del chek marcado en new solucionado el problema era
						// que la tabla seccioncontenido ccodcontenido estaba en blanco y $iditem tambien esta en blanco cuando 
						// se inserta articulo
				   		echo "<li><input type='checkbox' name='select".$row_seccion2['ccodseccion']."' checked>"
				   		."<span class='color_2do_nivel'>".$row_seccion2['cnomseccion']."</span>";		
					
					
					$niv2cod = substr($row_seccion2['ccodseccion'],0,16);
					$sqlselec3="SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodseccion like '".$niv2cod."%' and estado ='1' and cnivseccion='3' and ctipseccion='1' order by cnomseccion";
					//echo $sqlselec3;exit;
					//Menu 3er Nivel // marcas de carro VOLKSWAGEN-SITOM-SEUNG HWA-KINGSTAR etc,
					$seccion3_sql = db_query($sqlselec3);
					$total3 = db_num_rows($seccion3_sql);
					if ($total3<>'0') echo "<ul>";
					while($row_seccion3 = db_fetch_array($seccion3_sql)) 
						{
							$s3sql = db_query("select * from seccioncontenido where ccodseccion='".$row_seccion3['ccodseccion']."' and ccodcontenido='".$iditem."'");
							$s3ok = db_num_rows($s3sql);
							if ($s3ok=='0')
								echo "<li><input type='checkbox' name='select".$row_seccion3['ccodseccion']."'>"
								."<span class='color_3er_nivel'>".$row_seccion3['cnomseccion']."</span>";
							else
								echo "<li><input type='checkbox' name='select".$row_seccion3['ccodseccion']."' checked>"
								."<span class='color_3er_nivel'>".$row_seccion3['cnomseccion']."</span>";
						
							$niv3cod = substr($row_seccion3[ccodseccion],0,20);
							$sqlselec4="SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodseccion like '".$niv3cod."%' and estado ='1' and cnivseccion='4' and (ctipseccion='1' or ctipseccion='3') order by cnomseccion";
							//echo $sqlselec4;exit;
							//Menu 4to Nivel los Modelos de las marcas 
							$seccion4_sql = db_query($sqlselec4);
							
							$total4 = db_num_rows($seccion4_sql);
							if ($total4<>'0') echo "<ul>";
							while($row_seccion4 = db_fetch_array($seccion4_sql)) 
							{
								$s4sql = db_query("select * from seccioncontenido where ccodseccion='".$row_seccion4['ccodseccion']."' and ccodcontenido='".$iditem."'");
								$s4ok = db_num_rows($s4sql);
								if ($s4ok=='0')
									echo "<li><input type='checkbox' name='select".$row_seccion4['ccodseccion']."'>"
									."<span class='color_4to_nivel'>".$row_seccion4['cnomseccion']."</span>";
								else
									echo "<li><input type='checkbox' name='select".$row_seccion4['ccodseccion']."' checked>".
									"<span class='color_4to_nivel'>".$row_seccion4['cnomseccion']."</span>";
								echo "</li>\n";
							}
							if ($total4<>'0') echo "</ul>";	
							echo "</li>\n";
						}
					if ($total3<>'0') echo "</ul>";
					echo "</li>\n";
				}
				if ($total2<>'0') echo "</ul>";
				echo "</li>\n";
				}
	echo "</ul>";
?>
<style type="text/css">	
	.art_borrado_1er_nivel{font-weight:bold;color:#000000;}
	.color_1er_nivel{color:#000000!important;font-weight:bold;}

	
	.art_borrado_2do_nivel{font-weight:bold;color:#449902; margin-left: 10px;}
	.color_2do_nivel{color:#449902;font-weight:bold;margin-left: 10px;}
	
	.art_borrado_3er_nivel{font-weight:bold;color:#1389D1;padding-left: 30px;}
	.color_3er_nivel{color:#1389D1;font-weight:bold;}
	
	.art_borrado_4to_nivel{font-weight:bold;color:#FF7D5D;padding-left: 40px; width:100%}
	.color_4to_nivel{color:#FF7D5D;font-weight:bold;}	
</style>

<script type="text/javascript">
jQuery(document).ready(function(){
		$('ul#menuseccion').collapsibleCheckboxTree({
		checkParents : false, // When checking a box, all parents are checked (Default: true)
		checkChildren : false, // When checking a box, all children are checked (Default: false)
		uncheckChildren : true, // When unchecking a box, all children are unchecked (Default: true)
		initialState : 'default' // Options - 'expand' (fully expanded), 'collapse' (fully collapsed) or default
												});
});
</script>	
<!--http://www.jqueryscript.net/other/jQuery-Plugin-To-Create-Checkbox-Tree-View-highchecktree.html -->