<?php
//session_start();
include("../connection.php");
ob_start();
session_start();

if(isset($_SESSION['username'])){}
else{
	header("Location: index.php?action=relogin");
}

?>
<!DOCTYPE html>

  <html>
    <head>
		<title>Smart Service Management System</title>
	<?php include('../header.php');?>
    <script>
        $(document).ready(function () {
            $(".button-collapse").sideNav();
        });

    </script>
    <style>
        .img {
            background-image: url("../images/topbanner.jpg");
            display: block;
            margin: auto;
            height: 100%;
            background-size: cover;
        }
		

    </style>
	<style>
		.dashboardicons{
			font-size: 200%;
			float:left;
			margin-left:1%; 
			margin-bottom:2%;
			padding:1%; 
			width:30%;
			color: white; 
			font-family: 'Pacifico';
			text-align:center;
		}
		</style>
		

</head>

<body>

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

	<?php
		require('navbar.html');
	?>
	
<div class="tab-content" style="padding-left: 2cm;">

	<!--HOME DATA-->
	<div class="tab-pane fade in active" id="home" name="home" style="position:relative; padding-top:2cm;padding-right:40px;">
	<?php
		$cars=$conn->query("select count(*) as total from vehicles where vehiclesubcategory='car';");
		$totcars = $cars->fetch_assoc();

		

		$book=$conn->query("select count(*) as total from bookings where bookingFrom='".date("Y-m-d")."'");
		$totbook=$book->fetch_assoc();
	?>

	<span style="font-size:250%">Dashboard </span>
	<br><br>
	<div class="row">
	<div class="red dashboardicons left">Total Number of Cars: <?php echo $totcars['total']; ?></div>
	
	<div style="width:500px" class="red dashboardicons right">Total number of bookings today: <?php echo $totbook['total']; ?></div>
	</div>
</div>
</div>
</div>
	<div class="row container-fluid center" style="padding-left: 4cm;">
		<div style="margin:10px" class="grey lighten-3 col s3 waves-effect">
			<img src="../images/vehicles.png" style="height:70px; width:70px" class="responsive-img" /><br>
			<span class="red-text text-lighten-1"><h5>Vehicles</h5></span>
			<ul>
				<li><a href="addvehicle.php"> <i class="material-icons">add</i>Add</a></li>
				<li><a href="deletevehicle.php"> <i class="material-icons">delete</i>View/Delete</a></li>
				<li><a href="addvehicletype.php"> <i class="material-icons">add</i>Add Vehicle to car list</a></li>
			</ul>
		</div>
		<div style="margin:10px" class="grey lighten-3 col s3 waves-effect">
			<img src="../images/employees.png" style="height:70px; width:70px" class="responsive-img" /><br>
			<span class="red-text text-lighten-1"><h5>Employees</h5></span>
			<ul>
				<li><a href="addemployee.php"> <i class="material-icons">add</i>Add</a></li>
				<li><a href="deleteemployee.php"> <i class="material-icons">delete</i>View/Delete</a></li>
			</ul>
		</div>
		<div style="margin:10px" class="grey lighten-3 col s3 waves-effect">
			<img src="../images/booking.png" style="height:70px; width:70px" class="responsive-img" /><br>
			<span class="red-text text-lighten-1"><h5>Booking</h5></span>
			<ul>
				<li><a href="deletebooking.php"> <i class="material-icons">delete</i>View/Delete</a></li>
				<li><a href="completedbooking.php"> <i class="material-icons">list</i>Completed Bookings</a></li>
			</ul>
		</div>
	</div>		
	

    </body>
</html>