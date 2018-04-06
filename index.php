<?php
session_start();	
require('./connection.php');

    if(isset($_POST['username'])){
      $username=$conn->real_escape_string($_POST['username']);
			$password=$conn->real_escape_string($_POST['password']);
		
			$login_sql="SELECT * FROM admin_login WHERE username='".$username."' AND password='".$password."'";
			$login_query=mysqli_query($conn, $login_sql);
        
			if(mysqli_num_rows($login_query)>0) {
					$login_rs=mysqli_fetch_assoc($login_query);
					$_SESSION['admin']=$login_rs['username'];
					$_SESSION['email']=$login_rs['email'];
					$_SESSION['type']=$login_rs['type'];
					
					$_SESSION['username']=$username;
                    header("Location: home.php");
            } 
			else{
			
					header("Location: index.php?error=login");
				}
				
	}

?>


<html lang = "en">
   
   <head>
   <title>Smart Service Management System</title>
      <?php include('./header.php');?>
      <style>
        body  {
          background-image: url("./images/topbanner2.jpg");
          background-size:cover;
        }
      </style>
                
   </head>
 
    <body>
      <div>
        
        
          <div class="container center" id="login" style="background-color: black; opacity : 0.7; margin-top: 100px">
          <br>
          <h5 class="red-text">LOGIN TO PROCEED BOOKING CAR SERVICE</h5>
          <br>
            <form class = "col s12" action = "index.php" method = "post">
            <div class="container">
                <div class="row">
                    <div class="input-field col s12">
                      <input style="color:white" type="text" id="username1" class="validate" name="username" required>
                      <label style="color:white" for="username1">Username</label>
                    </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input style="color:white" type="password" id="password1" class="validate" name="password" required>
                    <label style="color:white" for="password1">Password</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6">
                      <?php   
                            if(isset($_GET['error'])){
                        ?>
							<span class="error">Wrong credentials try again!</span>
                        <?php 
                            }
                        ?>
                  </div>
                </div>
                <button class = "red white-text btn" type = "submit" name = "login">Login</button>
                <a class="blue btn" href="register.php" style="">Register</a>  here..!
            </form>  
          </div>  
          </div>
        </div> 
   </body>
</html>

<style>
    #login{
        padding: 2%;
        border: 2px solid #26a69a;
        border-radius: 5px;
    }
    .error{
        font-size: 1.1em;
        color: white;
    }
</style>

