<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <section class="first">
        <div class="topnav">
    <a href="aboutus.php">ABOUT US</a>
    <a href="home.php">LOGOUT</a>
    <a href="ticket.php">BOOKED</a>
    <a class="active" href="adminsearch.php">SEARCH FLIGHT</a>
    
    <form action="adminflight.php" method="post">
    <input class="form-control" type=text name="id" placeholder="Q Search by ID">
    <input type="submit" value="Search" name="btn" class="btn btn-warning">
    </form>
        </div>
    
    <div class="inside">
        <div class="container">
            <table class="table l">
                <thead>
                  <tr>
                    <th scope="col">Aircraft ID</th>
                    <th scope="col">Aircraft Name</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                  </tr>
                </thead>
                <?php
                 require_once('DBconnect.php');
                 $query="SELECT * FROM flight"; 
                 $read= mysqli_query($conn,$query);
                 if($read->num_rows>0){
                   while($rd=mysqli_fetch_assoc($read)){
                     $id=$rd['AircraftID'];
                     $name=$rd['AircraftName'];
                     $from=$rd['Fromm'];
                     $to=$rd['Tom'];
                ?>
                <tbody>
                  <tr>
                
                    <td><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $from; ?></td>
                    <td><?php echo $to; ?></td>
                    <td><a href="admin.php?update=<?php echo $id; ?>" class="btn btn-success" action="admin.php">Update</a></td>
                    <td><a href="admin.php?delete=<?php echo $id; ?>" class="btn btn-danger" action="admin.php">Delete</a></td>
                    
                  </tr>
                  <?php }}
                 //header('location:admin.php'); ?>
                </tbody>
              </table>
            <form action="" method="post" class="d-flex">
                <input class="form-control" type="text" name="id" placeholder="Add Airplane Id">
                <input class="form-control" type="text" name="name" placeholder="Add Airplane name">
                <input class="form-control" type="text" name="from" placeholder="Add Airplane From">
                <input class="form-control" type="text" name="destination" placeholder="Add Airplane Destination">
                <input type="submit" value="Add" name="btn" class="btn btn-info" action="admin.php">
            </form><br>
            <form action="" method="post" class="d-flex">
                <?php
                  require_once('DBconnect.php');
                  if(isset($_GET['update'])){
                     $id=$_GET['update'];
                     $sql="SELECT * FROM flight WHERE AircraftID={$id}";
                     $getdata=mysqli_query($conn,$sql);
                     while($rx=mysqli_fetch_assoc($getdata)){
                      $id=$rx['AircraftID'];
                      $name=$rx['AircraftName'];
                      $from=$rx['Fromm'];
                ?>
                 
                <input class="form-control" type="text" name="name" placeholder="Update Airplane name">
                <input class="form-control" type="text" name="from" placeholder="Update Airplane From">
                <input class="form-control" type="text" name="destination" placeholder="Update Airplane Destination">
                <input type="submit" value="Update" name="update-btn" class="btn btn-info" action="admin.php">
                <?php
                     }}
                ?>

                <?php
                   require_once('DBconnect.php');
                   if(isset($_POST['update-btn'])){
                    //$f = $_POST['id'];
                    $l = $_POST['name'];
                    $e = $_POST['from'];
                    $pi = $_POST['destination'];
                    $sql="UPDATE flight SET AircraftName='$l',Fromm='$e',Tom='$pi' WHERE AircraftID='$id' ";
                    $updatesql=mysqli_query($conn,$sql);
                    if($updatesql){
                      echo "data updated";
                      header('location:admin.php');
                    }
                   }
                ?>
            </form>
        </div>
    </div>
    </section>
</body>
</html>

<?php
require_once('DBconnect.php');
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['from']) && isset($_POST['destination'])){
    $f = $_POST['id'];
    $l = $_POST['name'];
    $e = $_POST['from'];
    $pi = $_POST['destination'];
    $sql = "INSERT INTO flight VALUES ('$f','$l','$e','$pi') ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn)) {
        //echo "success";
        header('location:admin.php');

    }
    else{
        echo "failed";
    }
}
?>
<?php
require_once('DBconnect.php');
if(isset($_GET['delete'])){
  $id= $_GET['delete'];
  $sql="DELETE FROM flight WHERE AircraftID={$id}";
  $deletesql=mysqli_query($conn,$sql);
  if($deletesql){
    header('location:admin.php');
    exit("");
  }
  else{
    //echo "failed";
  }
}
?>


