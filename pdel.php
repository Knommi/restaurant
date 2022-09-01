<?php
include 'conn.php';
$cdel=$_GET['pdid'];
$del="DELETE FROM `products` WHERE id='$cdel'";
$run=mysqli_query($conn,$del);
if($run){
    header('location:product.php');
}


?>