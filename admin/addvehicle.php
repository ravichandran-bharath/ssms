<?php
require('../connection.php');
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
      <title>Anwesha Drives</title>
      <?php include('../header.php');?>	


      <script>  
        $(document).ready(function(){
          $(".button-collapse").sideNav();
          $('.modal').modal();
          $('#modal1').modal('open');
          $('#modal1').modal('close');
          $('select').material_select();
        });
      </script>
	  <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    </head>

<body>

  <!-- Navbar goes here -->
  <?php require("navbar.html");?>

<div class="container" style="margin:100px">
  <form action="" method="post">
    <div class="row">
      <div class="col s12">
        <div class="container">
        <div class="input-field col s12">
          <select name="name">
            <option value="" disabled selected>Choose your option</option>
            <?php
            $fetch = "SELECT * FROM vehicle_names";
            $result = $conn->query($fetch);
            while ($row = $result->fetch_assoc()) {
              echo "
                <option value='".$row['names']."'>".str_replace("_"," ",$row['names'])."</option>
              ";
            }
            ?>
          </select>
          <label>Select Vehicle</label>
        </div>
          
          <div class="row">
            <div class="input-field col s12">  
              <select id="type" name="type" >
                <option value="" disabled selected></option>
                <option value="Scooter">Scooter</option>
                <option value="Bike">Bike</option>
                <option value="Sports">Sports</option>
                <option value="Hatchback">Hatchback</option>
                <option value="Premium_Hatchback">Premium HatchBack</option>
                <option value="Sedan">Sedan</option>
                <option value="Premium_Sedan">Premium Sedan</option>
                <option value="SUV">SUV</option>
              </select>               
              <label for="type" >Vehicle Type</label>
            </div>
          </div>  

          <div class="row">
            <div class="input-field col s12">
              <select id="sub" name="subtype">
                <option value="" disabled selected></option>
                <option value="two_wheeler">Two Wheeler</option>
                <option value="car">Car</option>
              </select>               
              <label for="sub">Vehicle Sub Type</label>
            </div>
          </div> 

				  <div class="row">
            <div class="input-field col s12">
              <input type="text" id="name" class="validate" name="ownername" required>
              <label for="name">Owner Name</label>
            </div>
          </div>
				  
          <div class="row">
            <div class="input-field col s12">
              <input  type="number" id="name" class="validate" name="phone" required>
              <label  for="name">Owner Phone</label>
            </div>
          </div>

				  <div class="input-field col s12">
            <textarea name="address" id="textarea1" class="materialize-textarea"></textarea>
            <label for="textarea1">Owner Address</label>
          </div>

          <center>
            <button class="red white-text btn" type = "submit" name = "addvehicle">Add Vehicle</button>
          </center>
        </div>
      </div>
    </div>
  </form>
</div>

          
</body>

</html>
 <?php
  if (isset($_POST['addvehicle'])) {
            
    $sql = "INSERT INTO vehicles(vehiclename,vehicletype,vehiclesubcategory, ownername, phone, address) VALUES('".$_POST['name']."','".$_POST['type']."','".$_POST['subtype']."','".$_POST['ownername']."','".$_POST['phone']."','".$_POST['address']."')";
    echo $sql;
    if ($conn->query($sql) === TRUE) {
					echo "
					<script>
            Materialize.toast('Added Successfully', 4000);
          </script>
					";
					
    } else {
          echo "
					<script>
            Materialize.toast('Could not be Added', 4000);
          </script>
					";
          }
      } 
 ?>