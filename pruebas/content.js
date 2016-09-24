var images = document.getElementsByTagName('img');
for (var i = 0, l = images.length; i < l; i++) {
  images[i].src = 'http://www.huarosac.pe/' + images[i].width + '/' + images[i].height;
}
