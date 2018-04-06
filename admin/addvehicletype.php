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
   <?php
  if (isset($_POST['addvehicle'])) {
    require_once('ImageManipulator.php'); 
    $carname = str_replace(" ","-",$_POST["name"]);

    if ($_FILES['file']['error'] > 0) {
			echo "Error: " . $_FILES['file']['error'] . "<br />";
		} else {
			// array of valid extensions
			$validExtensions = array('.jpg', '.jpeg', '.gif', '.png');
			// get extension of the uploaded file
			$fileExtension = strrchr($_FILES['file']['name'], ".");
			$fileExtension = strtolower($fileExtension);
			// check if file Extension is on the list of allowed ones
			if (in_array($fileExtension, $validExtensions)) {
				$manipulator = new ImageManipulator($_FILES['file']['tmp_name']);
				$manipulator->save('../images/Large/' . $carname . '.jpg');
                $newImage = $manipulator->resample(300, 250, false);
                $manipulator->save('../images/Small/' . $carname . '.jpg');
                $sql = "INSERT INTO vehicle_names VALUES('".$_POST['name']."')";
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

			} else {
                echo "
                    <script>
                        Materialize.toast('You must upload an image', 4000);
                    </script>
                ";
			}
		}
}
 ?>

<div class="container" style="margin:100px">
  <form action="addvehicletype.php" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col s12">
        <div class="container">
				  
          <div class="row">
            <div class="input-field col s12">
              <input  type="text" id="name" class="validate" name="name" required>
              <label  for="name">Vehicle Name</label>
            </div>
          </div>

          <input type="file" name="file">
			
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
