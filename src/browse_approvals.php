<?php
    include("function/headerfooter.php");
    include("function/project.php");
    incHeader('MSEF | Projects');

    /* --- Params --- */
    /* --- END: Params --- */

    /* --- Queries --- */
    $qryProjects = getMyApprovals($_SESSION['user_email']);
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */
?>
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
                            <th>Abstract</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysql_fetch_assoc($qryProjects)):?>
                            <tr>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Description']; ?></td>
                                <td><?php echo $row['Abstract']; ?></td>
                                <td><a href="project_approval.php?project_id=<?php echo $row['Id']; ?>">View</a></td>
                            </tr>
                        <?php endwhile;?>
                        <?php if(mysql_num_rows($qryProjects) == 0): ?>
                            <tr>
                                <td colspan="4">No pending approvals.</td>
                            </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
    incFooter();
?>