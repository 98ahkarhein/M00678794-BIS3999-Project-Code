<?php  
session_start();
include('connect.php');
unset($_SESSION['customer_id']);
echo "<script>window.alert('Logout');window.location.assign('home_page.php')</script>";
?>