<?php
    /**
     * Name: Browse Students
     * Description:
     *     This page is used by sponsors and staff to view a list of students.
     * Arguments:
     *     None
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    ///Include necessary files.
    include("function/headerfooter.php");
    include("function/user.php");

    ///Create default header
    incHeader('MSEF | Students');

    /** --- Params --- */
    /** --- END: Params --- */

    /** --- Queries --- */
    $qryStudents = getUserInformation("", "Student");
    /** --- END: Queries ---*/
    
    /** --- Security --- */
    /** --- END: Security --- */
?>
<div class="col-lg-12">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Students</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Grade</th>
                            <th>School</th>
                            <th>Project</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysql_fetch_assoc($qryStudents)):?>
                            <tr>
                                <td><?php echo $row['FirstName']; ?></td>
                                <td><?php echo $row['LastName']; ?></td>
                                <td><?php echo $row['Grade']; ?> <?php if($row['Grade'] != ""):?>th<?php endif;?></td>
                                <td><?php echo $row['SchoolName']; ?></td>
                                <td><?php echo $row['ProjectName']; ?></td>
                            </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
    ///Create default footer
    incFooter();
?>