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
      });
	  

      
      </script>
	  <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    
		<script>
		$(document).ready(function() {
    $('select').material_select();
  });
		</script>
		<script>
		function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
		</script>
    </head>

    <body>
        
        <?php
        include('navbar.html');
        ?>
        <div class="container">
            <div class="row">
                <div class="col s12 m6">
                    <div id="categories">
                        <form method="post" action="#">
                            <div class="input-field col s12">
                                <input type="text" id="cat" class="validate" name="name" required>
                                <label for="cat">Name</label>
                            </div>
							<div class="input-field col s12">
                                <input type="number" id="subcat" class="validate" name="age" required>
                                <label for="subcat">Age</label>
                            </div>
							<div class="input-field col s12">
								<select name="sex">
									<option value="" disabled selected>Choose your Sex</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
								</select>
							<label>Sex</label>
							</div>
							<div class="input-field col s12">
								<textarea name="address" id="textarea1" class="materialize-textarea"></textarea>
								<label for="textarea1">Address</label>
							</div>
							<div class="input-field col s12">
                                <input type="text" class="validate" id="cty" name="city" required>
                                <label for="cty">City</label>
                            </div>
							<div class="input-field col s12">
                                <input type="text" class="validate" id="st" name="state" required>
                                <label for="st">State</label>
                            </div>
							<div class="input-field col s12">
                                <input type="number" class="validate" id="pin" name="pin" required>
                                <label for="pin">Pin Code</label>
                            </div>
							<div class="input-field col s12">
                               
								<input type="date" name="dob" id="dob" class="datepicker" required>
								<label for="dob">DOB</label>
								<script>
								$('.datepicker').pickadate({
									selectMonths: true, // Creates a dropdown to control month
									selectYears: 100 // Creates a dropdown of 15 years to control year
										});
								</script>
							</div>
                            </div>
							<div class="input-field col s12">
                                <input type="number" class="validate" id="subcat" name="phone" required>
                                <label for="subcat">Phone</label>
                            </div>
							<div class="input-field col s12">
                                <input type="email" class="validate" id="subcat" name="email" required>
                                <label for="subcat">E-Mail</label>
                            </div>
							
							<div class="input-field col s12">
                                <input type="text" class="validate" id="subcat" name="designation" required>
                                <label for="subcat">Designation</label>
                            </div>
			                <br><br><br><br><br><br>
							<center><input type="submit" class="red white-text btn" name="addemp" value="Submit"/></center>
							
                        </form>
                    
                </div>
            </div>
        </div>
 </div>
        
	</body>
  </html>
  <?php
  //ADD EMP
    if (isset($_POST['addemp'])) {
		$dob=$_POST['dob'];
	 
            $sql = "INSERT INTO employees(name,age,sex,address,city,state,pin,dob,phone,email,designation) VALUES('".$_POST['name']."',".$_POST['age'].",'".$_POST['sex']."','".$_POST['address']."','".$_POST['city']."','".$_POST['state']."',".$_POST['pin'].",'".date("Y-m-d", strtotime($dob))."','".$_POST['phone']."','".$_POST['email']."','".$_POST['designation']."')";
            if ($conn->query($sql) === TRUE) {
                 echo "
                <script>
                    Materialize.toast('Added Successfully', 4000);
                </script>
                ";	
                } else {
                    echo "
                <script>
                    Materialize.toast('Could not be added', 4000);
                </script>
                ";
                }
			}
  ?>