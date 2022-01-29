<!doctype html>
  <div class ="bgmodalforget">
		<div class="modal-contentforget">
			
			<div class="closeIcon" ><span class="material-icons" onclick="closeForgetForm();">close</span></div>
			<div class="logo"><img src="../images/webstar.png" alt="" width="150" height="150"></div>
			
			<form name="forgetform" action="../html/userauthentication/sendEmail.php" onSubmit="return forgetformValidation();" method="POST">
			<!--Text Field Container-->
			<div class="containerforget">
                <!--Hearder-->
                <h2 align="center">Forget Password?</h2>
                <!--Email-->
                <div class="rowforget"><span class="material-icons">email</span>
                    <input type="text" class="inputTextforget" placeholder="Please insert your email." name="email" required>
                </div>
                <!--Button-->
                <div class="rowforget" align="center">
                    <input type="submit" class="submitforget" name="forget" value="Reset Password">
                </div>
            </div>
				<!--Hypertext-->
            <div class="hypertextforget">
                <a href="#" class="hypertextforget" onclick="closeForgetForm();openLoginForm();">
                    Back To Login
                </a>
            </div>
			</form>
		</div>
	</div>