<?php
			session_start();
			require 'dbconfi/confi.php';
			
				$username=$_SESSION['username'];
				$id=$_GET['id'];
				$commentname=$_GET['commentname'];
				$action='Like';
				
				$query="SELECT * FROM commentlike WHERE username='$username' AND commentname='$commentname' AND pid='$id' AND action='DisLike'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$query="UPDATE commentlike SET action='$action' WHERE username='$username' ANd commentname='$commentname' AND pid='$id'";
					$query_run=mysqli_query($con,$query);
				}
				else
				{
					$query="SELECT * FROM commentlike WHERE username='$username' AND pid='$id' ANd commentname='$commentname' AND action='Like'";
					$query_run=mysqli_query($con,$query);
					if(mysqli_num_rows($query_run)>0)
					{
						echo "You Have Click Dislike button";
					}
					else
					{
					$query="insert into commentlike values('','$username','$commentname','$id','$action')";
					$query_run=mysqli_query($con,$query);
					}
				}
			header("location:detail.php?id=$id");
			?>