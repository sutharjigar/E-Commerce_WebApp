<!--  connect file-->
<?php 

include('includes/connect.php');
include('functions/common_functions.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- css link -->
    <link rel="stylesheet" href="style.css">
    <style>
      body{
        overflow-x: hidden;
      }
    </style>
</head>
<body>
    
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="./images/logo.jpg" alt="" class="logo">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <?php
        if(isset($_SESSION['username'])){
          echo " <li class='nav-item'>
          <a class='nav-link' href='./users_area/profile.php'>My Account</a>
        </li>";
        }else{
          echo" <li class='nav-item'>
          <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
        </li>";
        }
        
        ?>
        
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
        </li>
       
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">

        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

    <!-- calling cart function -->
   

    <!-- Second child -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
            
            <?php
            if(!isset($_SESSION['username'])){
              echo " <li class='nav-item'>
                 <a class='nav-link' href='#'>Welcome Guest</a>
            </li>";
            }else{
              echo "<li class='nav-item'>
                 <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
            </li>";
            }
            if(!isset($_SESSION['username'])){
              echo " <li class='nav-item'>
                 <a class='nav-link' href='./users_area/user_login.php'>Login</a>
            </li>";
            }else{
              echo "<li class='nav-item'>
                 <a class='nav-link' href='./users_area/logout.php'>Logout</a>
            </li>";
            }
            ?>
             

        </ul>
     </nav>

     <!-- third child -->
    <div class="bg-light">
        <h3 class="text-center">
            Hidden Store
        </h3>
        <p class="text-center">
            Communication is at the heart of e-commerce and community
        </p>
    </div>

    <!-- fourth child -->
    <?php 
    cart();  
    ?>
    <div class="row px-3">
        <div class="col-md-10">
            <!-- products -->

            <div class="row">
                <!-- fetching products -->
                <?php 
                // calling function
                getProducts();
                getUniqueCate();
                getUniqueBrands();
             
                // $ip = getIPAddress();  
                // echo 'User Real IP Address - '.$ip;  

                ?>



                
                <!-- row end -->
            </div>
              
        <!-- col end -->      
        </div>
        <div class="col-md-2 bg-secondary p-0">
            <!-- sidenavbar -->
                <!-- brand to be displayed on screen-->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link"><h4>Delivery Brands</h4></a>
                </li>
                <?php 
                 getBrands();
                ?>
                
            </ul>
            <!-- categories to be displayed -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link"><h4>Categories</h4></h4></a>
                </li>
                    <?php 
                         getCategories();
                    ?>
            </ul>
            
        </div>
    </div>


    <!-- last child -->
    <!-- include footer -->
    <?php include("./includes/footer.php"); ?>
    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>