<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userlog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head>
  <body>
    
  <nav>
        <label class = "lol">
            <i class="fas fa-plane"></i>
        </label>
        <ul>
        <li><a href="aboutus.php">ABOUT US</a></li>
            <li><a href="home.php">SEARCH FLIGHT</a></li>
            <!--<li><a href="#">Flight</a></li>-->
            <li><a href="userlog.php">USER Login</a></li>
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
      <div class="wrapper">
        <div class="title"><span>Admin Login</span></div>
        <form action="adminlog.php" method="post">
          <div>
        <div class="row">
            <input type="text" name="email" placeholder="User Name" required>
          </div>
            <div class="row">
            <input type="password" name="passp" placeholder="Password" required>
          </div>
          <div class="row button">
            <input type="submit" value="Login">
          </div>
        <div>
          </form>
      </div>
    </div>
  </body>
</html>

<?php
require_once('DBconnect.php');
if (isset($_POST['email']) && isset($_POST['passp'])){
    $e = $_POST['email'];
    $p = $_POST['passp'];
    $sql = "SELECT * FROM administrator WHERE username ='$e' AND pass='$p' ";

    if (mysqli_query($conn, $sql)) {
      $result = mysqli_query($conn, $sql);
      $user_info=mysqli_fetch_assoc($result);
        if($user_info){
          header('location:admin.php');
                //session_start();
                //$_SESSION['email'] = $user_info['email'];
                //$_SESSION['passp'] = $admin_info['pass'];
            }
            else{
              echo "Password or Username is incorrect";
          }

          }
    
}

?>