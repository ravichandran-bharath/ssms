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
<html lang = "en" itemscope itemtype="http://schema.org/Article">

	 <head>
			<title>Anwesha Drives</title>
      <?php include('../header.php');?>

		
    <script>
        $(document).ready(function () {
            $(".button-collapse").sideNav();
        });
		</script>
				<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
<link rel="icon" href="../images/favicon.ico" type="image/x-icon">  
			
			
			<script>
					
					 $('.dropdown-button').dropdown({
							inDuration: 300,
							outDuration: 225,
							constrainWidth: false, // Does not change width of dropdown to that of the activator
							hover: true, // Activate on hover
							gutter: 0, // Spacing from edge
							belowOrigin: false, // Displays dropdown below the button
							alignment: 'left' // Displays dropdown with edge aligned to the left of button
							stopPropagation: false // Stops event propagation
						}
					);
					
					 
			</script>
			 <script>
         $(document).ready(function() {
         $('select').material_select();
      });
      </script>
	 </head>
		
	<body>
	<?php
//session_start();
			include("navbar.html");
?>

		<div id = "main">
				<div class="form-group well" style="position:relative;width:60%;left:20%; margin-top: 50px;">
					<strong style="font-size:150%"><center>Add Admin</center></strong><br><br>
					<form class = "form-signin" role = "form" action = "" method = "post">
							<div class="input-field col s8">
								<input id="username" type="text" class="validate" name = "username" required>
								<label for="username">Username</label>
							</div>
							<div class="input-field col s8">
								<input id="password" type="password" class="validate" name = "password" required>
								<label for="password">Password</label>
							</div>
							<div class="input-field col s8">
								<input id="re-password" type="password" class="validate" name = "re-password" required>
								<label for="re-password">Retype Password</label>
							</div>
							<div class="input-field col s8">
								<input id="email" type="email" class="validate" name = "email" required>
								<label for="email">E-Mail</label>
							</div>
							
							<label>Materialize Select</label>
               <select name="type">
                  <option value="" disabled selected>Select Admin</option>
                  <option value="Super_Admin">Super_Admin</option>
                  <option value="Admin">Admin</option>
                  
               </select> 
							
							<center><button class = "waves-effect waves red btn" type="submit" name = "submit">Submit</button></center>
							  <br>
							<!-- FORM FOR NORMAL LOGIN ENDS HERE-->
							<br>           
							
					 
						
					</form>
						
				</div>
			</div>

			
	 </body>
</html>

<style>
.form-group{
		border: 1px solid lightgray;
		padding: 50px;
		margin: 10px;
}
.col-sm-6{
		padding: 10px;
}
</style>


<?php
if(isset($_POST['submit'])){
				$id=uniqid();
				$username=mysqli_real_escape_string($conn,$_POST['username']);
				$password=mysqli_real_escape_string($conn,$_POST['password']);
				$repassword=mysqli_real_escape_string($conn,$_POST['re-password']);
				$email=mysqli_real_escape_string($conn,$_POST['email']);
				$type=mysqli_real_escape_string($conn,$_POST['type']);
				
				if($password==$repassword){
				$query = "INSERT INTO admin_login VALUES ('".$id."','".$username."', '".$password."', '".$email."', '".$type."')";
			
				//check if data inserted
				if($conn->query($query))
				{                      
					echo "<script> Materialize.toast('Admin Added successful!', 4000, 'rounded')</script>";
				}
				else
				{   
					echo "<script> Materialize.toast('Admin Not Added !', 4000, 'rounded')</script>";
				}
				}
				else{
					echo "<script> Materialize.toast('Password Not Matched !', 4000, 'rounded')</script>";
				}
}
?>


		