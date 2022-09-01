<?php
include 'conn.php';
$cdel=$_GET['scatid'];
$del="DELETE FROM `sub_categories` WHERE sid='$cdel'";
$run=mysqli_query($conn,$del);
if($run){
    header('location:sub_cat.php');
}


?>