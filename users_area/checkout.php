<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Checkout</title>
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
.logo{
  width:3%;
  height:3%;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-info">
    
  <div class="container-fluid p-0">
    <img src="../images/logo.png" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../retail.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input class="btn btn-outline-light" type="submit" value="Search" name="search_data_product">
      </form>
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
      <a class='nav-link' href='./users_login.php'>Login</a>
      </li>";
    }
    else{
      echo " <li class='nav-item'>
      <a class='nav-link' href='./users_login.php'>Logout</a>
      </li>";
    }
   ?>
</ul>
</nav>
<div class="row px-1">
    <div class="col-md-10">
      <div class="row">
         <?php
           if(!isset($_SESSION['username'])){
            include('users_login.php');
           }
           else{
            include('payment.php');
           }
         ?>


</div>
</div>



</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>>
</html>
</body>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>