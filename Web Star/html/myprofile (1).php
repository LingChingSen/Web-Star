<?php
session_start();
error_reporting(0);
include("dbconnect.php");
$email = $_SESSION['email'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$phone_number = $_POST['phonenumber'];
$ic_number = $_POST['ic_number'];
$password=sha1($_POST['pass']);
if (isset($_POST['update_user'])){
    $sqlupdateuser="UPDATE tbl_user SET fname='$fname',lname='$lname',phone_number='$phone_number',ic_number='$ic_number' WHERE email='$email'";
    if(mysqli_query($conn, $sqlupdateuser)){
        
        echo "<script type='text/javascript'>alert('Success!');window.location.assign('myprofile.php');</script>'";
        
    }else{
        
        echo "<script type='text/javascript'>alert('Opps... profile update failed...');window.location.assign('myprofile.php');</script>'";
        
    }
}else if(isset($_POST['edit_profile_img'])){
    $email = $_POST["email"];
    $file = $_FILES["image"]["tmp_name"];
    if(!isset($file)){
            echo "<script type='text/javascript'>alert('Please upload an image');window.location.assign('myprofile.php');</script>'";
    }else{
        $image= addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
        $image_size = getimagesize($_FILES['image']['tmp_name']);
        
        $query = "UPDATE `tbl_user` SET pic = '$image' WHERE email = '$email' ";
            if(mysqli_query($conn, $query))
            {
                echo "<script type='text/javascript'>alert('Success!');window.location.assign('myprofile.php');</script>'";
            }else{
                echo "<script type='text/javascript'>alert('Failed!!');window.location.assign('myprofile.php');</script>'";
            }
    }
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Myprofile</title>
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/form.css">
	 <link rel="stylesheet" href="../css/homepage.css">
	<!--Import Icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!--Import Other Class-->
    <script src="//code.jquery.com/jquery.min.js"></script>

    <!------------------------Call Nav------------------------>
    <link rel="stylesheet" href="../css/adminnavi.css">
    <link rel="stylesheet" href="../css/usernavi.css">
    <script src="../js/adminnavi.js"></script>
    <script src="../js/usernavi.js"></script>
    <!------------------------Call Nav------------------------>
    
    <!------------------------Call Aunthentication------------------------>
    <script src="../js/userauthentication/login.js"></script>
    <script src="../js/userauthentication/signUp.js"></script>
    <script src="../js/userauthentication/forget.js"></script>
    <script src="../js/userauthentication/logout.js"></script>
    <link rel="stylesheet" href="../css/userauthentication/login.css">
    <link rel="stylesheet" href="../css/userauthentication/signUp.css">
    <link rel="stylesheet" href="../css/userauthentication/forget.css">
    <!------------------------Call Aunthentication------------------------>
    <style>
    .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
    }
    
          .header {
padding: 10px 0px 10px 0px;
width:auto%;
background: black;
color: white;
font-size: 15px;
}
      .header img{
margin-left:20px;
float: left;
width: 70px;
height: 70px;
}
  
    .topnav {
      overflow: hidden;
      background-color: black;
    }
    .topnav a {
      float: left;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }
    .topnav a:hover {
      background-color: #2296F3;
      color: black;
    }
h1 {color: white;}

.savebtn {
  width: 300px;
  background-color: green;
  color: black;
  border: grey;
  font-size:16px;
  cursor: pointer;
  border-radius: 40px;

}

.cancelbtn {
  width: 300px;
  background-color: red;
  color: black;
  border: grey;
  font-size:16px;
  cursor: pointer;
  border-radius: 40px;
  
  
}


.bigbox{
	padding-top: 30px; 
	padding-bottom: 20px; 
	float: left;
	width:100%;
	display: flex; 
	justify-content: center;

}

.logoutbtn {
background-color: #2296F3;
color: white;
padding: 8px 15px;
margin-right: 50px;
font-size: 16px;
cursor: pointer;
border: grey;
box-shadow: 2px 4px grey;
float:right;
}

body{
background-color: white;
margin: 0;
padding: 0;
width:100%;
max-width:1920px;
min-width:480px;
margin-left:auto;
margin-right:auto;
height:auto; 
overflow-y: auto;
overflow-x: hidden;
}

 

    
    </style>
</head>

<body>
	<div class="header" style="position:relative"><img src="../images/webstar.png" alt="Webstar Logo">
		<h1>&nbsp Web Star System
		<!------------------------Call Aunthentication------------------------>
		<?php
		    session_start();
            error_reporting(0);
            include("dbconnect.php");
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];
            $position = $_SESSION['position'];
            if (isset($_SESSION["email"])){
             $sqlloaduser = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password' ";
                $result = $conn->query($sqlloaduser);
                if ($result->num_rows > 0 && $position == "User") {
                    while ($row = $result -> fetch_assoc()){
                        extract ($row);
                    if(isset($pic)){
                        ?>
                        <img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($pic); ?>" style= "height: 30px;width: 30px; border-radius:50%;position:absolute;right:20%;top:40%"> 
                <?php
                    }else{
                        ?>
                        <img style= "height: 30px;width: 30px; border-radius:50%;position:absolute;right:20%;top:40%" src="../images/user.png" alt="profileimg">
                    <?php
                    }
                
                    }
	            ?>    
                <span style="position:absolute; right:15%;top:50%;font-size:12px"><?php echo $lname?></span>
                <button type="submit" class="logoutbtn" onclick="logOut()"><b>Log Out</b></button>
                <?php
                }
                else if($position == "Admin" && $email=="asiatopu@gmail.com" && $password=="7af2d10b73ab7cd8f603937f7697cb5fe432c7ff"){
                ?>
                <button type="submit" class="logoutbtn" onclick="logOut()"><b>Log Out</b></button>
                <?php    
                }
                else{
                  ?>
                <button type="submit" class="signupbtn" onclick="openSignUpForm()"><b>Sign Up</b></button>
		        <button type="submit" class="loginbtn" onclick="openLoginForm()"><b>Login</b></button>
            <?php  
                }
                ?>
		  
            <?php
            }else{
            ?>
             <button type="submit" class="signupbtn" onclick="openSignUpForm()"><b>Sign Up</b></button>
		<button type="submit" class="loginbtn" onclick="openLoginForm()"><b>Login</b></button>
            <?php
            }
		?>
		<!------------------------Call Aunthentication------------------------>
	
    	<!------------------------Check Position------------------------>
		<?php
		    session_start();
            error_reporting(0);
            include("dbconnect.php");
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];
            $position = $_SESSION['position'];
            if (isset($_SESSION["email"])){
             $sqlloaduser = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password' ";
                $result = $conn->query($sqlloaduser);
                if ($result->num_rows > 0 && $position == "User") {
                ?>
               </div>
 <div class="topnav mb-3 mt-4">
        <a href="dashboard.php" >Dashboard</a>
        <a href="action.php">Punch In/Out</a>
        <a href="actionReport.php">Whereabouts' Report</a>
        <a href="myprofile.php"  class="navbar__link" >Profile</a> 
       
        
   
    </div>

                <?php
                }
                else if($position == "Admin" && $email=="asiatopu@gmail.com" && $password=="7af2d10b73ab7cd8f603937f7697cb5fe432c7ff"){
                ?>
                 <div class="topnav mb-3 mt-4">
      <a href="dashboard.php" >Dashboard</a>
        <a href="action.php">Punch In/Out</a>
        <a href="actionReport.php">Whereabouts' Report</a>
        <a href="myprofile.php"  class="navbar__link" >Profile</a> 
     
                <?php    
                }
                else{
                  ?>
                 	</div>
		<div class="topnav mb-3 mt-4">
       <a href="dashboard.php" >Dashboard</a>
        <a href="" onclick="checkLogin();"  class="navbar__link" >Punch In/Out</a>
        <a href=""onclick="checkLogin();"  class="navbar__link">Whereabouts' Report</a>
        <a href="" onclick="checkLogin();"  class="navbar__link" >Profile</a> 
    
        
   
    </div>

            <?php  
                }
                ?>
		  
            <?php
            }else{
            ?>
             	</div>
		<div class="topnav mb-3 mt-4">
		    <a href="dashboard.php">Dashboard</a>
       <a href="" onclick="checkLogin();"  class="navbar__link" >Punch In/Out</a>
        <a href=""onclick="checkLogin();"  class="navbar__link">Whereabouts' Report</a>
        <a href="" onclick="checkLogin();"  class="navbar__link" >Profile</a> 
        
        
   
    </div>

            <?php
            }
		?>
	<!------------------------Call Position------------------------>

    
	<div style="height: 350px; width:80%;background-color: white;max-width:1920px; min-width:480px; margin-center:auto; margin-right:auto; margin:auto; padding:auto; overflow:hidden;float:center">
		<div style="margin-left: 10px;margin-top: 10px; background-color: white; height: 50px; width:250px;float:left"><i class="material-icons" style="float: left;margin-top: 5px;margin-left: 5px; font-size: 40px">&#xe7fd;</i><span class="discover" style="margin-left: 10px;margin-top: 13px">Employee Profile</span></div>
		<br><br>
		<?php
	    session_start();
        error_reporting(0);
        include("dbconnect.php");
        $email = $_SESSION['email'];
        
	    $sqlloaduser = "SELECT * FROM tbl_user WHERE email='$email'";
	    
	     $result = $conn->query($sqlloaduser);
	    if ($result->num_rows > 0){
	        while ($row = $result -> fetch_assoc()){
	        extract ($row);
	        if(isset($pic)){
	    ?>
		    <img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($pic); ?>" style= "height: 150px;width: 150px;display: block;margin-top: 40px; margin-left: auto;margin-right: auto; border-radius:50%">
		<?php
		    }else{
		        ?>
		        <img style= "height: 150px;width: 150px;display: block;margin-top: 40px; margin-left: auto;margin-right: auto; border-radius:50%" src="../images/user.png" alt="profileimg">
		        <?php
		    }
	    ?>
		<div style="text-align: center; margin-top: 10px"><span class="discover" style="color:black; float: none; margin-left: 0px"><?php echo $fname ?> <?php echo $lname ?></span></div>
		<div style="height:50px; width:300px; background-color:grey; margin-left:auto;margin-right:auto; position:relative">
		<form method="post" enctype="multipart/form-data">
		    <input type="hidden" value="<?php echo $email ?>" name="email">
		    <input style="position:absolute;left:20%; color:white" type="file" name="image" accept="image/*" required>
		    <input style="position:absolute; top:50%;left:40%;background-color:#85C1E9; border:none; cursor:pointer" type="submit" name="edit_profile_img" value="Save Image">
		</form>    
		    
		</div>
		<?php
	        }}?>
	</div>
	<form method="post">
	    <?php
	    session_start();
        error_reporting(0);
        include("dbconnect.php");
        $email = $_SESSION['email'];
        
	    $sqlloaduser = "SELECT * FROM tbl_user WHERE email='$email'";
	    
	     $result = $conn->query($sqlloaduser);
	    if ($result->num_rows > 0){
	        while ($row = $result -> fetch_assoc()){
	        extract ($row);
	            ?>
	    <div class="bigbox">
		<div style="width: 500px; float: left">
			<span class="label" style="float: left">First Name:</span> 
			<input type="text" style="height:20px; width: 300px; float: right" name="firstname" value="<?php echo $fname ?>" required>
		</div>
		<div style="width: 560px; float:left">
			<span class="label" style="float: left; padding-left: 20px">Last Name:</span> <input type="text" style="height:20px; width: 300px; float: right " name="lastname" value="<?php echo $lname ?>" required>
		</div>	
	</div>
	<div class="bigbox">
		<div style="width: 500px; float: left">
			<span class="label" style="float: left">Phone Number:</span> <input type="text" style="height:20px; width: 300px; float: right" name="phonenumber" value="<?php echo $phone_number ?>">
			<div style="padding-top: 30px"><span class="label" style="float: left">
			</div>
			
		</div>
		<div style="width: 560px; float:left">
			<span class="label" style="float: left; padding-left: 20px">IC Number:</span> <input type="text" style="height:20px; width: 300px; float: right" name="ic_number" value="<?php echo $ic_number ?>">
			
		</div>	
		
	</div>
	
		<div class="bigbox">
		<div style="width: 500px; float: left">
			<span class="label" style="float: left">Email:</span> <input type="text" style="height:20px; width: 300px; float: right" name="email" value="<?php echo $email ?>"  readonly>
			<div style="padding-top: 80px"><span class="label" style="float: left">
			</div>
			
		</div>
		<div style="width: 560px; float:left">
			<span class="label" style="float: left; padding-left: 20px">Employee ID:</span> <input type="text" style="height:20px; width: 300px; float: right" name="user_id" value="<?php echo $user_id ?>"readonly>
			
		</div>	
		
	</div>
	
<div class="bigbox">
		<button type="submit" class="cancelbtn"style="margin-left: 100px"><b>Cancel</b></button>
		<button type="submit" class="savebtn" name="update_user" style="margin-left: 100px"><b>Save</b></button>
		
	</div>
	 <?php
	        }
	    }
	        
	        
	    
	    ?>
	</form>
	
	<!------------------------Call Aunthentication------------------------>
	<div id="bgmodalLogin"></div>
	<div id="bgmodalSignUp"></div>
	<div id="bgmodalForget"></div>
	<!------------------------Call Aunthentication------------------------>
	
	
</body>
</html>
