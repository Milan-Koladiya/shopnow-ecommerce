<?php 
				session_start();
				require 'dbconfi/confi.php';
			?>
			<?php
				$user=$_SESSION['username'];
				$query="DELETE FROM address WHERE user='$user'";
				$query_run=mysqli_query($con,$query);
				if($query_run)
				{
					header('location:address.php');
				}
				else
				{
					echo "data not found";
				}
			?>