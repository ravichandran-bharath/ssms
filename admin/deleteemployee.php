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
      
        <script>
        $(document).ready(function() {
            $(".button-collapse").sideNav();
            $('select').material_select();
            $('#emp').DataTable({});
        } );
        </script>

	    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    </head>

    <body>

      <!-- Navbar goes here -->

      <?php 
	  require("navbar.html");
        if(isset($_POST['deleteemp'])){
                
            $id=$_POST['check'];
                    if(mysqli_query($conn,"DELETE FROM employees WHERE empid='".$id."'")){
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
    <div class="col s10">

    <form method="post" action="deleteemployee.php">
    <table id="emp" class="bordered">
        <thead>
            <tr>
            <th>Select</th>  
                <th>EmpID</th>        
                <th>Name</th>
                <th>Age</th>        
                <th>Sex</th>
                <th>Address</th>        
                <th>DOB</th>
                <th>Phone</th>        
                <th>Email</th>
                <th>Experience</th>        			
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM employees";
                $res = $conn->query($query);
                while(($row = $res->fetch_assoc())!=null){
            ?>
            <tr>
                <td align="center">
                <p>
                <input type="radio" name="check" id="<?php echo $row['empid']; ?>" value="<?php echo $row['empid']; ?>" >
                <label for="<?php echo $row['empid']; ?>"></label>
                </p>
                </td>        
                <td><?php echo $row['empid']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['sex']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['dob']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['designation']; ?></td>
            </tr> 
            <?php  } ?>
        </tbody>
    </table>
					
        
        <center><input type="submit" class="red white-text btn" name="deleteemp" value="Delete"/></center>
    </form>
    </div>
</div>
</div>

          
    </body>
  </html>
