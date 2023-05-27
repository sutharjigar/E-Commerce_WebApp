<?php

    include('../includes/connect.php');
    include('../functions/common_functions.php');
    @session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

     <!-- css file -->
    <link rel="stylesheet" href="../style.css">

    <!-- font awsome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body{
            overflow: hidden;
        }
        .product-img{
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    
    <div class="container-fluid m-3">
        
        <h2 class="text-center mb-5">
            Admin Login
        </h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/adminreg.jpg" alt="Admin image" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="admin_name" class="form-label">Username</label>
                        <input type="text" name="admin_name" id="admin_name" placeholder="Enter Your Name" class="form-control">
                    </div>
                    
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" name="admin_password" id="admin_password" placeholder="Enter Your password" class="form-control">
                    </div>
                    

                    <div>
                        <input type="submit" value="Login" class="bg-dark py-2 px-3 text-light border-0" name="admin_login">
                        <p class="small fw-bold mt-2 pt-1">Don't you have an account ? <a href="admin_registration.php" class="link-danger">Register</a></p>
                    </div>


                </form>
            </div>


        </div>
    </div>

</body>
</html>



<?php


if(isset($_POST['admin_login'])){
    global $con; 
    $admin_name = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];

    $select_query = "SELECT * FROM `admin_table` where admin_name='$admin_name'";
    $result=mysqli_query($con, $select_query);
    $row_count= mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);

    

    if($row_count>0){
        $_SESSION['admin_name'] = $admin_name;
        if(password_verify($admin_password, $row_data['admin_password'])){
            // echo "<script>alert('Login Successful')</script>";
            if($row_count == 1 and $row_count_cart == 0){
                $_SESSION['admin_name'] = $admin_name;
                 echo "<script>alert('Login Successful')</script>";
                 echo "<script>window.open('index.php','_self')</script>"; 
            }
            else{

                echo "<script>alert('Invalid Credentials')</>";

            }

        }
        else{

            echo "<script>alert('Invalid Credentials')</>";

        }
    }
    else
    {
        echo "<script>alert('Invalid Credentials')</script>";
    }

}

?>