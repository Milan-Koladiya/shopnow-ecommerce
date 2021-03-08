<?php
	require 'dbconfi/confi.php';
	$page="";
session_start();
?>
<html>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<style>
		.delete_btn{
		color: white;
		padding: 10px 20px; 
		margin: 5px auto; 
		border: 2px solid black;
		border-radius:10px;
		cursor: pointer; 
		width: 250px;
		}
		.delete_btn:hover{
			opacity:0.8;
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
</head>
<body>
<?php
if(isset($_GET['page']))
{
$page=$_GET['page'];

	$page1=($page*5)-5;

}
else
{
	$page1=0;
}
$query="select * from categoryinformation3 where category='Car,MotorBike,Industriyal' limit $page1,5";
$query_run=mysqli_query($con,$query);
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
	  <li><a href="home2.php" class="active"><i class="fa fa-home" style="font-size:22px;"></i>&nbsp;&nbsp;<font style="font-size:20px;">Home</font></a>
		<ul class="dropdown">
			<li><a href="Electronics.php">Electronics</a></li>
			<li><a href="menfashion.php">Men,Women Fashion</a></li>
			<li><a href="beauty.php">Beauty,Health,Grocery</a></li>
			<li><a href="sport.php">Sports,Fitness</a></li>
			<li><a href="toy.php">Toy,Baby Product,Kid's Fashion</a></li>
			<li><a href="car.php">Car,MotorBike,Industriyal</a></li>
		</ul>
		</li>
	 <li><a href="category.php">
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
		<div style="width:100%">		 
			<table style="width:100%; display:inline-block; overflow:hidden; font-size:17px;">
			<?php
			while($row=mysqli_fetch_array($query_run))
			{
			?>
		<th>
			<td><img src="<?php echo $row['imglink']?>" width="293px" height="293px">
			<h3>Product:-<b style="color:red; font-size:20px;"><?php echo $row['product']?></b></h3>
			<h3>Brand:-<b style="color:red; font-size:20px;"><?php echo $row['brand']?></b></h3>
			<h3>Price:-<b style="color:red; font-size:20px;"><?php echo $row['price']?></b></h3>
			<a href="detail.php?id=<?php echo $row['id']?>"><button style="background-color:#4CAF50; font-size:15px;" value="Click Here For More Details"
			name="fetch_btn" class="delete_btn"><b>Click Here For More Details</b></button></td></img></a>
		</th>
			<?php
			}
		?>
	</table>
	</div>
			<div>
			<?php
				$query="select * from categoryinformation3 where category='Car,MotorBike,Industriyal'";
				$query_run=mysqli_query($con,$query);
				
				$count=mysqli_num_rows($query_run);
				$num=$count/5;
				$a=ceil($num);
			?>
			<?php
			if(1<$page)
			{
			?>
				<a href="car.php?page=<?php echo $page-1?>"><button style="background-color:red; font-size:15px; width:100px" class="delete_btn"><b>
				Privious</b></button></a>
			<?php
			}
			?>
			<?php
				for($b=1; $b<=$a; $b++)
				{
			?>
				<a href="car.php?page=<?php echo $b?>"><button style="background-color:#4CAF50; font-size:15px; width:5px;" class="delete_btn">
				<b><?php echo $b?></b></button></a>
			<?php
				}	
			?>
			<?php
			if($num>$page)
			{
			?>
				<a href="car.php?page=<?php echo $page+1?>"><button style="background-color:red; font-size:15px; width:70px" class="delete_btn"><b>
				Next</b></button></a>
			<?php
			}
			?>
			</div>
	<?php
	include('footer.php')
	?>
</body>
</html>