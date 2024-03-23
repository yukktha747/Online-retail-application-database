<?php
include("../connects/connect.php");
if(isset($_POST['insert_product'])){

 $product_title=$_POST['product_title'];
 $description=$_POST['description'];
 $product_keyword=$_POST['product_keyword'];
 $product_category=$_POST['product_category'];
 $product_brand=$_POST['product_brand'];
 $product_cost=$_POST['product_cost'];

 $product_image1=$_FILES['product_image1']['name'];
 $product_image2=$_FILES['product_image2']['name'];
 $product_image3=$_FILES['product_image3']['name'];

 $temp_image1=$_FILES['product_image1']['tmp_name'];
 $temp_image2=$_FILES['product_image2']['tmp_name'];
 $temp_image3=$_FILES['product_image3']['tmp_name'];

 if($product_title=='' or $description=='' or $product_keyword=='' or $product_category=='' or $product_brand=='' or $product_cost=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
  echo "<script>alert('Please fill the available fields')</script>";
  exit();
 }
 else{
  move_uploaded_file($temp_image1,"./product_images/$product_image1");
  move_uploaded_file($temp_image2,"./product_images/$product_image2");
  move_uploaded_file($temp_image3,"./product_images/$product_image3");

  $insert_products="insert into products(product_title,product_description,product_keywords,category_id,Brand_id,product_image1,product_image2,product_image3,product_cost) values('$product_title','$description','$product_keyword','$product_category','$product_brand','$product_image1','$product_image2','$product_image3',$product_cost)";
  
  $result_query=mysqli_query($con,$insert_products);
  if($result_query){
    echo "<script>alert('Products succesfully inserted')</script>";
  }
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container">
        <h1 class="text-center">Insert products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product keywords</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select Category</option>
                    <?php
                       $select_query="select * from categories";
                       $result_query=mysqli_query($con,$select_query);
                       while($row=mysqli_fetch_assoc($result_query)){
                         $category_title=$row['Category_title'];
                         $category_id=$row['category_id'];
                         echo "<option value='$category_id'>$category_title</option>";

                        }
?>
                  <!--  <option value="">Fruits</option> 
                    <option value="">Vegetables</option>
                    <option value="">Ice cream</option>
                    <option value="">Chips</option>-->
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Select Brands</option>
                    <?php
                       $select_query="select * from brand";
                       $result_query=mysqli_query($con,$select_query);
                       while($row=mysqli_fetch_assoc($result_query)){
                         $brand_title=$row['Brand_title'];
                         $brand_id=$row['Brand_id'];
                         echo "<option value='$brand_id'>$brand_title</option>";

                        }
?>
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control"  required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control"  required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control"  required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_cost" class="form-label">Product Price</label>
                <input type="text" name="product_cost" id="product_cost" class="form-control" placeholder="Enter product Price" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>
</form>

</div>
</body>
</html>