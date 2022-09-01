<?php
include 'conn.php';
$cdel=$_GET['catid'];
$del="DELETE FROM `categories` WHERE cid='$cdel'";
$run=mysqli_query($conn,$del);
if($run){
    header('location:category.php');
}


?>