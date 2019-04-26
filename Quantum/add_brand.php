<?php 
session_start();
require ('connect.php');
require ('autoid.php');
if (isset($_POST['btnaddbrand'])) 
{
	$bid=$_POST['txtbrandid'];
	$bname=$_POST['txtbrandname'];
	$status=$_POST['rdostatus'];
	$select = "SELECT * FROM brand WHERE brand_name='$bname'";
	$run=mysqli_query($mysqli,$select);
	$count = mysqli_num_rows($run);

	if($count!=0)
	{ 
	echo "<script> window.alert('Data you entered is already exist!'); </script>";
	echo "<script> window.location='add_brand.php'</script>";
	}
	
	
		
		$insert="INSERT INTO brand(brand_id,brand_name,status) VALUES('$bid','$bname','$status')";
		
		$ret = mysqli_query($mysqli,$insert);
		if($ret)
		{
			echo "<script> window.alert('Welcome ! Your Brand is created!') </script>";
			echo "<script> window.location='add_brand.php' </script>"; 
		}
			else
			{
				echo "Error:" . $insert . "<br>" . mysqli_error($mysqli);
			}
	
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Add Brand</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="add_brand.php" method="post" enctype="multipart/form-data">
<table align="center" cellpadding="4">
	<tr>
		<td><h1>Add Brand Form</h1></td>
	</tr>
</table>
<table align="center" cellpadding="7">
	<tr>
		<td><input type="hidden" name="txtbrandid" value="<?php echo "B-" . uniqid(); ?>"></td>
	</tr>
	<tr>
		<td>Brand Name</td>
		<td><input type="text" name="txtbrandname"></td>
	</tr>
	<tr>
		<td>Status</td>
		<td>
		<input type="radio" name="rdostatus" value="Active" checked/>Active
		<input type="radio" name="rdostatus" value="InActive"/>InActive
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" name="btnaddbrand" value="Add Brand">
			<input type="reset" value="Clear">
		</td>
	</tr>
</table>
</form>
</body>
</html>