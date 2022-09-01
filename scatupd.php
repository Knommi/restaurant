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
  $c_upd=$_GET['scatuid'];
  if(isset($_POST['update'])){
    $scat=$_POST['scategory'];
    $cats=$_POST['cates'];

    $cupd="UPDATE `sub_categories` SET `sub_name`='$scat',`cid`='$cats' WHERE sid='$c_upd'";
    $run=mysqli_query($conn,$cupd);
    if($run){
        header('location:sub_cat.php');
    }
  
  }


?>
<div class="container mt-5">
    <h2 class="text-center">Update Sub category</h2>
<form method="post">

<?php 
    $sel="SELECT * FROM `sub_categories` WHERE sid='$c_upd'";
    $r=mysqli_query($conn,$sel);
    while($ro=mysqli_fetch_assoc($r)){
            $cn=$ro['sub_name'];
          

            ?>
  <div class="mb-3">
    <label for="scategory" class="form-label">Enter Sub category</label>
    <input type="text" value="<?php echo $cn;?>" class="form-control" name="scategory" id="category">
</div>
<div class="mb-3">
    <label for="cates" class="form-label">Enter category</label>

    <select name="cates" class="form-control"  id="">

    <?php
              $selca="SELECT * FROM `categories`";
              $t=mysqli_query($conn,$selca);
              while($rf=mysqli_fetch_assoc($t)){

    ?>

        <option value="<?php echo $rf['cid']; ?>"><?php echo $rf['cat_name']; ?></option>

<?php
    }
?>
    </select>
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