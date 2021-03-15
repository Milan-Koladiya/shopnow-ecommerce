<?php 
				require 'dbconfi/confi.php';
			?>
			<?php
				$id=$_GET['id'];
				$query="DELETE FROM categoryinformation3 WHERE id=$id";
				$query_run=mysqli_query($con,$query);
				if($query_run)
				{
					header('location:category.php');
				}
				else
				{
					echo'<script type="text/javascript">alert("data not found")</script>';
				}
			?>
			<?php
				$id=$_GET['id'];
				$query="DELETE FROM categoryinfotable2 WHERE id=$id";
				$query_run=mysqli_query($con,$query);
				if($query_run)
				{
					header('location:category.php');
				}
				else
				{
					echo'<script type="text/javascript">alert("data not found")</script>';
				}
			?>