<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i>Categories <span class="caret"></span></a>				                     
	 <ul class="dropdown-menu">          
	   <?php
      //echo "hola";exit;      
      $sqlmenucab = "SELECT s.ccodseccion,s.cnomseccion,s.multidrop,s.camiseccion,s.curlseccion,s.ctipseccion,mostrarurlcatebase FROM  seccion s, seccionmenu  su, pagemenu pm WHERE s.ccodseccion=su.ccodseccion and su.ccodmenu = pm.ccodmenu and pm.cubimenu='1' and s.ccodpage='".$codpage."' and s.cnivseccion=1 and  s.estado='1'  ORDER BY s.cordcontenido";
      //echo $sqlmenucab;exit;
      $resmenucab = db_query($sqlmenucab);
      $nromenucab = db_num_rows($resmenucab);
      //------------------------1 nivel----------------------
      
      while ($rowmenucab = db_fetch_array($resmenucab)) //Inicio while 1	
      {
        //$i= $i+1;        
        ?>
         <li><a href="<?=$enlacecab ?>"><i class="fa fa-home" aria-hidden="true"></i><?=$rowmenucab['cnomseccion']?> </a></li>
      <?php            
          } //Fin while 1
      ?>	      
     </ul>
</li>