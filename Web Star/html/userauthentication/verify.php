<?php
  session_start();
  error_reporting(0);
  include("dbconnect.php");
  
  if (isset($_POST['login'])) {
      $email = $_POST["email"];
      $_SESSION["email"] = "$email";
      $password = $_POST["password"];
      $pass_sha1 = sha1($password);
      $_SESSION["password"] = "$pass_sha1";
      $position = $_POST["position"];
      $_SESSION["position"] = "$position";
      if($position == "Admin" && $email=="webstar@gmail.com" && $pass_sha1=="7af2d10b73ab7cd8f603937f7697cb5fe432c7ff"){
          echo "<script type='text/javascript'>alert('Welcome to Web Star Employer!');history.go(-1)</script>";
      }
      else if($position == "Admin"){
        $query = "SELECT * FROM `tbl_employer` WHERE `email` = '".strtolower($email)."' AND `password` = '$pass_sha1' ";
	   $result = $conn->query($query);
	    if ($result->num_rows > 0) {
	        echo "<script type='text/javascript'>alert('Success!');history.go(-1)</script>";
	    }else{
	         echo "<script type='text/javascript'>alert('Failed! Please enter correct email or password!');history.go(-1)</script>";
	    }  
      }
      else{
      $query = "SELECT * FROM `tbl_user` WHERE `email` = '".strtolower($email)."' AND `password` = '$pass_sha1' ";
	   $result = $conn->query($query);
	    if ($result->num_rows > 0) {
	        echo "<script type='text/javascript'>alert('Success!');history.go(-1)</script>";
	    }else{
	         echo "<script type='text/javascript'>alert('Failed! Please enter correct email or password!');history.go(-1)</script>";
	    }}
  } 
?>

