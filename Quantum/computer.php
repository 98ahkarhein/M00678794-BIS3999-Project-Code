<?php 
//error_reporting(0);
session_start();
require ('connect.php');
if (isset($_POST['btnaddcom'])) 
{
	$pid=$_POST['cbopid'];
	$bid=$_POST['cbobid'];
	$cid=$_POST['cbocid'];
	$size=$_POST['txtsize'];
	$colour=$_POST['txtcolour'];
	$cpu=$_POST['txtcpu'];
	$display=$_POST['txtdisplay'];
	$ram=$_POST['txtram'];
	$graphic=$_POST['txtgraphic'];
	$storage=$_POST['txtstorage'];
	$select = "SELECT * FROM computer WHERE product_product_id='$pid' AND product_brand_brand_id = '$bid' AND product_category_category_id = '$cid'";
	$run=mysqli_query($mysqli,$select);
	$count = mysqli_num_rows($run);

	if($count!=0)
	{ 
	echo "<script> window.alert('Data you entered is already exist!'); </script>";
	echo "<script> window.location='computer.php'</script>";
	}
	
	
		
		$insert="INSERT INTO computer(size,colour,cpu,display,ram,storage,graphic,product_product_id,product_brand_brand_id,product_category_category_id) VALUES('$size','$colour','$cpu','$display','$ram','$storage','$graphic','$pid','$bid','$cid')";
		
		$ret = mysqli_query($mysqli,$insert);
		if($ret)
		{
			echo "<script> window.alert('Welcome ! Your Computer is created!') </script>";
			echo "<script> window.location='computer.php' </script>"; 
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
	<title>Computing</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="computer.php" method="post" enctype="multipart/form-data">
<table align="center" cellpadding="10">
	<tr>
		<td><h1>Computer Form</h1></td>
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
		<td>Size</td>
		<td><input type="text" name="txtsize"></td>
	</tr>
	<tr>
		<td>Colour</td>
		<td><input type="text" name="txtcolour"></td>
	</tr>
	<tr>
		<td>CPU</td>
		<td><input type="text" name="txtcpu"></td>
	</tr>
	<tr>
		<td>Display</td>
		<td><input type="text" name="txtdisplay"></td>
	</tr>
	<tr>
		<td>RAM</td>
		<td><input type="text" name="txtram"></td>
	</tr>
	<tr>
		<td>Storage</td>
		<td><input type="text" name="txtstorage"></td>
	</tr>
	<tr>
		<td>Graphic</td>
		<td><input type="text" name="txtgraphic"></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" name="btnaddcom" value="ADD">
			<input type="reset" value="Clear">
		</td>
	</tr>
</table>
</form>
</body>
</html>