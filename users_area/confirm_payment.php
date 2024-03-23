<?php
include('../connects/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_order="select * from user_orders where order_id=$order_id";
    $result_data=mysqli_query($con,$select_order);
    $row_fetch_data=mysqli_fetch_assoc($result_data);
    $invoice_number=$row_fetch_data['Invoice_number'];
    $amount_due=$row_fetch_data['amount_due'];
}
if(isset($_POST['confirm_payment'])){
    $invoice_number1=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into user_payments(order_id,Invoice_number,amount,payment_mode,date) values($order_id,$invoice_number1,$amount,'$payment_mode',NOW())";
    $result_1=mysqli_query($con,$insert_query);
    if($result_1){
        echo "<h3>class='text-center text-light'>Successfully completed the payment</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
        
    }
}
$update_orders="update user_orders set order_status='Complete' where order_id=$order_id";
$result_2=mysqli_query($con,$update_orders);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-secondary">
    <h1 class="text-center">Payment page</h1>
    <div class="container my-5">
        <form action="" method="post">
        <div class="form-outline my-4 text-center w-50 m-auto">
          <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
          <label for="" class="text-light">Amount</label>
          <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due  ?>">
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
          <select name="payment_mode" class="form-select w-50 m-auto">
            <option>Select payment mode</option>
            <option>UPI</option>
            <option>Netbanking</option>
            <option>Paypal</option>
            <option>Cash on delivery</option>
            <option>Pay offline</option>
         </select>
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
          <input type="submit" class=" bg-info form-control w-50 m-auto" value="Confirm" name="confirm_payment">
        </div>
</form>
</div>
</body>
</html>
