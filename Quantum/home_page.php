<?php 
//error_reporting(0);
session_start();
include ('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style1.css">

</head>
<body>
<form action="home_page.php" method="post" enctype="multipart/form-data">
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
  			echo "<li><a href='Logout.php'>Logout</a></li>";
  		}
   ?>
</ul>
</td>
</tr>
</table>

<table align="center" cellpadding="15" cellspacing="15">
	<?php 
	if (isset ($_POST['btnsearch'])) 
	{
		$data=$_POST['txtdata'];
		$query="SELECT * FROM product 
			WHERE product_name='$data'
			ORDER BY product_id DESC";

		$ret=mysqli_query($mysqli,$query);
		$count=mysqli_num_rows($ret);

	if($count==0)
		{
			echo "<p class='error_msg'>No Record Found. :( </p>";
		}
	else
	
		for($i=0;$i<$count;$i+=3)
		{
		$query1="SELECT * FROM product 
				WHERE product_name='$data'
				ORDER BY product_id DESC
				LIMIT $i,3";
		$ret1=mysqli_query($mysqli,$query1);
		$count1=mysqli_num_rows($ret1);
		echo "<tr>";
		for($i=0;$i<$count1;$i+=3)
	{
		$select1="SELECT * FROM product 
				WHERE product_name='$data'
				ORDER BY product_id DESC
				LIMIT $i,3";
				
		$run1=mysqli_query($mysqli,$select1);
		$count8=mysqli_num_rows($run1);
		echo "<tr>";
		for($x=0;$x<$count8;$x++)
		{
			$row=mysqli_fetch_array($run1);
			$productid=$row['product_id'];
			$categoryid=$row['category_category_id'];
			$productname=$row['product_name'];
			//$brandname=$row['brand_name'];
			$saleprice=$row['price'];
			$productimg1=$row['product_img3'];	
			list($width,$height)=getimagesize('productimage/' . $productimg1);
			$w=$width/5;
			$h=$height/5;
	?>
			<td align="center" class="bar">
				<img src="<?php echo 'productimage/' . $productimg1 ?>" width="<?php echo $w ?>" height="<?php echo $h ?>">
					<b><h3><?php echo $productname ?></h3></b>
					<b><h5><?php echo $saleprice ?> USD</h5></b>
					<a class="btnLink" href="sale_product_detail.php?CID=<?php echo $categoryid; ?> & PID=<?php echo $productid; ?>">Detail</a>
			</td>
		<td></td>
		<?php
		}
		echo "</tr>";
	}
}

	}


else
{
	$select="SELECT * FROM product";
	$run=mysqli_query($mysqli,$select);
	$count7=mysqli_num_rows($run);

	for($i=0;$i<$count7;$i+=3)
	{
		$select1="SELECT * FROM product 
				ORDER BY product_id DESC
				LIMIT $i,3";
				
		$run1=mysqli_query($mysqli,$select1);
		$count8=mysqli_num_rows($run1);
		echo "<tr>";
		for($x=0;$x<$count8;$x++)
		{
			$row=mysqli_fetch_array($run1);
			$productid=$row['product_id'];
			$categoryid=$row['category_category_id'];
			$productname=$row['product_name'];
			//$brandname=$row['brand_name'];
			$saleprice=$row['price'];
			$productimg1=$row['product_img3'];	
			list($width,$height)=getimagesize('productimage/' . $productimg1);
			$w=$width/5;
			$h=$height/5;
	?>
			<td align="center" class="bar">
				<img src=" <?php echo 'productimage/' . $productimg1 ?>" width="<?php echo $w ?>" height="<?php echo $h ?>">
					<b><h3><?php echo $productname ?></h3></b>
					<b><h5>£<?php echo $saleprice ?></h5></b>
					<a class="btnLink" href="sale_product_detail.php?CID=<?php echo $categoryid; ?> & PID=<?php echo $productid; ?>">Detail</a>
			</td>
		<td></td>
		<?php
		}
		echo "</tr>";
	}
}

?>
	
</table>
</form>
</body>
</html>