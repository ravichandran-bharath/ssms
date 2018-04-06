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
		<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../images/favicon.ico" type="image/x-icon">		
    <script>
        $(document).ready(function () {
            $(".button-collapse").sideNav();
        });

    </script>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
		<script src="js/yrss.min.js"></script>

		<script>
			$(document).ready( function () {
				$('#pricetable').DataTable();
			});
		</script>
	 </head>
	<body>
	<?php
		include("navbar.html");
	?>

		<div id = "main">
			<div class="form-group well" style="position:relative;width:60%;left:20%; margin-top: 50px;">
				<strong style="font-size:150%"><center>Settings</center></strong><br><br>
				<form class = "form-signin" role = "form" action = "" method = "post">
					<center>
					<br>
					<?php		
					if($_SESSION['type']=="Super_Admin"){
						echo "<a href='addadmin.php'>Click to Add New Admin</a>";
					}
					?>
					<br><br>
					Name : <label>SSMS</label>
					<br>
					Email : <label>ssms@gmail.com</label><br><br>
					Password : <a href="changepassword.php">Change Password</a>
					<br><br>
					</center>

					<table class="responsive-table striped">
						<thead>
							<tr>
								<th>Select</th>        
								<th>ID</th>
								<th>Username</th>
								<th>Email</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$query = "SELECT id,username,email FROM admin_login where type='Admin'";
								$res = $conn->query($query);
								while(($row = $res->fetch_assoc())!=null){
							?>
							<tr>
								<td>
									<input value="<?php echo $row['id'];?>" name="checked[]" type="checkbox" id="<?php echo $row['id'];?>">
									<label for="<?php echo $row['id'];?>"></label>
								</td>        
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['username']; ?></td>
								<td><?php echo $row['email']; ?></td>
							</tr> 
							<?php  } ?>
						</tbody>
					</table>
					<center>
						<input type="submit" class="red white-text btn" name="delete" value="Remove">
					</center>
				</form>			
			</div>	
		</div>
			
		<footer>
			<hr>
			<div class="footer-copyright red white-text" style="height:50px;padding:15px;">
				<div class="container" align="center">
				2018 &copy; Copyrighted
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
if(isset($_POST['delete'])){
            $idArr = $_POST['checked'];
			
            foreach($idArr as $id){
                mysqli_query($conn,"DELETE FROM admin_login WHERE id='".$id."'");
            }
}	
?>


		