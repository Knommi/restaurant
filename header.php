<?php 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $login=true;
}
else{
$login=false;
}

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i>Hot & Spice</i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
   <li class="nav-item">
         <a class="nav-link active" aria-current="page" href="index.php">Home</a>
       </li>';
    if($login){

      
           
            
           echo '<li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>';
        
          
            if($_SESSION['uname']=='Nomaan'){
           echo '<li class="nav-item">
           <a class="nav-link" href="product.php">Product</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="category.php">Category</a>
         </li>
         <li class="nav-item">
         <a class="nav-link" href="sub_cat.php">Sub category</a>
       </li>
       <li class="nav-item">
       <a class="nav-link" href="user.php">Users</a>
     </li>
         ';
           
            }
       
       }


            if(!$login){
              echo '<li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
              </li>';
            
            }

         echo '</ul>
          <form action="search.php" class="d-flex">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          


  </div>
</div>
</nav>';