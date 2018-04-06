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
        $(document).ready(function() {
            $('#booking').DataTable( {} );
            $(".button-collapse").sideNav();
            $('select').material_select();
        });
        </script>
	    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    </head>

    <body>

      <!-- Navbar goes here -->

      <?php
	  require("navbar.html");
        if(isset($_POST['deletebooking'])){
        
            $id=$_POST['check'];
            if(mysqli_query($conn,"DELETE FROM bookings WHERE bookingid='".$id."'")){
                echo "
                <script>
                Materialize.toast('Deleted Successfully', 4000);
                </script>
                ";	
				
            }else{
                echo "
                <script>
                Materialize.toast('Could not be Deleted', 4000);
                </script>
                ";
            }
        }  
     if(isset($_POST['beginride'])){
        $id=$_POST['check'];
        $date = date('Y-m-d H:i:s');
        if(mysqli_query($conn,"update bookings set actualfrom='".$date."' where bookingid=".$id."")){
            echo "
            <script>
            Materialize.toast('Ride Started Successfully', 4000);
            </script>
            ";	
	    }
	 }
	 
	 if(isset($_POST['endride'])){
        $id=$_POST['check'];
        $date = date('Y-m-d H:i:s');
        if(mysqli_query($conn,"update bookings set actualto='".$date."',status='INACTIVE' where bookingid=".$id."")){
            echo "
            <script>
            Materialize.toast('Ride Completed Successfully', 4000);
            </script>
            ";	
	    }
	 }
      ?>

<div class="container">
    <div class="row">
    <div class="col s10">

    <form method="post" action="deletebooking.php" >
        
<table id="booking" class="bordered" width="70%">
    <thead>
        <tr>
		    <th>Select</th>  
		    <th>Booking ID</th>
            <th>Vehicle ID</th>        
            <th>Booking From</th>
			<th>Booking To</th>   
            <th>Actual From</th>   
            <th>Actual To</th>   
            <th>Booking by</th>  
            <th>Phone</th>  
            <th>Status</th>  
            <th>Price</th>       
            			
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM bookings where status='ACTIVE'";
            $res = $conn->query($query);
            while(($row = $res->fetch_assoc())!=null){
        ?>
        <tr>
            <td align="center">
            <p>
              <input type="radio" name="check" id="<?php echo $row['bookingid']; ?>" value="<?php echo $row['bookingid']; ?>" />
              <label for="<?php echo $row['bookingid']; ?>"></label>
            </p>
            </td>   
            
            <td><?php echo $row['bookingid']; ?></td>
            <td><?php echo $row['vehicleid']; ?></td>
			<td><?php echo $row['bookingFrom']; ?></td>
			<td><?php echo $row['bookingTo']; ?></td>
            <td><?php echo $row['actualfrom']; ?></td>
            <td><?php echo $row['actualto']; ?></td>
			<td><?php echo $row['bookingby']; ?></td>
			<td><?php echo $row['phone']; ?></td>
			<td><?php echo $row['status']; ?></td>
            <td><?php echo $row['price']; ?></td>
			
        </tr> 
        <?php  } ?>
    </tbody>
</table>
					
        
        <center><input type="submit" class="red white-text btn" name="deletebooking" value="Delete"/>
		 <input type="submit" class="red white-text btn" name="beginride" value="Begin"/>
		  <input type="submit" class="red white-text btn" name="endride" value="End"/></center>
    </form>
    </div>
</div>
</div>

          
    </body>
    <!--footer-->

            <footer class="page-footer black">
                <div class="footer-copyright">
                <div class="container center">
                2018 &copy; Copyrighted
                </div>
                </div>
            </footer>
  </html>