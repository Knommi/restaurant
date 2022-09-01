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
    <style>
        #ima{
            width: 50px;
            height: 50px;
        }

        .j{
            background-color: honeydew;
            padding-top: 14px;
            padding-bottom: 14px;
        }
    </style>
  </head>
  <body>

  <?php   
  include 'conn.php';

  
    include 'header.php';
?>
  <div class="j container-fluid my-2">

    <div class="jumbotron">
        <h1 class="display-4"><i><b>HOT & SPICE</b></i></h1>
        <p class="lead">Fast and yummy. Good for your tummy.</p>
        <h4>Welcome <?php echo $_SESSION['uname']; ?></h4>
          <hr class="my-4">
          <p><i>Hot & Spice</i> is located in Rander,Surat near Masjid-e-Ali. The owner of the shop is Bilal Valsadwala.
             He started this shop in march 2022.He also had worked as a hotel manager in one of the Bahrain
            Restaurant. <i>Hot & Spice</i> is known for adding good quality ingrediants and serving delicious
             food-items to customers.</p>
    </div>
</div>
<div class="container">

    <table class="table table-primary table-hover">
        <tr>
                    <th>Sr no.</th>
                    <th>Product name</th>
                    <th>Half price</th>
                    <th>Full price</th>
                    <th>Image</th>
                    <th>Sub cate</th>
                    <th colspan="2">Action</th>
                </tr>
    <?php
        $cat="SELECT * FROM `products`";
        $run=mysqli_query($conn,$cat);
        $i=1;

        while($row=mysqli_fetch_assoc($run)){
            $cate=$row['sid']
            
            ?>


<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['half_price']; ?></td>
    <td><?php echo $row['price']; ?></td>
    <td><img id="ima" src="images/<?php echo $row['image']; ?>" alt=""></td>
<?php
    $selc="SELECT * FROM `sub_categories` WHERE sid='$cate'";
    $t=mysqli_query($conn,$selc);
    while($G=mysqli_fetch_assoc($t)){

        ?>

<td><?php echo $G['sub_name']; ?></td>
<?php
}
?>
    <td><a class="btn btn-outline-danger" href="pdel.php?pdid=<?php echo $row['id']; ?>">Delete</a></td>
    <td><a class="btn btn-outline-warning" href="pupd.php?puid=<?php echo $row['id']; ?>">Update</a></td>
</tr>
<?php
$i++;
}
?>
</table> 

</div>


<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $pname=$_POST['pname'];
    $hprice=$_POST['hprice'];
    $fprice=$_POST['fprice'];
    $scate=$_POST['scate'];

    $proimg=$_FILES['image']['name'];

    if(($_FILES['image']['name']!="")){
      $target='images/';
      $filename=$_FILES['image']['name'];
      $path=pathinfo($filename);
      $file=$path['filename'];
      $ext=$path['extension'];

      $tmp=$_FILES['image']['tmp_name'];

      $path_file=$target.$file.".".$ext;

      //if(file_exists($path_file)){
     //     echo "sorry";
    //  }
      //else{
          move_uploaded_file($tmp,$target.$filename);
        
      //}
      
      
      
      $ins="INSERT INTO `products` (`name`,`half_price`,`price`,`image`,`sid`) VALUES ('$pname', '$hprice','$fprice','$proimg','$scate')";
      
      $run=mysqli_query($conn,$ins);
    }
  
  
  }


?>
<div class="container mt-5">
    <h2 class="text-center">Enter Products</h2>
<form method="post" enctype='multipart/form-data' action="product.php">
  <div class="mb-3">
    <label for="pname" class="form-label">Enter Product name</label>
    <input type="text" class="form-control" name="pname">
  </div>
  <div class="mb-3">
    <label for="hprice" class="form-label">Enter Half price</label>
    <input type="text" class="form-control" name="hprice">
  </div>
  <div class="mb-3">
    <label for="fprice" class="form-label">Enter Full price</label>
    <input type="text" class="form-control" name="fprice">
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Enter Image</label>
    <input type="file" class="form-control" name="image">
  </div>
  <div class="mb-3">
    <label for="scate" class="form-label">Enter sub category</label>
    <select name="scate" class="form-control" id="scate">
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

  <button type="submit" class="btn btn-primary">Submit</button>
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