
<?php

include '../classes/Product.php';
include '../classes/Category.php';
include '../lib/Session.php';

include '../classes/Brand.php';
include '../classes/Cart.php';
?>

<?php

if (isset($_GET['proid'])) {
  
    $id = $_GET['proid'];


}

?>

<?php 
$ct = new Cart();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
   $quantity = $_POST['quantity'];
   $cartId = $_POST['cartId'];

    $updateCart = $ct->updateCuantity($quantity, $cartId);


}

?>

<?php

if (isset($_GET['delpro'])) {
    $id = $_GET['delpro'];

    $dele = $ct->deleteCart($id);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Header</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

  <style type="text/css">
  .slika{
    width: 90%;
    height: 160px;
    border: 1px solid
    padding:10px;

  }

  </style>
 
   

<nav class="navbar navbar-inverse" style="width: 90%; margin:auto; margin-top: 10px;padding-right: 5px;padding:5px">
  
    <div class="navbar-header">
      <a class="navbar-brand" href="#">MarkoKostic.com</a>
    </div>
    <ul class="nav navbar-nav">
      
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        
      </li>
      <li><a href="cart.php">Cart</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

<header style="width: 90%; margin:auto; padding-right: 5px;padding:5px; background-color: silver;height: 900px"   >

  <div class="conatiner" style="width: 90%; margin: auto;  padding-top: 35px"  >
    
   <h2>My Cart</h2>

   <?php

       if (isset($updateCart)) {
         echo $updateCart;
       }


   ?>

   <?php 
      
      if (isset($dele)) {
        echo $dele;
      }


   ?>
    

       <table class="table text-light table-hover">
           
           <thead>
               <tr>
                  <th>#</th>
                  <th>Product Name</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total Price</th>
                  <th>Action</th>

               </tr>            
 


           </thead>

           <tbody>
             <?php
             $ct = new Cart(); 
             $i = 0;
            
             $getProdu = $ct->getAllP();
             if($getProdu){
              $i++;

              while ($result = $getProdu->fetch_assoc()) {
                
           

             ?>

             
               <tr>
                 
                 <td> <?php echo $i; ?> </td>
                 <td>   <?php echo $result['productName']; ?> </td>
                 <td>  <img src="<?php echo $result['image']; ?>" width="50px" height="50px"> </td>
                 <td> $ <?php echo $result['price']; ?> </td>
                 <td>  
                  
                   <form action="" method="post">
                      
                      <input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>">
                      <input type="number" name="quantity" value="<?php echo $result['quantity']; ?>">
                      <input type="submit" name="submit" value="Update">




                   </form>

                   <td>
                    $
                     <?php
                    
                     $total = $result['price'] * $result['quantity'];

                     echo $total;

                     ?>

                   </td>

                   <td>
                     <a onclick="return confirm('Are you sure'); "class="btn btn-danger" href="?delpro=<?php echo $result['cartId']; ?>">Delete</a>

                   </td>



               </tr>

              

              



           </tbody>        

         <?php }} ?>

           <?php

                      $sum = $sum + $total;
                      Session::set("sum",$sum);


                      ?>
 




       </table>

       <table class="table text-dark table-hover" style="width: 200px; float: right;">
           <tr>

           <th> Sub Total: </th>
           <td> $ <?php echo $sum; ?></td>

           </tr>

           <tr>

           <th> VAT: </th>
           <td> 20 %</td>

           </tr>

           <tr>

           <th> Grand Total </th>
           <td> <?php

                $vat = $sum * 0.2;
                $gtotal = $sum + $vat;

                 echo $gtotal; ?></td>

           </tr>

           

          
       </table>

 
  

       

       


     







</header>

<footer style="width: 90%; margin:auto; padding-right: 5px;padding:5px; background-color: black;height: 50px"  >
  



<div class="container">

    <div class="row">
      <div class="col">
      <p class="lead text-center">Theme By | Marko Kostic | <span id="year"></span>&copy ----All right reserved  </p>

      <p class="text-center small" style="color: white; cursor: pointer; text-orientation: none">
        This site is only for study

      </p>
    </div>
        </div>



</footer>
  


</body>

<script type="text/javascript">
  
  $('#year').text(new Date().getFullYear());

</script>
</html>



</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script type="text/javascript">
	
  $('#year').text(new Date().getFullYear());

</script>
</html>