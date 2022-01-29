<!doctype html>
  <div class ="bgmodalsignup">
		<div class="modal-contentsignup">
			
			<div class="closeIcon" ><span class="material-icons" onclick="closeSignUpForm()">close</span></div>
			<div class="logo"><img src="../images/webstar.png" alt="" width="150" height="150"></div>
			
			<form name="signupform" action="../html/userauthentication/register.php" onSubmit="return signupformValidation();" method="POST">
            <!--Text Field Container-->
			<div class="containersignup">
                <!--Hearder-->
                <h2 align="center">Sign Up</h2>
                <!--First Name-->
                <div class="rowsignup"><span>First Name:</span>
                <input type="text" class="inputTextsignup" placeholder="First Name" name="firstname" required>
           		</div>
				<!--Last Name-->
                <div class="rowsignup"><span>Last Name:</span>
                <input type="text" class="inputTextsignup" placeholder="Last Name" name="lastname" required>
           		</div>
                <!--Email-->
                <div class="rowsignup"><span>Email:</span>
                    <input type="text" class="inputTextsignup"
						   placeholder="Email" name="email" required>
                </div>
                <!--Password-->
                <div class="rowsignup"><span>Password:</span>
                    <input type="password" class="inputTextsignup" placeholder="Password" name="password" required>
                </div>
				<!--Confirm Password-->
                <div class="rowsignup"><span>Confirm Password:</span>
                    <input type="password" class="inputTextsignup" placeholder="ConfirmPassword" name="cpassword" required>
                </div>
                <!--Button-->
                <div class="rowsignup" align="center">
                    <input type="submit" class="submitsignup" name="signup" value="Sign Up">
                </div>
            </div>
			<!--Hypertext-->
            <div class="hypertextsignup">
				Already our member?
                <a href="#" class="hypertextsignup" onclick="closeSignUpForm();openLoginForm();">
                   Login Now
                </a>
            </div>
			</form>
		</div>
	</div>