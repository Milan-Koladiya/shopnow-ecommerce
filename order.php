<?php
	require 'dbconfi/confi.php';
	session_start();
?>
<html>
	<head>
		<style>
				
		</style>
	</head>
	
	<body>
		<?php
		if(isset($_SESSION['username']))
		{
			if(isset($_SESSION['productcart']))
			{
			foreach($_SESSION['productcart'] as $key => $value)
			$query="select * from categoryinformation3 where id='{$value}'";
			$query_run = mysqli_query($con,$query);
			$row=mysqli_fetch_array($query_run);
			
			$username=$_SESSION['username'];
			$qty=$_SESSION['qtycart'][$key];
			$product=$row['product'];
			$price=$row['price'];
			$img=$row['imglink'];
			
			$query="insert into orderdetail values('','$username','$product','$qty','$price','$img')";
			$query_run=mysqli_query($con,$query);
			}
			else
			{
				echo "Your Cart Is Empty..";
			}
		}
		?>
		<div>
		</div>
	</body>
</html>