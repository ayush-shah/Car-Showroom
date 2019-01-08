<?php
session_start();
include 'Connection.php';
$username=$_SESSION['username'];
$psw=$_SESSION['psw'];
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../CSS/secondary.css">
<form method="POST">
<input type="textbox" placeholder="New Password" name="textbox">
<input type="submit" name="submit" onclick="Logout.php"></form>
<?php
if(isset($_POST['submit'])){
    $newpass=$_POST['textbox'];
	$sql="UPDATE `register` SET `Password`='$newpass' WHERE username='$username'";
	$result=mysqli_query($conn,$sql);
    echo "<script>window.location='Logout.php'</script>";
    
}
echo "Username=".$username;
echo "<br>";
echo "Password=".$psw;
?>
</html>
