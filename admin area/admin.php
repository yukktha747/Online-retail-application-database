<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
     integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" 
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
<style>
.admin-image{
    width:80px;
    object-fit:contain;
    }
</style>
</head>
<body>
   <div class="container-fluid p-0">
     <nav class="navbar navbar-expand-lg navbar-light bg-info">
       <div class="container-fluid">
          <img src="../images/logo.png" class="logo" >
          <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
               
</ul>
</nav>
</div>
</nav>
<div class="bg-light">
    <h3 class="text-center p-2">Manage details</h3>
</div>
                <div class="row">
                    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                        <div>
                            <a href="#"><img src="../images/pineapple.webp" class="admin-image" alt=""></a>
            
                </div>
                <div class="button text-center">
                    <button><a href="insert_product.php"  class="btn btn-group bg-info text-dark my-1">Insert products</a></button>
                    <button><a href="admin.php?insert_category"  class="btn btn-group  bg-info text-dark my-1">Insert categories</a></button>
                    <button><a href="admin.php?insert_brands"  class="btn btn-group  bg-info text-dark my-1">Insert brands</a></button>
                    <button><a href="../users_area/users_logout.php"  class="btn btn-group  bg-info text-dark my-1">Logout</a></button>
                    </div>
</div>
</div>
<div class="container">
    <?php
      if(isset($_GET['insert_category'])){
         include('insert_categories.php');
      }
      if(isset($_GET['insert_brands'])){
        include('insert_brands.php');
     }
      ?>
   </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
</body>
</html>