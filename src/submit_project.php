<?php
    /*
     * Name: Submit project
     * Description:
     *     This page is used by students to submit their project and choose their sponsor
     * Arguments:
     *     None
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    //Include necessary files.
    include("function/headerfooter.php");
    include("function/project.php");
    include("function/user.php");
    
    //Create default header, and import form handler component
    incHeader('MSEF | Project Submission', '', 'form.js');

    /* --- Queries --- */
    $projectInfo = mysql_fetch_assoc(getProjectInformationByEmail($_SESSION['user_email']));
    $sponsors = getPotentialProjectSponsors($projectInfo['Id']);
    /* --- END: Queries ---*/

    /* --- Security --- */
    /* --- END: Security --- */
?>

<!-- Script -->
    <script>
        //Display warning if user leaves without saving.
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
                <h3 class="panel-title" style="display:inline-block">Project Information</h3>
            </div>

            <div class="panel-body">
                <form style="padding-top: 10px;" action="submit_project_action.php" method="post" enctype="multipart/form-data" id="newBrdForm" target="formSubFrame" onsubmit="formSubmit()">
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
                            <dt>Sponsor</dt>
                            <dd>
                               <select name="Sponsor" class="form-control">
                                   <?php while($row = mysql_fetch_assoc($sponsors)):?>
                                       <option value="<?php echo $row['Id']; ?>"><?php echo $row['FirstName'] . ' ' . $row['LastName'];?></option>
                                   <?php endwhile; ?>
                               </select>
                            </dd>
                        </dl>
                    </div>
                    <div class="form-group" align="center">
                        <button type="button" onclick="window.location='user_profile_detail.php';" class="btn">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit For Approval</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   <iframe name="formSubFrame" style="display:none;" id="iframSub" onload="subComp()"></iframe>
</div>
<?php
    //Create default footer
    incFooter();
?>