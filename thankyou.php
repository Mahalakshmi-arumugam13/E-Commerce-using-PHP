<!DOCTYPE html>
<html lang="en">

<?php session_start();?>
<head>
  <title>Thankyou Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
	.productssection .card{
		margin-bottom:20px;
	}
	.card{
		height:550px;
	}
	.card img{
		height:200px;
		object-fit:cover;
		width:auto;
	}
  
  </style>
  <?php
	include 'config/config.php';
  
  ?>
  
</head>
<body style="height:1500px">
 

<section style="padding: 100px 0px;">
<div class="container" >
  <h3 style="padding-bottom: 24px; text-align:center;">Order Details</h3>
  
   <h4 class="text-center">Thank You For Placing Your Order!</h4>
   
   
 <div class="row productssection">
 <?php
		$name = $_SESSION['name']; 
		$email = $_SESSION['email'];		 
		$phone = $_SESSION['phone']; 
		$address = $_SESSION['address'];
  ?>
 
    <div class="col-lg-6 offset-lg-3">
		<table class="table">
			<tr>
				<td>Name</td>
				<td><?php echo $name;?></td>
			</tr>
			
			<tr>
				<td>Email</td>
				<td><?php echo $email;?></td>
			</tr>
			
			<tr>
				<td>Phone</td>
				<td><?php echo $phone;?></td>
			</tr>
			
			<tr>
				<td>Address</td>
				<td><?php echo $address;?></td>
			</tr>
		</table>
		<a href="index.php" class="btn btn-primary"> Countinue Shipping </a>
   
   </div>
    
	 
	 </div>
</div>
</section>



</body>
</html>


