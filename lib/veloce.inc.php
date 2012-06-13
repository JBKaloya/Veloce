<?php
/*
	Veloce Framework
    Copyright (C) 2012  Pierre Ferran

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

require_once("config/config.php");
require_once("lib/utils.php");
require_once("lib/database.php");
require_once("lib/html.php");
require_once("lib/sessions.php");
require_once("lib/cookie.php");

if (!isset($databaseConf) || empty($databaseConf)) {
	Error("Database config empty", "The database config is empty, please set it in config/config.php");
}

if (strlen($security["salt"]) < 128) {
    Error("Salt key is not long enought", "Please change it in the config/config.php file, and put at least 128 chars.");
} else if($security["salt"] === "MmCdwKkpfm62Y4GnZx6RSj9tAGejXkXxLLDD2HaiwkY9iFR3hfFdSLbz2MP2ftbhqgc85vxTUVSJDabbT4M6eN5DFbBmYgBQXyK6kBYWfvrsSaDyivek9VpFTTwzx8cB2y6Hqy3DuKnCSxR3zT7QVqt4yK76G4NkiY4aHHKp7c5abGjjLrYh4NCYykiN79fQ3hyjCKtoboFqttYPHJAkkG972YRKtQmuyvupUQJi85Bg4JvBxhdNGixKTtzra3jH") {
    Error("Salt key is the default one.", "Please change it in the config/config.php file, and put at least 128 chars.");
}

class Veloce {

    private $security;

	public function __construct($sec) {	
        $this->security = $sec;
	}

    public function hash($str) {
        return base64_encode(sha1( $str . $security["salt"]) . $security["salt"]);
    }

    public function uniqid() {
        return uniqid($security["salt"]);
    }

    public function redirect($url) {
        header("Location: ".$url);
        die();
    }

    public function escape($var) {
        return htmlspecialchars($var);
    } 
}

$veloce = new Veloce($security);

$bdd = new DatabaseCon($databaseConf);

$html = new html();

$session = new Sessions();

$cookie = new Cookie();

?>