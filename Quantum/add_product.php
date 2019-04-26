<?php 
error_reporting(0);
session_start();
require ('connect.php');
//require ('function.php'); 

if (isset($_POST['btnaddproduct'])) 
{
	$pid=$_POST['txtproductid'];
	$pname=$_POST['txtproductname'];
	$bname=$_POST['cbobname'];
	$cname=$_POST['cbocname'];
	$price=$_POST['txtprice'];
	$quantity=$_POST['txtquantity'];
	$status=$_POST['txtstatus'];
	$rating=$_POST['txtrating'];
	$detaildes=$_POST['txtpdetaildescription'];
}
//----------------image upload start------------//

$folder="productimage/";
	$image1=$_FILES['txtimg1']['name'];
	//$image2=$_FILES['txtimage2']['name'];
	if ($image1) 
	{
		$filename1=$folder.''.$image1;
		$copied=copy($_FILES['txtimg1']['tmp_name'],$filename1);
		if (!$copied) 
		{
			exit("Problem Occur in Image Upload");
		}
	}
	//----2----
	$folder="productimage/";
	$image2=$_FILES['product_img2']['name'];
	//$image2=$_FILES['txtimage2']['name'];
	if ($image2) 
	{
		$filename2=$folder.''.$image2;
		$copied=copy($_FILES['product_img2']['tmp_name'],$filename2);
		if (!$copied) 
		{
			exit("Problem Occur in Image Upload");
		}
	}
		//----3-----
	$folder="productimage/";
	$image3=$_FILES['product_img3']['name'];
	//$image2=$_FILES['txtimage2']['name'];
	if ($image3) 
	{
		$filename3=$folder.''.$image3;
		$copied=copy($_FILES['product_img3']['tmp_name'],$filename3);
		if (!$copied) 
		{
			exit("Problem Occur in Image Upload");
		}
	}
	//-------4------
	$folder="productimage/";
	$image4=$_FILES['product_img4']['name'];
	//$image2=$_FILES['txtimage2']['name'];
	if ($image4) 
	{
		$filename4=$folder.''.$image4;
		$copied=copy($_FILES['product_img4']['tmp_name'],$filename4);
		if (!$copied) 
		{
			exit("Problem Occur in Image Upload");
		}
	}
	//-----5-----
	$folder="productimage/";
	$image5=$_FILES['product_img5']['name'];
	//$image2=$_FILES['txtimage2']['name'];
	if ($image5) 
	{
		$filename5=$folder.''.$image5;
		$copied=copy($_FILES['product_img5']['tmp_name'],$filename5);
		if (!$copied) 
		{
			exit("Problem Occur in Image Upload");
		}
	}
	//-----6------
	$folder="productimage/";
	$image6=$_FILES['product_img6']['name'];
	//$image2=$_FILES['txtimage2']['name'];
	if ($image6) 
	{
		$filename6=$folder.''.$image6;
		$copied=copy($_FILES['product_img6']['tmp_name'],$filename6);
		if (!$copied) 
		{
			exit("Problem Occur in Image Upload");
		}
	}
	//------7------
	$folder="productimage/";
	$image7=$_FILES['product_img7']['name'];
	//$image2=$_FILES['txtimage2']['name'];
	if ($image7) 
	{
		$filename7=$folder.''.$image7;
		$copied=copy($_FILES['product_img7']['tmp_name'],$filename7);
		if (!$copied) 
		{
			exit("Problem Occur in Image Upload");
		}
	}

//----------------END CODE-----------------------
	$select = "SELECT * FROM product WHERE product_name='$pname'";
	$run=mysqli_query($mysqli,$select);
	$count = mysqli_num_rows($run);

	if($count!=0)
	{ 
	echo "<script> window.alert('Data you entered is already exist!'); </script>";
	echo "<script> window.location='add_brand.php'</script>";
	}

	$insert="INSERT INTO product(product_id,product_name,price,quantity,status,product_img1,product_img2,product_img3,product_img4,product_img5,product_img6,product_img7,rating,detail_description,brand_brand_id,category_category_id) VALUES('$pid','$pname','$price','$quantity','$status','$image1','$image2','$image3','$image4','$image5','$image6','$image7','$rating','$detaildes','$bname','$cname')";
	$ret = mysqli_query($mysqli,$insert);
		if($ret)
		{
			echo "<script> window.alert('Welcome ! Your Product is created!') </script>";
			echo "<script> window.location='add_product.php' </script>"; 
		}
			else
			{
				echo "Error:" . $insert . "<br>" . mysqli_error($mysqli);
			}

if (isset($_POST['btnaddproduct'])) 
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

$update="UPDATE product
 			SET product_name = '$upname',price = '$uprice',quantity = '$uquantity',status = '$ustatus',rating = '$udetaildes',brand_brand_id ='$ubname',category_category_id = '$ucname'
 			WHERE productid='$u_pid'";

 			$ret=mysqli_query($mysqli,$update);
 	if($ret)
		{
			echo "<script>window.alert('Product Information Updated!')</script>";
			echo "<script>window.location='add_product.php'</script>";
		}
		else
		{
				echo "<p>Error in Product Update Process :" . mysql_error(). "</p>";
		}
}



?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Add Product</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="add_product.php" method="post" enctype="multipart/form-data">
	<table align="center" cellpadding="4">
	<tr>
		<td><h1>Add Product Form</h1></td>
	</tr>
</table>
<table align="center" cellpadding="7">	
	<tr>
		<td>Product ID</td>
		<td><input type="text" name="txtproductid" value="<?php echo "P-" . uniqid(); ?>" ></td>
	</tr>
	<tr>
		<td>Product Name</td>
		<td><input type="text" name="txtproductname" value="<?php echo $product_name ?>" ></td>
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
			<option>--Choose Category Name</option>
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
		<td><input type="text" name="txtprice"></td>
	</tr>
	<tr>
		<td>Quantity</td>
		<td><input type="text" name="txtquantity"></td>
	</tr>
	<tr>
		<td>Status</td>
		<td><input type="radio" name="txtstatus" value="Active" checked/>Active
			<input type="radio" name="txtstatus" value="Inactive">Inactive</td>
	</tr>
	<tr>
		<td>Rating</td>
		<td><input type="text" name="txtrating"></td>
	</tr>
	<tr>
		<td>Detail description</td>
		<td><textarea name="txtpdetaildescription"></textarea></td>
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
			<input type='submit' class='btnd2' name='btnaddproduct' value='Add Product'/>
			<input type="reset" value="Clear">
		</td>
	</tr>
</table>
</form>
</body>
</html>