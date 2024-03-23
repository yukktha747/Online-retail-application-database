<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>User registration</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
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
<input type="email" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_username"/>
</div>
<div class="form-outline">
<label for="user_contact" class="form-label">Contact</label>
<input type="number" id="user_contact" class="form-control" placeholder="Enter your number" autocomplete="off" required="required" name="user_username"/>
</div>
<div class="mt-4 pt-2">
<input type="submit" value="Login" class="bg-info py-2 px-3 border-8" name="user_login">
<p class="small fw-bold mt-2 pt-1 mb-0"> Don't have an account?<a href="user_registration.php" class="text-danger">Register</a> </p>
</div>

</form>
</div>
</div>
</div>
