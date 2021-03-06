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

                <div class="container">
                <div class="col s12 card-panel lighten-5">
                <div class="container">
                <div class="row">
                    <div class="col s12 center"><span class="flow-text">Write to us!</span></div>
                </div>
                    <form class="col s12">
                      <div class="row">
                        <div class="input-field col s5 ">
                          <i class="material-icons prefix">account_circle</i>
                          <input id="name" name="name" type="text" class="validate">
                          <label for="name">Name</label>
                        </div>
                        <div class="col s2"></div>
                        <div class="input-field col s5 ">
                          <i class="material-icons prefix">phone</i>
                          <input id="phone" name="phone" type="tel" class="validate">
                          <label for="phone">Telephone</label>
                        </div>
                      </div>
                      <div class="input-field col s12 ">
                      <i class="material-icons prefix">email</i>
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email" data-error="wrong" data-success="right">Email</label>
                      </div><br>
                      <div class="input-field col s12 ">
                         <i class="material-icons prefix">mode_edit</i>
                         <textarea id="message" name="message" class="materialize-textarea"></textarea>
                         <label for="message">Message</label>
                      </div>
                      <div class="row center">
                        <button class="btn waves-effect waves-light z-depth-5" style="margin-top: 50px; background-color:#cc3333" type="submit" id="submit" name="submit">Send
                          <i class="material-icons right">send</i>
                        </button>
                      </div>
                    </form>
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



  <?php

	$_POST['name'] = "";
	$_POST['phone'] = "";
	$_POST['email'] = "";
	$_POST['message'] = "";

	if(isset($_POST['submit']))
	{
	if($_POST['name'] != "" || $_POST['phone'] != "" || $_POST['email'] != "" || $_POST['message'] != "")
	{

	$subject = "Enquiry";
	$txt = $_POST['name']." ".$_POST['email']." ".$_POST['phone'];
	$headers = "From: contact form";
	$txt = $_POST['name']." ".$_POST['email']." ".$_POST['phone']." ".$_POST['message'];

	mail("ssms@gmail.com",$subject,$txt,$headers);
  echo "
    <script>  
      Materialize.toast('Message sent', 4000);
    </script>
    ";
	}

	}
  ?>