function include_once(file_path){
	var sc = document.getElementsByTagName("script");
	for (var x in sc)
		if (sc[x].src != null && sc[x].src.indexOf(file_path) != -1) return;
	include(file_path);
}