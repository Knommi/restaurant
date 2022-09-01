<?php
    $error=false;

    include 'conn.php';
    if(isset($_POST['login'])){
        $uname=$_POST['uname'];
        $pass=$_POST['password'];
        
        $select="SELECT * FROM `users` WHERE uname='$uname'";
        $query=mysqli_query($conn,$select);
        $num=mysqli_num_rows($query);
        if($num==1){
          while($row=mysqli_fetch_assoc($query)){
            if(password_verify($pass,$row['password']))
            {
                session_start();
                $_SESSION['loggedin']=true;
                
                $_SESSION['uid'] = $row['uid'];
                $_SESSION['uname']=$uname;
                header("location:index.php");
            }
            else{
                $error= "incorrect password";
            }

          }
        }
        else{
            $error= "usename doesn't exists";
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

<form method="post" action="login.php">
    <div class="mb-3">
        <label for="uname" class="form-label">Username</label>
        <input type="text" class="form-control" name="uname" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
 
        <button type="submit" name="login" class="btn btn-primary">LOGIN</button>
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