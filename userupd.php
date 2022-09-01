<?php
    session_start();
    if($_SESSION['uname']!='Nomaan'){
        header('location:login.php');
    }
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

 
  <?php
  include 'conn.php';
  include 'header.php';
  $c_upd=$_GET['usuid'];
  if(isset($_POST['update'])){
    $uname=$_POST['uname'];
    $pass=$_POST['password'];
    $hash=password_hash($pass,PASSWORD_DEFAULT);


    $cupd="UPDATE `users` SET `uname`='$uname',`password`='$hash' WHERE uid='$c_upd'";
    $run=mysqli_query($conn,$cupd);
    if($run){
        header('location:user.php');
    }
  
  }


?>
<div class="container mt-5">
    <h2 class="text-center">Update User</h2>
<form method="post">

<?php 
    $sel="SELECT * FROM `users` WHERE uid='$c_upd'";
    $r=mysqli_query($conn,$sel);
    while($ro=mysqli_fetch_assoc($r)){
            $un=$ro['uname'];
          


            ?>
  <div class="mb-3">
    <label for="uname" class="form-label">Enter Uname</label>
    <input type="text" value="<?php echo $un;?>" class="form-control" name="uname" >
</div>
<div class="mb-3">
    <label for="password" class="form-label">Enter Password</label>
    <input type="password" class="form-control" name="password">
</div>

<?php
}
?>
  <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>
</div>
<?php
include 'footer.html';
?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>