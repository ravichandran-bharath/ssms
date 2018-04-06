<?php
if(empty($_GET['startDate']) && empty($_GET['startDate'])){
  header('Location:index.php');
}

require('connection.php');
$allVehicles = array();
$availableVehicles = array();
$notAvailables = array();
$result = $conn->query("select vehicleid from vehicles group by vehiclename");

if ($result) {
    while ($row = $result->fetch_assoc()){
        array_push($allVehicles, $row['vehicleid']);
    }
} 

 
?>
<!DOCTYPE html>
  <html>
    <head>
        <title>Smart Service Management System</title>
      <?php include('header.php');?>
      <style>
        /*Related post at: https://superdevresources.com/zoom-effect-image-css/ */


        .zoom-effect-container {
            width: 140px;
            height: 160px;
            margin: 0 auto;
            overflow: hidden;
        }

        .image-card {
        position: absolute;
        top: 10px;
        left: 50px;

        }

        .image-card img {
        -webkit-transition: 0.4s ease;
        transition: 0.4s ease;
        }

        .zoom-effect-container:hover .image-card img {
        -webkit-transform: scale(1.08);
        transform: scale(1.08);
        }
        body{
          font-family:'Open Sans';
        }
        .navbtn{
          background-color: #000;
          color:#ffffff;
        } 
        .navbtn:hover{
          background-color: #212121;
          color:#9ccc65;
        }

      </style>

      <script>
      $(document).ready(function(){
        $(".button-collapse").sideNav();
      });

      </script>
	  <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">

    </head>

    <body class="grey lighten-3">

     <!-- Navbar goes here -->

      <nav class="col s12 z-depth-5">
        <div class="nav-wrapper black">
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="navbtn" href="home.php">Home</a></li>
            <li><a class="navbtn" href="services.php">Services</a></li>
            <li><a class="navbtn" href="contact.php">Contact us</a></li>
            <li><a class="navbtn" href="logout.php">Logout</a></li>
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <li><a href="home.php">Home</a></li>
            <li><a class="navbtn" href="services.php">Services</a></li>
            <li><a href="contact.php">Contact us</a></li>
            <li><a class="navbtn" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
      <br><br><br>

          <div class="row">
              <div class="col s12">
              <h4 class="center">OUR EXCLUSIVE OFFER PACKAGES FOR YOU..</h4>
                    <?php
                        $startTime = $_GET['startTime'];
                        $startDate = date("Y-m-d",strtotime( str_replace(",","",$_GET['startDate']) ));
                        // $endDate = date("Y-m-d",strtotime( str_replace(",","",$_GET['endDate']) ));
                        // $endTime=$_GET['endTime'];
                        //echo $_GET['startDate'];
                        //echo $startDate;
                    
                        $query = "select vehicleid as vehicleid from vehicles where vehicleid not in (select vehicleid from bookings where (bookingFrom <= '".date("Y-m-d", strtotime( $startDate))." ".$startTime."' and  bookingTo > '".date("Y-m-d", strtotime( $startDate))." ".$startTime."' ) or (bookingFrom < '".date("Y-m-d")." and  bookingTo >= '".date("Y-m-d")."') or (bookingFrom <= '".date("Y-m-d", strtotime( $startDate))." ".$startTime."' and  bookingTo >= '".date("Y-m-d")."')) group by vehiclename";
                        //echo $query;
                        $result = $conn->query($query);
                        
                        $query2 = "select * from vehicles where vehiclesubcategory='".$_GET['vehicleType']."'";
                        $q=0;
                        if($result){
                            $query2 = $query2." and (vehicleid=";
                            while ($row = $result->fetch_assoc()){
                                if($q==0){
                                    $query2 = $query2.$row['vehicleid'];
                                    $q=1;
                                }else{
                                    $query2 = $query2." or vehicleid=".$row['vehicleid'];
                                }
                            }
                            $query2 = $query2.")";
                        }
                        
                        
                        //echo $query2;
                        $result = $conn->query($query2);
                        
                        if($result){
                            while ($row = $result->fetch_assoc()) {
                                array_push($availableVehicles, $row['vehicleid']);
                                
                                $query2 = "select * from vehicle_names where names='".$row['vehiclename']."'";
                                $result2 = $conn->query($query2);
                                if($result2){
                                    $row2 = $result2->fetch_assoc();
                                    $price = $row2['hourly'];
                                }

                                $vid = $row['vehicleid'];
    
                                echo"
                                <a href='book.php?sd=$startDate&st=$startTime&vid=$vid'>
                                <div class='col s12 m3'>
                                    <div class='card' style='background-color:#fff'>
                                        <div class='zoom-effect-container'>
                                            <div class='card-image'>
                                                <img src='images/Large/".str_replace(" ","_",$row['vehiclename']).".jpg'>
                                            </div>
                                        </div>
                                        <div class='card-content'>
                                        <p>
    
                                          <span><h5 style='color: #455a64;'><b>".str_replace("_"," ",$row['vehiclename'])."</b></h5></span>
                                          <span style='color:#757575'>".$row['vehicletype']."
                                          <br>
                                          <b style='font-size:120%; color:#9ccc65'></b>
    
                                          
                                        </p>
                                        </div>
                                    </div>
                                </div>
                                </a>
    
                                ";
                            }
                        }
                        

                    ?>

              </div>
            </div>

<h4 class="center">VEHICLES WE OFFER A SERVICE</h4>
<div class="row">
<?php
    $query3 = "select * from vehicle_names";
    $result = $conn->query($query3);

    $vid = $row['vehicleid'];
    
    while ($row = $result->fetch_assoc()) {

        echo "
            <div class='col s12 m3'>
                <div class='card' style='background-color:#fff'>
                    <div class='zoom-effect-container'>
                        <div class='card-image'>
                            <img src='images/Large/".str_replace(" ","_",$row['names']).".jpg'>
                        </div>
                    </div>
                    <div class='card-content'>
                    <p>
                    <span><h5 style='color: #455a64;'><b>".str_replace("_"," ",$row['names'])."</b></h5></span>
                    </p>
                    </div>
                </div>
            </div>
        ";
    }
?>
</div>

    <div class="container" style="padding:2%; padding-top:0px;">
       
        <div class="row" align="center">
      <div class="col s4">
          <h5 class="_14">Payment</h5>
                <ul class="social-icons">
                    <li> <img src="images/payment/Payment%20Methods%20Bank%20cards.ico" style="width:40px;"></li>
                    <li><img src="images/payment/mastercard-512.png" style="width:40px;"></li>
                    <li><img src="images/payment/visa-512.png" style="width:40px;"></li>
                    
                    <li><img src="images/payment/cash-on-delivery-icon.png" style="width:100px;"></li>
                </ul></div>
      <div class="col s4">
            <h5 class="_14">Contact Us</h5>
            <ul style="padding-left:10px;">
                <li style="text-align: left;"><b style="color:#26a69a;">Email id:</b> ssms@gmail.com</li>
                <li style="text-align: left;"><b style="color:#26a69a">Phone No. : </b>+91 1234567890, 0987654321. </li>
            </ul>
        </div>
        <div class="col s4">
            <div class="footer-social-icons">
                <h5 class="_14">Follow us</h5>
                <ul class="social-icons">
                    <li><a href="ssms" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
                    
                    <li><a href="ssms" class="social-icon"> <i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    </div>

<!--footer-->

    <footer class="page-footer grey darken-4">
        <div style="margin-left:30px">
        </div>
        <div class="footer-copyright">
        <div class="container center">
        &copy; 2018 Copyrighted
        </div>
        </div>
    </footer>
    </body>
  </html>
