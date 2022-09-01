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
  $c_upd=$_GET['catuid'];
  if(isset($_POST['update'])){
    $cat=$_POST['category'];
//    $img=$_POST['image'];
    $desc=$_POST['descri'];
    $filen=$_FILES['imga']['name'];



    if(($_FILES['imga']['name']!="")){
      $target='images/';
      $filename=$_FILES['imga']['name'];
      $path=pathinfo($filename);
      $file=$path['filename'];
      $ext=$path['extension'];

      $tmp=$_FILES['imga']['tmp_name'];

      $path_file=$target.$file.".".$ext;

      //if(file_exists($path_file)){
     //     echo "sorry";
    //  }
      //else{
          move_uploaded_file($tmp,$target.$filename);
        
      //}
      
      
      
      
      $cupd="UPDATE `categories` SET `cat_name`='$cat',`image`='$filen',`descr`='$desc' WHERE cid='$c_upd'";
      $run=mysqli_query($conn,$cupd);
      if($run){
        header('location:category.php');
      }
    }
  }


?>
<div class="container mt-5">
    <h2 class="text-center">Update category</h2>
<form method="post" enctype='multipart/form-data'>

<?php 
    $sel="SELECT * FROM `categories` WHERE cid='$c_upd'";
    $r=mysqli_query($conn,$sel);
    while($ro=mysqli_fetch_assoc($r)){
            $cn=$ro['cat_name'];
            $ima=$ro['image'];
            $des=$ro['descr'];


            ?>
  <div class="mb-3">
    <label for="category" class="form-label">Enter category</label>
    <input type="text" value="<?php echo $cn;?>" class="form-control" name="category" id="category">
</div>
<div class="mb-3">
    <label for="imga" class="form-label">Enter Image</label>
    <input type="file" value="<?php echo $ima;?>" class="form-control" name="imga" id="image">
</div>
<div class="mb-3">
    <label for="descri" class="form-label">Enter description</label>
    <textarea name="descri" cols="30" rows="10" class="form-control"><?php echo $des;?></textarea>
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