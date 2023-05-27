<?php
include('../includes/connect.php');
if(isset($_POST['insert_product']))
{
    $product_title=$_POST['product_title'];
    $product_descreption=$_POST['product_descreption'];
    $product_keyword=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    // accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
   


    // accesing image temp name
    $tmp_image1=$_FILES['product_image1']['tmp_name'];
    $tmp_image2=$_FILES['product_image2']['tmp_name'];
    $tmp_image3=$_FILES['product_image3']['tmp_name'];

    // check for condition all the fields are filled
    if($product_title=='' || $product_descreption=='' || $product_keyword=='' || $product_category=='' || $product_brands=='' || $product_price=='' || $product_image1=='' || $product_image2=='' || $product_image3==''){
        echo "<script>alert('Please Fill All The Available fields')</script>";
        exit();
    }else{
        move_uploaded_file($tmp_image1,"./product_images/$product_image1");
        move_uploaded_file($tmp_image2,"./product_images/$product_image2");
        move_uploaded_file($tmp_image3,"./product_images/$product_image3");

        // insert query
        $insert_products="insert into `products` (product_title, product_descreption, product_keyword, category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values('$product_title','$product_descreption','$product_keyword','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo"<script>alert('Successfully inserted the products')</script>";
        }
    }

   



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert_Products-Admin Dashboard</title>
      <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- css link -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id = "product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required>
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_descreption" class="form-label">Product description</label>
                <input type="text" name="product_descreption" id = "product_descreption" class="form-control" placeholder="Enter Product description" autocomplete="off" required>
            </div>

            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product keywords</label>
                <input type="text" name="product_keyword" id = "product_keyword" class="form-control" placeholder="Enter Product keywords" autocomplete="off" required>
            </div>

            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                        $select_query="Select * from `categories`";
                        $result_query=mysqli_query($con,$select_query);

                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];

                            echo "<option value='$category_id'>$category_title</option>";

                        }

                    ?>
                </select>
            </div>

            <!-- Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select a Brand</option>
                    <?php
                        $select_query="Select * from `brands`";
                        $result_query=mysqli_query($con,$select_query);

                        while($row=mysqli_fetch_assoc($result_query)){
                            $brand_title=$row['brand_title'];
                            $brand_id=$row['brand_id'];

                            echo "<option value='$brand_id'>$brand_title</option>";

                        }

                    ?>
                  
                </select>
            </div>

            <!-- Image1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image 1</label>
                <input type="file" name="product_image1" id = "product_image1" class="form-control" placeholder="Upload Image1"  required>
            </div>

            <!-- Image2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image 2</label>
                <input type="file" name="product_image2" id = "product_image2" class="form-control" placeholder="Upload Image2"  required>
            </div>

            <!-- Image3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image 3</label>
                <input type="file" name="product_image3" id = "product_image3" class="form-control" placeholder="Upload Image3"  required>
            </div>

             <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id = "product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required>
            </div>
             <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>

            
        </form>
    </div>
    
</body>
</html>