<?php
include 'conn.php';
$cdel=$_GET['comid'];
$del="DELETE FROM `comment` WHERE id='$cdel'";
$run=mysqli_query($conn,$del);
if($run){
    header('location:index.php');
}


?>