<?php 
session_start();
//error_reporting(0);
require ('connect.php');

   //-------------------
$txtproductid=$_GET['PID'];
//$cid=$_GET['CID'];
if ($_GET['CID'] == "C-5cc1efa22852c") 
 {
 	$query1="SELECT * from phone, product where phone.product_product_id = product.product_id and product.product_id = '$txtproductid'"; 
 	$ret1=mysqli_query($mysqli,$query1);
	$num1=mysqli_num_rows($ret1);
	$row1=mysqli_fetch_array($ret1);

	$pid=$row1['product_id'];
	$txtproductname=$row1['product_name'];
	//$txtcategoryname=$row['category_name'];
	$txtquantity=$row1['quantity'];
	$txtprice=$row1['price'];
	$txtdescription=$row1['detail_description'];
	$os=$row1['os'];
	$display=$row1['display'];
	$fcam=$row1['front_camera'];
	$bcam=$row1['back_camera'];
	$storage=$row1['storage'];
	$battery=$row1['battery_capicity'];
	$colour=$row1['colour'];
	$image1=$row1['product_img1'];
	$image2=$row1['product_img2'];
	$image3=$row1['product_img3'];
	$image4=$row1['product_img4'];
	$image5=$row1['product_img5'];
	$image6=$row1['product_img6'];
	$image7=$row1['product_img7'];
	list($width,$height)=getimagesize('productimage/' . $image3);
			$w=$width/1;
			$h=$height/1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sale Product Detail</title>
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
<form action="ShoppingCart.php" method="get" enctype="multipart/form-data">
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
<table>
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
			<td><b>Name:</b></td>		
			<td><b><?php echo $txtproductname ?></b></td>
		</tr>
		<tr>
			<td><b>Price:</b></td>
			<td><b>£<?php echo $txtprice ?></b></td>
		<td></td>
		</tr>
		<tr>
			<td><b>Operation System:</b></td>		
			<td><b><?php echo $os ?></b></td>
		</tr>
		<tr>	
			<td><b>Display</b>:</td>	
			<td><b><?php echo $display ?></b></td>
		</tr>
		<tr>	
			<td><b>Front Camera:</b></td>	
			<td><b><?php echo $fcam ?></b></td>
		</tr>
		<tr>	
			<td><b>Back Camera:</b></td>	
			<td><b><?php echo $bcam ?></b></td>
		</tr>
		<tr>	
			<td><b>Storage:</b></td>	
			<td><b><?php echo $storage ?></b></td>
		</tr>
		<tr>	
			<td><b>battery:</b></td>	
			<td><b><?php echo $battery ?></b></td>
		</tr>
		<tr>	
			<td><b>Colour:</b></td>	
			<td><b><?php echo $colour ?></b></td>
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
				echo "<a href='home_page.php'><input type='button' class='btnd' value='Back'/></a>";
				echo "<input type='hidden' type='number' name='txtqty' value='1'/>";
				echo "<br/><br/>";
				
			}
			 ?>
			 <input type="hidden" name="txtproductid" value="<?php echo $row1['product_id']; ?>" />
			 <input type="hidden" name="action" value="buy"/>
			 
			</td>
		</tr>
	</table>
