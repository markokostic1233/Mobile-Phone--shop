<?php include_once '../lib/Database.php' ?>
<?php include_once '../helpers/Format.php' ?>


<?php

class Brand{

   private $fm;
   private $db;


   public function __construct(){

   	$this->fm = new Format();
   	$this->db = new Database();

   }

   public function insertBrand($brandName){

   	  $brandName = $this->fm->validation($brandName);
   	  $brandName = mysqli_real_escape_string($this->db->link, $brandName);

   	  $query = "INSERT INTO dbl_brand(brandName) VALUES('$brandName') ";

   	  $insert = $this->db->insert($query);
   	  return $insert;
   }

   public function getAllBrand(){

   	 $query = "SELECT * FROM dbl_brand";
   	 $result = $this->db->select($query);
   	 return $result;
   }

   public function deleteBrand($id){

   	  $query = "DELETE FROM dbl_brand WHERE brandId = '$id' ";
   	  $delete = $this->db->delete($query);
   	  return $delete;
   }

   public function getBrandBy($id){

   	  $query = "SELECT * FROM dbl_brand WHERE brandId = 'id' ";
   	  $result = $this->db->update($query);
   	  return $result;
   }

   public function updateBrand($brandName, $id){

   	 $brandName = $this->fm->validation($brandName);
     
     $brandName = mysqli_real_escape_string($this->db->link, $brandName);
     $id = mysqli_real_escape_string($this->db->link, $id);

     $query = "UPDATE dbl_brand SET brandName VALUES('$brandName') ";

     $result = $this->db->update($query);

     if ($result) {
     	
     	$msg = "<span style='color:white;'> Brand updated succcessfully </span>";
     	return $msg;
     }else{

     	$msg = "<span style='color:white;'> Brand not updated succcessfully </span>";
     	return $msg;
     }

   }

   public function getAllBrandd(){

       $query = "SELECT * FROM dbl_brand ORDER BY brandId DESC";
       $result = $this->db->select($query);
       return $result;
   }

}



?>