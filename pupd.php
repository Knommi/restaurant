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
  $error=false;
  
  $c_upd=$_GET['puid'];
  if(isset($_POST['update'])){
    $prod=$_POST['product'];
    $hprice=$_POST['hprice'];
    $fprice=$_POST['fprice'];
    $scates=$_POST['scates'];


    $proimg=$_FILES['image']['name'];

    if(($_FILES['image']['name']!="")){
      $target='images/';
      $filename=$_FILES['image']['name'];
      $path=pathinfo($filename);
      $file=$path['filename'];
      $ext=$path['extension'];

      $tmp=$_FILES['image']['tmp_name'];

      $path_file=$target.$file.".".$ext;

      
      move_uploaded_file($tmp,$target.$filename);
        
      
      
      
      $cupd="UPDATE `products` SET `name`='$prod',`half_price`='$hprice',`price`='$fprice',`image`='$proimg',`sid`='$scates' WHERE id='$c_upd'";
      $run=mysqli_query($conn,$cupd);
      if($run){
        header('location:product.php');
      }
    }
  
  }


?>
<div class="container mt-5">
    <h2 class="text-center">Update Products</h2>
<form method="post" enctype='multipart/form-data'>

<?php 
    $sel="SELECT * FROM `products` WHERE id='$c_upd'";
    $r=mysqli_query($conn,$sel);
    while($ro=mysqli_fetch_assoc($r)){
            $cn=$ro['name'];
            $hp=$ro['half_price'];
            $fp=$ro['price'];
          

            ?>
  <div class="mb-3">
    <label for="product" class="form-label">Enter Product name</label>
    <input type="text" value="<?php echo $cn;?>" class="form-control" name="product">
</div>
  <div class="mb-3">
    <label for="hprice" class="form-label">Enter half price</label>
    <input type="number" value="<?php echo $hp;?>" class="form-control" name="hprice">
</div>
  <div class="mb-3">
    <label for="fprice" class="form-label">Enter Full price</label>
    <input type="number" value="<?php echo $fp;?>" class="form-control" name="fprice">
</div>
  <div class="mb-3">
    <label for="image" class="form-label">Enter Image</label>
    <input type="file" class="form-control" name="image">
</div>
<div class="mb-3">
    <label for="scates" class="form-label">Enter Sub category</label>

    <select name="scates" class="form-control">

    <?php
              $selca="SELECT * FROM `sub_categories`";
              $t=mysqli_query($conn,$selca);
              while($rf=mysqli_fetch_assoc($t)){

    ?>

        <option value="<?php echo $rf['sid']; ?>"><?php echo $rf['sub_name']; ?></option>

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