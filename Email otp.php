
<?php
$success = "";
$error_message = "";
?>
<?php
		require 'dbconfi/confi.php';	
?>
<?php
if(isset($_POST["login"])) 
{
	$password=$_POST['password'];
	$result = mysqli_query($con,"SELECT * FROM userinformation WHERE password='$password' AND emailid='" . $_POST["emailid"] . "'");
	$count  = mysqli_num_rows($result);
	if($count>0) 
	{
		$otp = rand(100000,999999);
		require_once("mail_function.php");
		$mail_status = sendOTP($_POST["emailid"],$otp);
		
		if($mail_status == 1)
			{
			$result = mysqli_query($con,"INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
			$current_id = mysqli_insert_id($con);
			if(!empty($current_id))
				{
				$success=1;
				}
			}
	} 
	else
	{
		echo '<script type="text/javascript">alert("Invalid Creditial.")</script>';
	}
}
if(!empty($_POST["submit_otp"]))
	{
	$result = mysqli_query($con,"SELECT * FROM otp_expiry WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
	$count  = mysqli_num_rows($result);
	if(!empty($count))
		{
		$result = mysqli_query($con,"UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
		$success = 2;
		header('location:home2.php');
		} 
		else 
		{
		$success =1;
		echo '<script type="text/javascript">alert("Invalid OTP! Cheak Your EMail.")</script>';
		}	
	}
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
<body style="background-color:#7f8c8d">
	<?php
		if(!empty($error_message)) 
		{
	?>
	<div class="message error_message"><?php echo $error_message; ?></div>
	<?php
		}
	?>
	<div style="width:540px;  margin:0 auto; ">
		<div class="container"> 
	    <form action="" method="POST">
			<div>
			
				<?php 
					if(!empty($success == 1)) 
					{ 
				?>
				<h1><center>OTP Verification</center></h1>
				<center><p style="color:Green;">Check your email for the OTP</p></center>
				<lable><b>Enter OTP</b></lable>
				<input type="text" name="otp" placeholder="One Time Password" required>
				<input class="sub_btn" type="submit" style="font-size:20px;" name="submit_otp" placeholder="Submit OTP" value="Submit OTP">
			</div>
			
				<?php 
					}
					else if ($success == 2)
						{
					echo '<script type="text/javascript">alert("Successfully Loggedin")</script>';
				?>
				
				<?php
						}
					else 
					{
				?>
			<div>
			<h1><center>Login Page</center></h1>
			<label><b>Email id</b></label> 
			<input type="text" placeholder="Enter Emailid" name="emailid" required > 
			<label><b>Password</b></label> 
			<input type="password" placeholder="Enter Password" name="password" required>
			<input class="sub_btn" type="submit" style="font-size:20px;" name="login" placeholder="Login" value="Login">
			<a href="resiter.php"><input class="back_btn" type="button" style="font-size:20px;" value="Resiter" ></a>
			</div>
				<?php
						}
				?>
	</div>
	</div>
</body>
</html> 
