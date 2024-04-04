<?php
// creating autoloader function 
// to autoload the class
function autoload($className) {
	$file = str_replace('\\', '/', $className) . '.php';
	// checks for the file name/ class name to load
	require $file;
	// load that class
}
spl_autoload_register('autoload');
// registring the autoloader
?>