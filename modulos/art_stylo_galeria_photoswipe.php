<!-- Nota alex  deves poner enla cabecera  los js y los estilos porque sino cuando invoques
http://www.desarrollo.com/servicios/muebles#&gid=1&pid=3   no mostrara la imagen seleccionada
lo puse debajo de de index pero no dio reusltado -->
<!-- <script src="/include/photoswipe/photoswipe-ui-default.min.js" type="text/javascript"></script>  -->
<!-- 	// ver lightGallery  competencia de  photoswipe ( http://sachinchoolur.github.io/lightGallery/ ) -->
<script src="/include/photoswipe/photoswipe.min.js" type="text/javascript"></script> 
<script src="/include/photoswipe/photoswipe-ui-default.js" type="text/javascript"></script> 

<link  href="/include/photoswipe/photoswipe.css"  rel="stylesheet" type="text/css" >
<link  href="/include/photoswipe/default-skin.css"  rel="stylesheet" type="text/css" >

<?php //echo "huizadddddddddddddddddd";exit;
//el fondo de PhotoSwipe  esta en photoswipe.css  clase .pswp__bg {?>
<!-- foro :
https://github.com/dimsemenov/PhotoSwipe/issues?page=2&q=is%3Aissue+is%3Aopen

http://codepen.io/dimsemenov/pen/ZYbPJM
http://photoswipe.com/documentation/getting-started.html 
http://webdesign.tutsplus.com/es/tutorials/the-perfect-lightbox-using-photoswipe-with-jquery--cms-23587
-->

<!--<h2>First gallery:</h2> -->
<style>
.my-gallery {width: 100%;display:flex; Justify-content:Space-between;Flex-wrap: wrap;}
.desc_galeria{ margin-bottom:10px; width:100%; text-align:left; font-size:14px;margin-left:10px; }
.my-gallery img {width: 100%;height: auto;}
.my-gallery figure {
   width:calc((100% - 10px)/2);
	flex:none;
	box-shadow: 0 0 0 1px #fff,
	            0 0 0 2px #ccc;
	box-sizing  : border-box ; 			
	margin-bottom:10px;
	display:flex;
	justify-content:center;
	flex-wrap:wrap;
	padding:1em 0;
	}
