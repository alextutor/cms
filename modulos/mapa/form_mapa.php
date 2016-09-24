<link rel="stylesheet" type="text/css" href="/modulos/mapa/css/YUI-TabView/fonts-min.css" />
<link rel="stylesheet" type="text/css" href="/modulos/mapa/css/YUI-TabView/tabview.css" />
<script type="text/javascript" src="/modulos/mapa/js/YUI-TabView/yahoo-dom-event.js"></script>
<script type="text/javascript" src="/modulos/mapa/js/YUI-TabView/element-min.js"></script>
<script type="text/javascript" src="/modulos/mapa/js/YUI-TabView/tabview-min.js"></script> 

<style type="text/css">
 .con_menu_ubi{
	clear: both;
	width: 100%;¨	
    border: 3px solid #FF6600;
    border-radius: 5px;
    margin:0 auto;
    margin-top:30px;	
 }
 .distrito
 { 		
 width: 100%;
 color: #048EC7;
 border-bottom: 1px solid #D0D0D0;
 font-size:16;
 font-weight:bold;
 margin-bottom:10px;
}
.cdirecempresa,.ctelefonopri
 { 		
 width: 100%;
 color: #000 ;
 font-size:14;
 margin-bottom:5px;
}
 .Horario_Aten
 {
	width: 500px;
	height:30px;
	background:#49ac7b;	
	color:#FFF;
	text-align:center;
	-moz-border-radius: 11px;
	-webkit-border-radius: 11px;
	border-radius: 11px;
	behavior: url(../PIE.htc);	
	position: relative;
	z-index:1;
	padding-top:10px;
	margin:0 auto;
    margin-top:50px;	
}
</style>
<?php			
	$sqlsucursal=db_query("SELECT * FROM page WHERE ccodpage='".$codpage."'" );		
	$rowsucursal=db_fetch_array($sqlsucursal);
 ?>	
<body class="yui-skin-sam"> 
<div id="demo" class="yui-navset" style="margin-top:10px;">
    <ul class="yui-nav">
        <li class="selected"><a href="#tab1"><em>Ubicación</em></a></li>        	
        <li ><a href="#tab2"><em>Ver Mapa en Google Map</em></a></li>          
    </ul>            
    <div class="yui-content"> <!--Inicio Contenido -->
        <div id="tab1">   <!--Inico Tab 1 -->   
        	<a rel="shadowbox[galeria1]"  href="<?=$rowsucursal['imagen_mapa']?>"  title="<?=$rowsucursal['imagen_mapa']?>">		         
          <img src="/timthumb.php?src=<?php echo $rowsucursal['imagen_mapa']; ?>&w=720&h=410&zc=0&q=100&s=1" border="0"               title="<?=$rowsucursal['imagen_mapa']?>"  alt="<?=$rowsucursal['imagen_mapa']?>" align="left" >                    
            </a>
        </div>  <!--Fin Tab 1 -->
        <div id="tab2">  <!--Inico Tab 2 -->
            <div> 
            	<div style="width:100%">    						
                        <div style=" padding:5px;width: <?=$rowsucursal['anchomapa']?>; height: <?=$rowsucursal['altomapa']?>; margin-top:10px; margin-bottom:30px; padding-right:10px;border:#000000 solid 1px">
                        <?=$rowsucursal['cod_google_map']?>
                        </div>                          
                </div>
            </div>
        </div>      <!--Fin Tab 2 -->
        
    </div>		<!--Fin Contenido -->
</div>

    	    
    
    <div class="con_menu_ubi">
         <div class="distrito"> <?=$rowsucursal['cdistrito'] ."  -  ".$rowsucursal['cprovincia']  ?>: </div>
         <div class="cdirecempresa"> <?=$rowsucursal['cdirecempresa']  ?></div>
         <div class="ctelefonopri"><?=$ccontactopie; //definido en index  ?></div>
                     
         <?php if (trim($rowsucursal['chorarioatencion'])!=""){
             echo "<div class='Horario_Aten t14'>".$rowsucursal['chorarioatencion']."</div>";
             } 	 
         ?>
    </div> <!--Fin con_menu_ubi -->
</body>    
<script> 
(function() {
    var tabView = new YAHOO.widget.TabView('demo'); 
    /*YAHOO.log("The example has finished loading; as you interact with it, you'll see log messages appearing here.", "info", "example");*/
})();
</script> 
