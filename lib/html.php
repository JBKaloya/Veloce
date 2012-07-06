<?php
class html {


	public function css($link) {
		echo '<link rel="stylesheet" href="'.$link.'" type="text/css" />', PHP_EOL;
	}

	public function javascript($link) {
		echo '<script type="text/javascript" src="'.$link.'"></script>', PHP_EOL;
	}

	public function meta($name, $content) {
		echo '<meta name="'.$name.'" content="'.$content.'" />', PHP_EOL;
	}

	public function ieHtml5() {
		echo '<!--[if lt IE 9]>', PHP_EOL;
     	echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>', PHP_EOL;
    	echo '<![endif]-->', PHP_EOL;
	}

	public function title($name) {
		echo '<title>'.$name.'</title>', PHP_EOL;
	}

	public function img($link, $alt="") {
		echo '<img src="'.$link.'" alt="'.$alt.'" />', PHP_EOL;
	}

	public function a($link, $label, $target="") {
		echo '<a href="'.$link.'" target="'.$target.'">'.$label.'</a>', PHP_EOL;
	}

	public function form($action, $type="POST", $id="", $name="") {
		echo '<form action="'.$action.'" method="'.$type.'" id="'.$id.'" name="'.$name.'">', PHP_EOL;		
	}

	public function input($type, $name, $value="", $id="") {
		echo '<input type="'.$type.'" name="'.$name.'" id="'.$id.'" value="'.$value.'">', PHP_EOL;
	}

	public function formEnd($value) {
		echo '<input type="submit" value="'.$value.'" name="submit" id="submit">', PHP_EOL;
		echo '</form>';
	}

	public function ga($ua) {
		echo '<script type="text/javascript">', PHP_EOL;

		echo "
			  var _gaq = _gaq || [];
			  _gaq.push(['_setAccount', '".$ua."']);
			  _gaq.push(['_trackPageview']);

			  (function() {
			    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			  })();", PHP_EOL;

		echo '</script>', PHP_EOL;
	}

	public function jquery() {
		echo '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>', PHP_EOL;
	}

	public function jqueryUI() {
		echo '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>', PHP_EOL;
	}

	public function prototype() {
		echo '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js"></script>', PHP_EOL;
	}

	public function lorem($p) {
		echo file_get_contents("http://loripsum.net/api/".$p);
	}

}


?>