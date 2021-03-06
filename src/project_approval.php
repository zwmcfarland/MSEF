<?php
    /**
     * Name: Project Approval
     * Description:
     *     This page is used by sponsors to approve project submissions.
     * Arguments:
     *    $_GET['project_id'] - Id of the project being approved
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    ///Include necessary files.
    include("function/headerfooter.php");
    include("function/project.php");

    ///Create default header.
    incHeader('MSEF | Project', '', 'form.js');

    /**--- Parameters ---*/
    $project_id = $_GET['project_id'];
    /**--- END: Parameters ---*/

    /** --- Queries --- */
    $projectInfo = mysql_fetch_assoc(getProjectInformationByProjectId($project_id));
    $students = getProjectMembers($project_id)
    /** --- END: Queries ---*/
    
    /** --- Security --- */
    /** --- END: Security --- */
?>

<!-- Script -->
    <script>
        ///Display warning if user trys to leave without saving.
        $(window).bind('beforeunload', function(e){
            return "All unsaved data will be lost:";
        });
    </script>
<!-- END: Script -->

<div class="col-lg-12">
    <!-- Users Detials -->
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Project Approval</h3>
            </div>

            <div class="panel-body">
                <form style="padding-top: 10px;" action="project_approval_action.php" method="post" enctype="multipart/form-data" id="newBrdForm" target="formSubFrame" onsubmit="formSubmit()">
                    <input type="hidden" name="ProjectId"  value="<?php echo $projectInfo['Id']; ?>"/> 
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Name</dt>
                            <dd><?php echo $projectInfo['Name']; ?></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Description</dt>
                            <dd><?php echo $projectInfo['Description']; ?></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Abstract</dt>
                            <dd><?php echo $projectInfo['Abstract']; ?></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Electrical</dt>
                            <dd><?php echo $projectInfo['Electrical'] ? "Yes":"No"; ?></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Students</dt>
                            <dd>
                               <ul>
                                   <?php while($row = mysql_fetch_assoc($students)):?>
                                       <li><?php echo $row['FirstName'] . ' ' . $row['LastName'];?></li>
                                   <?php endwhile;?>
                               </ul>
                            </dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Students</dt>
                            <dd>
                               <label>
                                  <input type="radio" name="stat" id="optionsRadios1" value="4">
                                  Approve
                               </label>
                               <br>
                               <label>
                                  <input type="radio" Name="stat" value="3" id="optionsRadios1">
                                  Return
                               </label>
                               
                            </dd>
                        </dl>
                    </div>
                    <div class="form-group" align="center">
                        <button type="button" onclick="window.location='user_profile_detail.php';" class="btn">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   <iframe name="formSubFrame" style="display:none;" id="iframSub" onload="subComp()"></iframe>
</div>
<?php
    ///Create default footer.
    incFooter();
?>
