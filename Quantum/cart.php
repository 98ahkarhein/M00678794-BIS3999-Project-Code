<?php 
 session_start();
 require ('connect.php');
 	$pid=$_GET['PID'];
 	$query="SELECT * FROM product,brand,category where "



 ?>





<!DOCTYPE html>
<html>
<head>
	<title>cart</title>
</head>
<body>
<form action="cart.php" method="post" enctype="multipart/form-data">
	<table align="center">
		<tr>
			<td><h1>This is your cart</h1></td>
		</tr>
	</table>
	<table>
		<tr>
			<td>
				<table>
					
				</table>
			</td>
		</tr>





	</table>
</form>
</body>
</html>