<?php
	require 'dbconfi/confi.php';	
?>

<html lang="en">
<head>
  <title>TechJunkGigs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Multiple File Upload Using PHP And MySQL</h2>
   <form method="POST" action="" enctype="multipart/form-data">
    <div class="form-group row">
    <div class="form-group">
	<input class="input100" type="number" required name="number" placeholder="Enter id">
    <input type="file" name="files[]" class="col-xs-4 btn btn-default" id="file" multiple/>
 <input type="submit" name="submit" style="width:100px;" class="btn btn-primary" value="Upload">
    </div>
 </div>
  </form>
</div>
<?php
       if(isset($_POST['submit'])){
		   $number=$_POST['number'];
       $valuefldr = 'uploadd/';
 foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
 $file_name = $key.$_FILES['files']['name'][$key];
 $file_tmp =$_FILES['files']['tmp_name'][$key];
       $desired_dir= $valuefldr;
 if(move_uploaded_file($file_tmp,"$desired_dir/".$file_name))
 {
 $query="insert into categoryinfotable2 VALUES('$number','$file_name')";
 $result=mysqli_query($con,$query);  
 }
 
   } 
  }   
?>
</body>
</html>