<?php
include 'Connection.php';
$uname=$_POST['uname'];
$password=$_POST["password"];
$mob=$_POST["mobile"];
// Check connection
$sql="Insert into register values('id','$uname','$password','$mob');";
if(mysqli_query($conn, $sql)){
       	header( "refresh:2;url=../index.php" );
       	 echo "Registered successfully.";

    } else{
        header( "refresh:2;url=../index.php" );
       	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

?>
