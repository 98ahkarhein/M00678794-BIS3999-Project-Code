<h1>Cart</h1> 
<?php 
session_start();
require ('connect.php');
  
    if(isset($_SESSION['cartt'])){ 
          
        $sql="SELECT * FROM product WHERE product_id IN ("; 
          
        foreach($_SESSION['cartt'] as $id => $value) { 
            $sql.=$id.","; 
        } 
          
        $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
        $query=mysqli_query($mysqli,$sql); 
        while($row=mysqli_fetch_array($query)){ 
              
        ?> 
            <p><?php echo $row['product_name'] ?> x <?php echo $_SESSION['cartt'][$row['product_id']]['quantity'] ?></p> 
        <?php 
              
        } 
    ?> 
        <hr /> 
        <a href="cartt.php?page=cart">Go to cart</a> 
    <?php 
          
    }else{ 
          
        echo "<p>Your Cart is empty. Please add some products.</p>"; 
          
    } 
  
?>