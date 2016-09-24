<header><a id="logo" href="#">Logo</a>
<nav id="menu"><a class="nav-mobile" id="nav-mobile" href="#"></a>
<?php
	if (empty($_GET['idsec']))
	{
		$seccionactiva ="inicio";
	}
	else
	{
		$seccionactiva = $_GET['idsec'];
	}

    $i=0;
	
	$sqlmenucab = "SELECT s.ccodseccion,s.cnomseccion,s.camiseccion,s.curlseccion,s.ctipseccion,mostrarurlcatebase FROM  seccion s, seccionmenu  su, pagemenu pm WHERE s.ccodseccion=su.ccodseccion and su.ccodmenu = pm.ccodmenu and pm.cubimenu='1' and s.ccodpage='".$codpage."' and s.cnivseccion=1 and  s.cestseccion='1'  ORDER BY s.cordcontenido";
	$resmenucab = db_query($sqlmenucab);
	$nromenucab = db_num_rows($resmenucab);
	//------------------------1 nivel----------------------
	
	
	while ($rowmenucab = db_fetch_array($resmenucab)) 
		{
			$i= $i+1;
			if ($i==1) echo "<ul id='cabmenu'>\n";
			$s1 = substr($rowmenucab['ccodseccion'],0,12);
			$tipo_cabseccion = $rowmenucab['ctipseccion'];
			switch($tipo_cabseccion)
			{
			case 1:
				$enlacecab = "/".$rowmenucab['camiseccion'];
				break;
			case 2:
				$enlacecab = $rowmenucab['curlseccion'];
				break;
			}
			$estactiva="";
			if ($rowmenucab['camiseccion']==$seccionactiva) $estactiva= " id='active'";
			echo "<li ".$estactiva."><a href='".$enlacecab."' title='".$rowmenucab[cnomseccion]."' >".$rowmenucab[cnomseccion]."</a>";
			echo "<ul>";
			$sqlmenucab2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s1."%'  and cnivseccion=2 and  cestseccion='1' ORDER BY  cordcontenido ASC";
			$resmenucab2 = db_query($sqlmenucab2);
			$nromenucab2 = db_num_rows($resmenucab2);
		//------------------------2 nivel----------------------
			while ($rowmenucab2 = db_fetch_array($resmenucab2)) 
			{
				$s2 = substr($rowmenucab2['ccodseccion'],0,16);
				$tipo2 = $rowmenucab2['ctipseccion'];
				switch($tipo2)
				{
				case 1:
					$enlacecab2 = "/".$rowmenucab['camiseccion']."/".$rowmenucab2['camiseccion'];							
					//indica si mostara url de la categoria padre
					if ($rowmenucab['mostrarurlcatebase']=="NO"){
						$enlacecab2 = "/".$rowmenucab2['camiseccion'];							
					}   					
					break;
				case 2:
					$enlacecab2 = $rowmenucab2['curlseccion'];
					break;
				}				
				echo "<li ><a href='".$enlacecab2."'>".$rowmenucab2[cnomseccion]."</a>";
				echo "<ul >";
				$sqlmenucab3 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s2."%'  and cnivseccion=3 and  cestseccion='1' ORDER BY cordcontenido ASC   ";
				$resmenucab3 = db_query($sqlmenucab3);
				$nromenucab3 = db_num_rows($resmenucab3);
				//------------------------3 nivel----------------------
				while ($rowmenucab3 = db_fetch_array($resmenucab3)) 
				{
					$s3 = substr($rowmenucab3['ccodseccion'],0,20);
					$tipo3 = $rowmenucab3['ctipseccion'];
					switch($tipo3)
					{
					case 1:
						$enlacecab3 = "/".$rowmenucab['camiseccion']."/".$rowmenucab2['camiseccion']."/".$rowmenucab3['camiseccion'];
						break;
					case 2:
						$enlacecab3 = $rowmenucab3['curlseccion'];
						break;
					}
					echo "<li><a href='".$enlacecab3."'>".$rowmenucab3[cnomseccion]."</a>";
					echo "<ul >";
					$sqlmenucab4 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s3."%'  and cnivseccion=4 and  cestseccion='1' ORDER BY  seccion.cordcontenido ";
					$resmenucab4 = db_query($sqlmenucab4);
					$nromenucab4 = db_num_rows($resmenucab4);
					while ($rowmenucab4 = db_fetch_array($resmenucab4)) 
					{
						$tipo4 = $rowmenucab4['ctipseccion'];
						switch($tipo4)
						{
						case 1:
							$enlacecab4 = "/".$rowmenucab['camiseccion']."/".$rowmenucab2['camiseccion']."/".$rowmenucab3['camiseccion']."/".$rowmenucab4['camiseccion'];
							break;
						case 2:
							$enlacecab4 = $rowmenucab4['curlseccion'];
							break;
						}
						echo "<li><a href='".$enlacecab4."'>".$rowmenucab4[cnomseccion]."</a></li>\n";
					}
					echo "</ul>\n";
					echo "</li>\n";
				}
				echo "</ul>\n";
				echo "</li>\n";
			}
			echo "</ul>\n";
			echo "</li>\n";
			if ($i==$nromenucab) echo "</ul>\n";
		}
