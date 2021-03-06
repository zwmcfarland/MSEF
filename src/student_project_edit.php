<?php
    /**
     * Name: Student project edit
     * Description:
     *     This page allows students to edit their projects details.
     * Arguments:
     *     None
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    ///Include necessary files.
    include("function/headerfooter.php");
    include("function/project.php");

    ///Create default header.
    incHeader('MSEF | Project', '', 'form.js');

    /** --- Queries --- */
    $projectInfo = mysql_fetch_assoc(getProjectInformationByEmail($_SESSION['user_email']));
    /** --- END: Queries ---*/
    
    /** --- Security --- */
    /** --- END: Security --- */
?>

<!-- Script -->
    <script>
        ///Show warning if users try to leave without saving.
        $(window).bind('beforeunload', function(e){
            return "All unsaved data will be lost:";
        });
    </script>
<!-- END: Script -->

<div class="col-lg-12">
    <!-- Users Detials -->
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Project Information</h3>
            </div>

            <div class="panel-body">
                <form style="padding-top: 10px;" action="student_project_edit_action.php" method="post" enctype="multipart/form-data" id="newBrdForm" target="formSubFrame" onsubmit="formSubmit()">
                    <input type="hidden" name="ProjectId"  value="<?php echo $projectInfo['Id']; ?>"/> 
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Name</dt>
                            <dd><input type="text" class="form-control" name="ProjectName" value="<?php echo $projectInfo['Name']; ?>" placeholder="Enter Project Name"></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Description</dt>
                            <dd><textarea class="form-control" name="Description" placehoder="Enter Project Description"><?php echo $projectInfo['Description']; ?></textarea></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Abstract</dt>
                            <dd><textarea class="form-control" name="Abstract" placeholder="Enter Project Abstract"><?php echo $projectInfo['Abstract']; ?></textarea></dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <dl class="dl-horizontal">
                            <dt>Electrical</dt>
                            <dd><input type="checkbox" name="Electrical" <?php echo $projectInfo['Electrical'] ? "checked=checked":""; ?>></dd>
                        </dl>
                    </div>
                    <div class="form-group" align="center">
                        <button type="button" onclick="window.location='user_profile_detail.php';" class="btn">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
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
