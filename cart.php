<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <?php session_start();?>
<style>
.ui-w-40 {
    width: 40px !important;
    height: auto;
}

.card{
    box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);    
}

.ui-product-color {
    display: inline-block;
    overflow: hidden;
    margin: .144em;
    width: .875rem;
    height: .875rem;
    border-radius: 10rem;
    -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    vertical-align: middle;
}
</style>
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


<?php

include 'config/config.php';
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["title"],
				'item_price'		=>	$_POST["price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["title"],
			'item_price'		=>	$_POST["price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Product Removed")</script>';
				 
				echo '<script>window.location="cart.php"</script>';
				

			}
		}
	}
}

?>

 <div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card" style="margin-top:150px;">
        <div class="card-header">
            <h2>Shopping Cart</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
			  


              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4"  >Product ID  </th>
                    <th class="text-center py-3 px-4" >Product Name  </th>
                    <th class="text-right py-3 px-4"  >Price</th>
                    <th class="text-center py-3 px-4" >Quantity</th>
                    <th class="text-right py-3 px-4"  >Total</th>
                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                  </tr>
                </thead>
                <tbody>
        
		<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
               
			   <tr>
						<td class="text-right font-weight-semibold align-middle p-4"><?php echo $values["item_id"]; ?></td>
						<td class="text-right font-weight-semibold align-middle p-4"><?php echo $values["item_name"]; ?></td>
						
						<td class="text-right font-weight-semibold align-middle p-4">₹ <?php echo $values["item_price"]; ?></td>
						<td class="text-right font-weight-semibold align-middle p-4"><?php echo $values["item_quantity"]; ?></td>
						<td class="text-right font-weight-semibold align-middle p-4">₹ <?php echo ($values["item_quantity"] * $values["item_price"]);?> /-</td>
						
						  <td class="text-center align-middle px-0"><a href="cart.php?action=delete&id=<?php echo $values["item_id"]?>" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td>
						  
						  
						 
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						
						 
						}
					?>
					
					
                  <tr>
						<td colspan="3" align="right"><strong>Total</strong></td>
						<td align="right">₹ <?php echo  $total; ?> /-</td>
						<td></td>
					</tr>
					<?php
					}
					
					
					?>
			 
                  
        
                </tbody>
              </table>
            </div>
            <!-- / Shopping cart table -->
        
           
        
            <div class="float-right">
              <a href="index.php" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</a>
              <a href="checkout.php?total=<?php echo $total;?>" class="btn btn-lg btn-primary mt-2">Checkout</a>
            </div>
        
          </div>
      </div>
  </div>

</body>
</html>