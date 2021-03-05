<?php

session_start();
if($_SESSION['username'])
{
$id = $_GET['id'];
$qty = $_GET['qty'];

if(isset($_SESSION['productcart']))
{
	$currentno = $_SESSION['counter']+1;
	$_SESSION['productcart'][$currentno] = $id;
	$_SESSION['qtycart'][$currentno] = $qty;
	$_SESSION['counter'] = $currentno;
}
else
{
	$productcart = array();
	$qtycart = array();
	
	$_SESSION['productcart'][0] = $id;
	$_SESSION['qtycart'][0] = $qty;
	$_SESSION['counter'] = 0;
}
}
else
{
	echo '<script type="text/javascript">alert("you Are Not Log in")</script>';
}
header('location:cart.php');
?>