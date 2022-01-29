<?php
  session_start();
  error_reporting(0);
  include("dbconnect.php");
  
  if (isset($_POST['signup'])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $pass_sha1 = sha1($password);
 
    $query = "INSERT INTO `tbl_user`(`fname`,`lname`,`email`,`password`) VALUES('".strtoupper($firstname)."','".strtoupper($lastname)."','".strtolower($email)."','$pass_sha1')";
    if(mysqli_query($conn, $query))
    {
    echo "<script type='text/javascript'>alert('Successfully Registered');history.go(-1)</script>";
    }else{
    echo "<script type='text/javascript'>alert('Email Already Exists!');history.go(-1)</script>";
    }
  } 
  
  
?>