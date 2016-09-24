<!--http://tympanus.net/codrops/2014/03/21/responsive-full-width-tabs/ -->
<?php	session_start();// viene de funciones_web.php  (Contenido Dinamico) $rowads['ctiphome']=='4'   
	$s1 = substr($rowads['ccodseccion'],0,12);
	//echo $s1."sdasdas" ;exit;
	$sqlhome   = "Select * FROM seccion where ccodseccion like '".$s1."%' and ccodmodulo='".$rowads['ccodmodulo'] ."' and cnivseccion='2' order by cordcontenido asc ";				  
	//echo $homesql;exit;
	$rstabla = db_query($sqlhome);	
	$sqlstylo   = "Select * FROM estiloclases  where ccodclase='".$rowads['ccodclase']."'";	
	$rsstylo = db_query($sqlstylo);
	$rowstylo  = db_fetch_array($rsstylo);

?>
<div id="tabs" class="tabs">
	<nav>            
      <ul>
         <?php 
         $x=1;
         while($rowhome  = db_fetch_array($rstabla)) {	 //  while 1			 
            $vowels = array("Cursos", "de");
            $onlyconsonants = str_replace($vowels, "", $rowhome['cnomseccion']);
          ?>				
            <li><a href="#section-<?=$x?>"><span style="font-size:14px; font-weight:bold;">
				<?=$onlyconsonants ?></span></a>
            </li>                
         <?php $x++;} // Fin while  1   ?>
      </ul>	
	</nav>
	<div class="content">	
    	<?php
		$xconte=1; 
		$rsconte = db_query($sqlhome);	
		//aqui empieza cabecera
		while($rowconte  = db_fetch_array($rsconte)) { //  while 2										 
			?>        
        <section id="section-<?=$xconte?>"> 
          <?php
			  $codsecc=$rowconte['ccodseccion']; 
			 $sqlcontenido1 = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido  and s.ccodseccion = '".$rowconte['ccodseccion']."' AND c.cestcontenido='1' and c.ccodcategoria='1' and c.estado='1' order by c.cordcontenido asc ";
			 $rscontenido1 = db_query($sqlcontenido1 );
			//$num_rows=mysql_num_rows($rscontenido1);
			
			//aqui empieza contenido cabecera
			while($rowcontenido1  = db_fetch_array($rscontenido1)) {  //  while 3
				//echo  $rowcontenido1['cnomcontenido']."<br><br>";
				
				//Inicio viene de articulo_estilo02.php
				if($rowcontenido1['curlcontenido']=="")
				{
					$nomurl        = crearurl_articulo($rowcontenido1['ccodseccion']);
					$enlaceurl     = "/".$nomurl."/".$rowcontenido1['camicontenido'];
					$enlacedestino = "";
			
				}
				else
				{
					$enlaceurl     = $row['curlcontenido'];
					$enlacedestino = "target='_blank'";
				}
				//Fin viene de articulo_estilo02.php
			?>               					
			<div class="mediabox">
            	  <?php
          if($rowcontenido1['cimgcontenido']!=""){ ?>
          <a href="<?=$enlaceurl?>" title="<?=$rowcontenido1['cnomcontenido']?>" <?=$enlacedestino?>>
              <img src="/timthumb.php?src=<?php echo $rowcontenido1['cimgcontenido']; ?>&w=140&h=100&zc=0&q=100&s=1" border="0" 
              title="<?=$rowcontenido1['cnomcontenido']?>"  alt="<?=$rowcontenido1['cnomcontenido']?>" align="left" >
          </a>    
          <?php } ?>  
          	 <h3>
                <a href="<?=$enlaceurl?>" title="<?=$rowcontenido1['cnomcontenido']?>" <?=$enlacedestino?>>
                <?=$rowcontenido1['cnomcontenido']?></a>
            </h3>      					
				<p>Catsear cauliflower garbanzo yarrow salsify chicory garlic bell pepper napa cabbage lettuce tomato kale arugula melon sierra leone bologi rutabaga tigernut.</p>
                
			</div>	 <!-- Fin mediabox -->	
            
		 <?php }  // Fin while 3  ?> <!-- aqui termina contenido de seccion -->
		</section>
         <?php $xconte++; } // Fin whil 2?>     
	</div><!-- /content -->
</div><!-- /tabs -->
<script src="/include/FullWidthTabs/FullWidthTabs/js/cbpFWTabs.js"></script>
<script>
	new CBPFWTabs( document.getElementById( 'tabs' ) );
</script>

<script>
/**
 * cbpFWTabs.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2014, Codrops
 * http://www.codrops.com
 */
;( function( window ) {
	
	'use strict';

	function extend( a, b ) {
		for( var key in b ) { 
			if( b.hasOwnProperty( key ) ) {
				a[key] = b[key];
			}
		}
		return a;
	}

	function CBPFWTabs( el, options ) {
		this.el = el;
		this.options = extend( {}, this.options );
  		extend( this.options, options );
  		this._init();
	}

	CBPFWTabs.prototype.options = {
		start : 0
	};

	CBPFWTabs.prototype._init = function() {
		// tabs elemes
		this.tabs = [].slice.call( this.el.querySelectorAll( 'nav > ul > li' ) );
		// content items
		this.items = [].slice.call( this.el.querySelectorAll( '.content > section' ) );
		// current index
		this.current = -1;
		// show current content item
		this._show();
		// init events
		this._initEvents();
	};

	CBPFWTabs.prototype._initEvents = function() {
		var self = this;
		this.tabs.forEach( function( tab, idx ) {
			tab.addEventListener( 'click', function( ev ) {
				ev.preventDefault();
				self._show( idx );
			} );
		} );
	};

	CBPFWTabs.prototype._show = function( idx ) {
		if( this.current >= 0 ) {
			this.tabs[ this.current ].className = '';
			this.items[ this.current ].className = '';
		}
		// change current
		this.current = idx != undefined ? idx : this.options.start >= 0 && this.options.start < this.items.length ? this.options.start : 0;
		this.tabs[ this.current ].className = 'tab-current';
		this.items[ this.current ].className = 'content-current';
	};

	// add to global namespace
	window.CBPFWTabs = CBPFWTabs;

})( window );
</script>


