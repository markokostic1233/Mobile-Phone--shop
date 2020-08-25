



 <?php

class Cart{

 private $fm;
 private $db;


  public function __construct(){


  	  $this->fm = new Format();
  	  $this->db = new Database();
  }

  public function addToCart($quantity, $id){


  	   $quantity = $this->fm->validation($quantity);

  	   $quantity = mysqli_real_escape_string($this->db->link, $quantity);
  	   $productId = mysqli_real_escape_string($this->db->link, $id);


  	   $sId = session_id();

  	   $squery = "SELECT * FROM dbl_product WHERE productId = '$productId' ";

  	   $result = $this->db->select($squery)->fetch_assoc();

  	   $productName = $result['productName'];
  	   $price = $result['price'];
  	   $image = $result['image'];


  	   $chquery = "SELECT * FROM dbl_product WHERE productId = '$productId' AND sId = '$sId' ";
  	   $result = $this->db->select($chquery);

  	   if ($result) {
  	   	  $msq = "<span class='style:color=white'> Product added in your cart   </span>";
  	   	  return $msq;
  	   }else


  	   $query = "INSERT INTO dbl_cart(sId, productId, productName, price, quantity, image) VALUES('$sId','$productId','$productName','$price','$quantity','$image')";

        	$insert_row = $this->db->insert($query);
        	if ($insert_row) {
        		
        		header("Location:cart.php");
        		
        	}else{

        		
        		header("Location:404.php");

        	}


  }

   public function getAllP(){

        $sId = session_id();
        $query = "SELECT * FROM dbl_cart WHERE sId = '$sId' ";
        $result = $this->db->select($query);
        return $result;

   }

   public function updateCuantity($quantity, $cartId){

   	   $quantity = mysqli_real_escape_string($this->db->link, $quantity);
   	   $cartId = mysqli_real_escape_string($this->db->link, $cartId);

   	   $query = "UPDATE dbl_cart SET quantity = '$quantity' WHERE cartId = '$cartId' ";

   	   $result = $this->db->update($query);
   	   if ($result) {
   	   	$msq = "<span style='color:white' >Quantity updated successfully </span>";
   	   	return $msq;
   	   }else{
        $msq = "<span style='color:white' >Quantity not updated successfully </span>";
   	   	return $msq;

   	   }
   }

   public function deleteCart($id){
       
      $id = mysqli_real_escape_string($this->db->link, $id); 

   	  $query = "DELETE FROM dbl_cart WHERE cartId = '$id'";
   	  $delete = $this->db->delete($query);
   	  return $delete;
   	  if ($delete) {
   	 		echo "<script>window.location = 'cart.php'; </script>";
   	 	
   	 	}else{

   	 		$msg = "<span> Product not be deleted  </span>";
   	 		return $msg;
   	 	}
   }


}








 ?>