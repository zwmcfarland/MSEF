<?php
    /*
     * Name: Browse projects
     * Description:
     *     This page is used by sponsors and staff to view a list of student projects.
     * Arguments:
     *     None
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    //Include necssary files.
    include("function/headerfooter.php");
    include("function/project.php");

    //Create deault header
    incHeader('MSEF | Projects');

    /* --- Params --- */
    /* --- END: Params --- */

    /* --- Queries --- */
    $qryProjects = getProjectInformationByProjectId();
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */
?>
<div class="col-lg-12">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Projects</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Abstract</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysql_fetch_assoc($qryProjects)):?>
                            <tr>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Description']; ?></td>
                                <td><?php echo $row['Abstract']; ?></td>
                                <td><?php echo $row['statusName']; ?></td>
                            </tr>
                        <?php endwhile;?>
                        <?php if(mysql_num_rows($qryProjects) == 0): ?>
                            <tr>
                                <td colspan="4">Currently no projects.</td>
                            </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
    //Create default footer
    incFooter();
?>