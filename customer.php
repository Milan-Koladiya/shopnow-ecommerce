<?php require 'dbconfi/confi.php';

$username="";
$fullname="";
$emailid="";
$qulification="";
$password="";
$xender="";
session_start();
?>
<html>
<head>
  <meta name="Keywords" content="Online Shopping in India,online Shopping store,Online Shopping Site,Buy Online,Shop Online,Online Shopping,Shop Now">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="Description" content="India's biggest online store for Mobiles, Fashion (Clothes/Shoes), Electronics, Home Appliances, Books, Home, Furniture, Grocery, Jewelry, Sporting goods, Beauty & Personal Care and more! 
		Find the largest selection from all brands at the lowest prices in India. Payment options - COD, EMI, Credit card, Debit card &amp; more.">
<title>Here You Can Show Your Profile Detail.</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	.sub_btn:hover { 
		opacity: 0.8; 
	} 
	.container { 
		padding: 6px; 
		width:500px;
		margin:3px auto;
		border:8px solid #2c3e50;
		border-radius:10px;
		box-shadow: 20px 20px 20px 20px #4CAF50;
		background-color:white;
	} 
	@media screen and (max-width: 300px) { 
		span.psw { 
			display: block; 
			float: none; 
		} 
	}
			table td a
		{
			text-decoration:none;
		}
		table td a:hover
		{
			border-bottom:1px solid white;
		}	
		form #text input
		{
			color:red;
			font-weight:bold;
		}
		form #text input:hover
		{
			border-bottom:2px solid red;
			color:black;
		}
		form #button:hover
		{
			border:2px solid red;
		}
</style>
	<script type="text/javascript">
	function onover(){
		var x = document.getElementById('p1');
		if(x.type=='password'){
			x.type='text'
		}
	}
	function onout(){
		var x = document.getElementById('p1');
		if(x.type=='text'){
			x.type='password'
		}
	}
	</script>
<body>
	<div style="height:70px;">
		<center><h1 style="font-size:50px; color:#4CAF50;">Welcome
		<span style="color:#555555">
		<?php 
		if(isset($_SESSION['username'])){
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
	 <li><a href="category.php">
	  <i class="fa fa-list" style="font-size:20px;"></i>&nbsp;&nbsp;<font  style="font-size:20px;">Category</font></a></li>
	  <li><a href="customer.php" class="active">
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
	
	<?php 
	if(isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
		$query = "SELECT * FROM userinformation WHERE username='$username'";
		$query_run = mysqli_query($con,$query);
		while($row = mysqli_fetch_array($query_run))
		{
		$fullname = $row['fullname'];
		$emailid = $row['emailid'];
		$xender = $row['xender'];
		$qulification = $row['qulification'];
		$password = $row['password'];
		}
	}
	else{
		echo '<script type="text/javascript">alert("You Are Not Loggedin")</script>';
	}
			if(isset($_POST['update_btn']))
			{
			$username=$_POST['username'];
			$fullname=$_POST['fullname'];
			$emailid=$_POST['emailid'];
			$xender=$_POST['xender'];
			$qulification=$_POST['qulification'];
			$password=$_POST['password'];
			
			$query="UPDATE userinformation SET fullname='$fullname',emailid='$emailid',
			xender='$xender',qulification='$qulification',password='$password' WHERE username='$username'";
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
 <div> 
	<div class="container">
	<div class="container">
	<form action="customer.php" method="POST"> 
			<div id="text">
			<h1><center>Profile page</center></h1>
			<label><b>Username:</b></label> 
			<input type="text" placeholder="Enter Username" readonly='readonly' name="username"  value="<?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}?>"><br>
			<label><b>Fullname:</b></label> <br>
			<input type="text" placeholder="Your Fullname" name="fullname"  value="<?php echo $fullname;?>"required><br>			
			<label><b>Emailid:</b></label> &nbsp
		    <input type="text" placeholder="Enter emailid" name="emailid" id="mn" value="<?php echo $emailid;?>"required><br>
			<label><b>xender:</b></label>&nbsp
			<input type='radio' name="xender" value='male' <?php if($xender=="male"){ ?> checked <?php }  ?>>Male
			<input type='radio' name="xender" value='female' <?php if($xender=="female") { ?> checked <?php } ?>>Female</br></br>
			<label><b>Qulification:</b></label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<select value="qulification" style="color: red;font-family:Bold" name="qulification" required>
				<option <?php if($qulification=="MBA"){?>selected<?php } ?>>MBA</option>
				<option <?php if($qulification=='BSC(IT)'){ ?>selected <?php } ?>>BSC(IT)</option>
                <option <?php if($qulification=='BE'){ ?>selected <?php } ?>>BE</option>
				<option <?php if($qulification=="B.com"){ ?>selected <?php } ?>>B.COM</option>
            </select><br><br>
		    <label><b>Password:</b><label>
			<input type="password" onmouseover="onover()" onmouseout="onout()" id="p1" placeholder="Enter Password" name="password" value="<?php echo $password;?>"required><br>
			</div>
			<div id="button">
			<input type="submit" value="Update" id="button" name="update_btn" style="font-size:20px" class="sub_btn">
			</div>
	</form>  
	</div>
	</div>
 </div>
<?php
include('footer.php');
?>
</body>
</html>