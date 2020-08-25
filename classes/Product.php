<?php 

include_once '../lib/Database.php';
include_once '../helpers/Format.php';


?>

<?php


class Product{


 private $fm;
 private $db;

   public function __construct(){

   	 $this->fm = new Format();
   	 $this->db = new Database();
   }

   public function productInsert($data, $file){

      $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
   	  $catid = mysqli_real_escape_string($this->db->link, $data['catid']);
   	  $brandId = mysqli_real_escape_string($this->db->link, $data['brandId']);
   	  $body = mysqli_real_escape_string($this->db->link, $data['body']);
   	  $price = mysqli_real_escape_string($this->db->link, $data['price']);
   	  $type = mysqli_real_escape_string($this->db->link, $data['type']);

   	  	$permited = array('jpg','gif','png','jpeg');
   	  	$file_name = $file['image']['name'];
   	  	$file_size = $file['image']['size'];
   	  	$file_temp = $file['image']['tmp_name'];

   	  	$div = explode('.', $file_name);
   	  	$file_ext = strtolower(end($div));
   	  	 $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;

        $uploded_image = "upload/".$unique_image;

        if (empty($productName) || empty($catid) || empty($brandId) || empty($body) || empty($price) || empty($type)) {
        	 
        	 $msq = "<span style='color:white';> Fields must not be empty </span>";
        	  return $msq;
        } else {
          move_uploaded_file($file_temp, $uploded_image);

            $query = "INSERT INTO dbl_product (productName,catid,brandId,body,price,image,type) VALUES('$productName','$catid','$brandId','$body','$price','$uploded_image', '$type')";

            $result = $this->db->insert($query);
            if ($result) {

            $msg = "<span> Product inserted successfully </span>";

   	       	return $msg;

   	        }else{

            $msg = "<span> Product not inserted successfully </span>";

   	     	return $msg;

   	  }
            }


        }

         public function getAllProduct(){

     	$query = "SELECT dbl_product.*, dbl_category.categoryName, dbl_brand.brandName
            FROM dbl_product
            INNER JOIN dbl_category
            ON dbl_product.catid = dbl_category.catid
            INNER JOIN dbl_brand
            ON dbl_product.brandId = dbl_brand.brandId
            ORDER BY dbl_product.productId DESC";
        $result = $this->db->select($query);
        return $result;
     	
     

     }

     public function delProduct($id){
     	$query = "DELETE FROM dbl_product WHERE productId = '$id' ";
     	$delete = $this->db->delete($query);
     	if ($delete) {
     		return $delete;
     	}
     }

     public function getFeaturedProducts(){

      $query = "SELECT * FROM dbl_product WHERE type = '1' ORDER BY productId DESC LIMIT 5";
      $result = $this->db->select($query);
      return $result;



     }

     public function getSingleProducts($id){
      $query = "SELECT dbl_product.*, dbl_category.categoryName, dbl_brand.brandName
      FROM dbl_product
      INNER JOIN dbl_category
      ON dbl_product.catid = dbl_category.catid
      INNER JOIN dbl_brand
      ON dbl_product.brandId = dbl_brand.brandId
      AND dbl_product.productId = $id
      ORDER BY dbl_product.productId DESC";

      $result = $this->db->select($query);
      return $result;





     }

     public function productByOnlyCat($id){

        $query = "SELECT * FROM dbl_product WHERE catid = '$id' ";
        $result = $this->db->select($query);
        return $result;
     }

     public function getById($id){

        $id = mysqli_real_escape_string($this->db->link, $id);

        $query = "SELECT * FROM dbl_product WHERE catid = '$id' ";
        $result = $this->db->select($query);
        return $result;

     }



   }



?>