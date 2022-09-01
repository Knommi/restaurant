<?php
session_start();

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
      #pi{
        width: 344px;
      }

      .j{
        background-color: wheat;
        padding-bottom: 24px;
        padding-top: 12px;
      }
    </style>
  </head>
  <body>
    <?php
      include 'header.php';
        include 'conn.php';

      $get=$_GET['pid'];
      $sel="SELECT * FROM `products` WHERE id='$get'";
      $run=mysqli_query($conn,$sel);
      while($row=mysqli_fetch_assoc($run)){
          $pname=$row['name'];
          $iamge=$row['image'];

      }
    ?>

  <div class="j container-fluid my-2">

    <div class="jumbotron">
        <h1 class="display-4"><i><b>HOT & SPICE</b></i></h1>
        <img id="pi" src="images/<?php echo $iamge;?>" alt="">
        <h2 ><?php echo $pname; ?></h2>
          <hr class="my-4">
          <i><b>Express your thoughts, Elaborate your views, Share your experience with others by posting comment below.</b></i>
            </div>
  </div>

  <?php

  $show=false;
   if($show){
    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>Thankyou! Your comment is submitted</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>';
  }

  if($_SERVER['REQUEST_METHOD']=='POST'){
    $comment=$_POST['comment'];
    
    $comment = str_replace("<","&lt;",$comment);
    $comment = str_replace(">","&gt;",$comment);
    $sno=$_POST["sno"];

      $ins="INSERT INTO `comment` (`comment`, `pid`, `time`, `comment_by`) VALUES ( '$comment', '$get', current_timestamp(), '$sno')";
      $result = mysqli_query($conn,$ins); 
      $show=true;
    


  }
      

?>
  <div class="container-fluid">
<h2 class="text-center">Post a comment</h2>
<form action="<?php echo $_SERVER["REQUEST_URI"]; ?>"  method="post">
      
      <div class="form-group">
        <label for="exampleInputEmail1">Type your comment</label>
          <textarea type="text" class="form-control" name="comment" id="comment" rows="5" cols="40"></textarea>
          <input type="hidden"  name="sno" value="<?php echo $_SESSION["uid"]; ?>">
          </div>
      
        <button type="submit" class=" mt-4 btn btn-primary">Post Comment</button>
    </form>

</div>


<div class="container mt-5" id="stu">

                  <h2 class="py-2">Comments</h2>
                  <?php
                        $sql="SELECT * FROM `comment` WHERE pid=$get";
                        $result = mysqli_query($conn,$sql); 
                        $not =true;
                        while($row = mysqli_fetch_assoc($result)){
                          $not =false;
                          $id = $row['id'];
                          $cont =  $row['comment'];
                          $c_time =  $row['time'];
                          $cby= $row['comment_by'];

                          $sl="SELECT * FROM `users` WHERE uid='$cby'";
                          $result2 = mysqli_query($conn,$sl); 
                          $num=mysqli_num_rows($result2);
                          if($num>0){

                            $row2 = mysqli_fetch_assoc($result2);
                            
                            $mail = $row2['uname'];

                          echo
                          '<div class="row">
                          <div class="col-lg-10 media my-3">
                          <img src="images/use.jpg" width="50px" class="mr-3" alt="...">
                          <div class="media-body">
                          
                          <p class="font-weight-bold my-0"><b>'. $mail .' at ' . $c_time . '</b></p>
                          ' . $cont . '
                          </div>
                          </div>';
                          if($_SESSION['uid']==$cby){
                            echo '<div class="col-lg-2 mt-5">
                            <a href="comdel.php?comid='.$id.'" class="btn btn-outline-danger">Delete</a>
                            </div>';
                            
                          }
                          elseif($_SESSION['uname']=="Nomaan"){
                            echo '<div class="col-lg-2 mt-5">
                            <a href="comdel.php?comid='.$id.'" class="btn btn-outline-danger">Delete</a>
                            </div>';
                          }
                          echo '</div>';
                        }
    
                      }
                         
                       

                  ?>
                   
                  <?php if($not)
                  {
                   echo ' <div class="alert alert-primary" role="alert">
                   <b> Be the first person to ask!</b>
                  </div>';
                  }
                  ?>

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