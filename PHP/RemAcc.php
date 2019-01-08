<?php
  session_start();
  $username=$_SESSION['username'];
  include 'Connection.php';
?>
<!DOCTYPE html>
  <html>
    <body>
      <h3>
        <div>
          <div style="padding:10px;">
            <center>
              Are You Sure?
            </center>
          </div>
          <center style="padding:10px;">
            <form method="POST">
              <input type="submit" name="submit" value="Yes">
              <input type="submit" name="redirect" value="No">
            </form>
          </center>
        </div>
        <?php
          if(isset($_POST['submit']))
          {
              $sql="DELETE FROM `register` WHERE `Username`='".$_SESSION['username']."'";
              $result=mysqli_query($conn,$sql);
              header("refresh:1,url=Logout.php");
          }
          if(isset($_POST['redirect']))
          {
            header("refresh:1,url=Logout.php");
          }
        ?>
        <br>
      </h3>
    </body>
  </html>