?>
<!--http://miiquel.com/tutorial/crear-un-menu-responsive-basico/-->
</nav>
</header>
<style type="text/css">
/* Definimos un ancho fluido y una altura fija para nuestro menú */
header{
    background: #22282e;
    height:60px;
    position: relative;
    width: 100%;
}
/* El logo sera flotado a la izquierda */
#logo{
    background: url(logo.png) no-repeat 0 0;
    display: block;
    float: left;
    margin: 6px 10px 0;
    width: 82px;
    height: 46px;
    text-indent: -9999px
}
/* Nuestro nav con id #menu lo flotaremos a la derecha*/
#menu{ float: right;}
 
    /* Quitamos estilos por defecto de el tag UL */
    #menu ul{
        margin: 0;
        padding: 0;
        list-style: none;
        font-size: 14px;
    }
 
        /* Centramos y ponemos los textos en mayuscula */
        #menu li{
            display: block;
            float: left;
            text-transform: uppercase;
            text-align: center;
        }
 
            /* Damos estilo a nuestros enlaces */
            #menu li a{
                display: block;
                color: #fff;
                text-decoration: none;
                height: 60px;
                line-height: 60px;
                padding: 0 26px;
            }
                #menu li a:hover{
                    background: #151a1e;
                    color: #ffc700;
                }
 
/* Estilos #nav-mobile y lo ocultamos */
#nav-mobile{
    display: none;
    background: url(/imagen/nav-menu-movil.png) no-repeat center center;
    float: right;
    width: 60px;
    height: 60px;
    position: absolute;
    right: 0;
    top:0;
    opacity: .6;
}
 
    /* Agregaremos esta clase a #nav-mobile, cuando el menu mobile haya sido desplegado */
    #nav-mobile.nav-active{
        opacity: 1;
    }
</style>
<style type="text/css">
@media only screen and (max-width: 768px) {
 
    /* mostramos #nav-mobile */
    #nav-mobile{ display: block; }
 
    /* Fijamos nuestro nav en 100% ancho y dejamos de flotarlo */
    #menu{
        width: 100%;
        float: none;
        padding-top: 60px;
    }
 
        /* Convertimos nuestra lista de enlaces en un menú horizontal */
        #menu ul{
            box-shadow: 0 1px 2px rgba(0,0,0,.5);
            max-height: 0;
            overflow: hidden;
        }
            /* estilos para los LI del menu */
            #menu li{
                background: #33363b;
                border-bottom: 1px solid #282b30;
                float: none;
            }
                /* Quitamos el borde del ultimo item del menú */
                #menu li:last-child{ border-bottom: 0;}
 
                #menu li a{
                    padding: 15px 0;
                    height: auto;
                    line-height: normal;
                }
                #menu li a:hover{background:#2a2d33}
 
        /* Agregamos una animación al despligue del menú */
        #menu ul.open-menu{
            max-height: 400px;
            transition: max-height .4s;
        }
</style>
