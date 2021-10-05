<?php


ini_set("display_errors", 1);
error_reporting(E_ALL);


	//  Database connections 
	$servername = "lochnagar.abertay.ac.uk";
	$username = "sql1900040";
	$password = "EVUrsMKYpvIn";
	$dbname = $username;
	$conn = mysqli_connect($servername, $username, $password, $dbname) ;

function console_log($output, $with_script_tags = true)
{
	$js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
		');';
	if ($with_script_tags) {
		$js_code = '<script>' . $js_code . '</script>';
	}
	echo $js_code;
}

?>

