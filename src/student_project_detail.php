<?php
    include_once("function/headerfooter.php");
    include_once("function/project.php");
    incHeader('MSEF | Home');
    
    /* --- Queries --- */
    //note - we should only be doing this call if user is an admin, otherwise we should do a query based on user ID to find their associated project
    $projectInfo = mysql_fetch_assoc(getProjectInformationByEmail($_SESSION['user_email']));
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */
?>
<?php if(isset($_GET['message'])):?>
    <div style="margin-bottom:20px;min-height:40px;text-align:center;" class="bg-success col-md-3 col-md-offset-5">
        <?php echo $_GET['message']; ?>
    </div>
<?php endif;?>
<div class="col-lg-12">
    <!-- Project Detials -->
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block;">Project Information</h3>
                <a href="student_project_edit.php?projectId=<?php echo $projectInfo['Id']?>" title="Edit Project">
                    <i class="fa fa-edit fa-2x" style="float:right;display:inline-block;"></i>
                </a>
            </div>

            <div class="panel-body">
                <dl class="dl-horizontal student">
                    <dt>Name</dt>
                    <dd><?php echo $projectInfo['Name']; ?></dd>
                </dl>
            
                <dl class="dl-horizontal student">
                    <dt>Status</dt>
                    <dd><?php echo $projectInfo['statusName']; ?></dd>
                </dl>
                
                <dl class="dl-horizontal student">
                    <dt>Description</dt>
                    <dd><?php echo $projectInfo['Description']; ?></dd>
                </dl>
                
                <dl class="dl-horizontal student">
                    <dt>Abstract</dt>
                    <dd><?php echo $projectInfo['Abstract']; ?></dd>
                </dl>
                
                <dl class="dl-horizontal student">
                    <dt>Electrical</dt>
                    <dd><?php echo $projectInfo['Electrical'] ? "Yes" : "No" ;?></dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- END: Project Detials -->
</div>
<?php
    incFooter();
?>