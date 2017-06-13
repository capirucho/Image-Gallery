<?php



// the following is just a safety measure in case a CLASS
// is not initialized
function autoLoadClasses($class) {

	$class = strtolower($class);
	$the_path = "includes/{$class}.php";

	if(is_file($the_path) && !class_exists($class)) {
		include $the_path;
	}


	// if(file_exists($the_path)) {
	// 	require_once($the_path);
	// } else {
	// 	die("This file {$class}.php was not found.");
	// }

}
spl_autoload_register('autoLoadClasses');

function redirectUser($location) {
	header("Location: {$location}");
	exit;
}



?>