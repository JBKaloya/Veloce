<?php
require_once("lib/utils.php");
require_once("config/config.php");


if ($_GET["i"] == 1) {
	function createSalt() {
		$chars = "234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$i = 0;
		$salt = "";
		while ($i <= 256) {
			$salt .= $chars{mt_rand(0,strlen($chars))};
			$i++;
		}
		return $salt;
	}
	function createUpdateKey() {
		$chars = "234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$i = 0;
		$salt = "";
		while ($i <= 40) {
			$salt .= $chars{mt_rand(0,strlen($chars))};
			$i++;
		}
		return $salt;
	}

	file_put_contents("config/config.php", str_replace("MmCdwKkpfm62Y4GnZx6RSj9tAGejXkXxLLDD2HaiwkY9iFR3hfFdSLbz2MP2ftbhqgc85vxTUVSJDabbT4M6eN5DFbBmYgBQXyK6kBYWfvrsSaDyivek9VpFTTwzx8cB2y6Hqy3DuKnCSxR3zT7QVqt4yK76G4NkiY4aHHKp7c5abGjjLrYh4NCYykiN79fQ3hyjCKtoboFqttYPHJAkkG972YRKtQmuyvupUQJi85Bg4JvBxhdNGixKTtzra3jH", createSalt(), file_get_contents("config/config.php")));
	file_put_contents("config/config.php", str_replace("GejXkXxLLDD2HaiwkY9iFR3hfFdSLb", createUpdateKey(), file_get_contents("config/config.php")));
	if(substr_count($_SERVER['SERVER_SOFTWARE'], "lighttpd") > 0)
		Error("You're using lighttpd !", 'Please past this code into your lighttpd.conf<br /><br />url.rewrite-once = ( "^(.*)\.php$" => "veloce.php" )<br />server.error-handler-404 = "/veloce.php"<br />server.error-handler-500 = "/veloce.php"<br />server.error-handler-502 = "/veloce.php"<br />server.error-handler-400 = "/veloce.php"<br />server.error-handler-401 = "/veloce.php"<br />server.error-handler-403 = "/veloce.php"</br>server.dir-listing = "disable"');
	elseif(ubstr_count($_SERVER['SERVER_SOFTWARE'], "apache") > 0)
		if ($paths["root"])
		    file_put_contents(".htaccess", str_replace("{PATH}", "", file_get_contents("temp.htaccess")));
		else
		    file_put_contents(".htaccess", str_replace("{PATH}", $paths["AppFolder"], file_get_contents("temp.htaccess")));
	else
		Error('Web Server not supported', "It seems that your Web server software is not supported by Veloce");
	Error("Installation done", "Please delete install.php");
	unlink("temp.htaccess");
} else {
	Error("Hello, welcome to Veloce !", "Before installing, please configure the framework in the config folder, this setup will also generate a new random salt key and a new random update key, when you are ready press here: <br /><br /><a href='?i=1' class='button big'>Install</a>");
}
?>