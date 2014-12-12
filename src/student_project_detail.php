<?php
    /*
     * Name: Student project detail
     * Description:
     *     This page allows students to view detailed information about their project.
     * Arguments:
     *     None
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    //Include necessary files
    include_once("function/headerfooter.php");
    include_once("function/project.php");

    //Create default header
    incHeader('MSEF | Project');
    
    /* --- Queries --- */
    $qryProject = getProjectInformationByEmail($_SESSION['user_email']);
    $projectInfo = mysql_fetch_assoc($qryProject);
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */
?>
<!-- Used to display messages -->
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
                <?php if(mysql_num_rows($qryProject) != 0): ?>
                    <a <?php if($projectInfo['statusName'] != 'Not Submitted'):?>class="staff"<?php endif;?>href="student_project_edit.php?projectId=<?php echo $projectInfo['Id']?>" title="Edit Project">
                        <i class="fa fa-edit fa-2x" style="float:right;display:inline-block;"></i>
                    </a>
                <?php endif;?>
            </div>

            <div class="panel-body">
                <?php if(mysql_num_rows($qryProject) != 0): ?>
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
                <?php else:?>
                    <p>Looks like you aren't a part of any projects yet, you can either join an existing project <a href="project_signup.php">here</a>, or you can create your own project <a href="student_project_create.php">here</a>.</p>
                <?php endif;?>
            </div>
        </div>
    </div>
    <!-- END: Project Detials -->
</div>
<?php
    //create default footer
    incFooter();
?>