<?php
	require 'dbconfi/confi.php';	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add category</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<script type="text/javascript">
		var loadFile = function(event) {
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
	<?php
   if(isset($_POST['sb_btn']))
   {
	   $date=$_POST['date'];
	   $category=$_POST['category'];
	   $product=$_POST['product'];
	   $brand=$_POST['brand'];
	   $price=$_POST['price'];
	   $description=$_POST['description'];
	   
	   $img_name=$_FILES['imglink']['name'];
	   $img_tmp=$_FILES['imglink']['tmp_name'];
	   
	   $folder='upload/';
	   $target_file=$folder.$img_name;
	  
	   move_uploaded_file($img_tmp,$target_file);
	   $query="insert into categoryinformation3 values('','$date','$category','$product','$brand','$price','$description','$target_file')";
	   $query_run=mysqli_query($con,$query);
			if($query_run)
				{
					header('location:category.php');
				}
			else
				{
					echo'<script type="text/javascript">alert("error")</script>';
				} 
   }
   ?>
	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="addbtn.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					ADD/EDIT/DELETE category
				</span>
				
				<div class="wrap-input100 validate-input"  data-validate="Date is required: Date/month/year">
					<span class="label-input100">Date</span>
					<input class="input100" type="date" required name="date" placeholder="Enter Date">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "category is required: ex:shoes/care">
					<span class="label-input100">Category</span><br><br>
					<select name="category">
					<option>Electronics</option>
					<option>Men,Women Fashion</option>
					<option>Beauty,Health,Grocery</option>
					<option>Sports,Fitness</option>
					<option>Toy,Baby Product,Kid s Fashion</option>
					<option>Car,MotorBike,Industriyal</option>
					</select>
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate = "category is required: ex:shoes/care">
					<span class="label-input100">Product</span>
					<input class="input100" type="text" name="product" placeholder="Enter Product name" required>
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate = "Brand is required: ex:nike/addidas">
					<span class="label-input100">Brand</span>
					<input class="input100" type="text" name="brand" placeholder="Enter Brand" required>
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate = "price is required: ex:500/1000">
					<span class="label-input100">Price</span>
					<input class="input100" type="number" name="price" placeholder="Enter Price" required>
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input">
					<span class="label-input100">Description</span>
					<textarea class="input100" name="description" placeholder="Enter Description about Product..." required></textarea>
					<span class="focus-input100"></span>
				</div>
				
				<div>
				<center><img id="output" width="200"></img></center>
				<center><input type="file" name="imglink" id="file" onchange="loadFile(event)" ></center>
				</div>
				
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" type="submit" name="sb_btn">
							<span>
								Add
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>
</html>
