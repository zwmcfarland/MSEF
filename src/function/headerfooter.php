<?php
    date_default_timezone_set('UTC');
    function incHeader($title = "", $JS_String = "", $JS_Include = "", $CSS_Include = "", $CSS_String = "", $MenuFlag = "true") {
        ?>
            <!DOCTYPE html>
                <html> 
                    <head>
                        <meta charset="utf-8">
                        <title> <?php echo $title; ?></title>
                        <meta content="width=device-width, initial-scale=1.0" name="viewport">
                        <link href="css/font-awesome.css" rel="stylesheet">
                        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
                        <link  href="img/uno.ico" rel="shortcut icon">
                        <script src="js/jQuery.js"></script>
                        <script src="js/bootstrap.js"></script>

                        <!-- END: CSS Includes -->
                        
                        <!-- Security -->
                        <!-- TODO: Need to add security view filters -->
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
                        echo '<script src="' . $path . '"></script>'; 
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
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Browse<span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <!--  Student Links -->
                                                    <li><a href="user_profile_detail.php">My Profile</a></li><!-- TODO: Add current user id to link -->
                                                    <li><a href="student_project_detail.php">My Project</a></li><!-- TODO: Add current user project id to link -->
                                                    <li><a href="browse_forms.php">Forms</a></li>
                                                <!-- END: Student Links -->

                                                <!-- Sponsor Links -->
                                                    <li class="divider sponsor"></li>
                                                    <li class="sponsor"><a href="#">Separated link</a></li>
                                                <!-- END: Sponsor Links -->

                                                <!-- Staff Links -->
                                                    <li class="divider staff"></li>
                                                    <li class="staff"><a href="#">One more separated link</a></li>
                                                <!-- END: Staff Links -->
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right"><!-- TODO: Need to display based on logged in status -->
                                        <li class="unauthinticated"><a href="user_logout.php">Register</a></li>
                                        <li class="unauthinticated"><a href="user_login.php">Log In</a></li>
                                        <li class="authinticated"><a href="user_logout.php">Log Out</a></li>
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    
    <?php } ?>

    <?php function incFooter() { ?>
                <hr>
                <div class="footer navbar" align="center">
                    <p>
                        <small>Created as an University of Nebraska at Omaha Capstone Project</small>
                    </p>
                </div>
            </body>
        </html>
    <?php } ?>