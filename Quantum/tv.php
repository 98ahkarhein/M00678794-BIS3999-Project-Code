<?php 
error_reporting(0);
session_start();
require ('connect.php');
if (isset($_POST['btnaddtv'])) 
{
	$pid=$_POST['cbopid'];
	$bid=$_POST['cbobid'];
	$cid=$_POST['cbocid'];
	$display=$_POST['txtdisplay'];
	$picquantity=$_POST['txtpicquality'];
	$tvsize=$_POST['txttvsize'];
	$feature=$_POST['txtfeature'];
	$select = "SELECT * FROM tv WHERE product_product_id='$pid' AND product_brand_brand_id = '$bid' AND product_category_category_id = $cid";
	$run=mysqli_query($mysqli,$select);
	$count = mysqli_num_rows($run);

	if($count!=0)
	{ 
	echo "<script> window.alert('Data you entered is already exist!'); </script>";
	echo "<script> window.location='tv.php'</script>";
	}
		$insert="INSERT INTO tv(display,picture_quantity,tv_size,feature,product_product_id,product_brand_brand_id,product_category_category_id) VALUES('$display','$picquantity','$tvsize','$feature','$pid','$bid','$cid')";
		
		$ret = mysqli_query($mysqli,$insert);
		if($ret)
		{
			echo "<script> window.alert('Welcome ! Your TV is created!') </script>";
			echo "<script> window.location='tv.php' </script>"; 
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
	<title>Television</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="tv.php" method="post" enctype="multipart/form-data">
<table align="center" cellpadding="10">
	<tr>
		<td><h1>Television Form</h1></td>
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
		<td>Display</td>
		<td><input type="text" name="txtdisplay"></td>
	</tr>
	<tr>
		<td>Picture Quality</td>
		<td><input type="text" name="txtpicquality"></td>
	</tr>
	<tr>
		<td>TV Size</td>
		<td><input type="text" name="txttvsize"></td>
	</tr>
	<tr>
		<td>Feature</td>
		<td><input type="text" name="txtfeature"></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" name="btnaddtv" value="ADD">
			<input type="reset" value="Clear">
		</td>
	</tr>
</table>
</form>
</body>
</html>