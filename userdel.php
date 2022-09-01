<?php
include 'conn.php';
$cdel=$_GET['usdid'];
$del="DELETE FROM `users` WHERE uid='$cdel'";
$run=mysqli_query($conn,$del);
if($run){
    header('location:user.php');
}


?>