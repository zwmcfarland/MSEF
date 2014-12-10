<?php
    include("function/headerfooter.php");
    include("function/project.php");
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
    <div class="col-md-6 col-md-offset-3">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
    incFooter();
?>