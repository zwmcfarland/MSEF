<?php
    include("function/headerfooter.php");
	
	// load the registration class
	include("./php-login-minimal-master/classes/Registration.php");
	
	// create the registration object. when this object is created, it will do all registration stuff automatically
	// so this single line handles the entire registration process.
	$registration = new Registration();
    incHeader('MSEF | Home');
    
    /* --- Queries --- */
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */
?>
<div class="col-lg-12">
    <div class="col-md-2 col-md-offset-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Register</h3>
            </div>
            <div class="panel-body">
			<?php
			if (isset($registration)) {
			    if ($registration->errors) {
			        foreach ($registration->errors as $error) {
			            echo $error;
			        }
			    }
			    if ($registration->messages) {
			        foreach ($registration->messages as $message) {
			            echo $message;
			        }
			    }
			}
			?>
			
			<!-- register form -->
			<form method="post" action="user_register.php" name="registerform">
			
			    <!-- the user name input field uses a HTML5 pattern check -->
			    <label for="login_input_username">Username:</label>
			    <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required /><br>
			
			    <!-- the email input field uses a HTML5 email type check -->
			    <label for="login_input_email">Email:</label>
			    <input id="login_input_email" class="login_input" type="email" name="user_email" required /><br>
			
			    <label for="login_input_password_new">Password:</label>
			    <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" /><br>
			
			    <label for="login_input_password_repeat">Repeat Password:</label>
			    <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" /><br>
			    <br>
			    <input type="submit"  name="register" value="Register" />
			
			</form>
           </div>
       </div>
   </div>
</div>
<?php
    incFooter();
?>