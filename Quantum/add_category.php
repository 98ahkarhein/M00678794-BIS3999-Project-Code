<?php 
session_start();
require ('connect.php');
require ('function.php');

if (isset($_POST['btnaddcategory'])) 
{
	$cid=$_POST['txtcategoryid'];
	$cname=$_POST['txtcategoryname'];
	$status=$_POST['rdostatus'];
	$select = "SELECT * FROM category WHERE category_id='$cid";
	$run=mysqli_query($mysqli,$select);
	$count = mysqli_num_rows($run);

	if($count!=0)
	{ 
	echo "<script> window.alert('Data you entered is already exist!'); </script>";
	echo "<script> window.location='add_category.php'</script>";
	}
	
	
		
		$insert="INSERT INTO category(category_id,category_name,status) VALUES('$cid','$cname','$status')";
		
		$ret = mysqli_query($mysqli,$insert);
		if($ret)
		{
			echo "<script> window.alert('Welcome ! Your Category is created!') </script>";
			echo "<script> window.location='add_category.php' </script>"; 
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
	<title>Add Category</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form name="frmCategory" action="add_category.php" method="post" enctype="multipart/form-data">
<table align="center" cellpadding="4">
	<tr>
		<td><h1>Add Category Form</h1></td>
	</tr>
</table>
<table align="center" cellpadding="7">
	<tr>
		<td><input type="hidden" name="txtcategoryid" value="<?php echo "C-" . uniqid(); ?>"></td>
	</tr>
	<tr>
		<td>Category Name</td>
		<td><input type="text" name="txtcategoryname"></td>
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
			<input type="submit" name="btnaddcategory" value="Add Category">
			<input type="reset" value="Clear">
		</td>
	</tr>
</table>
</form>
</body>
</html>