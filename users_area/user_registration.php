<?php
include('../connects/connect.php');
include('../functions/commom_functions.php');
?>
<body>
<div class="container-fluid my-3">
  <h2 class="text-center">New User Registration</h2>
   <div class="row d-flex align-items-center justify-content-center">
    <div class="col-lg-12 col-x1-6">
<form action="" method="post" enctype="multipart/form-data">
   <div class="form-outline">
<!-- username feield -->
<label for="user_username" class="form-label">Username</label>
<input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
</div>
<!-- email | -->
<div class="form-outline">
<label for="user_Email" class="form-label">Email</label>
<input type="email" id="user_Email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_username"/>
</div>
<div class="form-outline">
<label for="user_Image" class="form-label">User Image</label>
<input type="file" id="user_Image" class="form-control" autocomplete="off" required="required" name="user_username"/>
</div>
<div class="form-outline">
<label for="user_password" class="form-label">Password</label>
<input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_username"/>
</div>
<div class="form-outline">
<label for="conf_user_password" class="form-label">Confirm password</label>
<input type="password" id="conf_user_password" class="form-control" placeholder="Confirm your password" autocomplete="off" required="required" name="user_username"/>
</div>
<div class="form-outline">
<label for="user_address" class="form-label">Address</label>
<input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_username"/>
</div>
<div class="form-outline">
<label for="user_contact" class="form-label">Contact</label>
<input type="number" id="user_contact" class="form-control" placeholder="Enter your number" autocomplete="off" required="required" name="user_username"/>
</div>
<div class="mt-4 pt-2">
<input type="submit" placeholder="Register" class="bg-info py-2 px-3 border-8" name="user_register">
<p class="small fw-bold mt-2 pt-1 mb-0"> Don't have an account?<a href="user_registration.php" class="text-danger">Register</a> </p>
</div>

</form>
</div>
</div>
</div>

<?php
  if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_POST['user_email']['tmp_name'];
    $user_ip=getIPAddress();
move_uploaded_file($user_image_tmp,'./user_images/');
$insert_query="insert into user_table(username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values('$user_username','$user_emai','$user_password','$user_image','$user_ip','$user_contact')";
$result=mysqli_query($con,$insert_query);
if($result){
  echo "<script>alert('Data inserted successfully')</script>";
}
else{
  die(mysqli_error($con));
}
  }