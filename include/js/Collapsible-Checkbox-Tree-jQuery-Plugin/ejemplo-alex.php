<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="include/js/Collapsible-Checkbox-Tree-jQuery-Plugin/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="include/js/Collapsible-Checkbox-Tree-jQuery-Plugin/jquery.collapsibleCheckboxTree.js"></script>
<link rel="stylesheet" type="text/css" href="include/js/Collapsible-Checkbox-Tree-jQuery-Plugin/jquery.collapsibleCheckboxTree.css"/>

<script type="text/javascript">
jQuery(document).ready(function(){
		$('ul#example').collapsibleCheckboxTree();
});
/*
jQuery(document).ready(function(){
		$('ul#example').collapsibleCheckboxTree({
		checkParents : true, // When checking a box, all parents are checked (Default: true)
		checkChildren : false, // When checking a box, all children are checked (Default: false)
		shiftClickEffectChildren : true, // When shift-clicking a box, all children are checked or unchecked (Default: true)
		uncheckChildren : true, // When unchecking a box, all children are unchecked (Default: true)
		includeButtons : true, // Include buttons to expand or collapse all above list (Default: true)
		initialState : 'default' // Options - 'expand' (fully expanded), 'collapse' (fully collapsed) or default
												});
});
*/
</script>
<title>Collapsible Checkbox Tree jQuery Plugin</title>
</head>
<body>
<h1>Collapsible Checkbox Tree jQuery Plugin</h1>
<p>Project home: <a href="http://www.redcarrot.co.uk/2009/11/11/collapsible-checkbox-tree-jquery-plugin/">http://www.redcarrot.co.uk/2009/11/11/collapsible-checkbox-tree-jquery-plugin/</a></p>
<form action="" method="post">
  <ul id="example">
    <li>
      <input type="checkbox" name="" />
      Premier League
      <ul>
        <li>
          <input type="checkbox" name="" checked="checked" />
          Manchester United
          <ul>
            <li>
              <input type="checkbox" name="" />
              Ryan Giggs</li>
            <li>
              <input type="checkbox" name="" />
              Paul Scholes</li>
            <li>
              <input type="checkbox" name="" />
              Wayne Rooney</li>
          </ul>
        </li>
        <li>
          <input type="checkbox" name="" />
          Chelsea
          <ul>
            <li>
              <input type="checkbox" name="" />
              Joe Cole</li>
            <li>
              <input type="checkbox" name="" />
              Frank Lampard</li>
            <li>
              <input type="checkbox" name="" />
              Didier Drogba</li>
            <li>
              <input type="checkbox" name="" />
              John Terry</li>
          </ul>
        </li>
        <li>
          <input type="checkbox" name="" />
          Liverpool
          <ul>
            <li>
              <input type="checkbox" name="" />
              Fernando Torres</li>
            <li>
              <input type="checkbox" name="" />
              Steven Gerrard</li>
          </ul>
        </li>
      </ul>
    </li>
    <li>
      <input type="checkbox" name="" />
      Drinks
      <ul>
        <li>
          <input type="checkbox" name="" />
          Hot
          <ul>
            <li>
              <input type="checkbox" name="" />
              Tea</li>
            <li>
              <input type="checkbox" name="" />
              Coffee</li>
          </ul>
        </li>
        <li>
          <input type="checkbox" name="" />
          Cold
          <ul>
            <li>
              <input type="checkbox" name="" />
              Fruit Juice
              <ul>
                <li>
                  <input type="checkbox" name="" />
                  Orange</li>
                <li>
                  <input type="checkbox" name="" />
                  Apple</li>
                <li>
                  <input type="checkbox" name="" />
                  Pineapple </li>
              </ul>
            </li>
            <li>
              <input type="checkbox" name="" />
              Carbonated
              <ul>
                <li>
                  <input type="checkbox" name="" />
                  Cola</li>
                <li>
                  <input type="checkbox" name="" />
                  Sprite</li>
              </ul>
            </li>
            <li>
              <input type="checkbox" name="" checked="checked" />
              Alcoholic
              <ul>
                <li>
                  <input type="checkbox" name="" />
                  Jack Daniels</li>
                <li>
                  <input type="checkbox" name="" />
                  Lager</li>
                <li>
                  <input type="checkbox" name="" />
                  Wine
                  <ul>
                    <li>
                      <input type="checkbox" name="" />
                      Red</li>
                    <li>
                      <input type="checkbox" name="" />
                      White</li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
    </li>
    <li>
      <input type="checkbox" name="" />
      Gadgets
      <ul>
        <li>
          <input type="checkbox" name="" />
          MP3 Players
          <ul>
            <li>
              <input type="checkbox" name="" />
              iPod
              <ul>
                <li>
                  <input type="checkbox" name="" />
                  Classic</li>
                <li>
                  <input type="checkbox" name="" />
                  Nano</li>
                <li>
                  <input type="checkbox" name="" />
                  Touch</li>
              </ul>
            </li>
            <li>
              <input type="checkbox" name="" />
              Zune
              <ul>
                <li>
                  <input type="checkbox" name="" />
                  80</li>
                <li>
                  <input type="checkbox" name="" />
                  120</li>
                <li>
                  <input type="checkbox" name="" />
                  HD</li>
              </ul>
            </li>
          </ul>
        </li>
        <li>
          <input type="checkbox" name="" />
          Mobile Phones
          <ul>
            <li>
              <input type="checkbox" name="" />
              iPhone
              <ul>
                <li>
                  <input type="checkbox" name="" />
                  First Generation</li>
                <li>
                  <input type="checkbox" name="" />
                  3G</li>
                <li>
                  <input type="checkbox" name="" />
                  3GS</li>
              </ul>
            </li>
            <li>
              <input type="checkbox" name="" />
              Nokia
              <ul>
                <li>
                  <input type="checkbox" name="" />
                  N95</li>
                <li>
                  <input type="checkbox" name="" />
                  N97</li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
    </li>
    <li>
      <input type="checkbox" name="" checked="checked" />
      Cars
      <ul>
        <li>
          <input type="checkbox" name="" />
          Ferrari</li>
        <li>
          <input type="checkbox" name="" />
          Porsche</li>
        <li>
          <input type="checkbox" name="" />
          Rolls-Royce</li>
        <li>
          <input type="checkbox" name="" />
          Ford</li>
      </ul>
    </li>
  </ul>
</form>
</body>
</html>