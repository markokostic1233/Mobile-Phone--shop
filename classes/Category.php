<?php

include_once '../helpers/Format.php';
include_once '../lib/Database.php';

?>

<?php
class Category{


  private $db;
  private $fm;


  public function __construct(){

  	 $this->db = new Database();
  	 $this->fm = new Format();
  }

  public function insertCategory($categoryName){

  	   $categoryName = $this->fm->validation($categoryName);
  	   $categoryName = mysqli_real_escape_string($this->db->link, $categoryName);

  	   if (empty($categoryName)) {
  	   	 $msg = "<span style='color:white'> Category can not be empty </span>";
  	   	 return $msg;
  	   }elseif(strlen($categoryName)<3){
  	   	 $msg = "<span style='color:white'>Category can not has less than 3 charakters </span>";
  	   	 return $msg;
  	   }

  	   	else{

  	   	  $query = "INSERT INTO category(categoryName) VALUES('$categoryName') ";
  	   	  $insert = $this->db->insert($query);
  	   	  if ($insert) {
  	   	  	$msg =  "<span style='color:white'> Category updated successfully </span>";
  	   	  	return $msg;

  	   	  }else{
  	   	  	$msg = "<span style='color:white'> Something wrong..please try again</span>";
  	   	  	return $msg;
  	   	  }
  	   }
  }

 public function getAllCat(){

 	 $query = "SELECT * FROM dbl_category";
 	 $result = $this->db->select($query);
 	 if ($result) {
 	 	return $result;
 	 }
 }

  public function delete($id){

  	 $query = "DELETE FROM dbl_category WHERE catid='$id' ";
  	 $delete = $this->db->delete($query);
  	 if ($delete) {
   	  	$msg = "<span> Category deleted successfully </span>";
   	  	return $msg;
   	  }else{

        $msg = "<span> Category not deleted successfully </span>";

   	  	return $msg;

   	  }
  }

  public function getCatById($id){

  	  $query = "SELECT * FROM dbl_category WHERE catid='$id '";
  	  $result = $this->db->update($query);
  	  return $result;
  }

  public function updateCat($categoryName, $id){

  	  $categoryName = $this->fm->validation($categoryName);
  	  $categoryName = mysqli_real_escape_string($this->db->link, $categoryName);
  	  $id = mysqli_real_escape_string($this->db->link, $id);

  	  	$query = "UPDATE dbl_category SET categoryName = '$categoryName' WHERE catid = '$id ' "; 
        
        $update = $this->db->update($query);
        return $update;

  }

  public function getAllCatt(){

     $query = "SELECT * FROM dbl_category ORDER BY catid DESC";
     $result = $this->db->select($query);
     return $result;
  }



}



?>