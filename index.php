<!DOCTYPE html>
<html lang="en">

<?php session_start();?>
<head>
  <title>Bootstrap Example</title>
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

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="index.php">PHP E-Commerce </a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
	 <li class="nav-item">
      <a class="nav-link" href="index.php">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="cart.php">Cart</a>
    </li>
  </ul>
</nav>


<section style="padding: 100px 0px;">
<div class="container" >
  <h3 style="padding-bottom: 24px; text-align:center;">PRODUCTS</h3>
 <div class="row productssection">
 
 <?php
 
 
	$sql = mysqli_query($conn, "select * from products");
	while($row = mysqli_fetch_array($sql)){
	
 
 ?>
	<div class="col-lg-3">
		<div class="card"  >
		<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
			  <img class="card-img-top" src="dashboard/<?php echo $row['image'];?>" alt="images">
			  <div class="card-body">
				<h5 class="card-title"><?php echo $row['title'];?></h5>
				<p class="card-text text-justify"><?php echo $row['description'];?></p>
								
				<h4>₹<?php echo $row['price'];?></h4>
				
		 	<input type="number" name="quantity" value="1" class="form-control" required />
    <input type="hidden" name="title" value="<?php echo $row['title'];?>">
    <input type="hidden" name="price" value="<?php echo $row['price'];?>">
	
	  
     
    <button type="submit" class="btn btn-primary"  name="add_to_cart">Add to Cart</button>
	
	
	
</form>


				 
			  </div>
		</div>
		
		
	</div>
	<?php } ?>
	 
	 </div>
</div>
</section>



</body>
</html>


