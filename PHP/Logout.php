<?php
session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();
header("refresh:2,../index.php");
echo "<html><link rel='shortcut icon' type='image/x-icon' href='../Icon/favicon.ico' />";
echo "<body><h1><center>Logging Out</center></h1></body></html>";
?>
