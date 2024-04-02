<?php 
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
  header("location: login.php");
  exit;
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
      .i{
        height: 343px;
      }
      .j{
        background-color: silver;
        padding-bottom: 24px;
        padding-top: 12px;
      }

      @media (min-width:281px) and (max-width:414px){
   .i{
     height: 130px!important;
   }
  }  
  @media (min-width:415px) and (max-width:540px){
   .i{
     height: 181px!important;
   }
  }

  @media (max-width:280px){
   .card-body{
     padding: 0px!important;
     padding-top: 10px!important;
   }
   .i{
     height: 130px!important;
   }

  }

    </style>
  </head>
  <body>
  <?php   
  include 'conn.php';

  
    include 'header.php';
?>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://source.unsplash.com/2400x900/?food" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="text-dark">Welcome</h2>
        <h4 class="text-dark">Explore the taste of Chinise</h4>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/2400x900/?vegetables" class="d-block w-100" alt="...">
    
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/2400x900/?chicken" class="d-block w-100" alt="...">
        
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="j container-fluid my-2">

    <div class="jumbotron">
        <h1 class="display-4"><i><b>HOT & SPICE</b></i></h1>
        <p class="lead">Healthy and yummy. Good for your tummy.</p>
        <h4>Welcome <?php echo $_SESSION['uname']; ?></h4>
          <hr class="my-4">
          <p><i>Hot & Spice</i> is located in Rander,Surat near Masjid-e-Ali. The owner of the shop is Bilal Valsadwala.
             He started this shop in march 2022.He also had worked as a hotel manager in one of the Bahrain
            Restaurant. <i>Hot & Spice</i> is known for adding good quality ingrediants and serving delicious
             food-items to customers.</p>
            </div>
  </div>

<div class="container mt-5">
  <h1 class="text-center">Full Dish</h1>
    <div class="row">

<?php
    $sel="SELECT * FROM `categories` LIMIT 3";
    $quer=mysqli_query($conn,$sel);
    while($orw=mysqli_fetch_assoc($quer)){
        $cname=$orw['cat_name'];
        $cid=$orw['cid'];

        ?>

        <div class="col card" style="width: 18rem;">
            <img src="images/<?php echo $orw['image']; ?>" class="i card-img-top mt-1" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $cname ?></h5>
                <p class="card-text"><?php echo $orw['descr'] ?></p>
                <a href="item.php?cid=<?php echo $cid;?>" class="btn btn-outline-primary">View</a>
            </div>
        </div>
        <?php
    }        
        ?>
    </div>
</div>

<div class="container mt-5">  
  <h1 class="text-center">Half Dish</h1>


    <div class="row">

<?php
    $sel="SELECT * FROM `categories` LIMIT 2";
    $quer=mysqli_query($conn,$sel);
    while($orw=mysqli_fetch_assoc($quer)){
        $cname=$orw['cat_name'];
        $cid=$orw['cid'];

        ?>

        <div class="col card " style="width: 18rem;">
            <img src="images/<?php echo $orw['image'];?>" class="i card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $cname ?></h5>
                <p class="card-text"><?php echo $orw['descr'] ?></p>
                <a href="half.php?cid=<?php echo $cid;?>" class="btn btn-outline-primary">View</a>
            </div>
        </div>
        <?php
    }        
        ?>
    </div>
</div>

<div class="container mt-5">  
  <h1 class="text-center">Others</h1>


    <div class="row">

<?php
    $sel="SELECT * FROM `categories` WHERE cid>= 4";
    $quer=mysqli_query($conn,$sel);
    while($orw=mysqli_fetch_assoc($quer)){

      $cname=$orw['cat_name'];
      $cid=$orw['cid'];

        ?>

<div class="col card " style="width: 18rem;">
  <img src="images/<?php echo $orw['image'];?>" class="i card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $cname ?></h5>
                <p class="card-text"><?php echo $orw['descr'] ?></p>
                <a href="others.php?cid=<?php echo $cid;?>" class="btn btn-outline-primary">View</a>
              </div>
            </div>
            <?php
          }
          
          ?>
    </div>
</div>

<?php
if($_SESSION['uname']=='Nomaan'){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $dish=$_POST['dish'];
      $im=$_POST['file'];
      $hf=$_POST['half'];
      $f=$_POST['full'];
      $cat=$_POST['category'];
      $sub_cat=$_POST['scategory'];

      if(isset($_FILES['file'])){

        $fname=$_FILES['file']['name'];
        $fsize=$_FILES['file']['size'];
        $tmp=$_FILES['file']['tmp_name'];
        $ftype=$_FILES['file']['type'];

        move_uploaded_file($tmp,"images/". $fname);

      }

      $insert="INSERT INTO `products` (`name`, `half_price`, `price`, `image`, `sid`) VALUES ('$dish', '$hf', '$f', '$im', '$sub_cat')";
      $e=mysqli_query($conn,$insert);

    }


  ?>
  <div class="container">

    <form method="post">
      <div class="mb-3">
        <label for="dish" class="form-label">Dish Name</label>
        <input type="text" name="dish" class="form-control">
      </div>
      <div class="mb-3">
        <label for="file" class="form-label">Image</label>
        <input type="file" name="file" class="form-control">
      </div>

      <div class="mb-3">
        <label for="half" class="form-label">Half Price</label>
        <input type="text" name="half" class="form-control">
      </div>

      <div class="mb-3">
        <label for="full" class="form-label">Full price</label>
        <input type="text" name="full" class="form-control">
      </div>


 
  <div class="mb-3">
  <label for="scategory" class="form-label"> Sub categories</label>

    <select class="form-control" name="scategory">
      <?php
      $sel= "SELECT * FROM `sub_categories`";
      $run=mysqli_query($conn,$sel);
      while($row=mysqli_fetch_assoc($run)){
        $satid=$row['sid'];
        $sn=$row['sub_name'];
        ?>
      <option value="<?php echo $satid; ?>"><?php echo $sn; ?></option>
      <?php }?>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
<?php
}
?>


<?php
include 'footer.html';
?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>