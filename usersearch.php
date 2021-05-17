<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="home.css">
    <title>Airline ReservationS</title>
</head>
<body>
    <nav>
        <label class = "lol">
            <i class="fas fa-plane"></i>
        </label>
        <ul><li><a href="aboutus.php">ABOUT US</a></li>
            <li><a href="user.php">MY HOME</a></li>
            <!--<li><a href="#">Flight</a></li>
            <li><a href="adminlog.php">AdminLogin</a></li>-->
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




<div class="container-fluid" id="header">
            <div class="row align-items-center">
              <h1 class="pad">
                 Welcome to Corona Safety Reservation System
              </h1>
            <h5><p>We provide service in Chittagong,Dhaka,Rajshahi,Rangpur,Sylhet.If you think of your safety then grab our special seat service fast!</p></h6><br><br>
                <div class="col-md-5">
                    <div class="container">
                    <form action="userflight.php" class="form_design"method="post">
            <input type="text" class="form-control" name="from" placeholder="From" required><br>
            <input type="text" class="form-control" name="to" placeholder="To" required><br>
            <fieldset>
                                <label for="departure">Departure date:</label>
                                <input name="deparure" type="date" class="form-control date" id="deparure" placeholder="Select date..." >
                            </fieldset><br>
                            <fieldset>
                                <label for="departure">Return date:</label>
                                <input name="deparure" type="date" class="form-control date" id="deparure" placeholder="Select date..." >
                            </fieldset><br>
          <input type="submit" class="btn btn-info"  value="Search">  
                    </form>
                </div>
              </div>


</body>
</html>