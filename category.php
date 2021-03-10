<?php
	require 'dbconfi/confi.php';
	session_start();
?>
<!DOCTYPE html> 
<html>
<head>
  <meta name="Keywords" content="Online Shopping in India,online Shopping store,Online Shopping Site,Buy Online,Shop Online,Online Shopping,Shop Now">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="Description" content="India's biggest online store for Mobiles, Fashion (Clothes/Shoes), Electronics, Home Appliances, Books, Home, Furniture, Grocery, Jewelry, Sporting goods, Beauty & Personal Care and more! 
		Find the largest selection from all brands at the lowest prices in India. Payment options - COD, EMI, Credit card, Debit card &amp; more.">
</head>
<title>Online Shopping Site:All category show here</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

		.sub_btn{  
		color: white;
		padding: 10px 20px; 
		margin: 5px auto; 
		border: 2px solid black;
		border-radius:10px;
		cursor: pointer; 
		width: 300px;
		}
		.sub_btn:hover { 
		opacity: 0.8; 
		} 
		.delete_btn{
		color: white;
		padding: 10px 20px; 
		margin: 5px auto; 
		border: 2px solid black;
		border-radius:10px;
		cursor: pointer; 
		width: 100px;
		}
		.delete_btn:hover{
			opacity:0.8;
		}
		tr td:hover img
		{
			transform:scale(2);
			transition: transform 0.2s;
			box-shadow: 0 0 10px rgba(0, 0, 0, 1);
		}
			table td a
		{
			text-decoration:none;
		}
		table td a:hover
		{
			border-bottom:1px solid white;
		}
</style>
<body>
	<?php
		$query = 'SELECT * FROM categoryinformation3';
		$query_run = mysqli_query($con,$query)
	?>
	<div style="height:70px;">
		<center><h1 style="font-size:50px; color:#4CAF50;">Welcome
		<span style="color:#555555">
		<?php 
		if(isset($_SESSION['username']))
		{
		echo $_SESSION['username'];
		}
		?>
		</span></h1></center>
	</div>
	<div>
	<ul>
	  <li><a href="home2.php"><i class="fa fa-home" style="font-size:22px;"></i>&nbsp;&nbsp;<font style="font-size:20px;">Home</font></a>
		<ul class="dropdown">
			<li><a href="Electronics.php">Electronics</a></li>
			<li><a href="menfashion.php">Men,Women Fashion</a></li>
			<li><a href="beauty.php">Beauty,Health,Grocery</a></li>
			<li><a href="sport.php">Sports,Fitness</a></li>
			<li><a href="toy.php">Toy,Baby Product,Kid's Fashion</a></li>
			<li><a href="car.php">Car,MotorBike,Industriyal</a></li>
		</ul>
		</li>
	 <li><a href="category.php" class="active">
	  <i class="fa fa-list" style="font-size:20px;"></i>&nbsp;&nbsp;<font  style="font-size:20px;">Category</font></a></li>
	  <li><a href="customer.php">
	  <i class="fa fa-address-card" style="font-size:20px;"></i>&nbsp;&nbsp;<font  style="font-size:20px;">Profile</font></a></li>
	  <li><a href="cart.php">
	  <i class="fa fa-shopping-cart" style="font-size:20px;"></i>&nbsp;&nbsp;<font style="font-size:20px;">Cart</font></a></li>
	  <li><a href="order.php">
	  <i class="fa fa-truck" style="font-size:20px;"></i>&nbsp;&nbsp;<font style="font-size:20px;">Order</font></a></li>
	 <?php 
	 if(isset($_SESSION['username']))
	 {
	 ?>
	 <li style="float:right"><a href="logout.php">
	  <i class="fa fa-sign-out" style="font-size:20px;"></i>&nbsp;&nbsp;<font style="font-size:20px;">Logout</font></a></li>
	 <?php
	 }
	 else
	 {
	 ?>
	 <li style="float:right"><a href="login2.php">
	  <i class="fa fa-lock" style="font-size:20px;"></i>&nbsp;&nbsp;<font style="font-size:20px;">Login</font></a>
	</li>
	 <?php } ?>
	</ul>
	</div>
	<div style="border:2px solid #4CAF50; margin:5px auto; width:90%; box-shadow: 20px 20px 20px 20px #4CAF50; border-radius:10px;">			 
			<table style="width:100%; margin:2px auto; font-size:21px;">
			<table style="width:100%; margin:6px auto; font-size:21px;">
			<tr>
			<th>Id</th>
			<th>date</th>
			<th>category</th>
			<th>Product</th>
			<th>Brand</th>
			<th>price</th>
			<th>Description</th>
			<th>Image</th>
			<th colspan="2">Opration</th>
			</tr>
			<?php
			while($row = mysqli_fetch_array($query_run))
				{
			?>
			<tr style="text-align:center;">
				<td><?php echo $row['id']?></td>
				<td><?php echo $row['date']?></td>
				<td><?php echo $row['category']?></td>
				<td><?php echo $row['product']?></td>
				<td><?php echo $row['brand']?></td>
				<td><?php echo $row['price']?></td>
				<td style="width:270px; height:100px; display:inline-block; overflow:auto;"><?php echo $row['description']?></td>
				<td><a href="<?php echo $row['imglink']?>"><img src="<?php echo $row['imglink']?>" width="170px" height="110px"></a></td>
				<td><a href="addbtn.php"><button style="background-color:green; font-size:15px;" value="ADD" name="add_btn" type="submit" class="delete_btn"><b>ADD</b></button></a></td>
				<td><a href="delete.php?id=<?php echo $row['id']?>"><button style="background-color:red; font-size:15px;" value="DELETE" name="delete_btn" class="delete_btn"><b>DELETE</b></button></a></td>
			</tr>
			<?php
			}
			?>
			</table>
			</table>
			</div>
			<?php
			include('footer.php');
			?>
			</body>
			</html>
			
			
			
			
			
			