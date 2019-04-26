<?php 
error_reporting(0);
session_start();
require ('connect.php');

	$txtproductid=$_GET['PID'];
	$cid=$_GET['CID'];
	$query="SELECT p.*, c.category_id, c.category_name
		    FROM product p, category c
			WHERE product_id='$txtproductid'
			AND c.category_id=p.category_category_id";
	$ret=mysqli_query($mysqli,$query);
	$num=mysqli_num_rows($ret);
	$row=mysqli_fetch_array($ret);
	$pid=$row['product_id'];
	$txtproductname=$row['product_name'];
	//$txtcategoryname=$row['category_name'];
	$txtquantity=$row['quantity'];
	$txtprice=$row['price'];
	$txtdescription=$row['detail_description'];
	$image1=$row['product_img1'];
	$image2=$row['product_img2'];
	$image3=$row['product_img3'];
	$image4=$row['product_img4'];
	$image5=$row['product_img5'];
	$image6=$row['product_img6'];
	$image7=$row['product_img7'];
	list($width,$height)=getimagesize('productimage/' . $image3);
			$w=$width/1;
			$h=$height/1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<script type="text/javascript">
 	function ChangePhoto(photosrc)
 	{
 		document.images.imgPhoto.src=photosrc;
 	}
 	</script>
</head>
<body>
<form action="ShoppingCart.php" method="get">
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
  <li><a href="customer_registration.php">Register Here !</a></li>
</ul>
</td>
</tr>
</table>
	<table class="bar" align="center">
<tr>
	<td >
		<img class="bar" src="<?php echo 'productimage/'. $image1 ?>" width="250" height="250" id="imgPhoto"/><br>

		<img src="<?php echo 'productimage/'. $image1 ?>" width="50" height="70" onClick="ChangePhoto('<?php echo 'productimage/'. $image1 ?>')"/>

		<img src="<?php echo 'productimage/'.$image2 ?>" width="50" height="70" onClick="ChangePhoto('<?php echo 'productimage/'.$image2 ?>')"/>

		<img src="<?php echo 'productimage/'.$image3 ?>" width="50" height="70" onClick="ChangePhoto('<?php echo 'productimage/'.$image3 ?>')"/>

		<img src="<?php echo 'productimage/'.$image4 ?>" width="50" height="70" onClick="ChangePhoto('<?php echo 'productimage/'.$image4 ?>')"/>

		<img src="<?php echo 'productimage/'.$image5 ?>" width="50" height="70" onClick="ChangePhoto('<?php echo 'productimage/'.$image5 ?>')"/>

		<img src="<?php echo 'productimage/'.$image6 ?>" width="50" height="70" onClick="ChangePhoto('<?php echo 'productimage/'.$image6 ?>')"/>

		<img src="<?php echo 'productimage/'.$image7 ?>" width="50" height="70" onClick="ChangePhoto('<?php echo 'productimage/'.$image7 ?>')"/>	
	</td>
	<td>
	<table align="center">
		<tr>		
			<td><h1><b><?php echo $txtproductname ?></b></h1></td>
		</tr>
		<tr>
			<td><b><h2>£<?php echo $txtprice ?></h2></b></td>
		<td></td>
		</tr>
		<tr>
			<td>
				<b>4K OLED DISPLAY</b>
			</td>
			<tr>
			<td>
				<b>HDR preserves the detail in the brightest and darkest scenes found in PS4 games and Netflix titles, for a more dynamic and realistic picture.</b>
			</td>
		</tr>
		<tr>
			<td>
				<b>Brilliant highlights, beautiful textures.</b>
			</td>
		</tr>
		</tr>
		<tr>
			<td>
			<?php 
			if ($txtquantity<=0) 
			{
				echo "<b style='color:red;'>Currently Unavailable</b>"; echo" ";
				echo "</br>";
				echo "<a href='home_page.php'><input type='button' value='Back'/></a>";
			}
			else
			{
				echo "<b style='color:red;'>In Stock Now!</b> Usually dispatched within 1 working day.";
				echo "</br>";
				echo "<input type='submit' class='btnd' name='btnadd' value='Add to Basket'/>"; echo" ";
				echo "<input type='button' class='btnd' value='Back'/></a>";
				echo "<br/><br/>";
				
			}
			 ?>
			 <input type="hidden" name="txtproductid" value="<?php echo $row['product_id']; ?>" />
			</td>
		</tr>
	</table>
	</td>
</tr>
</table>
</form>
</body>
</html>