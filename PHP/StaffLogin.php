<?php
session_start();
include 'Connection.php';
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="shortcut icon" type="image/x-icon" href="../Icon/favicon.ico" />
<link rel="stylesheet" href="../CSS/secondary.css">
<script src="../JS/Staff.js"></script>
<body>
<div id="staticnav">
<a href=# onClick="openSec(event,'Insert')">Insert </a>
<a href=# onClick="openSec(event,'Update')"> Update </a>
<a href=# onClick="openSec(event,'Delete')"> Delete </a>
<a href="Logout.php" style="float:right;padding-right:10px;">LogOut</a>
<a href=# onClick="openSec(event,'ChangePass')">Change Password</a>
<a href=# onClick="openSec(event,'RemAcc')">Delete Account</a>
</div>
<div class="contentSec" id="Insert" style="display:clear;">
<form action=# method="POST" enctype="multipart/form-data">
<h3>
Car Details :
</h3>
Car Name :  <input type="text" placeholder="Car's Name" name="cname" required><br>
Car's Main Image :<input type="file" placeholder="Car's Image" style="display:inline;" name="image" required><br>
Car's Sub Image :<input type="file" placeholder="Car's Image" style="display:inline;" name="subimage[]" required multiple><br>
Car Price : <input type="number" placeholder="Car's Price" name="price" min="1000" value="1000" max="100000" step="1000" required><br>
Stock : <input type="number" placeholder="Stock" name="stock" value="1" min="1" max="5" required>
<br><input type="submit" name="sub" value="Submit">
</form>
<?php
$result = mysqli_query($conn, "SELECT * FROM c_details");
if (isset($_POST['sub'])) {
  	// Get image name
$image=$_FILES['image']['name'];
$target = "../Images/".basename($image);
$cname=$_POST['cname'];
$price=$_POST['price'];
$stock=$_POST['stock'];
$sql="INSERT INTO `c_details`(`Name`, `Image`, `Price`, `Stock`) VALUES ('$cname','$image','$price','$stock')";
$final=mysqli_query($conn,$sql);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}
  else{
  		$msg = "Failed to upload image";
  	}
	echo $msg;
  $final4=mysqli_query($conn,"SELECT `Id` FROM `c_details` WHERE `Name`='$cname'");
  $id=mysqli_fetch_array($final4);
    for($i=0;$i<count($_FILES['subimage']['name']);$i++)
    {
      $img=$_FILES['subimage']['name'][$i];
      $imgtmp=$_FILES['subimage']['tmp_name'][$i];
      $target1 = "../Images/".basename($img);
      $result3=mysqli_query($conn,"INSERT INTO `subimages`(`Id`, `img_name`) VALUES ($id[0],'$img')");
      if(move_uploaded_file($imgtmp,$target1))
      {
        echo "SubImage uploaded successfully <br>";
      }
    else
    {
        echo  "Failed to upload image <br>";
    }
  }
echo "<meta http-equiv='refresh' content='0'>";
}

?>
</div>
<div class="contentSec" id="Update" style="display:none">
<form method="POST" enctype="multipart/form-data">
<h3>
Car Details :
</h3>
Car Id : <input type="number" placeholder="Car's number" name="cnum" required><br>
Car Name:<input type="text" placeholder="Car's name" name="cname"><br>
Car Image :<input type="file" placeholder="Car's Image" style="display:inline;" name="cimage" required multiple><br>
Car Price : <input type="number" placeholder="Car's Price" name="price" min="1000" value="1000" max="100000"step="1000"><br>
Stock : <input type="number" placeholder="Stock" name="stock" value="1" min="1" max="5"><br>
<input type="submit" name="submit" value="Submit">
</form>
<?php
if(isset($_POST['submit']))
{
$name=$_POST['cname'];
$image=$_FILES['cimage']['name'];
$price=$_POST['price'];
$s1=$_POST['stock'];
$id1=$_POST['cnum'];
// Check connection
$sql="UPDATE `c_details` SET `Name`=\"$name\",`Image`='$image',`Price`='$price',`Stock`='$s1' WHERE `Id`='$id1'";
$res=mysqli_query($conn,$sql);
echo "<meta http-equiv='refresh' content='0'>";
}
?>

</div>
<div class="contentSec" id="Delete" style="display:none">
<form action="#" method="POST">
<h3>
Car Details :
</h3>
Car Id : <input type="number" placeholder="Car's number" name="cnum" required><br>
<input type="submit" name="submi"></form>
<?php
if(isset($_POST['submi'])){
$id1=$_POST['cnum'];
// Check connection
$sql4="DELETE FROM `subimages` WHERE `Id`='$id1'";
$resu4=mysqli_query($conn,$sql4);

$sql="DELETE FROM `c_details` WHERE `Id`='$id1'";
$resu=mysqli_query($conn,$sql);
echo "<meta http-equiv='refresh' content='0'>";}
?>
</div>
<div id="staffimg">
<?php
while ($row = mysqli_fetch_array($result)) {
    echo "<div>";
    echo "<img src='../Images/".$row['Image']."' style=\"height:30%;width:30%;\" width='800' height='600' >";
		echo "<h3 style='float:right;padding-right:100px;'>Name = ".$row['Name']."<br>Price = $".$row['Price']."<br>Id = ".$row['Id']."<br>Stock=".$row['Stock']."</h3>";
		echo "</div>";
}
?>
</div>
<div class="contentSec" id="ChangePass" style="display:none">
  <form method="POST">
  <input type="textbox" placeholder="New Password" name="textbox">
  <input type="submit" name="changepass" onclick="Logout.php">
  </form>
  <?php
  $username=$_SESSION['username'];
  $psw=$_SESSION['psw'];
  if(isset($_POST['changepass'])){
      $newpass=$_POST['textbox'];
  	$sql="UPDATE `register` SET `Password`='$newpass' WHERE username='$username'";
  	$result=mysqli_query($conn,$sql);
      echo "<script>window.location='Logout.php';</script>";
    }
    echo "Username=".$username;
    echo "<br>";
    echo "Password=".$psw;
  ?>
</div>
<div class="contentSec" id="RemAcc" style="display:none">
  <h3>
    <div>
      <div style="padding:10px;">
        <center>
          Are You Sure?
        </center>
      </div>
      <center style="padding:10px;">
        <form method="POST">
          <input type="submit" name="itsayes" value="Yes">
        </form>
      </center>
    </div>
    <?php
      if(isset($_POST['itsayes']))
      {
          $sql="DELETE FROM `register` WHERE `Username`='".$_SESSION['username']."'";
          $result=mysqli_query($conn,$sql);
          echo "<meta http-equiv='refresh' content='0'>";
          echo "<script>window.location='Logout.php';</script>";
      }
    ?>
    <br>
  </h3>
</div>
</body>
</html>
