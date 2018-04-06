<!DOCTYPE html>
  <html>
    <head>
      <title>Smart Service Management System</title>
      <?php include('header.php');?>
      <style>

        html {
              background: url(images/topbanner2.jpg) no-repeat center center fixed;
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
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
            <li><a href="home.php">Home</a></li>
            <li><a class="navbtn" href="services.php">Services</a></li>
            <li><a href="contact.php">Contact us</a></li>
            <li><a class="navbtn" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>

    <div class="row">
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <h3>Car Service 20 Points to check</h3>
                </div>
                <div class="card-image">
                    <img src="./images/services.png">
                </div>
            </div>
        </div>

        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <h3>Car Servicing Packages and Offers</h3>
                </div>
                <div class="card-image">
                    <img src="./images/pack.png">
                </div>
            </div>
        </div>
    </div>

               
    <div class="container white" style="padding:3%;">
       
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
                    <li><a href="" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
                    
                    <li><a href="" class="social-icon"> <i class="fa fa-google-plus"></i></a></li>
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