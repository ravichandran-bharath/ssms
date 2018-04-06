<?php
   
    ob_start();
    $_SESSION['id'] = session_start();
    require('connection.php');
    require 'PHPMailer/PHPMailerAutoload.php';

    // $id=$_SESSION['id'];
    $name=mysqli_real_escape_string($conn,$_POST['cus_name']);
    $add=$_POST['office'];
    $email=$_POST['email'];
    // $total=$_POST['price'];
    $phone=mysqli_real_escape_string($conn,$_POST['phonenumber']);

        $content = '<html>
        <body>
            <div>
                <hr style="height: 1px;
                    border: 0;
                    border-top: 5px solid #ff0000;">
        
                <div class="header">
                    <h1 style="color: #666699; padding: 20px;">Smart Service Management System</h1>
                </div>
        
                <hr style="height: 1px;
                    border: 0;
                    border-top: 5px solid #e0e0eb;">
                
                <center>
                    <h2 style="color: #666699;">Dear Customer</h2>
                </center>
        
                <center>
                    <h3 style="color: #666699;">Thanks for registering, We will get back to you soon regarding your registration</h3>
                    <h4 style="color: #666699;">This is an email confirmation of your registration.</h4>
                </center>
        
                <span style="color: #666699;">Name:</span> '.$name.'<br>
                <span style="color: #666699;">Address:</span> '.$add.'<br>
                <span style="color: #666699;">Phone:</span> '.$phone.'<br> 
                <span style="color: #666699;">Payment:</span> Cash on delivery<br> 
                
                <hr style="height: 1px;
                    border: 0;
                    border-top: 2px solid #e0e0eb;">
        
                <div>
                    <h4 style="float: left; margin-left: 10px">ORDER Information:</h4><br>
                    <h4 style="float: right; margin-right: 10px">Placed on:'.date("d-m-Y").'</h4>
                </div>
                <br>
        
                <center>
                <table style="width:70%">
                <thead>
                <tr>
                    <td>Vehicle</td>
                    <td>From</td>
                    <td>To</td>
                    <td>Price</td>
                </tr>
                </thead>
                <tbody>'; 
        
                $query = "select V.vehiclename as vehiclename, B.bookingFrom as fromm, B.bookingTo as too, B.bookingby as byy, B.email as email, B.phone as phone, B.address as address, B.price as price from bookings as B,vehicles as V where B.bookingid='".$_SESSION['id']."' and B.vehicleid = V.vehicleid";
        
                $result = $conn->query($query);
                    
                while (($row = $result->fetch_assoc() )!=null) {
                        $content = $content."
                        <tr>
                            <td>".$row['vehiclename']."</td>
                            <td>".$row['fromm']."</td>
                            <td>".$row['too']."</td>
                            <td>".$row['price']."</td>
                        </tr>
                        ";
                }
        
        
                $content = $content."
                </tbody>
                </table>
        
                </div>
        
            </body>
        </html>
                ";
        
        echo $content;
            //SEND EMAIL TO SSMS
            $mail = new PHPMailer;
            $mail->isSendmail();
            //Set who the message is to be sent from
            $mail->setFrom('ssms@gmail.com', 'SSMS');
            //Set an alternative reply-to address
            $mail->addReplyTo('ssms@gmail.com', 'SSMS');
            //Set who the message is to be sent to
            $mail->addAddress('ssms@gmail.com',"SSMS"); 
            //Set the subject line
            $mail->Subject = 'Order Confirmation';
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            //Replace the plain text body with one created manually
            $mail->Body    = $content;
            $mail->AltBody = "Your order has been confirmed";
            
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "mail 1 sent";
            }
        
            //SEND EMAIL TO CUSTOMER
            $mail = new PHPMailer;
            $mail->isSendmail();
            //Set who the message is to be sent from
            $mail->setFrom('ssms@gmail.com', 'SSMS');
            //Set an alternative reply-to address
            $mail->addReplyTo('ssms@gmail.com', 'SSMS');
            //Set who the message is to be sent to
            $mail->addAddress($email, $name);
            //Set the subject line
            $mail->Subject = 'Order Confirmation';
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            //Replace the plain text body with one created manually
            $mail->Body    = $content;
            $mail->AltBody = "Your registration has been confirmed";
            
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                $query = "update bookings set status='INACTIVE' where bookingid='".$_SESSION["id"]."'";
                $result = $conn->query($query);
                header("location:confirmed.php");
            }
        
?>
    