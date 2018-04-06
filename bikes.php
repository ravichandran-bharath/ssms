<!DOCTYPE html>
  <html>
    <head>
    <title>Smart Service Management System</title>
      <?php include('header.php');?>
      <style>
		
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
     
	   
	   $(document).ready(function() {
		$('select').material_select();
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
		
    <div class="container"  style="margin-top:100px">
      <div class="row">
        <div class="col s12 m6 l6 center" style="color: #616161">
          <h4>TO BOOK A 2 WHEELER PLEASE CALL US AT 9876543210</h4>
        </div>

        <div class="col s12 m6 l6 center">
        <h5 style="color:#616161">REQUEST A BIKE</h5>
          <form action="" method="POST">
            <div class="input-field col s12">
              <input type="text" class="validate" name="name"/>
              <label>Name</label>
            </div>
            <div class="input-field col s12">
              <select name="type">
                <option Value="Scooter">Scooter</option>
                <option Value="Bike">Bike</option>
              </select>
              <label>Type</label>
            </div>
           
            <div class="input-field col s12">
              <input type="text" name="phone_number"/>
              <label>Phone Number</label>
            </div>
            <div class="col s12">
              <center><input type="submit" class="btn btn-primary" name="Submit"/></center>
            </div>
            <br><br>
          </form>
        
        </div>

      </div>
    </div>
		

    
	<hr>
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
                <li style="text-align: left;"><b style="color:#26a69a">Phone No. : </b>+91 1234567890, 9876543210. </li>
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
<?php
if(isset($_POST['submit'])){
$to = "somebody@example.com";
$subject = "From".$_POST['name'];
$txt = "Name".$_POST['name']." "."Type".$_POST['type']." "."Duration".$_POST['duration']." "."Phone_Number".$_POST['phone_number'];
$headers = "From:".$_POST['name']; 

mail($to,$subject,$txt,$headers);

if (TRUE) {  
  echo "
  <script>
  alert('Your message has been sent successfully');
  </script>
  ";	
} else {
    echo "
    <script>
    alert('Your message could not sent');
    </script>
    ";
  }
}
?>