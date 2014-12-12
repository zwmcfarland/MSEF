<?php
    /*
     * Name: Browse forms
     * Description:
     *     This page gives a way for all users to access a list of all of the forms that they may need to fill out.
     * Arguments:
     *     None
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    //Include necessary files
    include("function/headerfooter.php");
    include("function/form.php");

    //Create default header
    incHeader('MSEF | Forms');

    /* --- Params --- */
    /* --- END: Params --- */

    /* --- Queries --- */
    $qryAward = getForms();
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */
?>

<!-- This is used for displaying messages from the create_form page. -->
<?php if(isset($_GET['message'])):?>
    <div style="margin-bottom:20px;min-height:40px;text-align:center;" class="bg-success col-md-3 col-md-offset-5">
        <?php echo $_GET['message']; ?>
    </div>
<?php endif;?>
<div class="col-lg-12">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Foms</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysql_fetch_assoc($qryAward)):?>
                            <tr>
                                <td><?php echo $row['Name']; ?></td>
                                <td>
                                    <a href="form_detail.php?formId=<?php echo $row['Id']; ?>">View</a>
                                </td>
                            </tr>
                        <?php endwhile;?>
                        <?php if(mysql_num_rows($qryAward) == 0):?>
                            <tr>
                                <td colspan="2">There aren't currently any forms</td>
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