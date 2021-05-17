<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Reg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<nav>
        <label class = "lol">
            <i class="fas fa-plane"></i>
        </label>
        <ul> <li><a href="aboutus.php">ABOUT US</a></li>
            <li><a href="home.php">Search Flight</a></li>
            <li><a href="userlog.php">User login</a></li>
            <li><a href="adminlog.php">AdminLogin</a></li>
        </ul>
        <div class="socialtop">
            <div class="top-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
            </div>
        </div>
    </nav>






<div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="Reg.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Firstname</span>
            <input type="text" name="fname" placeholder="Enter your First name" required>
          </div>
          <div class="input-box">
            <span class="details">Lastname</span>
            <input type="text" name="lname" placeholder="Enter your Last name" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Passport Id</span>
            <input type="text" name="passid" placeholder="Enter your PassportID" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your password" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>

<?php
require_once('DBconnect.php');
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['passid'])){
    $f = $_POST['fname'];
    $l = $_POST['lname'];
    $e = $_POST['email'];
    $pi = $_POST['passid'];
    $ph = $_POST['phone'];
    $ps= $_POST['password'];

    $sql = "INSERT INTO users VALUES ('$f','$l','$ph','$pi','$ps','$e' ) ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn)) {
      header('location:userlog.php');
        
    }
    
    else{
        echo "failed";
    }
}

?>