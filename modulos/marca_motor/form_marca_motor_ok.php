<style>
.title{ margin: 0 0 10px;background-color: #c03;text-align: center;cursor: pointer;}
.title strong { display: block; padding: 12px 15px;font: normal 14px 'eurostile'; color: #fff;text-transform: uppercase;}
textarea, select {height: 36px;border: 1px solid #ccc;background-color: #f6f6f6;padding: 8px;vertical-align: middle;}
select {min-width: 50px;padding: 6px;}
</style>
<div class="title"> <strong>Repuestos por Marca de Motor</strong></div>
<?php 
 $s1mm = substr('121728122015000000000000',0,12);	//Repuestos por Marca de Motor	
 $sqlmenumm2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s1mm."%'  and cnivseccion=2 and  estado='1' ORDER BY cordcontenido ASC";
 //echo $sqlmenucab2;exit;
 $resmenumm2 = db_query($sqlmenumm2);
 $nromenumm2 = db_num_rows($resmenumm2);
?>
<select name="ctl00$ctl00$cph1$ddlCodMar" id="ctl00_ctl00_cph1_ddlCodMar" style="width:100%;margin-bottom:7px;font-size: 12;">
<option value="">[Seleccionar marca]</option>
<?php
 while ($rowmenumm2 = db_fetch_array($resmenumm2)) //Inicio while 2 Menu 2Nivel
	{
 	$s2mm = substr($rowmenumm2['ccodseccion'],0,16);
	$tipo2mm = $rowmenumm2['ctipseccion'];
?>
<option value="<?=$rowmenumm2['ccodseccion']?>"><?=$rowmenumm2['cnomseccion']?></option>
<?php } // Fin while 2 Menu Nivel2 ?>
</select>