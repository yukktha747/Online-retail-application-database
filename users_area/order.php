<?php include('../connects/connect.php');
      include('../functions/commom_functions.php');
      
   ?>  

   <?php
      if(isset($_GET['user_id'])){
          $user_id=$_GET['user_id'];
      }
      $get_ip_address=getIPAddress();
      $total_price=0;
      $cart_query_price="select * from cart_details where ip_adress='$get_ip_address'";
      $result=mysqli_query($con,$cart_query_price);
      $invoice_number=mt_rand();
      $status="pending";
      $count_products=mysqli_num_rows($result);
      while($row_price=mysqli_fetch_array($result)){
          $product_id=$row_price['product_id'];
          $select_product="select * from products where product_id=$product_id";
          $result_price=mysqli_query($con,$select_product);
          while($row_product_price=mysqli_fetch_array($result_price)){
              $product_price=$row_product_price['product_cost'];
              $total_price+=$product_price;
          }
      }
      $get_cart="select * from cart_details";
      $run_cart=mysqli_query($con,$get_cart);
      $get_item_quantity=mysqli_fetch_array($run_cart);
      $quantity=$get_item_quantity['quantity'];
      if($quantity==0){
          $quantity=1;
          $subtotal=$total_price;
      }else{
          $quantity1=$quantity;
          $subtotal=$total_price*$quantity1;
      }
      
      $insert_order="insert into user_orders(user_id,amount_due,invoice_number,total_products,order_status,stock) values($user_id,$subtotal,$invoice_number,$count_products,'$status',100)";
      $result_query=mysqli_query($con,$insert_order);
      if($result_query){
          echo"<script>alert('Orders are submitted successfully')</script>";
          echo "<script>window.open('profile.php','_self')</script>";
      }
      $insert_pending_order="insert into order_pending(user_id,invoice_number,product_id,quantity,order_status,stock) values($user_id,$invoice_number,$product_id,$quantity,'$status',100)";
      $result1_query=mysqli_query($con,$insert_pending_order);
      $empty_query="delete from cart_details where ip_adress='$get_ip_address'";
      $result1_delete=mysqli_query($con,$empty_query);
?>
      