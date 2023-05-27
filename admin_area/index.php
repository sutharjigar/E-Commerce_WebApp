<?php

include('../includes/connect.php');
include('../functions/common_functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

     <!-- css file -->
    <link rel="stylesheet" href="../style.css">

    <!-- font awsome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .footer {
            position: absolute;
            bottom: 0;
        }
        body{
            overflow-x: hidden;
        }
        .product_img{
            width:100px;
            object-fit:contain;

        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.jpg" class = "logo">
                    <nav class="navbar navbar-expand-lg">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="" class = "nav-link">Welcome Guest</a>
                            </li>
                        </ul>
                    </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img class="admin_image" src="../images/pineapple.jpg" alt=""></a>
                    <p class="text-light text-center">
                        Admin Name
                    </p>
                </div>
                <!-- button*10>a.nav-link.text-light.bg-info.my-1 -->
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3">
            <?php
                if(isset($_GET['insert_category'])){
                    include('insert-categories.php');
                }
                if(isset($_GET['insert_brands'])){
                    include('insert-brands.php');
                }
                if(isset($_GET['view_products'])){
                    include('view_products.php');
                }
                if(isset($_GET['edit_products'])){
                    include('edit_products.php');
                }
                if(isset($_GET['delete_products'])){
                    include('delete_products.php');
                }
                if(isset($_GET['view_categories'])){
                    include('view_categories.php');
                }
                if(isset($_GET['view_brands'])){
                    include('view_brands.php');
                }
                if(isset($_GET['edit_category'])){
                    include('edit_category.php');
                }
                if(isset($_GET['edit_brands'])){
                    include('edit_brands.php');
                }
                if(isset($_GET['delete_category'])){
                    include('delete_category.php');
                }
                if(isset($_GET['delete_brands'])){
                    include('delete_brands.php');
                }
                if(isset($_GET['list_orders'])){
                    include('list_orders.php');
                }
                if(isset($_GET['list_payments'])){
                    include('list_payments.php');
                }
                if(isset($_GET['list_users'])){
                    include('list_users.php');
                }
            ?>
        </div>

        <!-- last child -->
          <?php include("../includes/footer.php"); ?>

    </div>
    

<!-- bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>

</body>
</html>