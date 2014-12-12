<?php
    /*
     * Name: Project signup
     * Description:
     *     This page is by students to sign up for existing projects.
     * Arguments:
     *    None
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    //Include necessary files
    include("function/headerfooter.php");
    include("function/project.php");

    //Create default header
    incHeader('MSEF | Award');

    /* --- Params --- */
    /* --- END: Params --- */

    /* --- Queries --- */
    $qryProjects = getschoolProjects($_SESSION['user_id']);
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
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Awards</h3>
            </div>

            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Members</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysql_fetch_assoc($qryProjects)):?>
                            <tr>
                                <td><?php echo $row['projectname']; ?></td>
                                <td><?php echo $row['projectDescription']; ?></td>
                                <td><?php echo $row['numMembers']; ?></td>
                                <td>
                                    <a href="project_signup_action.php?projectId=<?php echo $row['projectId']; ?>">Sign Up</a>
                                </td>
                            </tr>
                        <?php endwhile;?>
                        <?php if(mysql_num_rows($qryProjects) == 0):?>
                            <tr>
                                <td colspan="4">There aren't currently any projects at your school.</td>
                            </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
    //Create default footer.
    incFooter();
?>