<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Commerce Products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

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
  <h2>Add Products</h2>
  <?php
  include '../config/config.php';
  session_start();
	if(isset($_POST['submit'])){
		
		$title = $_POST['title'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		 
		 
		$image = "uploads/".$_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$_FILES['image']['name']);
		
		$sql = mysqli_query($conn, "insert into products (title, description, price, image) values ('$title','$description','$price','$image')");
		
		if($sql){
			$_SESSION['success'] = "Details Inserted Successfully";
			
		}
		else{
			$_SESSION['success'] = "Insertion Failed";
		}
	}
  
  
  ?>
  
  <?php
  
  if(isset($_SESSION['success']))
{ ?>
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php echo $_SESSION['success'];?>
</div>

<?php }  ?>
 
  
  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" >Product Name</label>
      <div class="col-sm-10">
        <input class="form-control" type="text" name="title">
      </div>
    </div>
	
	 <div class="form-group">
      <label class="control-label col-sm-2" >Product Description</label>
      <div class="col-sm-10">
	  <textarea class="form-control"  name="description"></textarea>
       
      </div>
    </div>
	
	 <div class="form-group">
      <label class="control-label col-sm-2" >Price</label>
      <div class="col-sm-10">
        <input class="form-control" type="text"  name="price">
      </div>
    </div>
	
	 <div class="form-group">
      <label class="control-label col-sm-2" >Image</label>
      <div class="col-sm-10">
        <input class="form-control" type="file" name="image">
      </div>
    </div>
	 
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
