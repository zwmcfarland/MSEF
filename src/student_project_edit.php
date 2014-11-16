<?php
    include("function/headerfooter.php");
    include("function/user.php");
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
            	<form method="post" action="create_project.php">
                <dl class="dl-horizontal">
                    <dt>Name</dt>
                    <dd><input type="text" class="form-control" id="Name" placeholder="Enter Project Name"></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Description</dt>
                    <dd><textarea class="form-control" rows="3" id="Description" placeholder="Enter Project Description"></textarea></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Need Electric</dt>
                    <dd><input type="checkbox" id="Electric"></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Abstract</dt>
                    <dd><textarea class="form-control" rows="3" id="Absrtact" placeholder="Enter Project Abstract"></textarea></dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- END: Users Detials -->

   
</div>
<?php
    incFooter();
?>