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
    <title>Payment Page</title>
     <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
   <style>
    .payment_img{
        width: 50%;
        margin:auto;
        display:block;
    }
   </style>

</head>
<body>
    <!-- php code to access user id -->
    <?php
    
    $user_ip=getIPAddress();
    $get_user="select*from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];

    
    ?>
    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com"><img src="../images/upi.jpeg" alt="" class="payment_img"></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id;?>"><h2 class="text-center">Pay Offline<h2></a>
            </div>
        </div>
    </div>
</body>
</html>