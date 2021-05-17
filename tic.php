<?php
  $conn = mysqli_connect('localhost','root','','airlinemanagement');
  if(isset($_POST['btn'])){
      $pass_num = $_POST['pass_num'];
      $email = $_POST['email'];
      $credit_no = $_POST['credit_no'];
      $payment_amo = $_POST['payment_amo'];
      $aircraft_id = $_POST['aircraft_id'];
      $aircraft_name = $_POST['aircraft_name'];
      $seat_nums = $_POST['seat_nums'];
      $stat = $_POST['stat'];

      if(!empty($pass_num) && !empty($email) && !empty($credit_no) && !empty($payment_amo) && !empty($aircraft_id) && !empty($aircraft_name) && !empty($seat_nums) && !empty($stat)){
          $query = "INSERT INTO ticket(pass_num,email,credit_no,payment_amo,aircraft_id,aircraft_name,seat_nums,stat) VALUE($pass_num,'$email','$credit_no',$payment_amo,'$aircraft_id','$aircraft_name',$seat_nums,'$stat')";
          $createquery = mysqli_query($conn, $query);
          if($createquery){
              echo "YOUR DATA SUBMITTED SUCCESSFULLY";
          }
      }
      else{
          echo "Field should not be empty";
      }
    
  }
  

?>




<?php 
     if(isset($_GET['delete'])){
        $pass_num = $_GET['delete'];
        $query = "DELETE FROM ticket WHERE pass_num={$pass_num}";
        $deletequery= mysqli_query($conn, $query);
        if($deletequery){
        echo "TICKET IS DELETED" ;
     }
    }
?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>airline</title>
  </head>
  <body>
    <div class="container shadow m-5 p-3">
    
    <form action="" method="post" class="d-flex justify-content-around">
    <input class="form-control" type="number" name="pass_num" placeholder="passport">
    <input class="form-control" type="text" name="email" placeholder="email id">
    <input class="form-control" type="text" name="credit_no" placeholder="credit number">
    <input class="form-control" type="number" name="payment_amo" placeholder="payment">
    <input class="form-control" type="text" name="aircraft_id" placeholder="air id">
    <input class="form-control" type="text" name="aircraft_name" placeholder="airlines">
    <input class="form-control" type="number" name="seat_nums" placeholder="seat">
    <input class="form-control" type="text" name="stat" placeholder="status">
    <input type="submit" value="add" name="btn" class="btn btn-success"> 
    
    
    </form>
    
    
    
    </div>




    <div class="container">
      <table class="table table-bordered">
      <tr>
      <th>PASSPORT</th>
      <th>EMAIL</th>
      <th>CREDIT NO</th>
      <th>PAYMENT</th>
      <th>AIRCRAFT ID</th>
      <th>AIRLINES</th>
      <th>SEATS</th>
      <th>STATUS</th>
      <th></th>
      
      </tr>
<?php  

    $query = "SELECT * FROM ticket";
    $readquery = mysqli_query($conn, $query);
    if($readquery->num_rows >0){
        while($rd=mysqli_fetch_assoc($readquery)){
            $pass_num = $rd['pass_num'];
            $email = $rd['email'];
            $credit_no = $rd['credit_no'];
            $payment_amo = $rd['payment_amo'];
            $aircraft_id = $rd['aircraft_id'];
            $aircraft_name = $rd['aircraft_name'];
            $seat_nums = $rd['seat_nums'];
            $stat = $rd['stat'];
        
?>
      
      <tr>
      <td> <?php  echo $pass_num;  ?> </td>
      <td> <?php  echo $email;  ?></td>
      <td> <?php  echo $credit_no;  ?></td>
      <td> <?php  echo $payment_amo;  ?></td>
      <td> <?php  echo $aircraft_id;  ?></td>
      <td> <?php  echo $aircraft_name;  ?></td>
      <td> <?php  echo $seat_nums;  ?></td>
      <td><?php if($stat=='Booked'){ echo $stat ?> <td><a href="tic.php?update=<?php echo $pass_num;?>" name="update" class="btn btn-danger">Delete</a></td></td><?php }?>
      </tr>

        <?php  }} else{
            echo "No Data To Show";
        }  ?>

      </table>
    
    </div>

    
  </body>
</html>
<?php

require_once('DBconnect.php');
if(isset($_GET['update'])){
  $status="Cancelled";
  $up=$_GET['update'];
  $sql="UPDATE ticket SET stat='$status' WHERE pass_num={$up}";
  $deletesql=mysqli_query($conn,$sql);
  if($deletesql){
    echo "Done";
  }
  else{
    echo "failed";
}}
?>