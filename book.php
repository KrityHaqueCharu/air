<?php
require_once('DBconnect.php');
session_start();
$id=$_SESSION['AircraftID'];
$name=$_SESSION['AircraftName'];
if (isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['credit']) && isset($_POST['seat'])&& isset($_POST['bdate'])){
    $f = $_POST['pass'];
    $l = $_POST['email'];
    $ph = $_POST['seat'];
    //$e = $_POST['email'];
    $pi = $_POST['credit'];
    $e = $ph*1000;
    //$e = $_POST['email'];
    $ps= "Booked";
    $bdate=$_POST['bdate'];
    $sql = "INSERT INTO ticket VALUES ('$f','$l','$pi','$e','$id','$name','$ph','$ps','$bdate')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn)) {
      header('location:success.php');
    }
    else{
        echo "failed";
    }
}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="book.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<nav>
        <label class = "lol">
            <i class="fas fa-plane"></i>
        </label>
        <ul>
        <li><a href="aboutus.php">ABOUT US</a></li>
            <li><a href="home.php">LOGOUT</a></li>
            <li><a href="usersearch.php">Flight</a></li>
            <li><a href="user.php">home</a></li>
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
    <div class="title">Book Your Flight</div>
    <div class="content">
      <form action="book.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Passport No</span>
            <input type="text" name="pass" placeholder="Enter your passportId" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Credit No</span>
            <input type="text" name="credit" placeholder="Enter your Credit No" required>
          </div>
          <div class="input-box">
            <span class="details">Seat Number</span>
            <input type="text" name="seat" placeholder="Enter your seat number" required>
          </div>
          <div class="input-box">
            <span class="details">Booking Date</span>
            <input type="date" name="bdate" placeholder="Enter todays date" required>
          </div>
          <div class="input-box">
            <span class="details">Price</span>
            <p>Your total price <?php $e ?></p>
          </div>
          
          
          
        </div>
        <div class="button">
          <input type="submit" value="Book">
        </div>
      </form>
    </div>
  </div>

</body>
</html>

