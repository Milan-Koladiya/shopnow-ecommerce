<?php
	require 'dbconfi/confi.php';
	$password="";
	$username="";
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
<title>ShopNow.com</title>
<style>
	
	input[type=text], 
	input[type=password] { 
		width: 100%; 
		padding: 12px 20px; 
		margin: 8px 0; 
		display: inline-block; 
		border: 1px solid #ccc; 
		box-sizing: border-box; 
	}  
	.sub_btn{ 
		background-color: #4CAF50; 
		color: white;
		padding: 10px 20px; 
		margin: 0 auto; 
		border: none; 
		cursor: pointer; 
		width: 100%;
	}
		
	.back_btn{ 
		background-color: #4CAF50; 
		color: white; 
		padding: 14px 20px; 
		background-color: red;
		margin: 8px 0; 
		border: none; 
		cursor: pointer; 
		width: 25%; 
	}
	
	.sub_btn:hover { 
		opacity: 0.8; 
	} 
	.back_btn:hover { 
		opacity: 0.8; 
	} 
	.container { 
		padding: 6px; 
		width:500px;
		margin:0 auto;
		border:2px solid #2c3e50;
		border-radius:10px;
		box-shadow: 0px 26px 48px 0px rgba(255,255,255,0.2);
		background-color:white;
	} 
	@media screen and (max-width: 300px) { 
		span.psw { 
			display: block; 
			float: none; 
		} 
	} 
</style> 
	<?php
		if(isset($_POST['fetch']))
		{
				$username=$_POST['username'];
				$emailid=$_POST['emailid'];
				$_query = "SELECT * FROM userinformation WHERE username='$username' AND emailid='$emailid'";     
				$result = mysqli_query($con,$_query);
	
				if(mysqli_num_rows($result)>0)
					{
						$row=mysqli_fetch_array($result);
						$password=$row['password'];
					}
				else
					{
						echo'<script type="text/javascript">alert("invalid Creditials")</script>';
					}	
		}
			else if(isset($_POST['update']))
			{
			$password=$_POST['password'];
			
			$query="UPDATE userinformation SET password='$password' WHERE username='$username'";
			$query_run=mysqli_query($con,$query);
			if($query_run)
			{
				echo'<script type="text/javascript">alert("update succsfully")</script>';
			}
			else
			{
				echo'<script type="text/javascript">alert("error in query")</script>';
			}
			}
	?>
<body style="background-color:#7f8c8d"> 
	<div class="container"> 
		<form action="forgot.php" method="post"> 
			<h1><center>Forgot Password</center></h1>			
			<label><b>Username:</b></label> 
			<input type="text" placeholder="Enter Username" name="username" ><br> 
			<label><b>Email ID:</b></label> &nbsp;
		    <input type="text" placeholder="Enter Email ID" name="emailid" id="mn" ><br>
		    <input class="sub_btn" type="submit" style="font-size:20px;" name="fetch" value="Fetch Your Password">
			<div>
			<label><b>Password:</b><label>
			<input type="text" value="<?php echo $password?>" id="p1" placeholder="Enter Password" name="password" ><br>
			</div>
			<div>
			<input class="back_btn" type="submit" name="update" style="font-size:20px; width:100%;" value="Update Your Password">
			</div>
		</form>
	</div>
</body> 
</html>