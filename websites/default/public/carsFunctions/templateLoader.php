<?php
// to call file to load in index page
function loadTemplate($file,$templateVariables){
    // It creates the variable having same name as the key of $templateVariables array
    extract($templateVariables);
    // to store the content in buffer
    ob_start();
    require $file;
    // storing the content of file as string in contents variable
    $contents = ob_get_clean();
    // returning content
    return $contents;
}   

// function showing opening time in summer
function summerOpenTime (){
	echo '<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: 10:00-16:00</p> ';
			
}
// functions to show opening times and hours in winter
function winterOpenTime (){
	echo '<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: Closed</p> ';
			
}


?>