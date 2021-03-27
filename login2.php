
<?php
session_start();
if(isset($_SESSION['username']))
{
	echo '<script type="text/javascript">alert("you are logged in")</script>';
	header('location:home2.php');
}
else
{
	header('location:login.php');
}
?>