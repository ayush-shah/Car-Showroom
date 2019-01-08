<?php
$dbhost = 'localhost';  
$dbuser = 'root';
$dbpass = '';
$dbname = 'car';
	// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn)
	{
		die("Connection failed: " . $mysqli_connect_error);
	}      
?>