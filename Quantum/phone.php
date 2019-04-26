<?php 
error_reporting(0);
session_start();
require ('connect.php');
if (isset($_POST['btnaddph'])) 
{
	$pid=$_POST['cbopid'];
	$bid=$_POST['cbobid'];
	$cid=$_POST['cbocid'];
	$os=$_POST['txtos'];
	$display=$_POST['txtdisplay'];
	$frontcam=$_POST['txtfrontcam'];
	$backcam=$_POST['txtbackcam'];
	$storage=$_POST['txtstorage'];
	$battery=$_POST['txtbattery'];
	$colour=$_POST['txtcolour'];
	$select = "SELECT * FROM phone WHERE product_product_id='$pid' AND product_brand_brand_id = '$bid' AND product_category_category_id = '$cid'";
	$run=mysqli_query($mysqli,$select);
	$count = mysqli_num_rows($run);

	if($count!=0)
	{ 
	echo "<script> window.alert('Data you entered is already exist!'); </script>";
	echo "<script> window.location='phone.php'</script>";
	}
	
	
		
		$insert="INSERT INTO phone(os,display,front_camera,back_camera,storage,battery_capicity,colour,product_product_id,product_brand_brand_id,product_category_category_id) VALUES('$os','$display','$frontcam','$backcam','$storage','$battery','$colour','$pid','$bid','$cid')";
		
		$ret = mysqli_query($mysqli,$insert);
		if($ret)
		{
			echo "<script> window.alert('Welcome ! Your Phone is created!') </script>";
			echo "<script> window.location='phone.php' </script>"; 
		}
			else
			{
				echo "Error:" . $insert . "<br>" . mysqli_error($mysqli);
			}
	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Phone</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="phone.php" method="post" enctype="multipart/form-data">
<table align="center" cellpadding="10">
	<tr>
		<td><h1>Phone Form</h1></td>
	</tr>
</table>
<table align="center" cellpadding="10">
	<tr>
		<td>Product Name</td>
		<td>
			<select name="cbopid" class="search">
			<option>--Choose Product Name--</option>
			<?php 
			$select="SELECT * FROM product";
			$ret=mysqli_query($mysqli,$select);
			$count=mysqli_num_rows($ret);
			for ($i=0; $i <$count ; $i++) 
			{ 
				$row=mysqli_fetch_array($ret);
				$pid=$row['product_id'];
				$pname=$row['product_name'];
				echo "<option value='$pid'>$pid - $pname</option>";
			}
			 ?></select>
		</td>
	</tr>
	<tr>
		<td>Brand Name</td>
		<td>
			<select name="cbobid" class="search">
			<option>--Choose Brand Name--</option>
			<?php 
			$select="SELECT * FROM brand";
			$ret=mysqli_query($mysqli,$select);
			$count=mysqli_num_rows($ret);
			for ($i=0; $i <$count ; $i++) 
			{ 
				$row=mysqli_fetch_array($ret);
				$bid=$row['brand_id'];
				$bname=$row['brand_name'];
				echo "<option value='$bid'>$bid - $bname</option>";
			}
			 ?></select>
		</td>
	</tr>
	<tr>
		<td>Category Name</td>
		<td>
			<select name="cbocid" class="search">
			<option>--Choose Category Name--</option>
			<?php 
			$select="SELECT * FROM category";
			$ret=mysqli_query($mysqli,$select);
			$count=mysqli_num_rows($ret);
			for ($i=0; $i <$count ; $i++) 
			{ 
				$row=mysqli_fetch_array($ret);
				$cid=$row['category_id'];
				$cname=$row['category_name'];
				echo "<option value='$cid'>$cid - $cname</option>";
			}
			 ?></select>
		</td>
	</tr>
	<tr>
		<td>Operation System</tdm>
		<td><input type="text" name="txtos"></td>
	</tr>
	<tr>
		<td>Display</td>
		<td><input type="text" name="txtdisplay"></td>
	</tr>
	<tr>
		<td>Front Camera</td>
		<td><input type="text" name="txtfrontcam"></td>
	</tr>
	<tr>
		<td>Back Camera</td>
		<td><input type="text" name="txtbackcam"></td>
	</tr>
	<tr>
		<td>Storage</td>
		<td><input type="text" name="txtstorage"></td>
	</tr>
	<tr>
		<td>Battery Capacity</td>
		<td><input type="text" name="txtbattery"></td>
	</tr>
	<tr>
		<td>Colour</td>
		<td><input type="text" name="txtcolour"></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" name="btnaddph" value="ADD">
			<input type="reset" value="Clear">
		</td>
	</tr>
</table>
</form>
</body>
</html>