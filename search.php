<?php

include 'conn.php';
session_start();
$user_id = $_SESSION['uid'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id' AND price='$product_price'") or die('query failed');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
      $message[] = 'product added to cart!';
   }

};

if(isset($_POST['update_cart'])){
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
   $message[] = 'cart quantity updated successfully!';
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
   header('location:index.php');
}
  
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:index.php');
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
    <link rel="stylesheet" href="css/style.css">

    <title>Hello, world!</title>
    <style>
        #im{
            height: 312px;
            width: 242px;
        }
        #im2{
            width: 85px;
        }
        #t{
         width: 100%;
        }


    </style>
  </head>
  <body><?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

<div class="container">

<div class="user-profile">

   <?php
      $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE uid= '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>

   <p> username : <span><?php echo $fetch_user['uname']; ?></span> </p>
   <div class="flex">
      <a href="login.php" class="btn">login</a>
      <a href="register.php" class="option-btn">register</a>
      <a href="item.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">logout</a>
   </div>

</div>


<div class="products">
   
   <h1 class="heading">latest products</h1>
   <?php
   $get=$_GET['search'];
   $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE name='$get'") or die('query failed');
   
   ?>
<h2 class="text-center"> <?php echo $get; ?> </h2>
<div class="box-container">
   
   <?php
              if(mysqli_num_rows($select_product) > 0){
                 while($fetch_product = mysqli_fetch_assoc($select_product)){
                 
              ?>
      <form method="post" class="box" action="">
          <img id="im" src="images/<?php echo $fetch_product['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_product['name']; ?></div>
         <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
         <input type="number" min="1" name="product_quantity" value="1">
         <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn">
        </form>
        <?php

      if($fetch_product['half_price']!=0){?>
         <form method="post" class="box" action="">
         <img id="im" src="images/<?php echo $fetch_product['image']; ?>" alt="">
        <div class="name"><?php echo $fetch_product['name']; ?></div>
        <div class="price">$<?php echo $fetch_product['half_price']; ?>/-</div>
        <input type="number" min="1" name="product_quantity" value="1">
        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
        <input type="hidden" name="product_price" value="<?php echo $fetch_product['half_price']; ?>">
        <input type="submit" value="add to cart" name="add_to_cart" class="btn">
       </form> 
       <?php
      }
}
}
else{?>
<h1>Result Not found</h1>
<?php
}
?>
</div>
</div>

<div class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table id="t">
      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>
      <tbody>
      <?php
         $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
         <tr>
            <td><img id="im2" src="images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>$<?php echo $fetch_cart['price']; ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                  <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                  <input type="submit" name="update_cart" value="update" class="option-btn">
               </form>
            </td>
            <td>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <td><a href="search.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
         </tr>
      <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
         }
      ?>
      <tr class="table-bottom">
         <td colspan="4">grand total :</td>
         <td>$<?php echo $grand_total; ?>/-</td>
         <td><a href="search.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">delete all</a></td>
      </tr>
   </tbody>
   </table>

   <div class="cart-btn">  
      <a href="#" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
   </div>

</div>

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