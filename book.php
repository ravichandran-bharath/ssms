<?php
    $vehicleid = $_GET['vid'];
    $startDate = $_GET['sd'];
    $startTime = $_GET['st'];
    // $endDate = $_GET['ed'];
    // $endTime = $_GET['et'];
    //$diff = (strtotime(date("Y-m-d", strtotime($endDate)." ".$endTime)) - strtotime(date("Y-m-d", strtotime($startDate)." ".$startTime)));
    
    // $endDateTime = strtotime(date("Y-m-d", strtotime($endDate))." ".$endTime);
    $startDateTime = strtotime(date("Y-m-d", strtotime($startDate))." ".$startTime);
    // $diff= ($endDateTime-$startDateTime)/3600;
    
    // $diff = ceil($diff);
    //echo $diff;

    // if($diff<5){
    //   $disable = 1;
    // }

    // $days = floor($diff/24);
    // $hours = $diff%24;

    // if($hours>12){
    //   $days = $days+1;
    //   $hours = 0;
    // }

    $booking = 1;
    require('connection.php');

    $query = "select * from vehicles where vehicleid =".$vehicleid;
    $result = $conn->query($query);
    if($result){
      $row = $result->fetch_assoc();
      $vehiclename = $row['vehiclename'];
      $query2 = "select * from vehicle_names where names='".$vehiclename."'";
      $result2 = $conn->query($query2);
      if($result2){
        $row2 = $result2->fetch_assoc();
        $hourlyprice = $row2['hourly'];
        $twelveprice = $row2['12_hours'];
        $dayprice = $row2['24_hours'];
      }
      // if($hours==12){
      //   $totalprice = $twelveprice+ $dayprice*$days;  
      // }else{
      //   $totalprice = $hourlyprice*$hours + $dayprice*$days;
      // }
      
    }
?>
<!DOCTYPE html>
  <html>
    <head>
      <title>Smart Service Management System</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
      <style>
        body{
          font-family:'Open Sans';
          background-color:#efebe9;
        }
        .navbtn{
          background-color: #000;
          color:#fff;
        } 
        .navbtn:hover{
          background-color: #9ccc65;
          color:#ffffff;
        }
      </style>
      <script>
      $(document).ready(function() {
        $(".button-collapse").sideNav();
        $('select').material_select();
        $('.modal').modal();
      });
      </script>
	  <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/social.css">
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
      <?php
      if($booking==0){
        echo "
          <script>  
            Materialize.toast('Booking could not be completed', 4000);
          </script>
        ";
      }
      ?>
      <br><br>
      
      <div class="container white">
      <div class="row ">
          <div class="col s12">
          <?php
          echo "
                <div class='col s12 m3 lighten-5'>
                  <div class='card lighten-5'>
                    <div class='card-image'>
                      <img src='images/Large/".str_replace(" ","_",$vehiclename).".jpg'>
                    </div>
                    <div class='card-content'>
                          <span class='card-title light-green-text darken-1'><h5><b>".str_replace("_"," ",$vehiclename)."</b></h5></span>
                    </div>
                  </div>
                </div>
            ";
        ?>

            <?php
                
				echo "

          <div class='col s12 m9 lighten-5'>
            <div class='' style='margin: 20px'>
                <h5 class='red-text'><b>Booking Information</b></h5>
                <span style='font-size:120%'>Booking From:</span><span class='red-text'>".$startDate." ".$startTime."</span><br>
                ";
		        
            echo "<!--Modal Button-->
                      <br><br><a class='waves-effect waves-light teal-text modal-trigger'>Terms and Conditions</a><br>

                      <!-- Modal Structure -->
                      <div id='modal2' class='modal'>
                        <div class='modal-content'>

                        <h4>Terms and Conditions of Agreement:</h4>
                        
                    </div>
                    <div class='modal-footer'>
                      <a href='#!'' class='modal-action modal-close waves-effect waves-green btn-flat'>CLOSE</a>
                    </div>
                    </div>
                  
                      <form method='POST' action='instamojo.php?vid=$vehicleid&sd=$startDate&st=$startTime'>
                          <input type='checkbox' id='test5' required/>
                          <label for='test5'>Yes, I have read and accept the terms and conditions</label><br>
						            <br> 
                        <div class='input-field col s12 '>
                          <i class='material-icons prefix'>account_circle</i>
                          <input id='cus_name' type='text' name='cus_name' class='validate' required>
						            <label for='cus_name'>Name</label>
                        </div>
                        
                        <div class='input-field col s12 '>
						              <i class='material-icons prefix'>phone</i>
                          <input id='phonenumber' type='text' name='phonenumber' class='validate' required>
						              <label for='phonenumber'>Phone</label>
                        </div>

                        <div class='input-field col s12 '>
                        <i class='material-icons prefix'>email</i>
                        <input id='email' type='text' name='email' class='validate' required>
                        <label for='email'>Email</label>
                        </div>
     
                        <br><hr>
                        <br>
                        <h5 class='red-text'>Select Payment Method:</h5>
                        <p>
                        <input type=\"radio\" name=\"pay\" id=\"optionsRadios1\" value=\"cod\" checked>
                        <label for=\"optionsRadios1\"> 
                          Cash on delivery
                        </label>

                        <input disabled type=\"radio\" name=\"pay\" id=\"optionsRadios2\" value=\"payonline\">
                        <label for='optionsRadios2'>
                          Pay Online (Future Enhancement)
                        </label>
                        </p>
                        <br>
                        <h5 class='red-text'>Select Delivery Options</h5>
                        
                        
                        <div class='row'>
                        <input onchange='disableHome()' type=\"radio\" name=\"office\" id=\"optionsRadios3\" value=\"Office_pickup\" checked>
                        <label for=\"optionsRadios3\"> 
                          Self
                        </label>
                        </div>
                        
                        <div class='row'>
                        <input onchange='enableHome()' type=\"radio\" name=\"office\" id=\"optionsRadios5\" value=\"home_delivery\">
                        <label for='optionsRadios5'>
                          Pickup and Home Delivery
                        </label>
                        </div>
                        
                        <script>
                          function enableHome() {
                            $('#home').each(function() {
                              if ($(this).attr('disabled')) {
                                  $(this).removeAttr('disabled');
                              }
                          });
                          }

                          function disableHome(){
                            $('#home').each(function() {
                              $(this).attr({
                                'disabled': 'disabled'
                              });
                          });
                          }
                        </script>

                        <div class='row'>
                          <div class='input-field col m6 s12'>
                            <input disabled id='home' name='home' type='text' class='validate'>
                            <label for='home' data-success='right'>Home Address</label>
                          </div>
                        </div>
                        <div style='padding: 20px;' class='brown lighten-4 black-text'>
                          Please note that an additional charge of Rs 299 will be added during checkout for home delivery option.
                        </div><br>
                      ";

                      $disable = 0;

                      if($disable==1){
                        echo "
                          <div style='padding: 20px;' class='red lighten-5 red-text'>
                            Minimum booking duration is 5 hours.
                          </div>
                          
                          <button disabled type='submit' name='submit' style='margin: 25px; background-color:#cc3333' class='centered btn btn-danger waves-effect waves-light'>Book</button>
                        ";
                      }else{
                        echo "
                          <button type='submit' name='submit' style='margin: 25px; background-color:#cc3333' class='centered btn btn-danger waves-effect waves-light'>Book</button>
                
                        ";
                      }
                        
            ?>
            </form>
            </div>
          </div>
        </div>
        
        
        </div>
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