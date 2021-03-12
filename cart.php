<?php
	require 'dbconfi/confi.php';
	session_start();
	$finaltotal="";
?>
<html>
<head>
  <meta name="Keywords" content="Online Shopping in India,online Shopping store,Online Shopping Site,Buy Online,Shop Online,Online Shopping,Shop Now">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="Description" content="India's biggest online store for Mobiles, Fashion (Clothes/Shoes), Electronics, Home Appliances, Books, Home, Furniture, Grocery, Jewelry, Sporting goods, Beauty & Personal Care and more! 
		Find the largest selection from all brands at the lowest prices in India. Payment options - COD, EMI, Credit card, Debit card &amp; more.">
</head>
<title>You Can See All Added Product Here</title>
<style>
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
</style>
<body>
	<div style="height:70px;">
		<center><h1 style="font-size:50px; color:#4CAF50;">Welcome
		<span style="color:#555555">
		<?php 
		if(isset($_SESSION['username']))
		{
		echo $_SESSION['username'];
		}
		else
		{
			echo '<script type="text/javascript">alert("you are not login")</script>';
			echo '<a href="login.php"><button style="background-color:#4CAF50; font-size:15px; width:300px;" class="delete_btn"><b>Click Here To Login</b></button></a>';
		}
		?>
		</span></h1></center>
	</div>
	<div>
<?php 	
			if(isset($_SESSION['username']))
			{
			if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			unset($_SESSION['productcart'][$id]);
			unset($_SESSION['qtycart'][$id]);
		}
?>	
<?php
		if(isset($_SESSION['productcart']) && !empty($_SESSION['productcart']))
{
		$grandtotal = array();
		$i=0;
?>
		<div  style="border:2px solid #4CAF50; border-collapse: collapse; margin:5px auto; width:70%; box-shadow: 20px 20px 20px 20px #4CAF50; border-radius:10px;">			 
			<table style="width:100%; margin:2px auto; font-size:21px;">
			<tr style="border:2px solid black;">
			<th>Index</th>
			<th>Product</th>
			<th>Qty</th>
			<th>price</th>
			<th>Subtotal</th>
			<th>Image</th>
			<th colspan="2">Remove/Add item</th>
			</tr>
			<tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>
<?php
		foreach($_SESSION['productcart'] as $key => $value)
			{
			$i++;
			$qty = $_SESSION['qtycart'][$key];	
			
			$query="select * from categoryinformation3 where id='{$value}'";
			$query_run = mysqli_query($con,$query);
			$row=mysqli_fetch_array($query_run);
			$subtotaltemp = $row['price'] * $qty;
?>
		<tr style="text-align:center; border:2px solid black;">
		<td><?php echo $i?></td>
		<td><?php echo $row['product']?></td>
		<td><?php echo $qty?></td>
		<td><?php echo $row['price']?></td>
		<td><?php echo $subtotaltemp?></td>
		<td><img src="<?php echo $row['imglink']?>" width="170px" height="110px"></td>
		<td><a href="cart.php?id=<?php echo $key?>"><button style="background-color:red; font-size:15px;" class="delete_btn"><b>Remove Item</b></button></td>
		<td><a href="home2.php"><button style="background-color:green; font-size:15px;" class="delete_btn"><b>Buy Item</b></button></td>
		</tr>
		<tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr> 
			
<?php 
			$grandtotal[] = $subtotaltemp;
			$finaltotal = array_sum($grandtotal);
		
			}	
?>
		<tr>
		<td></td> <td></td> <td></td><td></td> <td></td> <td></td>
		<td><a href="address.php"><button class="delete_btn" name="cheakout_btn" style="background-color:green; width:110px; font-size:15px;"><b>Cheakout</b></button></a></td>  
		<td><b style="color:green"><?php echo $finaltotal?></b></td>
		</tr>
		</table>
		</table>
	</div>
	</div>
<?php
}
else
{
	echo '<script type="text/javascript">alert("Your Cart Is Empty")</script>';
	echo '<a href="home2.php"><button style="background-color:#4CAF50; font-size:15px; width:300px;" class="delete_btn"><b>Click Here To Buy Item</b></button></a>';
}
?>
<?php
if(isset($_SESSION['productcart']))
{
$_SESSION['finaltotal']=$finaltotal;
}
			}	
?>
</body>
</html>