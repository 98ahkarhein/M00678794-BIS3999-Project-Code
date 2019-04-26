<?php 
	//error_reporting(0);
	session_start();
	require ('connect.php');
	if (isset($_REQUEST['product_id'])) 
	{
		$productid=$_REQUEST['product_id'];
		$query="SELECT p.*,c.category_id
				FROM product p,category c
				WHERE product_id='$productid' AND c.category_id=p.category_category_id";
		$ret=mysqli_query($mysqli,$query);
		$num=mysqli_num_rows($ret);
		$row=mysqli_fetch_array($ret);
		//$txtproductid=$row['product_id'];
		$txtproductname=$row['product_name'];
		$cbocategoryid=$row['category_category_id'];
		$cbobrandid=$row['brand_brand_id'];
		$rdostatus=$row['status'];
		$txtprice=$row['price'];
		$txtquantity=$row['quantity'];
		$txtdescription=$row['detail_description'];
		$txtrating=$row['rating'];
		//$releasedate=$row['release_date'];
		//$image1=$row['image1'];
		//$image2=$row['image2'];
	}
	if (isset($_POST['btnupdate'])) 
	{
	$upid=$_POST['txtproductid'];
	$upname=$_POST['txtproductname'];
	$ubname=$_POST['cbobname'];
	$ucname=$_POST['cbocname'];
	$uprice=$_POST['txtprice'];
	$uquantity=$_POST['txtquantity'];
	$ustatus=$_POST['txtstatus'];
	$urating=$_POST['txtrating'];
	$udetaildes=$_POST['txtpdetaildescription'];

		if ($u_image1) 
		{
			$filename1=$folder.'_'.$u_image1;
			$copied=copy($_FILES['txtimage1']['tmp_name'],$filename1);
			if (!$copied) 
			{
				exit("Problem Occur in Image Upload");
			}
		}		
		if ($u_image2) 
		{
			$filename2=$folder.'_'.$u_image2;
			$copied=copy($_FILES['txtimage2']['tmp_name'],$filename2);
			if (!$copied) 
			{
				exit("Problem Occur in Image Upload");
			}
		}
		//-----------------------------------------------
		$update="UPDATE product
				 SET product_name='$upname',price='$uprice',quantity='$uquantity',status='$ustatus',rating='$urating',detail_description='$udetaildes',brand_brand_id='$ubname',category_category_id='$ucname'
				 WHERE product_id='$upid'";
		$ret=mysqli_query($mysqli,$update);
		if ($ret) 
		{
			echo "<script>window.alert('Sucessfully Updated!')</script>";
			echo "<script>window.location='product_listing.php'</script>";
		}
		else
		{
			echo "Error:".$update ."<br>".mysqli_error($mysqli);
		}		
	}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Product Update</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="product_update.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="productid" value="<?php echo $productid ?>"/>
	<table align="center" cellpadding="4">
	<tr>
		<td><h1>Product Update Form</h1></td>
	</tr>
	</table>
	<table align="center" cellpadding="7">	
	<tr>
		<td>Product ID</td>
		<td><input type="text" name="txtproductid" value="<?php echo "P-" . uniqid(); ?>" ></td>
	</tr>
	<tr>
		<td>Product Name</td>
		<td><input type="text" name="txtproductname" value="<?php echo $txtproductname ?>" ></td>
	</tr>
	<tr>
		<td>Brand Name</td>
		<td>
			<select name="cbobname" class="search">
			<option>--Choose Brand Name--</option>
			<?php 
			$select="SELECT * FROM brand WHERE status='Active'";
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
			<select name="cbocname" class="search">
			<option>--Choose Category Name--</option>
			<?php 
			$select="SELECT * FROM category WHERE status='Active'";
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
		<td>Price</td>
		<td><input type="text" name="txtprice" value="<?php echo $txtprice ?>"></td>
	</tr>
	<tr>
		<td>Quantity</td>
		<td><input type="text" name="txtquantity" value="<?php echo $txtquantity ?>" ></td>
	</tr>
	<tr>
		<td>Status</td>
		<td><input type="text" name="txtstatus" value="<?php echo $rdostatus ?>"></td>
	</tr>
	<tr>
		<td>Rating</td>
		<td><input type="text" name="txtrating" value="<?php echo $txtrating ?>"></td>
	</tr>
	<tr>
		<td>Detail description</td>
		<td><input type="text" name="txtpdetaildescription" value="<?php echo $txtdescription ?>"></td>
	</tr>
	<tr>
		<td>Product image 1</td>
		<td><input type="file" name="txtimg1" class="upload"></td>
	</tr>
	<tr>
		<td>Product image 2</td>
		<td><input type="file" name="product_img2"></td>
	</tr>
	<tr>
		<td>Product image 3</td>
		<td><input type="file" name="product_img3"></td>
	</tr>
	<tr>
		<td>Product image 4</td>
		<td><input type="file" name="product_img4"></td>
	</tr>
	<tr>
		<td>Product image 5</td>
		<td><input type="file" name="product_img5"></td>
	</tr>
	<tr>
		<td>Product image 6</td>
		<td><input type="file" name="product_img6"></td>
	</tr>
	<tr>
		<td>Product image 7</td>
		<td><input type="file" name="product_img7"></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type='submit' class='btnd2' name='btnupdate' value='Update Product'/>
			<input type="reset" value="Clear">
		</td>
	</tr>
</table>
</form>
</body>
</html>