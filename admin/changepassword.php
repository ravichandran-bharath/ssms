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
			<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
			<link rel="icon" href="/favicon.ico" type="image/x-icon">  
			
			
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
				});
			</script>
	 </head>

		
		
		
	<body>
	<?php 
		include("navbar.html");
	?>

		<div id = "main">
				<div class="form-group well" style="position:relative;width:60%;left:20%; margin-top: 50px;">
					<strong style="font-size:150%"><center>Change Password</center></strong><br><br>
					<form class = "form-signin" role = "form" action = "" method = "post">
							<div class="input-field col s6">
								<input id="old" type="password" class="validate" name = "old" required>
								<label for="old">Old Password</label>
							</div>
							<div class="input-field col s8">
								<input id="password" type="password" class="validate" name = "password" required>
								<label for="password">New Password</label>
							</div>
							<div class="input-field col s8">
								<input id="re-password" type="password" class="validate" name = "re-password" required>
								<label for="re-password">Retype Password</label>
							</div>
							
							<button class = "waves-effect waves-light btn" type="submit" name = "submit">Submit</button>
							  <br>
							
							<br>           
							
					 
						
					</form>
						
				</div>
			</div>
			
			<footer>
					<hr>

		<div class="footer-copyright red white-text" style="height:50px;padding:15px;">
			<div class="container" align="center">
			Made by <a class="brown-text text-lighten-3" href="http://appstone.in">AppStone</a>
			</div>
		</div>
	</footer>
			
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
				
	$old=mysqli_real_escape_string($conn,$_POST['old']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$repassword=mysqli_real_escape_string($conn,$_POST['re-password']);
	$query = "select username,password from admin_login where username='".$admin."' and password='".$old."'";
	
	
	//check if data inserted
	if($res=$conn->query($query))
	{       $row = $res->fetch_assoc();               
		if($password==$repassword && $old==$row['password']){
		$query1="update admin_login SET password='".$repassword."' where username='".$admin."' and password='".$old."'";	
		if($conn->query($query1)){
		echo "<script> Materialize.toast('Password Changed successfully!', 4000, 'rounded')</script>";
		}
		else{
		echo "<script> Materialize.toast('Password Not updated !', 4000, 'rounded')</script>";
	}
		}
		else{
		echo "<script> Materialize.toast('Password Not Matched !', 4000, 'rounded')</script>";
	}
	}
		
	
	
	else{
		echo "<script> Materialize.toast('Password Not Matched !', 4000, 'rounded')</script>";
	}
}
?>


		