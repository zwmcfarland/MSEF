<?php
    // include the configs / constants for the database connection
include("./php-login-minimal-master/config/db.php");

// load the login class
include("./php-login-minimal-master/classes/Login.php");

$login = new Login();
date_default_timezone_set('UTC');
	//Creates the menu bar, default header
    function incHeader($title = "", $JS_String = "", $JS_Include = "", $CSS_Include = "", $CSS_String = "", $MenuFlag = "true") {
        include_once("project.php");
        ?>
            <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
                <html> 
                    <head>
                        <meta charset="utf-8">
                        <title> <?php echo $title; ?></title>
                        <meta content="width=device-width, initial-scale=1.0" name="viewport">
                        <link href="css/font-awesome.css" rel="stylesheet">
                        <link rel="stylesheet" type="text/css" href="css/fullcalendar.css">
                        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
                        <link rel="stylesheet" type="text/css" href="css/select2-bootstrap.css">
                        <link rel="stylesheet" type="text/css" href="css/select2.css">
                        <link  href="img/uno.ico" rel="shortcut icon">
                        <script src="js/jQuery.js"></script>
                        <script src="js/bootstrap.js"></script>
                        <script src="js/select2.js"></script>

                        <!-- END: CSS Includes -->
                        
                        <!-- Security -->
                        <!-- TODO: Need to add security view filters -->

                        <style>
                            <?php
                                global $login;
                                if ($login->isUserLoggedIn() == true): ?>
                                    .unauthinticated{
                                        display: none !important;
                                    }
                                <?php else:?>
                                    .authinticated{
                                        display: none !important;
                                    }
                                <?php endif; ?>
                                <?php if(isset($_SESSION['security_type']) && $_SESSION['security_type'] == 'student'): ?>
                                    .sponsor,.staff {
                                        display: none !important;
                                    }
                                <?php elseif($_SESSION['security_type'] == 'sponsor'):?>
                                    .staff, .studentonly {
                                        display: none !important;
                                    }
                                <?php else:?>
                                    .sponsoronly, .studentonly {
                                        display: none !important;
                                    }
                                <?php endif;?>
                            ?>
                        </style>
                        <!-- END: Security -->
                        
                        <?php 
                            foreach(explode(',',$CSS_Include) as $path) {
                                echo '<link rel="stylesheet" type="text/css" href="' . $path . '">'; 
                            }

                            echo '<style type="text/css">' . $CSS_String . '</style>';
                        ?>
                        <!-- END: CSS Includes -->
                    </head>

                    <!-- JS Includes -->
                    <?php
                    foreach(explode(',',$JS_Include) as $path) {
                        echo '<script src="js/' . $path . '"></script>'; 
                    }

                    echo '<script type="text/javascript">' . $JS_String . '</script>';
                    ?>
                    <!-- END: JS Includes -->

                    <?php echo '<body class="'. $title .'">'; ?>
                        <nav class="navbar navbar-default" role="navigation">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="#"><img src="img/science.png" height="30" width="30" style="display:inline-block;"/>MSEF</a>
                                </div>
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                                        <li class="dropdown authinticated">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Links<span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <!--  Student Links -->
                                                    <li><a href="user_profile_detail.php">My Profile</a></li>
                                                    <li><a href="student_project_detail.php">My Project</a></li>
                                                    <li><a href="browse_forms.php">Forms</a></li>
                                                    <li><a href="browse_awards.php">Awards</a></li>
                                                    <li><a href="browse_events.php">Events</a></li>
                                                    <li><a href="browse_categories.php">Categories</a></li>
                                                    <li><a href="browse_contacts.php">Contact Us</a></li>
                                                <!-- END: Student Links -->

                                                <!-- Sponsor Links -->
                                                    <li class="divider sponsor"></li>
                                                    <li class="sponsor"><a href="browse_students.php">Students</a></li>
                                                    <li class="sponsor"><a href="browse_projects.php">Projects</a></li>
                                                    <?php if(isset($_SESSION['security_type']) && $_SESSION['security_type'] == 'sponsor'): ?>
                                                        <?php $approvals = getMyApprovals($_SESSION['user_email']);?>
                                                        <li class="sponsor"><a href="browse_approvals.php">My Approvals (<?php echo mysql_num_rows($approvals);?>)</a></li>
                                                    <?php endif;?>
                                                <!-- END: Sponsor Links -->

                                                <!-- Staff Links -->
                                                    <li class="divider staff"></li>
                                                    <li class="staff"><a href="form_create.php">Add Form</a></li>
                                                    <li class="staff"><a href="event_create.php">Add Event</a></li>
                                                    <li class="staff"><a href="award_create.php">Add Award</a></li>
                                                    <li class="staff"><a href="category_create.php">Add Category</a></li>
                                                    <li class="staff"><a href="suggested_categorization.php">Project Categorization</a></li>
                                                <!-- END: Staff Links -->
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right"><!-- TODO: Need to display based on logged in status -->
                                        <li class="unauthinticated"><a href="user_register.php">Register</a></li>
                                        <li class="unauthinticated"><a href="user_login.php">Log In</a></li>
                                        <li class="authinticated"><a href="index.php?logout">Log Out</a></li>
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                        <div id="formSubmission" style="display:none; margin-bottom:20px;" class="col-md-3 col-md-offset-5"></div>
                    
    <?php } ?>

    <?php //Creates the default footer.
          function incFooter() { ?>
                <hr>
                <div class="col-md-12" align="center">
                    <a href="http://www.facebook.com"><i style="margin-right:7px" class="fa fa-facebook-square fa-4x"></i></a>
                    <a href="http://www.twitter.com"><i style="margin-left:7px" class="fa fa-twitter-square fa-4x"></i></a>
                </div>
            </body>
        </html>
    <?php } ?>