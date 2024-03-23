<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <h3 class="text-danger mb-4">Delete account</h3>
    <form action="" method="post" class="mt-5">
      <div class="form-outline mb-4">
      <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete account">
    </div>
    <div class="form-outline mb-4">
      <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="Don't delete account">
    </div>
</form>
<?php

$username_session=$_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query="delete from user_table where username='$username_session'";
    $result=mysqli_query($con,$delete_query);
    if($result){
        session_destroy();
        echo "<script>alert('Account deleted successfully')</script>";
        echo "<script>window.open('../retail.php','_self')</script>";
    }
}
if(isset($_POST['dont_delete'])){
    echo "<script>window.open('profile.php','_self')</script>";
 }


?>

</body>
</html>