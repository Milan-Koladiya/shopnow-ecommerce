<?php
			session_start();
			require 'dbconfi/confi.php';
			
				$username=$_SESSION['username'];
				$id=$_GET['id'];
				$action='Like';
				
				$query="SELECT * FROM productRating WHERE username='$username' AND pid='$id' AND action='DisLike'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$query="UPDATE productRating SET action='$action' WHERE username='$username' AND pid='$id'";
					$query_run=mysqli_query($con,$query);
				}
				else
				{
					$query="SELECT * FROM productRating WHERE username='$username' AND pid='$id' AND action='Like'";
					$query_run=mysqli_query($con,$query);
					if(mysqli_num_rows($query_run)>0)
					{
						echo "You Have Click Dislike button";
					}
					else
					{
					$query="insert into productRating values('','$username','$id','$action')";
					$query_run=mysqli_query($con,$query);
					}
				}
			header("location:detail.php?id=$id");
			?>