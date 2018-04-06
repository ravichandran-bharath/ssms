<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Smart Service Management System</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="css/social.css"> 
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <script>
        $(document).ready(function () {
            $(".button-collapse").sideNav();
            $('select').material_select();
        });

    </script>
    <style>
        #logo_banner{
            width:20%;
        }
        @media only screen and (max-width: 667px) {
            #logo_banner{
                width:60%;
            }
        }

        .img {
            background-image: url("images/topbanner.jpg");
            display: block;
            margin: auto;
            height: 100%;
            background-size: cover;
        }
        .navbtn{
          background-color: #000;
          color:#fff;
        } 

        .navbtn:hover{
          background-color: #212121;
          color:#9ccc65;
        }
        body{
          font-family:'Open Sans';
        }

    </style>

</head>

<body>


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
                <li><a style="background-color:black" href="home.php">Home</a></li>
                <li><a class="navbtn" href="services.php">Services</a></li>
                <li><a href="contact.php">Contact us</a></li>
                <li><a class="navbtn" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>


      <?php
      if(isset($_GET['action'])){
        if($_GET['action']=="booked"){
            echo "
                <script>
                    Materialize.toast('Your Booking has been completed', 4000);
                </script>
                ";
        }
      }
      ?>

<!-- Page Layout here -->
<div class="row img col s12">
    <form class="form-inline" method="get" action="vehicles.php">
        <br><br>
        <center>
            <img id="logo_banner" src="images/logo_white.png" />
        </center>

        <div class="container">
            
            <div class="row center">
                <div class="input-field col s12 m6">
                    <h5 style="color:white">Booking Date</h5>
                    <input style="background-color:white" type="date" name="startDate" placeholder="<?php date("Y-m-d") ?>"
                           class="datepicker" required>
                </div>
                <div class="input-field col s12 m6">
                    <h5 style="color:white">Booking Time</h5>
                    <select name="startTime" class="white" required>
                        <option Value="08:30:00">08:30AM</option>
                        <option Value="09:00:00">09:00AM</option>
                        <option Value="09:30:00">09:30AM</option>
                        <option Value="10:00:00">10:00AM</option>
                        <option Value="10:30:00">10:30AM</option>
                        <option Value="11:00:00">11:00AM</option>
                        <option Value="11:30:00">11:30AM</option>
                        <option Value="12:00:00">12:00PM</option>
                        <option Value="12:30:00">12:30PM</option>
                        <option Value="13:00:00">01:00PM</option>
                        <option Value="12:30:00">01:30PM</option>
                        <option Value="14:00:00">02:00PM</option>
                        <option Value="14:30:00">02:30PM</option>
                        <option Value="15:00:00">03:00PM</option>
                        <option Value="15:30:00">03:30PM</option>
                        <option Value="16:00:00">04:00PM</option>
                        <option Value="16:30:00">04:30PM</option>
                        <option Value="17:00:00">05:00PM</option>
                        <option Value="17:30:00">05:30PM</option>
                        <option Value="18:00:00">06:00PM</option>
                        <option Value="18:30:00">06:30PM</option>
                        <option Value="19:00:00">07:00PM</option>
                        <option Value="19:30:00">07:30PM</option>
                        <option Value="20:00:00">08:00PM</option>
                        <option Value="20:30:00">08:30PM</option>
                        <option Value="21:00:00">09:00PM</option>
                        <option Value="21:30:00">09:30PM</option>
                        <option Value="22:00:00">10:00PM</option>
                        <option Value="22:30:00">10:30PM</option>
                        <option Value="23:00:00">11:00PM</option>
                        <option Value="23:30:00">11:30PM</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <button type="submit" id="search" name="vehicleType" value="car"
                           style="background-color:#cc3333;width:100%"
                           class="btn-large waves-effect waves-light lighten-1">Search Cars</input>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <a href="bikes.php" name="vehicleType" value="two_wheeler" id="search"
                           style="background-color:#cc3333;width:100%"
                           class="btn-large waves-effect waves-light lighten-1">Request a Bike</a>
                </div>
            </div>
        </div>
        <br><br>
    </form>
</div>
<br><br>
<!--   Icon Section   -->
<div class="row">
    <div>
        <h5 class="center-align" style="margin: 25px">How it Works!</h5>
    </div>
    <div class="col s12 m12 l4 card-panel hoverable center">
        <div class="icon-block">

            <div class="col s5">
                <span><img src="images/choose.png" style="height: 120px; width: 120px;" alt=""
                           class="circle responsive-img"></span>
            </div>

            <h5 class="center">Book Your Car</h5>

            <p class="light">Choose from our wide list of cars & make a booking as per your conveniences.</p>
        </div>
    </div>

    <div class="col s12 m12 l4 card-panel hoverable center">
        <div class="icon-block">

            <div class="col s5">
                <span><img src="images/doorstep.jpg" style="height: 120px; width: 120px" alt=""
                           class="circle responsive-img"></span> <!-- notice the "circle" class -->
            </div>

            <h5 class="center">Doorstep Delivery</h5>

            <p class="light">Home, office or airport, get your car at your doorstep.</p>
        </div>
    </div>

    <div class="col s12 m12 l4 card-panel hoverable center">
        <div class="icon-block">
            <div class="col s5">
                <span><img src="images/enjoiyourride.jpg" style="height: 120px; width: 120px" alt=""
                           class="circle responsive-img"></span> <!-- notice the "circle" class -->
            </div>
            <h5 class="center">Enjoy Your Drive</h5>

            <p class="light">Drive safe with a GPS tracker & drop-off to any of our locations.</p>
        </div>
    </div>
</div>

</div>
</div>
<br><br><br>

<br><br><br>
    <div class="container" style="padding:2%; padding-top:0px;">
       
        <div class="row" align="center">
      <div class="col s12 m4">
          <h5 class="_14">Payment</h5>
                <ul class="social-icons">
                    <li> <img src="images/payment/Payment%20Methods%20Bank%20cards.ico" style="width:40px;"></li>
                    <li><img src="images/payment/mastercard-512.png" style="width:40px;"></li>
                    <li><img src="images/payment/visa-512.png" style="width:40px;"></li>
                    
                    <li><img src="images/payment/cash-on-delivery-icon.png" style="width:100px;"></li>
                </ul></div>
      <div class="col s12 m4">
            <h5 class="_14">Contact Us</h5>
            <ul style="padding-left:10px;">
                <li style="text-align: left;"><b style="color:#26a69a;">Email id:</b> ssms@gmail.com</li>
                <li style="text-align: left;"><b style="color:#26a69a">Phone No. : </b>+91 1234567890, 0987654321. </li>
            </ul>
        </div>
        <div class="col s12 m4">
            <div class="footer-social-icons">
                <h5 class="_14">Follow us</h5>
                <ul class="social-icons">
                    <li><a href="https://www.facebook.com/ssms/" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
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
