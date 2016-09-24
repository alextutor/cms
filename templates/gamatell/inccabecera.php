<?php 
$sql = "SELECT  * FROM contenido c  left join seccioncontenido  s on c.ccodcontenido=s.ccodcontenido WHERE  c.ccodpage= '".$pagew."'   " . $row_query . " and c.ccodmodulo='".$modulo."'  group by c.ccodcontenido desc order by c.ccodestcontenido desc  ";
?>
<div class="ctnlogo">  
    <div class="titulologo">
         <img src="<?php echo $logoweb ?>" width="270" height="50" alt="logo-gis" />
    </div>
    <div class="centrologo">
      <div class="atencioncli">Atención al Cliente&nbsp; = &nbsp;
      	<?php  echo $ccontacto;  ?>
       </div>	       
      <pre><span class="white 13 left">Foro de Soporte     :</span>  <a href="http://www.innovagsm.com/" target="new" class="bold verde_claro 14">http://www.innovagsm.com/</a></pre>              
    </div>
    <div class="redeslogo">	    
        <a href="https://www.youtube.com/user/solucionesenterprice" target="_blank">
        <img src="/imagen/redes-sociales/youtube.png" width="32" height="32" alt="youtube" border="0"/> </a>&nbsp;&nbsp;
        <a href="https://twitter.com/geoenterprice" target="_blank">
        <img src="/imagen/redes-sociales/twitter.png" width="32" height="32" alt="twitter" border="0"/></a>&nbsp;&nbsp;
        <a href="https://www.facebook.com/geoenterprice" target="_blank">
        <img src="/imagen/redes-sociales/facebook.png" width="32" height="32" alt="facebook" border="0"/></a>        
    </div>	  
</div>
