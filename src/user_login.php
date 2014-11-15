<?php
    include("function/headerfooter.php");
	global $login;
    if ($login->isUserLoggedIn() == true) {
    		header( 'Location: ..\src\index.php') ; 
	}
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
                <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">
            	<?php
				// show potential errors / feedback (from login object)
				if (isset($login)) {
				    if ($login->errors) {
				        foreach ($login->errors as $error) {
				            echo $error;
				        }
				    }
				    if ($login->messages) {
				        foreach ($login->messages as $message) {
				            echo $message;
				        }
				    }
				}
				?>
				
				<!-- login form box -->
				<form method="post" action="user_login.php" name="loginform">
				
				    <label for="login_input_username">Username</label><br>
				    <input id="login_input_username" class="login_input" type="text" name="user_name" required />
				
				    <label for="login_input_password">Password</label><br>
				    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />
					<br><br>
				    <input type="submit"  name="login" value="Log in" />
				
				</form>
           </div>
       </div>
   </div>
</div>
<?php
    incFooter();
?>