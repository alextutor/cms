<?Php  session_start(); 
	extract($_POST);
	 include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
	$_SESSION['id']=$_GET["id"];
	
	$alexruta=$_SERVER['DOCUMENT_ROOT'].'/imagen/'.$_SESSION['cRuta_Foto_Contenido'].'/foto-contenido/';
	//echo $alexruta;exit;
if (file_exists($alexruta)) {
	//echo "El directorio existe";
} else {
	//echo "El directorio no existe";
	if(!mkdir($alexruta, 0777, true)) {
    	die('Fallo al crear las carpetas...'.$alexruta);
		exit;
	}
}


 ?>
<!--  lo puse en webadmin/index  y el  jquery-1.7.1 que esta nabajo lo desabilite
<script src="/include/js/jquery-1.9.1.js"></script>
-->
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">  
<link rel="stylesheet" type="text/css" href="http://rawgithub.com/moxiecode/plupload/master/js/jquery.ui.plupload/css/jquery.ui.plupload.css">

<!--  lo puse en webadmin/index
<script src="/include/js/jquery-1.9.1.js"></script>   
<script src="/include/plupload/jquery-ui.js"></script>
<script src="/include/plupload/plupload.full.min.js"></script>
<script src="/include/plupload/jquery.ui.plupload.min.js"></script>
<script src="/include/plupload/langs/es.js"></script>
 <script type='text/javascript'>//<![CDATA[ 
$(document).ready(function() {
	$("#uploader").plupload({
		// General settings
		runtimes: 'html5,flash,silverlight,html4',		
		// Fake server response here 
		// url : '../upload.php',
		url : '/include/plupload/upload.php',
		// Maximum file size
		max_file_size: '1000mb',
		// User can upload no more then 20 files in one go (sets multiple_queues to false)
		max_file_count: 20,		
		chunk_size: '1mb',
		// Resize images on clientside if we can
		resize : {
			width: 200, 
			height: 200, 
			quality: 90,
			crop: true // crop to exact dimensions
		},
		// Specify what files to browse for
		filters: [
			{ title: "Image files", extensions: "jpg,gif,png" },
			{ title: "Zip files", extensions:  "zip,avi" }
		],
		// Rename files by clicking on their titles
		rename: true,		
		// Sort files
		sortable: true,
		// Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
		dragdrop: true,
		// Views to activate
		views: {
			list: true,
			thumbs: true, // Show thumbs
			active: 'thumbs'
		},
		// Flash settings
		flash_swf_url : '/include/plupload/Moxie.cdn.swf',
		// Silverlight settings
		silverlight_xap_url : '/include/pluploadMoxie.cdn.xap'
	});
	// Handle the case when form was submitted before uploading has finished
	$('#form').submit(function(e) {
		// Files in queue upload them first
		if ($('#uploader').plupload('getFiles').length > 0) {
			// When all files are uploaded submit form
			$('#uploader').on('complete', function() {
				$('#form')[0].submit();
			});
			$('#uploader').plupload('start');
		} else {
			alert("You must have at least one file in the queue.");
		}
		return false; // Keep the form from submitting
	});	
}); 
</script>
 -->
<div id="toolbar-box">
	<div class="m">
        <div class="toolbar-list" id="toolbar">
            <ul>
            <!--
            <li class="button" id="toolbar-apply">
	            <a onclick="document.forms['adminForm'].submit();" class="toolbar"><span class="icon-32-apply"></span>Guardar</a>
                 -->
            </li>
            <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=com_articulos" onclick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-category-add icon-48-content-category-add">
           <h2>Insertar Fotos: Añadir una nueva Foto</h2></div></div><div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
          
<form id="form" method="post" action="/include/plupload/upload.php">
        <select name="selectpage" id="selectpage" style="width:320px">
                              <?php  $sql_page = db_query("select * from page  where  cestpage='1' and credpage='' order by cnompage");
                                 while($row_page = db_fetch_array($sql_page)) 
                                 {
                                    if( $row_page['ccodpage']==$rowp['ccodpage'])
                                        echo '<option value="' . $row_page['ccodpage'] .'" selected>' . $row_page['cnompage'] . '</option>';
                                     else
                                        echo '<option value="' . $row_page['ccodpage'] .'">' . $row_page['cnompage'] . '</option>';
                                 }
                              ?>
        </select>
                      
	<div id="uploader">
		<p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
	</div>
    <!--alex no se porque no envia a upload.php asi que lo meti en una session falta implementar para selectpage -->
     <input type="hidden" name="ccodcontenido" id="ccodcontenido" value="<?=$id?>" />
</form>
          	<!--FIN Formulario -->
            <div class="clr"></div>
      	  </div>
        <div class="clr"></div>
    </div>    
</div>