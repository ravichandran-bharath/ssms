<?php
session_start();
require('connection.php');
ob_start();

if(isset($_SESSION['id'])){}
	else{
		// Start the session
		$_SESSION["id"] = uniqid();
		$_SESSION["cart"] = 0;
	}

?>
<html>

<head>
    
    <title>CART</title>
	<?php include('header.php');?>

	<link type="text/css" rel="stylesheet" href="css/home.css"/> 				
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
	<script>    
        $(document).ready(function() {
            $('#carttable').DataTable();
        });
    </script>
    
</head>
<body>
  <?php
  include('navbar.php');

  if(isset($_GET['delete'])){
    if($_GET['delete']=="true"){
        echo "
            <script>
            Materialize.toast('Item Deleted Successfully', 5000);
            </script>
        ";
    }else{
        echo "
        <script>
        Materialize.toast('Item Could not be Deleted', 5000);
        </script>
        ";
    }
    }
  ?>
  
    
    
    <div class="container">
        <div class="row">
             <h4>Your Cart</h4><hr>
             
            <table id="carttable" class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Author</th>
                    <th>Quantity</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Remove</th>
                    
                </tr>
            </thead>
            <tbody>
            <form action='deleteitem.php' method='GET' >
                <?php
                    $total=0;
                    
                    // $username=  $_SESSION['user_id'];
                    $result = $db->query("select B.id as productid, B.BookName as bookname, B.AuthorName as authorname, C.quantity as quantity, C.type as type, C.total_price as price from products as B, cart as C where C.userid='".$_SESSION["id"]."' and B.id=C.productid");
                    while (($row = $result->fetch_assoc() )!=null) {
                            echo "
                            <tr>
                                <td>".$row['bookname']."</td>
                                <td>".$row['authorname']."</td>
                                <td>".$row['quantity']."</td>
                                <td>".$row['type']."</td>
                                <td>".$row['price']*$row['quantity']."</td>
                                <td><a href='deleteitem.php?userid=".$_SESSION['id']."&productid=".$row['productid']."' class='waves-effect blue darken-3 btn' type='submit'>Delete Item</a></td>
                            </tr>";
                            $total = $total+($row['price']*$row['quantity']);
                    }
                
                    echo $row['productid']; 
                echo "
                </tbody>
                <tfoot>
			<tr>
            <td>Total Amount</td>
            <td> </td>
			<td></td>
			<td> </td>
			<td>".$total."</td>
            <td> </td>
			</tr>
            </tfoot>
			";
                ?>
            
        </table>
                </form>
        
            <hr>
            
		<form class="col s12" action="instamojo.php" style="width:500px" method="POST">
           <h4>Payment Details <!-- <button type="submit" name="submit" class="waves-effect waves-light btn" style="float:right; font-size:16px;">Proceed To Checkout</button>--></h4>
            <hr>
             <div class="input-field">
            <label for="cus_name">Full Name</label>
			<input type="text" class="validate" id="cus_name" name="cus_name" required>
            </div>
            <div class="input-field">
            <label for="phone">Phone No.</label>
			<input type="text" class="validate" id="phone" name="phone" maxlength="12" required>
            </div>
              
            <div class="input-field">
            <label for="add">Address</label>
            <input class="validate" type="text" id="add" name="address"  required>
            </div>
            <div class="input-field">
            <label for="email">Email address</label>
			<input type="email" id="email" name="email" class="validate" required>
            </div>
            
            <div class="input-field">
            <label for="pay">Payable Amount</label>
                <input class="validate" type="number" id="pay" name="total" value="<?php echo $total; ?>" readonly></div>
                <h5>Select Payment Method:</h5>
            
              <label>
                <input type="radio" name="pay" id="optionsRadios1" value="cod">
                <label for="optionsRadios1">Cash on delivery</label>
              </label>
            
              <label>
                <input type="radio" name="pay" id="optionsRadios2" value="payonline">
                  <label for="optionsRadios2">Pay Online</label>
              </label>
              <br>
              <br>
              <div style='padding: 20px;' class='brown lighten-4 black-text'>
                Please note that COD is available only in Bhubaneswar. 
            </div>
            <br>
            
            <br>
            <?php
                if($total<150){
                    echo '
                    <div style="padding: 20px;" class="brown lighten-4 black-text">
                        A minimum order of Rs 150 is required to make a purchase.  
                    </div>
                    <br>
                    <button type="submit" name="submit" class="waves-effect btn btn-success" disabled>Proceed To Checkout</button>
                    ';
                }else{
                    echo '
                    <button type="submit" name="submit" class="waves-effect btn btn-success">Proceed To Checkout</button>
                    ';
                }
            ?>
            </form>
            
        </div> 
    </div>
    
    <?php
        include('footer.html'); 
    ?> 

</body>
</html>