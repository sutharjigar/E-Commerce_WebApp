<?php 

// including conn file
// include('./includes/connect.php');

// getting products
function getProducts()
{
    global $con;

    // condition to check it is set or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
      $select_query = "SELECT * FROM `products` order by rand() LIMIT 0,4";
      $result_query=mysqli_query($con, $select_query);
                    
        while($row=mysqli_fetch_assoc($result_query))
        {
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_descreption=$row['product_descreption'];
                    
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $brand_id=$row['brand_id'];
            $category_id=['category_id'];
                    
                        
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_descreption</p>
                                    <p class='card-text'>Price: $product_price/-</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View More</a>
                                </div>
                    </div>
                </div>";

                        
        }
}
}
}


// getting all products
function getAllProducts(){
            global $con;

    // condition to check it is set or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
      $select_query = "SELECT * FROM `products` order by rand()";
      $result_query=mysqli_query($con, $select_query);
                    
        while($row=mysqli_fetch_assoc($result_query))
        {
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_descreption=$row['product_descreption'];
                    
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $brand_id=$row['brand_id'];
            $category_id=['category_id'];
                    
                        
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_descreption</p>
                                     <p class='card-text'>Price: $product_price/-</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View More</a>
                                </div>
                    </div>
                </div>";

                        
        }
}
}
}



// getting unique categories
function getUniqueCate()
{
    global $con;

    // condition to check it is set or not
    if(isset($_GET['category'])){
        $category_id = $_GET['category'];
       
      $select_query = "SELECT * FROM `products` where category_id=$category_id";
      $result_query=mysqli_query($con, $select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows == 0){
        echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
      }
                    
        while($row=mysqli_fetch_assoc($result_query))
        {
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_descreption=$row['product_descreption'];
                    
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $brand_id=$row['brand_id'];
            $category_id=['category_id'];
                    
                        
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_descreption</p>
                                     <p class='card-text'>Price: $product_price/-</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View More</a>
                                </div>
                    </div>
                </div>";

                        
        }
}
}


// getting unique categories
function getUniqueBrands()
{
    global $con;

    // condition to check it is set or not
    if(isset($_GET['brand'])){
        $brand_id = $_GET['brand'];
       
      $select_query = "SELECT * FROM `products` where brand_id=$brand_id";
      $result_query=mysqli_query($con, $select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows == 0){
        echo "<h2 class='text-center text-danger'>This Brand is not available for service</h2>";
      }
                    
        while($row=mysqli_fetch_assoc($result_query))
        {
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_descreption=$row['product_descreption'];
                    
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $brand_id=$row['brand_id'];
            $category_id=['category_id'];
                    
                        
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_descreption</p>
                                     <p class='card-text'>Price: $product_price/-</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View More</a>
                                </div>
                    </div>
                </div>";

                        
        }
}
}





// displaying brands in sidenav
function getBrands()
{
        global $con;
        $select_brands = "Select* from `brands`";
        $result_brands = mysqli_query($con, $select_brands);

            while($row_data = mysqli_fetch_assoc($result_brands))
            {
                $brand_title = $row_data['brand_title'];
                $brand_id = $row_data['brand_id'];

                echo "  <li class='nav-item'>
                         <a href='index.php?brand=$brand_id' class='nav-link'> $brand_title</a>
                        </li>";
            }
}

function getCategories()
{
    global $con;
      $select_category = "Select* from `categories`";
      $result_category = mysqli_query($con, $select_category);
            
        while($row_data = mysqli_fetch_assoc($result_category))
        {
                $category_title = $row_data['category_title'];
                $category_id = $row_data['category_id'];

                echo "  <li class='nav-item'>
                            <a href='index.php?category=$category_id' class='nav-link'> $category_title</a>
                        </li>";
        }
}


// searching products
function search_product(){
        global $con;
        if(isset($_GET['search_data_product'])){
            $user_search =$_GET['search_data'];
      $search_query="Select * from `products` where product_keyword like '%$user_search%'";
      $result_query=mysqli_query($con, $search_query);
       $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows == 0){
        echo "<h2 class='text-center text-danger'>No results match, No products found on this category!!!</h2>";
      }
                    
        while($row=mysqli_fetch_assoc($result_query))
        {
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_descreption=$row['product_descreption'];
                    
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $brand_id=$row['brand_id'];
            $category_id=['category_id'];
                    
                        
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_descreption</p>
                                     <p class='card-text'>Price: $product_price/-</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View More</a>
                                </div>
                    </div>
                </div>";
  
        }
}
}


