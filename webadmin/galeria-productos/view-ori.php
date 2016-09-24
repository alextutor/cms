<?php session_start(); 
error_reporting(E_ALL);
@ini_set('display_errors', '0');
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;
?>

<?php
$CateId=$_GET['CateId'];   
?>
<?Php 
$Title = "Sistemas de Protección Eléctrica";
$Description = "Somos una empresa dedicada al diseño, asesoría y ejecución de Sistemas de Protección Eléctrica con POZOS DE PUESTAS A TIERRA Y MONTAJE DE PARARRAYOS";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/header.php');
?>
<!---------------------------------Inicio ZOOM-------------------------------->
<!-- Add jQuery library -->
	<script type="text/javascript" src="fancyapps_fancyBox/lib/jquery-1.8.2.min.js"></script>
	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="fancyapps_fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="fancyapps_fancyBox/source/jquery.fancybox.js?v=2.1.3"></script>
	<link rel="stylesheet" type="text/css" href="fancyapps_fancyBox/source/jquery.fancybox.css?v=2.1.2" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="fancyapps_fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="fancyapps_fancyBox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="fancyapps_fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="fancyapps_fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="fancyapps_fancyBox/source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

	<script type="text/javascript">
	var jzom = jQuery.noConflict();
		jzom(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			jzom('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			jzom(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			jzom(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			jzom(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			jzom(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			jzom('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			jzom('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			jzom('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			jzom("#fancybox-manual-a").click(function() {
				jzom.fancybox.open('1_b.jpg');
			});

			jzom("#fancybox-manual-b").click(function() {
				jzom.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			jzom("#fancybox-manual-c").click(function() {
				jzom.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>    
<!-----------------------------Fin  ZOOM-------------------------------------------------------->


<!--Inicio Ilumina borde de imagen al pasar el ratón-->
<style type="text/css"> 

.marco_gene_view{
	width: 700px;
	height: 332px;
	margin-top: 90px;
}	
.marco_imagen {
	width: 340px;	
	height:330px;
	clear: none;
	float: left;	
}
.marco_conte_detalle{
	width: 320px;
	height: 330px;
	margin-left: 350px;   
	padding-top:50px;	
}
.marco_detalle {
	width: 320px;
	height: 200px;	
	background-image: url(../imagen/marco_relieve_rojo.gif);
	background-repeat: no-repeat;
	padding-top:30px;	
		
}
.marco_botones{
	width: 200px;
	margin:0 auto;
}
.marco_descripcion {	
	width:300px;	
	text-align:center;
	padding-left:10px;
	padding-right:10px;
	margin:0 auto;
}
.marco_codigo{	
	width:310px;
	text-align:center;
	margin:0 auto;
	padding-left:5px;
	padding-right:5px;
}
.marco_precio {
	/*background-image: url(../imagen/precio_contenedor.gif) ;*/
    background-image: url(../imagen/precio_contenedor_ovalado.gif) ;	
	background-repeat: no-repeat;
	width:210px;
	height:33px;		
	margin:0 auto;
	margin-top:20px;
	padding-top:5px;
	text-align:center;	
}
.margin_centro{
	margin:0 auto;
} 
.tex_Sans_Duru_26 {
	font-size: 18px;
	color : #ffffff;
	font-family:Sans Duru ,sans-serif ;	
} 
.tex_Stint_Ultra_Condensed_26 {
	font-size: 22px;
	color : #ffffff;
	font-family : Stint Ultra Condensed, cursive;
   
} 
.tex_Stint_Ultra_Condensed_30 {
	font-size: 30px;
	color : #29292e;
	font-family : Stint Ultra Condensed, cursive;	
} 

.botonfic {
	color: white;
	font-size: 13px;
	font-family: "Trebuchet MS";
	padding: 5px 10px 3px 10px;
	width: 162px;
	text-align: center;
	background-image: url(/imagen/boton_rojo.png);
	height: 21px;
	cursor: pointer;
   
	}

.span_link {
   position:absolute;
	bottom:-70px;	
	left:39%;
	display:block;
	padding:0 12px 0 30px;
	line-height:20px;
	color:#fff;
	text-shadow: 0 1px 0 #000;
	text-align:center;
	text-transform:uppercase;
	background-image:url(imagen/zoom.png);
	background-repeat:no-repeat;
	background-position:10px 2px;
	background-color : rgb(0,0,0);
	background-color : rgba(0,0,0, 0.5);
	border-radius:12px;
	-moz-border-radius:12px;
	-webkit-border-radius:12px;
}
</style>
</head>
<body>
<div class="marco_gene_view">
  <?php   
	include ($_SERVER['DOCUMENT_ROOT']. '/webadmin/rutinas/conexion.php');						
  	 if ($CateId  <> "") {  // si 3
			 $rsview=mysql_query("select * from productos where idproductos ='" .$CateId . "' and mostrar=1");
    		 $ntotal = mysql_num_rows($rsview); //Registros devueltos   		
	 	     $search = explode(",","á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ,Ã¡,Ã©,Ã­,Ã³,Ãº,Ã±,ÃÃ¡,ÃÃ©,ÃÃ­,ÃÃ³,ÃÃº,ÃÃ±");
			 $replace = explode(",","á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ,á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ");
			 $message= str_replace($search, $replace,isset($message)); 
	while( ($fila=mysql_fetch_array($rsview)) ) { //al terminar while el puntero esta en el ultimo registro		
 	?>		  
    <!--ver la carpeta fancyapps_fancyBox\demo -->
     <div class="marco_imagen">
     <a class="fancybox-effects-d" href="<?php echo $fila['rutaimagen'] ?>" 
     title="Codigo:&nbsp<?php echo $fila['nombproductos'] ?>&nbsp&nbsp Detalle :&nbsp<?php echo $fila['detalle'] ?>">
     <?php  echo "<img  src='timthumb.php?src=" .$fila['rutaimagen']. "&h=380&w=340&zc=0q=100&s=1' border=0 />" ?>	
     <span class="span_link">Ampliar</span>
     </a>    
     
     <!--antes de timthumb
     <a class="fancybox-effects-b" href="<?php echo $fila['rutaimagen'] ?>" 
     title="Codigo:<?php echo $fila['nombproductos'] ?>&nbsp&nbsp Detalle :<?php echo $fila['detalle'] ?>">
     <img src="<?php echo $fila['rutaimagen'] ?>" width="340"  height="380" border="0"  alt="">
     <span class="span_link">Ampliar</span>
     </a>    
      -->
     
    </div>	
  <div class="marco_conte_detalle">
    <div class="marco_detalle">
       	 <div class="marco_descripcion">                                
          <span class="tex_Comfortaa size_14 white bold"><strong>Código : &nbsp </strong>
              <?php echo htmlspecialchars ($fila['nombproductos']) ?>
          </span>
          </div>     <!---fin marco_descripcion --> 
          <br/> <center>
       	 <div class="marco_codigo">                                
           <span class="tex_Montserrat white size_13 bold"><strong>Detalle : &nbsp </strong>
             <?php echo htmlspecialchars ($fila['detalle']) ?>
          </span> 
          </div>     <!---fin marco_codigo --> 
          </center>
           <div class="marco_precio">
            <span class="tex_Merienda_One bold size_18 red">
             S/. &nbsp 
			 <?php 
			   if($fila['en_oferta']=='SI'){
			 	echo htmlentities(number_format($fila['preciosolesoferta'],2))  ;
			   } else {
  			 	echo htmlentities(number_format($fila['preciosoles'],2))  ;
			  } ?>        
             &nbsp&nbsp Soles             
            </span>
           </div>    <!---fin marco_precio -->
    
    </div> <!--fin marco_detalle --> 
    
    
</div> 
          
<div class="marco_botones" >
     <table  width="30%" border="0" align="center"> <!--Incio tabla botones -->
      <tr>
        <td align="center" width="50%">
            <div align="center" class="botonfic">            
     			<a href="<?=$_SERVER["HTTP_REFERER"]?>">Regresar</a>              
             </div>      
        </td>
        <td align="center" width="50%">
            <div align="center" class="botonfic">
            <a href='principal.php?idsec1=tienda_virtual/agregar_pedido&idproductos=<?php echo $fila['idproductos']; ?>'>
              Comprar
              </a>
            </div>           
                         
        </td>
      </tr>
    </table> <!--fin tabla botones -->
	</div>    <!--fin marco_botones-->     
    
        <?php
		  }//Fin While   
		  }   //Fin Si 3
		  ?>    
 
</div><!---fin marco_gene_view -->
  
</body>
</html>