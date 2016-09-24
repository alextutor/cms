
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
 <div>	
   <div style=" padding:5px;width: <?=$rowsucursal['anchomapa']?>; height: <?=$rowsucursal['altomapa']?>; margin-top:10px; margin-bottom:30px; padding-right:10px;border:#000000 solid 1px">
    <?=$rowsucursal['cod_google_map']?>
    </div>                          
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
