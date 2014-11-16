<?php
    include("function/headerfooter.php");
    include_once("function/user.php");
    incHeader('MSEF | Home');
    
    /* --- Queries --- */
    $userInfo = mysql_fetch_assoc(getUserInformation($_SESSION['user_email']));
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */
?>
<div class="col-lg-12">
    <!-- Users Detials -->
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Project Information</h3><a><i style="float:right" class="fa fa-pencil-square-o fa-2x"></i></a>
            </div>

            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt>Name</dt>
                    <dd><?php echo $userInfo['Name']; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Description</dt>
                    <dd><?php echo $userInfo['Description']; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Need Electric</dt>
                    <dd><?php echo $userInfo['Electrical']; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Abstract</dt>
                    <dd><?php echo $userInfo['Abstract']; ?></dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- END: Users Detials -->

   
</div>
<?php
    incFooter();
?>