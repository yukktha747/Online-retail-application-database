<?php
if(isset($_GET['edit_account'])){
    $user_session=$_SESSION['username'];
    $select_query="select * from user_table where username='$user_session'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $username=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_contact=$row_fetch['user_mobile'];
    $user_image=$row_fetch['user_image'];
}
    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_contact=$_POST['user_mobile'];
        $user_image=$_FILES['user_image']['name'];
        $user_temp_image=$_FILES['user_image']['tmp1_name'];
        move_uploaded_file($user_temp_image,"./user_images/$user_image");
        $update="update user_table set username='$username',user_email='$user_email',user_image='$user_image',user_address='$user_address',user_mobile=$user_contact where user_id=$update_id";
        $result_query_update=mysqli_query($con,$update);
        if($result_query_update){
            echo "<script>alert('Date updated successfully')</script>";
            echo "<script>window.open('users_logout.php','_self')</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
</head>
<style>
.edit_image{
width:100px;
height:100px;
object-fit: contain; 
    }
</style>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
   <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $username?>" name="user_username">
    </div>
    <div class="form-outline mb-4"> 
       <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email?>" name="user_email">
    </div>
    <div class="form-outline mb-4 d-flex w-50 m-auto">
       <input type="file" class="form-control m-auto" value="<?php echo $user_image?>" name="user_image">
       <img src="./user_images/<?php echo $user_image?>" alt="" class="edit_image">
    </div>
    <div class="form-outline mb-4">
      <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address?>" name="user_address">
    </div>
    <div class="form-outline mb-4">
     <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_contact?>" name="user_mobile">
    </div>
    <center><input type="submit" value="update" class="bg-info py-2 px-3 border-0" name="user_update">
</form>
</body>
</html>