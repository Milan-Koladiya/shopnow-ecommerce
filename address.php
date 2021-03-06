<?php
	require 'dbconfi/confi.php';
	session_start();
	if(isset($_SESSION['productcart']))
	{
	$currentno = $_SESSION['counter']+1;
	$charge = $currentno * 40;
	$sum = $_SESSION['finaltotal'] + $charge;
	}
	else
	{
		echo '<script type="text/javascript">alert("you are not logged in")</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.cheakout{
  flex: 25%;
}

.payment{
  flex: 50%;
}

.address {
  flex: 75%;
}

.payment,
.cheakout,
.address {
	  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 3px solid #555555;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .cheakout {
    margin-bottom: 20px;
  }
}
		.delete_btn{
		color: white;
		padding: 5px 7px; 
		margin: 5px auto; 
		border: 2px solid black;
		border-radius:10px;
		cursor: pointer; 
		width: 80px;
		}
		.delete_btn:hover{
			opacity:0.8;
		}
</style>
</head>
<body>
<!-- insert address in database -->
<?php
if(isset($_POST['cheakout_btn']))
{ 
			$user=$_SESSION['username'];
			$fullname = $_POST['fullname'];
			$email = $_POST['email'];
			$address  = $_POST['address'];
			$city = $_POST['city'];
			$mobilenumber = $_POST['mobilenumber'];
			$state = $_POST['state'];
			$zip = $_POST['zip'];
			$cardname = $_POST['cardname'];
			$cardnumber = $_POST['cardnumber'];
			$expmonth = $_POST['expmonth'];
			$expyear = $_POST['expyear'];
			$cvv = $_POST['cvv'];
	
		$query="SELECT * FROM address WHERE user='$user'";
		$query_run=mysqli_query($con,$query);
		if(mysqli_num_rows($query_run)>0)
		{
			$query="UPDATE address SET fullname='$fullname' WHERE user='$user'";
			$query_run=mysqli_query($con,$query);

		}
		else
		{
			$query="insert into address values('','$user','$fullname','$email','$address','$city','$mobilenumber','$state','$zip','$cardname','$cardnumber'
			,'$expmonth','$expyear','$cvv')";
			$query_run=mysqli_query($con,$query);
			while($query_run)
				{
					echo '<script type="text/javascript">alert("submit sucees fully")</script>';
					header('location:order.php');
				}
		}
	 }
?>
<!-- fetch address Of user  -->
				<?php
				if(isset($_SESSION['username']))
				{
					$user=$_SESSION['username'];
					$query="SELECT * FROM address WHERE user='$user'";
					$query_run=mysqli_query($con,$query);

					if(mysqli_num_rows($query_run)>0)
					{
				?>
<center><h2>Your Address</h2></center>
<div style="width:100%";>
	<div class="container" style="width:100%;">
		<table style="width:100%;">
			<tr>
				<th>Full Name</th>
				<th>Email</th>
				<th>Address</th>
				<th>City</th>
				<th>Mobile Number</th>
				<th>State</th>
				<th>Zip</th>
				<th colspan="2"></th>
			</tr>
			<?php $row=mysqli_fetch_array($query_run);?>
			<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
			<tr style="text-align: center;">
				<td><?php echo $row['fullname']?></td>
				<td><?php echo $row['email']?></td>
				<td><?php echo $row['address']?></td>
				<td><?php echo $row['city']?></td>
				<td><?php echo $row['mobilenumber']?></td>
				<td><?php echo $row['state']?></td>
				<td><?php echo $row['zip']?></td>
				<td><a href="deleteadd.php"><button style="background-color:red; font-size:15px;" value="DELETE" name="delete_btn" class="delete_btn"><b>DELETE</b></button></a></td>
				<td><a href="address.php"><button style="background-color:Yellow; color:black; font-size:15px;" value="EDIT" name="edit_btn" class="delete_btn"><b>EDIT</b></button></a></td>
			</tr>
		</table>
	<?php } } ?>
</div>
	</div>
<center><h2>Add New Address</h2></center>
<div class="row">
  <div class="address">
    <div class="container">
      <form action="address.php" method="POST">
        <div class="row">
          <div class="payment">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fullname" placeholder="Milan Koladiya" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="milan@example.com"  required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="100 Prabhurkupa soca" required>
			<div class="row">
				<div class="payment">
					<label for="city"><i class="fa fa-institution"></i> City</label>
					<input type="text" id="city" name="city" placeholder="Surat" required>
				</div>
				<div class="payment">
					<label for="city"><i class="fa fa-mobile" style="font-size:25px;"></i>&nbsp;&nbsp;Mobile Number</label>
					<input type="text" id="mobilenumber" name="mobilenumber" placeholder="7069680214" required>
				</div>
			</div>
            <div class="row">
              <div class="payment">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="Gujrat"  required>
              </div>
              <div class="payment">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="395010" required>
              </div>
            </div>
          </div>
          <div class="payment">
		  <div class="payment">
		  <h3>Payment</h3>
		  </div>
		  <div class="row">
			<div class="payment">
			<label for="fname">Select to Card Payment</label>
				<div class="icon-container">
					<a href="address.php"><i class="fa fa-cc-visa" style="color:navy;"></i></a>
					<a href="address.php"><i class="fa fa-credit-card" style="color:blue;"></i></a>
					<a href="address.php"><i class="fa fa-cc-mastercard" style="color:red;"></i></a>
				</div>
			</div>
			<div class="payment">
			<label for="fname">Wallet Payment</label>
				<div class="icon-container">

				</div>
			</div>
		</div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Milan bharatbhai koladiya">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="payment">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="payment">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>	
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <a href="order.php"><input type="submit" value="Continue to payment" name="cheakout_btn" class="btn"></a>
      </form>
    </div>
  </div>
  <div class="cheakout">
    <div class="container">
	<table style="width:100%">
	<tr>
      <th style="text-align:left"><span style="font-size:20px;">PRICE DETAILS</span></th>
	</tr>
	<tr><td><hr></td><td><hr></td></tr>
	<tr><td></td> <td></td></tr>
	<tr><td></td> <td></td></tr>
	<tr> 
	  <td style="text-align:left"><span>Price&nbsp;(</span><?php if(isset($_SESSION['productcart'])){echo $currentno; }?>&nbsp;<span>iteams)</span></td>
	  <td style="text-align:right"><span><?php if(isset($_SESSION['productcart'])){echo $_SESSION['finaltotal'];} ?></span></td></p>
    </tr>
	<tr><td></td> <td></td></tr>
	<tr><td></td> <td></td></tr>
	<tr><td></td> <td></td></tr>
	 <tr>
	  <td style="text-align:left"><span>Delivery Charge</span></td>
	  <td style="text-align:right"><span><?php if(isset($_SESSION['productcart'])){echo $currentno;}?>
	  <span>*40=</span><?php if(isset($_SESSION['productcart'])){echo $charge;}?></span></td></p>
    </tr>
	<tr><td><hr></td><td><hr></td></tr>
	<tr><td></td> <td></td></tr>
	<tr><td></td> <td></td></tr>
	<tr><td></td> <td></td></tr>
	<tr>
	  <td style="text-align:left"><b>Final Amount</b></td>
	  <td style="text-align:right"><span><?php if(isset($_SESSION['productcart'])){echo $sum;}?></span></td></p>
    </tr>
	</table>
	</div>
  </div>
</div>
</body>
</html>
