<?php
include('connects/connect.php');
include('functions/commom_functions.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Retail application database</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
      *{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

    .card-img-top{
    width:100%;
    height:200px;
    object-fit:cover;
    box-sizing: border-box;
}
.cart-img{
    object-fit:contain;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-info">
    
  <div class="container-fluid p-0">
    <img src=".\images\logo.png" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="retail.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/users_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price:<?php total_cart_price();?>/-</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul classbar="navbar-nav me-auto" style="list-style-type:none;">
    
    <?php
    if(!isset($_SESSION['username'])){
      echo " <li class='nav-item'>
      <a class='nav-link' href='#'>Welcome Guest</a>
      </li>";
    }
    else{
      echo " <li class='nav-item'>
      <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
    }

    if(!isset($_SESSION['username'])){
      echo " <li class='nav-item'>
      <a class='nav-link' href='./users_area/users_login.php'>Login</a>
      </li>";
    }
    else{
      echo " <li class='nav-item'>
      <a class='nav-link' href='./users_area/users_logout.php'>Logout</a>
      </li>";
    }
   ?>
</ul>
</nav>
<div class="bg-light">
    <h3 class="a">Hidden store</h3>
    <p class="b">Communication is the heart of retail and community</p>
</div> 
<div class="container">
<div class="row">
  <form action="" method="post">
<table class="table table-bordered text-center">
<?php
      global $con;
      $ip= getIPAddress();
      $total_price=0;
      $cart_query="select * from cart_details where ip_adress='$ip'";
      $result=mysqli_query($con, $cart_query);
      $result_count=mysqli_query($con,$cart_query);
      $result_count=mysqli_num_rows($result);
      if($result_count>0){
        echo "<thead>
        <tr>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Remove</th>
        <th colspan='2'>Operations</th>
        </tr>
        </thead>
        </tbody";
      while($row=mysqli_fetch_array($result)) {
          $product_id=$row['product_id'];
          $select_products="select * from products where product_id='$product_id'";
          $result_products=mysqli_query($con,$select_products);
          while($row_product_price=mysqli_fetch_array($result_products)){
          $product_price=array($row_product_price['product_cost']);
          $price_table=$row_product_price['product_cost'];
          $product_title= $row_product_price['product_title'];
          $product_image1= $row_product_price['product_image1'];
          $product_values=array_sum($product_price);
          $total_price+=$product_values;
        ?>
  <tr>
  <td><?php echo $product_title?></td>
  <td><img width="100" height="100"  class="cart-img" src="./admin area/product_images/<?php echo $product_image1?>" alt=""></td>
  <td><input type="text" name="qty" id="" class="form-input w-50"></td>
  <?php 
  $ip= getIPAddress();
  if(isset($_POST['update_cart'])){
    $quantities=$_POST['qty'];
    $update_cart="update cart_details set quantity='$quantities' where ip_adress='$ip'";
    $result_products_quantity=mysqli_query($con,$update_cart);
    $total_price=$total_price*$quantities;

  }
  ?>
  <td><?php echo $price_table?>/-</td>
  <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
  
<td>
    <!--<button class="bg-info px-3 py-2 border-0">Update-->
  <input type="submit" value="update cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
  <input type="submit" value="remove cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
  
</td>
        <?php }}}
        else{
          echo "<center><h2>cart is empty</center></h2>";
        }
        ?>
</table>
</tbody>
<div class="d-flex mb-5">
  <?php
     $ip= getIPAddress();
     $cart_query="select * from cart_details where ip_adress='$ip'";
     $result=mysqli_query($con, $cart_query);
     $result_count=mysqli_query($con,$cart_query);
     $result_count=mysqli_num_rows($result);
     if($result_count>0){
      echo "<h4 class='px-3'>Subtotal:<strong class='text-info'>$total_price/-</strong></h4>
      <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='Continue_shopping'>
      <button class='bg-secondary px-3 border-0 py-2 '><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Check out</a></button>";
     }
     else{
      echo "<center><input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='Continue_shopping'></center>";
     }
     if(isset($_POST['Continue_shopping'])){
    echo "<script>window.open('retail.php','_self')</script>";
     }
    ?>
</div>
</div>
</div>
</form>
<?php
  function remove_cart_item(){
    global $con;
if(isset($_POST['remove_cart'])){
  foreach($_POST['removeitem'] as $remove_id){
    echo $remove_id;
    $delete_query="Delete from cart_details where product_id=$remove_id";
    $run_delete=mysqli_query($con,$delete_query);
    if($run_delete){
      echo "<script>window.open('cart_details.php','_self')</script>";
    }
  }
}
  }
  echo $remove_item=remove_cart_item();
  ?>
<?php
cart();
?>


<div class="bg-info text-center my-1">
  <p>All rights are reserved</p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>>
</html>
</body>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>