
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
                    <th>Name</th>
                    <th  colspan="2">Action</th>
                </tr>
    <?php
        $cat="SELECT * FROM `users`";
        $run=mysqli_query($conn,$cat);
        $i=1;
        while($row=mysqli_fetch_assoc($run)){
            
            
            ?>


<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['uname']; ?></td>
    <td><a class="btn btn-outline-danger" href="userdel.php?usdid=<?php echo $row['uid']; ?>">Delete</a></td>
    <td><a class="btn btn-outline-warning" href="userupd.php?usuid=<?php echo $row['uid']; ?>">Update</a></td>
</tr>
<?php
$i++;
}
?>
</table> 

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