
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');

include_once ($filepath.'/../classes/Category.php');
?>

<?php

if (!isset($_GET['cat']) || $_GET['cat'] == NULL) {
   echo "<script> window.location = 'catlist.php';  </script>";
}else{

   $id = $_GET['cat'];
}

?>

<?php

$cat = new Category();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $categoryName = $_POST['categoryName'];

    $update = $cat->updateCat($categoryName, $id);
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
   	 	 	
   	 	 		
   	 	 		<h3 class="text-light col-md-6">Edit Category</h3>
          <br>
          <?php
            
            $cat = new Category();
            $getCat = $cat->getCatById($id);
            if ($getCat) {
              while ($result = $getCat->fetch_assoc()) {
                
            


          ?>
          <form action=" " method="post">
            
             <div class="form-group col-md-6">
                <label class="text-light">Category</label>
                <input class="form-control" value="<?php echo $result['categoryName']; ?>" type="text" name="categoryName" placeholder="Enter category name..">
                <br>
                <input class="btn btn-light btn-hover" type="submit" name="submit">
             </div>


          </form>
   	 	 	
 <?php }} ?>

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