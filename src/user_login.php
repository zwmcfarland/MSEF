<?php
    /*
     * Name: User login
     * Description:
     *     This page is used to login to the MSEF system.
     * Arguments:
     *    None
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

	//Include necessary files
    include("function/headerfooter.php");
    
    /*--- Params ---*/
    global $login;
    if ($login->isUserLoggedIn() == true) {
            header( 'Location: ..\src\index.php') ; 
    }
    /*--- END: Params ---*/

    //Create default header
    incHeader('MSEF | Login');

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
                    <div class="form-group">
                        <label for="login_input_username">Username</label>
                        <input id="login_input_username" class="login_input form-control" type="text" name="user_name" required />
                    </div>
                    <div class="form-group">
                        <label for="login_input_password">Password</label>
                        <input id="login_input_password" class="login_input form-control" type="password" name="user_password" autocomplete="off" required />
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Log in</button>
                </form>
            </div>
       </div>
   </div>
</div>
<?php
	//Create default footer
    incFooter();
?>