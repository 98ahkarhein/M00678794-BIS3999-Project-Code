<?php 
	//error_reporting(0);
	session_start();
	require ('connect.php');
	if (isset($_REQUEST['Delete'])) 
	{
		
		$productid=$_REQUEST['product_id'];
		$delete="DELETE FROM product WHERE product_id='$productid'";
		$ret=mysqli_query($con,$delete);
		if ($ret) 
		{
			echo "<script>window.alert('Sucessfully Deleted')</script>";
			echo "<script>window.location='product_listing.php'</script>";
		}
		else
		{
			echo "Error:".$delete ."<br>".mysqli_error($mysqli);
		}
	}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Product Listing</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="product_listing.php" method="post" enctype="multipart/form-data">
	<table align="center" cellpadding="4">
	<tr>
		<td><h1>Product Listing</h1></td>
	</tr>
	</table>
	<table align="center" cellpadding="4" border="1">
	<tr>
		<td>Product ID</td>
		<td>Product Name</td>
		<td>Category</td>
		<td>Brand</td>
		<td>Status</td>
		<td>Price</td>
		<td>Quantity</td>
		<td>Description</td>		
		<td>Image1</td>
		<td>Image2</td>
		<td>Image3</td>
		<td>Image4</td>
		<td>Image5</td>
		<td>Image6</td>
		<td>Image7</td>
		<td>Action</td>
		</tr>
		<?php 
			$query="SELECT * FROM product ORDER BY status";
			$ret=mysqli_query($mysqli,$query);
			$count=mysqli_num_rows($ret);
			for ($i=0; $i < $count; $i++) 
			{ 
				$row=mysqli_fetch_array($ret);
				$productid=$row['product_id'];
				echo "<tr class='table_row'>";
				echo "<td>" . $row['product_id'] . "</td>";
				echo "<td>" . $row['product_name']. "</td>";
				echo "<td>" . $row['category_category_id']. "</td>";
				echo "<td>" . $row['brand_brand_id']. "</td>";
				echo "<td>" . $row['status'] . "</td>";
				echo "<td>" . $row['price']. "</td>";
				echo "<td>" . $row['quantity']. "</td>";
				//echo "<td>" . $row['release_date']. "</td>";
				echo "<td>" . $row['detail_description']. "</td>";
				echo "<td>" . $row['product_img1']. "</td>";
				echo "<td>" . $row['product_img2']. "</td>";
				echo "<td>" . $row['product_img3']. "</td>";
				echo "<td>" . $row['product_img4']. "</td>";
				echo "<td>" . $row['product_img5']. "</td>";
				echo "<td>" . $row['product_img6']. "</td>";
				echo "<td>" . $row['product_img7']. "</td>";
				echo "<td><a href='product_update.php?product_id=$productid'>Edit</a> | 
				<a href='product_listing.php?product_id=$productid&Delete'>Delete</a></td>";
				echo "</tr>";
			}
			 ?>
	</table>
	</form>
</body>
</html>