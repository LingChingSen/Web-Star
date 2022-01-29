

<!DOCTYPE html>
<html><head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/56e1a6fc52.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!--Import Other Class-->
    <script src="//code.jquery.com/jquery.min.js"></script>
    <!------------------------Call Nav------------------------>
    <link rel="stylesheet" href="../css/adminnavi.css">
    <link rel="stylesheet" href="../css/usernavi.css">
    <script src="../js/adminnavi.js"></script>
    <script src="../js/usernavi.js"></script>
    <!------------------------Call Nav------------------------>
	<link rel="stylesheet" href="../css/header.css"> 
<!-- 	<link rel="stylesheet" href="../css/homepage.css"> -->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

	
	<title>Dashboard</title>
	
	
		<script language="javascript">
	    // JavaScript Document
          $(document).ready(function() {
            $('#example').DataTable( {
                "pagingType": "full_numbers"
            } );
          } );
	    </script>
	
	
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
    
    .column {
  float: left;
  width: 30%;
  padding: 10px;
  text-align: center;
 
    }

    .row:after {
    content:" ";
   display: table;
    }
h1 {color: white;}
    
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
<body onload="startTime()">

<div class="header"style="position:relative"><img src="../images/webstar.png" alt="WebStar Logo">
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
                else if($position == "Admin" && $email=="webstar@gmail.com" && $password=="7af2d10b73ab7cd8f603937f7697cb5fe432c7ff"){
                    
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
        <a href="dashboard.php">Dashboard</a>
        <a href="action.php">Punch In/Out</a>
        <a href="actionReport.php">Whereabouts' Report</a>
        <a href="myprofile.php">Profile</a> 
   
        
   
    </div>
</div>
  
<p class="mb-100 mt-10"><br>
    <h2 style="text-align:center;" class="display-4">Welcome to the Web Star System.</h2><br>
    <h3 style="text-align:center;" class="display-4">Web Star System is actually an employee work monitoring management system  </h3>
    <h3 style="text-align:center;" class="display-4">This system could help employer and also employee to monitoring and manage their works.</h3>

    <p align=center>
    
	
	</div>
                <?php
                }
                else if($position == "Admin" && $email=="webstar@gmail.com" && $password=="7af2d10b73ab7cd8f603937f7697cb5fe432c7ff"){
                ?>
               	</div>
 <div class="topnav mb-3 mt-4">
        <a href="dashboard.php" >Dashboard</a>
         <a href="whereabout.php">All Whereabouts' Report</a>
         <a href="employee.php">Employee Details</a>
        
        
        
   
    </div>
</div>
  
<p class="mb-100 mt-10"><br>
    <h2 style="text-align:center;" class="display-4">Welcome to the Web Star System.</h2><br>
    <h3 style="text-align:center;" class="display-4">Web Star System is actually an employee work monitoring management system  </h3>
    <h3 style="text-align:center;" class="display-4">This system could help employer and also employee to monitoring and manage their works.</h3>

    <p align=center>
    
	
	</div>
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
</div>
  
<p class="mb-100 mt-10"><br>
    <h2 style="text-align:center;" class="display-4">Welcome to the Web Star System.</h2><br>
    <h3 style="text-align:center;" class="display-4">Web Star System is actually an employee work monitoring management system  </h3>
    <h3 style="text-align:center;" class="display-4">This system could help employer and also employee to monitoring and manage their works.</h3>

    <p align=center>
    
	
	</div>
            <?php  
                }
                ?>
		  
            <?php
            }else{
            ?>
             	</div>
		<div class="topnav mb-3 mt-4">
          <a href="dashboard.php" >Dashboard</a>
        <a href="" onclick="checkLogin();"  class="navbar__link" >Punch In/Out</a>
        <a href=""onclick="checkLogin();"  class="navbar__link">Whereabouts' Report</a>
        <a href="" onclick="checkLogin();"  class="navbar__link" >Profile</a>  
        
        
        
        
   
    </div>
</div>
  
<p class="mb-100 mt-10"><br>
    <h2 style="text-align:center;" class="display-4">Welcome to the Web Star System.</h2><br>
    <h3 style="text-align:center;" class="display-4">Web Star System is actually an employee work monitoring management system  </h3>
    <h3 style="text-align:center;" class="display-4">This system could help employer and also employee to monitoring and manage their works.</h3>

    <p align=center>
    
	
	</div>
            <?php
            }
		?>

		</div >
<p class="mb-100 mt-10"><br>
    <h1 style="text-align:center;" class="display-4">Features</h1><br>
    <p align=center>
        
     <div class="row"  >
  <div class="column" >
      
    <img src="../images/logo.jpg" height = 150 width = 150 >
    <p  align=center >  GPS Location </p>
  </div>  
  
  
  <div class="column">
      <img src="../images/2489_U1RVRElPIERBTiAwMDMtNjI.jpg" height = 150 width = 150 >  
    <p align=center>Whereabouts' Report </p>
  </div>  
  
  <div class="column" >
      <img src="../images/punchin.jpg" height = 150 width = 150 >  
    <p align=center>Punch In/Out</p>
  </div>  
  
  	</div>

	
    <!------------------------Call Aunthentication------------------------>
	<div id="bgmodalLogin"></div>
	<div id="bgmodalSignUp"></div>
	<div id="bgmodalForget"></div>
	<!------------------------Call Aunthentication------------------------>


</body>
</html>
