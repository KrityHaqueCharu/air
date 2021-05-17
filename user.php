<?php
require_once('DBconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="new.css">
    <title>Document</title>
    <style>
      h1{
        text-align:center;
        color:#fff;
      }
      .s1{
        padding: 10px;
        margin-top:30px;
      }
      .userd{
        margin-top:35px;
      }
    </style>
</head>
<body>
<nav>
        <label class = "lol">
            <i class="fas fa-plane"></i>
        </label>
        <ul><li><a href="aboutus.php">ABOUT US</a></li>
            <li><a href="usersearch.php">Flight Search</a></li>
            <li><a href="logout.php">Logout</a></li>
            <!--<li><a href="#">AdminLogin</a></li>-->
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

    <h1><u>My Home</u></h1>
    <div class="container s1">
    <div class="container-fluid row align-items-center">
    <?php
                 require_once('DBconnect.php');
                 session_start();
$usermail=$_SESSION['email'];
$query="SELECT * FROM users WHERE email= '$usermail' ";
    $read= mysqli_query($conn,$query);
    $count=mysqli_num_rows($read);

    if ($count != 0) {
        while($rd=mysqli_fetch_array($read)){
        $credit=$rd[0];
        $total= $rd[1];
        $id= $rd[2];
        $name= $rd[3];
        $seat= $rd[5];
    ?>
                 <table class="table-dark">
                <tbody>
    <tr><th scope="row">First Name</th>
        <td><?php echo $credit; ?></td></tr>
       
    <tr><th scope="row">Last Name</th>
      <th><?php echo $total; ?></th></tr>

      <tr><th scope="row">Phone</th>
      <td><?php echo $id; ?></td><tr>

      <tr><th scope="row">Passport number</th>
      <td><?php echo $name; ?></td></tr>

      <tr><th scope="row">Email</th>
        <td><?php echo $seat; ?></td><tr>
    
      <?php }} ?>
  </tbody>
  </table>

<?php
require_once('DBconnect.php');
$usermail=$_SESSION['email'];
$query="SELECT * FROM ticket WHERE email= '$usermail' ORDER BY booking_date DESC";
    $read= mysqli_query($conn,$query);
    $count=mysqli_num_rows($read);

    if ($count != 0) {
        while($rd=mysqli_fetch_array($read)){
        $credit=$rd[2];
        $total= $rd[3];
        $id= $rd[4];
        $name= $rd[5];
        $seat= $rd[6];
        $stat= $rd[7];
        $bdate=$rd[8];

                ?>
                <div class="container userd"> <table class="table table-dark">
                 <thead>
    <tr>
      <th scope="col">CREDIT CARD</th>
      <th scope="col">PAYMENT AMOUNT</th>
      <th scope="col">AIRCRAFT ID</th>
      <th scope="col">AIRCRAFT NAME</th>
      <th scope="col">SEAT</th>
      <th scope="col">DATE</th>
      <th scope="col">STATUS</th>
      
    </tr>
  </thead>
    <tbody>
    <tr>
        <td><?php echo $credit; ?></td>
        <th><?php echo $total; ?></th>
        <td><?php echo $id; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $seat; ?></td>
        <td><?php echo $bdate; ?></td>
        <td><?php if($stat=='Booked'){ echo $stat ?> <td><a href="user.php?delete=<?php echo $credit;  ?>" onclick="alertt()" class="btn btn-danger">Delete</a></td></td><?php } else{
          echo $stat;}?>
      </tr>
      </tr>
      <?php }} ?>
  </tbody>
  </table>
  </div>
  </div>
  </div>
</body>
<script>
  function alertt() {
  alert("Cancellation will deduct 25% of the ticket charge");
}
</script>
</html>
<?php

require_once('DBconnect.php');
if(isset($_GET['delete'])){
  $status="Cancelled";
  $up=$_GET['delete'];
  $sql="UPDATE ticket SET stat='$status' WHERE credit_no='$up'";
  $deletesql=mysqli_query($conn,$sql);
  if($deletesql){
    echo "Done";
  }
  else{
    echo "failed";
}}
?>