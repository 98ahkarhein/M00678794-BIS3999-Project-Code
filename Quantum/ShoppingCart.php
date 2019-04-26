<?php
error_reporting(0);
session_start();
require ('connect.php');
require ('ShoppingCartFunction.php');
//-------------------------------
if(isset($_GET['action']))
{
	$action=$_GET['action'];
}
else
{
	$action="";
}
//------------------------------
if($action==="add")
{
	$ProductID=$_GET['product_id'];
	$Quantity=$_GET['quantity']; 
	Insert($ProductID,$Quantity);
}
elseif($action==="remove")
{
	$ProductID=$_GET['product_id'];
	Remove($ProductID);		
}
elseif($action==="clear")
{
	Clear();
}
?>
<title>Shopping Cart</title>
<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<fieldset>
<legend>Your Shopping Cart :</legend>
<table align="center" >
<tr>
	<td>
    <hr/>
    <?php
	if(isset($_SESSION["ShoppingCart"]))
    {
        echo "<p>Your Shopping Cart is Empty</p>";
        //echo "<img src='images/Shoppingcart_empty.png' width='150' height='150' />";
        echo "<p>Total Amount :  $0</p>";
        echo "<a href='home_page.php'>Product Display</a>";
        exit();
    }
    ?>
    </td>
</tr>
</table>
<table class='#' align="center" width="50%" height="50%"  cellspacing="5px">
    <tr>
        <th>Image</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
		<th>Action</th>
    </tr>
   
        <tr>
           <?php
				$img=$_SESSION['ShoppingCart'][$i]['product_img1'];
				list($width, $height, $type, $attr)=getimagesize($img);
				$w=$width/7;
				$h=$height/7;
			?>
			<th align="center">
				<img src="MK11PS4.jpg" width="200px" />
			</th>
			<th>Mortal Kombat 11</th>
			<th>£40</th>
			<th>1</th>
            <th>
                <a href="ShoppingCart.php?action=remove&product_id=<?php echo $_SESSION['ShoppingCart'][$i]['product_id']?>">Remove</a>
            </th>
        </tr>
        <tr>
            <td colspan="9">
            </td>
        </tr>
    <?php
	
	?>
    <tr>
    	<td colspan="9" align="right">
            <table>
                <tr>
                    <td>
                        <br/>
                        <h2 class="paid_label">Total Amount&nbsp;&nbsp;: <?php //echo Get_TotalAmount() ?> £40</h1>
                        <h2 class="paid_label">Total Quantity&nbsp;: <?php //echo Get_TotalQuantity() ?> 1pcs</h1>
                        <hr class="reddot" />
                        <a class="btnLink" href="home_page.php">Product Display</a>&nbsp; |
                        <a class="btnLink" href="ShoppingCart.php?action=clear">Empty Cart</a>&nbsp; |
                        <a class="btnLink" href="CheckOut.php">Check Out</a>
                    </td>
                </tr>
				<tr>
				<td>
                <br />
				<script>var pfHeaderImgUrl = '';var pfHeaderTagline = 'Order%20Report';var pfdisableClickToDel = 0;var pfHideImages = 0;var pfImageDisplayStyle = 'right';var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if('https:' == document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script>
				<a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onClick="window.print();return false;" title="Printer Friendly and PDF"><img style="border:none;-webkit-box-shadow:none;box-shadow:none;" src="http://cdn.printfriendly.com/button-print-grnw20.png" alt="Print Friendly and PDF"/></a>
				</td>
				</tr>
            </table>
        </td>
    </tr>
    </table>
</fieldset>
</body>
</html>