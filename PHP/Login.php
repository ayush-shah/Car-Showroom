<?php
include 'Connection.php';
session_start();
$uname=$_POST['uname'];
$_SESSION['username']=$uname;
$password=$_POST["psw"];
$_SESSION['psw']=$password;
// Check connection
$sql = "SELECT id FROM register WHERE Username = '$uname' and password = '$password'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
$sql = "SELECT Type FROM register WHERE Username = '$uname' and password = '$password'";
$result= mysqli_query($conn,$sql);
if($count)
{
header( "refresh:0;url=StaffLogin.php" );
}
else
{
	header("refresh:2;url=../index.php");
	echo "User not found,<br>Lets Go Back To Main Page...<br>VROOOOOOOOOOOOOOOOOM";
}
?>
