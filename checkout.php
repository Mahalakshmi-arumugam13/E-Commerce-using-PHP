<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Commerce Products - Checkout Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

 <?php
 
  include 'config/config.php';
  session_start();
  
  $total_amt= $_GET['total'];
   
 
					
				
  
	if(isset($_POST['placeorder'])){
		
		$name = $_POST['name'];
		$_SESSION['name'] = $name;
		
		$email = $_POST['email'];
		$_SESSION['email'] = $email;
		
		$phone = $_POST['phone'];
		$_SESSION['phone'] = $phone;
		
		$address = $_POST['address'];
		$_SESSION['address'] = $address;
		 
		$sql = mysqli_query($conn, "insert into orders (customername, email, phone, address, totalprice) values ('$name','$email','$phone','$address', '$total_amt')");
		
		if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
							$orderid = $values["item_id"];
							$productid =$values["item_name"];
							$quantity = $values["item_quantity"];
						
								$sql = mysqli_query($conn, "insert into order_products (order_id, product_id, quantity) values ('$orderid','$productid','$quantity')");

						}
					}
		if($sql){
			echo "<script>window.location.assign('thankyou.php')</script>";
			
		}
		else{
				echo "<script>alert('Try Again')</script>";
		}
	}
  
  
  ?>
  
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="index.php">Dashboard</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Product Upload</a>
    </li>
	 <li class="nav-item">
      <a class="nav-link" href="index.php">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="cart.php">Cart</a>
    </li>
  </ul>
</nav>


<div class="container " style="margin-top:100px;">
  <h2>Checkout</h2>
    
 
  
  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" >Name</label>
      <div class="col-sm-10">
        <input class="form-control" type="text" name="name">
      </div>
    </div>
	 <div class="form-group">
      <label class="control-label col-sm-2" >Email</label>
      <div class="col-sm-10">
        <input class="form-control" type="email" name="email">
      </div>
    </div>
	 <div class="form-group">
      <label class="control-label col-sm-2" >Phone</label>
      <div class="col-sm-10">
        <input class="form-control" type="text" name="phone">
      </div>
    </div>
	
	 <div class="form-group">
      <label class="control-label col-sm-2" >Address</label>
      <div class="col-sm-10">
	  <textarea class="form-control"  name="address"></textarea>
       
      </div>
    </div>
	 <div class="form-group">
      <label class="control-label col-sm-2" >Shipping Method</label>
      <div class="col-sm-10">
	  <input type="checkbox" value="Cash on Delivery" required> Cash on Delivery
      </div>
    </div>
	
	 
	 
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="placeorder" class="btn btn-success">Place Order</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
