
<?php

include '../classes/Product.php';
include '../classes/Category.php';

include '../classes/Brand.php';
include '../classes/Cart.php';
include '../classes/Customer.php';

?>

 <?php

 $login = Session::get("cuslogin");
 if ($login == true) {
  header("Location:home.php");
  
 }

 ?>

<?php 
$cmd = new Customer();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
       
       $login = $cmd->loginCustomer($_POST);

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
    
  

 

<?php
$cmd = new Customer();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
          
       $add = $cmd->addNewCustomer($_POST);
}

?> 

 <h3>Register New Account</h3>
 <h4 style="margin-left: 50%;">Existing Customers</h4>
    
    <div class="container">
      <div class="row">

        


               <?php
                
                 if (isset($add)) {
                   echo $add;
                 }


               ?>


                       <form action="" method="post" style="margin-left: 50%;" >

                           <input class="form-control" style="width: 250px" type="text" name="email" placeholder="Email"> <br>
                            <input class="form-control" style="width: 250px" type="text" name="pass" placeholder="Password">
                             
                            <input class="btn btn-primary " type="submit" name="submit" value="Login">
                         

                       </form>
                       
              
                  
                
    

          <form action="" method="post">
            
                
                <tr>
                   
                   <td>
                     
                      <div>
                        <label>Name:</label>
                        <input style="width: 250px" class="form-control" type="text" name="name" placeholder="Enter your name">
<br>
                         <label>City:</label>
                        <input style="width: 250px" class="form-control" type="text" name="city">
<br>
                        <label>Zip Code:</label>
                        <input style="width: 250px" class="form-control" type="text" name="zip" >
<br>
                        <label>Email:</label>
                        <input style="width: 250px" class="form-control" type="text" name="email" >
<br>
                        <label>Address:</label>
                        <input style="width: 250px" class="form-control" type="text" name="address" >
<br>
                        <label>Country:</label>
                        <input style="width: 250px" class="form-control" type="text" name="country" >
<br>
                        <label>Phone:</label>
                        <input style="width: 250px" class="form-control" type="text" name="phone" >
                        <br>
                        <label>Password:</label>
                        <input style="width: 250px" class="form-control" type="text" name="pass" >
                      </div>
                         <br>
                      <input class="btn btn-dark btn-primary" type="submit" name="register" value="Registration">

                           
                   </td>

                 

                </tr>

                 
            

            
          </form>


                 

          
      
           
          
            
       

     </div>

     </div>

    

       <div class="mybutton">


      

   </div>


</header>






</section>

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