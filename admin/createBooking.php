<?php
session_start();
require('../connection.php');

if(isset($_SESSION['username'])){}
else{
	header("Location: index.php?action=relogin");
}
?>
<!DOCTYPE html>
  <html>
    <head>
        <title>Anwesha Drives</title>
        <?php include('../header.php');?>

        <script>  
            $(document).ready(function(){
                $(".button-collapse").sideNav();
                $('select').material_select();
            });
        </script>
	    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    </head>

    <body>
        
        <?php
        include('navbar.html');
        ?>

        <div class="row img col s12">
    <form class="form-inline" method="get" action="vehicles.php">
        <br><br>
        
        <div class="row center">
            <h4 style="color:white; opacity: 0.8;">Drive to Your Next Adventure</h4>
        </div>
        <div class="container">
            <div class="row center">
                <div class="input-field col s7 m3">
                    <input style="background-color:white" type="date" name="startDate" placeholder="Start Date"
                           class="datepicker" required>

                    <script>
                        $('.datepicker').pickadate({
                            selectMonths: true, // Creates a dropdown to control month
                            selectYears: 2 // Creates a dropdown of 15 years to control year
                        });
                    </script>
                </div>
                <div class="input-field col s4 m3">
                    <select name="startTime" class="browser-default" required>
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
                <div class="input-field col s7 m3">
                    <input style="background-color:white" type="date" name="endDate" placeholder="End Date"
                           class="datepicker" required>
                    <script>
                        $('.datepicker').pickadate({
                            selectMonths: true, // Creates a dropdown to control month
                            selectYears: 15 // Creates a dropdown of 15 years to control year
                        });
                    </script>
                </div>
                <div class="input-field col s4 m3">
                    <select name="endTime" class="browser-default" required>
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
                <div class="input-field col s12 m6">
                    <button type="submit" name="vehicleType" value="two_wheeler" id="search"
                           style="background-color:#cc3333;width:100%"
                           class="btn-large waves-effect waves-light lighten-1">Search Bikes</input>
                </div>
                <div class="input-field col s12 m6">
                    <button type="submit" id="search" name="vehicleType" value="car"
                           style="background-color:#cc3333;width:100%"
                           class="btn-large waves-effect waves-light lighten-1">Search Cars</input>
                </div>
            </div>
        </div>
        <br><br>
    </form>
</div>

    </body>
</html>