// view details function
function view_details()
{
    global $con;

    // condition to check it is set or not
    if(isset($_GET['product_id']))
    {
        if(!isset($_GET['category']))
        {
            if(!isset($_GET['brand']))
            {
                $product_id=$_GET['product_id'];
                $select_query = "SELECT * FROM `products` where product_id=$product_id";
                $result_query=mysqli_query($con, $select_query);
                        
                while($row=mysqli_fetch_assoc($result_query))
                {
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_descreption=$row['product_descreption'];
                        
                    $product_image1=$row['product_image1'];
                    $product_image2=$row['product_image2'];
                    $product_image3=$row['product_image3'];
                    $product_price=$row['product_price'];
                    $brand_id=$row['brand_id'];
                    $category_id=['category_id'];
                        
                            
                    echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$product_title</h5>
                                        <p class='card-text'>$product_descreption</p>
                                         <p class='card-text'>Price: $product_price/-</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                        <a href='index.php' class='btn btn-dark'>Go Home</a>
                                    </div>
                        </div>
                    </div>
                    
                    <div class='col-md-8'>
                        <div class='row'>

                            <div class='col-md-12'>
                                <h4 class='text-center text-info mb-5'>
                                    Related Products
                                </h4>
                            </div>

                            <div class='col-md-6'>
                                <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                            </div>

                            <div class='col-md-6'>
                                <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                            </div>
                        </div>
                    </div>";

                            
                }
            }
        }
    }
}

// get ip function
 function getIPAddress(){  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


// cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
            global $con; 
            $ip = getIPAddress();  //::1
            $get_product_id=$_GET['add_to_cart'];
            $select_query="Select * From `cart_details` where ip_address='$ip' and product_id=$get_product_id";
            $result_query=mysqli_query($con,$select_query);
            $num_of_rows=mysqli_num_rows($result_query);
                if($num_of_rows > 0)
                {
                    echo "<script>alert('Item is already present inside Cart')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                }
                else
                {
                    
                    $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$ip',0)";
                    $result_query=mysqli_query($con,$insert_query);
                    echo "<script>alert('Item is added to Cart')</script>";
                    echo "<script>window.open('index.php','_self')</script>";

                }


    }
}

// function to get cart numbers
function cart_item(){
      if(isset($_GET['add_to_cart'])){
            global $con; 
            $ip = getIPAddress();  //::1
            $select_query="Select * From `cart_details` where ip_address='$ip'";
            $result_query=mysqli_query($con,$select_query);
            $count_cart_items=mysqli_num_rows($result_query);
               
        } 
        else
        {
            global $con; 
            $ip = getIPAddress();  //::1
            $select_query="Select * From `cart_details` where ip_address='$ip'";
            $result_query=mysqli_query($con,$select_query);
            $count_cart_items=mysqli_num_rows($result_query);
        }
        echo $count_cart_items;

}

// total price funciton
function total_cart_price(){
    global $con;
    $ip = getIPAddress();  //::1

    $total = 0;

    $cart_query="Select * From `cart_details` where ip_address='$ip'";
    $result=mysqli_query($con,$cart_query);
    
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products= "Select * From `products` where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);  //[200]
            $product_values=array_sum($product_price);  //[200]
            $total+=$product_values;    //0+200 = 200;

        }

    }
    echo $total;

}


// get user order details
function get_user_order_details(){
    global $con; 
    $username=$_SESSION['username'];
    $get_details="Select * from `user_table` where username='$username'";
    $result_query = mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id = $row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="Select * from `user_orders` where user_id=$user_id and order_status='pending'";
                        $result_orders_query = mysqli_query($con,$get_orders);
                        $row_count=mysqli_num_rows($result_orders_query);
                        if($row_count > 0){
                            echo "<h3 class='text-center text-success my-5 mt-5 mb-2'>You Have <span class='text-danger'>$row_count</span> pending Orders</h3>
                            <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                        }else{
                              echo "<h3 class='text-center text-success my-5 mt-5 mb-2'>You Have Zero pending Orders</h3>
                            <p class='text-center'><a href='../index.php' class='text-dark'>Explore Products</a></p>";

                        }
                }

            }

        }
    }
}

?>