</table>
</form>
</body>
</html>
<?php
 }
 elseif ($_GET['CID'] == "C-5cc1efd361755") 
 {
 	$query2="SELECT * FROM product, computer where product.product_id=computer.product_product_id and product.product_id = '$txtproductid'"; 
 	$ret2=mysqli_query($mysqli,$query2);
	$num2=mysqli_num_rows($ret2);
	$row2=mysqli_fetch_array($ret2);

	$pid=$row2['product_id'];
	$txtproductname=$row2['product_name'];
	//$txtcategoryname=$row['category_name'];
	$txtquantity=$row2['quantity'];
	$txtprice=$row2['price'];
	$txtdescription=$row2['detail_description'];
	$size=$row2['size'];
	$cpu=$row2['cpu'];
	$display=$row2['display'];
	$ram=$row2['ram'];
	$storage=$row2['storage'];
	$graphic=$row2['graphic'];
	$colour=$row2['colour'];
	$image1=$row2['product_img1'];
	$image2=$row2['product_img2'];
	$image3=$row2['product_img3'];
	$image4=$row2['product_img4'];
	$image5=$row2['product_img5'];
	$image6=$row2['product_img6'];
	$image7=$row2['product_img7'];
	list($width,$height)=getimagesize('productimage/' . $image3);
			$w=$width/1;
			$h=$height/1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sale Product Detail</title>
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
	<form action="ShoppingCart.php" method="get" enctype="multipart/form-data">
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
<table>
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
			<td><b>Name:</b></td>		
			<td><b><?php echo $txtproductname ?></b></td>
		</tr>
		<tr>
			<td><b>Price:</b></td>
			<td><b>£<?php echo $txtprice ?></b></td>
		<td></td>
		</tr>
		<tr>
			<td><b>Size:</b></td>		
			<td><b><?php echo $size ?></b></td>
		</tr>
		<tr>	
			<td><b>CPU</b>:</td>	
			<td><b><?php echo $cpu ?></b></td>
		</tr>
		<tr>	
			<td><b>Display:</b></td>	
			<td><b><?php echo $display ?></b></td>
		</tr>
		<tr>	
			<td><b>RAM:</b></td>	
			<td><b><?php echo $ram ?></b></td>
		</tr>
		<tr>	
			<td><b>Storage:</b></td>	
			<td><b><?php echo $storage ?></b></td>
		</tr>
		<tr>	
			<td><b>Graphic:</b></td>	
			<td><b><?php echo $graphic ?></b></td>
		</tr>
		<tr>	
			<td><b>Colour:</b></td>	
			<td><b><?php echo $colour ?></b></td>
		</tr>
		<tr>
			<td>
			<?php 
			if ($txtquantity<=0) 
			{
				echo "<b style='color:red;'>Currently Unavailable</b>"; echo" ";
				echo "</br>";
				echo "<a href='home_page'.php><input type='button' value='Back'/></a>";
			}
			else
			{
				echo "<b style='color:red;'>In Stock Now!</b> Usually dispatched within 1 working day.";
				echo "</br>";
				echo "<input type='submit' class='btnd' name='btnadd' value='Add to Basket'/>"; echo" ";
				echo "<a href='home_page'.php><input type='button' class='btnd' value='Back'/></a>";
				echo "<input type='hidden' type='number' name='txtqty' value='1'/>";
				echo "<br/><br/>";
				
			}
			 ?>
			 <input type="hidden" name="txtproductid" value="<?php echo $row2['product_id']; ?>"/>
			 <input type="hidden" name="action" value="buy"/>
			 
			</td>
		</tr>
	</table>
</table>
</form>
</body>
</html>
<?php
 }
elseif ($_GET['CID'] == "C-5cc1efdb2e693") 
{
		$query3="SELECT * FROM product, tv where product.product_id=tv.product_product_id and product.product_id = '$txtproductid'"; 
 	$ret3=mysqli_query($mysqli,$query3);
	$num3=mysqli_num_rows($ret3);
	$row3=mysqli_fetch_array($ret3);

	$pid=$row3['product_id'];
	$txtproductname=$row3['product_name'];
	//$txtcategoryname=$row['category_name'];
	$txtquantity=$row3['quantity'];
	$txtprice=$row3['price'];
	$txtdescription=$row3['detail_description'];
	$display=$row3['display'];
	$pic=$row3['picture_quantity'];
	$tvsize=$row3['tv_size'];
	$feature=$row3['feature'];
	$image1=$row3['product_img1'];
	$image2=$row3['product_img2'];
	$image3=$row3['product_img3'];
	$image4=$row3['product_img4'];
	$image5=$row3['product_img5'];
	$image6=$row3['product_img6'];
	$image7=$row3['product_img7'];
	list($width,$height)=getimagesize('productimage/' . $image3);
			$w=$width/1;
			$h=$height/1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sale Product Detail</title>
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
	<form action="ShoppingCart.php" method="get" enctype="multipart/form-data">
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
<table>
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
			<td><b>Name:</b></td>		
			<td><b><?php echo $txtproductname ?></b></td>
		</tr>
		<tr>
			<td><b>Price:</b></td>
			<td><b>£<?php echo $txtprice ?></b></td>
		<td></td>
		</tr>
		<tr>	
			<td><b>Display</b>:</td>	
			<td><b><?php echo $display ?></b></td>
		</tr>
		<tr>	
			<td><b>Picture Quality:</b></td>	
			<td><b><?php echo $pic ?></b></td>
		</tr>
		<tr>	
			<td><b>TV Size:</b></td>	
			<td><b><?php echo $tvsize ?></b></td>
		</tr>
		<tr>	
			<td><b>Feature:</b></td>	
			<td><b><?php echo $feature ?></b></td>
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
				echo "<a href='home_page.php'><input type='button' class='btnd' value='Back'/></a>";
				echo "<input type='hidden' type='number' name='txtqty' value='1'/>";
				echo "<br/><br/>";
				
			}
			 ?>
			 <input type="hidden" name="txtproductid" value="<?php echo $row3['product_id']; ?>" />
			 <input type="hidden" name="action" value="buy"/>
			 
			</td>
		</tr>
	</table>
</table>
</form>
</body>
</html>
<?php
	}	
?>