/*.my-gallery figcaption {display: none;}*/
.my-gallery figcaption { margin-top:8px;color:#777574;font-size: 13px; text-align:center ; width:80%;}

@media all and (min-width: 400px){ /* si es mayor a 400px 3 columnas */
	.my-gallery figure {width:calc((100% - 20px)/3);}
} 		
@media all and (min-width: 600px){/* si es mayor a 600px 4 columnas */
	.my-gallery figure {width:calc((100% - 30px)/4);}
} 


</style>
<?php 
 //saca estilo
$sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido  and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' and c.estado='1' order by c.dfeccontenido desc ";
$rsgaleria = db_query($sql_query);
$num_rows = db_num_rows($rsgaleria);  

$sqlstylo   = "Select estiloclases.* FROM estiloclases,seccion s where s.ccodseccion='".$codsecc."' and  
 estiloclases.ccodclase=s.ccodclase";	  
$rsstylo = db_query($sqlstylo);
$rowstylo  = db_fetch_array($rsstylo);

// saca descripcion de la seccion para seo 
$sql_Secciongaleria = "SELECT cdesseccion,cnomseccion FROM  seccion where ccodseccion = '".$codsecc."' AND estado='1'";
//echo $sql_Secciongaleria;exit;
$rsSecciongaleria = db_query($sql_Secciongaleria);
$rowSecciongaleria  = db_fetch_array($rsSecciongaleria);
// saca descripcion
?>
<div class="desc_galeria">
<h1><?php echo $rowSecciongaleria['cnomseccion'] ?></h1>
<?php echo $rowSecciongaleria['cdesseccion'] ?>
</div>
<div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
<?php 
$sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido  and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' order by c.dfeccontenido desc ";
$query = db_query($sql_query);
$total = db_num_rows($query);
$pag    = $pagina;
$numpags = ceil($total/$pagsecc);
$reg     = ($pag-1) * $pagsecc;
$producto_query = db_query($sql_query . " LIMIT " .$reg." , ".$pagsecc);
$dataindex=0;
while ($row=db_fetch_array($producto_query))
{ 
	if($row['curlcontenido']=="")
	{
		$nomurl        = crearurl_articulo($row['ccodseccion']);
		$enlaceurl     = "/".$nomurl.$row['camicontenido'];
		$enlacedestino = "";

	}
	else
	{
		$enlaceurl     = $row['curlcontenido'];
		$enlacedestino = "target='_blank'";
	}	
?>
    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
      <a href="<?=ereg_replace('fotos','thumbs',$row['cimgcontenido'])?>" itemprop="contentUrl" data-size="450x600" data-index=<?=$dataindex ?>>
          <img src="/timthumb.php?src=<?=$row['cimgcontenido'] ?>&h=200&w=160&zc=0&q=100&s=1" itemprop="thumbnail" alt="<?=$row['cnomcontenido']?>" />
      </a>
    	<figcaption itemprop="caption description"><?=$row['cnomcontenido']?></figcaption>                                          
    </figure>
  
  
<?php	++$dataindex; } //fin while ?>

</div>

<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

          </div>
        </div>
</div>
<!-- se paso a config_style.php 
<script src="/include/photoswipe/photoswipe.min.js" type="text/javascript"></script> 
<script src="/include/photoswipe/photoswipe-ui-default.min.js" type="text/javascript"></script> 
<link  href="/include/photoswipe/photoswipe.css"  rel="stylesheet" type="text/css" >
<link  href="/include/photoswipe/default-skin.css"  rel="stylesheet" type="text/css" >
-->

<script>
var initPhotoSwipeFromDOM = function(gallerySelector) {

    // parse slide data (url, title, size ...) from DOM elements 
    // (children of gallerySelector)
    var parseThumbnailElements = function(el) {
        var thumbElements = el.childNodes,
            numNodes = thumbElements.length,
            items = [],
            figureEl,
            linkEl,
            size,
            item;

        for(var i = 0; i < numNodes; i++) {

            figureEl = thumbElements[i]; // <figure> element

            // include only element nodes 
            if(figureEl.nodeType !== 1) {
                continue;
            }

            linkEl = figureEl.children[0]; // <a> element

            size = linkEl.getAttribute('data-size').split('x');

            // create slide object
            item = {
                src: linkEl.getAttribute('href'),
                w: parseInt(size[0], 10),
                h: parseInt(size[1], 10)
            };
            if(figureEl.children.length > 1) {
                // <figcaption> content
                item.title = figureEl.children[1].innerHTML; 
            }
            if(linkEl.children.length > 0) {
                // <img> thumbnail element, retrieving thumbnail url
                item.msrc = linkEl.children[0].getAttribute('src');
            }
            item.el = figureEl; // save link to element for getThumbBoundsFn
            items.push(item);
        }
        return items;
    };
    // find nearest parent element
    var closest = function closest(el, fn) {
        return el && ( fn(el) ? el : closest(el.parentNode, fn) );
    };

    // triggers when user clicks on thumbnail
    var onThumbnailsClick = function(e) {
        e = e || window.event;
        e.preventDefault ? e.preventDefault() : e.returnValue = false;

        var eTarget = e.target || e.srcElement;

        // find root element of slide
        var clickedListItem = closest(eTarget, function(el) {
            return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
        });

        if(!clickedListItem) {
            return;
        }

        // find index of clicked item by looping through all child nodes
        // alternatively, you may define index via data- attribute
        var clickedGallery = clickedListItem.parentNode,
            childNodes = clickedListItem.parentNode.childNodes,
            numChildNodes = childNodes.length,
            nodeIndex = 0,
            index;

        for (var i = 0; i < numChildNodes; i++) {
            if(childNodes[i].nodeType !== 1) { 
                continue; 
            }

            if(childNodes[i] === clickedListItem) {
                index = nodeIndex;
                break;
            }
            nodeIndex++;
        }



        if(index >= 0) {
            // open PhotoSwipe if valid index found
            openPhotoSwipe( index, clickedGallery );
        }
        return false;
    };

    // parse picture index and gallery index from URL (#&pid=1&gid=2)
    var photoswipeParseHash = function() {
        var hash = window.location.hash.substring(1),
        params = {};

        if(hash.length < 5) {
            return params;
        }

        var vars = hash.split('&');
        for (var i = 0; i < vars.length; i++) {
            if(!vars[i]) {
                continue;
            }
            var pair = vars[i].split('=');  
            if(pair.length < 2) {
                continue;
            }           
            params[pair[0]] = pair[1];
        }

        if(params.gid) {
            params.gid = parseInt(params.gid, 10);
        }

        return params;
    };

    var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
        var pswpElement = document.querySelectorAll('.pswp')[0],
            gallery,
            options,
            items;

        items = parseThumbnailElements(galleryElement);

        // define options (if needed)

        options = {

            // define gallery index (for URL)
            galleryUID: galleryElement.getAttribute('data-pswp-uid'),

            getThumbBoundsFn: function(index) {
                // See Options -> getThumbBoundsFn section of documentation for more info
                var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                    pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                    rect = thumbnail.getBoundingClientRect(); 

                return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
            }

        };

        // PhotoSwipe opened from URL
        if(fromURL) {
            if(options.galleryPIDs) {
                // parse real index when custom PIDs are used 
                // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                for(var j = 0; j < items.length; j++) {
                    if(items[j].pid == index) {
                        options.index = j;
                        break;
                    }
                }
            } else {
                // in URL indexes start from 1
                options.index = parseInt(index, 10) - 1;
            }
        } else {
            options.index = parseInt(index, 10);
        }

        // exit if index not found
        if( isNaN(options.index) ) {
            return;
        }

        if(disableAnimation) {
            options.showAnimationDuration = 0;
        }

        // Pass data to PhotoSwipe and initialize it
        gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
    };

    // loop through all gallery elements and bind events
    var galleryElements = document.querySelectorAll( gallerySelector );

    for(var i = 0, l = galleryElements.length; i < l; i++) {
        galleryElements[i].setAttribute('data-pswp-uid', i+1);
        galleryElements[i].onclick = onThumbnailsClick;
    }

    // Parse URL and open gallery if it contains #&pid=3&gid=1
    var hashData = photoswipeParseHash();
    if(hashData.pid && hashData.gid) {
        openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
    }
};

// execute above function
initPhotoSwipeFromDOM('.my-gallery')

</script>