<?php
    $error=false;
    include 'conn.php';
    if(isset($_POST['submit'])){

        $uname=$_POST['uname'];
        $pass=$_POST['password'];
        $cpass=$_POST['cpassword'];

        if(empty($uname) || empty($pass)){
           $error = "Empty fields can't be accepted";

        }
        elseif(strlen($pass)<=5){
            $error = "Password should have atleast 6 characters";

        }
        
        else{

            
            $select="SELECT * FROM `users` WHERE uname='$uname'";
            $query=mysqli_query($conn,$select);
        $num=mysqli_num_rows($query);
        if($num>0){
            $error = "username already exists";
        }
        elseif($pass==$cpass){
            $hash=password_hash($pass,PASSWORD_DEFAULT);
            $ins="INSERT INTO `users`(`uname`, `password`) VALUES ('$uname','$hash')";
            $query=mysqli_query($conn,$ins);
            if($query){
                header("location:login.php");
            }
        }
        else{
            $error= "password unmatched";
        }
        }
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
    
    include 'header.php';
    if($error){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>'.$error.'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
           }
?>
<div class="container-fluid">

    <form method="post" action="register.php">
        <div class="mb-3">
            <label for="uname" class="form-label">Username</label>
            <input type="text" class="form-control" name="uname" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
  
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="p">

        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" name="cpassword" class="form-control" id="cp">

        </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
include 'footer.html';
?>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  </body>
</html>