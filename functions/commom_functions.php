<style>
.card-img-top{
  object-fit:contain;
}
</style>
<?php

function getproduct(){
    global $con;
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
    $select_query="select * from products order by rand() limit 0,9";
    $result_query=mysqli_query($con,$select_query);
    //$row=myssqli_fetch_assoc($result_query);
    //echo $row['$product_title'];
while($row=mysqli_fetch_assoc($result_query)){
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_descrip=$row['product_description'];
$product_image1=$row['product_image1'];
$category_id=$row['category_id'];
$brand_id=$row['Brand_id'];
$product_cost=$row['product_cost'];
echo "<div class='col-md-4 mv-2'>
<div class='card'>
      <img src='./admin area/product_images/$product_image1' class='card-img-top' alt='...'>
          <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_descrip</p>
                  <p class='card-text'>Product price:$product_cost/-</p>
                  <a href='retail.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                  
</div>
</div>
</div>";
}
}
}
}
function getbrands(){
    global $con;
 
    $select_brands="select * from brand";
    $result_brand=mysqli_query($con,$select_brands);
    while($row_data=mysqli_fetch_assoc($result_brand)){
      $brand_title=$row_data['Brand_title'];
      $brand_id=$row_data['Brand_id'];
      echo " <li class='nav-item' text-center>
      <a href='retail.php?brand=$brand_id class='nav-link text-light'>$brand_title</a>
      </li>";
    }
}
function getcategories(){
    global $con;
    $select_categories="select * from categories";
    $result_categories=mysqli_query($con,$select_categories);
    while($row_data=mysqli_fetch_assoc($result_categories)){
      $category_title=$row_data['Category_title'];
      $category_id=$row_data['category_id'];
      echo " <li class='nav-item'>
      <a href='retail.php?category=$category_id class='nav-link text-light'>$category_title</a>
      </li>";
    }
} 

function get_unique_brands(){
  global $con;
  if(isset($_GET['brand'])){
  $brand_id=$_GET['brand'];
  $select_query="select * from products where Brand_id='$brand_id'";
  $result_query=mysqli_query($con,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows==0){
    echo"<h2 class='text-center'>No stock for this category</h2>";
  }
while($row=mysqli_fetch_assoc($result_query)){
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_descrip=$row['product_description'];
$product_image1=$row['product_image1'];
$category_id=$row['category_id'];
$brand_id=$row['Brand_id'];
$product_cost=$row['product_cost'];
echo "<div class='col-md-4 mv-2'>
<div class='card'>
    <img src='./admin area/product_images/$product_image1' class='card-img-top' alt='...'>
        <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_descrip</p>
                <p class='card-text'>Product price:$product_cost/-</p>
                <a href='retail.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                
</div>
</div>
</div>";
}
}

}
function get_unique_categories(){
  global $con;
  if(isset($_GET['category'])){
  $category_id=$_GET['category'];
  
  $select_query="select * from products where category_id='$category_id'";
  $result_query=mysqli_query($con,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows==0){
    echo"<h2>No stock for this category</h2>";
  }
while($row=mysqli_fetch_assoc($result_query)){
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_descrip=$row['product_description'];
$product_image1=$row['product_image1'];
$category_id=$row['category_id'];
$brand_id=$row['Brand_id'];
$product_cost=$row['product_cost'];
echo "<div class='col-md-4 mv-2'>
<div class='card'>
    <img src='./admin area/product_images/$product_image1' class='card-img-top' alt='...'>
        <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_descrip</p>
                <p class='card-text'>Product price:$product_cost/-</p>
                <a href='retail.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                
</div>
</div>
</div>";
}
}
}
function search_product(){
global $con;

if(isset($_GET['search_data_product'])){
$search_data_value=$_GET['search_data_product'];
$search_query="select * from products where product_keywords like '%$search_data_value%'";
$result_query=mysqli_query($con,$search_query);
while($row=mysqli_fetch_assoc($result_query)){
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_descrip=$row['product_description'];
$product_image1=$row['product_image1'];
$category_id=$row['category_id'];
$brand_id=$row['Brand_id'];
$product_cost=$row['product_cost'];
echo "<div class='col-md-4 mv-2'>
<div class='card'>
    <img src='./admin area/product_images/$product_image1' class='card-img-top' alt='...'>
        <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_descrip</p>
                <p class='card-text'>Product price:$product_cost/-</p>
                <a href='retail.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                
</div>
</div>
</div>";
}
}
}
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  

function cart(){
  if(isset($_GET['add_to_cart'])) {
    global $con;
    $ip = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="select * from cart_details where ip_adress='$ip' and product_id=$get_product_id";
    $result_query=mysqli_query($con, $select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
    echo "<script>alert('This item is already present inside cart')</script>";
    echo "<script>window.open('retail.php', '_self')</script>";

}
else{
 $insert_query="insert into cart_details(product_id, ip_adress,quantity) values($get_product_id, '$ip',0)";
  $result_query=mysqli_query($con, $insert_query);
  echo "<script>alert('Item is added to the cart')</script>";
  echo "<script>window.open('retail.php', '_self')</script>";
}
}
}
function cart_item(){
    global $con;
    $ip = getIPAddress();
    $select_query="select * from cart_details where ip_adress='$ip'";
    $result_query=mysqli_query($con, $select_query);
    $count_cart_items=mysqli_num_rows($result_query);
    echo $count_cart_items;
    }
function total_cart_price(){
  global $con;
  $ip= getIPAddress();
  $total_price=0;
  $cart_query="select * from cart_details where ip_adress='$ip'";
  $result=mysqli_query($con, $cart_query);
  while($row=mysqli_fetch_array($result)) {
      $product_id=$row['product_id'];
      $select_products="select * from products where product_id='$product_id'";
      $result_products=mysqli_query($con,$select_products);
      while($row_product_price=mysqli_fetch_array($result_products)){
      $product_price=array($row_product_price['product_cost']); //[200]
      $product_values=array_sum($product_price); // [200]
      $total_price+=$product_values;
      }
    }
      echo $total_price; 
  }
function get_order_details(){
  global $con;
  $username=$_SESSION['username'];
  $get_details="select * from user_table where username='$username'";
  $result_query=mysqli_query($con,$get_details);
  while($row=mysqli_fetch_array($result_query)){
    $user_id=$row['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
        $get_order="select * from user_orders where user_id=$user_id and order_status='pending'";
        $result_orders=mysqli_query($con,$get_order);
        $row_count=mysqli_num_rows($result_orders);
        if($row_count>0){
          echo "<h3 class='text-center'>You have <span class='text-danger'>$row_count&nbsp</span>pending orders</h3><p class='text-center'><a href='profile.php?my_orders'>Order Details</a></p>";
        }
        else{
        echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero pending orders</h3><a href='../retail.php' class='text-dark'><center>Explore more products</center></a></p>";
        }
      }
      }
    }
  }
}

