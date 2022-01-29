<!doctype html>
  <div class ="bgmodallogin">
		<div class="modal-contentlogin">
			
			<div class="closeIcon" ><span class="material-icons" onclick="closeLoginForm()">close</span></div>
			<div class="logo"><img src="../images/webstar.png" alt="" width="150" height="150"></div>
			
			<form name="loginform" action="../html/userauthentication/verify.php" onSubmit="return loginformValidation();" method="POST">
			<!--Text Field Container-->
			<div class="containerlogin">
                <!--Hearder-->
                <h2 align="center">Login</h2>
                <!--Position-->
                <div class="rowlogin">
                    <span class="material-icons">perm_identity</span>
                    <span>
                        <select id="position" name="position" class="position">
                            <option value="User">Employee</option>
                            <option value="Admin">Employer</option>
                        </select>
                    </span>
                </div>
                <!--Email-->
                <div class="rowlogin"><span class="material-icons">email</span>
                    <input type="text" class="inputTextlogin" placeholder="Email" name="email" required>
                </div>
                <!--Password-->
                <div class="rowlogin"><span class="material-icons">lock</span>
                    <input type="password" class="inputTextlogin" placeholder="Password" name="password" required>
                </div>
                <!--Button-->
                <div class="rowlogin" align="center">
                    <input type="submit" class="submitlogin" name="login" value="Login">
                </div>
            </div>
				<!--Hypertext-->
            <div class="hypertextlogin">
                <a href="#" class="hypertextlogin" onclick="closeLoginForm();openSignUpForm();">
                    Register New Account
                </a>
            </div>
			<!--Hypertext-->
            <div class="hypertextlogin">
                <a href="#" class="hypertextlogin" onclick="closeLoginForm();openForgetForm();">
                    Forget Password
                </a>
            </div>
			</form>
		</div>
	</div>