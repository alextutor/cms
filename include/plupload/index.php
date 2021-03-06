<!DOCTYPE html>
<html>
<head>
<script src="<?=$_SERVER['DOCUMENT_ROOT']?>/include/js/jquery-1.9.1.js"></script>
<script src="<?=$_SERVER['DOCUMENT_ROOT']?>/include/plupload/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">  

<script src="<?=$_SERVER['DOCUMENT_ROOT']?>/include/plupload/plupload.full.min.js"></script>
<script src="<?=$_SERVER['DOCUMENT_ROOT']?>/include/plupload/jquery.ui.plupload.min.js"></script>
<script src="<?=$_SERVER['DOCUMENT_ROOT']?>/include/plupload/langs/es.js"></script>
<link rel="stylesheet" type="text/css" href="http://rawgithub.com/moxiecode/plupload/master/js/jquery.ui.plupload/css/jquery.ui.plupload.css">

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
		flash_swf_url : '\include\plupload\Moxie.cdn.swf',

		// Silverlight settings
		silverlight_xap_url : '\include\plupload\Moxie.cdn.xap'
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
</head>
<body>
<form id="form" method="post" action="/include/plupload/upload.php">
	<div id="uploader">
		<p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
	</div>
	<br />
	<input type="submit" value="Submit" />
</form>  
</body>
</html>
