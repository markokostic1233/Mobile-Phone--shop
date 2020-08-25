
<?php

include '../classes/Product.php';
include '../classes/Category.php';

include '../classes/Brand.php';
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
  .notfound{}
.notfound h2{font-size: 80px:line-height:130px;text-align: center;}
.notfound h2 span{ display: block;color: red;font-size: 150px; }


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

<header style="width: 90%; margin:auto; padding-right: 5px;padding:5px; background-color: silver;height: 500px"  >
  <div class="conatiner" style="width: 90%; margin: auto;  padding-top: 35px"  >
    

    


    
 <div class="main">
    <div class="content">
      

         <div class="section group">
          
       <div class="notfound">
        
        <h2> <span>404</span> Not Found </h2>


       </div>


         </div>

       


     







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