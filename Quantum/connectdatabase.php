<?php 
$host = "localhost";
$user = "root";
$pass = "";
$database = "mydb"; 

$connection = mysqli_connect($host,$user,$pass,$database)
or die ("Couldn't connect to database");
mysql_select_db($connection);
?> 