<style type="text/css">
@font-face {
	font-family: 'icomoon';
	src:url('../fonts/icomoon/icomoon.eot?pvm5gj');
	src:url('../fonts/icomoon/icomoon.eot?#iefixpvm5gj') format('embedded-opentype'),
		url('../fonts/icomoon/icomoon.woff?pvm5gj') format('woff'),
		url('../fonts/icomoon/icomoon.ttf?pvm5gj') format('truetype'),
		url('../fonts/icomoon/icomoon.svg?pvm5gj#icomoon') format('svg');
	font-weight: normal;
	font-style: normal;
} /* Icons created with icomoon.io/app */

.tabs {
	position: relative;
	width: 100%;
	overflow: hidden;
	margin: 1em 0 2em;
	font-weight: 300;
}

/* Nav */
.tabs nav {
	text-align: center;
}

.tabs nav ul {
	padding: 0;
	margin: 0;
	list-style: none;
	display: inline-block;
}

.tabs nav ul li {
	border: 1px solid #becbd2;
	border-bottom: none;
	margin: 0 0.25em;
	display: block;
	float: left;
	position: relative;
}

.tabs nav li.tab-current {
	border: 1px solid #47a3da;
	box-shadow: inset 0 2px #47a3da;
	border-bottom: none;
	z-index: 100;
}

.tabs nav li.tab-current:before,
.tabs nav li.tab-current:after {
	content: '';
	position: absolute;
	height: 1px;
	right: 100%;
	bottom: 0;
	width: 1000px;
	background: #47a3da;
}

.tabs nav li.tab-current:after {
	right: auto;
	left: 100%;
	width: 4000px;
}

.tabs nav a {
	color: #becbd2;
	display: block;
	font-size: 1.45em;
	line-height: 2.5;
	padding: 0 1.25em;
	white-space: nowrap;
}

.tabs nav a:hover {
	color: #768e9d;
}

.tabs nav li.tab-current a {
	color: #47a3da;
}

/* Icons */
.tabs nav a:before {
	display: inline-block;
	vertical-align: middle;
	text-transform: none;
	font-weight: normal;
	font-variant: normal;
	font-family: 'icomoon';
	line-height: 1;
	speak: none;
	-webkit-font-smoothing: antialiased;
	margin: -0.25em 0.4em 0 0;
}

.icon-food:before {
	content: "\e600";
}

.icon-lab:before {
	content: "\e601";
}

.icon-cup:before {
	content: "\e602";
}

.icon-truck:before {
	content: "\e603";
}

.icon-shop:before {
	content: "\e604";
}

/* Content */
.content section {
	font-size: 1.25em;
	padding: 3em 1em;
	display: none;
	max-width: 1230px;
	margin: 0 auto;
}

.content section:before,
.content section:after {
	content: '';
	display: table;
}

.content section:after {
	clear: both;
}

/* Fallback example */
.no-js .content section {
	display: block;
	padding-bottom: 2em;
	border-bottom: 1px solid #47a3da;
}

.content section.content-current {
	display: block;
}

.mediabox {
	float: left;
	width: 33%;
	padding: 0 25px;
}

.mediabox img {
	max-width: 100%;
	display: block;
	margin: 0 auto;
}

.mediabox h3 {
	margin: 0.75em 0 0.5em;
}

.mediabox p {
	padding: 0 0 1em 0;
	margin: 0;
	line-height: 1.3;
}

/* Example media queries */

@media screen and (max-width: 52.375em) {
	.tabs nav a span {
		display: none;
	}

	.tabs nav a:before {
		margin-right: 0;
	}

	.mediabox {
		float: none;
		width: auto;
		padding: 0 0 35px 0;
		font-size: 90%;
	}

	.mediabox img {
		float: left;
		margin: 0 25px 10px 0;
		max-width: 40%;
	}

	.mediabox h3 {
		margin-top: 0;
	}

	.mediabox p {
		margin-left: 40%;
		margin-left: calc(40% + 25px);
	}

	.mediabox:before,
	.mediabox:after {
		content: '';
		display: table;
	}

	.mediabox:after {
		clear: both;
	}
}

@media screen and (max-width: 32em) {
	.tabs nav ul,
	.tabs nav ul li a {
		width: 100%;
		padding: 0;
	}

	.tabs nav ul li {
		width: 20%;
		width: calc(20% + 1px);
		margin: 0 0 0 -1px;
	}

	.tabs nav ul li:last-child {
		border-right: none;
	}

	.mediabox {
		text-align: center;
	}

	.mediabox img {
		float: none;
		margin: 0 auto;
		max-width: 100%;
	}

	.mediabox h3 {
		margin: 1.25em 0 1em;
	}

	.mediabox p {
		margin: 0;
	}
}
</style> 

