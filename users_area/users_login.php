<?php include('../connects/connect.php');
      include('../functions/commom_functions.php');
      @session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>User registration</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>User registration form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>
<body>
 <div class="container-fluid my-3">
  <h2 class="text-center">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center mt-5">
       <div class="col-lg-12 col-xl-6">
 <form action="" method="post" enctype= "multipart/form-data">
<!-- username feield -->
<div class="form-outline mb-4">
<label for="user username" class="form-label">Username</label>
<input type="text" id="user username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
</div>
<div class="form-outline mb-4">
  <label for="user_password" class="form-label">Password</label>
  <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
</div>
<div class="mt-4 pt-2">
<input type="submit" value="Login" class="bg-info py-2 px-3 border-8" name="user_login">
<p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?<a href="users_registration.php" class="text-danger">Register</a> </p>
</div>
</form>
</div>
</div>
</div>
</body>
</html>
<?php 
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $select_query="select * from user_table where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();
    $select_query_cart="select * from cart_details where ip_adress='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    if($row_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['user_password'])){
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Invalid credentials')</script>";
        }
    }else{
        echo "<script>alert('Invalid credentials')</script>";
    }
}
   

?>
