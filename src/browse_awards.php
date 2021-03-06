<?php
    /**
     * Name: Browse awards
     * Description:
     *     This page allows all users to view a list of the avalible awards.
     * Arguments:
     *     None
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/11/2014 - Created Comments.
     */

    ///Include necessary files
    include("function/headerfooter.php");
    include("function/awards.php");

    ///Create standard header
    incHeader('MSEF | Award');

    /** --- Params --- */
    /** --- END: Params --- */

    /** --- Queries --- */
    $qryAward = getAward();
    /** --- END: Queries ---*/
    
    /** --- Security --- */
    /** --- END: Security --- */
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysql_fetch_assoc($qryAward)):?>
                            <tr>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Description']; ?></td>
                                <td><a href="award_detail.php?awardId=<?php echo $row['Id']; ?>">View</a></td>
                            </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
    ///Include standard footer.
    incFooter();
?>