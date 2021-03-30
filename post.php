<?php
	session_start();
	require 'dbconfi/confi.php';
	

				$username=$_SESSION['username'];
				$id=$_GET['id'];
				$description=$_POST['description'];
			
			$query="select * from review where username='$username' AND pid='$id'";
			$query_run=mysqli_query($con,$query);
			
				if(mysqli_num_rows($query_run)>0)
				{
					echo "You Write Review Already In This Product";
				}
				else
				{
					$query="insert into review values('','$username','$id','$description')";
					$query_run=mysqli_query($con,$query);
				}
			header("location:detail.php?id=$id");
	?>