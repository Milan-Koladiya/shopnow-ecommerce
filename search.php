<?php
	require 'dbconfi/confi.php';
session_start();
?>
<html>
<head>
  <meta name="Keywords" content="Online Shopping in India,online Shopping store,Online Shopping Site,Buy Online,Shop Online,Online Shopping,Shop Now">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="Description" content="India's biggest online store for Mobiles, Fashion (Clothes/Shoes), Electronics, Home Appliances, Books, Home, Furniture, Grocery, Jewelry, Sporting goods, Beauty & Personal Care and more! 
		Find the largest selection from all brands at the lowest prices in India. Payment options - COD, EMI, Credit card, Debit card &amp; more.">
</head>
<title><?php echo $_SESSION[$row['product']]?></title>
<style>
		.delete_btn{
		color: white;
		padding: 10px 20px; 
		margin: 5px auto; 
		border: 2px solid black;
		border-radius:10px;
		cursor: pointer; 
		width: 200px;
		}
		.delete_btn:hover{
			opacity:0.8;
		}
</style>
<body>
	<?php 
		$search=$_GET['search'];
		$query="SELECT * FROM categoryinformation3 WHERE product='$search'";
		$query_run=mysqli_query($con,$query);
	?>
	<div style="width:100%; border:2px solid #4CAF50">		 
			<?php
			while($row=mysqli_fetch_array($query_run))
			{
			?>
			<table>
			<table style="width:100%;">
			<th>
				<td><img src="<?php echo $row['imglink']?>" width="293px" height="293px"></td></br>
			</th>
			</table>
			<div style="width:100%">
			<table style="width:100%; margin:20px;">
			<tr>
			<td><h3>Date:-<b style="color:red; font-size:20px;"><?php echo $row['date']?></b></h3></td>
			<td><h3>Category:-<b style="color:red; font-size:20px;"><?php echo $row['category']?></b></h3></td>
			<td><h3>Product:-<b style="color:red; font-size:20px;"><?php echo $row['product']?></b></h3></td>
			</tr>
			<?php
			?>
			<tr>
			<td><h3>Brand:-<b style="color:red; font-size:20px;"><?php echo $row['brand']?></b></h3></td>
			<td><h3>Price:-<b style="color:red; font-size:20px;"><?php echo $row['price']?></b></h3></td>			
			</tr>
			</table>
			<table style="margin:20px;">
			<tr>
			<td><h3>description:-<b style="color:red; font-size:20px;"><?php echo $row['description']?></b></h3></td>
			</tr>
			</table>
			</div>
			<div style="width:100%">
			<table>
			<th style="margin:20px;">
			<tr><button style="background-color:red; opacity:0.7; width:300px; align:right; font-size:15px;" value="Buy Now"
			name="buy_btn" class="delete_btn"><b>Buy Now</b></button></tr>&nbsp;
			<form method="GET" action="adtocart.php">
			<input type="hidden" name="id" value="<?php echo $id?>">
			<label><b>Enter Qty:</b></label>
			<input type="number" name="qty" min="1" max="10">&nbsp;
			<tr><button style="background-color:green; opacity:0.7; align:left; width:300px; font-size:15px;" value="Add To Cart"
			name="add_btn" class="delete_btn"><b>Add To Cart</b></button></tr>
			</form>
			<?php
			}
			?>
			</th>
			</table>
			</div>
	</div>
</body>
</html>