<?php
	require 'dbconfi/confi.php';
	$page=1;
	$pid="";
session_start();
?>
<html>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
  <meta name="Keywords" content="Online Shopping in India,online Shopping store,Online Shopping Site,Buy Online,Shop Online,Online Shopping,Shop Now">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="Description" content="India's biggest online store for Mobiles, Fashion (Clothes/Shoes), Electronics, Home Appliances, Books, Home, Furniture, Grocery, Jewelry, Sporting goods, Beauty & Personal Care and more! 
		Find the largest selection from all brands at the lowest prices in India. Payment options - COD, EMI, Credit card, Debit card &amp; more.">
</head>
<title>Online Shopping in India,online Shopping store,Online Shopping Site,Buy Online,Shop Online,Online Shopping,Shop Now</title>
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
		
.mySlides {display: none;}
img {vertical-align: middle;}

.slideshow 
{	
  max-width: 1200px;
  position: relative;
  margin: auto;
  padding:3px;
}
.dot
 {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}
.active
 {
  background-color: #4CAF50;
}
.fade
 {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}
@-webkit-keyframes fade
 {
  from {opacity: .4} 
  to {opacity: 1}
}
@keyframes fade 
{
  from {opacity: .4} 
  to {opacity: 1}
}
@media only screen and (max-width: 300px) 
{
  .text {font-size: 11px}
}
.fa-thumbs-down
 {
  transform:rotateY(180deg);
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
		?>
		<!--
		<div>
		<form action="search.php" method="GET"> 
		<input type="text" name="search" style="line-height:30px;" placeholder="Search Product">		
		<button style="background-color:#4CAF50; width:100px; font-size:10px;" value="Search"
			name="search" class="delete_btn"><b>Search</b></button>
		</form>
		</div>
		-->
		</span></h1></center>
	</div>	
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
$query="select * from categoryinformation3 limit $page1,5";
$query_run=mysqli_query($con,$query);
?>
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
	  <i class="fa fa-lock" style="font-size:20px;"></i>&nbsp;&nbsp;<font style="font-size:20px;">Login</font></a></li>
	 <?php } ?>
	</ul>
	</div>

<div class="slideshow">

<div class="mySlides fade">
  <img src="image\image.jpeg" style="width:1200px; height:600px;">
</div>
																				
<div class="mySlides fade">
  <img src="image\image2.jpeg" style="width:1200px; height:600px;">
</div>

<div class="mySlides fade">
  <img src="image\image4.jpeg" style="width:1200px; height:600px;">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
	
			<table>
			<div style="width:100%; display:auto; overflow:auto; font-size:17px;">
			<?php
			while($row = mysqli_fetch_array($query_run))
			{
			?>
			<th>
			<td>
			<img src="<?php echo $row['imglink']?>" width="293px" height="293px"></img>
			<h3>Product:-<b style="color:red; font-size:20px;"><?php echo $row['product']?></b></h3>
			<h3>Brand:-<b style="color:red; font-size:20px;"><?php echo $row['brand']?></b></h3>
			<h3>Price:-<b style="color:red; font-size:20px;"><?php echo $row['price']?></b></h3>
			<a href="detail.php?id=<?php echo $row['id']?>"><button style="background-color:#4CAF50; font-size:15px;" value="Click Here For More Details"
			name="fetch_btn" class="delete_btn"><b>Click Here For More Details</b></button></a>
			<?php } ?>
			</td>
			</th>
			</div>
			</table>
			
			
			<div>
			<?php
				$query="select * from categoryinformation3";
				$query_run=mysqli_query($con,$query);
				
				$count=mysqli_num_rows($query_run);
				$num=$count/5;
				$a=ceil($num);
			?>
			<?php
			if(1<$page)
			{
			?>
				<a href="home2.php?page=<?php echo $page-1?>"><button style="background-color:red; font-size:15px; width:100px" class="delete_btn"><b>
				Privious</b></button></a>
			<?php
			}
			?>
			<?php
				for($b=1; $b<=$a; $b++)
				{
			?>
				<a href="home2.php?page=<?php echo $b ?>"><button style="background-color:#4CAF50; font-size:15px; width:5px;" class="delete_btn">
				<b><?php echo $b?></b></button></a>
			<?php
				}	
			?>
			<?php
			if($num>$page)
			{
			?>
				<a href="home2.php?page=<?php echo $page+1?>"><button style="background-color:red; font-size:15px; width:70px" class="delete_btn"><b>
				Next</b></button></a>
			<?php
			}
			?>
			</div>
	<?php
	include('footer.php');
	?>
	
<script type="text/javascript">
var slideIndex = 0;
showSlides();

function showSlides() 
{
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) 
  {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length)
	  {
		  slideIndex = 1
	  }    
  for (i = 0; i < dots.length; i++)
	  {
    dots[i].className = dots[i].className.replace(" active", "");
      }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); 
}
	
</script>
</body>
</html>