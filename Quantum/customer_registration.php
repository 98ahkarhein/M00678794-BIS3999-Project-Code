<?php 
session_start();
require ('connect.php');
//require ('function.php');
if (isset($_POST['btncreateaccount'])) 
{
	$cusid=$_POST['txtcustomerid'];
	$firstname=$_POST['txtfirstname'];
	$lastname=$_POST['txtlastname'];
	$email=$_POST['txtemail'];
	$password=$_POST['txtpass'];
	$address1=$_POST['txtaddress1'];
	$address2=$_POST['txtaddress2'];
	$town=$_POST['txttown'];
	$postcode=$_POST['txtpostcode'];
	$phone=$_POST['txtphone'];
//-----------------check email---------------------
	$checkemail="SELECT * FROM customer WHERE email=$txtemail";
	$ret=mysqli_query($mysqli,$checkemail);
	$count=mysqli_num_rows($ret);
		if ($count !==0) 
		{
			echo "<script>window.alert('Email address already exist')</script>";
			echo "<script>window.location='customer_registration.php'</script>";
		}
		else
		{
			$insert="INSERT INTO customer (customer_id,firstname,lastname,address1,address2,town,postcode,phoneno,email,email,password)
					VALUES ('$cusid','$firstname','$lastname','$address1','address2','$town','$postcode','$phone','$email','$password')";
			$ret=mysqli_query($mysqli,$insert);
			if ($ret) 
			{
				echo "<script>window.alert('Account successfully created!')</script>";
				echo "<script>window.location='customer_login.php'</script>";
			}
			else
			{
				echo "Error:" . $insert . "<br>" . mysqli_error($con);
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<script>
	function CheckValidation()
	{
		var password=document.getElementById('txtpass').value;
		var repassword=document.getElementById('txtrepass').value;
		var email=document.getElementById('txtemail').value;
		var reemail=document.getElementById('txtconfirmemail').value;
		// check password length----------------------------------------
		if (password.length < 8 || password.length > 16)
		{
			alert('Passowrd length should be between 8 and 16 characters.');
			return false;
		};
		//--------------------------------------------------------------

		// check password-----------------------------------------------
		if (password != repassword) 
		{
			alert('Passwords do not match.');
			return false;
		};
		//--------------------------------------------------------------

		// check email--------------------------------------------------
		if (email != reemail) 
		{
			alert('Emails do not match');
			return false;
		};
		//--------------------------------------------------------------
	}
	</script>
</head>
<body>
<form action="customer_registration.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="txtcustomerid" value="<?php echo "CUS-" . uniqid(); ?>">
	<table align="center">
<tr>
<td>
	<ul class="menu cf">
  <li><a href="home_page.php">QUANTUM TECHNOLOGY</a></li>
  <li>
    <a href="sale_computer.php">Computing</a>
    <ul class="submenu">
      <li><a href="">MACBOOK</a></li>
      <li><a href="">PC</a></li>
      <li><a href="">GAMING</a></li>
      <li><a href="">WINDOWS LAPTOP</a></li>
    </ul>			
  </li>
  <li><a href="sale_phone.php">Phone</a></li>
  <li><a href="sale_tv.php">Television</a></li>
  <li><a href="">ABOUT</a></li>
  <li><a href="customer_login.php">  Login</a></li>

</ul>
</td>
</tr>
</table>




	<table align="center"  cellpadding="10">
		<tr>
			<td><h1>Registration Here!</h1></td>
		</tr>
	</table>
	<table align="center" class="bar" cellpadding="20">
	<tr>
		
		<td>First Name</td>
		<td>Last Name</td>
	</tr>
	<tr>
		<td>
			<input type="text" class="textboxd2" name="txtfirstname" placeholder="Your First Name">
		</td>
		<td>
			<input type="text" class="textboxd2" name="txtlastname" placeholder="Your Last Name">
		</td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td>Confrim your Email</td>
	</tr>
	<tr>
		<td><input type="text" class="textboxd2" name="txtemail" id="txtemail" placeholder="Your Email" onclick="checkvalidation()"></td>
		<td><input type="text" class="textboxd2" name="txtconfirmemail" id="txtconfirmemail" placeholder="Retype your email" onclick="checkvalidation()"></td>
	</tr>
	<tr>
		<td>Password</td>
		<td>Retype Password</td>
	</tr>
	<tr>
		<td><input type="password" class="textboxd2" name="txtpass" id="txtpass" placeholder="Create your Password"></td>
		<td><input type="password" class="textboxd2" name="txtrepass" id="txtrepass" placeholder="Confirm your Password"></td>
	</tr>
	<tr>
		<td>Address line 1</td>
		<td>Address line 2</td>
	</tr>
	<tr>
		<td><textarea name="txtaddress1" class="textboxd2"></textarea></td>
		<td><textarea name="txtaddress2" class="textboxd2"></textarea></td>
	</tr>
	<tr>
		<td>Town/City</td>
		<td>Country</td>
	</tr>
	<tr>
		<td><input type="text" class="textboxd2" name="txttown" placeholder="Name of town or city"></td>
		<td>United Kingdom</td>
	</tr>
	<tr>
		<td>Post Code</td>
		<td>Phone Number</td>
	</tr>
	<tr>
		<td><input type="text" class="textboxd2" name="txtpostcode" placeholder="Please type your postcode"></td>
		<td><input type="text" class="textboxd2" name="txtphone" placeholder="Please type your number"></td>
	</tr>
	<tr>
		<td><input type="submit" class="btnd" name="btncreateaccount" value="Create account" onClick="return CheckValidation()"></td>
		<td><input type="reset" class="btnd" name="btnclear" value="Cancel"></td>
	</tr>
	</table>
</form>
</body>
</html>