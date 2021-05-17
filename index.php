<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
    <section class="first">
        <div class="topnav">
    <a href="admin.php">ADMIN</a>
    <a href="book.php">BOOKED</a>
    <!--<a class="active" href="#home">Home</a>
    <img src="plane.png">-->
        </div>
        <div class="container-fluid" id="header">
            <div class="row align-items-center">
              <h1 class="pad">
                 Welcome to Corona Safety Reservation System
            </h1>
            <h5>We provide service in Chittagong,Dhaka,Rajshahi,Rangpur,Sylhet </h6><br><br>
                <div class="col-md-5">
                    <div class="container">
                    <form action="adminflight.php" class="form_design"method="post">
            <input type="text" class="form-control" name="from" placeholder="From" required><br>
            <input type="text" class="form-control" name="to" placeholder="To" required><br>
          <input type="submit" class="btn btn-info"  value="Search">  
                    </form>
                </div>
              </div>
    </section>
</body>
</html>