<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../classes/Product.php');
include_once ($filepath.'/../classes/Brand.php');
include_once ($filepath.'/../classes/Category.php');

?>

<?php
$pd = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    

      $insertProduct = $pd->productInsert($_POST, $_FILES);
}






?>

<!DOCTYPE html>
<html>
<head>
	<title>Header</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
   
	<nav style="min-height: 90px; font-size: 18px;" class="navbar navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand" href="#">MarkoKostic.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="social.php">Social Media</a>
      </li>
    <li>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category Option
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="catadd.php">Category Add</a>
          <a class="dropdown-item" href="catlist.php">Category List</a>
         
          
        </div>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Brand Option
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         <a class="dropdown-item" href="brandadd.php">Brand Add</a>
          <a class="dropdown-item" href="brandlist.php">Brand List</a>
          
          
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Product Option
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="productadd.php">Product Add</a>
          <a class="dropdown-item" href="productlist.php">Product List</a>
          
          
        </div>
      </li>


    
  </div>
</nav>

<!-- HEADER END -->

   

   <section class="" style="background-image: url('iphone-se-og.jpg');background-repeat: no-repeat; background-attachment: fixed;  background-size: 100% 100%;">
   	 <div class="row" >
   	 	 <div class="offset-lg-1 col-lg-10 " style="min-height:500px; ">
   	 	 	<br>
   	 	 			<br><br>
   	 	 	
   	 	 		
   	 	 		<h3 class="text-light col-md-6">Add Product</h3>
          <br>
          <?php
            if (isset($insertProduct)) {
              echo $insertProduct;
            }


          ?>
          <form action=" " method="post" enctype="multipart/form-data">
            
             <div class="form-group col-md-6">
                <label class="text-light">Product Name</label>
                <input class="form-control" type="text" name="productName" placeholder="Enter product name..">

                
              
               

                 <label class="text-light">Category Name</label>
                <select class="form-control " name="catid">
                <?php

                $cat = new Category();
                $getALLCat = $cat->getAllCatt();
                if ($getALLCat) {
                  while ($result = $getALLCat->fetch_assoc()) {
                

                ?>
                  <option value="<?php echo $result['catid']; ?>"> <?php echo $result['categoryName']; ?></option>

                <?php } } ?>

                </select>

               

                <label class="text-light">Brand Name</label>
                <select class="form-control " name="brandId">
                   <?php

                $brand = new Brand();
                $getAllBrand = $brand->getAllBrandd();
                if ($getAllBrand) {
                  while ($result = $getAllBrand->fetch_assoc()) {
                

                ?>
                  <option value="<?php echo $result['brandId']; ?>"> <?php echo $result['brandName']; ?></option>

                <?php }} ?>


                </select>

                <label class="text-light">Description</label>
             <textarea class="form-control"style="min-width: 100px" placeholder="Description" name="body"></textarea>

             <label class="text-light">Price</label>
                <input class="form-control" type="text" name="price">


                  <div class="form=group mg-1">
                  <label for="imageSelect">
                  <span class="text-light">Select Image:</span>
                  </label>

                  <div class="custom-file">
                      
                  <input class="custom-file-input" type="File" name="image" id="imageSelect" value="">
                      
                  <label for="imageSelect" class="custom-file-label"></label>

                <label class="text-light">Type</label>
                <select class="form-control " name="type">
                  <option value="0">Featured</option>
                  <option value="1">General </option>
                </select>
                 <br>
             </div>



             <input class="btn btn-light btn-hover" type="submit" name="submit">

             




          </form>
   	 	 	


   	 	 </div>
   	 	</div>
   	 </section>

   	 <footer class="bg-light text-dark">
   	
   <div class="container">

   	<div class="row">
   		<div class="col">
   		<p class="lead text-center">Theme By | Marko Kostic | <span id="year"></span>&copy ----All right reserved  </p>

   		<p class="text-center small" style="color: white; cursor: pointer; text-orientation: none">
   			This site is only for study

   		</p>
   	</div>
   	    </div>
   	



   </div>

   </footer>





</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script type="text/javascript">
	
  $('#year').text(new Date().getFullYear());

</script>
</html>