<?php

	defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
	define('SITE_ROOT', DS . 'Applications' . DS . 'XAMPP'. DS . 'xamppfiles' . DS . 'htdocs' . DS . 'oop_php' . DS . 'gallery');
	defined ('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS . 'includes');


    require_once("functions.php");
    require_once("config.php");
    require_once("database.php");
    require_once("db_helper.php");
    require_once("user.php");
    require_once("photo.php");
    require_once("session.php");

?>