<?php

include_once '../helpers/Format.php';
include_once '../lib/Database.php';
include_once '../lib/Session.php';

?>

<?php
class Customer{


  private $db;
  private $fm;


  public function __construct(){

  	 $this->db = new Database();
  	 $this->fm = new Format();
  }


   public function addNewCustomer($data){

   	 $name = mysqli_real_escape_string($this->db->link, $data['name']);

   	 $city = mysqli_real_escape_string($this->db->link, $data['city']);

   	 $zip = mysqli_real_escape_string($this->db->link, $data['zip']);

   	 $email = mysqli_real_escape_string($this->db->link, $data['email']);

   	 $address = mysqli_real_escape_string($this->db->link, $data['address']);

   	 $country = mysqli_real_escape_string($this->db->link, $data['country']);

   	 $phone = mysqli_real_escape_string($this->db->link, $data['phone']);

   	 $pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));


   	 if (empty($name) || empty($city) || empty($zip) || empty($email) || empty($address) || empty($country) || empty($phone) || empty($pass)) {
   	 	 
   	 	 $msg = "<span style='color:white'> Fields can not be empty </span>";
  	   	 return $msg;

   	 } 

   	   $mquery = "SELECT * FROM dbl_customer WHERE email='$email' LIMIT 1 ";
   	   $mailchk = $this->db->select($mquery);
   	   if ($mailchk != false) {
   	   	 $msg = "<span style='color:white'> Email alredy exists </span>";
  	   	 return $msg;
   	   }else{


   	   	  $query = "INSERT INTO dbl_customer(name, city, zip, email, address, country, phone, pass) VALUES('$name','$city','$zip','$email','$address','$country','$phone','$pass') ";

   	   	  $insert_row = $this->db->insert($query);
   	   	  if ($insert_row) {
   	   	  	$msg = "<span style='color:white'> Customer added successfuly </span>";
  	   	    return $msg;
   	   	  }else{
   	   	  	$msg = "<span style='color:white'> Customer not added successfuly </span>";
  	   	    return $msg;
   	   	  }
   	   }




   }

   public function loginCustomer($data){

        	 $email = mysqli_real_escape_string($this->db->link, $data['email']);
        	 $pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));


        	 if (empty($email) || empty($pass)) {
        	 	$msg = "<span style='color:white'> Fields can not be empty </span>";
  	   	         return $msg;
        	 }else{


        	 	$query = "SELECT * FROM dbl_customer WHERE email='$email' AND pass='$pass' ";
        	 	$result = $this->db->select($query);
        	 	if ($result != false) {

        	 			$value = $result->fetch_assoc();
	 		            Session::set("cuslogin", true);
	 		            Session::set("cmrId", $value['id']);
	 		            Session::set("cmrName", $value['name']);

	 	                header("Location:home.php");

                 }else{

                  $msg = "<span style='color:white'> Email or password not Matched </span>";
                  return $msg;

        }
        	 		
        	 	}
        	 }

   }


