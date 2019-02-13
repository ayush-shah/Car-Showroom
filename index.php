<?php
include 'PHP/Connection.php';
?>
<!DOCTYPE html>
  <html>
    <head>
      <title>
      Car Showroom
      </title>
      <script src="JS/main.js">
      </script>
      <link rel="stylesheet" href="CSS/main.css">
      <link rel="shortcut icon" type="image/x-icon" href="Icon/favicon.ico" />
    </head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <body onload="loader()">
      <div id="loader" class="backgroundimg">
      </div>
      <div id="head1" >
          <header>
            <div style="text-align:center;">
              <img src="Icon/logo.png" alt="logo">
            </div>
          </header>
          <nav>
              <div id="staticnav">
                <a class="navlink" onclick="openSec(event,'Home')">Home</a>
                <a class="navlink" onclick="openSec(event,'Login')">Login</a>
                <a class="navlink" onclick="openSec(event,'Register')">Register</a>
                <a class="navlink" onclick="openSec(event,'ContactUs')">Contact Us</a>
              </div>
          </nav>
          <section id="change">
            <div id="Home" class="contentSec" style="display:block;">
              <?php
                $i=0;
                $result = mysqli_query($conn, "SELECT * FROM c_details");
                  while ($row = mysqli_fetch_array($result))
                  {
                    $subid[$i]=$row['Id'];
                    echo "<div id='parallax' style='min-height:500px;background-image:url(Images/".$row['Image'].");'>";
                    echo "<a onClick=openSec(event,'".$subid[$i]."')>";
                    echo "<p>Name = ".$row['Name']."<br>Price = $".$row['Price']."<br>Stock=".$row['Stock']."</p>";
                    echo "</a></div>";
                    $i++;
                  }
              ?>
            </div>
            <div id="ContactUs" class="contentSec">
              <div class="container">
                <?php
                  if(isset($_POST['submit']))
                  {
                    mail("aayushkavya@gmail.com","Form submission",$_POST['message'],"FROM:".$_POST['email']);
                    mail("FROM:".$_POST['email'],"Copy of your form submission",$_POST['message'],"aayushkavya@gmail.com"); // sends a copy of the message to the sender
                    echo "Mail Sent. Thank you, we will contact you shortly.";
                  }
                ?>
                <form method="post">
                  First Name: <input type="text" name="first_name"><br>
                  Last Name: <input type="text" name="last_name"><br>
                  Email: <input type="text" name="email"><br>
                  Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
                  <button type="submit" name="submit" value="Submit">Submit</button>
                </form>
              </div>
            </div>
            <div id="Login" class="contentSec">
              <div class="container">
                <form action="PHP/Login.php" method="POST">
                  <label for="uname"><b>Username</b></label>
                  <input type="text" placeholder="Enter Username" name="uname" required>
                  <label for="psw"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="psw" required>
                  <button type="submit">Login</button>
                  <br>
                </form>
              </div>
            </div>
            <div id="Register" class="contentSec container" style="padding:16px;">
              <form action="PHP/Register.php" method="POST">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required><br>
                <label for="password"><b>Password</b></label><br>
                <input type="password" placeholder="Enter Password" name="password"  required><br>
                <label for="mobile"><b>Mobile Number</b></label>
                <input type="text" placeholder="Enter Number" name="mobile" required>
                <button type="submit">Register</button>
              </form>
            </div>
            <?php
            for($i=0;$i<count($subid);$i++)
            {
              echo "<div id='".$subid[$i]."' class='contentSec')>";
              $result1 = mysqli_query($conn, "SELECT * FROM `c_details` WHERE `Id`=".$subid[$i]."");
              $row=mysqli_fetch_array($result1);
              $result2 = mysqli_query($conn, "SELECT `img_name` FROM `subimages` WHERE `Id`=".$subid[$i]."");
              while($row2 = mysqli_fetch_array($result2))
              {
                echo "<div id='parallax' style='width:100%;background-image:url(Images/".$row2['img_name'].");'></div>";
              }
              echo "</div>";
            }
            ?>
          </section>
          <footer>

          </footer>
      </div>
    </body>
  </html>
