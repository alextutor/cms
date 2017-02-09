<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FB Like Shadowbox</title>
<link rel="stylesheet" type="text/css" href="/include/Shadowbox/shadowbox.css">
<script type="text/javascript" src="/include/Shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
    // let's skip the automatic setup because we don't have any
    // properly configured link elements on the page
    skipSetup: true
});
</script>
</head>

<body>
hola tio
<div id="fb-root"></div>
<script src="http://connect.facebook.net/es_LA/all.js"></script>
<script>
  FB.init({
    appId  : '1109024702487883',
    status : true, // check login status
    cookie : true, // enable cookies to allow the server to access the session
    xfbml  : true
  });
  FB.Event.subscribe('edge.create', function(response) {  
 // https://youtu.be/1c5U1TRbC_M
	Shadowbox.open({
			content:    "<iframe width='640' height='360' src='http://facebook.com/sharer.php?u=' frameborder='0' allowfullscreen></iframe>",
			player:     "html",
			title:      "Welcome"
		});
	
	});
</script>

<fb:like-box href="http://www.facebook.com/siegeINKFan" layout="standard" show-faces="false" width="270" height="62" action="like" colorscheme="light" font="arial" border_color="" stream="false" header="false"></fb:like-box>
</body>
</html>