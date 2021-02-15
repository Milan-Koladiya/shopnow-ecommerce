<?php
	require 'dbconfi/confi.php';
	session_start();
?> 
<html> 
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="Keywords" content="Online Shopping in India,online Shopping store,Online Shopping Site,Buy Online,Shop Online,Online Shopping,Shop Now">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="Description" content="India's biggest online store for Mobiles, Fashion (Clothes/Shoes), Electronics, Home Appliances, Books, Home, Furniture, Grocery, Jewelry, Sporting goods, Beauty & Personal Care and more! 
		Find the largest selection from all brands at the lowest prices in India. Payment options - COD, EMI, Credit card, Debit card &amp; more.">
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
		width: 100%;; 
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
		box-shadow: 20px 20px 20px 20px rgba(255,255,255,0.2);
		background-color:white;
	} 
	@media screen and (max-width: 300px) { 
		span.psw { 
			display: block; 
			float: none; 
		} 
	}
</style>
	<script type="text/javascript">
	function show()
	{
		var x=document.getElementById('pass');
		if(x.type=="password")
		{
			x.type="text";
		}
		else
		{
			x.type="password";
		}
	}
	</script>
</head>
<body style="background-color:#7f8c8d">
	<div style="width:540px;  margin:0 auto; ">
		<div class="container"> 
	    <form action="" method="POST">
			<div>
			<h1><center>Login Page</center></h1>
			<label><b>Username</b></label> 
			<input type="text" placeholder="Enter Username" name="username" required >
			<label><b>Password</b></label>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<i class="fa fa-eye" style="cursor: pointer;" onclick="show()">&nbsp;<span style="color:red;">Show password</span></i>
			<input type="password" id="pass" placeholder="Enter Password" name="password" required>
			<span>Click Here To <a href="forgot.php" style="text-decoration:none; color:red;">Forgot Password?</a></span><br>&nbsp;
			<input class="sub_btn" type="submit" style="font-size:20px;" name="login" placeholder="Login" value="Login"> 
			<a href="resiter.php"><input class="back_btn" type="button" style="font-size:20px;" value="Resiter"></a>
			</div>
		</form>
	</div>
	</div>
</body>

	<?php
	if(!isset($_SESSION['username']))
	{
		if(isset($_POST['login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
		 
			$query="SELECT * FROM userinformation WHERE username='$username' AND password='$password' ";
			$query_run=mysqli_query($con,$query);
			$num=mysqli_num_rows($query_run);
			
					if($num>0)
					{
						$_SESSION['username'] = $username;
						header('location:home2.php');
					}
			else
			{
				echo '<script type="text/javascript">alert("Invalid creditial")</script>';
			}
		}
	}
	else
	{
		echo '<script type="text/javascript">
		alert("You Are Already logged in");
		window.location.href="home2.php";
		</script>';
	}

?>
</html> 
