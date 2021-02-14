<?php
	require 'dbconfi/confi.php';
?>
<!DOCTYPE html> 
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
	<script type="text/javascript">
	function show()
	{
		var x=document.getElementById('p1');
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
			<div class="container"> 
	<form action="" method="POST"> 
			<h1><center>Resiteration page</center></h1>
			<label><b>Fullname:</b></label> <br>
			<input type="text" placeholder="Enter Fullname" name="fullname" required><br>			
			<label><b>Username:</b></label> 
			<input type="text" placeholder="Enter Username" name="username" required><br> 
			<label><b>Email ID:</b></label> &nbsp;
		    <input type="text" placeholder="Enter Email ID" name="emailid" id="mn"><br>
			<label><b>xender:</b></label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<input type="radio" checked name="xender" value="male" >Male
			<input type="radio" name="xender" value="female" >Female<br>
			<label><b>Qulification:</b></label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<select value="Qulification" name="qulification" required>
			<option>MBA</option>
			<option>BSC(IT)</option>
			<option>BE</option>
			<option>B.COM</option>
			</select><br>
		    <label><b>Password:</b><label>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<i class="fa fa-eye" style="cursor: pointer;" onclick="show()">&nbsp;<span style="color:red;">Show password</span></i>
			<input type="password" id="p1" placeholder="Enter Password" name="password"><br>
			<label><b>Confirm Password:</b></label> 
			<input type="password" placeholder="Enter confirm Password"  name="cpassword" required>
			<input class="sub_btn" type="submit" style="font-size:20px;" name="sub" placeholder="Resiter">
			<a href="login.php"><input class="back_btn" type="button" style="font-size:20px;" value="Login"></a>
		</div>
	</form> 
</body> 
</html> 

	<?php
		if(isset($_POST['sub']	))
		{
			$fullname = $_POST['fullname'];
			$username = $_POST['username'];
			$emailid = $_POST['emailid'];
			$xender = $_POST['xender'];
			$qulification = $_POST['qulification'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];

			if($password==$cpassword)
			{
				$query = "SELECT * FROM userinformation WHERE emailid='$emailid' OR username='$emailid' ";
				$query_run = mysqli_query($con,$query);
				
					if(mysqli_num_rows($query_run)>0){
						echo'<script type="text/javascript">alert("Emailid or Username already exist")</script>';
					}
					else
					{
						$_query="insert into userinformation values('','$fullname','$username','$emailid','$xender','$qulification','$password')";
						$query_run=mysqli_query($con,$_query);
						
						if($query_run)
						{
							echo'<script type="text/javascript">alert("You Have Successfully Resiter")</script>';
						}
						else
						{
							echo'<script type="text/javascript">alert("error in query")</script>';
						}
					}
			}
			else
			{
				echo'<script type="text/javascript">alert("password does not match")</script>';
			}
		}
	?>
</body> 
</html>