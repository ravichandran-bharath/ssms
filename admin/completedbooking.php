<?php
require('../connection.php');
session_start();
ob_start();
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

        if (isset($_POST['submit'])) {
            if(isset($_POST['discount'])){
                $id= explode("_",$_POST['check']) ;
                $price = $id[1]-$id[1]*$_POST['discount']/100;
                if(mysqli_query($conn,"UPDATE bookings set price =".$price." WHERE bookingid='".$id[0]."'")){
                    echo "
                    <script>
                    Materialize.toast('Discount applied Successfully', 4000);
                    </script>
                    ";	
                    
                }else{
                    echo "
                    <script>
                    Materialize.toast('Discount could not be applied', 4000);
                    </script>
                    ";
                }
            }
        }
?>

<div class="container">
    <div class="row">
    <div class="col s10">

    <form method="post" action="completedbooking.php" >
        
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
            $query = "SELECT * FROM bookings where status='INACTIVE'";
            $res = $conn->query($query);
            while(($row = $res->fetch_assoc())!=null){
        ?>
        <tr>
            <td align="center">
            <p>
              <input type="radio" name="check" id="<?php echo $row['bookingid']; ?>" value="<?php echo $row['bookingid']."_".$row['price']; ?>" />
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

        <div class="input-field col s6">
            <input placeholder="Discount" id="discount" name="discount" type="text" class="validate">
            <label for="discount">Discount</label>
        </div>		

        <button class="waves-effect waves-light btn" name="submit" type="submit">Submit</button>

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