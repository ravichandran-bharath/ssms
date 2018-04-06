<?php
session_start();
ob_start();
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
      
      <script>  
        $(document).ready(function(){
            $(".button-collapse").sideNav();
            $('select').material_select();
            $('#vehicle').DataTable();
        });
      </script>
	  <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    </head>

    <body>

      <!-- Navbar goes here -->

      <?php 
        require("navbar.html");

        if(isset($_POST['deletevehicle'])){
        $id=$_POST['check'];
                if(mysqli_query($conn,"DELETE FROM vehicles WHERE vehicleid='".$id."'")){
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
      ?>

<div class="container">
    <div class="row">
    <div class="col s8">

    <form method="post" action="deletevehicle.php" >
        
<table id="vehicle" class="mdl-data-table" width="70%">
    <thead>
        <tr>
            <th>Select</th>  
            <th>Vehicle ID</th>        
            <th>Vehicle Name</th>
            <th>Vehicle Type</th>        
            <th>Owner</th>		
            <th>Phone</th>		
            <th>Address</th>		
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM vehicles";
            $res = $conn->query($query);
            while(($row = $res->fetch_assoc())!=null){
        ?>
        <tr>
            <td align="center">
            <p>
              <input type="radio" name="check" id="<?php echo $row['vehicleid']; ?>" value="<?php echo $row['vehicleid']; ?>" />
              <label for="<?php echo $row['vehicleid']; ?>"></label>
            </p>
            </td>        
            <td><?php echo $row['vehicleid']; ?></td>
			<td><?php echo $row['vehiclename']; ?></td>
			<td><?php echo $row['vehicletype']; ?></td>
			<td><?php echo $row['ownername']; ?></td>
			<td><?php echo $row['phone']; ?></td>
			<td><?php echo $row['address']; ?></td>
        </tr> 
        <?php  } ?>
    </tbody>
</table>
					
        
        <center><input type="submit" class="red white-text btn" name="deletevehicle" value="Delete"/></center>
    </form>
    </div>
</div>
</div>

          
    </body>
  </html>
 <?php
    
 ?>