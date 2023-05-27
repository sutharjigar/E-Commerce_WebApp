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
    <title>Admin-registration</title>
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
            Admin Registration
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
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="email" name="admin_email" id="admin_email" placeholder="Enter Your Email" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" name="admin_password" id="admin_password" placeholder="Enter Your password" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter Your confirm password" class="form-control">
                    </div>

                    <div>
                        <input type="submit" value="Register" class="bg-dark py-2 px-3 text-light border-0" name="admin_registration">
                        <p class="small fw-bold mt-2 pt-1">Do you Already have an account ? <a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>


                </form>
            </div>




        </div>
    </div>

</body>
</html>


<?php

    if(isset($_POST['admin_registration'])){
        global $con;

        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $admin_password = $_POST['admin_password'];
        $hash_password = password_hash($admin_password,PASSWORD_DEFAULT);
        $conf_admin_password = $_POST['confirm_password'];



        // select query

        $select_query = "SELECT * FROM `admin_table` where admin_name='$admin_name' or admin_email ='$admin_email'";
        $result=mysqli_query($con, $select_query);
        $rows_count = mysqli_num_rows($result);
        if($rows_count > 0){
            echo "<script>alert('Username and Email is Already Exist')</script>";
        }
        else if($admin_password != $conf_admin_password){
            echo "<script>alert('Password do not Match')</script>";
        }
        else{
            // insert_query
            $insert_query = "insert into `admin_table` (admin_name,admin_email,admin_password) values('$admin_name','$admin_email','$hash_password')";
            $sql_execute = mysqli_query($con,$insert_query);
            if($sql_execute){
                echo "<script>alert('Data inserted Successfully')</script>";
            }
            else
            {
                die(mysqli_error($con)); 
            }
        }



       




    }


?>