<?php
session_start();
require ('connect.php');

if(isset($_POST['btnsignin']))
{
	$email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];

	$query="SELECT * FROM customer
			WHERE email='$email'
			AND password='$password'";
		$ret=mysqli_query($mysqli,$query);
		$row=mysqli_fetch_array($ret);
		$count=mysqli_num_rows($ret);

		if($count==0)
		{
			echo "<script>window.alert('UserName or Password Incorrect')</script>";
			echo "<script>window.location='customer_login.php'</script>";
		}
		else
		{
			$_SESSION['customer_id']=$row['customer_id'];
			$_SESSION['first_name']=$row['first_name'];
			//$_SESSION['Profile_Image']=$row['Profile_Image'];
			$FN=$_SESSION['first_name'];
			echo "<script>window.alert('Welcome $FN')</script>";
			echo "<script>window.location='home_page.php'</script>";
		}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign in to your account</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<form action="customer_login.php" method="post" enctype="multipart/form-data">
	<table align="center" cellpadding="15">
		<td></td>
	<td><input type="text" class="textboxd1" name="txtdata" ></td>
	<td><input type="submit" class="btnd" name="btnsearch" value="Search"></td>
</table>
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
  <?php if (!isset($_SESSION['customer_id'])) 
  		{
  			echo "<li><a href='customer_login.php'>Log In</a></li>";
  			echo "<li><a href='customer_registration.php'>Register Here!</a></li>";
  		}
  		else
  		{
  			echo "<li><a href='Logout.php'>Register Here!</a></li>";
  		}
   ?>
</ul>
</td>
</tr>
</table>
<table align="center">
	<td><h1>Login to your account</h1></td>
</table>
<table align="center" class="bar" cellpadding="6">
	<tr>
		<td>Enter Your Email</td>
	</tr>
	<tr>
		<td><input type="text" class="textboxd2" name="txtemail" placeholder="Email address"></td>
	</tr>
	<tr>
		<td><input type="password" class="textboxd2" name="txtpassword" placeholder="Password"></td>
	</tr>
	<tr>
		<td><input type="checkbox" name="chkremember" value="remember me">Remember Me</td>
	</tr>
	<tr>
		<td><input type="submit" class="btnd" name="btnsignin" value="Sign In"></td>
	</tr>
</table>
</form>
</body>
</html>