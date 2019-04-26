<?php
function Insert($ProductID,$Quantity)
{
	$sql="SELECT * FROM product WHERE id='$ProductID'";
	$ret=mysqli_query($mysqli,$sql);

	if(mysqli_num_rows($ret)<1)
	{
		 return false;
	}	
	$row=mysqli_fetch_array($ret);
	
	$ProductName=$row['product_name'];
	$Price=$row['price'];
	//$Colour=$row['Colour'];
	//$Size=$row['Size'];
	//$Brand=$row['Brand'];
	//$Category=$row['Category'];
	$TotalQuantity=$row['quantity']; 
	$Image1=$row['product_img1'];
	
	if ($Quantity > $TotalQuantity)
	{
		echo'<script>window.alert("Please Enter Correct Quantity") </script>';
		echo'<script>window.location="Product_Detail.php?ProductID='.$ProductID.'";</script>';
	}
	if($Quantity==0)
	{
		echo'<script>window.alert("Product Quantity Cannot Be Zero") </script>';
		echo'<script>window.location="Product_Detail.php?ProductID='.$ProductID.'";</script>';
	}

	if(isset($_SESSION['ShoppingCart']))
	{
		$index=IndexOf($ProductID);
		
		if($index==-1)
		{
			$size=count($_SESSION['ShoppingCart']);
			
			$_SESSION['ShoppingCart'][$size]['id']=$ProductID;
			$_SESSION['ShoppingCart'][$size]['product_name']=$ProductName;
			$_SESSION['ShoppingCart'][$size]['product_img1']=$Image1;
			$_SESSION['ShoppingCart'][$size]['price']=$Price;
			$_SESSION['ShoppingCart'][$size]['quantity']=$Quantity;
		}
		else
		{
			$_SESSION['ShoppingCart'][$index]['product_id']=$ProductID;
			$_SESSION['ShoppingCart'][$index]['product_name']=$ProductName;		
			$_SESSION['ShoppingCart'][$index]['product_img1']=$Image1;
			$_SESSION['ShoppingCart'][$index]['price']=$Price;
			$_SESSION['ShoppingCart'][$index]['quantity']=$Quantity;			
		}
	}
	else
	{
		$_SESSION['ShoppingCart']=array();
		$_SESSION['ShoppingCart'][0]['product_id']=$ProductID;
		$_SESSION['ShoppingCart'][0]['product_name']=$ProductName;
		$_SESSION['ShoppingCart'][0]['product_img1']=$Image1;
		$_SESSION['ShoppingCart'][0]['price']=$Price;
		$_SESSION['ShoppingCart'][0]['quantity']=$Quantity;
	}
	echo "<script>window.location='ShoppingCart.php'</script>";
}
//----------------------------------------------------------------------------------------------------------------
function Remove($ProductID)
{
	$index=IndexOf($ProductID);
	
	if ($index>-1)
	{
		unset($_SESSION['ShoppingCart'][$index]);
	}
	$_SESSION['ShoppingCart']=array_values($_SESSION['ShoppingCart']);
	echo "<script>window.location='ShoppingCart.php'</script>";
}

function Clear()
{
	unset($_SESSION['ShoppingCart']);
	echo "<script>window.location='ShoppingCart.php'</script>";
}
	
function Get_TotalAmount()
{
	if (!isset($_SESSION['ShoppingCart']))
	{
		return 0;
	}
	$total=0;
	$size=count($_SESSION['ShoppingCart']);
	
	for($i=0;$i<$size;$i++)
	{
		$Quantity=$_SESSION['ShoppingCart'][$i]['quantity'];
		$price=$_SESSION['ShoppingCart'][$i]['price'];
		$total=$total+($Quantity * $price);
	}
	
	return $total;
}
function AdvanceAmount()
{
	if (!isset($_SESSION['ShoppingCart']))
	{
		return 0;
	}
	$total=0;
	$size=count($_SESSION['ShoppingCart']);
	
	for($i=0;$i<$size;$i++)
	{
		$Quantity=$_SESSION['ShoppingCart'][$i]['quantity'];
		$price=$_SESSION['ShoppingCart'][$i]['price'];
		$total=$total+($Quantity * $price);
		$advanceamount=$total / 3;
	}
	return $advanceamount;
}
function Get_TotalQuantity()
{
	if (!isset($_SESSION['ShoppingCart']))
	{
		return 0;
	}
	
	$totalqty=0;
	$size=count($_SESSION['ShoppingCart']);
	
	for($i=0;$i<$size;$i++)
	{
		$Quantity=$_SESSION['ShoppingCart'][$i]['quantity'];
		$totalqty=$totalqty+($Quantity);
	}
	
	return $totalqty;
}

function IndexOf($ProductID)
{
	if (!isset($_SESSION['ShoppingCart']))
		return -1;
		
	$size=count($_SESSION['ShoppingCart']);
	
	if ($size==0)
		return -1;
		
	for ($i=0;$i<$size;$i++)
	{
		if ($ProductID==$_SESSION['ShoppingCart'][$i]['product_id'])
		{
			return $i;
		}
	}
	return -1;
}

?>